<?php
$background_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');
$select_data_source = get_sub_field('select_data_source');
$is_turtl_doc = false;
$block_listing_dynamic = get_sub_field('block_listing_dynamic');
$want_section_black_and_white = (get_sub_field('want_section_black_and_white') == "yes") ? 'blackandwhite' : '';
?>
<section id="our-craft" class="content <?php echo get_row_layout(); ?>" <?php echo $background_color; ?>>
    <div class="container">
        <div class="row grids <?php echo $want_section_black_and_white; ?> grid-3">
            <div class="grid">
                <div class="">
                    <div class="col-heading">
                        <h2 class="heading-text weshare-text"><?php echo $section_heading; ?> </h2>
                    </div>
                </div>
            </div>
            <?php
                if($select_data_source == "Block Listing Dynamic"){
                    $args = array(
                        'post_type' => $block_listing_dynamic['dy_post_type'],
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'posts_per_page' => 5,
                    );

                    if($block_listing_dynamic['dy_taxonomy'] != " "){
                        $args['tax_query'] = array(
                                array(
                                'taxonomy' => $block_listing_dynamic['dy_taxonomy'],
                                'field' => 'slug',
                                'terms' => 'blogs',
                            )
                        );
                    }
                    
                    $query = new WP_Query($args);
                    $classdynamic = 1;
                    if ($query->have_posts()) {

                        while ($query->have_posts()) {
                            $query->the_post();

                            $id = get_the_ID();
                            $thumb_img = get_post_meta($id, 'thumbnail_image', true);
                            $url = wp_get_attachment_url(get_post_thumbnail_id($id), 'medium');
                            $thumb = wp_get_attachment_image($thumb_img, 'medium');
                            $main_cat = wp_get_post_terms($id, 'insight', array('fields' => 'all'));
                            $turtl_doc = get_field('turtl_code', $id);
                            
                            $get_the_excerpt = get_the_excerpt();
                            $get_the_content = get_the_content();

                            ?>
                            <div class="grid">
                                <div class="new-blogimg">
                                    <?php
                                    if($turtl_doc){
                                        $is_turtl_doc = true;
                                    }else{
                                        ?><a class="<?php echo "blogs_home_" . $classdynamic; ?>" href="<?php the_permalink(); ?>"><?php
                                    }
                                    ?>
                                        <div class="img-container">
                                            <?php
                                                $getiturl = get_the_post_thumbnail_url($id, 'full');

                                                if($turtl_doc ){
                                                    echo $turtl_doc;
                                                }else{
                                                    if ($getiturl != '') { ?>
                                                        <div class="img <?php echo "blogs_home_" . $classdynamic; ?>" style="background-image:url('<?php echo $getiturl; ?>')"></div>
                                                    <?php } else { ?>
                                                        <div class="img <?php echo "blogs_home_" . $classdynamic; ?>" style="background-image:url('<?php echo site_url(); ?>/wp-content/themes/glchild/img/default-image.jpg')"></div>
                                                    <?php } 
                                                }
                                            ?>
                                        </div>
                                        <?php 
                                            if($turtl_doc){
                                                $a = new SimpleXMLElement($turtl_doc);
                                                // $href_value =$a['href'];
                                                $href_value = get_the_permalink();
                                    echo "<a class='blogs_home_$classdynamic' href='".$href_value."'>";
                                            }
                                        ?>
                                        <div class="desc-container">
                                            <?php
                                                if(in_array("title", $block_listing_dynamic['want_data'])){
                                                    echo '<h3 class="grid-heading">' .$post->post_title .'</h3>';
                                                }
                                                if(in_array("desc", $block_listing_dynamic['want_data'])){
                                                    if($get_the_excerpt){
                                                        echo "<p class='grid-description text-limit'>". $get_the_excerpt ."</p>";	
                                                    }else{
                                                        echo "<p class='grid-description text-limit'>". $get_the_content ."</p>";	
                                                    } 
                                                }
                                                if(in_array("btn", $block_listing_dynamic['want_data'])){
                                                    echo '<p class="grid-readmore">';
                                                    if($block_listing_dynamic['button_text'] == ""){ 
                                                        echo '<span class="blog-texts">' . substr($main_cat[0]->name, 0, -1) . '</span>';
                                                    }else{
                                                        echo '<span class="blog-texts">' . $block_listing_dynamic['button_text'] . '</span>';
                                                    }
                                                    echo '<i class="fa fa-angle-right hero-arrow"></i>
                                                    </p>';
                                                }
                                            ?>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <?php
                            $classdynamic++;
                        }
                    }
                    wp_reset_postdata();

                }elseif($select_data_source == "Block Listing Manually"){

                    $block_listing_manually = get_sub_field('block_listing_manually');
                    foreach ($block_listing_manually as $we_can_helps) {                                
                        
                        $we_can_help_title = $we_can_helps['we_can_help_title'];
                        $we_can_help_description = $we_can_helps['we_can_help_description'];
                        if($we_can_helps['link_option'] == "Link by URL"){
                            $link_url = $we_can_helps['link_url'];                                        
                            
                            ?>
                                <div class="grid">
                                    <div class="">
                                        <div class="img-container">
                                            <?php if( isset($we_can_helps['is_turtl_url'][0]) && $we_can_helps['is_turtl_url'][0] == "yes" ){ ?>
                                                <a class="turtl-embed" target="_blank" style="width: 340px; max-width: 100%;" data-turtl-embed-type="animation" 
                                                    data-turtl-link-text="Click to read" data-turtl-width="340" 
                                                    data-turtl-animation-mode="hover" data-turtl-color="#1eb1c7"
                                                    data-turtl-story-id="<?php echo $we_can_helps['turtl_story_id']; ?>"
                                                    href="<?php echo $link_url; ?>" >Click to read Digital Biomarkers</a>
                                            <?php }else{ ?>
                                                <a class="offering_2" href="<?php echo $link_url; ?>">
                                                    <div class="img" style="background-image:url(<?php echo $we_can_helps['we_can_help_image']['url']; ?>)"></div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <div class="desc-container">
                                            <a href="<?php echo $link_url; ?>">
                                                <h3 class="grid-heading"><?php echo $we_can_help_title; ?></h3>
                                                <?php
                                                    if($we_can_help_description != ""){
                                                        echo '<p class="grid-description text-limit">'.$we_can_help_description.'</p>';
                                                    }
                                                    if($we_can_helps['button_text'] != ""){
                                                        echo '<p class="grid-readmore">';
                                                            echo '<span class="blog-texts">' . $we_can_helps['button_text'] . '</span>';
                                                        echo '<i class="fa fa-angle-right hero-arrow"></i>
                                                        </p>';
                                                    }
                                                ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php

                        }else{
                            $search_url_post_id = '';
                            if(isset($we_can_helps["search_url"][0]->ID)){
                                $search_url_post_id = $we_can_helps["search_url"][0]->ID;
                            }
                            
                            if (get_post_status($search_url_post_id) == "publish") {
                                
                                $turtl_doc = get_field('turtl_code', $search_url_post_id);
                                $href_value = ""
                                ?>
                                    <div class="grid">
                                        <div class="">
                                            <div class="img-container">
                                                <?php
                                                    if($turtl_doc ){
                                                        echo $turtl_doc;
                
                                                        $a = new SimpleXMLElement($turtl_doc);
                                                        // $href_value = $a['href']; 
                                                        $href_value = get_the_permalink($search_url_post_id);
                                                        $is_turtl_doc = true;
                                                    }else{
                                                        echo "<a class='offering_2' href='".get_the_permalink($search_url_post_id)."'>";
                                                            $href_value = get_the_permalink($search_url_post_id);
                                                            echo "<div class='img' style='background-image:url(". get_the_post_thumbnail_url($search_url_post_id, 'full').")'></div>";
                                                    }
                                            
                                                    
                                                    if($turtl_doc){
                                                    }else{
                                                        echo "</a>";
                                                    }
                                                ?>
                                                
                                            </div>
                                            <div class="desc-container">
                                                <a href="<?php echo $href_value; ?>">
                                                    <h3 class="grid-heading"><?php echo $we_can_help_title; ?></h3>
                                                    <?php
                                                        if($we_can_help_description != ""){
                                                            echo '<p class="grid-description text-limit">'.$we_can_help_description.'</p>';
                                                        }

                                                        if($we_can_helps['button_text'] != ""){
                                                            echo '<p class="grid-readmore">';
                                                                echo '<span class="blog-texts">' . $we_can_helps['button_text'] . '</span>';
                                                            echo '<i class="fa fa-angle-right hero-arrow"></i>
                                                            </p>';
                                                        }
                                                    ?>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    }

                }
            ?>
            
        </div>
    </div>
</section>
<?php if($is_turtl_doc){ 
    wp_enqueue_script( 'globallogic-turtl-embed-v1' );
} ?>