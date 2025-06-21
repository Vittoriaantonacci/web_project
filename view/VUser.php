<?php

class VUser{

    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    public function home($postInHome){     
        //$this->smarty->assign('user', $userAndPropic[0][0]);
        //$this->smarty->assign('userPic', $userAndPropic[0][1]);
        $this->smarty->assign('posts',$postInHome);
        //$this->smarty->assign('arrVip', $arrayVipUserPropicFollowNumb);
        
        $this->smarty->display('home.tpl');
    }

}