<?php
/**
 * 模拟 Apache Mod Rewrite
 * 12-17
 */

if (is_file($_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    require dirname(__DIR__) . '/public/index.php';
}
