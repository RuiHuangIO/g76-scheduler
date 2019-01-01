<?php

/**
 * @package the-plug
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

  public function register()
  {
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }
  function enqueue()
  {
    //enqueue assets
    wp_enqueue_style('the-plug-main-style', $this->plugin_url . 'assets/style.min.css');
    wp_enqueue_script('the-plug-main-script', $this->plugin_url . 'assets/main.min.js');
  }
}