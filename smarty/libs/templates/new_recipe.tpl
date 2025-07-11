{extends file='layout.tpl'}

{block name='body'}
<div class="container py-5">
    <h2 class="mb-4">Crea una nuova ricetta</h2>
    <form action="/recipeek/Recipe/onCreate" method="post" enctype="multipart/form-data">
        <!-- Parte 1: Nome e descrizione -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Informazioni di base</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nameRecipe" class="form-label">Nome ricetta</label>
                    <input type="text" class="form-control" id="nameRecipe" name="nameRecipe" required>
                </div>
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
            </div>
        </div>

        <!-- Parte 2: Tempi -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Tempi</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="preparation_time" class="form-label">Tempo di preparazione (min)</label>
                        <input type="number" class="form-control" id="preparation_time" name="preparation_time" min="1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cooking_time" class="form-label">Tempo di cottura (min)</label>
                        <input type="number" class="form-control" id="cooking_time" name="cooking_time" min="0" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="grams_one_portion" class="form-label">Grammi per porzione</label>
                    <input type="number" class="form-control" id="grams_one_portion" name="grams_one_portion" min="1" required>
                </div>
            </div>
        </div>

        <!-- Parte 3: Ingredienti, infos, immagine -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Ingredienti e dettagli</div>
            <div class="card-body">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <div id="ingredient-list-ingredients" class="ingredient-list">
                    <div class="d-flex mb-2">
                        <select class="form-select me-2 ingredient-select" name="ingredients[ingredients][]">
                            <option disabled selected value="">Seleziona un ingrediente</option>
                            {foreach from=$meals item=meal}
                                <option value="{$meal->getId()}">{$meal->getName()|escape}</option>
                            {/foreach}
                            <option value="__load_more__">🔍 Carica altri cibi...</option>
                        </select>
                        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" onclick="addIngredient('ingredients')">Aggiungi ingrediente</button>

                <div class="mb-3">
                    <label for="infos" class="form-label">Procedimento</label>
                    <textarea class="form-control" id="infos" name="infos" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="imageFile" class="form-label">Immagine della ricetta</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*" >
                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Crea ricetta</button>
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

{block name = 'script'}
<script src="/recipeek/public/assets/add_ing.js"></script>
<script src="/recipeek/public/assets/new_meal_api.js"></script>
{/block}
