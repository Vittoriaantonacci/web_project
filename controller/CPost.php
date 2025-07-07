<?php

class CPost {

    /** -------------------- POST MANAGEMENT METHODS -------------------- */

    /**
     * This method is used to show the post creation form
     * 
     */
    public static function view($idPost) {
        
        $post = FPersistentManager::getInstance()->getPostById($idPost);
        
        if (!$post) {
            header('Location: /recipeek/User/home');
            exit;
        }
        
        //$isLiked = $post->getLikedByUser(null);
        //$isLiked = $post->getLikes()->exists(function($like) {
        //    return $like->getUser()->getIdUser() === USession::getInstance()->get('user');
        //});
        $isLiked = true;
        

        $vPost = new VPost();
        $vPost->show($post, $isLiked);
    }

    public static function create() {
        if (CUser::isLogged()) {
            $vPost = new VPost();
            $vPost->create();
        } else {
            header('Location: /recipeek/User/login');
            exit;
        }
    }

    public static function yourPosts() {
        if (CUser::isLogged()) {
            // This method is called after a post is saved
            $postCreated = FPersistentManager::getInstance()->getCreatedPosts(USession::getInstance()->get('user'));
            $postSaved = FPersistentManager::getInstance()->getSavedPosts(USession::getInstance()->get('user'));


            $vPost = new VPost();
            $vPost->postSaved($postCreated, $postSaved);
        } else {
            header('Location: /recipeek/User/login');
            exit;
        }
    }


    /** -------------------- POST BEHAVIOR METHODS -------------------- */

    /**
     * create a comment taking info from the compiled form and associate it to the post
     * @param int $idPost Refers to id of the post
     */
    public static function addComment($idPost){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->get('user');
            $profile = FPersistentManager::getInstance()->getUserById($userId);
            $post = FPersistentManager::getInstance()->getPostById($idPost);

            $comment = new EComment(UHTTPMethods::post('body'));
            $profile->addComment($comment);
            $post->addComment($comment);

            FPersistentManager::getInstance()->savePost($post);
            FPersistentManager::getInstance()->saveUser($profile);
        }
    }

    /**
     * create a like taking info from the compiled form and associate it to the post
     * @param int $idPost Refers to id of the post
     */
    public static function addLike($idPost) {
        if (CUser::isLogged()) {
            $userId = USession::getInstance()->get('user');
            $profile = FPersistentManager::getInstance()->getUserById($userId);
            $post = FPersistentManager::getInstance()->getPostById($idPost);

            $like = new ELikes();
            $post->addLike($like);
            $profile->addLike($like);

            FPersistentManager::getInstance()->savePost($post);
            FPersistentManager::getInstance()->saveUser($profile);
        }
    }

    public static function onCreate() {
        if (CUser::isLogged()) {
            $title = UHTTPMethods::post('title');
            $description = UHTTPMethods::post('description');
            $category = UHTTPMethods::post('category');

            $profile = FPersistentManager::getInstance()->getUserById(USession::getInstance()->get('user'));
            $post = new EPost($title, $description, $category);
            $post->setProfile($profile);

            $imageData = UHTTPMethods::saveUploadedFile('image', 'posts');

            if ($imageData) {
                $image = new EImage($imageData['name'],  $imageData['size'], $imageData['ext'], $imageData['path']);
                $post->addImage($image);
            }

            FPersistentManager::getInstance()->savePost($post);

            header('Location: /recipeek/User/homePage');
            exit;

        } else {
            header('Location: /recipeek/User/login');
            exit;
        }
    }



}


