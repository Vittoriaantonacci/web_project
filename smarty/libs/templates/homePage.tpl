<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Recipeek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .sidebar-left {
      width: 250px;
      min-height: 100vh;
      border-right: 1px solid #dee2e6;
      position: fixed;
      left: 0;
      top: 0;
      padding-top: 1rem;
      background-color: #fff;
    }
    .sidebar-right {
      width: 300px;
      min-height: 100vh;
      border-left: 1px solid #dee2e6;
      position: fixed;
      right: 0;
      top: 0;
      padding-top: 1rem;
      background-color: #f8f9fa;
    }
    .main-content {
      margin-left: 260px;
      margin-right: 310px;
      padding: 2rem;
    }
    .post-card {
      margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>

<!-- Sidebar Sinistra -->
<div class="sidebar-left">
  <div class="text-center mb-4">
    <h4>Recipeek</h4>
  </div>
  <ul class="nav flex-column px-3">
    <li class="nav-item"><a class="nav-link" href="/recipeek/User/home">🏠 Home</a></li>
    <li class="nav-item"><a class="nav-link" href="/recipeek/User/profile">👤 Profilo</a></li>
    <li class="nav-item"><a class="nav-link" href="/recipeek/Post/create">➕ Nuovo Post</a></li>
    <li class="nav-item"><a class="nav-link" href="/recipeek/User/logout">🚪 Logout</a></li>
  </ul>
</div>

<!-- Sidebar Destra -->
<div class="sidebar-right">
  <div class="p-3">
    <h5>Il tuo profilo</h5>

  </div>
</div>

<!-- Contenuto Principale -->
<div class="main-content">
  <!-- Filtro in alto -->
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>