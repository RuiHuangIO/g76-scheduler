<?php

/**
 * @package the-plug
 */
/*
Plugin Name: the-plug
Plugin URI: https://ruihuang.io/
Description: Rui Huang's plugin
Version: 0.1.0
Author: Rui Huang
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
defined('ABSPATH') or die('You are not supposed to be here :(');

//require once composer autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Plugin Activation
 */
function activate_the_plug()
{
	Inc\Base\Activate::activate();
}

/**
 * Plugin deactivation
 */
function deactivate_the_plug()
{
	Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_the_plug');
register_activation_hook(__FILE__, 'deactivate_the_plug');

if (class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}
