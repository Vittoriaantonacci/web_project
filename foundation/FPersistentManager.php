<?php

use Dom\Comment;

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

    public static function delete($obj) {
        return FEntityManager::getInstance()->deleteObj($obj);
    }


    /**  -------------------- SEMANTIC CRUD METHODS  -------------------- */

    public static function getUserById($id) { return self::read(EUser::getEntity(), $id); }
    
    public static function getImageById($id) { return self::read(EImage::getEntity(), $id); }

    public static function getPostById($id) { return self::read(EPost::getEntity(), $id); }

    public static function getMealById($id) { return self::read(EMeal::getEntity(), $id); }
    
    public static function getRecipeById($id) { return self::read(ERecipe::getEntity(), $id); }
    
    public static function getMealPlanById($id) { return self::read(EMealPlan::getEntity(), $id); }
    
    public static function getCreatedPosts($userId) { return self::getUserById($userId)->getPosts()->toArray(); }
    
    public static function getCreatedRecipes($userId) { return self::getUserById($userId)->getRecipes()->toArray(); }

    public static function getCreatedMealPlans($userId) { return self::getUserById($userId)->getMealPlans()->toArray(); }

    public static function getSavedPosts($userId) { return self::getUserById($userId)->getSavedPosts()->toArray(); }

    public static function getSavedRecipes($userId) { return self::getUserById($userId)->getSavedRecipes()->toArray(); }

    public static function getSavedMealPlans($userId) { return self::getUserById($userId)->getSavedMealPlans()->toArray(); }

    public static function getGenericMeals() { return FEntityManager::getInstance()->getObjList(EMeal::getEntity(), "type", "Generic"); }

    public static function getFollowers($userId) { return FUserFollow::getFollowerUsers($userId); }

    public static function getFollowed($userId) { return FUserFollow::getFollowedUsers($userId); }


    public static function saveUser(EProfile $user) { return self::create($user); }
    
    public static function saveFollow(EUserFollow $userFollow) { return self::create($userFollow); }
    
    public static function savePost(EPost $post) { return self::create($post); }
    
    public static function saveRecipe(ERecipe $recipe) { return self::create($recipe); }
    
    public static function saveLike(ELikes $like) { return self::create($like); }
    
    public static function saveComment(EComment $comment) { return self::create($comment); }
    
    public static function saveMealPlan(EMealPlan $mealPlan) { return self::create($mealPlan); }

    public static function saveMealPlanMeal(EMealPlanMeal $mealPlanMeal) { return self::create($mealPlanMeal); }


    /** -------------------- USE CASE METHODS: CONTENT RELATED METHODS -------------------- */

    /**
     * Method that returns a list of posts for the home page
     * @param int $idUser refers to the user that load the home page
     * @return array|null
     */
    public static function getHomePosts($idUser){
        try{
            return FEntityManager::getInstance()
                ->getEntityManager()
                ->createQuery("SELECT p FROM " . EPost::getEntity() . " p WHERE p.profile != :idUser AND p.isRemoved = false ORDER BY p.creation_time DESC")
                ->setParameter('idUser', $idUser)
                ->setMaxResults(HOME_POSTS_LIMIT)
                ->getResult();
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return null;
        }
    }

    /**
     *  Method that returns a list of posts with associated propic image
     *  @param int userId refers to the user that load the home page
     */
    public static function loadForYouPage($userId) {
        try{
            $posts = FPersistentManager::getHomePosts($userId);

            usort($posts, ['FPersistentManager', 'compareByTime']);
        }catch (\Exception $e) {
            echo "ERROR " . $e->getMessage();
            return [];
        }

        return $posts;
    }

    public static function loadHomePage($userId){
        try{
            $followedUsers = FUserFollow::getFollowedUsers($userId);

            $allPosts = [];
            foreach ($followedUsers as $followed) {
                $allPosts = array_merge($allPosts, $followed->getPosts()->toArray());
            }
            usort($allPosts, ['FPersistentManager', 'compareByTime']);
        }catch (\Exception $e) {
            echo "ERROR " . $e->getMessage();
            return [];
        }

        return $allPosts;
    }

    /**
     * Method that return information about a profile for profile page
     */
    public static function getProfileInfo($visitedId, $visitingId = null) {
        $user = self::getUserById($visitedId);
        
        $followers = FUserFollow::getFollowerUsers($visitedId);
        $followed = FUserFollow::getFollowedUsers($visitedId);

        $isFollowed = false;

        if ($visitingId != null) {
            foreach ($followers as $follower) {
                if($follower->getIdUser() == $visitingId) {
                    $isFollowed = true;
                }
            }
        }
    
        return [
            'user' => $user,
            'followers' => $followers,
            'followed' => $followed,
            'isFollowed' => $isFollowed
        ];
    }

    /** -------------------- USE CASE METHODS: AUTHENTICATION METHODS -------------------- */


    /**
     * Method that return an user with given username if exist, otherwise null
     * @return mixed|null
     */
    public static function getUserByUsername($username) {
        if(FEntityManager::getInstance()->existWithAttribute(EMod::class, "username", $username)) {
            return FEntityManager::getInstance()->getObjByValue(EMod::getEntity(), 'username', $username);
        }else if(FEntityManager::getInstance()->existWithAttribute(EProfile::class, "username", $username)) {
            return FEntityManager::getInstance()->getObjByValue(EProfile::getEntity(), 'username', $username);
        }else{
            return null;
        }
    }

    /**
     * Method that verify if username or email exists in database
     * @return bool
     */
    public static function existUserAndEmail($username, $email){
        return self::existUser($username) || self::existEmail($email);
    }

    public static function existUser($username) {
        return FEntityManager::getInstance()->existWithAttribute(EUser::class, "username", $username);
    }

    public static function existEmail($email) {
        return FEntityManager::getInstance()->existWithAttribute(EUser::class, "email", $email);
    }

    /**
     * Method that create a new user and save it in db
     */
    public static function createUser($name, $surname, $birthDate, $gender, $email, $password, $username){
        $newUser = new EProfile($name, $surname, (new DateTime($birthDate)), $gender, $email, $password, $username);
        return FEntityManager::getInstance()->saveObj($newUser); 
    }

    public static function createMod($name, $surname, $birthDate, $gender, $email, $password, $username) {
        $newMod = new EMod($name, $surname, (new DateTime($birthDate)), $gender, $email, $password, $username);
        return FEntityManager::getInstance()->saveObj($newMod);
    }


    /** -------------------- USE CASE METHODS: MEAL PLAN RELATED METHODS -------------------- */

    public static function getMealsByMealPlanId($idMealPlan) {
        $mealPlanMeals = FEntityManager::getInstance()->getObjList(EMealPlanMeal::getEntity(), "idMealPlan", $idMealPlan);
        $meals = [];
        foreach ($mealPlanMeals as $mealPlanMeal) {
            $meals[$mealPlanMeal->getMealType()] = array_merge($meals[$mealPlanMeal->getMealType()] ?? [], [FEntityManager::getInstance()->getObjById(EMeal::getEntity(), $mealPlanMeal->getIdMeal())]);
        }
        return $meals;
    }

    /**
     * Method that create a meal if it doesn't exist in db
     */
    public static function addMeal(EMeal $meal){
        if (!FEntityManager::getInstance()->existWithAttribute(EMeal::getEntity(), "nameMeal", $meal->getName())){
            self::create($meal);
        }
    }

    public static function uploadMealPlan(EMealPlan $mealPlan, EProfile $profile) {
        self::create($mealPlan);
        $mealPlans = FEntityManager::getInstance()->getObjByValue(EMealPlan::getEntity(), 'creation_time', $mealPlan->getCreationTime());

        foreach ($mealPlans as $mp) {
            if ($mp->getCreator()->getIdUser() == $profile->getIdUser()) {
                $mealPlan = $mp;
                break;
            }
        }
        return $mealPlan;
    }

    /** -------------------- USE CASE METHODS: FILTER METHODS -------------------- */

    /**
     * Method that compare two items (post, recipe, meal plan) by creation time
     * It requires that the items have a method getCreationTime() that returns a DateTime object
     * @param $item1
     * @param $item2
     * @return int
     */
    public static function compareByTime($item1, $item2): int {
        return $item1->getCreationTime() <=> $item2->getCreationTime();
    }

    /**
     * Method that return a list of posts filtered by category
     * @param string $category
     * @return array
     */
    public static function getPostsByCategory($category) {
        $allPosts = FEntityManager::getInstance()->getObjList(EPost::getEntity(), "category", $category);
        usort($allPosts, ['FPersistentManager', 'compareByTime']);
        return $allPosts;
    }

    /**
     * Method that return a list of recipes filtered by category
     * @param string $category
     * @return array
     */
    public static function getRecipesByCategory($category) {
        $allRecipes = FEntityManager::getInstance()->getObjList(ERecipe::getEntity(), "category", $category);
        usort($allRecipes, ['FPersistentManager', 'compareByTime']);
        return $allRecipes;
    }

    /**
     * Method that return a list of meal plans filtered by category
     * @param string $category
     * @return array
     */
    public static function getMealPlansByCategory($category) {
        $allMealPlans = FEntityManager::getInstance()->getObjList(EMealPlan::getEntity(), "category", $category);
        usort($allMealPlans, ['FPersistentManager', 'compareByTime']);
        return $allMealPlans;
    }

    public static function getLikeNumber() {
        $likes = FEntityManager::getInstance()->getObjList(ELikes::getEntity(), "idLike", null);
        return count($likes);
    }

    public static function getFilteredUsers($input) {
        return FEntityManager::getInstance()->getObjListByStrPattern(EUser::getEntity(), "username", $input);
    }

    /** -------------------- USE CASE METHODS: BUTTON METHODS -------------------- */

    /**
     * Method that add a like to a post
     * @param int $idUser
     * @param int $idPost
     */
    public static function addLike($idUser, $idPost) {
        $like = new ELikes;

        $post = self::getPostById($idPost);
        $user = self::getUserById($idUser);

        $post->addLike($like);
        $user->addLike($like);

        self::savePost($post);
        self::saveUser($user);
        self::saveLike($like);
    }

    /**
     * Method that add a comment to a post
     * @param int $idUser
     * @param int $idPost
     * @param string $body
     */
    public static function addComment($idUser, $idPost, $body) {
        $comment = new EComment($body);

        $post = self::getPostById($idPost);
        $user = self::getUserById($idUser);

        $post->addComment($comment);
        $user->addComment($comment);

        self::savePost($post);
        self::saveUser($user);
        self::saveComment($comment);
    }

    /**
     * Verify if an user liked a post, to set initial state of button
     * @param int $idUser
     * @param int $idPost
     * @return bool
     */
    public static function isLiked($idUser, $idPost) {
        $user = self::getUserById($idUser);
        if ($user == null) return false;

        foreach ($user->getLikes()->toArray() as $like){
            if ($like->getPost()->getIdPost() == $idPost){
                return true;
            }
        }
        return false;
    }

    /**
     * Method that remove a like to a post
     * @param int $idUser
     * @param int $idPost
     */
    public static function removeLike($idUser, $idPost) {
        $user = self::getUserById($idUser);
        if ($user == null) return false;

        foreach ($user->getLikes()->toArray() as $like){
            if ($like->getPost()->getIdPost() == $idPost){
                self::delete($like);

                $post = self::getPostById($idPost);
                $post->removeLike($like);
                self::savePost($post);
                $user->removeLike($like);
                self::saveUser($user);
            }
        }
    }


    /**
     * Method to save a post
     * @param int $idUser
     * @param int $idPost
     */
    public static function addSavedPost($idUser, $idPost) {
        $post = self::getPostById($idPost);
        $user = self::getUserById($idUser);

        $user->addSavedPost($post);

        self::savePost($post);
        self::saveUser($user);
    }

    /**
     * Method to check if a user saved a post, to set initial state of button
     * @param int $idUser
     * @param int $idPost
     * @return bool
     */
    public static function isPostSaved($idUser, $idPost) {
        $post = self::getPostById($idPost);
        if ($post == null) return false;

        $user = self::getUserById($idUser);
        if ($user == null) return false;

        if ($user->getSavedPosts()->contains($post)) {
            return true;
        }
        return false;
    }

    /**
     * Method to remove a saved post
     * @param int $idUser
     * @param int $idPost
     */
    public static function removeSavedPost($idUser, $idPost) {
        $post = self::getPostById($idPost);
        $user = self::getUserById($idUser);

        $user->removeSavedPost($post);

        self::saveUser($user);
        self::savePost($post);
    }

    
    /**
     * Method to save a post
     * @param int $idUser
     * @param int $idPost
     */
    public static function addSavedRecipe($idUser, $idRecipe) {
        $recipe = self::getRecipeById($idRecipe);
        $user = self::getUserById($idUser);

        $user->addSavedRecipe($recipe);

        self::saveUser($user);
        self::saveRecipe($recipe);
    }

    /**
     * Method to check if a user saved a post, to set initial state of button
     * @param int $idUser
     * @param int $idPost
     * @return bool
     */
    public static function isRecipeSaved($idUser, $idRecipe) {
        $recipe = self::getRecipeById($idRecipe);
        if ($recipe == null) return false;

        $user = self::getUserById($idUser);
        if ($user == null) return false;

        if($user->getSavedRecipes()->contains($recipe)) {
            return true;
        }
        return false;
    }

    /**
     * Method to remove a saved recipe
     * @param int $idUser
     * @param int $idPost
     */
    public static function removeSavedRecipe($idUser, $idRecipe) {
        $recipe = self::getRecipeById($idRecipe);
        $user = self::getUserById($idUser);

        $user->removeSavedRecipe($recipe);

        self::saveUser($user);
    }

    /**
     * Methos to remove a UserFollow
     * @param int $idFollowed
     * @param int $idFollower
     */
    public static function removeFollow($idFollower, $idFollowed){
        $userFollow = FUserFollow::getUserFollow($idFollower, $idFollowed);
        
        if($userFollow) { self::delete($userFollow[0]); }
    }

    /**
     * Method to save a meal plan
     * @param int $idUser
     * @param int $idPost
     */
    public static function addSavedMealPlan($idUser, $idMealPlan) {
        $mealPlan = self::getMealPlanById($idMealPlan);
        $user = self::getUserById($idUser);

        $user->addSavedMealPlan($mealPlan);

        self::saveUser($user);
        self::saveMealPlan($mealPlan);
    }

    /**
     * Method to check if a user saved a meal plan, to set initial state of button
     * @param int $idUser
     * @param int $idPost
     * @return bool
     */
    public static function isMealPlanSaved ($idUser, $idMealPlan) {
        $mealPlan = self::getMealPlanById($idMealPlan);
        if ($mealPlan == null) return false;

        $user = self::getUserById($idUser);
        if ($user == null) return false;

        if($user->getSavedMealPlans()->contains($mealPlan)) {
            return true;
        }
        return false;
    }

    /**
     * Method to remove a saved meal plan
     * @param int $idUser
     * @param int $idPost
     */
    public static function removeSavedMealPlan($idUser, $idMealPlan) {
        $mealPlan = self::getMealPlanById($idMealPlan);
        $user = self::getUserById($idUser);

        $user->removeSavedMealPlan($mealPlan);

        self::saveUser($user);
    }

    public static function removePost($idPost, $idUser) {
        $post = self::getPostById($idPost);
        $user = self::getUserById($idUser);

        if ($post == null || $user == null) return false;
            
        $user->removePost($post);
        self::saveUser($user);
        self::delete($post);
    }

    public static function removeRecipe($idRecipe, $idUser) {
        $recipe = self::getRecipeById($idRecipe);
        $user = self::getUserById($idUser);

        if ($recipe == null || $user == null) return false;

        //$user->removeRecipe($recipe);
        //self::saveUser($user);
        self::delete($recipe);
    }

    public static function removeMealPlan($idMealPlan, $idUser) {
        $mealPlan = self::getMealPlanById($idMealPlan);
        $user = self::getUserById($idUser);

        if ($mealPlan == null || $user == null) return false;

        $user->removeMealPlan($mealPlan);
        self::saveUser($user);
        self::delete($mealPlan);
    }

    
    

}
