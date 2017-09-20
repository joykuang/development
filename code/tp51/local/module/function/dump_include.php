<?php

function dumpinclude($file = null) {
    $gmt = date('Y-m-d H:i:s');
    $inc = var_export(get_included_files(), true);
    $inc = preg_replace('/\s\s(\d|\d+)\s=>\s/', '    ', $inc);
    $inc = str_replace(",\n)", "\n)", $inc);
    $txt = sprintf("<?php\n\n//@generated at %s\nreturn %s;", $gmt, $inc);
    //$txt = json_encode($inc);
    file_put_contents(is_null($file) ? "./includes.php" : $file, $txt);
}
