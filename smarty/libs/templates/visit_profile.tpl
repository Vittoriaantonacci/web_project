{extends file='layout.tpl'}

{block name="body"}
<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            {if $profile->getProPic()}
                <img src="/recipeek/public/uploads/propic/{$profile->getProPic()->getImagePath()|escape}" class="img-fluid rounded shadow" alt="Immagine profilo">
            {else}
                <img src="/recipeek/public/default/profile_ph.png" class="img-fluid rounded shadow" alt="Immagine profilo">
            {/if}
        </div>
        <div class="col-md-9">
            <h2 class="mb-0">
                {if $profile->getNickname()}{$profile->getNickname()|escape}{else}vuoto{/if}
            </h2>
            <p class="mb-1">@{if $profile->getUsername()}{$profile->getUsername()|escape}{else}vuoto{/if}</p>
            <p class="mb-1">
                <strong>Nome:</strong> {if $profile->getName()}{$profile->getName()|escape}{else}vuoto{/if}
                {if $profile->getSurname()}{$profile->getSurname()|escape}{else}vuoto{/if}
            </p>
            <p><strong>Biografia:</strong> {if $profile->getBiography()}{$profile->getBiography()|escape}{else}vuoto{/if}</p>
            {if $isFollowed !== null}
                <div class="mt-2">
                    <button class="btn btn-follow {if $isFollowed}btn-primary{else}btn-outline-primary{/if}"
                            data-action="{if $isFollowed}unfollow{else}follow{/if}"
                            data-profile-id="{$profile->getIdUser()}">
                            🤝 {if $isFollowed}Non seguire più{else}Segui{/if}
                    </button>
                </div>
            {/if}
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-secondary w-100 tab-btn active" data-variant="secondary" data-target="#followed-users-section">Seguiti</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary w-100 tab-btn" data-variant="secondary" data-target="#followers-users-section">Follower</button>
                    </div>
                </div>
                <div id="followed-users-section" class="card-body tab-content fade show">
                    {if isset($followed) && $followed|@count > 0}
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            {foreach from=$followed item=user}
                                <div class="col">
                                    <a href="/recipeek/Profile/visitProfile/{$user->getIdUser()}" class="card text-decoration-none">
                                        <div class="card-body">
                                            {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                                            {if $user->getSurname()} {$user->getSurname()|escape}{else}vuoto{/if}
                                            (@{if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if})
                                        </div>
                                    </a>
                                </div>
                            {/foreach}
                        </div>
                    {else}
                        <p class="text-muted">Non segui nessun utente.</p>
                    {/if}
                </div>
                <div id="followers-users-section" class="card-body tab-content fade" style="display: none;">
                    {if isset($followers) && $followers|@count > 0}
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                         {foreach from=$followers item=user}
                            <div class="col">
                                <a href="/recipeek/Profile/visitProfile/{$user->getIdUser()}" class="card text-decoration-none">
                                    <div class="card-body">
                                        {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                                        {if $user->getSurname()} {$user->getSurname()|escape}{else}vuoto{/if}
                                        (@{if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if})
                                    </div>
                                </a>
                            </div>
                            {/foreach}
                        </div>
                    {else}
                        <p class="text-muted">Nessun follower al momento.</p>
                    {/if}
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100 tab-btn active" data-variant="primary" data-target="#recipes-section">Ricette</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100 tab-btn" data-variant="primary" data-target="#mealplans-section">Piani Alimentari</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="recipes-section" class="tab-content fade show">
                        {if isset($recipes) && $recipes|@count > 0}
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                {foreach from=$recipes item=recipe}
                                    <div class="col">
                                        <div class="card clickable-card" onclick="window.location.href='/recipeek/Recipe/view/{$recipe->getIdRecipe()}'">
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
                    <div id="mealplans-section" class="tab-content fade" style="display: none;">
                        {if isset($mealPlans) && $mealPlans|@count > 0}
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                {foreach from=$mealPlans item=mealPlan}
                                    <div class="col">
                                        <div class="card clickable-card" onclick="window.location.href='/recipeek/MealPlan/view/{$mealPlan->getIdMealPlan()}'">
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
{/block}

{block name = 'script'}
<script src="/recipeek/public/assets/tab_btn.js"></script>
<script src="/recipeek/public/assets/btn_state.js"></script>
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
