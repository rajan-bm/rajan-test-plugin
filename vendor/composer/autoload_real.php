<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1d439a02429dafd54edafb5fcde63482
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit1d439a02429dafd54edafb5fcde63482', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1d439a02429dafd54edafb5fcde63482', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1d439a02429dafd54edafb5fcde63482::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
