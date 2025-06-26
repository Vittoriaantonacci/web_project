<?php
require_once 'bootstrap.php'; // EntityManager + Smarty

class CMealPlanCreate {
    private $entityManager;
    private $smarty;

    public function __construct($entityManager, $smarty) {
        $this->entityManager = $entityManager;
        $this->smarty = $smarty;
    }

    // Mostra form con prodotti e ricette da selezionare
    public function showCreateForm(?array $error): void {
        // Carica dati per select
        $products = $this->entityManager->getRepository(EImage::class)  // supponendo che i prodotti siano immagini o altra entità
            ->findAll();

        $recipes = $this->entityManager->getRepository(ERecipe::class)
            ->findAll();

        // Assign variables to Smarty template
        $this->smarty->assign('products', $products);
        $this->smarty->assign('recipes', $recipes);
        $this->smarty->assign('error', $error);

        // Display the create form template
        $this->smarty->display('mealplan_create.tpl');
    }

    // Handle POST request to create meal plan with meals and servings
    public function createMealPlan(): void {
        try {
            // Begin database transaction
            $this->entityManager->getConnection()->beginTransaction();

            // Basic meal plan data from POST
            $name = $_POST['planName'] ?? '';
            $description = $_POST['description'] ?? '';
            $tag = $_POST['tag'] ?? '';
            // Dummy example: find creator profile (replace with logged-in user)
            $creator = $this->entityManager->find(EProfile::class, 1);

            if (empty($name)) {
                throw new Exception("Meal plan name is required");
            }

            // Create new meal plan entity
            $mealPlan = new EMealPlan($name, $description, $tag, $creator);

            // Arrays from POST representing multiple meals and servings
            $meal_types = $_POST['meal_type'] ?? [];
            $meal_items = $_POST['meal_item'] ?? [];
            $serv_descs = $_POST['serving_description'] ?? [];
            $serv_calories = $_POST['serving_calories'] ?? [];
            $serv_carbohydrates = $_POST['serving_carbohydrate'] ?? [];
            $serv_proteins = $_POST['serving_protein'] ?? [];
            $serv_fats = $_POST['serving_fat'] ?? [];

            // Loop through each meal item submitted
            for ($i = 0; $i < count($meal_types); $i++) {
                $type = $meal_types[$i];
                $itemId = $meal_items[$i];
                $servDesc = $serv_descs[$i];
                $cal = floatval($serv_calories[$i]);
                $carb = floatval($serv_carbohydrates[$i]);
                $prot = floatval($serv_proteins[$i]);
                $fat = floatval($serv_fats[$i]);

                if ($type === 'product') {
                    // Find product (assuming product is represented by EImage)
                    $product = $this->entityManager->find(EImage::class, $itemId);
                    if (!$product) throw new Exception("Product not found");

                    // Create new meal linked to the product (image)
                    $meal = new EMeal("Product: " . $product->getNameImage(), "product");
                    $meal->setImageMeal($product);
                    $mealPlan->addMeal($meal);

                } elseif ($type === 'recipe') {
                    // Find recipe entity
                    $recipe = $this->entityManager->find(ERecipe::class, $itemId);
                    if (!$recipe) throw new Exception("Recipe not found");

                    // Create new meal linked to the recipe
                    $meal = new EMeal($recipe->getNameRecipe(), "recipe");
                    $meal->setRecipe($recipe);
                    // Set meal image from recipe if available
                    if ($recipe->getImageRecipe()) {
                        $meal->setImageMeal($recipe->getImageRecipe());
                    }
                    $mealPlan->addMeal($meal);

                } else {
                    throw new Exception("Invalid meal type");
                }

                // Create serving associated with the meal
                $serving = new EServing($servDesc, $cal, $carb, $prot, $fat);
                $meal->addServing($serving);
            }

            // Persist the meal plan entity and commit the transaction
            $this->entityManager->persist($mealPlan);
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();

            // Redirect to the meal plan detail page
            header('Location: /mealplan/view?id=' . $mealPlan->getIdMealPlan());
            exit;

        } catch (Exception $e) {
            // Rollback transaction on error and show form with error message
            $this->entityManager->getConnection()->rollBack();
            $this->showCreateForm(['error' => $e->getMessage()]);
        }
    }
}



