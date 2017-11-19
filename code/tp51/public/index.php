<?php

use think\Container;

define('STATUS', 1);
define('CWD_PATH', __DIR__);
define('APP_PATH', dirname(CWD_PATH) . '/local/');

$root = dirname(CWD_PATH);

if (!!STATUS) {
    $init = require $root . '/thoughts/bootstrap.php';
    $init->path($root . '/packages');
} else {
    require_once $root . '/packages/autoload.php';
    require_once $root . '/packages/topthink/framework/base.php';
}

Container::get('app', [APP_PATH])->run()->send();
function_exists('dumpinclude') && dumpinclude();
