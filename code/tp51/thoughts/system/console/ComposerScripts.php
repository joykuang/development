<?php

namespace YRS\Console;

use Composer\Script\Event;
use Composer\Plugin\CommandEvent;

class ComposerScripts
{
    public static function preUpdate(Event $event)
    {
        $installation = $event->getComposer()->getInstallationManager();

        //$installer = $installation->getInstaller('think-framework');

        $installation->removeInstaller(new \think\composer\ThinkFramework($event->getIO(), $event->getComposer()));

        $plugin = $event->getComposer()->getPluginManager();

        $plugin->addPlugin(new \YRS\Composer\Plugin);

        print_r($plugin->getPlugins());

        static::clearCompiled();
    }


    public static function postInstall(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir').'/autoload.php';
        // static::clearCompiled();
    }

    public static function postUpdate(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir').'/autoload.php';
        static::clearCompiled();
    }

    public static function postAutoloadDump(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir').'/autoload.php';
        static::clearCompiled();
    }

    protected static function clearCompiled()
    {
        file_put_contents('composer-inc.json', json_encode(get_included_files(), JSON_PRETTY_PRINT));
    }
}
