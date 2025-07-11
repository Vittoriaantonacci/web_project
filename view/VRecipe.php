<?php

class VRecipe {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show a page with all infos about a recipe
     * @param ERecipe $recipe
     */
    public function detail(ERecipe $recipe, ?bool $isSaved = null)  {
        $this->smarty->assign('recipe', $recipe);
        $this->smarty->assign('isSaved', $isSaved);
        
        $this->smarty->display('recipe.tpl');
    }

    /**
     * Show user form to create a recipe
     */
    public function create(bool $isVip = false) {
        $meals = FPersistentManager::getInstance()->getGenericMeals();

        $this->smarty->assign('isVip', $isVip);
        $this->smarty->assign('meals', $meals);
        $this->smarty->display('new_recipe.tpl');
    }

    /**
     * Show "YOUR RECIPE" page, that contains saved and created ones
     * @param ERecipe $createdRecipes
     * @param ERecipe $savedRecipes
     */
    public function yourRecipe($createdRecipes, $savedRecipes) {
        $this->smarty->assign('savedRecipe', $savedRecipes);
        $this->smarty->assign('yourRecipe', $createdRecipes);
        $this->smarty->display('recipe_sec.tpl');
    }

    
}