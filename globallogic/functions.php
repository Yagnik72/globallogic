<?php

if (!class_Exists('GlobalLogic')) {

    class GlobalLogic {

        function __construct(){
            
            foreach( glob( get_template_directory(). '/gl-functions/*.php' ) as $file ) {
            
                include_once( $file );
            }

        }   

    }
}
new GlobalLogic();