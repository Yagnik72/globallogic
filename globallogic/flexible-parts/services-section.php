<?php
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;

?>
<section id="about" class="content <?php echo get_row_layout(); ?>" <?php echo $section_color; ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="col-heading-about">
                    <h2 class="heading-text my-head-sty"><?php echo get_sub_field('section_heading'); ?></h2>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <ul class="services_icons_list">
                    <?php
                    $get_services_icons = get_sub_field('services_icons');
                    $classdynamic = 1;
                    
                    foreach ($get_services_icons['icons'] as $key => $value) {

                        $image_url = $linkid = "";
                        if(isset($value['services_link'][0])){
                            $linkid = $value['services_link'][0];
                        }
                        if(isset($value['services_icon']['url'])){
                            $image_url = $value['services_icon']['url'];
                        }
                        
                        $image_id = attachment_url_to_postid($image_url);
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                        $link_option = $value['link_option'];

                        if (get_post_status($linkid) == "publish") { ?>
                            <li>
                                <?php if( $link_option == "link-by-url"){ 
                                    $style = "";
                                    $target = "";
                                    if(!empty($value['link_url'])){
                                        $url = $value['link_url'];
                                        $target = 'target="_blank"';
                                    }else{
                                        $url = 'javascript:void(0);';
                                        $style = 'style=" cursor: auto;"';
                                    }
                                    ?>
                                    <a  class="<?php echo "services_home_" . esc_attr($classdynamic); ?>" href="<?php echo $url; ?>" <?php echo $target; ?> <?php echo $style; ?>>
                                <?php }else{ 
                                    
                                    $style = "";
                                    if(!empty($value['services_link'][0])){
                                        $url = get_permalink($value['services_link'][0]);
                                    }else{
                                        $url = 'javascript:void(0);';
                                        $style = 'style=" cursor: auto;"';
                                    }
                                    ?>
                                    <a  class="<?php echo "services_home_" . esc_attr($classdynamic); ?>" href="<?php echo $url; ?>" <?php echo $style; ?>>
                                <?php } ?>
                                    <img class="<?php echo "services_home_" . esc_attr($classdynamic); ?>" src="<?php echo esc_attr($value['services_icon']['url']); ?>" width="80" height="80" alt=" <?php echo $image_alt; ?>">
                                    <h3 class="<?php echo "services_home_text services_home_" . esc_attr($classdynamic); ?>"><?php echo __($value['services_heading']); ?></h3>
                                </a>
                            </li>
                        <?php
                        }
                        $classdynamic++;
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</section>	