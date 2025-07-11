<?php
/* Smarty version 5.5.1, created on 2025-07-11 11:15:46
  from 'file:recipe_sec.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6870d6421b63f2_81010629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe874d286c9dc611f8ae16cb33a46615b0b33866' => 
    array (
      0 => 'recipe_sec.tpl',
      1 => 1752223730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6870d6421b63f2_81010629 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9938988426870d64219d306_12635534', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12627737226870d6421a04e1_97221909', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12465413846870d6421b5d46_36567528', "script");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_9938988426870d64219d306_12635534 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Le tue ricette<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_12627737226870d6421a04e1_97221909 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#saved-posts">📌 Ricette Salvate</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#created-posts">📝 Ricette Create</button>
        </div>

        <!-- Sezione: Post Salvati -->
        <div id="saved-posts" class="tab-content fade show">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('savedRecipe')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('savedRecipe'), 'recipe');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach0DoElse = false;
?>
                    <a href="/recipeek/Recipe/view/<?php echo $_smarty_tpl->getValue('recipe')->getIdRecipe();?>
" class="card text-decoration-none">
                        <div class="card-body">
                            <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            <p class="mb-1 small">Creato da: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        </div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Nessun post salvato.</p>
            <?php }?>
        </div>

        <!-- Sezione: Post Creati -->
        <div id="created-posts" class="tab-content fade" style="display: none;">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('yourRecipe')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yourRecipe'), 'recipe');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach1DoElse = false;
?>
                    <a href="/recipeek/Recipe/view/<?php echo $_smarty_tpl->getValue('recipe')->getIdRecipe();?>
" class="card text-decoration-none">
                        <div class="card-body">
                            <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            <p class="mb-1 small">Creato da: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        </div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Non hai ancora creato nessun post.</p>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_12465413846870d6421b5d46_36567528 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/tab_btn.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
