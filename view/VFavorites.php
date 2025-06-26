<?php

class VFavorites {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    // Display the list of favorite recipes
    // Passes the favorites array and optional error message to the template
    public function showFavorites(array $favorites, ?string $error = null) {
        $this->smarty->assign('favorites', $favorites);
        $this->smarty->assign('error', $error);
        $this->smarty->display('favorites_list.tpl');  // name of the favorites template
    }

    // Display generic error messages
    public function error(string $msg) {
        $this->smarty->assign('error', $msg);
        $this->smarty->display('error.tpl');
    }
}
