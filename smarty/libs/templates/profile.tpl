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
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Preferiti
                </div>
                <div class="card-body">
                    {if $favorites|@count > 0}
                        <ul class="list-group list-group-flush">
                            {foreach from=$favorites item=recipe}
                                <li class="list-group-item">{if $recipe->getTitle()}{$recipe->getTitle()|escape}{else}vuoto{/if}</li>
                            {/foreach}
                        </ul>
                    {else}
                        <p class="text-muted">Non ci sono preferiti.</p>
                    {/if}
                </div>
            </div>
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
</script>
{/block}
