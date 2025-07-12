{extends file='layout.tpl'}

{block name='body'}
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
            <h1 class="display-4">{$mealPlan->getNameMealPlan()|escape}</h1>
            <p class="lead md-1">{$mealPlan->getDescription()|escape}</p>
            <p class="text-muted"><strong>Categoria:</strong> {$mealPlan->getCategory()|escape}</p>
            {if $mealPlan->getCreator()}
                <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-3 row w-100">
                    <div class="col-12 col-md-auto">
                        <a href="/recipeek/Profile/visitProfile/{$mealPlan->getCreator()->getIdUser()}" class="card text-decoration-none">
                            <div class="d-flex align-items-center">
                                {if $mealPlan->getCreator()->getProPic()}
                                    <img src="/recipeek/public/uploads/propic/{$mealPlan->getCreator()->getProPic()->getImagePath()|escape}" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                {else}
                                    <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                {/if}
                                <div class="ms-3 card-body">
                                    <p class="mb-0 fw-bold">{$mealPlan->getCreator()->getNickname()|escape}</p>
                                    <p class="mb-1">@{$mealPlan->getCreator()->getUsername()|escape}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    {if $isSaved !== null}
                        <div class="col-12 col-md-auto mt-3 mt-md-0 flex-shrink-0">
                            <button class="btn btn-save {if $isSaved}btn-warning{else}btn-outline-warning{/if}"
                                    data-action="{if $isSaved}removeSave{else}addSave{/if}"
                                    data-mealplan-id="{$mealPlan->getIdMealPlan()}">
                                🔖 {if $isSaved}Rimuovi dai salvati{else}Salva piano{/if}
                            </button>
                        </div>
                    {/if}
                </div>
            {/if}
        </div>
    </div>

    {foreach from=$meals key=mealtime item=mealList}
        <div class="tab-content mb-5">
            <h3>{$mealtime|capitalize}</h3>
            {foreach from=$mealList item=meal}
                <div class="card text-decoration-none mb-2">
                    <div class="card-body">
                        <h5 class="card-title">{$meal->getName()|escape}</h5>
                        <small class="card-text">{$meal->getServing()->toString()|escape}</small>
                    </div>
                </div>
            {/foreach}
        </div>
    {/foreach}
</div>
{/block}

{block name = 'script'}
<script src="/recipeek/public/assets/btn_state.js"></script>
{/block}
