<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteda482f756bffbe0992edb026fc9e826
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Product\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Product\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Modules\\Product\\Database\\Seeders\\ProductDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/ProductDatabaseSeeder.php',
        'Modules\\Product\\Database\\factories\\ProductFactory' => __DIR__ . '/../..' . '/Database/factories/ProductFactory.php',
        'Modules\\Product\\Entities\\Product' => __DIR__ . '/../..' . '/Entities/Product.php',
        'Modules\\Product\\Http\\Controllers\\ProductController' => __DIR__ . '/../..' . '/Http/Controllers/ProductController.php',
        'Modules\\Product\\Providers\\ProductServiceProvider' => __DIR__ . '/../..' . '/Providers/ProductServiceProvider.php',
        'Modules\\Product\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/Providers/RouteServiceProvider.php',
        'Modules\\Product\\Repositories\\Interfaces\\ProductRepositoryInterface' => __DIR__ . '/../..' . '/Repositories/Interfaces/ProductRepositoryInterface.php',
        'Modules\\Product\\Repositories\\ProductRepository' => __DIR__ . '/../..' . '/Repositories/ProductRepository.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteda482f756bffbe0992edb026fc9e826::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteda482f756bffbe0992edb026fc9e826::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteda482f756bffbe0992edb026fc9e826::$classMap;

        }, null, ClassLoader::class);
    }
}
