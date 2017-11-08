<?php

use think\facade\Config;

$path = __DIR__ . '/apache';

foreach (glob($path . '/*.php') as $cfg) {
    $file = realpath($cfg);
    $name = basename($file, '.php');
    Config::load($file, $name);
}
