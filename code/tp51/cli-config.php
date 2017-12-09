<?php

use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

require __DIR__ . '/thoughts/packages/autoload.php';
require __DIR__ . '/thoughts/module/doctrine/functions.php';

$helper = new HelperSet([
    'em' => new EntityManagerHelper(entity())
]);

return $helper;
