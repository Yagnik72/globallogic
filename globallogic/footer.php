<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GlobalLogic
 */
?>

<footer class="footer mt-auto desktop-footer content" style="background-color: #414042;">
	<div class="container top">
		<div class="top-box" id="">
		<div class="top-pos" id="go-top">
			<button id="gotoTopBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
		</div>
		</div>
	</div>
	<section class="footer-first">
		<div class="container">
			<div class="row footer-first">
				<div class="col-md-6">
					<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					?>
					<a class="navbar-brand" href="<?php echo site_url('/'); ?>">
						<img src="<?php echo esc_url( $logo[0] );?>" class="custom-logo svg-logo-desktop" width="196" height="45" alt="<?php echo get_bloginfo( 'name' ); ?>" title="GlobalLogic">
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="footer-second">
		<div class="container">
			<div class="row">
			<div class="col-md-2 col-4 order-2 order-sm-1 order-md-1 order-lg-1">
				<div class="menu-footer-menu-container">
					<div class="menu-footer-menu-container">
					<?php 
						wp_nav_menu(array(
							'menu'   => 'Footer Col 1',
							'menu_class' => 'footer-list'
						));
					?>
					</div>				
				</div>
			</div>
			<div class="col-md-5 col-8 order-3 oorder-sm-2 order-md-2 order-lg-2">
				<div class="menu-footer-menu-two-container">
					<div class="menu-footer-menu-two-container">
					<?php 
						wp_nav_menu(array(
							'menu'   => 'Footer Col 2',
							'menu_class' => 'footer-list'
						));
					?>
					</div>               
				</div>
			</div>
			<div class="col-md-5 order-1 order-lg-3 order-sm-3 order-md-3 footer-social">
				<?php $social_share_links = get_field('social_share_links', 'options'); ?>
				<div class="social-icons">
					<?php 
						if(!empty($social_share_links['linkedin'])){
							echo '<a href="'.$social_share_links['linkedin'].'" target="_blank"><i class="fa fa-linkedin round fa-space"></i></a>';
						}
						if(!empty($social_share_links['twitter'])){
							echo '<a href="'.$social_share_links['twitter'].'" target="_blank"><i class="fa fa-twitter round fa-space"></i></a>';
						}
						if(!empty($social_share_links['facebook'])){
							echo '<a href="'.$social_share_links['facebook'].'" target="_blank"><i class="fa fa-facebook-f round fa-space"></i></a>';
						}
						if(!empty($social_share_links['youtube'])){
							echo '<a href="'.$social_share_links['youtube'].'" target="_blank"><i class="fa fa-youtube round fa-space"></i></a>';
						}
						if(!empty($social_share_links['instagram'])){
							echo '<a href="'.$social_share_links['instagram'].'" target="_blank"><i class="fa fa-instagram round"></i></a>';
						}
						if(!empty($social_share_links['telegram'])){
							echo '<a href="'.$social_share_links['telegram'].'" target="_blank"><i class="fa fa-telegram round"></i></a>';
						}
					?>			
				</div>
				<div class="footer-subscribe">
					<div class="form-subscribe">
						<!-- <div class="">
								<a href='https://www.globallogic.com/ua/contact/news-subscribe/' class='btn ua-btn-footer btn-rev'>Subscribe News</a>
							</div> -->
					</div>
				</div>
				<div class="copy-right only-desktop">
					<p class="copy-right-text"><?php echo date("Y") .' '. get_field( "footer_copyright_text","options"); ?></p>
				</div>
			</div>
			<div class="col-md-5 order-4 order-lg-4 order-sm-4 order-md-4 footer-social only-mobile">
				<div class="copy-right">
					<p class="copy-right-text"><?php echo date("Y").' '. get_field( "footer_copyright_text","options"); ?></p>
				</div>
			</div>
			</div>
		</div>
	</section>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
