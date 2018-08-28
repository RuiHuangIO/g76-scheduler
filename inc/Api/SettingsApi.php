<?php
/** 
* @package G76Scheduler
*/
namespace Inc\Api;

class SettingsApi{

  public $this->admin_pages = array();

  public function register(){
    if(!empty($this->admin_pages)){
      add_action('admin_menu', array($this, 'add_admin_menu'))  ;
    }
  }
  public function AddPages(array $pages){
    $this->admin_pages = $pages;
    return $this;
  }

  private function add_admin_menu(){
    foreach ($this->admin_pages as $page){
      add_menu_page($page['page_title'])
    }
  }
}