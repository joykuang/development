<?php

Route::pattern([
    'post_id' => '\d+',
    'taxonomy_id' => '\d+'
]);

Route::get('think', function () {
    //function_exists('production') && production();
    return 'Hello, ThinkPHP5!';
});

Route::get('phpinfo', function () {
    phpinfo();
    return null;
});

Route::post('post/save', 'backend/post/save');

return [
    '/' => 'frontend/blog/index',
    'hello/:name' => 'index/hello',
    'db/:do' => 'frontend/blog/:do',
    'ui/:do' => 'frontend/index/:do',

    'post/:post_id' => 'backend/post/view',
    'taxonomy/:taxonomy_id' => 'backend/taxonomy/taxonomy',
    'taxonomy' => 'backend/taxonomy/taxonomies'

];
