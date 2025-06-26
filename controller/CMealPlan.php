<?php
require_once 'bootstrap.php'; // EntityManager + Smarty

class CMealPlan {
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

        $this->smarty->assign('products', $products);
        $this->smarty->assign('recipes', $recipes);
        $this->smarty->assign('error', $error);

        $this->smarty->display('mealplan_create.tpl');
    }

    // Gestisce il POST per creare piano + pasti + porzioni
    public function createMealPlan(): void {
        try {
            $this->entityManager->getConnection()->beginTransaction();

            // Dati base piano
            $name = $_POST['planName'] ?? '';
            $description = $_POST['description'] ?? '';
            $tag = $_POST['tag'] ?? '';
            // Supponiamo $creator sia l'utente loggato (dummy qui)
            $creator = $this->entityManager->find(EProfile::class, 1); // esempio

            if (empty($name)) {
                throw new Exception("Il nome del piano è obbligatorio");
            }

            $mealPlan = new EMealPlan($name, $description, $tag, $creator);

            // Dati pasti multipli
            $meal_types = $_POST['meal_type'] ?? [];
            $meal_items = $_POST['meal_item'] ?? [];
            $serv_descs = $_POST['serving_description'] ?? [];
            $serv_calories = $_POST['serving_calories'] ?? [];
            $serv_carbohydrates = $_POST['serving_carbohydrate'] ?? [];
            $serv_proteins = $_POST['serving_protein'] ?? [];
            $serv_fats = $_POST['serving_fat'] ?? [];

            // Cicla su ogni pasto aggiunto
            for ($i = 0; $i < count($meal_types); $i++) {
                $type = $meal_types[$i];
                $itemId = $meal_items[$i];
                $servDesc = $serv_descs[$i];
                $cal = floatval($serv_calories[$i]);
                $carb = floatval($serv_carbohydrates[$i]);
                $prot = floatval($serv_proteins[$i]);
                $fat = floatval($serv_fats[$i]);

                if ($type === 'product') {
                    // Cerca prodotto (ipotizziamo EImage come prodotto)
                    $product = $this->entityManager->find(EImage::class, $itemId);
                    if (!$product) throw new Exception("Prodotto non trovato");

                    // Crea nuovo EMeal legato al prodotto (immagine)
                    $meal = new EMeal("Prodotto: ".$product->getNameImage(), "product");
                    $meal->setImageMeal($product);
                    $mealPlan->addMeal($meal); // se hai aggiunto questo metodo in EMealPlan

                } elseif ($type === 'recipe') {
                    $recipe = $this->entityManager->find(ERecipe::class, $itemId);
                    if (!$recipe) throw new Exception("Ricetta non trovata");

                    $meal = new EMeal($recipe->getNameRecipe(), "recipe");
                    $meal->setRecipe($recipe);
                    // L’immagine puoi impostarla da ricetta se disponibile
                    if ($recipe->getImageRecipe()) {
                        $meal->setImageMeal($recipe->getImageRecipe());
                    }
                    $mealPlan->addMeal($meal);

                } else {
                    throw new Exception("Tipo pasto non valido");
                }

                // Crea la porzione associata
                $serving = new EServing($servDesc, $cal, $carb, $prot, $fat);
                $meal->addServing($serving);
            }

            $this->entityManager->persist($mealPlan);
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();

            header('Location: /mealplan/view?id=' . $mealPlan->getIdMealPlan());
            exit;

        } catch (Exception $e) {
            $this->entityManager->getConnection()->rollBack();
            $this->showCreateForm(['error' => $e->getMessage()]);
        }
    }
}

// Uso esempio:
$controller = new CMealPlan($entityManager, $smarty);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->createMealPlan();
} else {
    $controller->showCreateForm();
}

