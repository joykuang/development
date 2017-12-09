<?php

use YRS\DebugBar;
use think\Config;
use think\Response;

Route::get('_debugbar/resources/vue$', function(Response $response) {
    return $response->data(DebugBar::vue(false))->code(200)->contentType('application/javascript');
})->ext('|js');

Route::get('_debugbar/resources/vue.min$', function(Response $response) {
    return $response->data(DebugBar::vue())->code(200)->contentType('application/javascript');
})->ext('|js');

Route::get('_debugbar/resources/axios$', function(Response $response) {
    return $response->data(DebugBar::axios(false))->code(200)->contentType('application/javascript');
})->ext('|js');

Route::get('_debugbar/resources/axios.min$', function(Response $response) {
    return $response->data(DebugBar::axios())->code(200)->contentType('application/javascript');
})->ext('|js');
