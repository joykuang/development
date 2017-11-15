<?php

Route::get('think', function () {
    //function_exists('production') && production();
    return 'Hello, ThinkPHP5!';
});

Route::get('phpinfo', function () {
    phpinfo();
    return null;
});

return [
    'hello/:name' => 'index/hello',
    'db/:do' => 'frontend/blog/:do',
    'ui/:do' => 'frontend/index/:do'
];
