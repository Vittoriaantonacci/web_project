{extends file='layout.tpl'}

{block name="title"}{$post->getTitle()|escape}{/block}

{block name="body"}
<div class="card post-card">
    <div class="card-body">
        <h2 class="card-title">{$post->getTitle()|escape}</h2>
        <h6 class="card-subtitle mb-2 text-muted">
            di {$post->getProfile()->getUsername()|escape}
        </h6>
        {if $post->getImages() && $post->getImages()|@count > 0}
            <div id="postImagesCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    {foreach from=$post->getImages() item=image name=imgLoop}
                        <div class="carousel-item {if $smarty.foreach.imgLoop.first}active{/if}">
                            <img src="/recipeek/public/uploads/posts/{$image->getImagePath()}" class="d-block w-100 rounded shadow" alt="Immagine del post">
                        </div>
                    {/foreach}
                </div>
                {if $post->getImages()|@count > 1}
                    <button class="carousel-control-prev" type="button" data-bs-target="#postImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#postImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successiva</span>
                    </button>
                {/if}
            </div>
        {else}
            <img src="/recipeek/public/default/post_ph.png" class="img-fluid rounded shadow" alt="Immagine profilo">
        {/if}
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
                    <a href="/recipeek/Profile/visitProfile/{$comment->getUser()->getIdUser()|escape}" class="nav-link text-decoration-none">
                        <strong>{$comment->getUser()->getUsername()|escape}</strong>
                    </a>
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