<?php

/*class VPost{
    
    /**
    * @var Smarty
    */
    /*private $smarty;

    public function __construct(){
 
        $this->smarty = StartSmarty::configuration();
 
    }

    public function showPost() {
        $this->smarty->assign('titolo', 'Titolo di esempio');
        $this->smarty->assign('contenuto', 'Questo è il contenuto del post di prova.');
        $this->smarty->display('prova.tpl');
    }

}*/


class VPost {
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function show(EPost $post) {
        $this->smarty->assign('post', $post);
        $this->smarty->display('post_info.tpl');  // usa il template che hai creato
    }
}
