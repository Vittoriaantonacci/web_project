<?php
/* Smarty version 5.5.1, created on 2025-07-08 16:25:20
  from 'file:recipe.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686d2a50b13935_97045029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03d869ec92aef5ca31a43e55f690258cadc4e008' => 
    array (
      0 => 'recipe.tpl',
      1 => 1751984717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686d2a50b13935_97045029 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_658072011686d2a50ae6d81_27621894', 'body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1312207900686d2a50b10e98_91928567', 'script');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block 'body'} */
class Block_658072011686d2a50ae6d81_27621894 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <?php if ($_smarty_tpl->getValue('recipe')->getImage()) {?>
                <img src="<?php echo $_smarty_tpl->getValue('recipe')->getImage()->getImagePath();?>
" class="img-fluid rounded shadow" alt="Immagine ricetta">
            <?php }?>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h1 class="display-4"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <p class="lead text-muted"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php if ($_smarty_tpl->getValue('recipe')->getCreator()) {?>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <p class="mb-0 fw-bold"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getNickname(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        <p class="text-muted">@<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                    </div>
                    <?php if ($_smarty_tpl->getValue('isSaved') !== null) {?>
                        <div class="mt-3">
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

    <div class="row mb-4">
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

    <div class="mb-5">
        <h3>Ingredienti</h3>
        <ul class="list-group list-group-flush">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recipe')->getIngredients(), 'ingredient');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ingredient')->value) {
$foreach0DoElse = false;
?>
                <a href="/recipeek/Meal/view?id=<?php echo $_smarty_tpl->getValue('ingredient')->getId();?>
" class="text-decoration-none">
                    <li class="list-group-item list-group-item-action">
                        <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('ingredient')->getName(), ENT_QUOTES, 'UTF-8', true);?>

                    </li>
                </a>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
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
class Block_1312207900686d2a50b10e98_91928567 extends \Smarty\Runtime\Block
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
