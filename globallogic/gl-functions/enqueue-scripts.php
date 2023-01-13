<?php
/**
 * Enqueue scripts and styles.
 */
function globallogic_scripts() {


    wp_enqueue_style('globallogic-style', get_stylesheet_uri(), array(), time());
    wp_style_add_data('globallogic-style', 'rtl', 'replace');

    // wp Enqueue
    wp_enqueue_script('globallogic-custom', get_template_directory_uri() . '/assets/js/gl-custom.js', array('jquery'), time(), true);
    wp_localize_script( 'globallogic-custom', 'ajax_object', array( 
                                                                    'ajax_url' => admin_url( 'admin-ajax.php' ) , 
                                                                    'root_url' => site_url(),
                                                                    'nonce' => wp_create_nonce( 'wp_rest' ),
                                                                    ));

    // Register flexible content style 
    wp_register_style('flexible-content-style', get_template_directory_uri() . '/gl-assets/css/flexible-content-sections.css', array(), time());

    wp_register_script('forms2-script', '//app-ab27.marketo.com/js/forms2/js/forms2.min.js', array(), time());
    
    // Script
    wp_register_script('globallogic-turtl-embed-v1', 'https://app-static.turtl.co/embed/turtl.embed.v1.js', array(), time(), true);

    wp_register_script('globallogic-popup-video', get_template_directory_uri() . '/gl-assets/js/popup-video.js' , array(), time(), true);

}

add_action('wp_enqueue_scripts', 'globallogic_scripts');


add_filter( 'script_loader_tag', function ( $tag, $handle ) {

	if ( 'globallogic-turtl-embed-v1' !== $handle ) {
		return $tag;
	}

	return str_replace( ' src', ' async data-turtl-script="embed" data-turtl-assets-hostname="https://assets.turtl.co"  src', $tag );

}, 10, 2 );