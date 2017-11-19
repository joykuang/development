<?php

function entity() {
    return require __DIR__ . '/bootstrap.php';
}

function getEntity($entity) {
    $class = '\\YRS\\Entity\\' . $entity;
    return class_exists($class) ? new $class() : false;
}

function getClass($entity) {
    return '\\YRS\\Entity\\' . $entity;
}
