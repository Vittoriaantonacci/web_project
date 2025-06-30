<?php

class VPost {
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function show(EPost $post, bool $isLiked = false): void {
        $this->smarty->assign('isLiked', $isLiked);
        $this->smarty->assign('post', $post);
        $this->smarty->display('post.tpl');  
    }

    public function create() {
        $this->smarty->display('new_post.tpl');
    }

    public function postSaved() {
        try{
            $post = FPersistentManager::getInstance()->getPostById(1);
            $altroPost = FPersistentManager::getInstance()->getPostById(3);
            
            $this->smarty->assign('savedPost', array($post));
            $this->smarty->assign('yourPost', array($post, $altroPost));
            $this->smarty->display('post_sec.tpl');
        } catch (Exception $e) {
            $this->smarty->assign('error', $e->getMessage());
            $this->smarty->display('error.tpl');
        }
    }

}
