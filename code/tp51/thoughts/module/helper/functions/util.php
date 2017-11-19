<?php

function json($data, $file = null) {
    $json = json_encode($data, JSON_PRETTY_PRINT);
    if (!is_null($file)) file_put_contents($json, $file);
    return $json;
}

function serial($data, $file = null) {
    $serial = serialize($data);
    if (!is_null($file)) file_put_contents($serial, $file);
    return $serial;
}
