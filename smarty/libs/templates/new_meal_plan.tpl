{extends file='layout.tpl'}

{block name='body'}
<div class="container py-5">
    <h2 class="mb-4">Crea un nuovo piano alimentare</h2>

    <form action="/recipeek/MealPlan/onCreate" method="post" enctype="multipart/form-data">
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
        </div>

        {assign var=mealtimes value=['Colazione', 'Pranzo', 'Snacks', 'Cena']}
        {foreach from=$mealtimes item=mealtime name=outer}
        <div class="card mb-4">
            <div class="card-header bg-success text-white">{$mealtime}</div>
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
                <button type="button" class="btn btn-outline-primary mt-2" onclick="addIngredient('{$mealtime|lower}')">Aggiungi ingrediente</button>
            </div>
        </div>
        {/foreach}

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Crea piano alimentare</button>
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