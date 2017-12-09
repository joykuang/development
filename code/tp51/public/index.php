<?php

use think\Container;

define('STATUS', 1);
define('CWD_PATH', __DIR__);
define('APP_PATH', dirname(CWD_PATH) . '/local/');

$root = dirname(CWD_PATH);

if (!!STATUS) {
    $init = require $root . '/thoughts/bootstrap.php';
    $init->path($root . '/thoughts/packages');
} else {
    require_once $root . '/thoughts/packages/autoload.php';
    require_once $root . '/thoughts/packages/topthink/framework/base.php';
}

Container::get('app', [APP_PATH])->run()->send();

function_exists('dumpinclude') && dumpinclude();
function_exists('debugbar_add') && debugbar_add(get_included_files(), 'included_files');
function_exists('debugbar_end') && debugbar_end();
