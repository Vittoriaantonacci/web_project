{extends file="layout.tpl"}

{block name="title"}Cerca utente{/block}

{block name="body"}
    <h2>Cerca utente</h2>

    <!-- Sezione utenti -->
        <div class="card">
          <div class="card-body">
            <input type="text" class="form-control mb-3" placeholder="Cerca profilo..." id="user-filter-select">
              <div id="tab-users" class="tab-content fade show" data-link-prefix="/recipeek/Profile/visitProfile/">
                  {if $profiles|@count > 0} 
                          <div class="card mb-2">
                              <div class="d-flex align-items-center">
                                {if $profile->getProPic()}
                                    <img src="/recipeek/public/uploads/propic/{$profile->getProPic()->getImagePath()|escape}" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                {else}
                                    <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                {/if}
                                <div class="ms-3 card-body">
                                    <p class="mb-0 fw-bold">{$profile->getNickname()|escape}</p>
                                    <p class="mb-1">@{$profile->getUsername()|escape}</p>
                                </div>
                              </div>
                          </div>
                  {else}
                      <p class="card-text">Nessun profilo selezionato.</p>
                  {/if}
              </div>
          </div>
        </div>
{/block}


{block name = 'script'}
<script src="/recipeek/public/assets/upd_usr.js"></script>
{/block}