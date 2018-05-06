let $body = document.querySelector('body')
let $changeColor = $body.querySelector('.change-color')
const $mediaPlayer = $body.querySelector(".media-player")
const $audioPlayer = $mediaPlayer.querySelector(".audio-player")
let $bars = $mediaPlayer.querySelectorAll(".bar")
const $playButton = $mediaPlayer.querySelector(".play-state")
const $stopButton = $mediaPlayer.querySelector(".stop-item")
const $nextButton = $mediaPlayer.querySelector(".next-item")
const $prevButton = $mediaPlayer.querySelector(".back-item")
const $repeatButton = $mediaPlayer.querySelector(".repeat-item")
const $durationLabel = $mediaPlayer.querySelector(".current-duration")
const $songTitleLabel = $mediaPlayer.querySelector(".song-title-label")
const $volumeSlider = $mediaPlayer.querySelector(".volume-slider")
const $seekSlider = $mediaPlayer.querySelector(".seek-slider")
let $seeTime = $mediaPlayer.querySelector(".see-time")
const $karaokeOn = $body.querySelector(".karaoke-on")
const $karaoke = $body.querySelector(".karaoke")
let $line = $karaoke.querySelector(".line")
let $lines = Array.from($karaoke.querySelectorAll(".lines"))
let $karaokeSongs = Array.from($karaoke.querySelectorAll(".karaoke-songs"))
const $dangerouslyKaraoke = $karaoke.querySelector(".dangerously-karaoke")
let $songs = Array.from($mediaPlayer.querySelectorAll(".songs"))
let $currentIndex = 0
let $dataAvailable = false
let $currentLength
let $timer
$timer = setInterval(update$durationLabel, 100)

// EVENTS

//Hexa code created in a random way
$changeColor.addEventListener("click", () => {
    $body.style.backgroundColor = '#' + Math.floor(Math.random() * 16777215).toString(16)
})

// Volume Slider
$volumeSlider.addEventListener("input", () => {
    $audioPlayer.volume = parseFloat($volumeSlider.value)
    muteSound() //If we slide until 0 the equalizer stops
})

// Loaded Data
$audioPlayer.addEventListener("loadeddata", () => {
    $dataAvailable = true
    $currentLength = $audioPlayer.duration
})

// Pause with spacebar
window.addEventListener("keypress", (event) => {
    if (event.keyCode == 32) {
        if ($audioPlayer.paused) {
            $audioPlayer.play()
            $mediaPlayer.classList.add("play")
        } else {
            $audioPlayer.pause()
            $mediaPlayer.classList.remove("play")
        }
    }
})

// Volumme with arrows
window.addEventListener("keydown", (event) => {
    if (event.keyCode == 40) {
        $audioPlayer.volume = Math.max(0, $audioPlayer.volume - 0.1)
        $volumeSlider.value = Math.max(0, $audioPlayer.volume - 0.1)
        muteSound() //If we go until 0 with arrows, equalizer stops
    } else if (event.keyCode == 38) {
        $audioPlayer.volume = Math.min(1, $audioPlayer.volume + 0.1)
        $volumeSlider.value = Math.min(1, $audioPlayer.volume + 0.1)
    }
})

// Time with arrows
window.addEventListener("keydown", (event) => {
    seeTime()
    if (event.keyCode == 39) {
        $audioPlayer.currentTime += 10.0
    } else if (event.keyCode == 37) {
        $audioPlayer.currentTime -= 10.0
    }
})

// Play button
$playButton.addEventListener("click", () => {
    $mediaPlayer.classList.toggle("play")
    if ($audioPlayer.paused) {
        setTimeout(() => {
            $audioPlayer.play()
        }, 300)
        $timer = setInterval(update$durationLabel, 100)
    } else {
        $audioPlayer.pause()
        muteSound()
        clearInterval($timer)
    }
})

// Stop button
$stopButton.addEventListener("click", () => {
    $mediaPlayer.classList.remove("play")
    $audioPlayer.pause()
    $audioPlayer.currentTime = 0
    update$durationLabel()
})

// NextSong button
$nextButton.addEventListener("click", () => {
    $karaoke.style.display = "none"
    $mediaPlayer.classList.add("play")
    $dataAvailable = false
    loadNext(false)
})

// PrevSong button
$prevButton.addEventListener("click", () => {
    $mediaPlayer.classList.add("play")
    $dataAvailable = false
    loadNext(true)
})

// Repeat button
$repeatButton.addEventListener("click", () => {
    $mediaPlayer.classList.toggle('repeat-off')
    if ($mediaPlayer.classList.contains("repeat-off")) {
        $audioPlayer.setAttribute("loop", "true")
    } else {
        $audioPlayer.removeAttribute("loop")
    }
})

// Karaoke
$karaokeOn.addEventListener("click", () => {
    $karaoke.classList.toggle('karaoke-visible')
    if ($karaoke.classList.contains("karaoke-visible")) {
        $karaoke.style.display = "block"
    } else {
        $karaoke.style.display = "none"
    }
})

// Time Slider
$seekSlider.addEventListener("mouseup", () => {
    $audioPlayer.currentTime = $seekSlider.value
    seeTime()
})

$audioPlayer.addEventListener("timeupdate", () => {
    $seekSlider.value = $audioPlayer.currentTime
    $seekSlider.setAttribute("max", $audioPlayer.duration)
})

//Fullscreen with F keypress
window.addEventListener("keydown", (event) => {
    if (event.keyCode == 70) {
        toggleFullScreen()
    }
})

// FUNCTIONS

//See Time below the seek bar
function seeTime() {
    $seeTime.innerHTML = parseTime($audioPlayer.currentTime)
    const $ratio = ($audioPlayer.currentTime / $audioPlayer.duration) * 280
    $seeTime.style.transform = `translateX(${$ratio + "px"})`
}

// Stop the equalizer's animation
function muteSound() {
    for (const $bar of $bars) {
        if ($audioPlayer.volume <= 0 || $audioPlayer.paused) {
            $bar.style.animationPlayState = "paused" //Pause the animation if volume = 0 or audio is paused
        } else {
            $bar.style.animationPlayState = "running"
        }
    }
}

// Converts time in ms to zero-padded string in seconds
function parseTime(time) {
    const minutes = Math.floor(time / 60)
    const seconds = Math.floor(time - minutes * 60)
    const secondsZero = seconds < 10 ? "0" : ""
    const minutesZero = minutes < 10 ? "0" : ""
    return minutesZero + minutes.toString() + ":" + secondsZero + seconds.toString()
}

// Loads next song
function loadNext(next) {
    $songs[$currentIndex].classList.remove('is-active')
    $audioPlayer.pause()
    if (next) {
        $currentIndex = ($currentIndex + 1) % $songs.length
    } else {
        $currentIndex = ($currentIndex - 1) < 0 ? $songs.length - 1 : $currentIndex - 1
    }
    //Get the source of the new song
    $audioPlayer.src = $songs[$currentIndex].src
    //Get the title of the new song
    $songTitleLabel.innerHTML = $songs[$currentIndex].title
    $songs[$currentIndex].classList.add('is-active')
    //Play the new song
    $audioPlayer.play()
}

// Updates the duration label and karaoke
function update$durationLabel() {
    if ($dataAvailable) {
        $durationLabel.innerText = parseTime($audioPlayer.currentTime) + " / " + parseTime($currentLength)
        update$lines()
        muteSound()
        seeTime()
    } else {
        $durationLabel.innerText = parseTime($audioPlayer.currentTime)
    }
}


// Updates the karaoke
function update$lines() {
    if ($songs[0].classList.contains('is-active')) {
        update$linesOne() //Dangerously Song
    } else if ($songs[1].classList.contains('is-active')) {
        update$linesTwo() //Attention Song
    } else if ($songs[2].classList.contains('is-active')) {
        update$linesThree() //Trouble Song
    }
}

// Dangerously Song
function update$linesOne() {
    if ($audioPlayer.currentTime < 25) {
        $line.innerHTML = $lines[0].innerHTML
    } else if ($audioPlayer.currentTime < 50) {
        $line.innerHTML = $lines[1].innerHTML
    } else if ($audioPlayer.currentTime < 75) {
        $line.innerHTML = $lines[2].innerHTML
    } else if ($audioPlayer.currentTime < 100) {
        $line.innerHTML = $lines[3].innerHTML
    } else if ($audioPlayer.currentTime < 125) {
        $line.innerHTML = $lines[4].innerHTML
    } else if ($audioPlayer.currentTime < 150) {
        $line.innerHTML = $lines[5].innerHTML
    } else if ($audioPlayer.currentTime < 175) {
        $line.innerHTML = $lines[6].innerHTML
    } else if ($audioPlayer.currentTime < 200) {
        $line.innerHTML = $lines[7].innerHTML
    }
}

// Attention Song
function update$linesTwo() {
    if ($audioPlayer.currentTime < 28) {
        $line.innerHTML = $lines[8].innerHTML
    } else if ($audioPlayer.currentTime < 50) {
        $line.innerHTML = $lines[9].innerHTML
    } else if ($audioPlayer.currentTime < 75) {
        $line.innerHTML = $lines[10].innerHTML
    } else if ($audioPlayer.currentTime < 100) {
        $line.innerHTML = $lines[11].innerHTML
    } else if ($audioPlayer.currentTime < 125) {
        $line.innerHTML = $lines[12].innerHTML
    } else if ($audioPlayer.currentTime < 150) {
        $line.innerHTML = $lines[13].innerHTML
    } else if ($audioPlayer.currentTime < 165) {
        $line.innerHTML = $lines[14].innerHTML
    } else if ($audioPlayer.currentTime < 200) {
        $line.innerHTML = $lines[15].innerHTML
    }
}

// Trouble Song
function update$linesThree() {
    if ($audioPlayer.currentTime < 25) {
        $line.innerHTML = $lines[16].innerHTML
    } else if ($audioPlayer.currentTime < 45) {
        $line.innerHTML = $lines[17].innerHTML
    } else if ($audioPlayer.currentTime < 75) {
        $line.innerHTML = $lines[18].innerHTML
    } else if ($audioPlayer.currentTime < 100) {
        $line.innerHTML = $lines[19].innerHTML
    } else if ($audioPlayer.currentTime < 125) {
        $line.innerHTML = $lines[20].innerHTML
    } else if ($audioPlayer.currentTime < 150) {
        $line.innerHTML = $lines[21].innerHTML
    } else if ($audioPlayer.currentTime < 175) {
        $line.innerHTML = $lines[22].innerHTML
    }
}


//Full screen with button and F keypress
function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) || // alternative standard method
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if ($mediaPlayer.requestFullScreen) {
            $mediaPlayer.requestFullScreen();
        } else if ($mediaPlayer.mozRequestFullScreen) {
            $body.mozRequestFullScreen();
        } else if ($mediaPlayer.webkitRequestFullScreen) {
            $mediaPlayer.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}


//When the song is ending
$audioPlayer.addEventListener("ended", () => {
    loadNext(false)
    $karaoke.style.display = "none" // Hide the karaoke for the next song
    if ($mediaPlayer.classList.contains("play")) {
        $audioPlayer.play()
    } else {
        $audioPlayer.pause()
    }
})