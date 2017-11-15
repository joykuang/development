<?php
namespace YRS\Moduler;

use think\facade\Config;

class MysqlDatabase extends Moduler
{

    public function boot() {

        $_conn = Config::get('database');

        $conn = [
            'type' => 'mysql',
            'hostname' => '127.0.0.1',
            'database' => 'tp51',
            'username' => 'root',
            'password' => 'root',
            'prefix' => 'jkc_',
            'auto_timestamp' => true,
            'debug' => true
        ];

        Config::set('database', array_merge($_conn, $conn));

    }
}
