<?php

// include the composer autoloader for autoloading packages
require_once(__DIR__ . '/vendor/autoload.php');

// include config file for constant info
require_once(__DIR__ . '/config/config.php');

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/**
 *  This method handles Doctrine entityManager configuration
 */
function getEntityManager(): EntityManager {

    $paths = array(__DIR__ . "/entity");
    $config = ORMSetup::createAttributeMetadataConfiguration($paths);
    $config->setAutoGenerateProxyClasses(true);

    # Setting configuration params for doctrine (^php7.0-sqlite)
    $connectionParams = array(
        'dbname' => DB_NAME,
        'user' => DB_USER,
        'password' => DB_PASS,
        'host' => DB_HOST,
        'driver' => 'pdo_mysql',
    );

    $connection = DriverManager::getConnection($connectionParams, $config);
    return new EntityManager($connection, $config);
}