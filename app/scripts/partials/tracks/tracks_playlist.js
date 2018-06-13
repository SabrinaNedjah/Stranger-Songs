$(window).on("load resize ", function() {
	var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
	$('.tbl-header').css({'padding-right':scrollWidth});
  }).resize(); 

		$(function() { 
			// Setup the player to autoplay the next track
			var a = audiojs.createAll({
				trackEnded: function() {
					var next = $('ol li.playing').next();
					if (!next.length) next = $('ol li').first();
					next.addClass('playing').siblings().removeClass('playing');
					audio.load($('a', next).attr('data-src'));
					audio.play();
				}
			});
			
			// Load in the first track
			var audio = a[0];
					first = $('ol a').attr('data-src');
			$('ol li.music').first().addClass('playing');
			audio.load(first);

			// Load in a track on click
			$('ol li').click(function(e) {
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
				  var next = $('li.playing').next();
				  if (!next.length) next = $('ol li').first();
				  next.click();
				  // back arrow
				} else if (unicode == 37) {
				  var prev = $('li.playing').prev();
				  if (!prev.length) prev = $('ol li').last();
				  prev.click();
				  // spacebar
				} else if (unicode == 32) {
				  audio.playPause();
				}
			  })
		});

		// Pop up option of the playlist
		$("a[href='#popup']").on("click", openPopUp);
		$("#popup").on("click", closePopUp);
		
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

