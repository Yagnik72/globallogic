<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GlobalLogic
 */

?>

<!-- <article id="post-<?php the_ID(); ?> " <?php post_class(); ?>> -->
	<div class="row">
		<?php /*<div class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div><!-- .entry-header -->
		
		<?php globallogic_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();
			?>
		</div><!-- .entry-content --> */ 
		
		get_template_part( 'part-atlassian-components' );
		?>
		
	</div>
	<!--</article> #post-<?php the_ID(); ?> -->
