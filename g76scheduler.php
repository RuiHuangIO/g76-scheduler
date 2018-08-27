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

//Abort if this file is called directly
defined('ABSPATH') or die ('You are not supposed to be here :(');

//require once composer autoload
if (file_exists(dirname(__FILE__). '/vendor/autoload.php')){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

/**
 * Plugin Activation
 */
function activate_g76_scheduler(){
	Inc\Base\Activate::activate();
}

/**
 * Plugin deactivation
 */
function deactivate_g76_scheduler(){
	Inc\Base\Deactivate:: deactivate();
}

register_activation_hook(__FILE__, 'activate_g76_scheduler');
register_activation_hook(__FILE__, 'deactivate_g76_scheduler');

if (class_exists('Inc\\Init')){
	Inc\Init::register_services();
}
