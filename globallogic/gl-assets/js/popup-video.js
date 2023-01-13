var selectVId = '';
var selectVSrc = '';
jQuery(document).ready(function () {


jQuery(document).on('click', '.js-video-control', function (e) {

    selectVId = $(this).data('vid');
    selectVSrc = $(this).data('source');

    if (selectVSrc == 'vimeosourcevideo') {
        $("#myModal-" + selectVId + " #vi-banner-video")[0].src = "https://player.vimeo.com/video/" + selectVId + "?autoplay=1&loop=0&title=0&byline=0&portrait=0&background=0";
    } else if (selectVSrc == 'youtubesourcevideo') {
        $("#myModal-" + selectVId + " #ply-video")[0].src = "https://www.youtube.com/embed/" + selectVId + "?rel=0&mute=0&autoplay=1";
    }

    playVideo(jQuery(this));
    e.preventDefault();
});

function playVideo(e) {
    jQuery('#myModal-' + selectVId + '.videomodal').removeClass("hidepopup");
    jQuery('#myModal-' + selectVId + ' .container-video-section').addClass("visible");
    if (selectVSrc == 'vimeosourcevideo') {
        // jQuery('#myModal-' + selectVId + ' #vi-banner-video').vimeo('play');
    } else if (selectVSrc == 'youtubesourcevideo') {
        var dataId = $('.video-section-' + selectVId + ' .video-control.js-video-control').attr("data-videosourec");
        jQuery('#myModal-' + selectVId + ' .embed-container iframe').attr('src', dataId);
    }

    jQuery('.video-section-' + selectVId + ' .video-control.js-video-control').removeClass('paused').addClass('playing');
    jQuery('.video-section-' + selectVId + ' #vi-video-1-container').attr('data-video-is-playing', true);
    jQuery('.video-section-' + selectVId + ' .video-control.js-video-control').css('opacity', '');
    jQuery('.video-section-' + selectVId + ' .video-control.js-video-control.playing').removeClass("video-control-show");
}

function pauseVideo(e) {
    jQuery('#myModal-' + selectVId + '.videomodal').addClass("hidepopup");
    if (selectVSrc == 'vimeosourcevideo') {
        jQuery('#myModal-' + selectVId + ' .embed-container iframe').attr('src', "");
    } else if (selectVSrc == 'youtubesourcevideo') {
        jQuery('#myModal-' + selectVId + ' .embed-container iframe').attr('src', "");
    }

    jQuery('.video-section-' + selectVId + ' .video-control.js-video-control').removeClass('playing').addClass('paused');
}


function muteAudio() {

    audioStatus = jQuery(".video-section-<?php echo $args['vidid']; ?> #vi-video-1-container").attr('data-audio-volume');

    if (audioStatus == 0) {

        jQuery('.video-section-' + selectVId + ' #vi-video-1-container').attr('data-audio-volume', 1);
        jQuery('#myModal-' + selectVId + ' #vi-banner-video').vimeo("setVolume", 1);
        jQuery('#myModal-' + selectVId + ' .audio-control.js-audio-control').removeClass('muted').addClass('unmuted');
    } else if (audioStatus == 1) {

        jQuery('.video-section-' + selectVId + ' #vi-video-1-container').attr('data-audio-volume', 0);
        jQuery('#myModal-' + selectVId + ' #vi-banner-video').vimeo("setVolume", 0);
        jQuery('#myModal-' + selectVId + ' .audio-control.js-audio-control').removeClass('unmuted').addClass('muted');
    }
}

jQuery('.modal .modal-header button').on('click', function(event){
    console.log(jQuery(this).attr('class'))
    pauseVideo(event);
    jQuery('#myModal-' + selectVId + '').modal('hide');
});

jQuery(document).on('keyup', function(event) { 
    if (event.key == "Escape") { 
        pauseVideo();
        jQuery('#myModal-' + selectVId + '').modal('hide');
    } 
});

});
