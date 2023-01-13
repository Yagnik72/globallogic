<?php
$section_color = (!empty(get_sub_field('section_color'))) ? 'style="background-color: '. get_sub_field('section_color') .'"' : '' ;
$section_heading = get_sub_field('section_heading');
$section_description = get_sub_field('section_description');
$select_tabs = get_sub_field('select_tabs');
$tabs_list = get_sub_field('tabs_list');
$rand = rand(10, 10000);
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
        <?php } 
        
        if($select_tabs == "vertical_tabs"){ ?>
            <div class="side-tab vertical_tabs">
                <div class="row">
                    <div class="col-md-5 col-12 mb-5 Professionals-tab">
                        <div class="nav flex-column nav-pills tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php
                            $z = 1;
                            foreach ($tabs_list as $tab) {
                                ?>
                                    <button class="nav-link <?php if ($z == 1) { echo 'active'; } ?>" 
                                        id="v-pills-<?php echo $rand . $z; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $rand . $z; ?>" 
                                        type="button" role="tab" aria-controls="v-pills-<?php echo $rand . $z; ?>" aria-selected="<?php if ($z == 1) { echo 'true'; } else { echo 'false'; } ?>">
                                        <strong><?php echo $tab['title']; ?></strong>
                                    </button>
                                <?php
                                $z++;
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <?php
                                $z = 1;
                                foreach($tabs_list as $tab){
                                    ?>
                                        <div class="tab-pane fade <?php if ($z == 1) { echo 'show active'; } ?>" 
                                            id="v-pills-<?php echo $rand . $z; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $rand . $z; ?>-tab">
                                            <?php echo $tab['descriptions']; ?>
                                        </div>
                                    <?php
                                    $z++;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
        
        if($select_tabs == "scrolling_tabs"){
            ?>
            <div class="scrolling_tabs">
                <div class="row">
                    <div class="col-md-4 col-12 mb-5">
                        <div class="nav flex-column" role="tablist" aria-orientation="vertical">
                            <?php
                                $z = 1;
                                foreach($tabs_list as $tab){
                                    $tab_title = strtolower(str_replace(' ', '', sanitize_title($tab['title'])));
                                    if ($z == 1) {
                                        $class = "active";
                                    } else {
                                        $class = "";
                                    }
                                    if(is_html($tab['title'])){
                                        echo $tab['title'];
                                    }else{
                                        ?>  <a href="#<?php echo $tab_title; ?>" class="tablink <?php echo $class; ?>"><?php echo $tab['title']; ?></a> <?php
                                    }
                                    $z++;
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-md-8 col-12 ">
                        <div class="tab-content">
                            <?php
                                foreach ($tabs_list as $tab) {
                                    $tab_title = strtolower(str_replace(' ', '', sanitize_title($tab['title'])));
                                    ?> 
                                        <div id="<?php echo $tab_title; ?>"> <?php echo $tab['descriptions']; ?></div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        if ($select_tabs == "horizontal_tabs") {
            ?>
                <div class="h-tabs-container desktop">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php
                            $j = 1;
                            foreach($tabs_list as $tab){
                                $tab_title = strtolower(str_replace(' ', '', $tab['title']));
                                $select = false;
                                if ($j == 1) {
                                    $class1 = "active";
                                    $select = true;
                                } else {
                                    $class1 = "";
                                }
                                ?> 
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo $class1; ?>" id="<?php echo 'tab_' . $tab_title; ?>" data-bs-toggle="tab" 
                                        data-bs-target="#<?php echo 'tab_' . $j . $tab_title; ?>" type="button" role="tab" aria-controls="<?php echo $tab_title; ?>" 
                                        aria-selected="<?php echo $select; ?>"><?php echo $tab['title']; ?></button>
                                    </li>						
                                <?php
                                $j++;
                            }
                        ?>
                    </ul>
                    <div class="tab-content" id="">
                        <?php
                            $i = 1;
                            foreach($tabs_list as $tab){
                                $tab_title = strtolower(str_replace(' ', '', $tab['title']));
                                $show = "";
                                if ($i == 1) {
                                    $class1 = "active";
                                    $show = "show";
                                } else {
                                    $class1 = "";
                                }
                                ?>
                                <div class="tab-pane fade <?php echo $class1; ?> <?php echo $show; ?>" id="<?php echo 'tab_' . $i . $tab_title; ?>" 
                                    role="tabpanel" aria-labelledby="<?php echo 'tab_' . $tab_title; ?>">
                                    <?php echo $tab['descriptions']; ?>
                                </div>
                                <?php
                                $i++;
                            }
                        ?>
                    </div>
                </div>

                <div class="h-accordian-container tab-accordian mobile">
                    <?php $rand = 'acc' . rand(10, 1000); ?>
                    <div class="accordion accordion-flush" id="accordion<?php echo $rand; ?>">
                        <?php
                        $i = 1;
                        foreach($tabs_list as $tab){
                            if ($i == 1) {
                                $select = "true";
                                $show = "show";
                                $collapsed = "";
                            } else {
                                $select = "false";
                                $show = "";
                                $collapsed = "collapsed";
                            }
                            ?>          	
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?php echo $rand . $i . 'heading'; ?>">
                                    <button class="accordion-button <?php echo $collapsed; ?>" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#<?php echo $rand . $i; ?>" aria-expanded="<?php echo $select; ?>" aria-controls="<?php echo $rand . $i; ?>">
                                        <?php echo $tab['title']; ?>
                                    </button>
                                </h2>
                                <div id="<?php echo $rand . $i; ?>" class="accordion-collapse collapse <?php echo $show; ?>" 
                                aria-labelledby="<?php echo $rand . $i . 'heading'; ?>" data-bs-parent="#accordion<?php echo $rand; ?>">
                                    <div class="accordion-body">
                                        <?php echo $tab['descriptions']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            <?php
        }

        if($select_tabs == "accordion_tabs"){ 
                $rand = 'acc' . rand(10, 1000);
            ?>
                <div class="h-accordian-container tab-accordian">
                    <div class="accordion accordion-flush" id="accordion<?php echo $rand; ?>">
                        <?php
                        $i = 1;
                        foreach($tabs_list as $tab){
                            if ($i == 1) {
                                $select = "true";
                                $show = "show";
                                $collapsed = "";
                            } else {
                                $select = "false";
                                $show = "";
                                $collapsed = "collapsed";
                            }
                            ?>          	
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?php echo $rand . $i . 'heading'; ?>">
                                    <button class="accordion-button <?php echo $collapsed; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $rand . $i; ?>" aria-expanded="<?php echo $select; ?>" aria-controls="<?php echo $rand . $i; ?>">
                                        <?php echo $tab['title']; ?>
                                    </button>
                                </h2>
                                <div id="<?php echo $rand . $i; ?>" class="accordion-collapse collapse <?php echo $show; ?>" aria-labelledby="<?php echo $rand . $i . 'heading'; ?>" data-bs-parent="#accordion<?php echo $rand; ?>">
                                    <div class="accordion-body">
                                        <?php echo $tab['descriptions']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            <?php
        }

        ?>
    </div>
</section>

