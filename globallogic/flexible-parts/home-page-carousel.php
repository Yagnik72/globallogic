<section class="<?php echo get_row_layout(); ?>">
<?php $args = array(
    'post_type' => 'gl_slider',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);
$post_query = new WP_Query($args);
?>
<section id="hero" class="homepage">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
        <div class="home-page-carousel-inner">
            <?php
            $i = 0;
            if ($post_query->have_posts()) {
                while ($post_query->have_posts()) {
                    $post_query->the_post();
                    $hero_content_width = get_field('hero_content_width');
                    if (!$hero_content_width) {
                        $hero_content_width = "6";
                    }
                    $hero_content_width = "6";
                    $image = get_field('hero_image');
                    $size = 'full';
                    $slider_image = wp_get_attachment_image($image, $size);
                    $hero_image = wp_get_attachment_url($image);
                    $herourl = get_field_object('hero_link_url');
                    $tab_image = get_field('hero_tab_image_services');
                    $mobile_image = get_field('hero_mobile_image_services');
                    if (!$hero_image) {
                        $hero_image = home_url() . '/wp-content/uploads/2019/02/Homepage-Banner-min.jpg';
                    }
                    if (!$tab_image) {
                        $tab_image = home_url() . '/wp-content/uploads/2019/02/Homepage-Banner-min.jpg';
                    }
                    if (!$mobile_image) {
                        $mobile_image = home_url() . '/wp-content/uploads/2019/02/Homepage-Banner-min.jpg';
                    }
                    $current_post_id = $post->ID;
                    ?>

                    <div class="home-caro">
                        <style>
                            .hero-image_<?php echo $i ?>{
                                background: linear-gradient(45deg, rgb(0 0 0 / 50%), rgb(0 0 0 / 50%)), url(<?php echo $hero_image; ?>) !important;
                                /*background-image: url(<?php //echo $hero_image; ?>) !important;*/
                                background-repeat: no-repeat;
                                background-size: cover !important;
                            }
                            @media only screen and (min-device-width: 300px) and (max-device-width: 767px){
                                .hero-image_<?php echo $i ?>{
                                    background-image: url(<?php echo $mobile_image; ?>) !important;
                                    background-position: 60% 0 !important;
                                    background-size: cover !important;
                                }
                            }
                            @media only screen and (min-device-width: 300px) and (max-device-width: 767px) and (orientation:landscape) {
                                .hero-image_<?php echo $i ?>{
                                    background-image: url(<?php echo $hero_image; ?>) !important;
                                }
                            }
                            @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation:portrait) {
                                .hero-image_<?php echo $i ?>{
                                    background-image: url(<?php echo $tab_image; ?>)!important;
                                    background-position: 60% 0 !important;
                                    background-size: cover !important;
                                }
                            }
                            @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation:landscape) {
                                .hero-image_<?php echo $i ?>{
                                    background-image: url(<?php echo $hero_image; ?>) !important;
                                }
                            }
                        </style>           
                        <div class="home-hero-image hero-image_<?php echo $i ?> only-banner-desktop">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-<?php echo $hero_content_width; ?> col-lg-<?php echo $hero_content_width; ?> desc-box">
                                        <div class="home-main-hero-text">
                                            <div class="hero-text">
                                                <?php if (get_field('display_covid_button') == 'display covid') { ?>
                                                    <div class="covid only-in-desktop">
                                                        <div class="">
                                                            <a href="https://www.globallogic.com/coronavirus/" class="covid-button"><?php echo of_get_option('general_covid_button_text'); ?></a>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                <?php } ?>
                                                <p class="hero-content">
                                                    <?php
                                                    if (get_field("desktop_banner_logo")) {
                                                        $image_url = get_field('desktop_banner_logo');
                                                        $image_id = attachment_url_to_postid($image_url);
                                                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true)
                                                        ?>
                                                        <img class="meelogic alignleft  wp-image-38199" loading="lazy" src='<?php echo get_field("desktop_banner_logo"); ?>' alt='<?php echo $image_alt; ?>' width="<?php echo get_field("logo_width"); ?>">
                                                    <?php } ?> 
                                                    <?php echo get_field("hero_title"); ?><span></span>
                                                </p>
                                                <p class="hero-description"><?php echo get_field("hero_text"); ?></p>
                                                <?php 
                                                
                                                if (get_field('hero_link_option', $current_post_id) == "Hero Link by URL") { ?>
                                                    <p class="hero-btn"><a href="<?php echo $herourl['value']; ?>" target="_blank">
                                                    <?php echo get_field("hero_link_text"); ?><i class="fa fa-angle-right hero-arrow"></i></a>
                                                    </p>
                                                <?php } elseif (get_field('hero_link_option', $current_post_id) == "Hero Link by Search") { ?>
                                                    <p class="hero-btn"><a href="<?php echo get_the_permalink(get_field('hero_link', $current_post_id)) ?>" target="_blank">
                                                        <?php echo get_field("hero_link_text"); ?><i class="fa fa-angle-right hero-arrow"></i></a>
                                                    </p>
                                                <?php } elseif (get_field('video_provider', $current_post_id)) {
                                                    $videosource = "";
                                                    $video_provider = get_field('video_provider', $current_post_id);
                                                    if ($video_provider['select_video_type'] == 'vimeo') {
                                                        $videosource = "vimeosourcevideo";
                                                        $vidid = $video_provider['video_id'];
                                                        if ($vidid) {
                                                            ?>
                                                            <div class="video-section-<?php echo $vidid ?>">
                                                                <a class="common-video video-control js-video-control paused" data-videosourec="https://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=0&loop=0&title=0&byline=0&portrait=0&background=0" data-vid="<?php echo $vidid; ?>" data-source="<?php echo $videosource; ?>" data-bs-toggle="modal" data-bs-target="#myModal-<?php echo $vidid; ?>" data-keyboard="true">
                                                                    <p class="hero-btn">
                                                                        <?php
                                                                            if ($vidid) {
                                                                                echo get_field("hero_video_btn_text");
                                                                                ?><i class="fa fa-angle-right hero-arrow"></i><?php 
                                                                            } 
                                                                        ?>
                                                                    </p>
                                                                </a>
                                                            </div>
                                                            <?php
                                                        }
                                                    }

                                                    if ($video_provider['select_video_type'] == 'youtube') {
                                                        $videosource = "youtubesourcevideo";
                                                        $vidid = $video_provider['video_id'];
                                                        ?>
                                                        <div class="video-section-<?php echo $vidid ?>">
                                                            <a class="common-video video-control js-video-control paused" data-vid="<?php echo $vidid; ?>" data-source="<?php echo $videosource; ?>" data-videosourec="https://www.youtube.com/embed/<?php echo $vidid; ?>?rel=0&mute=0&autoplay=1" data-bs-toggle="modal" data-bs-target="#myModal-<?php echo $vidid; ?>" data-keyboard="true">
                                                                <p class="hero-btn">
                                                        <?php
                                                        if ($vidid) {
                                                            echo get_field("hero_video_btn_text");
                                                            ?><i class="fa fa-angle-right hero-arrow"></i><?php 
                                                        } ?>
                                                                </p>
                                                            </a>
                                                        </div>
                                                    <?php }
                                                }
                                                
                                                if (get_field('display_covid_button') == 'display covid') { ?>
                                                    <a href="https://www.globallogic.com/coronavirus/" class="covid-button-mobile only-in-mobile">
                                                        <?php echo of_get_option('general_covid_button_text'); ?></a> <?php 
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
        $i++;
    }
}
wp_reset_query();
?>
        </div>
    </div>
</section>

<?php
$args1 = array(
    'post_type' => 'gl_slider',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);
$post_query1 = new WP_Query($args1);
if ($post_query1->have_posts()) {
    while ($post_query1->have_posts()) {
        $post_query1->the_post();
        $current_post_id1 = $post->ID;
        if (get_field('hero_link_option', $current_post_id1) == "Hero Video Popup") {
            $videosource = "";
            $video_provider = get_field('video_provider', $current_post_id1);
            $vidid = $video_provider['video_id'];
            if ($video_provider['select_video_type'] == 'vimeo') {
                $videosource = "vimeosourcevideo";
            } elseif ($video_provider['select_video_type'] == 'youtube') {
                $videosource = "youtubesourcevideo";
            }
            get_template_part("video-provider", null ,array('vidid' => $vidid, 'videosource' => $videosource));
        }
    }
}
wp_reset_query();
?>



</section>