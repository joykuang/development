<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Composer\Autoload\ClassLoader;

$conn = class_exists('think\facade\Config') ? \think\facade\Config::pull('doctrine') : require_once './config/doctrine.php';

if (is_null($conn) || !is_array($conn)) {
    throw new \ErrorException('Doctrine Connection Failed');
}

$debug = isset($conn['debug']) ? $conn['debug'] : false;
$entity = [ __DIR__ . '/entities' ];

$loadClass = class_exists('think\Loader') ? think\Loader::class : 'ClassLoader';
$loader = new $loadClass();
$loader->addPsr4('YRS\\Entity\\', $entity);
$loader->register();

$entities = Setup::createAnnotationMetadataConfiguration($entity, $debug);
$entityManager = EntityManager::create($conn, $entities);
return $entityManager;
