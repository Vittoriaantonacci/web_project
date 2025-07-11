{extends file='layout.tpl'}

{block name="title"}Home - Recipeek{/block}

{block name="body"}
<div class="container mt-4">
    <div class="styled-card">
        <!-- Category Filter -->
        <form id="category-filter-form" class="mb-3 text-center">
            <label for="category-select" class="form-label fw-bold">Filtra per categoria:</label>
            <select id="category-select" name="category" class="form-select w-auto d-inline-block">
                <option value="" disabled selected>Seleziona una categoria</option>
                <option value="antipasto">Antipasto</option>
                <option value="primo">Primo</option>
                <option value="secondo">Secondo</option>
                <option value="dolce">Dolce</option>
                <option value="bevanda">Bevanda</option>
                {if $isVip}
                    <option value="antipasto #Fit">Antipasto #Fit</option>
                    <option value="primo #Fit">Primo #Fit</option>
                    <option value="secondo #Fit">Secondo #Fit</option>
                    <option value="dolce #Fit">Dolce #Fit</option>
                    <option value="bevanda #Fit">Bevanda #Fit</option>
                    <option value="contorno #Fit">Contorno #Fit</option>
                    <option value="salsa #Fit">Salsa #Fit</option>
                    <option value="snack #Fit">Snack #Fit</option>
                    <option value="colazione #Fit">Colazione #Fit</option>
                {/if}
            </select>
        </form>

        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#tab-posts">Post</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#tab-recipes">Recipe</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#tab-mealplans">MealPlan</button>
        </div>

        <!-- Sezione: Post -->
        <div id="tab-posts" class="tab-content fade show">
            {if $posts|@count > 0}
                {foreach from=$posts item=post}
                  <a href="/recipeek/Post/view/{$post->getIdPost()}" class="card text-decoration-none" data-category="{$post->getCategory()|lower}">
                    <div class="card-body">
                      <h5 class="card-title">{$post->getTitle()}</h5>
                      <h6 class="card-subtitle mb-2">di {$post->getProfile()->getUsername()}</h6>
                      <p class="card-text">{$post->getDescription()}</p>
                      <p class="mb-1 small">Creato il: {$post->getCreationTimeStr()}</p>
                    </div>
                  </a>
                {/foreach}
            {else}
                <p class="mb-1">Non ci sono post di utenti che segui.</p>
            {/if}
        </div>

        <!-- Sezione: Recipe -->
        <div id="tab-recipes" class="tab-content fade" style="display: none;">
            {if $recipes|@count > 0}
                {foreach from=$recipes item=recipe}
                  <a href="/recipeek/Recipe/view/{$recipe->getIdRecipe()}" class="card text-decoration-none" data-category="{$recipe->getCategory()|lower}">
                    <div class="card-body">
                      <h5 class="card-title">{$recipe->getTitle()}</h5>
                      <h6 class="card-subtitle mb-2">di {$recipe->getProfile()->getUsername()}</h6>
                      <p class="card-text">{$recipe->getDescription()}</p>
                      <p class="mb-1 small">Creato il: {$recipe->getCreationTimeStr()}</p>
                    </div>
                  </a>
                {/foreach}
            {else}
                <p class="mb-1">Nessun post trovato, prova a ricaricare la pagina.</p>
            {/if}
        </div>

        <!-- Sezione: MealPlan -->
        <div id="tab-mealplans" class="tab-content fade" style="display: none;">
            {if $mealPlans|@count > 0}
                {foreach from=$mealPlans item=mealPlan}
                  <a href="/recipeek/MealPlan/view/{$mealPlan->getIdMealPlan()}" class="card text-decoration-none" data-category="{$mealPlan->getCategory()|lower}">
                    <div class="card-body">
                      <h5>{$mealPlan->getNameMealPlan()|escape}</h5>
                      <p>{$mealPlan->getDescription()|escape}</p>
                      <p class="mb-1 small">Creato il: {$mealPlan->getCreationTime()|date_format:"%d/%m/%Y"}</p>
                    </div>
                  </a>
                {/foreach}
            {else}
                <p class="mb-1">Nessun piano alimentare disponibile.</p>
            {/if}
        </div>
    </div>
</div>
{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
<script src="/recipeek/public/assets/upd_sec.js"></script>
{/block}
