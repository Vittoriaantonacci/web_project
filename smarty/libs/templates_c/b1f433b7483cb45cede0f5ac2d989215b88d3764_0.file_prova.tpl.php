<?php
/* Smarty version 5.5.1, created on 2025-06-19 18:12:10
  from 'file:prova.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685436da6f8ef1_06189664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1f433b7483cb45cede0f5ac2d989215b88d3764' => 
    array (
      0 => 'prova.tpl',
      1 => 1750347950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685436da6f8ef1_06189664 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html>
<head>
    <title>Post di Test</title>
</head>
<body>
    <h1><?php echo $_smarty_tpl->getValue('titolo');?>
</h1>
    <p><?php echo $_smarty_tpl->getValue('contenuto');?>
</p>
</body>
</html><?php }
}
