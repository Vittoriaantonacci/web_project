<?php
/* Smarty version 5.5.1, created on 2025-07-12 01:25:51
  from 'file:filter.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68719d7fc846d0_16256681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14ca45c570fffabc91ad13763dea88ab7219fb44' => 
    array (
      0 => 'filter.tpl',
      1 => 1752275944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68719d7fc846d0_16256681 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_23486063168719d7fc58028_63475424', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_158779590268719d7fc5a4a7_75257242', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_178116881868719d7fc84270_37438342', "script");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_23486063168719d7fc58028_63475424 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Home - Recipeek<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_158779590268719d7fc5a4a7_75257242 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <!-- Category Filter -->
        <form id="category-filter-form" class="mb-3 text-center">
            <label for="category-select" class="form-label fw-bold">Filtra per categoria:</label>
            <select id="category-select" name="category" class="form-select w-auto d-inline-block">
                <option value="" disabled selected>Seleziona una categoria</option>
                <option value="antipasto">Antipasto</option>
                <option value="primo">Primo</option>
                <option value="secondo">Secondo</option>
                <option value="dolce">Dolce</option>
                <option value="bevanda">Bevanda</option>
                <?php if ($_smarty_tpl->getValue('isVip')) {?>
                    <option value="antipasto #Fit">Antipasto #Fit</option>
                    <option value="primo #Fit">Primo #Fit</option>
                    <option value="secondo #Fit">Secondo #Fit</option>
                    <option value="dolce #Fit">Dolce #Fit</option>
                    <option value="bevanda #Fit">Bevanda #Fit</option>
                    <option value="contorno #Fit">Contorno #Fit</option>
                    <option value="salsa #Fit">Salsa #Fit</option>
                    <option value="snack #Fit">Snack #Fit</option>
                    <option value="colazione #Fit">Colazione #Fit</option>
                <?php }?>
            </select>
        </form>

        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#tab-posts">Post</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#tab-recipes">Recipe</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#tab-mealplans">MealPlan</button>
        </div>

        <!-- Sezione: Post -->
        <div id="tab-posts" class="tab-content fade show">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('posts')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
                  <a href="/recipeek/Post/view/<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
" class="card text-decoration-none" data-category="<?php echo mb_strtolower((string) $_smarty_tpl->getValue('post')->getCategory(), 'UTF-8');?>
">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $_smarty_tpl->getValue('post')->getTitle();?>
</h5>
                      <h6 class="card-subtitle mb-2">di <?php echo $_smarty_tpl->getValue('post')->getProfile()->getUsername();?>
</h6>
                      <p class="card-text"><?php echo $_smarty_tpl->getValue('post')->getDescription();?>
</p>
                      <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getValue('post')->getCreationTimeStr();?>
</p>
                    </div>
                  </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Non ci sono post di utenti che segui.</p>
            <?php }?>
        </div>

        <!-- Sezione: Recipe -->
        <div id="tab-recipes" class="tab-content fade" style="display: none;">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('recipes')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recipes'), 'recipe');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach1DoElse = false;
?>
                  <a href="/recipeek/Recipe/view/<?php echo $_smarty_tpl->getValue('recipe')->getIdRecipe();?>
" class="card text-decoration-none" data-category="<?php echo mb_strtolower((string) $_smarty_tpl->getValue('recipe')->getCategory(), 'UTF-8');?>
">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $_smarty_tpl->getValue('recipe')->getTitle();?>
</h5>
                      <h6 class="card-subtitle mb-2">di <?php echo $_smarty_tpl->getValue('recipe')->getProfile()->getUsername();?>
</h6>
                      <p class="card-text"><?php echo $_smarty_tpl->getValue('recipe')->getDescription();?>
</p>
                      <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getValue('recipe')->getCreationTimeStr();?>
</p>
                    </div>
                  </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Nessun post trovato, prova a ricaricare la pagina.</p>
            <?php }?>
        </div>

        <!-- Sezione: MealPlan -->
        <div id="tab-mealplans" class="tab-content fade" style="display: none;">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('mealPlans')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('mealPlans'), 'mealPlan');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealPlan')->value) {
$foreach2DoElse = false;
?>
                  <a href="/recipeek/MealPlan/view/<?php echo $_smarty_tpl->getValue('mealPlan')->getIdMealPlan();?>
" class="card text-decoration-none" data-category="<?php echo mb_strtolower((string) $_smarty_tpl->getValue('mealPlan')->getCategory(), 'UTF-8');?>
">
                    <div class="card-body">
                      <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getNameMealPlan(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                      <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                      <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('mealPlan')->getCreationTime(),"%d/%m/%Y");?>
</p>
                    </div>
                  </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Nessun piano alimentare disponibile.</p>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_178116881868719d7fc84270_37438342 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/tab_btn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/recipeek/public/assets/upd_sec.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
