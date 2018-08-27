<?php
/** 
* @package G76Scheduler
*/
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController{

  public function register(){
    add_action('admin_enqueue_scripts', array ($this, 'enqueue'));
  }
  function enqueue(){
    //enqueue assets
    wp_enqueue_style('g76s-main-style', $this->plugin_url.'assets/css/style.css');
    wp_enqueue_script('g76s-main-script', $this->plugin_url.'assets/js/main.js');
  }
}