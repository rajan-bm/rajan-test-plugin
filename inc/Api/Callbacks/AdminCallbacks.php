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

    public function cptDashboard(){
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function taxDashboard(){
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function widgetDashboard(){
        return require_once("$this->plugin_path/templates/widget.php");
    }
}
