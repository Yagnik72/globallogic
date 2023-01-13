<?php
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');
$section_description = get_sub_field('section_description');
$carousel_type = get_sub_field('carousel_type');
$carousels = get_sub_field('carousel');

?>
<section class="content <?php echo get_row_layout(); ?>" <?php echo $section_color; ?>>
    <div class="container">
        <?php if(!empty($section_heading) || !empty($section_description)){ ?>
            <div class="row heading-container">
                <div class="col-12 col-md-12 mb-2">
                    <?php if (!empty($section_heading)) { ?>
                        <h2 class="heading-text"><?php echo $section_heading; ?></h2>
                    <?php } ?>
                    <?php if (!empty($section_description)) { ?>
                        <?php echo $section_description; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if($carousel_type == "why_gl_carousel"){ ?>
            <div class="careerSlick-box">
                <div class="row grids grid-3">
                    <div class="" id="why_gl_carousel" style="padding-left: 0;">
                        <?php   
                            $i = 0;
                            foreach ($carousels  as $carousel) {                                    
                                $img_url = (!empty($carousel['image'])) ? $carousel['image'] : 'https://www.globallogic.com/wp-content/uploads/2019/10/no-image-available.png';
                                $title = $carousel['title'];
                                $description = $carousel['description'];
                                $link = (!empty($carousel['button']['button_url']) && isset($carousel['button']['button_url'])) ? $carousel['button']['button_url'] : 'javascript:void(0)' ;
                                $button_text = $carousel['button']['button_text'];
                                ?>
                                    <div class="grid">
                                        <div class="">
                                        <a class="offering_<?php echo $i+1;?>" href="<?php echo $link; ?>">
                                            <div class="img-container">
                                            <div class="img" style="background-image:url(<?php echo $img_url; ?>)"></div>
                                            </div>
                                            <div class="desc-container">
                                                <h3 class="grid-heading"><?php echo $title;?></h3>
                                                <p class="grid-description text-limit"> <?php echo $description; ?></p>
                                                <?php if($button_text != ""){  ?>
                                                    <p class="learn-more-link mt-2"><?php echo $button_text;  ?> <i class="fa fa-angle-right hero-arrow"></i></p>
                                                <?php } ?>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                <?php
                                $i++;
                            }
                        ?>
                    </div>
                </div>
                <?php if($i > 3) { ?>
                    <div class="carousel-nav bottom mt-2">
                        <a class="carousel-control-prev prev" role="button" data-slide="prev"> <i class="fa fa-angle-left" id="main_silder1_prev"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next next" role="button" data-slide="next"> <i class="fa fa-angle-right" id="main_silder1_next"></i>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                <?php } ?>   
            </div> 
        <?php }elseif ($carousel_type == "image_carousel") { ?> 
            <div class="image_carousel"> <?php
                if (!empty($carousels)) {
                    $height_px = get_sub_field('height_px');
                    $height_px_class = '';
                    if(in_array('yes', get_sub_field('image_fix_height')) && $height_px > 0  ){
                        $height_px_class = ($height_px > 0) ? 'style="height: '. $height_px .'px"' : '' ;
                    }
                    
                    ?>
                        <div class="image-logo-carousel" data-slideshow="<?php echo get_sub_field('slidestoshow'); ?>">
                            <?php
                                foreach ($carousels as $carousel) {
                                    if ($carousel['image'] != '') {
                                        ?>
                                            <div>
                                                <?php echo '<img src="' . $carousel['image'] . '" '.$height_px_class.'>'; ?>
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    <?php
                }
                ?>
            </div>
        <?php } elseif ($carousel_type == "related_group") { ?>
            <div class="related_group">
                <?php
                    $term_related = get_sub_field('catindustry_choices');
                    if($term_related){
                        $related = array();
                        foreach ($term_related as $slug) {
                            //$term = term_exists( '5164','insight-industry' );
                            $term = get_term_by('slug', $slug, 'insight-industry');
                            if ($term) {
                                array_push($related, $slug);
                            }
                        }
                        foreach ($term_related as $slug) {
                            $term = get_term_by('slug', $slug, 'insight-subcats');
                            if ($term) {
                                array_push($related, $slug);
                            }
                        }

                        $related_posts = array();
                        $rc_related_posts = array();
                        if (!empty($related)) {
                            // get post bye post ID
                            $post_object = get_post(get_the_ID());

                            if ($post_object->post_type == 'what-we-do') {
                                $relate_type = array('what-we-do', 'insightsection', 'page');
                            } else {
                                $relate_type = array('what-we-do', 'our-work', 'insightsection', 'page');
                            }

                            $meta_query = array('relation' => 'OR');
                            foreach ($related as $item) {
                                $meta_query[] = array(
                                    'key' => 'catindustry_choices',
                                    'value' => $item,
                                    'compare' => 'LIKE',
                                );
                            }

                            $related_posts = get_posts(array(
                                'numberposts' => 8,
                                'post_type' => $relate_type,
                                'fields' => 'ids',
                                'meta_query' => $meta_query,
                            ));

                            $catindustry_choices_count = 0;
                            $catindustry_choices_array = array();

                            foreach ($related_posts as $post_ID) {
                                // array push
                                $rc_related_posts[] =  array(
                                    'post_ID' => $post_ID,
                                    'title' => get_the_title($post_ID),
                                    'form' => 'catindustry_choices'
                                );

                                // for condition check
                                $catindustry_choices_array[] = $post_ID;
                                $catindustry_choices_count++;
                            }
                            wp_reset_postdata();
                    
                            if($catindustry_choices_count < 8){
                                $post_par_page = 8 - $catindustry_choices_count;


                                $getpostwhatwedo = get_posts(
                                    array(
                                        'post_type' => 'insightsection',
                                        'posts_per_page' => $post_par_page,
                                        'order_by' => 'date',
                                        'post__not_in' => $catindustry_choices_array,
                                        'order' => 'DESC'
                                    )
                                );

                                foreach ($getpostwhatwedo as $post) : setup_postdata($post);

                                    // array push
                                    $rc_related_posts[] = array(
                                        'post_ID' => get_the_ID(),
                                        'title' => get_the_title(),
                                        'form' => 'latest_choices_data'
                                    );
                                    
                                endforeach;
                                wp_reset_postdata();
                            }

                        }                                

                        if($rc_related_posts){
                            ?>
                                    <div class="row grids grid-3" id="relatedContentSlick">
                                        <?php
                                            $x = 0;
                                            foreach ($rc_related_posts as $re_post) {

                                                $postID = $re_post['post_ID'];
                                                if ( get_post_status ( $postID ) == 'publish' ) {
                                                    $main_cat = wp_get_post_terms($postID, array('news-category','embedded-category','marketplace','insight', 'work-with-us-category', 'work-category'), array('fields' => 'all'));
                                                    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($postID), 'medium');
                                                    $image_alt = get_post_meta(get_post_thumbnail_id($postID), '_wp_attachment_image_alt', TRUE); 
                                                    $turtl_doc = get_field('turtl_code', $postID);
                                                    $href_value = "";
                                                    $target_blank="";
                                                    if (isset($thumbnail[0]) != '') {
                                                        $thu = esc_url($thumbnail[0]);
                                                    } else {
                                                        $thu = "https://www.globallogic.com/wp-content/uploads/2019/10/no-image-available.png";
                                                    }

                                                    // Class for img
                                                    $dcats = array();
                                                    foreach ($main_cat as $cat) {
                                                        $dcats [] = $cat->slug;
                                                    }
                                                    $cat_class = '';
                                                    if (in_array("digital-advisory-assessments", $dcats) || in_array("digital-accelerators", $dcats)) {
                                                        $cat_class = "da-img";
                                                    }
                                                    
                                                    ?> 
                                                    <div class="grid">
                                                        <div class="">
                                                            <div class="img-container <?php echo $cat_class; ?>">
                                                                <?php
                                                                    if($turtl_doc ){
                                                                        echo $turtl_doc;
                                                                        $a = new SimpleXMLElement($turtl_doc);
                                                                        $href_value = get_the_permalink($postID);
                                                                    }else{
                                                                        echo "<a class='offering_$x' href='".get_the_permalink($postID)."'>";
                                                                            $href_value = get_the_permalink($postID);
                                                                            $target_blank = '';
                                                                            echo "<div class='img' style='background-image:url(".$thu.")'></div>";
                                                                    }
                                                                    if($turtl_doc){
                                                                    }else{
                                                                        echo "</a>";
                                                                    }
                                                                    if (count($main_cat) == 2) {
                                                                        $cat = $main_cat[1]->name;
                                                                    } elseif (count($main_cat) == 1) {
                                                                        $cat = $main_cat[0]->name;
                                                                    } else {
                                                                        if(isset($main_cat[0]->name) && !empty($main_cat[0]->name)){
                                                                            $cat = $main_cat[0]->name;
                                                                        }else{
                                                                            $cat = '';
                                                                        }
                                                                    }
                                                                    if ($cat) {
                                                                        echo "<span class='main_cat'>" . $cat . "</span>";
                                                                    }
                                                                ?>
                                                            </div>
                                                            <div class="desc-container">
                                                                <a class="" href="<?php echo $href_value; ?>" <?php echo $target_blank; ?>><h3 class="grid-heading"><?php echo get_the_title($postID); ?></h3></a>
                                                                <a class="" href="<?php echo $href_value; ?>" <?php echo $target_blank; ?>>
                                                                    <p class="grid-description text-limit">
                                                                        <?php
                                                                            $get_the_excerpt = get_the_excerpt($postID);
                                                                            if(empty($get_the_excerpt)){
                                                                                $my_post = get_post($postID);
                                                                                $getcontent = wp_strip_all_tags($my_post->post_content);
                                                                                $gete = getExcerpt($getcontent);
                                                                                echo wp_strip_all_tags($gete);

                                                                                if(empty($gete)){
                                                                                    echo get_field( "content_short_description", $postID );
                                                                                }
                                                                            }else{
                                                                                echo wp_strip_all_tags($get_the_excerpt);
                                                                            }
                                                                        ?> 
                                                                    </p>
                                                                </a>
                                                                <a class="" href="<?php echo $href_value; ?>" <?php echo $target_blank; ?>><p class="learn-more-link"><?php echo of_get_option('general_learn_more_text'); ?> <i class="fa fa-angle-right hero-arrow"></i></p></a>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <?php $x++; 
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php if($x > 3){ ?>
                                        <div class="carousel-nav bottom">
                                            <a class="carousel-control-prev prev" role="button" data-slide="prev"> <i class="fa fa-angle-left" id="main_silder1_prev"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next next" role="button" data-slide="next"> <i class="fa fa-angle-right" id="main_silder1_next"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>	
                                    <?php } ?>
                            <?php
                        }
                    }
                ?>
            </div>
        <?php } elseif ($carousel_type == "testimonial_carousel") { ?>
            <div class="testimonial-carousel">
                <?php
                foreach ($carousels as $carousel) {
                    $img_url = (!empty($carousel['image'])) ? $carousel['image'] : home_url() . '/wp-content/uploads/2019/10/no-image-available.png';
                    $title = $carousel['title'];
                    $description = $carousel['description'];
                    $designation = $carousel['designation'];
                    $image_class = '';
                    $image_style = $carousel['image_style'];
                    
                    foreach ($image_style as $img_class) {
                        if ($img_class == "Crop image to round shape") {
                            $image_class .= " img-crop-round";
                        } elseif ($img_class == "Image border") {
                            $image_class .= " img-border";
                        }
                    }
                    ?>
                    <div class="slick-slide">
                        <div class="row flex-desktop">
                            <div class="col-12 col-lg-5">
                                <img src="<?php echo $img_url; ?>" class="<?php echo $image_class; ?>" alt="Testimonial">
                            </div>
                            <div class="col-12 col-lg-7 quote-section">
                                <?php
                                if (isset($carousel['want_quotes_image'][0]) && $carousel['want_quotes_image'][0] == 'yes') {
                                    ?>
                                    <img src="https://www.globallogic.com/wp-content/uploads/2019/10/new-quote.png" alt="quote" class="quoteimg img-quote">
                                    <?php
                                }
                                ?>
                                <p class="carousel-text"><b><?php echo $title; ?></b></p>
                                <p class="carousel-text"><?php echo $description; ?></p>
                                <p class="carousel-text"><b><?php echo $designation; ?></b></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>