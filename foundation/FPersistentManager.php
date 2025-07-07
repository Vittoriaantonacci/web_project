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
    public static function getImageById($id) {
        return self::read(EImage::getEntity(), $id);
    }
    public static function getPostById($id) {
        return FPost::getPostById($id);
    }
    public static function getMealById($id) {
        return self::read(EMeal::getEntity(), $id);
    }
    public static function getRecipeById($id) {
        return self::read(ERecipe::getEntity(), $id);
    }

    public static function getFollowers($userId) {
        return FUserFollow::getFollowerUsers($userId);
    }

    public static function getFollowed($userId) {
        return FUserFollow::getFollowedUsers($userId);
    }

    public static function saveUser(EProfile $user) {
        return self::create($user);
    }
    public static function saveFollow(EUserFollow $userFollow) {
        return self::create($userFollow);
    }
    public static function savePost(EPost $post) {
        return self::create($post);
    }
    public static function saveRecipe(ERecipe $recipe) {
        return self::create($recipe);
    }


    /** -------------------- USE CASE METHODS -------------------- */

    /**
     *  Method that returns a list of posts with associated propic image
     *  @param int userId refers to the user that load the home page
     */
    public static function loadForYouPage($userId) {
        $posts = [];

        $posts[] = FPost::getHomePosts($userId);

        $mergedPosts = array_merge(...$posts);
        usort($mergedPosts, ['FPost', 'compareByTime']);

        $result = [];
        foreach ($mergedPosts as $p) {
            $result[] = [$p/*, self::getImageById($p->getProfile()->getProPic())*/]; 
        }

        return $result;
    }

    public static function loadHomePage($userId){
        try{
            $followedUsers = FUserFollow::getFollowedUsers($userId);

            $allPosts = [];
            foreach ($followedUsers as $followed) {
                $allPosts = array_merge($allPosts, $followed->getPosts()->toArray());
            }
            usort($allPosts, ['FPost', 'compareByTime']);
        }catch (\Exception $e) {
            echo "ERROR " . $e->getMessage();
            return [];
        }

        return $allPosts;
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

    public static function getProfileInfo($userID) {
        $user = self::getUserById($userID);
        try{
        $followers = FUserFollow::getFollowerUsers($userID);
        $followed = FUserFollow::getFollowedUsers($userID);
        }catch (\Exception $e) {
            echo "ERROR " . $e->getMessage();
            return [];
        }

        return [
            'user' => $user,
            'followers' => $followers,
            'followed' => $followed,
        ];
    }

    public static function getCreatedPosts($userId) {
        return FPersistentManager::getUserById($userId)->getPosts()->toArray();
    }

    public static function getCreatedRecipes($userId) {
        return FPersistentManager::getUserById($userId)->getRecipes()->toArray();
    }

    public static function getSavedPosts($userId) {
        return FPersistentManager::getUserById($userId)->getSavedPosts()->toArray();
    }

    public static function getSavedRecipes($userId) {
        return FPersistentManager::getUserById($userId)->getSavedRecipes()->toArray();
    }

    public static function getGenericMeals() {
        return FEntityManager::getInstance()->getObjList(EMeal::getEntity(), "type", "Generic");
    }

    public static function addMeal(EMeal $meal){
        if (!FEntityManager::getInstance()->existWithAttribute(EMeal::getEntity(), "nameMeal", $meal->getName())){
            self::create($meal);
        }
    }

}
