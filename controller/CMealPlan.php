<?php

class CMealPlan {

    /** -------------------- RECIPE MANAGEMENT METHODS -------------------- */

    /**
     * It shows the form to create a recipe
     */
    public static function create() {
        CUser::checkValation();

        $view = new VMealPlan();
        $view->create();
    }

    /**
     * It shows Meal Plan details
     */
    public static function view($idMealPlan) {
        CUser::checkValation();

        $pm = FPersistentManager::getInstance();
        $mealPlan = $pm->getMealPlanById($idMealPlan);

        CUser::requireVip($mealPlan->getCategory());

        $idUser = USession::getInstance()->get('user');

        $isSaved = null;
        if ($mealPlan && $mealPlan->getCreator()->getIdUser() != $idUser) {
            $isSaved = $pm->isMealPlanSaved($idUser, $idMealPlan);
        }

        $res = [];
        $mealsArray = $pm->getMealsByMealPlanId($idMealPlan);
        foreach ($mealsArray as $mealType => $mealArray) {
            foreach ($mealArray as $meal) {
                $res[$mealType] = array_merge($res[$mealType] ?? [], [$meal]);
            }
        }

        $view = new VMealPlan();
        $view->detail($mealPlan, $isSaved, $mealsArray);
    }

    /**
     * It create the view with saved and created recipes (when click on your recipe section)
     */
    public static function yourMealPlans() {
        CUser::checkValation();

        $pm = FPersistentManager::getInstance();
        $userId = USession::getInstance()->get('user');

    
        $savedMealPlans = $pm->getSavedMealPlans($userId);
        $createdMealPlans = $pm->getCreatedMealPlans($userId);

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
        $category = UHTTPMethods::post('category'); // Cambiato da 'tag' a 'category' per coerenza con il form
        $ingredients = UHTTPMethods::post('ingredients');

        $userId = USession::getInstance()->get('user');
        $profile = $pm->getUserById($userId);

        // This commands are needful to create Meal Plan id
        $mealPlan = new EMealPlan($nameMealPlan, $description, $category);
        $profile->addMealPlan($mealPlan);
        $pm->saveUser($profile);
        $mealPlan = FPersistentManager::uploadMealPlan($mealPlan, $profile);

        foreach ($ingredients as $mealtime => $mealIds) {
            foreach ($mealIds as $mealId) {
                $association = new EMealPlanMeal($mealPlan->getIdMealPlan(), $mealId, $mealtime);
                $pm->saveMealPlanMeal($association);
            }
        }

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

    /**
     * Remove a meal plan
     */
    public static function removeMealPlan($profileId) {
        $mealPlanId = UHTTPMethods::post('mealPlanId');
        $idUser = $profileId ? $profileId : USession::getInstance()->get('user');

        FPersistentManager::getInstance()->removeMealPlan($mealPlanId, $idUser);

        if ($profileId !== null) {
            header('Location: /recipeek/User/dashboard/' . $profileId);
            exit;
        }

        header('Location: /recipeek/User/homePage');
        exit;
    }

}

 