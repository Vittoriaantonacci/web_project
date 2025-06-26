<?php
/* Smarty version 5.5.1, created on 2025-06-24 19:45:41
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685ae4458c7785_51168798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5262a9793f6fbf2faf777e10adee16d65b1458e' => 
    array (
      0 => 'profile.tpl',
      1 => 1750772146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685ae4458c7785_51168798 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo di <?php echo $_smarty_tpl->getValue('profile')['username'];?>
</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 2rem;
        }
        .profile-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            margin-top: 0;
        }
        .info {
            margin-top: 1rem;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Profilo di <?php echo $_smarty_tpl->getValue('profile')['username'];?>
</h1>
    <p><strong>Nome:</strong> <?php echo $_smarty_tpl->getValue('profile')['name'];?>
</p>
    <p><strong>Cognome:</strong> <?php echo $_smarty_tpl->getValue('profile')['surname'];?>
</p>
    <p><strong>Nickname:</strong> <?php echo $_smarty_tpl->getValue('profile')['nickname'];?>
</p>
    <p><strong>Data di nascita:</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('profile')['birthDate'],"%d/%m/%Y");?>
</p>
    <p><strong>Sesso:</strong> <?php echo $_smarty_tpl->getValue('profile')['gender'];?>
</p>
    <p><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('profile')['email'];?>
</p>
    <p><strong>VIP:</strong> <?php if ($_smarty_tpl->getValue('profile')['vip']) {?>Sì<?php } else { ?>No<?php }?></p>
    <p><strong>Biografia:</strong> <?php echo $_smarty_tpl->getValue('profile')['biography'];?>
</p>
    <p><strong>Informazioni aggiuntive:</strong> <?php echo $_smarty_tpl->getValue('profile')['info'];?>
</p>
</div>

</body>
</html><?php }
}
