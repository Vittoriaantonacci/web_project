<?php

require_once 'models/RecipeModel.php'; // ipotetico modello per caricare le ricette
require_once 'views/VRecipe.php';

class CRecipe {

    private $recipeModel;

    public function __construct($recipeModel) {
        $this->recipeModel = $recipeModel;
    }

    // Metodo per mostrare i dettagli di una ricetta
    public function showRecipe(int $idRecipe): void {
        $recipe = $this->recipeModel->findById($idRecipe);
        if ($recipe === null) {
            // gestire ricetta non trovata (esempio: redirect o pagina 404)
            http_response_code(404);
            echo "Ricetta non trovata.";
            exit;
        }
        // carica la view con la ricetta
        require 'views/VRecipe.php';
    }

    // Metodo per salvare la ricetta tra i preferiti
    public function saveFavorite(int $idRecipe): void {
        // Qui inserisci la logica per salvare la ricetta tra i preferiti,
        // ad esempio salvare in sessione o database.
        // Per ora ignora la conferma o messaggi.

        // esempio fittizio:
        // $this->recipeModel->saveFavorite($idRecipe, $userId);

        // Redirect dopo il salvataggio alla pagina della ricetta
        header('Location: ?action=showRecipe&id=' . $idRecipe);
        exit;
    }
}
