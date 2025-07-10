{extends file='layout.tpl'}

{block name='body'}
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6 mb-4 mb-lg-0">
            {if $recipe->getImage()}
                <img src="/recipeek/public/uploads/recipes/{$recipe->getImage()->getImagePath()}" class="img-fluid rounded shadow fixed-post-img" alt="Immagine ricetta">
            {else}
                <img src="/recipeek/public/default/recipe_ph.png" class="img-fluid rounded shadow fixed-post-img" alt="Immagine ricetta">
            {/if}
        </div>
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 class="display-4">{$recipe->getNameRecipe()|escape}</h1>
            <p class="lead md-1">{$recipe->getDescription()|escape}</p>
            {if $recipe->getCreator()}
                <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-3 row w-100">
                    <div class="col-12 col-md-auto">
                        <a href="/recipeek/Profile/visitProfile/{$recipe->getCreator()->getIdUser()}" class="card text-decoration-none">
                            <div class="d-flex align-items-center">
                                {if $recipe->getCreator()->getProPic()}
                                    <img src="/recipeek/public/uploads/propic/{$recipe->getCreator()->getProPic()->getPath()|escape}" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                {else}
                                    <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                {/if}
                                <div class="ms-3 card-body">
                                    <p class="mb-0 fw-bold">{$recipe->getCreator()->getNickname()|escape}</p>
                                    <p class="mb-1">@{$recipe->getCreator()->getUsername()|escape}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    {if $isSaved !== null}
                        <div class="col-12 col-md-auto mt-3 mt-md-0 flex-shrink-0">
                            <button class="btn btn-save {if $isSaved}btn-warning{else}btn-outline-warning{/if}"
                                    data-action="{if $isSaved}removeSave{else}addSave{/if}"
                                    data-recipe-id="{$recipe->getIdRecipe()}">
                                🔖 {if $isSaved}Rimuovi dai salvati{else}Salva ricetta{/if}
                            </button>
                        </div>
                    {/if}
                </div>
            {/if}
        </div>
    </div>

    <div class="row mb-4 d-flex justify-content-between">
        <div class="col-md-4">
            <h5><i class="bi bi-clock"></i> Tempo di preparazione:</h5>
            <p>{$recipe->getPreparationTime()} min</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-hourglass-split"></i> Tempo di cottura:</h5>
            <p>{$recipe->getCookingTime()} min</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-box"></i> Porzione:</h5>
            <p>{$recipe->getGramsOnePortion()} g</p>
        </div>
    </div>

    <div class="tab-content mb-5">
        <h3>Ingredienti</h3>
        {foreach from=$recipe->getIngredients() item=ingredient}
            <div class="card text-decoration-none">
                <div class="card-body">
                    <h5 class="card-title">{$ingredient->getName()|escape}</h5>
                    <small class="card-text">{$ingredient->getServing()->toString()|escape}</small>
                </div>
            </div>
        {/foreach}
    </div>

    <div class="mb-5">
        <h3>Procedimento</h3>
        <p class="fs-5">{$recipe->getInfos()|escape}</p>
    </div>
</div>
{/block}

{block name = 'script'}
<script src="/recipeek/public/assets/btn_state.js"></script>
{/block}
