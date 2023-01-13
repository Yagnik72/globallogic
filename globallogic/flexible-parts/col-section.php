<?php 
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');
$section_description = get_sub_field('section_description');
$column = get_sub_field('column');
$boxes = get_sub_field('boxes');
$select_data_source = get_sub_field('select_data_source');
$want_title_above_image = get_sub_field('want_title_above_image');
$want_date_above_image = get_sub_field('want_date_above_image');
$is_turtl_doc = false;

?>
<section class="content <?php echo get_row_layout(); ?>" <?php echo $section_color; ?>>
    <div class="container">
        <?php if(!empty($section_heading) || !empty($section_description)){ ?>
            <div class="row heading-container">
                <div class="col-12 col-md-12 mb-2">
                    <?php if(!empty($section_heading)){ ?>
                        <h2 class="heading-text"><?php echo $section_heading; ?></h2>
                    <?php } ?>
                    <?php if(!empty($section_description)){ ?>
                        <?php echo $section_description; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="row grids grid-<?php echo esc_attr($column); ?>">
            <?php
                if($select_data_source == "Block Listing Manually"){
                    foreach ($boxes as $box) {
                        $img = "";
                        if(isset($box['image']['url'])){
                            $img = $box['image']['url'];
                        }
                        $ribbon_text = $box['ribbon_text'];
                        $description = $box['description'];
                        $title = $box['title'];
                        $author_name = $box['author_name'];
                        $date = $box['date'];
                        $button_text = $box['button_text'];
                        $button_link = $box['button_link'];
                        $cat = false;
                        ?>
                            <div class="grid">
                                <div class="">
                                    <?php if(isset($want_title_above_image) && in_array('yes', $want_title_above_image)){ ?>
                                            <a href="<?php echo $button_link; ?>">
                                                <div class="tile-section">
                                                    <img src="https://www.globallogic.com/wp-content/uploads/2020/09/GL_Icon_Chevron.svg">
                                                    <h3 class="grid-heading"><?php echo $title; ?></h3>
                                                </div>
                                            </a>
                                    <?php } ?>
                                    <?php if(isset($want_date_above_image) && in_array('yes', $want_date_above_image)){ ?>
                                            <p class="author ms-4"><small><?php echo $author_name; ?></small></p>
                                    <?php } ?>
                                    <div class="img-container">
                                        <a class="offering_0" href="<?php echo $button_link; ?>">
                                            <div class="img" style="background-image:url(<?php echo $img; ?>)"></div>
                                        </a>
                                        <?php if($ribbon_text){ ?>
                                            <a href="<?php echo $button_link; ?>">
                                                <span class="main_cat"><?php echo $ribbon_text; ?></span>
                                            </a>
                                        <?php } ?>
                                        </a>                                
                                    </div>
                                    <div class="desc-container">
                                        <?php if($title != "" && empty($want_title_above_image)){ ?>
                                        <a href="<?php echo $button_link; ?>">
                                            <h3 class="grid-heading"><?php echo $title; ?></h3>
                                        </a>
                                        <?php } ?>

                                        <?php if($author_name != "" && empty($want_date_above_image)){ ?>
                                            <p class="author"><?php echo $author_name; ?></p>
                                        <?php } ?>
                                        
                                        <?php if($description){ ?>
                                            <a href="<?php echo $button_link; ?>"> 
                                                <p class="grid-description text-limit"><?php echo $description; ?></p> 
                                            </a>
                                        <?php } ?>

                                        <?php if($button_text){ ?>
                                            <a href="<?php echo $button_link; ?>"> 
                                                <p class="learn-more-link"><?php echo $button_text; ?> <i class="fa fa-angle-right hero-arrow"></i></p> 
                                            </a>
                                        <?php } ?>

                                        <?php if($date){ ?>
                                            <p class="date"><?php echo $date; ?></p>
                                        <?php } ?>
                                    </div>

                                    <?php if($cat){ ?>
                                        <div class="dynamic_cats">
                                            <a href="https://www.globallogic.com/insights/?catlink=true&amp;search=&amp;cats=Digital Transformation" class="badge bg-secondary">Digital Transformation</a>
                                            <a href="https://www.globallogic.com/insights/?catlink=true&amp;search=&amp;indus=Consumer and Retail" class="badge bg-light">Consumer and Retail</a>						
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                    <?php }

                }elseif($select_data_source == "Block Listing Dynamic"){
                    $block_listing_dynamic = get_sub_field('block_listing_dynamic');
                    
                    $post_ids = array();

                    // Main Dynamic Condition
                    if($block_listing_dynamic['select_type'] == "choose_data_post"){

                        $choose_posts = $block_listing_dynamic['choose_posts'];
                        foreach ($choose_posts as $choose_post) {
                            array_push($post_ids, $choose_post->ID);
                        }

                    }elseif($block_listing_dynamic['select_type'] == "custom_post_type_query"){

                        $dy_post_type = $block_listing_dynamic['dy_post_type'];
                        $dy_taxonomy = $block_listing_dynamic['dy_taxonomy'];
                        $post_limit = $block_listing_dynamic['post_limit'];
                        
                        
                        if(!empty($dy_post_type)){

                            $dy_post_type_args = array(
                                'post_type' => implode(", ", $dy_post_type),
                                'posts_per_page' => $post_limit,
                            );
                            
                            if($block_listing_dynamic['dy_taxonomy'] != "" && $block_listing_dynamic['category_slug'] != ""){
                                $dy_post_type_args['tax_query'] = array(
                                        array(
                                        'taxonomy' => $block_listing_dynamic['dy_taxonomy'],
                                        'field' => 'slug',
                                        'terms' => explode(",",$block_listing_dynamic['category_slug']),
                                    )
                                );
                            }

                            // The Query
                            $dy_post_type_query = new WP_Query( $dy_post_type_args );
    
                            // The Loop
                            if ( $dy_post_type_query->have_posts() ) {
                                while ( $dy_post_type_query->have_posts() ) {
                                    $dy_post_type_query->the_post();

                                    array_push($post_ids, get_the_ID());

                                }
                            } else {
                                // no posts found
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();

                        }

                    }

                    $want_data = $block_listing_dynamic['want_data'];

                    foreach($post_ids as $post_id){

                        setup_postdata($post_id);
                
                        $ribbon_text = $title = $author_name = $description = $button_text = $button_link = $date = $cat = $img = "";
                        $want_insights_category_tags = array();

                        // ribbon
                        if($block_listing_dynamic['dy_taxonomy'] && in_array('Cat_ribbon', $want_data)){

                            $taxonomy = $block_listing_dynamic['dy_taxonomy'];

                            $main_cat = get_the_terms($post_id, $taxonomy);
                            $ribbon_text = $main_cat[0]->name;                            
                        }           
                        
                        // user name
                        $blog_author = get_field('blogswhite_paper_author', $post_id);
                        if (!is_array($blog_author)) {
                            $blog_author = (array) $blog_author;
                        }

                        //  Author
                        if(in_array('author', $want_data) ){
                            $user_name = array();

                            foreach ($blog_author as $author_slug) {
                                if (is_numeric($author_slug)) {
                                    $author_slug = basename(get_permalink($author_slug));
                                }
                                $author_obj = get_post_by_slug($author_slug, 'blogauthor');
                                //echo "<pre>"; print_r($author_obj); die('123');                            
                                
                                if($author_obj->ID){
                                    $user_name[] = '<a href="' . get_the_permalink($author_obj->ID) .'">'. $author_obj->post_title  .'</a>';
                                }else{
                                    $user_name[] = $author_obj->post_title;
                                }
                            }

                            if(empty($user_name)){
                                $user_name = array('GlobalLogic');
                            }
                            $user_name = implode(", ", $user_name);
                        }else{
                            $user_name = "";
                        }
                        
                        
                        // Category
                        $insight_cats = wp_get_post_terms($post_id, 'insight-subcats', array('fields' => 'all'));

                        $cat_name = array();

                        if ($insight_cats) {

                            foreach ($insight_cats as $terms) {

                                $cat_name[] = $terms->name;
                            }
                        }

                        $industry_catss = wp_get_post_terms($post_id, 'insight-industry', array('fields' => 'all'));

                        $industry_name = array();

                        if ($industry_catss) {

                            foreach ($industry_catss as $termss) {

                                $industry_name[] = $termss->name;
                            }
                        }
                        
                        //  Conditions
                        if(in_array('title', $want_data)){
                            $title = get_the_title($post_id);
                        }
                        if(in_array('desc', $want_data)){
                            $description = get_the_excerpt($post_id);
                        }
                        if(in_array('btn', $want_data)){
                            $button_text = of_get_option('learn_more');
                        }
                        if(in_array('author', $want_data)){
                            $author_name = of_get_option('by_txt') . ' ' .$user_name;
                        }
                        if(in_array('date', $want_data)){
                            $date = of_get_option('general_published_on_text') . ' ' . get_the_date('F&\nb\spj, Y', $post_id);
                        }
                        
                        $button_link = get_permalink($post_id);
                        $img = (get_the_post_thumbnail_url($id, 'full') != "") ? get_the_post_thumbnail_url($id, 'full') : 'http://localhost/globallogic/wp-content/uploads/2022/12/dummy-post-img.jpg';
                        $want_insights_category_tags = $block_listing_dynamic['want_insights_category_tags'];

                        // turtl
                        $turtl_doc = get_field('turtl_code', $post_id);

                        
                        ?>
                            <div class="grid">
                                <div class="">
                                    <?php if(isset($want_title_above_image) && in_array('yes', $want_title_above_image)){ ?>
                                            <a href="<?php echo $button_link; ?>">
                                                <div class="tile-section">
                                                    <img src="https://www.globallogic.com/wp-content/uploads/2020/09/GL_Icon_Chevron.svg">
                                                    <h3 class="grid-heading"><?php echo $title; ?></h3>
                                                </div>
                                            </a>
                                    <?php } ?>
                                    <?php if(isset($want_date_above_image) && in_array('yes', $want_date_above_image)){ ?>
                                            <p class="author ms-4"><small><?php echo $author_name; ?></small></p>
                                    <?php } ?>
                                    <div class="img-container">
                                        <?php
                                            if($turtl_doc){
                                                echo $turtl_doc;
                                                $is_turtl_doc = true;
                                            }else{
                                                echo "<a class='offering' href='".get_the_permalink($post_id)."'>";
                                                    $href_value = get_the_permalink($post_id);
                                                    echo "<div class='img' style='background-image:url(". $img .")'></div>";
                                            }
                                                if($ribbon_text != ""){
                                                    echo "<span class='main_cat'>" . $ribbon_text . "</span>";
                                                }
                                            
                                            if($turtl_doc){
                                            }else{
                                                echo "</a>";
                                            }
                                        ?>
                                        <?php if($ribbon_text != ""){ ?>
                                            <a href="<?php echo $button_link; ?>">
                                                <span class="main_cat"><?php echo $ribbon_text; ?></span>
                                            </a>
                                        <?php } ?>
                                        </a>                                
                                    </div>

                                    <div class="desc-container">
                                        <?php if($title != "" && empty($want_title_above_image)){ ?>
                                        <a href="<?php echo $button_link; ?>">
                                            <h3 class="grid-heading"><?php echo $title; ?></h3>
                                        </a>
                                        <?php } ?>

                                        <?php if($author_name != "" && empty($want_date_above_image)){ ?>
                                        <p class="author"><?php echo $author_name; ?></p>
                                        <?php } ?>
                                        
                                        <?php if($description){ ?>
                                            <a href="<?php echo $button_link; ?>"> 
                                                <p class="grid-description text-limit"><?php echo $description; ?></p> 
                                            </a>
                                        <?php } ?>

                                        <?php if($button_text){ ?>
                                            <a href="<?php echo $button_link; ?>"> 
                                                <p class="learn-more-link"><?php echo $button_text; ?> <i class="fa fa-angle-right hero-arrow"></i></p> 
                                            </a>
                                        <?php } ?>

                                        <?php if($date){ ?>
                                            <p class="date"><?php echo $date; ?></p>
                                        <?php } ?>
                                    </div>

                                    <?php if(( !empty($cat_name) || !empty($industry_name) ) && in_array('yes', $want_insights_category_tags )){ ?>
                                        <div class="dynamic_cats">
                                            <?php
                                                if ($cat_name) {
                                                    foreach ($cat_name as $cat_n) {
                                                        echo "<a href='". site_url() . '/insights/?catlink=true&search=&cats=' . $cat_n ."' class='badge bg-secondary' >" . $cat_n . "</a>";
                                                    }
                                                }
                                                if ($industry_name) {
                                                    foreach ($industry_name as $industry_n) {
                                                        echo "<a href='". site_url() . '/insights/?catlink=true&search=&indus=' . $industry_n ."' class='badge bg-light'  >" . $industry_n . "</a>";
                                                    }
                                                }
                                            ?>					
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php 
                        
                        
                    }
                }   
            ?>
        </div> 
    </div>
</section>

<?php if($is_turtl_doc){ 
    wp_enqueue_script( 'globallogic-turtl-embed-v1' );
 } ?>