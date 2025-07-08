<?php

class VPost {
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function show(EPost $post, ?bool $isLiked = null, ?bool $isSaved = null): void {
        $this->smarty->assign('isSaved', $isSaved);
        $this->smarty->assign('isLiked', $isLiked);
        $this->smarty->assign('post', $post);
        $this->smarty->display('post.tpl');  
    }

    public function create() {
        $this->smarty->display('new_post.tpl');
    }

    public function postSaved($createdPosts, $savedPosts) {
            $this->smarty->assign('savedPost', $savedPosts);
            $this->smarty->assign('yourPost', $createdPosts);
            $this->smarty->display('post_sec.tpl');
    }

}
