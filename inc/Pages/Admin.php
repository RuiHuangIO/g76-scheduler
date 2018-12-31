<?php

/**
 * @package the-plug
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{

  public $settings;

  public $pages = array();

  public function register()
  {
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();

    $this->setPages();

    $this->settings->addPages($this->pages)->register();
  }

  public function setPages()
  {
    $this->pages = array(
      array(
        'page_title' => 'The Plug',
        'menu_title' => 'The Plug',
        'capability' => 'manage_options',
        'menu_slug' => 'the_plug',
        'callback' => array($this->callbacks, 'adminDashboard'),
        'icon_url' => 'dashicons-calendar-alt',
        'position' => 110
      )
    );
  }
}