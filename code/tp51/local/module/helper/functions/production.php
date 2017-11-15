<?php

function production() {
    if (!class_exists('think\facade\Config')) return false;
    \think\facade\Config::set('app.app_debug', false);
    \think\facade\Config::set('app.app_trace', false);
}
