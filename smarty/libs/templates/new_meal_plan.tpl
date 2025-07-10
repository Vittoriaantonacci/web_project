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

        <!-- Tag -->
        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <input type="text" class="form-control" id="tag" name="tag" required>
        </div>

        {assign var=mealtimes value=['Colazione', 'Pranzo', 'Snacks', 'Cena']}
        {foreach from=$mealtimes item=mealtime name=outer}
        <div class="card mb-4">
            <div class="card-header bg-success text-white">{$mealtime}</div>
            <div class="card-body">
                <label class="form-label">Ingredienti</label>
                <div class="ingredient-list" id="ingredient-list-{$smarty.foreach.outer.index}">
                    <div class="d-flex mb-2">
                        <select class="form-select me-2 ingredient-select" name="ingredients[]">
                            <option disabled selected value="">Seleziona un ingrediente</option>
                            {foreach from=$meals item=meal}
                                <option value="{$meal->getId()}">{$meal->getName()|escape}</option>
                            {/foreach}
                            <option value="_load_more_">🔍 Carica altri cibi...</option>
                        </select>
                        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" onclick="addIngredientTo('ingredient-list-{$smarty.foreach.outer.index}')">Aggiungi ingrediente</button>
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
<script>
    function addIngredientTo(containerId) {
        const container = document.getElementById(containerId);
        const select = document.createElement("select");
        select.name = "ingredients[]";
        select.className = "form-select me-2 ingredient-select";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.text = "Seleziona un ingrediente";
        select.appendChild(defaultOption);

        {foreach from=$meals item=meal}
            const opt = document.createElement("option");
            opt.value = "{$meal->getId()}";
            opt.text = "{$meal->getName()|escape:'javascript'}";
            select.appendChild(opt);
        {/foreach}

        const loadMore = document.createElement("option");
        loadMore.value = "_load_more_";
        loadMore.text = "🔍 Carica altri cibi...";
        select.appendChild(loadMore);

        const wrapper = document.createElement("div");
        wrapper.className = "d-flex mb-2";
        wrapper.appendChild(select);

        const removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.className = "btn btn-outline-danger";
        removeBtn.textContent = "Rimuovi";
        removeBtn.onclick = function () { wrapper.remove(); };
        wrapper.appendChild(removeBtn);

        container.appendChild(wrapper);
    }
</script>
{/block}