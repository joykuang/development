<?php
namespace YRS\Moduler;

use Whoops\Run;
use think\facade\App;
use Whoops\Util\Misc;
use YRS\Core\Moduler;
use think\facade\Config;
use Whoops\Exception\Inspector;
use Whoops\Handler\PrettyPageHandler;

class Whoops extends Moduler
{
    protected $settings;

    public function boot() {
        
        $this->settings = Config::get();
        ini_set('error_log', realpath(App::getRuntimePath()) . '/log/php_errors.log');
        Config::set('exception_handle', Whoops\Exception\ErrorException::class);

        if (Misc::isAjaxRequest()) return false;

        $whoops = new Run();
        $handle = new PrettyPageHandler();
        $think = [];
        foreach($this->settings as $key => $value) {
          $pretty = json_encode($value, JSON_PRETTY_PRINT);
          $pretty = str_replace(" ", "&nbsp;", $pretty);
          $think[$key] = str_replace("\n", "<br>", $pretty);
        }
        $think['THINK_VERSION'] = App::version();
        $handle->addDataTable('ThinkPHP Configuration', $think);
        $whoops->pushHandler($handle);
        //$handle->setApplicationPaths([THINK_PATH, VENDOR_PATH]);
        $whoops->register();
    }
}
