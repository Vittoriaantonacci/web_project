<?php
/* Smarty version 5.5.1, created on 2025-07-10 16:47:23
  from 'file:recipe.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686fd27b266d57_43864676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03d869ec92aef5ca31a43e55f690258cadc4e008' => 
    array (
      0 => 'recipe.tpl',
      1 => 1752158839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686fd27b266d57_43864676 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_41706172686fd27b24a7d7_70846695', 'body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_786149204686fd27b2665d8_80707036', 'script');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block 'body'} */
class Block_41706172686fd27b24a7d7_70846695 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <?php if ($_smarty_tpl->getValue('recipe')->getImage()) {?>
                <img src="/recipeek/public/uploads/recipes/<?php echo $_smarty_tpl->getValue('recipe')->getImage()->getImagePath();?>
" class="img-fluid rounded shadow fixed-post-img" alt="Immagine ricetta">
            <?php } else { ?>
                <img src="/recipeek/public/default/recipe_ph.png" class="img-fluid rounded shadow fixed-post-img" alt="Immagine ricetta">
            <?php }?>
        </div>
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 class="display-4"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <p class="lead md-1"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php if ($_smarty_tpl->getValue('recipe')->getCreator()) {?>
                <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-3 row w-100">
                    <div class="col-12 col-md-auto">
                        <a href="/recipeek/Profile/visitProfile/<?php echo $_smarty_tpl->getValue('recipe')->getCreator()->getIdUser();?>
" class="card text-decoration-none">
                            <div class="d-flex align-items-center">
                                <?php if ($_smarty_tpl->getValue('recipe')->getCreator()->getProPic()) {?>
                                    <img src="/recipeek/public/uploads/propic/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getProPic()->getPath(), ENT_QUOTES, 'UTF-8', true);?>
" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                <?php } else { ?>
                                    <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                <?php }?>
                                <div class="ms-3 card-body">
                                    <p class="mb-0 fw-bold"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getNickname(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                    <p class="mb-1">@<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php if ($_smarty_tpl->getValue('isSaved') !== null) {?>
                        <div class="col-12 col-md-auto mt-3 mt-md-0 flex-shrink-0">
                            <button class="btn btn-save <?php if ($_smarty_tpl->getValue('isSaved')) {?>btn-warning<?php } else { ?>btn-outline-warning<?php }?>"
                                    data-action="<?php if ($_smarty_tpl->getValue('isSaved')) {?>removeSave<?php } else { ?>addSave<?php }?>"
                                    data-recipe-id="<?php echo $_smarty_tpl->getValue('recipe')->getIdRecipe();?>
">
                                🔖 <?php if ($_smarty_tpl->getValue('isSaved')) {?>Rimuovi dai salvati<?php } else { ?>Salva ricetta<?php }?>
                            </button>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
        </div>
    </div>

    <div class="row mb-4 d-flex justify-content-between">
        <div class="col-md-4">
            <h5><i class="bi bi-clock"></i> Tempo di preparazione:</h5>
            <p><?php echo $_smarty_tpl->getValue('recipe')->getPreparationTime();?>
 min</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-hourglass-split"></i> Tempo di cottura:</h5>
            <p><?php echo $_smarty_tpl->getValue('recipe')->getCookingTime();?>
 min</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-box"></i> Porzione:</h5>
            <p><?php echo $_smarty_tpl->getValue('recipe')->getGramsOnePortion();?>
 g</p>
        </div>
    </div>

    <div class="tab-content mb-5">
        <h3>Ingredienti</h3>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recipe')->getIngredients(), 'ingredient');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ingredient')->value) {
$foreach0DoElse = false;
?>
            <div class="card text-decoration-none">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('ingredient')->getName(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                    <small class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('ingredient')->getServing()->toString(), ENT_QUOTES, 'UTF-8', true);?>
</small>
                </div>
            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>

    <div class="mb-5">
        <h3>Procedimento</h3>
        <p class="fs-5"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getInfos(), ENT_QUOTES, 'UTF-8', true);?>
</p>
    </div>
</div>
<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_786149204686fd27b2665d8_80707036 extends \Smarty\Runtime\Block
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
