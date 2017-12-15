<?php
namespace YRS;

use Exception;

class DebugBar
{
    protected static $file = null;

    protected static $uuid = null;

    protected static $json = [];

    public static function vue($minify = true)
    {
        $file = __DIR__ . '/resources/vue/vue' . ($minify ? '.min' : '') . '.js';
        return file_get_contents($file);
    }

    public static function axios($minify = true)
    {
        $file = __DIR__ . '/resources/axios/axios' . ($minify ? '.min' : '') . '.js';
        return file_get_contents($file);
    }

    public static function start($base)
    {
        if (PHP_SAPI === 'cli') return false;

        if (!is_dir($base)) {
            // TODO: 检测文件夹是否存在以及能否创建
            // throw new Exception("Error path", 1);
            try {
                mkdir($base, 0775, true);
            } catch (Exception $e) {
                print $e->getMessage();
                exit();
            }

        }

        if (isset($_COOKIE['yrs_debugbar__uuid'])) {
            $uuid = $_COOKIE['yrs_debugbar__uuid'];
        } else {
            $time = time();
            $uuid = $time . rand(pow(10,7), pow(10,8)-1);
            setcookie('yrs_debugbar__uuid', $uuid);
        }

        $path = realpath($base) . '/' . date('Ymd');
        if (!is_dir($path)) mkdir($path, 0775, true);
        $file = $path . '/' . $uuid . '.json';
        file_put_contents($file, json_encode(['detail' => '', 'content' => []]));

        self::$file = $file;
    }

    public static function write($data, $group = 'default')
    {
        if (PHP_SAPI === 'cli') return false;

        $file = self::$file;

        if (is_null($file)) throw new Exception("Please Debug::start() first", 1);
        if (!is_file($file)) throw new Exception("No debug file", 1);

        $json = file_get_contents($file, $file);
        $tidy = json_decode($json, true);
        $tidy['content'][$group] = $data;
        file_put_contents($file, json_encode($tidy));
    }

    public static function add($data, $group = 'default')
    {
        if (PHP_SAPI === 'cli') return false;
        self::$json[$group] = $data;
    }

    public static function end()
    {
        if (PHP_SAPI === 'cli') return false;
        $file = self::$file;

        if (is_null($file)) throw new Exception("Please Debug::start() first", 1);
        if (!is_file($file)) throw new Exception("No debug file", 1);

        $json = file_get_contents($file, $file);
        $tidy = json_decode($json, true);

        $tidy['content'] = array_merge($tidy['content'], self::$json);
        file_put_contents($file, json_encode($tidy));
    }
}
