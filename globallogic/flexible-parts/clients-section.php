<?php
$style = "";
$clients = get_sub_field('clients');
$open_link_new_tab = get_sub_field('open_link_new_tab');
$want_data_dynamic = get_sub_field('want_data_dynamic');
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');

if(isset($open_link_new_tab[0])){
    $style = ($open_link_new_tab[0] == 'yes') ? 'target="_blank"' : '';
}

if(!empty($clients) || in_array('yes', $want_data_dynamic)){
?>
<section id="partner" class="content fifty-twenty-space <?php echo get_row_layout(); ?>" <?php echo $section_color; ?> >
    <div class="container">
        <?php if(!empty($section_heading)){ ?>
            <div class="col-heading-full">
                <h2 class="heading-text text-center"><?php echo $section_heading; ?></h2>
            </div>
        <?php } ?>
        <div class="customer-logos-container">
            <div class="customer-logos slider">
                <?php
                    if(in_array('yes', $want_data_dynamic)){
                        $args = array(
                            'post_type' => 'clientlogo',
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'posts_per_page' => -1,
                            'orderby' => 'post__in',
                        );
                        $clientLogo = new WP_Query($args);
                        if ($clientLogo->have_posts()) {
                            while ($clientLogo->have_posts()) {
                                $clientLogo->the_post();
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                $image_id = attachment_url_to_postid($thumbnail[0]);
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                if (get_post_status($post->ID) == "publish") {
                                    echo '<div class="slide"><img src="' . $thumbnail[0] . '" width="164" height="164" alt="' . $image_alt . '" /></div>';
                                }
                            }
                        }
                        wp_reset_postdata();
                    }elseif($clients){                        
                        foreach ($clients as $client) {
                            $client_image = $client['client_image'];
                            $client_url = $client['client_url'];
                            

                            if(!empty($client_url)){
                                echo '<div class="slide"><a href="'.$client_url.'" '.$style.' rel="noopener noreferrer"><img src="' . $client_image  . '" width="164" height="164" alt="" /></a></div>';
                            }else{
                                echo '<div class="slide"><img src="' . $client_image . '" width="164" height="164" alt="" /></div>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>	
</section>
<?php } ?>