// Sequencer.
const sequencer = {
  el: {
    audio: $('audio')
  },
  states: {
    isRecording: false
  },
  values: {
    audio: {},
    audioContext: new AudioContext(),
    blockWidth: 100/60/20,
    file: null,
    recorder: null,
    recordChunks: [],
    recordStream: null
  },
  listeners: function() {
    const self = this;

    // Listen keyboard event and play sound.
    const onKeyDown = function () {
      $(document).on('keydown', function (event) {
        // Avoid looping.
        $(document).off('keydown');

        self.playSound.call(self, event);
      });
    };

    onKeyDown();

    // Listen keyboard event.
    $(document).keyup(function(event) {
      onKeyDown();

      $('.sequencer_keyboard li').removeClass('active');
      self.record.stopBuildBlock.call(self);

      // Shift key.
      if (event.keyCode === 16) {
        self.record.toggle.call(self, event);
      }
    });

    $('.sequencer_toolbar .button.record').on('click', function(event) {
      self.record.toggle.call(self, event);
    });

    $('.sequencer_toolbar .button.play').on('click', function(event) {
      const el = $(this);

      el.addClass('playing');

      if (self.values.recorder) {
        const audio = $('.popup-save_content>div audio')[0];

        audio.play();

        timer.reset();
        timer.start();

        audio.onended = function () {
          setTimeout(function() {
            timer.stop();
            el.removeClass('playing');
          }, 500);
        };
      }
    });

    $('.save').on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();

      if (self.values.recorder) {
        popup.togglePopup();
      }
    });
  },
  stopListeners: function() {
    $(document).off('keydown');
    $(document).off('keyup');
    $('.sequencer_toolbar .button.record').off('click');
    $('.save').off('click');
  },
  parseAudio: function() {
    const self = this;

    self.el.audio.each(function() {
      const el = $(this);
      const keycode = $(this).data('key');
      const request = new XMLHttpRequest();

      request.open('GET', $(this).attr('src'), true);
      request.responseType = 'arraybuffer';
      request.onload = function () {
        const audioData = request.response;
        self.values.audioContext.decodeAudioData(audioData)
          .then(function(buffer) {
            self.values.audio[keycode] = {
              el: el,
              buffer: buffer
            }
          });
      };
      request.send();
    });
  },
  playSound: function(event) {
    if (this.values.audio[event.keyCode]) {
      const self = this;
      const touch = $('.sequencer_keyboard li[data-letter='+ event.key + ']');

      // Set design state to active.
      touch.addClass('active');

      if (this.states.isRecording) {
        this.record.setBlock.call(this, event);
      }

      const source = this.values.audioContext.createBufferSource();
      source.buffer = this.values.audio[event.keyCode].buffer;
      source.connect(this.values.audioContext.destination);

      if (this.states.isRecording) {
        // Connect to record stream.
        source.connect(this.values.recordStream);
      }

      // Avoid looping.
      source.onended = function (e) {
        self.record.stopBuildBlock.call(self);
      };

      source.start(0);
    }
  },
  record: {
    buildBlock: function () {
      const self = this;

      this.states.currentBlockWidth = 0;

      // Set current left position.
      const leftPosition = this.values.blockWidth * timer.getCursor();
      self.states.currentBlock.css({ left: leftPosition + '%' });

      this.record.stopBuildBlock.call(this);
      this.states.currentBlockInterval = setInterval(function() {
        self.states.currentBlockWidth += self.values.blockWidth;
        self.states.currentBlock.css({ width: self.states.currentBlockWidth + '%' });
      }, 50);
    },
    setBlock: function (event) {
      const touch = $('.sequencer_keyboard li[data-letter='+ event.key + ']');
      const type = touch.data('type');
      const time = Date.now();

      const tracks = $('.sequencer_recorder li');

      // Inject block on the right tracks.
      $(tracks[type - 1]).append('<div class="block b_' + time + '"></div>');

      this.states.currentBlock = $('.b_' + time);
      this.record.buildBlock.call(this);
    },
    stopBuildBlock: function() {
      clearInterval(this.states.currentBlockInterval);
    },
    start: function(event) {
      const self = this;

      this.states.isRecording = true;

      $('.sequencer_toolbar .record').addClass('recording');

      // Launch timer.
      timer.start();

      // Start recording.
      this.values.recordStream = this.values.audioContext.createMediaStreamDestination();

      this.values.recorder = new MediaRecorder(this.values.recordStream.stream);
      this.values.recordChunks = [];

      // Save every chunks
      this.values.recorder.ondataavailable = function(event) {
        self.values.recordChunks.push(event.data);
      }

      this.values.recorder.onstop = function(event) {
        self.states.isRecording = false;
        // Export the recording
        const audioBlob = new Blob(self.values.recordChunks, { type: 'audio/ogg' });
        const audioUrl = URL.createObjectURL(audioBlob);

        self.values.file = audioBlob;

        const audioTag = new Audio(audioUrl);
    		audioTag.controls = true;
        audioTag.controlsList = "nodownload";
        audioTag.type = 'audio/ogg';

        $('.popup-save_content>div:first-of-type').html(audioTag)
        $('.save-track').attr('href', audioUrl);
      };

      this.values.recorder.start();
    },
    stop: function () {
      // Stop recording.
      this.values.recorder.stop();

      $('.sequencer_toolbar .record').removeClass('recording');

      // Stop timer.
      timer.stop();
    },
    toggle: function (event) {
      if ($('.sequencer_start-record').is(":visible")) {
        if (this.values.recorder) {
          if (confirm("Are you sure you want to erase the previous record?")) {
            this.reset();
            this.values.recorder = null;
          } else {
            return;
          }
        }

        this.record.start.call(this, event);
      } else {
        this.record.stop.call(this, event);

        if (this.values.recorder) {
          $('.sequencer_start-record').addClass('existing-record');
        }
      }

      // Toggle instructions.
      $('.sequencer_start-record').toggle();
    }
  },
  start: function() {
    this.parseAudio();
    this.listeners();
  },
  stop: function() {

  },
  reset: function() {
    this.values.recorder = null;
    timer.reset();

    $('.sequencer_recorder li').text('');
    $('.sequencer_start-record').removeClass('existing-record');
  }
};

sequencer.start();

// Timer.
const timer = {
  el: $('.sequencer_toolbar .timer span'),
  values: {
    minute: 0,
    second: 0
  },
  interval: {},
  cursor: 0,
  count: function() {
    this.values.second++;

    if (this.values.second >= 60) {
      this.values.second = 0;
      this.values.minute++;

      this.displayValues();
      this.stop();

      // Stop recording.
      sequencer.record.stop.call(sequencer);

      return;
    }

    this.displayValues();
  },
  displayValues: function() {
    this.el.text(('0' + this.values.minute).slice(-2) + ':' + ('0' + this.values.second).slice(-2));
  },
  getCursor: function () {
    return this.cursor;
  },
  start: function() {
    const self = this;

    this.interval.cursor = setInterval(function () {
      self.cursor++;
    }, 50);

    this.interval.second = setInterval(this.count.bind(this), 1000);
  },
  stop: function() {
    clearInterval(this.interval.second);
    clearInterval(this.interval.cursor);

    this.interval.second = null;
    this.interval.cursor = null;
  },
  reset: function () {
    this.values = {
      minute: 0,
      second: 0
    };

    this.cursor = 0;

    this.displayValues();
  }
};

const popup = {
  el: {
    popup: $('.popup-save'),
    close: $('.popup-close')
  },
  start: function() {
    const self = this;

    $('body').append('<div class="popup-overlay"></div>');

    this.el.overlay = $('.popup-overlay');
    this.toggleOverlay();

    this.el.close.on('click', function (event) {
      self.togglePopup();
    });

    this.el.popup.find('.submit').on('click', function (event) {
      event.preventDefault();
      event.stopPropagation();

      self.submitForm.call(self);
    });
  },
  submitForm: function() {
    const name = $('input[name="name"]').val();
    const project = $('input[name="project"]').val();

    const formData = new FormData();
    formData.append('name', name);
    formData.append('project', project);
    formData.append('track', sequencer.values.file);

    const pathname = window.location.pathname.split('/');
    pathname.pop(); // Remove last item.
    const url = window.location.origin + pathname.join('/') + "/record";

    $.ajax({
      method: "POST",
      url: url,
      data: formData,
      processData: false,
      contentType: false
    })
      .done(function(msg) {
        console.log(msg);
        alert("Track Saved");
      });
  },
  togglePopup: function() {
    this.el.popup.toggle();
    this.toggleOverlay();

    if (this.el.popup.is(":visible")) {
      sequencer.stopListeners.call(sequencer);
    } else {
      sequencer.listeners.call(sequencer);
    }
  },
  toggleOverlay: function() {
    this.el.overlay.toggle();
  }
};

popup.start();

// Pop up Options
$("a[href='#popup']").on("click", openPopUp);
$(".popup-close_help").on("click", closePopUp);

function openPopUp()
{
  $("#popup").css({"display": "block",
           "opacity": 1});
}

function closePopUp()
{ 
  $("#popup").css({"display": "none",
           "opacity": 0});
}