<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Dettagli Ricetta - <?= htmlspecialchars($recipe->getNameRecipe()) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 2rem auto; }
        img.recipe-image { max-width: 100%; height: auto; border-radius: 8px; }
        h1 { margin-bottom: 0.2em; }
        .section { margin-bottom: 1.5em; }
        ul.ingredients { list-style: disc inside; }
        button.save-btn {
            background-color: #28a745; color: white; padding: 0.5em 1em; border: none; border-radius: 5px; cursor: pointer;
        }
        button.save-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <h1><?= htmlspecialchars($recipe->getNameRecipe()) ?></h1>
    <img class="recipe-image" src="<?= htmlspecialchars($recipe->getImage()->getImagePath()) ?>" alt="Immagine di <?= htmlspecialchars($recipe->getNameRecipe()) ?>" />
    
    <div class="section">
        <h2>Informazioni Generali</h2>
        <p><?= nl2br(htmlspecialchars($recipe->getInfos())) ?></p>
    </div>

    <div class="section">
        <h2>Descrizione</h2>
        <p><?= nl2br(htmlspecialchars($recipe->getDescription())) ?></p>
    </div>

    <div class="section">
        <h2>Ingredienti</h2>
        <?php if ($recipe->getIngredients()->isEmpty()): ?>
            <p>Non ci sono ingredienti associati a questa ricetta.</p>
        <?php else: ?>
            <ul class="ingredients">
                <?php foreach ($recipe->getIngredients() as $ingredient): ?>
                    <li><?= htmlspecialchars($ingredient->getNameMeal()) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="section">
        <strong>Tempo di preparazione:</strong> <?= $recipe->getPreparationTime() ?> minuti<br />
        <strong>Tempo di cottura:</strong> <?= $recipe->getCookingTime() ?> minuti<br />
        <strong>Grammi per porzione:</strong> <?= $recipe->getGramsOnePortion() ?> g
    </div>

    <form method="post" action="?action=saveFavorite&id=<?= $recipe->getIdRecipe() ?>">
        <button type="submit" class="save-btn">Salva tra i preferiti</button>
    </form>

</body>
</html>
