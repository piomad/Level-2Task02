<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3849855c05eeaf35db17f2e3df49437b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3849855c05eeaf35db17f2e3df49437b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3849855c05eeaf35db17f2e3df49437b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3849855c05eeaf35db17f2e3df49437b::$classMap;

        }, null, ClassLoader::class);
    }
}
