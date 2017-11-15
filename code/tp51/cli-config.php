<?php

use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

require_once __DIR__ . '/packages/autoload.php';
require_once __DIR__ . '/local/module/doctrine/functions.php';

$helper = new HelperSet([
    'em' => new EntityManagerHelper(entity())
]);

return $helper;
