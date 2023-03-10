<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd520b94a3a5437d58bf25cb338a3bfc6
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'IslomiddinDev\\GeneratingRepositoryAndService\\' => 45,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'IslomiddinDev\\GeneratingRepositoryAndService\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd520b94a3a5437d58bf25cb338a3bfc6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd520b94a3a5437d58bf25cb338a3bfc6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd520b94a3a5437d58bf25cb338a3bfc6::$classMap;

        }, null, ClassLoader::class);
    }
}
