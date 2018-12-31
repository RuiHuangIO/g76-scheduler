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

  public $callbacks;

  public $pages = array();
  public $subpages = array();

  public function register()
  {
    $this->settings = new SettingsApi();

    // initialize new instance
    $this->callbacks = new AdminCallbacks();

    // use camel case since this is a method
    $this->setPages();
    $this->setSubpages();

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
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
        'icon_url' => 'dashicons-store',
        'position' => 110
      )
    );
  }

  public function setSubpages()
  {
    $this->subpages = array(
      array(
        'parent_slug' => 'the_plug',
        'page_title' => 'Custom Post Types',
        'menu_title' => 'CPT',
        'capability' => 'manage_options',
        'menu_slug' => 'the_plug_cpt',
        'callback' => array($this->callbacks, 'adminCpt')
      ),
      array(
        'parent_slug' => 'the_plug',
        'page_title' => 'Custom Taxonomies',
        'menu_title' => 'Taxonomies',
        'capability' => 'manage_options',
        'menu_slug' => 'the_plug_Taxonomies',
        'callback' => array($this->callbacks, 'adminTaxonomy')
      ),
      array(
        'parent_slug' => 'the_plug',
        'page_title' => 'Custom Widgets',
        'menu_title' => 'Widgets',
        'capability' => 'manage_options',
        'menu_slug' => 'the_plug_widgets',
        'callback' => array($this->callbacks, 'adminWidget')
      )
    );
  }

  public function setSettings()
  {
    $args = array(
      array(
        'option_group' => 'the_plug_options_group',
        'option_name' => 'text_example',
        'callback' => array($this->callbacks, 'thePlugOptionsGroup')
      ),
      array(
        'option_group' => 'the_plug_options_group',
        'option_name' => 'test_field',
      )
    );

    $this->settings->setSettings($args);

  }

  public function setSections()
  {
    $args = array(
      array(
        'id' => 'the_plug_admin_index',
        'title' => 'Settings',
        'callback' => array($this->callbacks, 'thePlugAdminSection'),
        'page' => 'the_plug'
      )
    );

    $this->settings->setSections($args);

  }

  public function setFields()
  {
    $args = array(
      array(
        'id' => 'text_example',
        'title' => 'Text Example',
        'callback' => array($this->callbacks, 'thePlugTextExample'),
        'page' => 'the_plug',
        'section' => 'the_plug_admin_index',
        'args' => array(
          'label_for' => 'text_example',
          'class' => 'example-class'
        )
      ),
      array(
        'id' => 'test_field',
        'title' => 'Test Field',
        'callback' => array($this->callbacks, 'thePlugTestField'),
        'page' => 'the_plug',
        'section' => 'the_plug_admin_index',
        'args' => array(
          'label_for' => 'test_field',
          'class' => 'example-class'
        )
      )
    );

    $this->settings->setFields($args);

  }
}