<?php

namespace YRS\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class RestoreThinkPHP extends LibraryInstaller
{
    public function getInstallPath(PackageInterface $package)
    {
        $path = parent::getInstallPath($package);

        echo '[DEBUG] ' . $path . PHP_EOL;

        if (!file_exists('debug_backtrace.json')) file_put_contents('debug_backtrace.json', json_encode(debug_backtrace(), JSON_PRETTY_PRINT));

        return $path;
    }

    public function supports($packageType)
    {
        return 'think-framework' === $packageType;
    }
}
