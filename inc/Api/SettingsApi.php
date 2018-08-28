<?php
/** 
* @package G76Scheduler
*/
namespace Inc\Api;

class SettingsApi{
  public function AddPages(array $pages){
    $this -> admin_pages = $pages;
    
    return $this;
  }
}