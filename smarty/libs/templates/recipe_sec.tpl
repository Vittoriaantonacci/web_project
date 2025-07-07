{extends file='layout.tpl'}

{block name="title"}Le tue ricette{/block}

{block name="body"}
<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-outline-primary tab-btn active" data-target="#saved-posts">📌 Ricette Salvate</button>
            <button class="btn btn-outline-primary tab-btn" data-target="#created-posts">📝 Ricette Create</button>
        </div>

        <!-- Sezione: Post Salvati -->
        <div id="saved-posts" class="tab-content fade show">
            {if $savedRecipe|@count > 0}
                {foreach from=$savedRecipe item=recipe}
                    <a href="/recipeek/Recipe/view/{$recipe->getIdRecipe()}" class="text-decoration-none text-dark">
                        <div class="styled-card mb-3">
                            <h5>{$recipe->getNameRecipe()|escape}</h5>
                            <p>{$recipe->getDescription()|escape}</p>
                            <p class="text-muted small">Creato da: {$recipe->getCreator()->getUsername()|escape}</p>
                        </div>
                    </a>
                {/foreach}
            {else}
                <p class="text-muted">Nessun post salvato.</p>
            {/if}
        </div>

        <!-- Sezione: Post Creati -->
        <div id="created-posts" class="tab-content fade" style="display: none;">
            {if $yourRecipe|@count > 0}
                {foreach from=$yourRecipe item=recipe}
                    <a href="/recipeek/Recipe/view/{$recipe->getIdRecipe()}" class="text-decoration-none text-dark">
                        <div class="styled-card mb-3">
                            <h5>{$recipe->getNameRecipe()|escape}</h5>
                            <p>{$recipe->getDescription()|escape}</p>
                            <p class="text-muted small">Creato da: {$recipe->getCreator()->getUsername()|escape}</p>
                        </div>
                    </a>
                {/foreach}
            {else}
                <p class="text-muted">Non hai ancora creato nessun post.</p>
            {/if}
        </div>
    </div>
</div>
{/block}

{block name="script"}
<script src="/recipeek/public/assets/tab_btn.js"></script>
{/block}