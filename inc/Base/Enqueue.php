<?php

/**
 * @package Rajan Test Plugin
 */

namespace Inc\Base;
use Inc\Base\BaseController;

/**
 * 
 */
class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        // enqueue our styles ans scripts here
        wp_enqueue_style('rajan-test-plugin-style', $this -> plugin_url . 'assets/css/mystyle.css' );
        wp_enqueue_script('rajan-test-plugin-script', $this -> plugin_url . 'assets/js/myscript.js' );
    }
}
