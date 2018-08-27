<?php
/** 
* @package G76Scheduler
*/
namespace Inc\Pages;

use \Inc\Base\BaseController;

class Admin extends BaseController{

  public function register(){
    add_action('admin_menu', array ($this, 'add_admin_pages'));
  }

  public function add_admin_pages(){
    add_menu_page('G76 Scheduler', 'Scheduler', 'manage_options', 'g76_scheduler', array($this, 'admin_index'), 'dashicons-calendar-alt', 110);
  }
  
  public function admin_index(){
    require_once $this->plugin_path. 'templates/admin.php';
  }
}