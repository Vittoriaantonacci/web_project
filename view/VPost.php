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

    public function postSaved($createdPosts, $savedPosts) {
        try{
            $this->smarty->assign('savedPost', $savedPosts);
            $this->smarty->assign('yourPost', $createdPosts);
            $this->smarty->display('post_sec.tpl');
        } catch (Exception $e) {
            $this->smarty->assign('error', $e->getMessage());
            $this->smarty->display('error.tpl');
        }
    }

}
