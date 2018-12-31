<?php

/**
 * @package the-plug
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
  public function adminDashboard()
  {
    return require_once("$this->plugin_path/templates/admin.php");
  }

  public function adminCpt()
  {
    return require_once("$this->plugin_path/templates/cpt.php");
  }

  public function adminTaxonomy()
  {
    return require_once("$this->plugin_path/templates/taxonomy.php");
  }

  public function adminWidget()
  {
    return require_once("$this->plugin_path/templates/widget.php");
  }

  public function thePlugOptionsGroup($input)
  {
    return $input;
  }

  public function thePlugAdminSection()
  {
    echo 'section haHAA';
  }

  public function thePlugTextExample()
  {
    $value = esc_attr(get_option('text_example'));

    echo "<input type='text' class='regular-text' name='text_example' value='$value'  placeholder='haHAA'> ";
  }

  public function thePlugTestField()
  {
    $value = esc_attr(get_option('test_field'));

    echo "<input type='text' class='regular-text' name='test_field' value='$value'  placeholder='test'> ";
  }
}