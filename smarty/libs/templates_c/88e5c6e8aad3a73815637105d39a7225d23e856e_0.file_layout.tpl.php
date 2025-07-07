<?php
/* Smarty version 5.5.1, created on 2025-07-07 12:05:16
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686b9bdc2aa844_46515901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88e5c6e8aad3a73815637105d39a7225d23e856e' => 
    array (
      0 => 'layout.tpl',
      1 => 1751882707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686b9bdc2aa844_46515901 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_26319914686b9bdc2a1962_00592784', "title");
?>
</title>

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

      <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1604332182686b9bdc2a7128_75005209', "body");
?>

    </div>

    <!-- Sidebar Destra -->
    <div id="sidebarRight" class="collapse d-md-block col-auto col-md-3 sidebar-right">
      <div class="p-3">
        <h5>Il tuo profilo</h5>
      </div>
      <ul class="nav flex-column px-3">
        <li class="nav-item"><a class="nav-link" href="/recipeek/Profile/profile">👤 Profilo</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Post/create">➕ Nuovo Post</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Post/yourPosts"> Your Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Recipe/yourRecipes">➕ Your Recipes</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipeek/Recipe/create">➕ New Recipe</a></li>
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
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1587978662686b9bdc2a7a29_40272490', "script");
?>


</body>
</html><?php }
/* {block "title"} */
class Block_26319914686b9bdc2a1962_00592784 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Recipeek<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1604332182686b9bdc2a7128_75005209 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_1587978662686b9bdc2a7a29_40272490 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
}
}
/* {/block "script"} */
}
