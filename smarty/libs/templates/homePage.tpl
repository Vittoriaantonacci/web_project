{extends file='layout.tpl'}

{block name="title"}Home - Recipeek{/block}

{block name="body"}
<!-- Filtro -->
<div class="mb-4">
  <form method="get" action="/recipeek/User/home">
    <div class="input-group">
      <input type="text" name="filter" class="form-control" placeholder="Cerca tra i post..." value="{$filter}">
      <button class="btn btn-outline-secondary" type="submit">Filtra</button>
    </div>
  </form>
</div>

<!-- Lista Post -->
{foreach from=$posts item=post}
  <div class="card post-card">
    <div class="card-body">
      <h5 class="card-title">{$post->getTitle()}</h5>
      <h6 class="card-subtitle mb-2 text-muted">di {$post->getProfile()->getUsername()}</h6>
      <p class="card-text">{$post->getDescription()}</p>
      <p class="text-muted small">Creato il: {$post->getCreationTimeStr()}</p>
      <a href="/recipeek/Post/view/{$post->getIdPost()}" class="btn btn-sm btn-outline-primary">Visualizza</a>
    </div>
  </div>
{/foreach}
{/block}