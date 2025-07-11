<?php
/* Smarty version 5.5.1, created on 2025-07-12 01:23:39
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68719cfb3e0165_91741260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88e5c6e8aad3a73815637105d39a7225d23e856e' => 
    array (
      0 => 'layout.tpl',
      1 => 1752275939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68719cfb3e0165_91741260 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_201432746768719cfb3df505_47581102', "title");
?>
</title>

  <!-- Bootstrap & Custom Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/public/assets/style.css" />
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

      <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_129833571568719cfb3dfa33_33531911', "body");
?>

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

<!-- JS Bootstrap + Custom -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/recipeek/public/assets/script.js"><?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_98579612068719cfb3dfe68_01628471', "script");
?>


</body>
</html><?php }
/* {block "title"} */
class Block_201432746768719cfb3df505_47581102 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Recipeek<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_129833571568719cfb3dfa33_33531911 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_98579612068719cfb3dfe68_01628471 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
}
}
/* {/block "script"} */
}
