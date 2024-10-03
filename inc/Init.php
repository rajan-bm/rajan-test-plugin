<?php

/**
 * @package Rajan Test Plugin
 */

namespace Inc;

final class Init
{

    /**
     * Store all the classes inside an array
     * @return array Full List of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }


    /**
     * Loop through the classess, initialize them, and call the register() if it exists
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }


    /**
     * Initialize the class
     * @param class $class class from the services array
     * @return class instance new instance of the class
     */
    private static function instantiate( $class ){
        $service = new $class();
        return $service;
    }
}
