<?php

require_once(__DIR__ . "/../bootstrap.php");

/**
 *  FEntityManager class, it communicates directly with Doctrine's entiry manager (through bootstrap configuragion)
 *  It's a singleton class, used by FPersistanceManager
 *  It performs CRUD (Create, Read, Update, Delete) operation.
 * 
 *  METHODS LIST:
 *  - saveObj (object) => boolean
 *  - deleteObj (object) => boolean
 *  - getObjById (className, id) => entity class
 *  - getObjByValue ($class, $field, $value) => entity class
 *  - getObjByTWOValues ($table, $field1, $value1, $field2, $value2) => entity class
 *  - getObjListByStrPattern ($table, $field, $str) => entity class
 *  - getCountObjectByValue ($table, $field, $value) => entity class
 *  - existWithAttribute ($table, $field, $value) => boolean
 */

class FEntityManager{
    private static $instance;
    private static $entityManager;

    /** SINGLETON INSTANCIATION  */

    private function __construct() {
        self::$entityManager = getEntityManager();
    }
    
    public static function getInstance() {
        if (!self::$instance) { self::$instance = new self(); }
        return self::$instance;
    }

    public static function getEntityManager() {
        return self::$entityManager;
    }


    /** UPDATING METHODS */

    /**
     *  Save an object on db for persistence of an entity
     *  @return boolean
     */
    public static function saveObj($object) {
        try{
            self::$entityManager->getConnection()->beginTransaction();
            self::$entityManager->persist($object);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit();
            return true;
        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /** DELETING METHOD */

    /**
     *  Delete an object form db
     *  @return boolean
     */
    public static function deleteObj($obj) {
        try{
            self::$entityManager->getConnection()->beginTransaction();
            self::$entityManager->remove($obj);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit();
            return true;
        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /** READING METHODS */

    /**
     *  Return an object retrived by id
     *  @return obj || null
     */
    public static function getObjById($className, $id) {
        try{
            return self::$entityManager->find($className, $id); // this is equal to getRepository($className)->find(id)
        }catch(Exception $e) {
            echo "ERROR: ". $e->getMessage();
            return null;
        }
    }

    /**
     *  Return an object retrived by one of its attributes
     *  @return obj || null
     */
    public static function getObjByValue($class, $field, $value) {
        try {
            return self::$entityManager->getRepository($class)->findOneBy([$field => $value]);
        }catch(Exception $e){
            echo "ERROR: ". $e->getMessage();
            return null;
        }
    }

    /**
     *  Return a list of object retrived from a table where field = value (can also be NULL)
     *  @return array
     */
    public static function getObjList($table, $field, $value) {
        try{
            if ($value == null){
                $dql = "SELECT e FROM " . $table . " e WHERE e." . $field . " IS NULL";
                $query = (self::$entityManager->createQuery($dql));
            }else{
                $dql = "SELECT e FROM " . $table . " e WHERE e." . $field . " = :value";
                $query = self::$entityManager->createQuery($dql)->setParameter(':value', $value); //to avoid sql injection
            }
            return $query->getResult();
        }catch(Exception $e){
                echo "ERROR " . $e->getMessage();
                return [];
        }
    }

    /**
     *  Return an object retrived by two of its attributes
     *  @return obj || null
     */
    public static function getObjByTWOValues($table, $field1, $value1, $field2, $value2) {
        try{
            $dql = "SELECT e 
                    FROM " . $table . " e 
                    WHERE e." . $field1 . " = :value1 
                    AND e." . $field2 . " = :value2";
                    
            $query = (self::$entityManager->createQuery($dql))
                        ->setParameter('value1', $value1)
                        ->setParameter('value2', $value2);
            return $query->getOneOrNullResult();

        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     *  Return an object that has an attribute that matches a $str pattern
     *  @return array || null
     */
    public static function getObjListByStrPattern($table, $field, $str) {
        try{
            $dql = "SELECT e FROM " . $table . " e WHERE e." . $field . " LIKE :pattern";
            $query = self::$entityManager->createQuery($dql)->setParameter('pattern', '%' . $str . '%');
            return $query->getResult();
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return null;
        }
    }

    /**
     *  Return the number of object found with a specific value
     *  @return array
     */
    public static function getCountObjectByValue($table, $field, $value) {
        try{
            $dql = "SELECT COUNT(e) FROM " . $table . " e WHERE  e." . $field . " = :value";
            $query = self::$entityManager->createQuery($dql)->setParameter('value', $value);
            return $query->getSingleScalarResult();

        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return [];
        }
    }

    /**
     *  Verify if an object with a specific value exists
     *  @return boolean
     */
    public static function existWithAttribute($table, $field, $value) {
        try{
            $dql = "SELECT e FROM " . $table . " e WHERE e." . $field . " = :value";
            $query = self::$entityManager->createQuery($dql)->setParameter('value', $value);
            if (count($query->getResult()) > 0) { return true; } else { return false; } 
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return null;
        }
    }



}