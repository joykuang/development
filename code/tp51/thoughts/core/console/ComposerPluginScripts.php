<?php

namespace YRS\Console;

//use Composer\EventDispatcher\Event;
//use Composer\Plugin\CommandEvent;
//use Composer\Plugin\PluginManager;
use Composer\Composer;
use Composer\Package\Package;

class ComposerPluginScripts
{
    public static function command(Composer $composer, Package $package)
    {
        //require_once $event->getComposer()->getConfig()->get('vendor-dir').'/autoload.php';
        //var_dump($event);

        //return $event->stopPropagation();
        /*$c1 = $event->getName();
        $c2 = $event->getArguments();
        $c3 = $event->getFlags();

        var_dump($c1, $c2, $c3);*/

        var_dump($composer->getPackage()->getExtra());
    }

}
