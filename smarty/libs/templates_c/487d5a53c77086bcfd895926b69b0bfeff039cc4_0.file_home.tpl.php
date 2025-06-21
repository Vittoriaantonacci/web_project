<?php
/* Smarty version 5.5.1, created on 2025-06-21 18:15:13
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6856da91ea5408_29427733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '487d5a53c77086bcfd895926b69b0bfeff039cc4' => 
    array (
      0 => 'home.tpl',
      1 => 1750522510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6856da91ea5408_29427733 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Benvenuto su Recipeek!</h1>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
        <div class="post">
            <h2><?php echo $_smarty_tpl->getValue('post')[0]->getTitle();?>
</h2>
            <p><strong>Categoria:</strong> <?php echo $_smarty_tpl->getValue('post')[0]->getCategory();?>
</p>
            <p><strong>Descrizione:</strong> <?php echo $_smarty_tpl->getValue('post')[0]->getDescription();?>
</p>
            <p><strong>Creato il:</strong> <?php echo $_smarty_tpl->getValue('post')[0]->getCreationTimeStr();?>
</p>
            <p><strong>Autore (profilo ID):</strong> <?php echo $_smarty_tpl->getValue('post')[0]->getProfile()->getIdUser();?>
</p>

            <p><a href="/Agora/Post/visit/<?php echo $_smarty_tpl->getValue('post')[0]->getIdPost();?>
">Vai al post</a></p>
            <hr />
        </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

</body>
</html><?php }
}
