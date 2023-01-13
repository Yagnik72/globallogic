<?php
/**
 * Template Name: Careers YP ( Common Career Testing - /careers-yp/ ) 
 * The template for displaying a profile page
 */

get_header();
?>
<section class="content"> 
    <br>
    <br>
    <br>
    <?php
    
        echo "<pre>";
        print_r(get_query_var('careers'));
        echo "</pre>";
        
    ?>
 </section>

<?php 



get_footer();
 ?>

 