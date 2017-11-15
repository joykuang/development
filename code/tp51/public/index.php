<?php

use think\Container;

define('STATUS', 1);
define('CWD_PATH', __DIR__);
define('APP_PATH', dirname(CWD_PATH) . '/local/');

if (!!STATUS) {
    require_once dirname(CWD_PATH) . '/local/bootstrap.php';
} else {
    require_once dirname(CWD_PATH) . '/packages/autoload.php';
    require_once dirname(CWD_PATH) . '/packages/topthink/framework/base.php';
}

Container::get('app', [APP_PATH])->run()->send();

function_exists('dumpinclude') && dumpinclude();

$loader = new \think\Loader();
file_put_contents('loader.json', json_encode(['classmap' => $loader->getClassMap(), 'psr-4' => $loader->getPrefixesPsr4()], JSON_PRETTY_PRINT));
