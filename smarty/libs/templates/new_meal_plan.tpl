{extends file='layout.tpl'}

{block name='body'}
<div class="container py-5">
    <h2 class="mb-4">Crea un nuovo piano alimentare</h2>

    <form action="/recipeek/MealPlan/onCreate" method="post" enctype="multipart/form-data">

        <div class="card mb-4">
            <div class="card-header bg-primary text-dark">Nuovo Piano Alimentare</div>
        <div class="card-body">

        <!-- Nome del Meal Plan -->
        <div class="mb-3">
            <label for="nameMealPlan" class="form-label">Nome del Piano</label>
            <input type="text" class="form-control" id="nameMealPlan" name="nameMealPlan" required>
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <!-- Categoria -->
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled selected>Seleziona una categoria</option>
                <option value="Dieta">Dieta</option>
                <option value="Mantenimento">Mantenimento</option>
                <option value="Ipercalorica">Ipercalorica</option>
                <option value="Ipocalorica">Ipocalorica</option>
                {if $isVip}
                    <option value="Massa muscolare #Fit">Massa muscolare #Fit</option>
                    <option value="Cut #Fit">Cut #Fit</option>
                    <option value="Ipercalorica #Fit">Ipercalorica #Fit</option>
                    <option value="Ipocalorica #Fit">Ipocalorica #Fit</option>
                {/if}
            </select>
        </div>

        </div>
        </div>

        {assign var=mealtimes value=['Colazione', 'Pranzo', 'Snacks', 'Cena']}
        {foreach from=$mealtimes item=mealtime name=outer}
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">{$mealtime}</div>

        <div class="card-body">
            <label class="form-label">Ingredienti</label>
            <div id="ingredient-list-{$mealtime|lower}" class="ingredient-list">
                <div class="d-flex mb-2">
                    <select class="form-select me-2 ingredient-select" name="ingredients[{$mealtime|lower}][]">
                        <option disabled selected value="">Seleziona un ingrediente</option>
                        {foreach from=$meals item=meal}
                            <option value="{$meal->getId()}">{$meal->getName()|escape}</option>
                        {/foreach}
                        <option value="__load_more__">🔍 Carica altri cibi...</option>
                    </select>
                    <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
                </div>
            </div>
            <button type="button" class="btn btn-outline-danger mt-2" onclick="addIngredient('{$mealtime|lower}')">Aggiungi ingrediente</button>
        </div>

        </div>
        {/foreach}

        <div class="text-end">
            <button type="submit" class="btn btn-danger">Crea piano alimentare</button>
        </div>
    </form>

    <!-- Modal per caricamento ingredienti via API -->
    <div id="meal-modal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:1050;">
        <div class="modal-dialog modal-dialog-centered" style="max-width:500px; margin:auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cerca un alimento</h5>
                    <button type="button" class="btn-close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="meal-search" class="form-control mb-3" placeholder="Es. banana">
                    <div id="meal-results" class="list-group"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}

{block name='script'}
<script src="/recipeek/public/assets/add_ing.js"></script>
<script src="/recipeek/public/assets/new_meal_api.js"></script>
{/block}