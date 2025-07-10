<?php

class CMealPlan {

    /** -------------------- RECIPE MANAGEMENT METHODS -------------------- */

    /**
     * It shows the form to create a recipe
     */
    public static function create() {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }

        $view = new VMealPlan();
        $view->create();
    }

    /**
     * It shows Meal Plan details
     */
    public static function view($idMealPlan) {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }

        $pm = FPersistentManager::getInstance();
        $mealPlan = $pm->getMealPlanById($idMealPlan);
        $idUser = USession::getInstance()->get('user');

        $isSaved = null;
        if ($mealPlan && $mealPlan->getCreator()->getIdUser() != $idUser) {
            $isSaved = $pm->isRecipeMealPlan($idUser, $idMealPlan);
        }

        $view = new VMealPlan();
        $view->detail($mealPlan, $isSaved);
    }

    /**
     * It create the view with saved and created recipes (when click on your recipe section)
     */
    public static function yourMealPlan() {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }

        $pm = FPersistentManager::getInstance();
        $userId = USession::getInstance()->get('user');

        // Dato che hai solo getSavedMealPlans, uso quello due volte
        $savedMealPlans = $pm->getSavedMealPlans($userId);
        $createdMealPlans = [];  // Non hai metodo per creati, quindi passo array vuoto

        $view = new VMealPlan();
        $view->yourMealPlan($createdMealPlans, $savedMealPlans);
    }

        
    /** -------------------- MEAL PLAN BEHAVIOR METHODS -------------------- */

    /**
     * It create the Meal Plan entity with form compiled data and save it on db
     */
    public static function onCreate() {
        $pm = FPersistentManager::getInstance();

        $nameMealPlan = UHTTPMethods::post('nameMealPlan');
        $description = UHTTPMethods::post('description');
        $tag = UHTTPMethods::post('tag');
        $mealIds = UHTTPMethods::post('ingredients'); // array di ID pasti

        $userId = USession::getInstance()->get('user');
        $profile = $pm->getUserById($userId);

        $mealPlan = new EMealPlan($nameMealPlan, $description, $tag, $profile);

        if (is_array($mealIds)) {
            foreach ($mealIds as $mealId) {
                $meal = $pm->getMealById($mealId);
                if ($meal !== null) {
                    $mealPlan->addMeal($meal);
                }
            }
        }

        $pm->saveMealPlan($mealPlan);

        header('Location: /recipeek/User/homePage');
        exit;
    }

    /**
     * Add a meal plan to saved
     */
    public static function addSave(){
        $userId = USession::getInstance()->get('user');
        $mealPlanId = UHTTPMethods::post('mealPlanId');

        FPersistentManager::getInstance()->addSavedMealPlan($userId, $mealPlanId);
    }

    /**
     * Remove a meal plan from user's saved list
     */
    public static function removeSave() {
        $userId = USession::getInstance()->get('user');
        $mealPlanId = UHTTPMethods::post('mealPlanId');

        FPersistentManager::getInstance()->removeSavedMealPlan($userId, $mealPlanId);
    }
}

 