<?php

/**
 * @package Rajan Test Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard($template = 'admin')
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function cptDashboard()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function taxDashboard()
    {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function widgetDashboard()
    {
        return require_once("$this->plugin_path/templates/widget.php");
    }

    public function testOptionGroup($input)
    {
        return $input;
    }

    public function testAdminSection()
    {
        echo 'This is the test admin section';
    }

    public function testTextExample(){
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" id="text_example" value="'. $value .'" placeholder="Write something here">';
    }

    public function testFirstName(){
        $value = esc_attr( get_option( 'first_name' ) );
        echo '<input type="text" class="regular-text" name="first_name" id="first_name" value="'. $value .'" placeholder="Your first name">';
    }
}
