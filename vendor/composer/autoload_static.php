<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc74423ae8581f5047c150f301db8001
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc74423ae8581f5047c150f301db8001::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc74423ae8581f5047c150f301db8001::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc74423ae8581f5047c150f301db8001::$classMap;

        }, null, ClassLoader::class);
    }
}
