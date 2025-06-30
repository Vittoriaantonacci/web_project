<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{block name="title"}Recipeek{/block}</title>

  <!-- Bootstrap & Custom Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/recipeek/public/assets/style.css" />
</head>
<body>

<div class="container-fluid">
  <div class="row flex-nowrap">

    <!-- Sidebar Sinistra -->
    <div id="sidebarLeft" class="collapse d-md-block col-auto col-md-3 sidebar-left">
      <div class="p-3">
        <h4>Recipeek</h4>
      </div>
      <ul class="nav flex-column px-3">
        <li class="nav-item"><a class="nav-link" href="/recipeek/User/homePage">🏠 Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/User/logout">🚪 Logout</a></li>
      </ul>
    </div>

    <!-- Contenuto principale -->
    <div class="col main-content">
      <div class="topbar d-md-none d-flex justify-content-between w-100 mb-2 px-3">
        <button id="toggleSidebarLeft" class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarLeft">☰ Info</button>
        <button id="toggleSidebarRight" class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarRight">☰ Profile</button>
      </div>

      {block name="body"}{/block}
    </div>

    <!-- Sidebar Destra -->
    <div id="sidebarRight" class="collapse d-md-block col-auto col-md-3 sidebar-right">
      <div class="p-3">
        <h5>Il tuo profilo</h5>
      </div>
      <ul class="nav flex-column px-3">
        <li class="nav-item"><a class="nav-link" href="/recipeek/Profile/profile">👤 Profilo</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Post/create">➕ Nuovo Post</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Post/postSaved"> Your Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Recipe/recipeSaved">➕ Your Recipes</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- JS Bootstrap + Custom -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/recipeek/public/assets/script.js"></script>
{block name="script"}{/block}

</body>
</html>