<?php

Route::get('api/test_ajax', function () {
    header('Content-Type: application/json; charset=utf-8;');
    $json = ['message' => '', 'status' => 1, 'url' => null, 'result' => null];
    return json_encode($json, JSON_PRETTY_PRINT);
});

Route::post('api/test_upload', function () {
    $json = ['message' => '文件上传成功', 'status' => 1, 'url' => null, 'result' => null];
    //$file = request()->file('file');
    $file = current(request()->file());
    $info = $file->move(dirname(APP_PATH) . '/public/assets/upload');
    if ($info) {
        $json['result'] = [
            $info->getExtension(),
            $info->getSaveName(),
            $info->getFilename()
        ];

        $json['location'] = '/assets/upload/' . $info->getSaveName();

    } else {
        $json['message'] = $file->getError();
        $json['status'] = 0;
    }

    config('app.app_debug', false);
    config('app.app_trace', false);

    //$json = $_REQUEST;

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($json, JSON_PRETTY_PRINT);
    return null;
});

Route::post('api/test_ckeditor', function () {
    config('app.app_debug', false);
    config('app.app_trace', false);

    header('Content-Type: application/json; charset=utf-8;');
    $json = ['uploaded' => 1, 'fileName' => '王老吉萌小何.png', 'url' => '/assets/upload/20171009/eab8151d11f553275400fca3fbb1cb34.png'];
    return json_encode($json, JSON_PRETTY_PRINT);
});

Route::post('api/test_html', function() {
    config('app.app_debug', false);
    config('app.app_trace', false);

    $html = <<<HTML
<script type="text/javascript">
    window.parent.CKEDITOR.tools.callFunction("0", "\/assets\/upload\/20171009\/eab8151d11f553275400fca3fbb1cb34.png", "");
</script>
HTML;

    return $html;
});

return [];
