<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Le tue Ricette Preferite</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .favorite-recipe {
      border: 1px solid #ddd;
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 0.375rem;
      display: flex;
      align-items: center;
      position: relative;
    }
    .favorite-recipe img {
      max-width: 120px;
      border-radius: 0.375rem;
      margin-right: 1rem;
      object-fit: cover;
      height: 90px;
      width: 120px;
    }
    .remove-favorite-btn {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
    }
    .recipe-info h5 {
      margin-bottom: 0.25rem;
    }
    .recipe-info p {
      margin-bottom: 0.25rem;
      color: #666;
      font-size: 0.9rem;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="mb-4">Le tue Ricette Preferite</h2>

  {if $favorites|@count === 0}
    <div class="alert alert-info">Non hai ancora aggiunto ricette ai preferiti.</div>
  {else}
    {foreach from=$favorites item=recipe}
      <div class="favorite-recipe">
        <img src="{$recipe.image.getImageMeal()->getImageUrl()|default:$recipe.image.getImage()->getImageUrl()}" alt="{$recipe.nameRecipe|escape}" />
        <div class="recipe-info flex-grow-1">
          <h5>{$recipe.nameRecipe|escape}</h5>
          <p><strong>Tempo preparazione:</strong> {$recipe.preparation_time} min</p>
          <p><strong>Tempo cottura:</strong> {$recipe.cooking_time} min</p>
          <p>{$recipe.infos|escape|truncate:100:"..."}</p>
          <a href="/recipe/show/{$recipe.idRecipe}" class="btn btn-sm btn-primary mt-2">Visualizza</a>
        </div>
        <form method="post" action="/favorites/remove" class="ms-3">
          <input type="hidden" name="idRecipe" value="{$recipe.idRecipe}" />
          <button type="submit" class="btn btn-sm btn-outline-danger remove-favorite-btn" title="Rimuovi dai preferiti">×</button>
        </form>
      </div>
    {/foreach}
  {/if}
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
