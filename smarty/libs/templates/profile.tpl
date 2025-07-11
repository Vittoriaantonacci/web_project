{extends file='layout.tpl'}

{block name="body"}
<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            <form method="post" action="/recipeek/Profile/updatePicture" enctype="multipart/form-data">
                <label for="profilePicInput" style="cursor:pointer;">
                    {if $profile->getProPic()}
                        <img src="/recipeek/public/uploads/propic/{$profile->getProPic()->getImagePath()|escape}" class="img-fluid rounded shadow" alt="Immagine profilo">
                    {else}
                        <img src="/recipeek/public/default/profile_ph.png" class="img-fluid rounded shadow" alt="Immagine profilo">
                    {/if}
                </label>
                <input type="file" id="profilePicInput" name="image" class="d-none" accept="image/*" onchange="this.form.submit()">
            </form>
        </div>
        <div class="col-md-9">
            <h2 class="mb-0" data-bs-toggle="modal" data-bs-target="#editNicknameModal" style="cursor:pointer;">
                {if $profile->getNickname()}{$profile->getNickname()|escape}{else}vuoto{/if}
            </h2>
            <p class="mb-1" data-bs-toggle="modal" data-bs-target="#editUsernameModal" style="cursor:pointer;">
                @{if $profile->getUsername()}{$profile->getUsername()|escape}{else}vuoto{/if}
            </p>
            <p class="mb-1" data-bs-toggle="modal" data-bs-target="#editEmailModal" style="cursor:pointer;">
                <strong>Email:</strong> {if $profile->getEmail()}{$profile->getEmail()|escape}{else}vuoto{/if}
            </p>
            <p class="mb-1" data-bs-toggle="modal" data-bs-target="#editNameModal" style="cursor:pointer;">
                <strong>Nome:</strong> {if $profile->getName()}{$profile->getName()|escape}{else}vuoto{/if}
                {if $profile->getSurname()}{$profile->getSurname()|escape}{else}vuoto{/if}
            </p>
            <p data-bs-toggle="modal" data-bs-target="#editBioModal" style="cursor:pointer;"><strong>Biografia:</strong> {if $profile->getBiography()}{$profile->getBiography()|escape}{else}vuoto{/if}</p>
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
                <div id="followers-users-section" class="card-body tab-content fade" style="display: none;">
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

</div>

<!-- Modal modifica nickname -->
<div class="modal fade" id="editNicknameModal" tabindex="-1" aria-labelledby="editNicknameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNicknameLabel">Modifica Nickname</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="nickname">
                <input type="text" class="form-control" name="value" value="{$profile->getNickname()|escape}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica email -->
<div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmailLabel">Modifica Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="email">
                <input type="email" class="form-control" name="value" value="{$profile->getEmail()|escape}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica nome e cognome -->
<div class="modal fade" id="editNameModal" tabindex="-1" aria-labelledby="editNameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateName">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNameLabel">Modifica Nome e Cognome</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{$profile->getName()|escape}">
                </div>
                <div class="mb-2">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" class="form-control" name="surname" value="{$profile->getSurname()|escape}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica username -->
<div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsernameLabel">Modifica Username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="username">
                <input type="text" class="form-control" name="value" value="{$profile->getUsername()|escape}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica biografia -->
<div class="modal fade" id="editBioModal" tabindex="-1" aria-labelledby="editBioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBioLabel">Modifica Biografia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="biography">
                <textarea class="form-control" name="value" rows="4">{$profile->getBiography()|escape}</textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal caricamento immagine profilo -->
<div class="modal fade" id="editProfilePicModal" tabindex="-1" aria-labelledby="editProfilePicLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updatePicture" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfilePicLabel">Cambia immagine profilo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="file" class="form-control" name="image" accept="image/*" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Carica</button>
            </div>
        </div>
    </form>
  </div>
</div>
{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
{/block}