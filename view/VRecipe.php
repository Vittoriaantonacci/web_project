<?php
// views/VRecipe.php

class VRecipe {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Mostra il dettaglio completo della ricetta.
     * @param ERecipe $recipe
     */
    public function detail(ERecipe $recipe) {
        $this->smarty->assign('recipe', $recipe);

        // Passiamo anche gli ingredienti (EMeal)
        $this->smarty->assign('ingredients', $recipe->getIngredients()->toArray());

        $this->smarty->display('recipe.tpl');
    }

    
}
