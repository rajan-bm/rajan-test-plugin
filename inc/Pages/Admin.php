<?php
/**
 * @package Rajan Test Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public function register()
    {
        add_action('admin_menu', array($this, 'admin_menu_pages'));
    }

    public function admin_menu_pages()
    {
        add_menu_page('Rajan Test Plugin', 'Rajan Test', 'manage_options', 'rajan_test', array($this, 'admin_index'), 'dashicons-store', 110);
    }    

    public function admin_index()
    {
        require_once $this->plugin_path . 'templates/admin.php';
    }
}
