<?php
/* Smarty version 5.5.1, created on 2025-06-27 10:39:49
  from 'file:homePage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685e58d59fb0b9_58378701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14fda0aa01694e2fec01347e05de3cf4898ce0f4' => 
    array (
      0 => 'homePage.tpl',
      1 => 1751013587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685e58d59fb0b9_58378701 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1891464635685e58d59eb2d9_09413799', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1232613215685e58d59f08c8_14942850', "body");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_1891464635685e58d59eb2d9_09413799 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Home - Recipeek<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1232613215685e58d59f08c8_14942850 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<!-- Filtro -->
<div class="mb-4">
  <form method="get" action="/recipeek/User/home">
    <div class="input-group">
      <input type="text" name="filter" class="form-control" placeholder="Cerca tra i post..." value="<?php echo $_smarty_tpl->getValue('filter');?>
">
      <button class="btn btn-outline-secondary" type="submit">Filtra</button>
    </div>
  </form>
</div>

<!-- Lista Post -->
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
  <div class="card post-card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $_smarty_tpl->getValue('post')[0]->getTitle();?>
</h5>
      <h6 class="card-subtitle mb-2 text-muted">di <?php echo $_smarty_tpl->getValue('post')[0]->getProfile()->getUsername();?>
</h6>
      <p class="card-text"><?php echo $_smarty_tpl->getValue('post')[0]->getDescription();?>
</p>
      <p class="text-muted small">Creato il: <?php echo $_smarty_tpl->getValue('post')[0]->getCreationTimeStr();?>
</p>
      <a href="/recipeek/Post/view/<?php echo $_smarty_tpl->getValue('post')[0]->getIdPost();?>
" class="btn btn-sm btn-outline-primary">Visualizza</a>
    </div>
  </div>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "body"} */
}
