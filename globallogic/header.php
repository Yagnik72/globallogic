<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GlobalLogic
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/menu.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/slick.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/slick-theme.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/style.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/responsive.css">

        <?php  if(site_url() =='https://www.globallogic.com/ua' ){
			echo '<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700;800&display=swap" rel="stylesheet">';
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/gl-assets/css/fonts/opensans-fonts.css">';
		}elseif(site_url() =='https://www.globallogic.com/jp'){
			echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">';
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/gl-assets/css/fonts/jpdm-fonts.css">';
		}else{ 
			echo '<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">';
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/gl-assets/css/fonts/dm-fonts.css">';	
		} ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/bootstrap-multiselect.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/gl-assets/css/cookiebot.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/jquery.min.js" ></script> 
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/bootstrap.min.js" ></script> 
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/csp-custom.js" ></script> 
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/bootstrap-multiselect.js"></script>  
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/gl-assets/js/pdfobject.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/gl-assets/js/slick.min.js"></script> 
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light nav-top fixed-top">
                    <div class="container">
                    <?php
                        $logo_link= site_url('/');
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    ?>
                        <a class="navbar-brand logo" href="<?php echo $logo_link; ?>">
                            <img src="<?php echo esc_url( $logo[0] );?>" class="custom-logo svg-logo-desktop" width="196" height="45" alt="<?php echo get_bloginfo( 'name' ); ?>" title="GlobalLogic-Logo-White | GlobalLogic">
                        </a>
                        <!-- Icon -->
                        <div class="toggle-navi"><div class="burger"></div></div>
                        <!-- Links -->
                        <div class="collapse navbar-collapse" id="nav-content">
                            <div class="navbar-nav navbar-font navbar-custom-new ml-auto">
                                <?php
                                    function add_classes_on_li($classes, $item, $args) {
                                        $classes[] = 'nav-item';
                                        return $classes;
                                    }
                                    add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);
                                    function add_classes_on_a($ulclass) {
                                    return preg_replace('/<a /', '<a class="nav-link" ', $ulclass);
                                    }
                                    add_filter('wp_nav_menu', 'add_classes_on_a');
                                    function change_submenu_class($menu) {  
                                    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);  
                                    return $menu;  
                                    }  
                                    add_filter('wp_nav_menu','change_submenu_class'); 

                                    wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'navbar-nav add_my_customize', 'nav_menu_css_class' => 'nav-item','wp_nav_menu' => 'nav-link', 'menu_id' => 'primary-menu'));
                                    // $sites_list =  explode("\n",of_get_option('regional_sites'));   
                                ?>
                            </div>
                        </div>
                </nav>
            </header>
