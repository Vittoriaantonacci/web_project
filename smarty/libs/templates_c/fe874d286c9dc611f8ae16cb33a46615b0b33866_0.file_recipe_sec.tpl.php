<?php
/* Smarty version 5.5.1, created on 2025-07-07 12:34:40
  from 'file:recipe_sec.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686ba2c0abaa82_42615617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe874d286c9dc611f8ae16cb33a46615b0b33866' => 
    array (
      0 => 'recipe_sec.tpl',
      1 => 1751884476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686ba2c0abaa82_42615617 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1044290388686ba2c0a963b3_04831791', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1205906852686ba2c0a9bd51_91488343', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_280240998686ba2c0ab9f74_87888012', "script");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_1044290388686ba2c0a963b3_04831791 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Le tue ricette<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1205906852686ba2c0a9bd51_91488343 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-outline-primary tab-btn active" data-target="#saved-posts">📌 Ricette Salvate</button>
            <button class="btn btn-outline-primary tab-btn" data-target="#created-posts">📝 Ricette Create</button>
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
" class="text-decoration-none text-dark">
                        <div class="styled-card mb-3">
                            <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            <p class="text-muted small">Creato da: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        </div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="text-muted">Nessun post salvato.</p>
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
" class="text-decoration-none text-dark">
                        <div class="styled-card mb-3">
                            <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            <p class="text-muted small">Creato da: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getCreator()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        </div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="text-muted">Non hai ancora creato nessun post.</p>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_280240998686ba2c0ab9f74_87888012 extends \Smarty\Runtime\Block
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
