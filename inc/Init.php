<?php
/**
 * @package G76Scheduler
 */

namespace Inc;

final class Init
{
  /**
   * store all the classes inside an array
   * @return array full list of classes
   */
  public static function get_services(){
    return [
      Pages\Admin::class
    ];
  }

  /**
   * Loop through the classes, initialize them and call the register() method if it exists
   * 
   * @return 
   */
  
	public static function register_services() {
    foreach (self::get_services() as $class){
      $service = self::instantiate($class);
      if (method_exists($service, 'register')){
        $service->register();
      }
    }
  }

  /**
   * Initialize the class
   * @param class $class class from the services array
   * @return class instance new instance of the class
   */
  
  private static function instantiate($class){
    $service = new $class();
    return $service;
  }
}


// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;

// if (!class_exists('G76Scheduler')){
//     class G76Scheduler{
// 			public $plugin;

// 			function __construct(){
// 				$this->plugin = plugin_basename(__FILE__);
// 			}
// 			function register(){
// 				add_action('admin_enqueue_scripts', array ($this, 'enqueue'));
// 				add_action('admin_menu', array ($this, 'add_admin_pages'));
// 				add_filter('plugin_action_links_'.$this->plugin, array($this, 'settings_link'));
// 			}
        
// 			public function settings_link($links){
// 				$settings_link='<a href="options-general.php?page=g76_scheduler">Settings</a>';
// 				array_push($links, $settings_link);
// 				return $links;
// 			}

//       protected function create_post_type() {
// 				add_action( 'init', array( $this, 'custom_post_type' ) );
// 			}
// 			function custom_post_type(){
// 				register_post_type('scheduler', ['public'=>true, 'label'=> 'Scheduler']);
// 			}
	
// 			function enqueue(){
// 				wp_enqueue_style('g76s-main-style', plugins_url('/assets/css/style.css', __FILE__));
// 				wp_enqueue_script('g76s-main-script', plugins_url('/assets/script/main.js', __FILE__));
// 			}
// 			function activate(){
// 				//require_once plugin_dir_path( __FILE__ ) . 'inc/g76scheduler-plugin-activate.php';
// 				Activate::activate();
//       }
//     }

// $g76Scheduler = new G76Scheduler;
// $g76Scheduler->register();

// //activate
// register_activation_hook(__FILE__, array($g76Scheduler, 'activate'));

// //deactivate
// //require_once plugin_dir_path( __FILE__ ) . 'inc/g76scheduler-plugin-deactivate.php';
// register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
// }