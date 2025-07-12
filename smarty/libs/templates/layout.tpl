<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="/recipeek/public/default/logo.png" />
  <title>{block name="title"}Recipeek{/block}</title>

  <!-- Bootstrap & Custom Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/recipeek/public/assets/style.css" />
</head>
<body>

<div class="container-fluid">
  <div class="row flex-nowrap">

    <!-- Sidebar Sinistra -->
    <div id="sidebarLeft" class="collapse d-md-block col-auto col-md-3 sidebar-left">
      <div class="p-3 text-center">
        <h4 class="text-center">Recipeek</h4>
        <img src="/recipeek/public/default/logo.png" class="shadow profile-pic-sm" alt="Immagine profilo">
      </div>
      <ul class="nav flex-column px-3">
        <li class="nav-item"><a class="nav-link" href="/recipeek/User/homePage"><i class="bi bi-house-door me-2"></i>For You</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/User/filter"><i class="bi bi-funnel me-2"></i>Filtra</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Post/create"><i class="bi bi-file-earmark-plus me-2"></i>Nuovo Post</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Recipe/create"><i class="bi bi-journal-plus me-2"></i>New Recipe</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/MealPlan/create"><i class="bi bi-calendar-plus me-2"></i>New Meal Plan</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/User/logout"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
      </ul>
    </div>

    <!-- Contenuto principale -->
    <div class="col main-content">
      <div class="topbar d-md-none d-flex justify-content-between w-100 mb-2 px-3">
        <button id="toggleSidebarLeft" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarLeft">☰ Info</button>
        <button id="toggleSidebarRight" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarRight">☰ Profile</button>
      </div>

      {block name="body"}{/block}

      <!-- Cookie Consent Modal -->
      <div class="modal fade" id="cookieConsentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-dark text-white">
            <div class="modal-header">
              <h5 class="modal-title">Consenti i cookie?</h5>
            </div>
            <div class="modal-body">
              <p>Ti informiamo che questo sito utilizza cookie per migliorare l’esperienza di navigazione. (Cookie tecnici e di sessione)</p>
              <p>Per maggiori informazioni, consulta la <a href="https://www.garanteprivacy.it/web/guest/home/docweb/-/docweb-display/docweb/9677876" class="text-white">Privacy Policy</a>.</p>
            </div>
            <div class="modal-footer">
              <button id="cookieAccept" class="btn btn-success">Accetta</button>
              <button id="cookieReject" class="btn btn-outline-light" data-bs-dismiss="modal">Rifiuta</button>
            </div>
          </div>
        </div>
      </div>
 
    </div>

    <!-- Sidebar Destra -->
    <div id="sidebarRight" class="collapse d-md-block col-auto col-md-3 sidebar-right">
      <div class="p-3">
        <h4>Il tuo profilo</h4>
      </div>
      <ul class="nav flex-column px-3">
        <li class="nav-item"><a class="nav-link" href="/recipeek/Profile/profile"><i class="bi bi-person me-2"></i><span>Profilo</span></a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Post/yourPosts"><i class="bi bi-stickies me-2"></i><span>Your Posts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Recipe/yourRecipes"><i class="bi bi-journal-text me-2"></i><span>Your Recipes</span></a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/MealPlan/yourMealPlans"><i class="bi bi-calendar-week me-2"></i><span>Your Meal Plans</span></a></li>
      </ul>
    </div>
    
</div>

  </div>
</div>

<!-- JS Bootstrap + Custom -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/recipeek/public/assets/script.js"></script>
<script src="/recipeek/public/assets/cookie_mdl.js"></script>
{block name="script"}{/block}

</body>
</html>