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
                    <div class="" id="careerSlick" style="padding-left: 0;">
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
            <?php }   
        } ?>
    </div>
</section>