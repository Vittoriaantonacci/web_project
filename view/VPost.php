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
}
