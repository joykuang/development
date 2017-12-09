<?php

use YRS\DebugBar;

function debugbar_start($path) {
    return DebugBar::start($path);
}

function debugbar_write($data, $group = 'default') {
    return DebugBar::write($data, $group);
}

function debugbar_add($data, $group = 'default') {
    return DebugBar::add($data, $group);
}

function debugbar_end() {
    return DebugBar::end();
}
