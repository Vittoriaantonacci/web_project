<?php
/* Smarty version 5.5.1, created on 2025-07-12 15:10:19
  from 'file:error.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68725ebb2644b9_78229061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '868d1cda2351afc30d6a10f9f56377729ac9e547' => 
    array (
      0 => 'error.tpl',
      1 => 1752325812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68725ebb2644b9_78229061 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_164687396768725ebb2597f2_18520122', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_109091214868725ebb262580_36595154', "body");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_164687396768725ebb2597f2_18520122 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Errore - Recipeek<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_109091214868725ebb262580_36595154 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-5">
    <h1>Errore</h1>
    <p><?php echo $_smarty_tpl->getValue('error');?>
</p>
</div>
<?php
}
}
/* {/block "body"} */
}
