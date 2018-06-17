<?php
/**
 * @package G76Scheduler
 */
/*
Plugin Name: G76 Scheduler
Plugin URI: https://www.gorilla76.com/
Description: A plugin that allows any field value to change by schedule
Version: 0.1.0
Author: Rui Huang @ Gorilla76
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/
if(!defined('ABSPATH')){
    die;
}

require_once(plugin_dir_path(__FILE__).'/includes/g76scheduler-scripts.php');

class G76Scheduler{
    function __construct(){
        add_action('init', array($this,'custom_post_type')); 
    }
    
    function activate(){
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate(){
        flush_rewrite_rules();
    }

    function uninstall(){

    }

    function custom_post_type(){

        register_post_type('scheduler', ['public'=>true, 'label'=> 'Scheduler']);
    }
}

if (class_exists('G76Scheduler')){
    $g76Scheduler = new G76Scheduler ();
}

//activate
register_activation_hook(__FILE__, array($g76Scheduler, 'activate'));

//deactivate
register_activation_hook(__FILE__, array($g76Scheduler, 'deactivate'));
