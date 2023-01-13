<?php
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');
$section_description = get_sub_field('section_description');
$video_provider = get_sub_field('video_type');

$video = get_sub_field('video');
$select_video_type = (isset($video['select_video_type'])) ? $video['select_video_type'] : '';
$video_id = (isset($video['video_id'])) ? $video['video_id'] : '';
$video_caption = (isset($video['video_caption'])) ? $video['video_caption'] : '';
$video_image = (isset($video['video_image'])) ? $video['video_image'] : '';

$videosource = "";
wp_enqueue_script('globallogic-popup-video');

?>
<section class="content <?php echo get_row_layout(); ?>" <?php echo $section_color; ?>>
    <div class="container">
        
        <?php if(!empty($section_heading) || !empty($section_description)){ ?>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($section_heading)){ ?>
                        <h2 class="heading-text"><?php echo $section_heading; ?></h2>
                    <?php } ?>
                    <?php if(!empty($section_description)){ ?>
                        <?php echo $section_description; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        
        <?php
        
            if(!empty($video_id)){

                if ($video_provider == "Video Provider") {
                    if ($select_video_type  == 'vimeo') {
                        $videosource = "vimeosourcevideo";
                        ?>
                        <div class="video-section video-section-<?php echo $video_id; ?>">
                            <div id="vi-video-1-container" class="video-wrapper">
                                <div class="opacity-background">
                                    <div style="background-image: url(<?php $video_image; ?>);" class="video-image-placeholder bg"></div>
                                    <img class="video-image-placeholder" src="<?php $video_image; ?>"  width="100%" height="100%">
                                </div>
                                <a class="video-control js-video-control paused" data-videosourec="https://player.vimeo.com/video/<?php echo $video_id; ?>?autoplay=0&loop=0&title=0&byline=0&portrait=0&background=0"  
                                    data-vid="<?php echo $video_id; ?>" data-source="<?php echo $videosource; ?>" data-bs-toggle="modal" 
                                    data-bs-target="#myModal-<?php echo $video_id; ?>" data-keyboard="true">
                                    <div class="playiconsection">
                                            <img class="ply-img-icon" src="<?php echo get_template_directory_uri(); ?>/assets/image/play-icon-svg.svg">
                                            <span class="my-space" style="width:80%;float: left;"><?php echo $video_caption; ?></span>
                                    </div>
                                </a>
                            </div>
                        </div> 

                    <?php }

                    if ($select_video_type  == 'youtube') {
                        $videosource = "youtubesourcevideo";
                        ?>
                                    <!-- youtube video-->
                                    <div class="video-section video-section-<?php echo $video_id; ?>">
                                        <div id="vi-video-1-container" class="video-wrapper">
                                            <div class="opacity-background">
                                                <div style="background-image: url(<?php echo $video_image; ?>);" class="video-image-placeholder bg"></div>
                                                <img class="video-image-placeholder" src="<?php echo $video_image; ?>"  width="100%" height="100%">
                                            </div>
                                            <a class="video-control js-video-control paused" data-videosourec="https://www.youtube.com/embed/<?php echo $video_id; ?>?rel=0&mute=0&autoplay=1" 
                                            data-vid="<?php echo $video_id; ?>" data-source="<?php echo $videosource; ?>" data-bs-toggle="modal" 
                                            data-bs-target="#myModal-<?php echo $video_id; ?>" data-keyboard="true">
                                                <div class="playiconsection">
                                                        <img class="ply-img-icon" src="<?php echo get_template_directory_uri(); ?>/assets/image/play-icon-svg.svg">
                                                        <span class="my-space" style="width:80%;float: left;"><?php echo $video_caption; ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div> 

                    <?php }
                }elseif( $video_provider == "Video and Text Section"){
                    
                    if (isset($video['choose_layout']) && $video['choose_layout'] == 'Right Video') {
                        $direction = "";
                    } else {
                        $direction = "flex-r-reverse";
                    }

                    ?>
                    <div class="container video_and_text_section">
                        <div class="row grids grid-1 ">
                            <div class="grid img-side-txt">
                                <div class="help-types">
                                    <div class="row grids grid-2 <?php echo $direction; ?>">
                                        <div class="services">
                                            <h2><?php echo (isset($video['text_section']['heading'])) ? $video['text_section']['heading'] : ''; ?></h2>
                                            <p class="dynamic-content user-para">
                                                <?php echo (isset($video['text_section']['description'])) ? $video['text_section']['description'] : ''; ?>
                                            </p>
                                        </div>
                                        <div class="grid">
                                            <div class="video-section esg-video-section video-section-<?php echo $video_id ?>">
                                                <div class="img-container">
                                                    <div id="vi-video-1-container" class="video-wrapper">
                                                        <div class="opacity-background">
                                                            <div style="background-image: url('<?php echo $video_image; ?>');" class="video-image-placeholder bg"></div>
                                                            <img class="video-image-placeholder" src="<?php echo $video_image; ?>" width="100%" height="100%">
                                                        </div>
                    
                                                        <?php
                                                        $videosource = "";
                                                        if ($select_video_type == 'vimeo') {
                                                            $videosource = "vimeosourcevideo";
                                                            echo "<a class='video-control js-video-control paused' data-videosourec='https://player.vimeo.com/video/$video_id?autoplay=0&loop=0&title=0&byline=0&portrait=0&background=0' 
                                                            data-vid='$video_id' data-source='$videosource' data-bs-toggle='modal' data-bs-target='#myModal-$video_id' data-keyboard='true'>";
                                                        } elseif ($select_video_type == 'youtube') {
                                                            $videosource = "youtubesourcevideo";
                                                            echo "<a class='video-control js-video-control paused' data-videosourec='https://www.youtube.com/embed/$video_id?rel=0&mute=0&autoplay=1' 
                                                            data-vid='$video_id' data-source='$videosource' data-bs-toggle='modal' data-bs-target='#myModal-$video_id' data-keyboard='true'>";
                                                        } else {
                                                            $videosource = "";
                                                            echo "<a class=''>";
                                                        }
                                                        ?>
                                                        <div class="playiconsection">
                                                            <img class="ply-img-icon" src="<?php echo get_template_directory_uri(); ?>/assets/image/play-icon-svg.svg">
                                                            <span class="my-space" style="">
                                                                <p><?php echo $video_caption; ?></p>
                                                            </span>
                                                        </div>
                                                        <?php echo "</a>"; ?>
                                                    </div>
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  }elseif($video_provider == "Marketo Form + Custom Video"){
                    wp_enqueue_script('forms2-script');

                    $videosource = (isset($video['select_video_type'])) ? $video['select_video_type'] : '';
                    $video_url = (isset($video['video_url']['url'])) ? $video['video_url']['url'] : '';
                    $marketo_form_id = (isset($video['marketo_form_id'])) ? $video['marketo_form_id'] : '';
                    
                    ?>
                    <div class="video-section video-section-<?php echo $marketo_form_id ?>">
                        <section class="headers">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12" >
                                        <div id="vi-video-1-container" class="video-wrapper">
                                            <div class="opacity-background">
                                                <div style="background-image: url(<?php echo $video_image; ?>);" class="video-image-placeholder bg"></div>
                                                <img class="video-image-placeholder" src="<?php echo $video_image; ?>"  width="100%" height="100%">
                                            </div>
                                            <a class="video-control js-video-control paused" data-source="<?php echo $videosource; ?>" data-formid="<?php echo $marketo_form_id; ?>" 
                                            data-bs-toggle="modal" data-bs-target="#myModal-<?php echo $marketo_form_id; ?>" data-vid="<?php echo $marketo_form_id; ?>" data-keyboard="true">
                                                <div class="playiconsection">
                                                    <img class="ply-img-icon" src="<?php echo get_template_directory_uri(); ?>/assets/image/play-icon-svg.svg">
                                                    <span class="my-space" style="width:80%;float: left;"><?php echo $video_caption; ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div> 
                    <?php
                }
            }

            if($videosource == 'marketo-custom-video' && isset($marketo_form_id) && isset($video_url)){
                get_template_part("video-provider", null ,array('postID' => get_the_ID(), 'videosource' => $videosource, 'marketo_form_id' => $marketo_form_id, 'videolink' => $video_url ));
            }elseif(!empty($video_id) && !empty($videosource) && $videosource != 'marketo-custom-video'){
                get_template_part("video-provider", null ,array('vidid' => $video_id, 'videosource' => $videosource));
            }

        ?>
    </div>
</section>