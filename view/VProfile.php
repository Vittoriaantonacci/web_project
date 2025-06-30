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

}