<?php

function glo_content_types() {
	// if(is_admin()){		
		register_cpt_job();
		create_officesnew_taxonomy();
		create_job_categoriesnew_taxonomy();
		register_cpt_slider();
		register_cpt_g_news();
		register_cpt_profiles();
		register_cpt_partners();
		register_cpt_locations();
		register_cpt_what_we_do();
		register_cpt_our_work();
		register_cpt_client_logo();
		register_cpt_why_gl();
		register_cpt_testimonial();
		register_cpt_key_projects();
		register_cpt_blog_author();
		register_cpt_insight_section();
		register_cpt_training_courses();
		register_cpt_events();
	// }
}

add_action('init', 'glo_content_types');

function register_cpt_job() {	

	$labels = array( 
		'name' => __( 'Careers', 'globallogic' ),
		'singular_name' => __( 'Career', 'globallogic' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'author', 'title', 'editor', 'custom-fields'),
		'public' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-portfolio',
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'taxonomies' => array('officesnew','job_categoriesnew'),
		'rewrite' => array('slug' => 'careers', 'with_front' => FALSE),
		//'rewrite' => true,
		'menu_position' => 6,
		'map_meta_cap' => true
	);

	register_post_type( 'gl_career', $args );

}

function create_officesnew_taxonomy() {

	$labels = array(
		'name' => __( 'Locations', 'globallogic' ),
		'singular_name' => __( 'Location', 'globallogic' ),
		'search_items' =>  __( 'Search locations', 'globallogic' ),
		'all_items' => __( 'Locations', 'globallogic' ),
		'parent_item' => __( 'Country location', 'globallogic' ),
		'parent_item_colon' => __( 'Country location', 'globallogic' ),
		'edit_item' => __( 'Edit location', 'globallogic' ), 
		'update_item' => __( 'Update locaition', 'globallogic' ),
		'add_new_item' => __( 'New location', 'globallogic' ),
		'new_item_name' => __( 'Newlocation', 'globallogic' ),
		'menu_name' => __( 'Offices New', 'globallogic' ),
	);
	
	register_taxonomy('officesnew',array('gl_career'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'officesnew' ),
		'public' => true,
	));
}

function create_job_categoriesnew_taxonomy() {

	$labels = array(
		'name' => __( 'Job Categories', 'globallogic' ),
		'singular_name' => __( 'Job Category', 'globallogic' ),
		'search_items' =>  __( 'Search Job Categories', 'globallogic' ),
		'all_items' => __( 'Job Categories', 'globallogic' ),
		'parent_item' => __( 'Job Category', 'globallogic' ),
		'parent_item_colon' => __( 'Job Category', 'globallogic' ),
		'edit_item' => __( 'Edit Job Category', 'globallogic' ), 
		'update_item' => __( 'Update Job Category', 'globallogic' ),
		'add_new_item' => __( 'New Job Category', 'globallogic' ),
		'new_item_name' => __( 'New Job Category', 'globallogic' ),
		'menu_name' => __( 'Job Categories New', 'globallogic' ),
	);

	register_taxonomy('job_categoriesnew',array('gl_career'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_categoriesnew' ),
		'public' => true,
	));
	
	$labels1 = array(
		'name' => __( 'Job Skills', 'globallogic' ),
		'singular_name' => __( 'Job Skills', 'globallogic' ),
		'search_items' =>  __( 'Search Job Skills', 'globallogic' ),
		'all_items' => __( 'Job Skills', 'globallogic' ),
		'parent_item' => __( 'Job Skills', 'globallogic' ),
		'parent_item_colon' => __( 'Job Skills', 'globallogic' ),
		'edit_item' => __( 'Edit Job Skills', 'globallogic' ), 
		'update_item' => __( 'Update Job Skills', 'globallogic' ),
		'add_new_item' => __( 'New Job Skills', 'globallogic' ),
		'new_item_name' => __( 'New Job Skills', 'globallogic' ),
		'menu_name' => __( 'Job Skills', 'globallogic' ),
	);
	
	register_taxonomy('job_skills',array('gl_career'), array(
		'hierarchical' => true,
		'labels' => $labels1,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_skills' ),
		'public' => true,
	));
	
	$main_skills_labels = array(
		'name' => __( 'Main Skills', 'globallogic' ),
		'singular_name' => __( 'Main Skills', 'globallogic' ),
		'search_items' =>  __( 'Search Main Skills', 'globallogic' ),
		'all_items' => __( 'Main Skills', 'globallogic' ),
		'parent_item' => __( 'Main Skills', 'globallogic' ),
		'parent_item_colon' => __( 'Main Skills', 'globallogic' ),
		'edit_item' => __( 'Edit Main Skills', 'globallogic' ), 
		'update_item' => __( 'Update Main Skills', 'globallogic' ),
		'add_new_item' => __( 'New Main Skills', 'globallogic' ),
		'new_item_name' => __( 'New Main Skills', 'globallogic' ),
		'menu_name' => __( 'Main Skills', 'globallogic' ),
	);

	register_taxonomy('main_skills',array('gl_career'), array(
		'hierarchical' => true,
		'labels' => $main_skills_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'main_skills' ),
		'public' => true,
	));
	
	$labels2 = array(
		'name' => __( 'Job Page', 'globallogic' ),
		'singular_name' => __( 'Job Page', 'globallogic' ),
		'search_items' =>  __( 'Search Job Page', 'globallogic' ),
		'all_items' => __( 'Job Page', 'globallogic' ),
		'parent_item' => __( 'Job Page', 'globallogic' ),
		'parent_item_colon' => __( 'Job Page', 'globallogic' ),
		'edit_item' => __( 'Edit Job Page', 'globallogic' ),
		'update_item' => __( 'Update Job Page', 'globallogic' ),
		'add_new_item' => __( 'New Job Page', 'globallogic' ),
		'new_item_name' => __( 'New Job Page', 'globallogic' ),
		'menu_name' => __( 'Job Page', 'globallogic' ),
	);

	register_taxonomy('job_page',array('gl_career'), array(
		'hierarchical' => true,
		'labels' => $labels2,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_page' ),
		'public' => true,
	));
	
}

add_action('restrict_manage_posts','restrict_listings_by_business');
function restrict_listings_by_business() {
    global $typenow;
    global $wp_query;
    if ($typenow=='gl_job') {
    $taxonomy = 'offices';
    $term = isset($wp_query->query['offices']) ? $wp_query->query['offices'] :'';
    $business_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __("Show All Offices"),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'offices',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, 
            'hide_empty'      =>  true, 
        ));
    }
}
// Extra fields for offices Taxonomy ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//

/* Slider for Hero on front page */

function register_cpt_slider() {
	$labels = array( 
		'name' => __( 'Home Page Carousels', 'globallogic' ),
		'singular_name' => __( 'Home Page Carousel', 'globallogic' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title'),
		'public' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-media-document',
		'query_var' => true,
		'can_export' => true,
		'rewrite' => false,
		'menu_position' => 5,
		'map_meta_cap' => true
	);

	register_post_type( 'gl_slider', $args );

}

/* * ****************************** */

/* News */

function register_cpt_g_news() {
  $labels = array(
      'name' => __('News', 'globallogic'),
      'singular_name' => __('News', 'globallogic'),
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'supports' => array('title', 'excerpt', 'editor', 'custom-fields', 'thumbnail','revisions'),
      'public' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-admin-site-alt3',
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => array('slug' => '/about/news', 'with_front' => FALSE),
      'menu_position' => 5,
      'taxonomies' => array(''),
      'map_meta_cap' => true
  );

  register_post_type('news', $args);

	register_taxonomy(
		'embedded-category',
		array('gl_news', 'news', 'events'),
		array(
			'label' => __('Embedded Category'),
			'hierarchical' => true,
		)
	);
}

add_action( 'init', 'create_news_tax',0 );

function create_news_tax() {
  register_taxonomy( 
    'news-category',
    array( 'news' ),
    array(
      'label' => __( 'Category' ),
      'hierarchical' => true,
      'show_admin_column' => true,
    )
  );
}
/* * ****************************** */

/* Events */

function register_cpt_events() {
  $labels = array(
      'name' => __('Events', 'globallogic'),
      'singular_name' => __('Event', 'globallogic'),
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'supports' => array('title', 'excerpt', 'editor', 'custom-fields', 'thumbnail','revisions'),
      'public' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-editor-kitchensink',
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => array('slug' => '/about/events', 'with_front' => FALSE),
      'menu_position' => 5,
      'taxonomies' => array(''),
      'map_meta_cap' => true
  );

  register_post_type('events', $args);
}

/* * ****************************** */

/* Slider for Hero on front page */

function register_cpt_profiles() {
  $labels = array(
      'name' => __('Leaderships', 'globallogic'),
      'singular_name' => __('Leadership', 'globallogic'),
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'supports' => array('title', 'editor', 'custom-fields', 'thumbnail','revisions'),
      'public' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-welcome-learn-more',
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => array('slug' => '/about/leadership', 'with_front' => FALSE),
      'menu_position' => 5,
      'map_meta_cap' => true
  );

  register_post_type('gl_profile', $args);

}

function register_cpt_locations() {
  $labels = array(
      'name' => __('Locations', 'globallogic'),
      'singular_name' => __('Location', 'globallogic'),
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'supports' => array('title', 'editor', 'custom-fields', 'thumbnail','revisions'),
      'public' => true,
      'show_in_menu' => true,
      'has_archive' => false,
      'menu_icon' => 'dashicons-location',
      'query_var' => true,
      'can_export' => true,
      'rewrite' => array('slug' => '/about/locations', 'with_front' => FALSE),
      'menu_position' => 5,
      'map_meta_cap' => true
  );

  register_post_type('gl_location', $args);
}

function register_cpt_what_we_do() {
	register_post_type( 'what-we-do',
		array(
          'labels' => array(
            'name' => __( 'Services' ),
            'singular_name' => __( 'Services' )
          ),
          'public' => true,
          'has_archive' => false,
		  'menu_icon' => 'dashicons-media-interactive',
          'rewrite' => array('slug' => 'services','with_front' => true),
          'supports' => array('title', 'editor', 'revisions', 'author', 'excerpt', 'thumbnail'),
        )
      );
  $type = 'what-we-do';
  $types = 'what-we-dos';
  $labels = array(
      'name' => __('Services', 'globallogic'),
      'singular_name' => __('Services', 'globallogic'),
  );

  	register_taxonomy(
		'work-with-us-category',
		'what-we-do',
		array(
			'label' => __('Category'),
			'hierarchical' => true,
			'show_admin_column' => true,
		)
	);

	register_taxonomy(
		'marketplace',
		'what-we-do',
		array(
			'rewrite' => array('slug' => 'marketplace', 'with_front' => true,),
			'label' => __('Market place App'),
			'hierarchical' => true,
		)
	);
}

function register_cpt_our_work() {
  $type = 'our-work';
  $types = 'our-works';
  $labels = array(
      'name' => __('Work', 'globallogic'),
      'singular_name' => __('Work', 'globallogic'),
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'supports' => array('title', 'editor', 'thumbnail','revisions'),
      'public' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-pressthis',
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => array('slug' => '/work', 'with_front' => FALSE),
      'menu_position' => 8,
      'taxonomies' => array(),
      'map_meta_cap' => true
  );

  register_post_type($type, $args);

	register_taxonomy(
		'work-category',
		'our-work',
		array(
			'label' => __('Category'),
			'hierarchical' => true,
		)
	);
}

/* * ****************************** */
function register_cpt_client_logo(){
	register_post_type('clientlogo',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __('Client Logo'),
                    'singular_name' => __('Clienlogo')
                ),
                'public' => true,
                'has_archive' => true,
				'menu_icon' => 'dashicons-vault',
                'rewrite' => array('slug' => 'Clienlogo'),
                /* 'supports' => array( 'thumbnail' ), */
                'supports' => array('title', 'thumbnail', 'revisions'),
            )
    );
}

/* * ****************************** */

function register_cpt_testimonial() {
	register_post_type('testimonial',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __('Testimonial'),
                    'singular_name' => __('testimonial')
                ),
                'public' => true,
                'has_archive' => true,
				'menu_icon' => 'dashicons-testimonial',
                'rewrite' => array('slug' => 'testimonial'),
                /* 'supports' => array( 'thumbnail' ), */
                'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            )
    );
}

/* * ****************************** */

function register_cpt_key_projects() {
    register_post_type('key-projects',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Key Projects'),
				'singular_name' => __('key-projects')
			),
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-admin-network',
			'rewrite' => array('slug' => 'key-projects'),
			'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
		)
    );
}

/* * ****************************** */

function register_cpt_blog_author() {
	register_post_type('blogauthor',
            array(
                'labels' => array(
                    'name' => __('Insight Author'),
                    'singular_name' => __('Insight Author')
                ),
                'public' => true,
                'has_archive' => true,
				'menu_icon' => 'dashicons-welcome-write-blog',
                'rewrite' => array('slug' => 'insights/blogs/authors'),
                'supports' => array('title', 'editor', 'excerpt', 'revisions'),
            )
    );
}

/* * ****************************** */

function register_cpt_insight_section() {
	
	register_post_type('insightsection',
		array(
			'labels' => array(
				'name' => __('Insights'),
				'singular_name' => __('Insights')
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-media-spreadsheet',
			'rewrite' => array('slug' => 'insights', 'with_front' => true),
			// 'rewrite' => array('slug' => 'insights/%insight%', 'with_front' => true),
			'supports' => array('title', 'editor', 'revisions', 'author', 'excerpt', 'thumbnail'),
		)
    );

	register_taxonomy(
		'insight',
		'insightsection',
		array(
			'rewrite' => array('slug' => 'insights', 'with_front' => true,),
			'label' => __('Insight Category'),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'insight-subcats',
		'insightsection',
		array(
			'label' => __('Sub Category'),
			'hierarchical' => true,
			'has_archive' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			"rewrite" => array('slug' => 'insights/blogs/categories', 'with_front' => true,),
		)
	);

	register_taxonomy(
		'insight-industry',
		'insightsection',
		array(
			'label' => __('Industry'),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			"rewrite" => array('slug' => 'insights/blogs/industries', 'with_front' => true,),
		)
	);
}

/* * ****************************** */

function register_cpt_training_courses() {
	register_post_type('trainingcourses',
            array(
                'labels' => array(
                    'name' => __('Training Courses'),
                    'singular_name' => __('Training Courses')
                ),
                'public' => true,
                'has_archive' => false,
                'menu_icon' => 'dashicons-sos',
                'rewrite' => array('slug' => 'training-courses'),
                'supports' => array('title', 'editor', 'revisions', 'author', 'excerpt', 'thumbnail'),
            )
    );

	register_taxonomy(
		'courses',
		'trainingcourses',
		array(
			'label' => __('Courses'),
			'hierarchical' => true,
			'has_archive' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
		)
	);
}

/* * ****************************** */

function register_cpt_why_gl() {

    register_post_type('whygl',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __('Why GL'),
                    'singular_name' => __('Whygl')
                ),
                'public' => true,
                'has_archive' => true,
				'menu_icon' => 'dashicons-media-interactive',
                'rewrite' => array('slug' => 'Whygl'),
                /* 'supports' => array( 'thumbnail' ), */
                'supports' => array('title', 'thumbnail', 'revisions'),
            )
    );
}
/* * ****************************** */

function add_theme_caps() {

  // gets the administrator role
  $admins = get_role('administrator');
  $post_types = array();
  $post_types[] = array('singular' => 'job', 'plural' => 'jbs');
  $post_types[] = array('singular' => 'slider', 'plural' => 'sliders');
  $post_types[] = array('singular' => 'news', 'plural' => 'newss');
  $post_types[] = array('singular' => 'profile', 'plural' => 'profiles');
  $post_types[] = array('singular' => 'location', 'plural' => 'locations');
  $post_types[] = array('singular' => 'what-we-do', 'plural' => 'what-we-dos');
  $post_types[] = array('singular' => 'our-work', 'plural' => 'our-works');
  $post_types[] = array('singular' => 'gl-work-with-us', 'plural' => 'gl-work-with-uss');
  $post_types[] = array('singular' => 'landing', 'plural' => 'landings');

  foreach ($post_types as $type) {
    $admins->add_cap('edit_'.$type['singular']);
    $admins->add_cap('edit_'.$type['plural']);
    $admins->add_cap('edit_other_'.$type['plural']);
    $admins->add_cap('publish_'.$type['plural']);
    $admins->add_cap('read_'.$type['singular']);
    $admins->add_cap('read_private_'.$type['plural']);
    $admins->add_cap('delete_'.$type['singular']);
  }
}

add_action('admin_init', 'add_theme_caps');

/*******************custom post for partners************************/
function register_cpt_partners() {
  $labels = array(
      'name' => __('Partners', 'globallogic'),
      'singular_name' => __('Partners', 'globallogic'),
  );

  $args = array(
		  'labels' => $labels,
		  'hierarchical' => false,
		  'supports' => array('title', 'editor', 'custom-fields', 'thumbnail','revisions','excerpt'),
		  'public' => true,
		  'show_in_menu' => true,
		  'menu_icon' => 'dashicons-media-document',
		  'has_archive' => false,
		  'query_var' => true,
		  'can_export' => true,
		  'rewrite' => true,
		   'rewrite' => array('slug' => 'about/partners','with_front' => true),
		  'menu_position' => 5,
	);

  register_post_type('gl_partners', $args);
}
/* * ****************************** */