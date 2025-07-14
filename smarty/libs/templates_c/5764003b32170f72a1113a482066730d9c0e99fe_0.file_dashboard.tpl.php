<?php
/* Smarty version 5.5.1, created on 2025-07-14 16:47:46
  from 'file:dashboard.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_687518929322c1_37818673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5764003b32170f72a1113a482066730d9c0e99fe' => 
    array (
      0 => 'dashboard.tpl',
      1 => 1752499169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_687518929322c1_37818673 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="/recipeek/public/default/logo.png" />
  <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_191055277268751892913e09_07854971', "title");
?>
</title>

  <!-- Bootstrap & Custom Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/recipeek/public/assets/style.css" />
</head>
<body>

<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center py-3 px-4 mb-4" style="background-color: #1e1e1e; border-radius: 1rem;">
        <h3 class="mb-0">Moderatore: <?php echo $_smarty_tpl->getValue('mod')->getUsername();?>
</h3>
        <div>
          <a href="/recipeek/Mod/dashboard" class="btn btn-outline-secondary me-2">Dashboard</a>
          <a href="/recipeek/Mod/analytics" class="btn btn-outline-primary me-2">Analisi</a>
          <a href="/recipeek/User/logout" class="btn btn-outline-danger">Logout</a>
        </div>
      </div>
    
      <div class="row">
        <!-- Sezione utenti -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-secondary">
              Utenti
            </div>
            <div class="card-body">
              <input type="text" class="form-control mb-3" placeholder="Cerca profilo..." id="user-filter-select">
                <div id="tab-users" class="tab-content fade show" data-link-prefix="/recipeek/User/dashboard/">
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('profiles')) > 0) {?>
                        <a href="/recipeek/User/dashboard/<?php echo $_smarty_tpl->getValue('profiles')->getIdUser();?>
" class="text-decoration-none text-reset">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="card-title">@<?php echo $_smarty_tpl->getValue('profiles')->getUsername();?>
</h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_smarty_tpl->getValue('profiles')->getName();?>
 <?php echo $_smarty_tpl->getValue('profiles')->getSurname();?>
</h6>
                                </div>
                            </div>
                        </a>
                    <?php } else { ?>
                        <p class="card-text">Nessun profilo selezionato.</p>
                    <?php }?>
                </div>
            </div>
          </div>
        </div>
            
        <!-- Sezione contenuti -->
        <div class="col-md-8">
          <div class="card">
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('profile')) === 0) {?>
            <div class="card-header bg-primary">
              Nessun profilo selezionato.
            </div>
        <?php } else { ?>
            <div class="card-header bg-primary">
              Contenuti di <?php echo $_smarty_tpl->getValue('profile')->getUsername();?>

            </div>
            <div class="card-body">
              <h5>Post</h5>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('profile')->getPosts(), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <span><?php echo $_smarty_tpl->getValue('post')->getTitle();?>
</span>
                    <form method="post" action="/recipeek/Post/removePost/<?php echo $_smarty_tpl->getValue('profile')->getIdUser();?>
">
                      <input type="hidden" name="postId" value="<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
">
                      <button type="submit" class="btn btn-outline-danger btn-sm">Rimuovi</button>
                    </form>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            
              <h5 class="mt-4">Ricette</h5>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('profile')->getRecipes(), 'recipe');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach1DoElse = false;
?>
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <span><?php echo $_smarty_tpl->getValue('recipe')->getNameRecipe();?>
</span>
                    <form method="post" action="/recipeek/Recipe/removeRecipe/<?php echo $_smarty_tpl->getValue('profile')->getIdUser();?>
">
                      <input type="hidden" name="recipeId" value="<?php echo $_smarty_tpl->getValue('recipe')->getIdRecipe();?>
">
                      <button type="submit" class="btn btn-outline-danger btn-sm">Rimuovi</button>
                    </form>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            
              <h5 class="mt-4">Meal Plan</h5>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('profile')->getMealPlans(), 'mealPlan');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealPlan')->value) {
$foreach2DoElse = false;
?>
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <span><?php echo $_smarty_tpl->getValue('mealPlan')->getNameMealPlan();?>
</span>
                    <form method="post" action="/recipeek/MealPlan/removeMealPlan/<?php echo $_smarty_tpl->getValue('profile')->getIdUser();?>
">
                      <input type="hidden" name="mealPlanId" value="<?php echo $_smarty_tpl->getValue('mealPlan')->getIdMealPlan();?>
">
                      <button type="submit" class="btn btn-outline-danger btn-sm">Rimuovi</button>
                    </form>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>

</div>

  </div>
</div>

<!-- JS Bootstrap + Custom -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/recipeek/public/assets/upd_usr.js"><?php echo '</script'; ?>
>
</body>
</html>
    <?php }
/* {block "title"} */
class Block_191055277268751892913e09_07854971 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Recipeek<?php
}
}
/* {/block "title"} */
}
