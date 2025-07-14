<?php

class CRecipe {

    /** -------------------- RECIPE MANAGEMENT METHODS -------------------- */

    /**
     * It shows the form to create a recipe
     */
    public static function create() {
        CUser::checkValation();
        
        $view = new VRecipe();
        $view->create(CUser::isVip());
    }

    /**
     * It shows recipe details
     */
    public static function view($idRecipe) {
        CUser::checkValation();

        $pm = FPersistentManager::getInstance();

        $recipe = $pm->getRecipeById($idRecipe);
        CUser::requireVip($recipe->getCategory());

        $idUser = USession::getInstance()->get('user');
        
        $isSaved = null;
        if ($recipe->getCreator()->getIdUser() != $idUser) {
            $isSaved = $pm->isRecipeSaved($idUser, $idRecipe);
        }

        $view = new VRecipe();
        $view->detail($recipe, $isSaved);
    }

    /**
     * It create the view with saved and created recipes (when click on your recipe section)
     */
    public static function yourRecipes() {
        CUser::checkValation();
        
        $pm = FPersistentManager::getInstance();
        $userId = USession::getInstance()->get('user');

        $createdRecipes = $pm->getCreatedRecipes($userId);
        $savedRecipes = $pm->getSavedRecipes($userId);

        $view = new VRecipe();
        $view->yourRecipe($createdRecipes, $savedRecipes);
    }

        
    /** -------------------- RECIPE BEHAVIOR METHODS -------------------- */

    /**
     * It create the Recipe entity with form compiled data and save it on db
     */
    public static function onCreate() {
        $pm = FPersistentManager::getInstance();

        $title = UHTTPMethods::post('nameRecipe');
        $description = UHTTPMethods::post('description');
        $category = UHTTPMethods::post('category');
        $prep_time = UHTTPMethods::post('preparation_time');
        $cook_time = UHTTPMethods::post('cooking_time');
        $grams_on_portion = UHTTPMethods::post('grams_one_portion');
        $infos = UHTTPMethods::post('infos');

        // lista di idMeals
        $ingredients = UHTTPMethods::post('ingredients');
        $imageData = UHTTPMethods::saveUploadedFile('image', 'recipes');
        $profile = $pm->getUserById(USession::getInstance()->get('user'));
        
        $recipe = new ERecipe(
            nameRecipe: $title,
            infos: $infos,
            category: $category,
            description: $description,
            preparation_time: $prep_time,
            cooking_time: $cook_time,
            grams_one_portion: $grams_on_portion
        );

        if (!$imageData['error']) {
            $image = new EImage($imageData['name'],  $imageData['size'], $imageData['ext'], $imageData['path']);
            $recipe->addImage($image);
        }

        foreach($ingredients['ingredients'] as $mealId){
            $meal = $pm->getMealById($mealId);
            $recipe->addIngredient($meal);
        }
        
        $profile->addRecipe($recipe);
        $pm->saveRecipe($recipe);
        header('Location: /recipeek/User/homePage');
        exit;

    }

    /**
     * This method was called in the ingredient selection when it needs to perform an API call
     */
    public static function loadMeal() {
        $input = UHTTPMethods::post('input');

        $response = UApiClient::getInstance()->searchFood($input);

        $meal_list = EMeal::fromFatSecretJson($response);

        foreach($meal_list as $meal){
            FPersistentManager::getInstance()->addMeal($meal);
        }   
        
        $results = array_map(function ($meal) {
        return [
            'id' => $meal->getId(),
            'name' => $meal->getName()
        ];
        
        }, $meal_list);

        header('Content-Type: application/json');
        echo json_encode($results);
        exit;
    }

    /**
     * Add a Recipe to your saved
     */
    public static function addSave(){
        $userId = USession::getInstance()->get('user');
        $idRecipe = UHTTPMethods::post('recipeId');

        FPersistentManager::getInstance()->addSavedRecipe($userId, $idRecipe);
    }

    /**
     * Remove a Recipe to your saved
     */
    public static function removeSave() {
        $userId = USession::getInstance()->get('user');
        $idRecipe = UHTTPMethods::post('recipeId');

        FPersistentManager::getInstance()->removeSavedRecipe($userId, $idRecipe);
    }

    public static function removeRecipe($profileId = null) {
        $idRecipe = UHTTPMethods::post('recipeId');
        $idUser = $profileId ? $profileId : USession::getInstance()->get('user');

        FPersistentManager::getInstance()->removeRecipe($idRecipe, $idUser);

        if ($profileId !== null) {
            var_dump("ok");
            header('Location: /recipeek/User/dashboard/' . $profileId);
            exit;
        }

        header('Location: /recipeek/User/homePage');
        exit;
    }
}