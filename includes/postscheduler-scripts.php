<?php
    //add functions
    function ps_add_scripts(){
        wp_enqueue_style('ps-main-style', plugins_url(), '/postscheduler/css/style.css');
        wp_enqueue_script('ps-main-script', plugins_url(), '/postscheduler/script/main.js');
    }

    add_action('wp_enqueue_scripts', 'ps_add_scripts');