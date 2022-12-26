<?php

add_action('after_setup_theme', 'globallogic_setup');

function globallogic_setup() {

    load_theme_textdomain('globallogic', get_template_directory() . '/languages');

    register_nav_menu('primary', __('Navigation Menu', 'globallogic'));
    
    add_theme_support('post-thumbnails');
    // Theme logo
    add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
    );
}

// /**
//  * add Query var
//  * 
//  * @return string
// */
// function my_query_vars($vars) {
//     $vars[] = "careers";

//     return $vars;
// }
// add_filter('query_vars', 'my_query_vars');

// /**
//  * Set query end point
// */
// function my_rewrite_endpoint(){
//     global $wp_rewrite;
//     // Use EP_PERMALINK | EP_PAGES for pages and posts both
//     add_rewrite_endpoint( 'careers', EP_ROOT | EP_PAGES );

//     // add_rewrite_endpoint( 'careers-yp', EP_PERMALINK | EP_PAGES );
//     // add_rewrite_endpoint( 'no', EP_PAGES );
//     $wp_rewrite->flush_rules();


// }
// add_filter('init','my_rewrite_endpoint');

// add_action( 'template_include', 'my_custom_template_description', 99 );

// function my_custom_template_description($template){ // - Yagnik
    
    
//     if ( get_query_var( 'careers', false ) !== false ) {

//         return get_template_directory() . '/careers-yp.php';
        
//     }

//     return $template;
// }


/**
 *  Function to get post object by slug 
 */
function get_post_by_slug($slug, $post_type = 'post') {
    $posts = get_posts(array(
        'name' => $slug,
        'posts_per_page' => 1,
        'post_type' => $post_type,
        'post_status' => 'publish'
    ));

    if (!$posts) {
        return '';
    }

    return $posts[0];
}