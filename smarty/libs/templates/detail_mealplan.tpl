<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dettaglio Piano Alimentare</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .mealplan-header {
      margin-bottom: 2rem;
    }
    .meal-block {
      border: 1px solid #ddd;
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 0.375rem;
      position: relative;
      background: #fff;
    }
    .meal-image {
      max-width: 100%;
      max-height: 150px;
      object-fit: cover;
      border-radius: 0.25rem;
      margin-bottom: 0.75rem;
    }
    .serving-list {
      margin-top: 1rem;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">

  <div class="mealplan-header">
    <h2>{$mealplan.nameMealPlan|escape}</h2>
    <p class="text-muted">Creato da: {$mealplan.creator.username|escape}</p>
    <p>{$mealplan.description|escape}</p>
    {if $mealplan.tags}
      <p>
        <strong>Tag:</strong>
        {foreach $mealplan.tags as $tag}
          <span class="badge bg-secondary">{$tag|escape}</span>
        {/foreach}
      </p>
    {/if}
    <p><small class="text-muted">Creato il: {$mealplan.creationDate|date_format:"%d/%m/%Y"}</small></p>
  </div>

  {if $mealplan.recipes|@count > 0}
  <h4>Ricette incluse</h4>
  <div>
    {foreach $mealplan.recipes as $recipe}
      <div class="meal-block">
        <h5>{$recipe.nameRecipe|escape}</h5>
        <p>{$recipe.description|escape}</p>
      </div>
    {/foreach}
  </div>
  {/if}

  {if $mealplan.meals|@count > 0}
  <h4>Pasti del piano</h4>
  <div>
    {foreach $mealplan.meals as $meal}
      <div class="meal-block row">
        <div class="col-md-3">
          <img src="{$meal.imageMeal.url|escape}" alt="Immagine di {$meal.nameMeal|escape}" class="meal-image" />
        </div>
        <div class="col-md-9">
          <h5>{$meal.nameMeal|escape} <small class="text-muted">({$meal.type|escape})</small></h5>
          {if $meal.recipe}
            <p><strong>Ricetta associata:</strong> {$meal.recipe.nameRecipe|escape}</p>
          {/if}

          {if $meal.servings|@count > 0}
            <div class="serving-list">
              <strong>Porzioni:</strong>
              <ul class="list-group">
                {foreach $meal.servings as $serving}
                  <li class="list-group-item">
                    <strong>{$serving.description|escape}</strong> — Calorie: {$serving.calories}, Carboidrati: {$serving.carbohydrate}g, Proteine: {$serving.protein}g, Grassi: {$serving.fat}g
                  </li>
                {/foreach}
              </ul>
            </div>
          {/if}
        </div>
      </div>
    {/foreach}
  </div>
  {/if}

</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
