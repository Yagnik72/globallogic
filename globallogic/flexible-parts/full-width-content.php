<?php 
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section = get_sub_field('section');



?>
<section class="content <?php echo get_row_layout(); ?>" <?php echo $section_color; ?>>
    <div class="container">
        <?php
        if ($section['section_title']) {
            ?>
            <div class="row ">
                <div class="col-md-12">
                    <h2 class="heading-text"><?php echo $section['section_title']; ?></h2>
                </div>
            </div>
        <?php } 
        
        if ($section['section_content']) { ?>
        <div class="row grids grid-1">
            <div class="grid">
                <div class="">
                    <div class="desc-container margin-all">
                        <?php if (have_rows('section')): while (have_rows('section')) : the_row(); ?>
                                <?php echo get_sub_field('section_content'); ?>
                                <?php
                        endwhile;
                        endif;
    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>