<?php

use think\facade\Config;
use Whoops\Run as WhoopsRun;
use Whoops\Util\Misc;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Exception\Inspector;

Config::set('exception_handle', '\\Whoops\\Exception\\ErrorException');
ini_set('error_log', App::getRuntimePath() . 'log/php_errors.log');

$config = Config::get();
defined('IS_AJAX') || define('IS_AJAX', Misc::isAjaxRequest());

if ($config['app']['app_debug'] && !IS_AJAX) {
    $whoops = new WhoopsRun;
    $handle = new PrettyPageHandler;
    $think = [];
    foreach($config as $key => $value) {
      $pretty = json_encode($value, JSON_PRETTY_PRINT);
      $pretty = str_replace(" ", "&nbsp;", $pretty);
      $think[$key] = str_replace("\n", "<br>", $pretty);
    }
    $think['THINK_VERSION'] = App::version();
    $handle->addDataTable('ThinkPHP Configuration', $think);
    $whoops->pushHandler($handle);

    ///////////////////////////////
    //$handle->setApplicationPaths([THINK_PATH, VENDOR_PATH]);
    ///////////////////////////////

    $whoops->register();
}
