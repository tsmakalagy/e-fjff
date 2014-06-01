<?php
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger,
    Doctrine\Common\Annotations\AnnotationReader,
	Doctrine\Common\Annotations\AnnotationRegistry;

require_once "vendor/autoload.php";

$classLoader = new ClassLoader('Doctrine');
$classLoader->register();

$classLoader = new ClassLoader('Entities', __DIR__ . '/application/models/Entities');
$classLoader->register();
$classLoader = new ClassLoader('Proxies', __DIR__ . '/application/models/proxies');
$classLoader->register();

$config = new Configuration;
$cache = new ArrayCache;
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__ . '/application/models/Entities'));

//AnnotationRegistry::registerFile("Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php");
$reader = new AnnotationReader();
$driverImpl = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, array(__DIR__ . "/application/models/Entities"));
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);

$config->setProxyDir(__DIR__ . '/application/models/proxies');
$config->setProxyNamespace('Proxies');

$config->setAutoGenerateProxyClasses( TRUE );

$config->setQueryCacheImpl($cache);

//$logger = new EchoSQLLogger;
//$config->setSQLLogger($logger);

$connectionOptions = array(
	'driver' => 'pdo_mysql',
    'user' =>     'mysqluser',
    'password' => 'mysqluser',
    'host' =>     'localhost',
    'dbname' =>   'e-fokonolona'
);

// Create EntityManager
$em = EntityManager::create($connectionOptions, $config);