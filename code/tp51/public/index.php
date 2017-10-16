<?php

define('APP_PATH', __DIR__ . '/../local/');

require __DIR__ . '/../packages/autoload.php';
require __DIR__ . '/../packages/topthink/framework/base.php';

\think\Container::get('app', [APP_PATH])->run()->send();

dumpinclude();
