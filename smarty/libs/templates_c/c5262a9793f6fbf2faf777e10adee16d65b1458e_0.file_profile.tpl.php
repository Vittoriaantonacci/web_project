<?php
/* Smarty version 5.5.1, created on 2025-06-26 20:03:09
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685d8b5d915e64_33279372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5262a9793f6fbf2faf777e10adee16d65b1458e' => 
    array (
      0 => 'profile.tpl',
      1 => 1750960987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685d8b5d915e64_33279372 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Profilo di <?php if ($_smarty_tpl->getValue('profile')->getNickname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></title>

    <!-- Bootstrap CSS per uno stile coerente -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .profile-section {
            margin-bottom: 20px;
        }
        .followed-users {
            display: none;
            margin-top: 15px;
        }
        .followed-users.visible {
            display: block;
        }
        button {
            cursor: pointer;
        }
    </style>

    <?php echo '<script'; ?>
>
        function toggleFollowed() {
            const section = document.getElementById('followed-users-section');
            section.classList.toggle('visible');
        }
    <?php echo '</script'; ?>
>
</head>
<body class="container py-4">

    <div class="profile-section">
        <h1>Profilo di <?php if ($_smarty_tpl->getValue('profile')->getNickname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></h1>
        <p><strong>Nome:</strong> <?php if ($_smarty_tpl->getValue('profile')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?> <?php if ($_smarty_tpl->getValue('profile')->getSurname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></p>
        <p><strong>Username:</strong> <?php if ($_smarty_tpl->getValue('profile')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></p>
        <p><strong>Biografia:</strong> <?php if ($_smarty_tpl->getValue('profile')->getBiography()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getBiography(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></p>
        <?php if ($_smarty_tpl->getValue('profile')->getProPic()) {?>
            <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getProPic()->getPath(), ENT_QUOTES, 'UTF-8', true);?>
" alt="Immagine profilo" width="150" class="img-thumbnail" />
        <?php }?>
    </div>

    <div class="profile-section">
        <h2>Preferiti</h2>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('favorites')) > 0) {?>
            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('favorites'), 'recipe');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach0DoElse = false;
?>
                    <li><?php if ($_smarty_tpl->getValue('recipe')->getTitle()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getTitle(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p>Non ci sono preferiti.</p>
        <?php }?>
    </div>

    <div class="profile-section">
        <button class="btn btn-secondary" onclick="toggleFollowed()">Seguiti</button>

        <div id="followed-users-section" class="followed-users">
            <h2>Utenti Seguiti</h2>
            <?php if ((true && ($_smarty_tpl->hasVariable('followedUsers') && null !== ($_smarty_tpl->getValue('followedUsers') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('followedUsers')) > 0) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('followedUsers'), 'user');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach1DoElse = false;
?>
                        <li>
                            <?php if ($_smarty_tpl->getValue('user')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                            <?php if ($_smarty_tpl->getValue('user')->getSurname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                            (
                            <?php if ($_smarty_tpl->getValue('user')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                            )
                        </li>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>
            <?php } else { ?>
                <p>Non segui nessun utente.</p>
            <?php }?>
        </div>
    </div>

    <!-- Sezione pulsante per creare un meal plan -->
    <div class="profile-section">
        <form action="/mealplan/create" method="get">
            <button type="submit" class="btn btn-primary">Crea Meal Plan</button>
        </form>
    </div>

    <!-- Sezione pulsante per visualizzare i meal plan creati -->
    <div class="profile-section">
        <form action="/mealplan/list" method="get">
            <input type="hidden" name="user" value="<?php echo $_smarty_tpl->getValue('profile')->getIdUser();?>
" />
            <button type="submit" class="btn btn-outline-primary">Visualizza i miei Meal Plan</button>
        </form>
    </div>

</body>
</html>
<?php }
}
