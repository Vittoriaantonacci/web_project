<?php

class VProfile {
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    // Visualizza il profilo con preferiti e utenti seguiti
    public function displayProfile($profile, $followed, $followers) {
        $this->smarty->assign('profile', $profile);
        $this->smarty->assign('followed', $followed);
        $this->smarty->assign('followers', $followers);
        $this->smarty->display('profile.tpl');
    }

    public function visitProfile($profile, $followed, $followers, ?bool $isFollowed = false) {
        $this->smarty->assign('profile', $profile);
        $this->smarty->assign('followed', $followed);
        $this->smarty->assign('followers', $followers);
        $this->smarty->assign('isFollowed', $isFollowed);
        $this->smarty->assign('recipes', $profile->getRecipes()->toArray());
        $this->smarty->assign('mealPlans', $profile->getMealPlans()->toArray());
        $this->smarty->display('visit_profile.tpl');
    }

    public function profileFilter() {
        $this->smarty->display('profile_filter.tpl');
    }

}