{extends file='layout.tpl'}

{block name="title"}I tuoi Piani Alimentari{/block}

{block name="body"}
<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#saved-mealplans">📌 Piani Salvati</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#created-mealplans">📝 Piani Creati</button>
        </div>

        <!-- Sezione: Meal Plans Salvati -->
        <div id="saved-mealplans" class="tab-content fade show">
            {if $savedMealPlans|@count > 0}
                {foreach from=$savedMealPlans item=mealPlan}
                    <a href="/recipeek/MealPlan/view/{$mealPlan->getIdMealPlan()}" class="card text-decoration-none mb-2">
                        <div class="card-body">
                            <h5>{$mealPlan->getNameMealPlan()|escape}</h5>
                            <p>{$mealPlan->getDescription()|escape}</p>
                            <p class="mb-1 small">Creato il: {$mealPlan->getCreationTime()|date_format:"%d/%m/%Y"}</p>
                        </div>
                    </a>
                {/foreach}
            {else}
                <p class="mb-1">Nessun piano alimentare salvato.</p>
            {/if}
        </div>

        <!-- Sezione: Meal Plans Creati -->
        <div id="created-mealplans" class="tab-content fade" style="display: none;">
            {if $createdMealPlans|@count > 0}
                {foreach from=$createdMealPlans item=mealPlan}
                    <a href="/recipeek/MealPlan/view/{$mealPlan->getIdMealPlan()}" class="card text-decoration-none mb-2">
                        <div class="card-body">
                            <h5>{$mealPlan->getNameMealPlan()|escape}</h5>
                            <p>{$mealPlan->getDescription()|escape}</p>
                            <p class="mb-1 small">Creato il: {$mealPlan->getCreationTime()|date_format:"%d/%m/%Y"}</p>
                        </div>
                    </a>
                {/foreach}
            {else}
                <p class="mb-1">Non hai ancora creato nessun piano alimentare.</p>
            {/if}
        </div>
    </div>
</div>
{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
{/block}