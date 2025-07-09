<?php

class VMealPlan {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show a page with all infos about a recipe
     * @param EMealPlan $recipe
     * @param ?bool $isSaved
     */
    public function detail(EMealPlan $mealPlan, ?bool $isSaved = null)  {
        $this->smarty->assign('mealPlan', $mealPlan);
        $this->smarty->assign('isSaved', $isSaved);
        
        $this->smarty->display('meal_plan.tpl');
    }

    /**
     * Show user form to create a meal plan
     */
    public function create() {
        $meals = FPersistentManager::getInstance()->getGenericMeals();
        
        $this->smarty->assign('meals', $meals);
        $this->smarty->display('new_meal_plan.tpl');
    }

    /**
     * Show "YOUR MEAL PLAN" page, that contains saved and created ones
     * @param EMealPlan $createdRecipes
     * @param EMealPlan $savedRecipes
     */
    public function yourRecipe($createdRecipes, $savedRecipes) {
        $this->smarty->assign('savedRecipe', $savedRecipes);
        $this->smarty->assign('yourRecipe', $createdRecipes);
        $this->smarty->display('meal_plan_sec.tpl');
    }
}