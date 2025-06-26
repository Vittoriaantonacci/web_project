<?php
require_once 'bootstrap.php'; // EntityManager + Smarty

class CFavorites {
    private $entityManager;
    private $smarty;

    public function __construct($entityManager, $smarty) {
        $this->entityManager = $entityManager;
        $this->smarty = $smarty;
    }

    // Show the list of user's favorite recipes, loaded from the entity relation
    public function showFavorites(): void {
        $user = $this->entityManager->find(EProfile::class, 1); // TODO: replace with actual logged user id
        if (!$user) {
            http_response_code(403);
            echo "Unauthorized user.";
            exit;
        }

        // Use the EProfile method getFavorites() to get favorite recipes collection
        $favorites = $user->getFavorites();

        $this->smarty->assign('favorites', $favorites);
        $this->smarty->display('favorites_list.tpl');
    }

    // Add a recipe to favorites
    public function addFavorite(int $recipeId): void {
        try {
            $this->entityManager->getConnection()->beginTransaction();

            $user = $this->entityManager->find(EProfile::class, 1);
            if (!$user) {
                throw new Exception("User not found");
            }

            $recipe = $this->entityManager->find(ERecipe::class, $recipeId);
            if (!$recipe) {
                throw new Exception("Recipe not found");
            }

            if (!$user->getFavorites()->contains($recipe)) {
                $user->addFavorite($recipe);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();

            header('Location: /favorites');
            exit;

        } catch (Exception $e) {
            $this->entityManager->getConnection()->rollBack();
            $this->smarty->assign('error', $e->getMessage());
            $this->showFavorites();
        }
    }

    // Remove a recipe from favorites
    public function removeFavorite(int $recipeId): void {
        try {
            $this->entityManager->getConnection()->beginTransaction();

            $user = $this->entityManager->find(EProfile::class, 1);
            if (!$user) {
                throw new Exception("User not found");
            }

            $recipe = $this->entityManager->find(ERecipe::class, $recipeId);
            if (!$recipe) {
                throw new Exception("Recipe not found");
            }

            if ($user->getFavorites()->contains($recipe)) {
                $user->removeFavorite($recipe);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();

            header('Location: /favorites');
            exit;

        } catch (Exception $e) {
            $this->entityManager->getConnection()->rollBack();
            $this->smarty->assign('error', $e->getMessage());
            $this->showFavorites();
        }
    }
}

// Example usage:
$controller = new CFavorites($entityManager, $smarty);

$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($action) {
    case 'add':
        if ($id !== null) {
            $controller->addFavorite($id);
        } else {
            $controller->showFavorites();
        }
        break;
    case 'remove':
        if ($id !== null) {
            $controller->removeFavorite($id);
        } else {
            $controller->showFavorites();
        }
        break;
    default:
        $controller->showFavorites();
        break;
}
