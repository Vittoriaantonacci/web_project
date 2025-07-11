{extends file='layout.tpl'}

{block name="title"}I tuoi Post{/block}

{block name="body"}
<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#saved-posts">📌 Post Salvati</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#created-posts">📝 Post Creati</button>
        </div>

        <!-- Sezione: Post Salvati -->
        <div id="saved-posts" class="tab-content fade show">
            {if $savedPost|@count > 0}
                {foreach from=$savedPost item=post}
                    <a href="/recipeek/Post/view/{$post->getIdPost()}" class="card text-decoration-none">
                        <div class="card-body">
                            <h5>{$post->getTitle()|escape}</h5>
                            <p>{$post->getDescription()|escape}</p>
                            <p class="mb-1 small">Categoria: {$post->getCategory()|escape}</p>
                        </div>
                    </a>
                {/foreach}
            {else}
                <p class="mb-1">Nessun post salvato.</p>
            {/if}
        </div>

        <!-- Sezione: Post Creati -->
        <div id="created-posts" class="tab-content fade" style="display: none;">
            {if $yourPost|@count > 0}
                {foreach from=$yourPost item=post}
                    <a href="/recipeek/Post/view/{$post->getIdPost()}" class="card text-decoration-none">
                        <div class="card-body">
                            <h5>{$post->getTitle()|escape}</h5>
                            <p>{$post->getDescription()|escape}</p>
                            <p class="mb-1 small">Categoria: {$post->getCategory()|escape}</p>
                        </div>
                    </a>
                {/foreach}
            {else}
                <p class="mb-1">Non hai ancora creato nessun post.</p>
            {/if}
        </div>
    </div>
</div>
{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
{/block}