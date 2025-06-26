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

    public static function create($obj) {
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

    /**
     * Method that return an user with given username if exist, otherwise null
     * @return mixed|null
     */
    public static function getUserByUsername($username) {
        if(FEntityManager::getInstance()->existWithAttribute(EUser::class, "username", $username)) {
            return FUser::getUserByUsername($username);
        }else{
            return null;
        }
    }

    /**
     * Method that verify if username or email exists in database
     * @return bool
     */
    public static function existUserAndEmail($username, $email){
        return FEntityManager::getInstance()->existWithAttribute(EUser::class, "username", $username) ||
                FEntityManager::getInstance()->existWithAttribute(EUser::class, "email", $email);
    }

    /**
     * Method that create a new user and save it in db
     */
    public static function createUser($name, $surname, $birthDate, $gender, $email, $password, $username){
        $newUser = new EProfile($name, $surname, (new DateTime($birthDate)), $gender, $email, $password, $username);
        return FEntityManager::getInstance()->saveObj($newUser); 
    }

    public static function getPostById($id) {
        return FPost::getPostById($id);
    }

}
