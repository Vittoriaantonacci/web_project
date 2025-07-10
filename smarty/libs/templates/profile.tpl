{extends file='layout.tpl'}

{block name="body"}
<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            {if $profile->getProPic()}
                <img src="/recipeek/public/uploads/propic/{$profile->getProPic()->getPath()|escape}" class="img-fluid rounded shadow" alt="Immagine profilo">
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
                <div id="followed-users-section" class="tab-content fade show">
                    {if isset($followed) && $followed|@count > 0}
                        {foreach from=$followed item=user}
                            <a href="/recipeek/Profile/visitProfile/{$user->getIdUser()}"  class="card text-decoration-none">
                                <div class="card-body">
                                    {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                                    {if $user->getSurname()} {$user->getSurname()|escape}{else}vuoto{/if}
                                    (@{if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if})
                                </div>
                            </a>
                        {/foreach}
                    {else}
                        <p class="text-muted">Non segui nessun utente.</p>
                    {/if}
                </div>
                <div id="followers-users-section" class="tab-content fade" style="display: none;">
                    {if isset($followers) && $followers|@count > 0}
                        {foreach from=$followers item=user}
                            <a href="/recipeek/Profile/visitProfile/{$user->getIdUser()}"  class="card text-decoration-none"">
                                <div class="card-body">
                                    {if $user->getName()}{$user->getName()|escape}{else}vuoto{/if}
                                    {if $user->getSurname()} {$user->getSurname()|escape}{else}vuoto{/if}
                                    (@{if $user->getUsername()}{$user->getUsername()|escape}{else}vuoto{/if})
                                </div>
                            </a>
                        {/foreach}
                    {else}
                        <p class="text-muted">Nessun follower al momento.</p>
                    {/if}
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="/mealplan/create" method="get">
                <button type="submit" class="btn btn-outline-primary w-100">Crea Meal Plan</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="/mealplan/list" method="get">
                <input type="hidden" name="user" value="{$profile->getIdUser()}" />
                <button type="submit" class="btn btn-outline-success w-100">Visualizza i miei Meal Plan</button>
            </form>
        </div>
    </div>
</div>

{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
{/block}