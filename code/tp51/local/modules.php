<?php

use YRS\Core\ModulerLauncher;

$isDebug = App::isDebug();

$module = [
    'helper' => YRS\Moduler\Helper::class,
    //'alioss' => YRS\Moduler\AliOss::class,
    'whoops' => YRS\Moduler\Whoops::class,
    'doctrine' => YRS\Moduler\Doctrine::class,
    'mysqldb' => YRS\Moduler\MysqlDatabase::class
];

$enable = [
    'helper' => true,
    'alioss' => false,
    'whoops' => $isDebug,
    'doctrine' => true,
    'mysqldb' => function() {
        $soft = isset($_SERVER['SERVER_SOFTWARE']) ? strtolower($_SERVER['SERVER_SOFTWARE']) : 'cli';
        return substr_count($soft, 'apache');
    }
];

$instance = new ModulerLauncher($module, $enable);

return $instance;
