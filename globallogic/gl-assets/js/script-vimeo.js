		jQuery(".inner .video-play-icon").click(function() {
			jQuery(".dropdown-menu").removeClass("show");
			jQuery(".dropdown-toggles").removeClass("open");
		});



jQuery(document).ready(function() {

   
  var isVideoAutoplay = false;
  var isAuidoMuted = false;

  jQuery('#vi-video-1-container').attr('data-video-is-playing', false);
  
});

	$(document).on('keyup', function(event) { 
		if (event.key == "Escape") { 
			pauseVideo();
			$('#myModal').modal('hide');
		} 
	}); 

function playVideo() {
  
  jQuery(".videomodal").removeClass("hidepopup");
  jQuery('.container-video-section').addClass("visible");
  console.log('trigger to true');
  jQuery('#vi-banner-video').vimeo('play');
  jQuery(".video-control.js-video-control").removeClass('paused').addClass('playing');
  jQuery('#vi-video-1-container').attr('data-video-is-playing', true);
  jQuery('.video-control.js-video-control').css('opacity', '');
  jQuery('.video-control.js-video-control.playing').removeClass("video-control-show");
  
}

function muteAudio() {

	audioStatus = jQuery("#vi-video-1-container").attr('data-audio-volume');

	if (audioStatus == 0) {
    
    jQuery('#vi-video-1-container').attr('data-audio-volume', 1);
    jQuery("#vi-banner-video").vimeo("setVolume", 1);
    jQuery(".audio-control.js-audio-control").removeClass('muted').addClass('unmuted');
} else if (audioStatus == 1) {
    
    jQuery('#vi-video-1-container').attr('data-audio-volume', 0);
    jQuery("#vi-banner-video").vimeo("setVolume", 0);
    jQuery(".audio-control.js-audio-control").removeClass('unmuted').addClass('muted');
}
}

jQuery(document).on('click', '.js-video-control', function(e) {
	playVideo(jQuery(this));
	e.preventDefault();
});

jQuery(document).on('click', '.js-audio-control', function(e) {
	muteAudio(jQuery(this));
	e.preventDefault();
});

function pauseVideo() {
 
 jQuery(".videomodal").addClass("hidepopup");
 jQuery('#vi-banner-video').vimeo("unload")
 jQuery(".video-control.js-video-control").removeClass('playing').addClass('paused');
 console.log('trigger to pause');
}

$("#myModal").on('hide.bs.modal', function(){
	pauseVideo();
});

