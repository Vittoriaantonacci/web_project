<?php

class CPost {

    /** -------------------- POST MANAGEMENT METHODS -------------------- */

    /**
     * This method is used to show the post creation form
     * 
     */
    public static function view($idPost) {
        $pm = FPersistentManager::getInstance();
        $idUser = USession::getInstance()->get('user');

        $post = $pm->getPostById($idPost);

        $isLiked = null;
        $isSaved = null;
        if ($idUser != $post->getProfile()->getIdUser()) {
            $isLiked = $pm->isLiked($idUser, $idPost);
            $isSaved = $pm->isPostSaved($idUser, $idPost);
        }
        
        $vPost = new VPost();
        $vPost->show($post, $isLiked, $isSaved, $idUser);
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
    public static function addComment(){
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }

        $userId = USession::getInstance()->get('user');
        $postId = UHTTPMethods::post('postId');
        $body = UHTTPMethods::post('body');

        FPersistentManager::getInstance()->addComment($userId, $postId, $body);

        header('Location: /recipeek/Post/view/' . $postId);
        exit;

    }

    /**
     * Create a like object and associates it to profile and post realted
     */
    public static function addLike() {
        $idPost = UHTTPMethods::post('postId');
        $idUser = USession::getInstance()->get('user');

        FPersistentManager::getInstance()->addLike($idUser, $idPost);
    }

    public static function removeLike() {
        $idPost = UHTTPMethods::post('postId');
        $idUser = USession::getInstance()->get('user');

        FPersistentManager::getInstance()->removeLike($idUser, $idPost);
    }

    public static function addSave() {
        $idPost = UHTTPMethods::post('postId');
        $idUser = USession::getInstance()->get('user');

        FPersistentManager::getInstance()->addSavedPost($idUser, $idPost);
    }

    public static function removeSave() {
        $idPost = UHTTPMethods::post('postId');
        $idUser = USession::getInstance()->get('user');
 
        FPersistentManager::getInstance()->removeSavedPost($idUser, $idPost);
    }

    public static function onCreate() {
        if (CUser::isLogged()) {
            $title = UHTTPMethods::post('title');
            $description = UHTTPMethods::post('description');
            $category = UHTTPMethods::post('category');

            $profile = FPersistentManager::getInstance()->getUserById(USession::getInstance()->get('user'));
            $post = new EPost($title, $description, $category);
            $post->setProfile($profile);

            $imageDataArray = UHTTPMethods::saveUploadedFiles('images', 'posts');

            if ($imageDataArray && is_array($imageDataArray)) {
                $count = 0;
                foreach ($imageDataArray as $imageData) {
                    if ($count >= 5) break;
                    $image = new EImage($imageData['name'], $imageData['size'], $imageData['ext'], $imageData['path']);
                    $post->addImage($image);
                    $count++;
                }
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


