<?php

class VMealPlan {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    // Display the meal plan creation form
    // Passes products, recipes, and optional error message to the template
    public function createForm(array $products, array $recipes, ?string $error = null) {
        $this->smarty->assign('products', $products);
        $this->smarty->assign('recipes', $recipes);
        $this->smarty->assign('error', $error);
        $this->smarty->display('create_mealplan.tpl');  
    }

    // Display the details of a created meal plan
    public function detail($mealPlan) {
        $this->smarty->assign('mealPlan', $mealPlan);
        $this->smarty->display('detail_mealplan.tpl'); 
    }

    // Display generic error messages
    public function error(string $msg) {
        $this->smarty->assign('error', $msg);
        $this->smarty->display('error.tpl');
    }
}
