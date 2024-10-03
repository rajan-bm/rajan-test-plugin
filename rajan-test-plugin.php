<?php

/**
 * @package Rajan Test Plugin
 */
/*
Plugin Name: Rajan Test Plugin
Plugin URI: https://www.rajantech.com
Description: This is a test plugin
Version: 1.0.0
Author: Rajan
Author URI: https://www.rajantech.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: rajan-test-plugin
*/
/*
This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/

// remove database vulenrability
defined('ABSPATH') or die('No direct access allowed');

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
// define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
// define( 'PLUGIN',  plugin_basename( __FILE__ ) );

function activate_rajan_test_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_rajan_test_plugin' );

function deactivate_rajan_test_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_activation_hook( __FILE__, 'deactivate_rajan_test_plugin' );


if( class_exists( 'Inc\\Init' )){
    Inc\Init::register_services();
}
