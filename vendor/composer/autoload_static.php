<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b396208cc767d1c3e6df2ef860ed952
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b396208cc767d1c3e6df2ef860ed952::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b396208cc767d1c3e6df2ef860ed952::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6b396208cc767d1c3e6df2ef860ed952::$classMap;

        }, null, ClassLoader::class);
    }
}
