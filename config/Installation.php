<?php

require_once(__DIR__ . '/../config/config.php');
use Doctrine\ORM\Tools\SchemaTool;
require_once(__DIR__ . '/../bootstrap.php');

/**
 * This class check the existence of DataBase: if not exist, it create it
 */
class Installation{

    public static function install(){
        try{
            $db = new PDO("mysql:host=". DB_HOST, DB_USER, DB_PASS);

            $stmt = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . DB_NAME ."'");
            $existingDatabase = $stmt->fetchColumn();

            // verify if the database has tables, if not, the database is considered empty
            $tables = $db->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '" . DB_NAME . "';");
            $existingTables = $tables->fetchColumn();

            if(!$existingDatabase || $existingTables == 0){
                $queryCreateDB = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
                $db->exec($queryCreateDB);

                // Create SchemaTool for DoctrineORM relations
                $schemaTool = new SchemaTool(getEntityManager());

                // Get entity metadata
                $metadata = getEntityManager()->getMetadataFactory()->getAllMetadata();

                // Create database schema
                $schemaTool->createSchema($metadata);
            }
        }catch(PDOException $e){
            echo "ERROR: ". $e->getMessage();
        }
    }

}