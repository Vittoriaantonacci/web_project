<?php

/*class CPost{
    public static function showTestPost(){
        print("post");
        $view = new VPost();
        $view->showPost();
    }
}*/



class CPost {
    public static function view($idPost) {
        $post = FPersistentManager::getInstance()->load('EPost', $idPost);

        if (!$post) {
            header('Location: /recipeek/User/home');
            exit;
        }

        $vPost = new VPost();
        $vPost->show($post);
    }


}
