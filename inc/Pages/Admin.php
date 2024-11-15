<?php

/**
 * @package Rajan Test Plugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
// use Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = [];
    public $subPages = [];
    public $callbacks_mngr;

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        // $this->callbacks_mngr = new ManagerCallbacks();
        $this->setPages();
        $this->setSubPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();

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

    public function setSettings()
    {
        $args = [
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'cpt_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'media_widget',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'gallery_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'testomonial_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'templates_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'login_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
            [
                'option_group' => 'test_plguin_settings',
                'option_name' => 'chat_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize'),
            ],
        ];
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                'id' => 'test_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks, 'testAdminSection'),
                'page' => 'test_plugin',
            ],
        ];
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [
            [
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'testTextExample'),
                'page' => 'test_plugin',
                'section' => 'test_admin_index',
                'args' => [
                    'label_for' => 'text_example',
                    'class' => 'example-class',
                ],
            ],
            [
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'testFirstName'),
                'page' => 'test_plugin',
                'section' => 'test_admin_index',
                'args' => [
                    'label_for' => 'first_name',
                    'class' => 'example-class',
                ],
            ],
        ];
        $this->settings->setFields($args);
    }
}
