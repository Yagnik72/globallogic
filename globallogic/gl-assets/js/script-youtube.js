jQuery(".inner .video-play-icon").click(function() {
	jQuery(".dropdown-menu").removeClass("show");
	jQuery(".dropdown-toggles").removeClass("open");
});

$(document).on('keyup', function(event) { 
	if (event.key == "Escape") { 
		pauseVideo();
		$('#myModal').modal('hide');
	} 
}); 

function playVideo() {
	jQuery(".videomodal").removeClass("hidepopup");
	console.log('trigger to play');
	var dataId = $(".video-control.js-video-control").attr("data-videosourec");
	jQuery(".embed-container iframe").attr('src',dataId);
	jQuery('.container-video-section').addClass("visible");
	jQuery(".video-control.js-video-control").removeClass('paused').addClass('playing');
	jQuery('#vi-video-1-container').attr('data-video-is-playing', true);
	jQuery('.video-control.js-video-control').css('opacity', '');
	jQuery('.video-control.js-video-control.playing').removeClass("video-control-show");
}


function pauseVideo() {
	jQuery(".videomodal").addClass("hidepopup");
	jQuery(".embed-container iframe").attr('src',"");
	jQuery(".video-control.js-video-control").removeClass('playing').addClass('paused');
	console.log('trigger to pause');
}

jQuery(document).on('click', '.js-video-control', function(e) {
	playVideo(jQuery(this));
	e.preventDefault();
});

$("#myModal").on('hide.bs.modal', function(){
	pauseVideo();
});