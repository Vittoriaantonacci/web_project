<?php

use Smarty\Smarty;

require(__DIR__ . '/../smarty/libs/Smarty.class.php');


class StartSmarty{
    static function configuration(){
        $smarty=new Smarty();
        $smarty->setTemplateDir(__DIR__ . '/../smarty/libs/templates/');
        $smarty->setCompileDir(__DIR__ . '/../smarty/libs/templates_c/');
        $smarty->setCacheDir(__DIR__ . '/../smarty/libs/cache/');
        $smarty->setConfigDir(__DIR__ . '/../smarty/libs/configs/');
        return $smarty;
    }
}