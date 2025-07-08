{extends file='layout.tpl'}

{block name="body"}
<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            {if $profile->getProPic()}
                <img src="{$profile->getProPic()->getPath()|escape}" alt="Immagine profilo" class="img-fluid rounded-circle border" style="max-width: 150px;">
            {/if}
        </div>
        <div class="col-md-9">
            <h2 class="mb-0">
                {if $profile->getNickname()}{$profile->getNickname()|escape}{else}vuoto{/if}
            </h2>
            <p class="mb-1 text-muted">@{if $profile->getUsername()}{$profile->getUsername()|escape}{else}vuoto{/if}</p>
            <p class="mb-1">
                <strong>Nome:</strong> {if $profile->getName()}{$profile->getName()|escape}{else}vuoto{/if}
                {if $profile->getSurname()}{$profile->getSurname()|escape}{else}vuoto{/if}
            </p>
            <p><strong>Biografia:</strong> {if $profile->getBiography()}{$profile->getBiography()|escape}{else}vuoto{/if}</p>
            {if $isFollowed !== null}
                <div class="mt-2">
                    <button class="btn btn-follow {if $isFollowed}btn-danger{else}btn-outline-danger{/if}"
                            data-action="{if $isFollowed}unfollow{else}follow{/if}"
                            data-user-id="{$profile->getIdUser()}">
                        🤝 {if $isFollowed}Non seguire più{else}Segui{/if}
                    </button>
                </div>
            {/if}
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-light" type="button" onclick="toggleFollowTab('followed')">Seguiti</button>
                        <button class="btn btn-sm btn-light" type="button" onclick="toggleFollowTab('followers')">Follower</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="followed-users-section">
                        {if isset($followed) && $followed|@count > 0}
                            <ul class="list-group list-group-flush">
                                {foreach from=$followed item=user}
                                    <li class="list-group-item">
                                        {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                                        {if $user->getSurname()} {$user->getSurname()|escape}{else}vuoto{/if}
                                        (@{if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if})
                                    </li>
                                {/foreach}
                            </ul>
                        {else}
                            <p class="text-muted">Non segui nessun utente.</p>
                        {/if}
                    </div>
                    <div id="followers-users-section" style="display: none;">
                        {if isset($followers) && $followers|@count > 0}
                            <ul class="list-group list-group-flush">
                                {foreach from=$followers item=user}
                                    <li class="list-group-item">
                                        {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                                        {if $user->getSurname()} {$user->getSurname()|escape}{else}vuoto{/if}
                                        (@{if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if})
                                    </li>
                                {/foreach}
                            </ul>
                        {else}
                            <p class="text-muted">Nessun follower al momento.</p>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-center">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-light" onclick="toggleContentTab('recipes')">Ricette</button>
                        <button class="btn btn-sm btn-outline-light" onclick="toggleContentTab('mealplans')">Piani Alimentari</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="recipes-section">
                        {if isset($recipes) && $recipes|@count > 0}
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                {foreach from=$recipes item=recipe}
                                    <div class="col">
                                        <div class="card h-100 clickable-card" onclick="window.location.href='/recipe/{$recipe->getIdRecipe()}'">
                                            <div class="card-body">
                                                <h5 class="card-title">{$recipe->getNameRecipe()|escape}</h5>
                                                <p class="card-text">{$recipe->getDescription()|escape}</p>
                                            </div>
                                        </div>
                                    </div>
                                {/foreach}
                            </div>
                        {else}
                            <p class="text-muted">Nessuna ricetta disponibile.</p>
                        {/if}
                    </div>
                    <div id="mealplans-section" style="display: none;">
                        {if isset($mealPlans) && $mealPlans|@count > 0}
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                {foreach from=$mealPlans item=mealPlan}
                                    <div class="col">
                                        <div class="card h-100 clickable-card" onclick="window.location.href='/mealplan/{$mealPlan->getIdMealPlan()}'">
                                            <div class="card-body">
                                                <h5 class="card-title">{$mealPlan->getNameMealPlan()|escape}</h5>
                                                <p class="card-text">{$mealPlan->getDescription()|escape}</p>
                                            </div>
                                        </div>
                                    </div>
                                {/foreach}
                            </div>
                        {else}
                            <p class="text-muted">Nessun piano alimentare disponibile.</p>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFollowTab(tab) {
        const followed = document.getElementById('followed-users-section');
        const followers = document.getElementById('followers-users-section');
        if (tab === 'followed') {
            followed.style.display = 'block';
            followers.style.display = 'none';
        } else {
            followed.style.display = 'none';
            followers.style.display = 'block';
        }
    }
    function toggleContentTab(tab) {
        const recipes = document.getElementById('recipes-section');
        const mealplans = document.getElementById('mealplans-section');
        if (tab === 'recipes') {
            recipes.style.display = 'block';
            mealplans.style.display = 'none';
        } else {
            recipes.style.display = 'none';
            mealplans.style.display = 'block';
        }
    }
</script>
{/block}
