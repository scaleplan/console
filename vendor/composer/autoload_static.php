<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit13ca9b1c3911e8330574ec1136f50de5
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Scaleplan\\Component\\Console\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Scaleplan\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit13ca9b1c3911e8330574ec1136f50de5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit13ca9b1c3911e8330574ec1136f50de5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
