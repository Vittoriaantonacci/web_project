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
      <h5 class="card-title">{$post[0]->getTitle()}</h5>
      <h6 class="card-subtitle mb-2 text-muted">di {$post[0]->getProfile()->getUsername()}</h6>
      <p class="card-text">{$post[0]->getDescription()}</p>
      <p class="text-muted small">Creato il: {$post[0]->getCreationTimeStr()}</p>
      <a href="/recipeek/Post/view/{$post[0]->getIdPost()}" class="btn btn-sm btn-outline-primary">Visualizza</a>
    </div>
  </div>
{/foreach}
{/block}