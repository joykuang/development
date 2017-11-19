<?php
namespace YRS\Moduler;

use YRS\Core\Moduler;
use think\facade\Config;
//use think\Container;

class MysqlDatabase extends Moduler
{

    public function boot() {

        $_conn = Config::pull('database');

        $conn = [
            'type' => 'mysql',
            'hostname' => 'localhost',
            'database' => 'tp51',
            'username' => 'root',
            'password' => 'root',
            'prefix' => 'jkc_',
            'auto_timestamp' => true,
            'debug' => true
        ];

        $merge = array_merge($_conn, $conn);

        Config::set($merge, 'database');

    }
}
