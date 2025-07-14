<?php

use Doctrine\Common\Collections\Collection;

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

    public function filter($posts = [], $recipes = [], $mealPlans = [], $isVip = false) {
        $this->smarty->assign('posts', $posts);
        $this->smarty->assign('recipes', $recipes);
        $this->smarty->assign('mealPlans', $mealPlans);
        $this->smarty->assign('isVip', $isVip);
        $this->smarty->display('filter.tpl');
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

    public function subscribe() {
        $this->smarty->display('subscribe.tpl');
    }

    public function dashboard(EMod $mod, ?EProfile $profile) {
        $this->smarty->assign('profile', $profile);
        $this->smarty->assign('mod', $mod);
        $this->smarty->display('dashboard.tpl');
    }
}