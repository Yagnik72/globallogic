<?php 
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');
$section_description = get_sub_field('section_description');
$column = get_sub_field('column');
$boxes = get_sub_field('boxes');

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
                foreach ($boxes as $box) {
                    $title = $box['title'];
                    $descriptions = $box['descriptions'];
                    $image_url = "";
                    if(isset($box['small_image']['url'])){
                        $image_url = $box['small_image']['url'];
                    }

                    $image_class = '';
                    $image_style = $box['image_style'];
                    foreach ($image_style as $img_class) {
                        if($img_class == "Crop image to round shape"){
                            $image_class .= " img-crop-round";
                        }elseif($img_class == "Image border image"){
                            $image_class .= " img-border";
                        }
                    }

                    ?>
                    <div class="grid round">
                        <div class="grid-outer-box">
                            <div class="grid-box">
                                <div class="img-container">
                                    <div class="img<?php echo $image_class; ?>" style="background-image:url('<?php echo $image_url; ?>')"></div>
                                </div>
                                <div class="desc-container">
                                    <?php if(!empty($title)){ ?>
                                        <div class="grid-heading"><?php echo $title; ?></div>
                                    <?php } ?>
                                    <?php if(!empty($descriptions)){ ?>
                                        <div class="grid-description">
                                            <p><?php echo $descriptions; ?></p>
                                        </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>