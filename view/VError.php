<?php

class VError{

    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    public function error($message = "errore front controller") {
        $this->smarty->assign('error', $message);
        $this->smarty->display('error.tpl');
    }
}