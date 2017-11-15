<?php

$debug = App::isDebug();

$functions = App::getRuntimePath() . 'functions.php';

$function_files = glob(__DIR__ . '/module/function/*.php');

foreach ($function_files as $id => $file) {
    if (!$debug) {
        if (file_exists($functions)) {
            require $functions;
            break;
        }
        if (!$id) $cache = '<?php';
        $temp = file_get_contents($file);
        $temp = preg_replace('/^(|\s|\s+)<\?php/', '', $temp);
        $temp = str_replace('/(|\s|\s+)\?>$/', '', $temp);
        $line = explode("\n", $temp);
        foreach ($line as $no => &$code) {
            if (empty(trim($code))) {
                unset($line[$no]);
                continue;
            }
        }
        $temp = implode("\n", $line);
        $cache .= PHP_EOL . PHP_EOL . '// ' . basename($file) . PHP_EOL;
        $cache .= $temp;
        if ($id + 1 === count($function_files)) file_put_contents($functions, $cache);
    }
    if (file_exists($file)) require $file;
}

$server = isset($_SERVER['SERVER_SOFTWARE']) ? strtolower($_SERVER['SERVER_SOFTWARE']) : 'cli';
if (substr_count($server, 'apache')) require __DIR__ . '/module/development/apache.php';

if ($debug) require __DIR__ . '/module/development/whoops.php';