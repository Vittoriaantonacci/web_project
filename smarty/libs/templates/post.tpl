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
<div class="mt-3">
    {if $isLiked}
        <form method="post" action="/recipeek/Post/removeLike">
            <input type="hidden" name="postId" value="{$post->getIdPost()}" />
            <button class="btn btn-danger">❤️ Rimuovi Like</button>
        </form>
    {else}
        <form method="post" action="/recipeek/Post/addLike">
            <input type="hidden" name="postId" value="{$post->getIdPost()}" />
            <button class="btn btn-outline-danger">🤍 Metti Like</button>
        </form>
    {/if}
</div>

<div class="card mt-4">
    <div class="card-header">Commenti</div>
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