  /*audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });

$(document).ready(function () {
	init();
	function init(){
		var current = 0;
		var audio = $('#audio');
		var playlist = $('#playlist');
		var tracks = playlist.find('tr a');
		var len = tracks.length - 1;
		audio[0].volume = .10;
		audio[0].play();
		playlist.on('click','a', function(e){
			e.preventDefault();
			link = $(this);
			current = link.parent().index();
			run(link, audio[0]);
		});
		audio[0].addEventListener('ended',function(e){
			current++;
			if(current == len){
				current = 0;
				link = playlist.find('a')[0];
			}else{
				link = playlist.find('a')[current];    
			}
			run($(link),audio[0]);
		});
	}
	function run(link, player){
			player.src = link.attr('href');
			par = link.parent();
			par.addClass('active').siblings().removeClass('active');
			player.load();
			player.play();
	}
});
*/
$(function() { 
	// Setup the player to autoplay the next track
	var a = audiojs.createAll({
	  trackEnded: function() {
		var next = $('tr td.playing').next();
		if (!next.length) next = $('tr td').first();
		next.addClass('playing').siblings().removeClass('playing');
		audio.load($('a', next).attr('data-src'));
		audio.play();
	  }
	});
	
	// Load in the first track
	var audio = a[0];
		first = $('tr a').attr('data-src');
	$('tr td').first().addClass('playing');
	audio.load(first);

	// Load in a track on click
	$('tr td').click(function(e) {
	  e.preventDefault();
	  $(this).addClass('playing').siblings().removeClass('playing');
	  audio.load($('a', this).attr('data-src'));
	  audio.play();
	});
	// Keyboard shortcuts
	$(document).keydown(function(e) {
	  var unicode = e.charCode ? e.charCode : e.keyCode;
		 // right arrow
	  if (unicode == 39) {
		var next = $('td.playing').next();
		if (!next.length) next = $('tr td').first();
		next.click();
		// back arrow
	  } else if (unicode == 37) {
		var prev = $('td.playing').prev();
		if (!prev.length) prev = $('tr td').last();
		prev.click();
		// spacebar
	  } else if (unicode == 32) {
		audio.playPause();
	  }
	})
  });
$(window).on("load resize ", function() {
	var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
	$('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();
