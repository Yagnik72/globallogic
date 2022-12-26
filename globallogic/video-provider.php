<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/popup-video.js?v=<?php echo time(); ?>"></script>

<div class="modal videomodal" id="myModal-<?php echo $args['vidid']; ?>" tabindex='-1'>
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class='embed-container container-video-section' style="opacity: 0;visibility: hidden;padding: 0">

					<?php if($args['videosource'] =='vimeosourcevideo') {?>

						<iframe id="vi-banner-video" data-cookieconsent="necessary" width="1920" height="1080" src='' allow="autoplay; fullscreen;"></iframe>

					<?php }?>

					<?php if($args['videosource'] =='youtubesourcevideo') {?>

						<iframe id="ply-video" width="100%" height="100%" src="" data-cookieconsent="necessary" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					<?php }?>

				</div>
			</div>
			
		</div>
	</div>
</div>


