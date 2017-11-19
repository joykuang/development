<?php
namespace YRS\Moduler;

use YRS\Core\Moduler;
use think\facade\Config;

class Doctrine extends Moduler
{
    public function boot() {
        require_once __DIR__ . '/functions.php';
    }
}
