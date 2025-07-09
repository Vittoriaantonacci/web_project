{extends file='layout.tpl'}

{block name="title"}{$post->getTitle()|escape}{/block}

{block name="body"}
<div class="card post-card">
    <div class="card-body">
        <h2 class="card-title">{$post->getTitle()|escape}</h2>
        <h6 class="card-subtitle mb-2 text-muted">
            di {$post->getProfile()->getUsername()|escape}
        </h6>
        <p class="card-text">{$post->getDescription()|escape}</p>
        <p class="text-muted small">Creato il: {$post->getCreationTimeStr()|escape}</p>
    </div>
</div>

{if $isLiked !== null}
<div class="mt-3">
    <button class="btn btn-like {if $isLiked}btn-danger{else}btn-outline-danger{/if}"
            data-action="{if $isLiked}removeLike{else}addLike{/if}"
            data-post-id="{$post->getIdPost()}">
        {if $isLiked}❤️ Rimuovi Like{else}🤍 Metti Like{/if}
    </button>
</div>
{/if}
{if $isSaved !== null}
    <div class="mt-3">
        <button class="btn btn-save {if $isSaved}btn-warning{else}btn-outline-warning{/if}"
                data-action="{if $isSaved}removeSave{else}addSave{/if}"
                data-post-id="{$post->getIdPost()}">
            🔖 {if $isSaved}Rimuovi dai salvati{else}Salva post{/if}
        </button>
    </div>
{/if}

<div class="card mt-4">
    <div class="card-header bg-primary">Commenti</div>
    <div class="card-body">
        {if $post->getComments() && $post->getComments()|@count > 0}
            {foreach from=$post->getComments() item=comment}
                <div class="mb-3 border-bottom pb-2">
                    <strong>{$comment->getUser()->getUsername()|escape}</strong>
                    <small class="text-muted ms-2">{$comment->getCreationTimeStr()}</small>
                    <p class="mb-1">{$comment->getBody()|escape}</p>
                </div>
            {/foreach}
        {else}
            <p class="text-muted">Ancora nessun commento.</p>
        {/if}
    </div>
    <div class="card-footer">
        <form method="post" action="/recipeek/Post/addComment">
            <input type="hidden" name="postId" value="{$post->getIdPost()}" />
            <div class="mb-2">
                <textarea name="body" class="form-control" rows="2" placeholder="Scrivi un commento..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
        </form>
    </div>
</div>

{/block}

{block name = 'script'}
<script src="/recipeek/public/assets/btn_state.js"></script>
{/block}