<?php

class VUser{

    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    public function home($postInHome, $postForYou){     
        $this->smarty->assign('posts',$postInHome);
        $this->smarty->assign('yourPosts', $postForYou);
        
        $this->smarty->display('homePage.tpl');
    }

    public function login($error = null, $mode = 'login'){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('mode', $mode);
        $this->smarty->display('login.tpl');
    }


    public function showProfile(EProfile $profile) {
        $this->smarty->assign('profile', $profile);
        $this->smarty->display('profile.tpl');
    }
}