<?php
namespace think;

use Composer\Autoload\ClassLoader;

class Loader extends ClassLoader
{
    protected static $classAlias = [];

    /**
     * 设置类别名
     *
     * 使用示例
     * 1. Loader::addClassAlias([
     *     'App' => facade\App::class,
     *     'Build' => facade\Build::class,
     *     ...
     * ]);
     *
     * 2. Loader::addClassAlias('App', think\facade\App::class);
     *
     * @param array|string $alias 类别名|批量设置
     * @param array|string $class 源类名
     * @return bool
     */
    public static function addClassAlias($alias, $class = null)
    {
        if (is_array($alias)) {
            self::$classAlias = array_merge(self::$classAlias, $alias);
        } else {
            self::$classAlias[$alias] = $class;
        }
    }

    /**
     * 字符串命名风格转换
     * type 0 将Java风格转换为C的风格 1 将C风格转换为Java的风格
     * @param string  $name 字符串
     * @param integer $type 转换类型
     * @param bool    $ucfirst 首字母是否大写（驼峰规则）
     * @return string
     */
    public static function parseName($name, $type = 0, $ucfirst = true)
    {
        if ($type) {
            $name = preg_replace_callback('/_([a-zA-Z])/', function ($match) {
                return strtoupper($match[1]);
            }, $name);
            return $ucfirst ? ucfirst($name) : lcfirst($name);
        } else {
            return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
        }
    }

    /**
     * Loads the given class or interface.
     *
     * @param  string    $class The name of the class
     * @return bool|null True if loaded, null otherwise
     */
    public function loadClass($class)
    {
        if (isset(self::$classAlias[$class])) {
            return class_alias(self::$classAlias[$class], $class);
        }

        if ($file = $this->findFile($class)) {
            include $file;
            return true;
        }
    }
}
