<?php

class FPersistentManager{

    /** SINGLETON CLASS INSTANCIATION  */

     private static $instance;


     private function __construct(){


     }

     public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**  -------------------- CRUD METHODS  -------------------- */

    private static function create($obj) {
        return FEntityManager::getInstance()->saveObj($obj);
    }

    private static function read($entity, $id) {
        return FEntityManager::getInstance()->getObjById($entity, $id);
    }

    private static function update($obj) {
        return FEntityManager::getInstance()->saveObj($obj);
    }

    private static function delete($obj) {
        return FEntityManager::getInstance()->deleteObj($obj);
    }


    /**  -------------------- SEMANTIC CRUD METHODS  -------------------- */

    public static function getUserById($id) {
        return self::read(EUser::getEntity(), $id);
    }
    private static function getImageById($id) {
        return self::read(EImage::getEntity(), $id);
    }

    private static function saveUser(EUser $user) {
        return self::create($user);
    }
    public static function saveFollow(EUserFollow $user) {
        return self::create($user);
    }


    /** -------------------- USE CASE METHODS -------------------- */

    /**
     *  Method that returns a list of posts with associated propic image
     *  @param int userId refers to the user that load the home page
     */
    public static function loadHomePage($userId) {
        $followedUsers = FUserFollow::getFollowedUsers($userId); 
        $posts = [];

        foreach ($followedUsers as $user) {
            $posts[] = FPost::getHomePosts($user->getId());
        }

        $mergedPosts = array_merge(...$posts);
        usort($mergedPosts, ['FPost', 'compareByTime']);

        $result = [];
        foreach ($mergedPosts as $p) {
            $result[] = [$p/*, self::getImageById($p->getProfile()->getProPic())*/]; 
        }

        return $result;
    }

}
