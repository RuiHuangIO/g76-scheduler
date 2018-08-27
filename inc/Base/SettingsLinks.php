<?php
/**
 * @package G76Scheduler
 */

namespace Inc\Base;

class SettingsLinks
{
	public function register(){
    add_filter("plugin_action_links_".PLUGIN, array($this, 'settings_link') );
  }
  
  public function settings_link( $links ){
    $settings_link = '<a href="admin.php?page=g76_scheduler">Settings</a>';
    array_push($links, $settings_link);
    return $links;
  }
}