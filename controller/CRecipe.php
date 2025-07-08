<?php

class CRecipe {

    /** -------------------- RECIPE MANAGEMENT METHODS -------------------- */

    /**
     * It shows the form to create a recipe
     */
    public static function create() {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
        
        $view = new VRecipe();
        $view->create();
    }

    /**
     * It shows recipe details
     */
    public static function view($idRecipe) {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
        $pm = FPersistentManager::getInstance();

        $recipe = $pm->getRecipeById($idRecipe);
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
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }

        $createdRecipes = FPersistentManager::getInstance()->getCreatedRecipes(USession::getInstance()->get('user'));
        $savedRecipes = FPersistentManager::getInstance()->getSavedRecipes(USession::getInstance()->get('user'));

        $view = new VRecipe();
        $view->yourRecipe($createdRecipes, $savedRecipes);
    }

        
    /** -------------------- RECIPE BEHAVIOR METHODS -------------------- */

    /**
     * It create the Recipe entity with form compiled data and save it on db
     */
    public static function onCreate() {

        $title = UHTTPMethods::post('nameRecipe');
        $description = UHTTPMethods::post('description');
        $prep_time = UHTTPMethods::post('preparation_time');
        $cook_time = UHTTPMethods::post('cooking_time');
        $grams_on_portion = UHTTPMethods::post('grams_one_portion');
        $infos = UHTTPMethods::post('infos');

        // lista di idMeals
        $ingredients = UHTTPMethods::post('ingredients');
        $imageData = UHTTPMethods::saveUploadedFile('image', 'recipes');
        $profile = FPersistentManager::getInstance()->getUserById(USession::getInstance()->get('user'));
        
        $recipe = new ERecipe(
            nameRecipe: $title,
            infos: $infos,
            description: $description,
            preparation_time: $prep_time,
            cooking_time: $cook_time,
            grams_one_portion: $grams_on_portion
        );

        if ($imageData) {
            $image = new EImage($imageData['name'],  $imageData['size'], $imageData['ext'], $imageData['path']);
            $recipe->addImage($image);
        }

        foreach($ingredients as $mealId){
            $meal = FPersistentManager::getInstance()->getMealById($mealId);
            $recipe->addIngredient($meal);
        }
        
        $profile->addRecipe($recipe);
        FPersistentManager::getInstance()->saveRecipe($recipe);
        header('Location: /recipeek/User/homePage');
        exit;

    }

    /**
     * This method was called in the ingredient selection when it needs to perform an API call
     */
    public static function loadMeal() {
        $input = UHTTPMethods::get('q');

        //DA SISTEMARE IL MODAL SU JAVASCRIPT (IL METODO FUNZIONA)
        CError::showError($input);
        /*
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
        echo json_encode($results);*/
    }

    /**
     * 
     */
    public static function addSave(){
        $userId = USession::getInstance()->get('user');
        $idRecipe = UHTTPMethods::post('recipeId');

        FPersistentManager::getInstance()->addSavedRecipe($userId, $idRecipe);
    }
}