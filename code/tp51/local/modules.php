<?php

use YRS\Core\ModulerLauncher;

$isDebug = App::isDebug();

$modules = [
    'helper' => YRS\Moduler\Helper::class,
    'alioss' => YRS\Moduler\AliOss::class,
    'whoops' => YRS\Moduler\Whoops::class,
    'doctrine' => YRS\Moduler\Doctrine::class,
    'mysqldb' => YRS\Moduler\MysqlDatabase::class,
];

$settings = [
    'alioss' => false,
    'whoops' => $isDebug,
    'mysqldb' => function() {
        $soft = isset($_SERVER['SERVER_SOFTWARE']) ? strtolower($_SERVER['SERVER_SOFTWARE']) : 'cli';
        return substr_count($soft, 'apache');
    }
];

$instance = new ModulerLauncher($modules, $settings);

return $instance;
