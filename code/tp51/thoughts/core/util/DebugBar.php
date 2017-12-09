<?php
namespace YRS;

class DebugBar
{
    protected static $file = null;

    protected static $uuid = null;

    protected static $json = [];

    public static function start($base)
    {
        if (!is_dir($base)) throw new \Exception("Error path", 1);

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
        $file = self::$file;

        if (is_null($file)) throw new \Exception("Please Debug::start() first", 1);
        if (!is_file($file)) throw new \Exception("No debug file", 1);

        $json = file_get_contents($file, $file);
        $tidy = json_decode($json, true);
        $tidy['content'][$group] = $data;
        file_put_contents($file, json_encode($tidy));
    }

    public static function add($data, $group = 'default')
    {
        self::$json[$group] = $data;
    }

    public static function end()
    {
        $file = self::$file;

        if (is_null($file)) throw new \Exception("Please Debug::start() first", 1);
        if (!is_file($file)) throw new \Exception("No debug file", 1);

        $json = file_get_contents($file, $file);
        $tidy = json_decode($json, true);

        $tidy['content'] = array_merge($tidy['content'], self::$json);
        file_put_contents($file, json_encode($tidy));
    }
}
