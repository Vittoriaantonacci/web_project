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


    /** -------------------- POST ELEMENT METHODS -------------------- */

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

}


