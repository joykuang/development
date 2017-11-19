<?php
namespace think;

class Thoughts
{
    public function path($composer, $framework = null) {

        //$vendor = dirname(__DIR__) . '/packages';
        //$tplibs = $vendor . '/topthink/framework/library';
        $tplibs = is_null($framework) ? realpath($composer) . '/topthink/framework/library' : realpath($framework) . '/library';

        require_once realpath($composer) . '/autoload.php';

        $loader = new Loader;
        $loader->addPsr4('think\\', $tplibs . '/think');
        $loader->addPsr4('traits\\', $tplibs . '/traits');
        $loader->register();

        Error::register();

        require_once __DIR__ . '/include/interface.php';

        Container::getInstance()->bind([
            'app' => App::class,
            'build' => Build::class,
            'cache' => Cache::class,
            'config' => Config::class,
            'cookie' => Cookie::class,
            'debug' => Debug::class,
            'env' => Env::class,
            'hook' => Hook::class,
            'lang' => Lang::class,
            'log' => Log::class,
            'request' => Request::class,
            'response' => Response::class,
            'route' => Route::class,
            'session' => Session::class,
            'url' => Url::class,
            'validate' => Validate::class,
            'view' => View::class,
            'think\LoggerInterface' => Log::class
        ]);

        Facade::bind([
            facade\App::class => App::class,
            facade\Build::class => Build::class,
            facade\Cache::class => Cache::class,
            facade\Config::class => Config::class,
            facade\Cookie::class => Cookie::class,
            facade\Debug::class => Debug::class,
            facade\Env::class => Env::class,
            facade\Hook::class => Hook::class,
            facade\Lang::class => Lang::class,
            facade\Log::class => Log::class,
            facade\Request::class => Request::class,
            facade\Response::class => Response::class,
            facade\Route::class => Route::class,
            facade\Session::class => Session::class,
            facade\Url::class => Url::class,
            facade\Validate::class => Validate::class,
            facade\View::class => View::class
        ]);

        Loader::addClassAlias([
            'App' => facade\App::class,
            'Build' => facade\Build::class,
            'Cache' => facade\Cache::class,
            'Config' => facade\Config::class,
            'Cookie' => facade\Cookie::class,
            'Db' => Db::class,
            'Debug' => facade\Debug::class,
            'Env' => facade\Env::class,
            'Facade' => Facade::class,
            'Hook' => facade\Hook::class,
            'Lang' => facade\Lang::class,
            'Log' => facade\Log::class,
            'Request' => facade\Request::class,
            'Response' => facade\Response::class,
            'Route' => facade\Route::class,
            'Session' => facade\Session::class,
            'Url' => facade\Url::class,
            'Validate' => facade\Validate::class,
            'View' => facade\View::class
        ]);

        $inherit = dirname($tplibs) . '/convention.php';

        facade\Config::set(require $inherit);

    }
}

return new Thoughts;
