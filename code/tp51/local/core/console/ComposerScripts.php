<?php

namespace YRS\Console;

use Composer\Script\Event;

class ComposerScripts
{
    public static function postInstall(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir').'/autoload.php';

        static::clearCompiled();
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
        // file_put_contents('update-log.json', json_encode(get_included_files(), JSON_PRETTY_PRINT));
    }
}
