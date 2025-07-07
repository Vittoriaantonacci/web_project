<?php

class CRecipe {

    public static function create() {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
        
        $view = new VRecipe();
        $view->create();
    }

    public static function view($idRecipe) {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }

        $recipe = FPersistentManager::getInstance()->getRecipeById($idRecipe);

        $view = new VRecipe();
        $view->detail($recipe);
    }

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
}