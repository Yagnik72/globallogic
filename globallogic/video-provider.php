
<?php 

if( $args['videosource'] != "marketo-custom-video"){ ?>
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

<?php }elseif( $args['videosource'] == "marketo-custom-video" &&  isset($args['marketo_form_id'])){
$form_id = $args['marketo_form_id'];
?>
	<div class="modal videomodal" id="myModal-<?php echo $form_id; ?>" tabindex='-1'>
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class='embed-container container-video-section marketo-contact-form <?php echo 'video_'.$form_id?>' style="opacity: 0;visibility: hidden;padding: 0">
						<div class="container">
							<div class="row">
								<div class="col-md-12" style="min-height: 450px;display: flex;align-items: center;">
								<div id="marketo_contact">
									<form id="mktoForm_<?php echo $form_id; ?>" ></form>
									<script>
										jQuery(document).ready(function (e) {
											MktoForms2.loadForm("//app-ab27.marketo.com", "858-MOR-551", <?php echo $form_id; ?>, function (form){
												form.onSuccess(function() {
													
													jQuery('.video_<?php echo $form_id; ?>').html('<video width="100%" controls><source src="<?php echo $args['videolink']; ?>" type="video/mp4"></video>')

													// window.open("https://www.globallogic.com/wp-content/uploads/2022/08/Digitization-Transforming-Healthcare-Industry.pdf", '_blank');
													return false;	
												});
											});	
										});
									</script>
								</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

