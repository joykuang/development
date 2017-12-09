<?php

function dumpinclude($file = null) {
    $gmt = date('Y-m-d H:i:s');
    $tmp = get_included_files();
    $inc = var_export($tmp, true);
    $inc = preg_replace('/\s\s(\d|\d+)\s=>\s/', '    ', $inc);
    $inc = str_replace(",\n)", "\n)", $inc);
    $via = isset($_SERVER['PHP_SELF']) ? '// @file ' . $_SERVER['PHP_SELF'] . PHP_EOL : '';
    $txt = sprintf("<?php\n\n// @generated at %s\n%s\nreturn %s;", $gmt, $via, $inc);
    $txt = str_replace('\\\\', '/', $txt);
    file_put_contents(is_null($file) ? './includes.php' : $file, $txt);
    return $tmp;
}
