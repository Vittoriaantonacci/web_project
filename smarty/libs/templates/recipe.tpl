{extends file='layout.tpl'}

{block name='body'}
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            {if $recipe->getImage()}
                <img src="{$recipe->getImage()->getImagePath()}" class="img-fluid rounded shadow" alt="Immagine ricetta">
            {/if}
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h1 class="display-4">{$recipe->getNameRecipe()|escape}</h1>
            <p class="lead text-muted">{$recipe->getDescription()|escape}</p>
            {if $recipe->getCreator()}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <p class="mb-0 fw-bold">{$recipe->getCreator()->getNickname()|escape}</p>
                        <p class="text-muted">@{$recipe->getCreator()->getUsername()|escape}</p>
                    </div>
                    <form method="post" action="/recipeek/Recipe/save">
                        <input type="hidden" name="id" value="{$recipe->getIdRecipe()}">
                        <button type="submit" class="btn btn-success">Salva ricetta</button>
                    </form>
                </div>
            {/if}
        </div>
    </div>

    <div class="row mb-4">
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

    <div class="mb-5">
        <h3>Ingredienti</h3>
        <ul class="list-group list-group-flush">
            {foreach from=$recipe->getIngredients() item=ingredient}
                <a href="/recipeek/Meal/view?id={$ingredient->getId()}" class="text-decoration-none">
                    <li class="list-group-item list-group-item-action">
                        {$ingredient->getName()|escape}
                    </li>
                </a>
            {/foreach}
        </ul>
    </div>

    <div class="mb-5">
        <h3>Procedimento</h3>
        <p class="fs-5">{$recipe->getInfos()|escape}</p>
    </div>
</div>
{/block}
