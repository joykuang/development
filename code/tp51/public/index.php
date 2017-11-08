<?php

use think\Container;
use think\facade\Hook;
use Composer\Autoload\ClassLoader as Composer;

define('APP_PATH', __DIR__ . '/../local/');

require __DIR__ . '/../packages/autoload.php';
require __DIR__ . '/../packages/topthink/framework/base.php';

Hook::add('app_init', function() {
    $done = (new Composer)->register();
    trace(var_export($done, true));
});

Container::get('app', [APP_PATH])->run()->send();

dumpinclude();
