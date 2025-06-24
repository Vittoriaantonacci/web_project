<?php

class VMealPlan {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    // Visualizza il form di creazione del piano alimentare
    // Passa prodotti, ricette e eventuali errori
    public function createForm(array $products, array $recipes, ?string $error = null) {
        $this->smarty->assign('products', $products);
        $this->smarty->assign('recipes', $recipes);
        $this->smarty->assign('error', $error);
        $this->smarty->display('mealPlanCreate.tpl');  // nome del template creazione
    }

    // Visualizza il dettaglio di un piano alimentare appena creato o recuperato
    public function detail($mealPlan) {
        $this->smarty->assign('mealPlan', $mealPlan);
        $this->smarty->display('mealPlanDetail.tpl'); 
    }

    // Visualizza messaggi di errore generici
    public function error(string $msg) {
        $this->smarty->assign('error', $msg);
        $this->smarty->display('error.tpl');
    }
}
