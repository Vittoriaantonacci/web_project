<?php
/* Smarty version 5.5.1, created on 2025-07-11 01:32:10
  from 'file:meal_plan.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68704d7a205e89_53443692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bc82315ab4e76230d55ecdfe76577a4b0226ebd' => 
    array (
      0 => 'meal_plan.tpl',
      1 => 1752190173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68704d7a205e89_53443692 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13796608568704d7a1cdab2_82696337', 'body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_70504889868704d7a205627_06005629', 'script');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block 'body'} */
class Block_13796608568704d7a1cdab2_82696337 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
            <h1 class="display-4"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getNameMealPlan(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <p class="lead md-1"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <p class="text-muted"><strong>Categoria:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getCategory(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php if ($_smarty_tpl->getValue('mealPlan')->getCreator()) {?>
                <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-3 row w-100">
                    <div class="col-12 col-md-auto">
                        <a href="/recipeek/Profile/visitProfile/<?php echo $_smarty_tpl->getValue('mealPlan')->getCreator()->getIdUser();?>
" class="card text-decoration-none">
                            <div class="d-flex align-items-center">
                                <?php if ($_smarty_tpl->getValue('mealPlan')->getCreator()->getProPic()) {?>
                                    <img src="/recipeek/public/uploads/propic/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getCreator()->getProPic()->getPath(), ENT_QUOTES, 'UTF-8', true);?>
" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                <?php } else { ?>
                                    <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                <?php }?>
                                <div class="ms-3 card-body">
                                    <p class="mb-0 fw-bold"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getCreator()->getNickname(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                    <p class="mb-1">@<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php if ($_smarty_tpl->getValue('isSaved') !== null) {?>
                        <div class="col-12 col-md-auto mt-3 mt-md-0 flex-shrink-0">
                            <button class="btn btn-save <?php if ($_smarty_tpl->getValue('isSaved')) {?>btn-warning<?php } else { ?>btn-outline-warning<?php }?>"
                                    data-action="<?php if ($_smarty_tpl->getValue('isSaved')) {?>removeSave<?php } else { ?>addSave<?php }?>"
                                    data-mealplan-id="<?php echo $_smarty_tpl->getValue('mealPlan')->getIdMealPlan();?>
">
                                🔖 <?php if ($_smarty_tpl->getValue('isSaved')) {?>Rimuovi dai salvati<?php } else { ?>Salva piano<?php }?>
                            </button>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
        </div>
    </div>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('meals'), 'mealList', false, 'mealtime');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealtime')->value => $_smarty_tpl->getVariable('mealList')->value) {
$foreach0DoElse = false;
?>
        <div class="tab-content mb-5">
            <h3><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('mealtime'));?>
</h3>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('mealList'), 'meal');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('meal')->value) {
$foreach1DoElse = false;
?>
                <div class="card text-decoration-none mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('meal')->getName(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                        <small class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('meal')->getServing()->toString(), ENT_QUOTES, 'UTF-8', true);?>
</small>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</div>
<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_70504889868704d7a205627_06005629 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/btn_state.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
