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

        $vPost = new VPost();
        $vPost->show($post);
    }


    /** -------------------- POST ELEMENT METHODS -------------------- */

    /**
     * create a comment taking info from the compiled form and associate it to the post
     * @param int $idPost Refers to id of the post
     */
    public static function createComment($idPost){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->get('user');
            $profile = FPersistentManager::getInstance()->retriveObj(EProfile::getEntity(), $userId);
            $post = FPersistentManager::getInstance()->retriveObj(EPost::getEntity(), $idPost);

            $comment = new EComment(UHTTPMethods::post('body'));
            $profile->addComment($comment);
            $post->addComment($comment);

            FPersistentManager::getInstance()->uploadObj($post);
            FPersistentManager::getInstance()->uploadObj($profile);
        }
    }

    /**
     * create a like taking info from the compiled form and associate it to the post
     * @param int $idPost Refers to id of the post
     */
    public static function createLike($idPost) {
        if (CUser::isLogged()) {
            $userId = USession::getInstance()->get('user');
            $profile = FPersistentManager::getInstance()->retriveObj(EProfile::getEntity(), $userId);
            $post = FPersistentManager::getInstance()->retriveObj(EPost::getEntity(), $idPost); 

            $like = new ELike();
            $post->addLike($like);
            $profile->addLike($like);

            FPersistentManager::getInstance()->uploadObj($post);
            FPersistentManager::getInstance()->uploadObj($profile);
        }
    }

}


