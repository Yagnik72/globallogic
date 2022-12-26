<?php
/**
 * Register style In Function.php
 * theme_enqueue_scripts()
 * */
wp_enqueue_style('flexible-content-style');
?>
<section class="flexible-layout common-landing-page <?php echo 'common-landing-' . get_the_ID(); ?>">
    <?php
    if (have_rows('select_content_module')):


        while (have_rows('select_content_module')) : the_row();

        $get_row_layout = get_row_layout();

            if ($get_row_layout == 'home_page_carousel'): 
            
                get_template_part( 'flexible-parts/home-page-carousel');
                
            elseif ($get_row_layout == 'services_section'): 
                
                get_template_part( 'flexible-parts/services-section');
                
            elseif ($get_row_layout == 'clients_section'): 
                
                get_template_part( 'flexible-parts/clients-section');
                
            elseif ($get_row_layout == '5_block_section'): 
                    
                get_template_part( 'flexible-parts/5-block-section');

            elseif ($get_row_layout == 'col_section'): 
                    
                get_template_part( 'flexible-parts/col-section');

            elseif ($get_row_layout == 'fancy_box'): 
                    
                get_template_part( 'flexible-parts/fancy-box');

            elseif ($get_row_layout == 'full_width_content'): 
                    
                get_template_part( 'flexible-parts/full-width-content');

            elseif ($get_row_layout == 'carousel_section'): 
                    
                get_template_part( 'flexible-parts/carousel-section');
                
            endif;

        endwhile;

    else :

    endif;
    ?>
</section>