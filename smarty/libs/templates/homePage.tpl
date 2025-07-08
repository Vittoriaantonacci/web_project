{extends file='layout.tpl'}

{block name="title"}Home - Recipeek{/block}

{block name="body"}
<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-outline-primary tab-btn active" data-target="#saved-posts">Followed</button>
            <button class="btn btn-outline-primary tab-btn" data-target="#created-posts">ForYou</button>
        </div>

        <!-- Sezione: Post Salvati -->
        <div id="saved-posts" class="tab-content fade show">
            {if $posts|@count > 0}
                {foreach from=$posts item=post}
                  <a href="/recipeek/Post/view/{$post->getIdPost()}" class="card post-card text-decoration-none text-dark">
                    <div class="card-body">
                      <h5 class="card-title">{$post->getTitle()}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">di {$post->getProfile()->getUsername()}</h6>
                      <p class="card-text">{$post->getDescription()}</p>
                      <p class="text-muted small">Creato il: {$post->getCreationTimeStr()}</p>
                    </div>
                  </a>
                {/foreach}
            {else}
                <p class="text-muted">Non ci sono post di utenti che segui.</p>
            {/if}
        </div>

        <!-- Sezione: Post Creati -->
        <div id="created-posts" class="tab-content fade" style="display: none;">
            {if $yourPosts|@count > 0}
                {foreach from=$yourPosts item=post}
                  <a href="/recipeek/Post/view/{$post->getIdPost()}" class="card post-card text-decoration-none text-dark">
                    <div class="card-body">
                      <h5 class="card-title">{$post->getTitle()}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">di {$post->getProfile()->getUsername()}</h6>
                      <p class="card-text">{$post->getDescription()}</p>
                      <p class="text-muted small">Creato il: {$post->getCreationTimeStr()}</p>
                    </div>
                  </a>
                {/foreach}
            {else}
                <p class="text-muted">Nessun post trovato, prova a ricaricare la pagina.</p>
            {/if}
        </div>
    </div>
</div>
{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
{/block}
