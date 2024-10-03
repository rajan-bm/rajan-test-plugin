<?php

/**
 * @package Rajan Test Plugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $pages = [];
    public $subPages = [];
    public $callbacks;

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubPages();

        $this->settings->Addpages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subPages)->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'Test Plugin',
                'menu_title' => 'Test Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ],
        ];
    }

    public function setSubPages()
    {
        $this->subPages = [
            [
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin_cpt',
                'callback' => array($this->callbacks, 'cptDashboard'),
            ],
            [
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Taxonomy',
                'menu_title' => 'Taxonomy',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin_tax',
                'callback' => array($this->callbacks, 'taxDashboard'),
            ],
            [
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin_widgets',
                'callback' => array($this->callbacks, 'widgetDashboard'),
            ],
        ];
    }
}
