<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="/recipeek/public/default/logo.png" />
  <title>{block name="title"}Recipeek{/block}</title>

  <!-- Bootstrap & Custom Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/recipeek/public/assets/style.css" />
</head>
<body>

<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center py-3 px-4 mb-4" style="background-color: #1e1e1e; border-radius: 1rem;">
        <h3 class="mb-0">Moderatore: {$mod->getUsername()}</h3>
        <div>
          <a href="/recipeek/Mod/dashboard" class="btn btn-outline-secondary me-2">Dashboard</a>
          <a href="/recipeek/Mod/analytics" class="btn btn-outline-primary me-2">Analisi</a>
          <a href="/recipeek/User/logout" class="btn btn-outline-danger">Logout</a>
        </div>
      </div>
    
      <div class="row">
        <!-- Sezione utenti -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-secondary">
              Utenti
            </div>
            <div class="card-body">
              <input type="text" class="form-control mb-3" placeholder="Cerca profilo..." id="user-filter-select">
                <div id="tab-users" class="tab-content fade show" data-link-prefix="/recipeek/User/dashboard/">
                    {if $profiles|@count > 0}
                        <a href="/recipeek/User/dashboard/{$profiles->getIdUser()}" class="text-decoration-none text-reset">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="card-title">@{$profiles->getUsername()}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{$profiles->getName()} {$profiles->getSurname()}</h6>
                                </div>
                            </div>
                        </a>
                    {else}
                        <p class="card-text">Nessun profilo selezionato.</p>
                    {/if}
                </div>
            </div>
          </div>
        </div>
            
        <!-- Sezione contenuti -->
        <div class="col-md-8">
          <div class="card">
        {if $profile|@count === 0}
            <div class="card-header bg-primary">
              Nessun profilo selezionato.
            </div>
        {else}
            <div class="card-header bg-primary">
              Contenuti di {$profile->getUsername()}
            </div>
            <div class="card-body">
              <h5>Post</h5>
              {foreach from=$profile->getPosts() item=post}
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <span>{$post->getTitle()}</span>
                    <form method="post" action="/recipeek/Post/removePost/{$profile->getIdUser()}">
                      <input type="hidden" name="postId" value="{$post->getIdPost()}">
                      <button type="submit" class="btn btn-outline-danger btn-sm">Rimuovi</button>
                    </form>
                  </div>
                </div>
              {/foreach}
            
              <h5 class="mt-4">Ricette</h5>
              {foreach from=$profile->getRecipes() item=recipe}
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <span>{$recipe->getNameRecipe()}</span>
                    <form method="post" action="/recipeek/Recipe/removeRecipe/{$profile->getIdUser()}">
                      <input type="hidden" name="recipeId" value="{$recipe->getIdRecipe()}">
                      <button type="submit" class="btn btn-outline-danger btn-sm">Rimuovi</button>
                    </form>
                  </div>
                </div>
              {/foreach}
            
              <h5 class="mt-4">Meal Plan</h5>
              {foreach from=$profile->getMealPlans() item=mealPlan}
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <span>{$mealPlan->getNameMealPlan()}</span>
                    <form method="post" action="/recipeek/MealPlan/removeMealPlan/{$profile->getIdUser()}">
                      <input type="hidden" name="mealPlanId" value="{$mealPlan->getIdMealPlan()}">
                      <button type="submit" class="btn btn-outline-danger btn-sm">Rimuovi</button>
                    </form>
                  </div>
                </div>
              {/foreach}
            </div>
          </div>
        {/if}
        </div>
      </div>
    </div>

</div>

  </div>
</div>

<!-- JS Bootstrap + Custom -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/recipeek/public/assets/upd_usr.js"></script>
</body>
</html>
    