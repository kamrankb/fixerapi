<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17e2c0f2949ebab429a97712b0ae63fb
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kamrankb\\Fixerapi\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kamrankb\\Fixerapi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17e2c0f2949ebab429a97712b0ae63fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17e2c0f2949ebab429a97712b0ae63fb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit17e2c0f2949ebab429a97712b0ae63fb::$classMap;

        }, null, ClassLoader::class);
    }
}