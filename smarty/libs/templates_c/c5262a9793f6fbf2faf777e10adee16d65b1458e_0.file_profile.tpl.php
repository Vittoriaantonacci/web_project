<?php
/* Smarty version 5.5.1, created on 2025-06-30 16:44:09
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6862a2b908fbc3_95734801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5262a9793f6fbf2faf777e10adee16d65b1458e' => 
    array (
      0 => 'profile.tpl',
      1 => 1751294642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6862a2b908fbc3_95734801 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8451864876862a2b905a641_79444373', "body");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "body"} */
class Block_8451864876862a2b905a641_79444373 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            <?php if ($_smarty_tpl->getValue('profile')->getProPic()) {?>
                <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getProPic()->getPath(), ENT_QUOTES, 'UTF-8', true);?>
" alt="Immagine profilo" class="img-fluid rounded-circle border" style="max-width: 150px;">
            <?php }?>
        </div>
        <div class="col-md-9">
            <h2 class="mb-0">
                <?php if ($_smarty_tpl->getValue('profile')->getNickname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </h2>
            <p class="mb-1 text-muted">@<?php if ($_smarty_tpl->getValue('profile')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></p>
            <p class="mb-1">
                <strong>Nome:</strong> <?php if ($_smarty_tpl->getValue('profile')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                <?php if ($_smarty_tpl->getValue('profile')->getSurname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </p>
            <p><strong>Biografia:</strong> <?php if ($_smarty_tpl->getValue('profile')->getBiography()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getBiography(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Preferiti
                </div>
                <div class="card-body">
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('favorites')) > 0) {?>
                        <ul class="list-group list-group-flush">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('favorites'), 'recipe');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach0DoElse = false;
?>
                                <li class="list-group-item"><?php if ($_smarty_tpl->getValue('recipe')->getTitle()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getTitle(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?></li>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php } else { ?>
                        <p class="text-muted">Non ci sono preferiti.</p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-light" type="button" onclick="toggleFollowTab('followed')">Seguiti</button>
                        <button class="btn btn-sm btn-light" type="button" onclick="toggleFollowTab('followers')">Follower</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="followed-users-section">
                        <?php if ((true && ($_smarty_tpl->hasVariable('followed') && null !== ($_smarty_tpl->getValue('followed') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('followed')) > 0) {?>
                            <ul class="list-group list-group-flush">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('followed'), 'user');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach1DoElse = false;
?>
                                    <li class="list-group-item">
                                        <?php if ($_smarty_tpl->getValue('user')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                        <?php if ($_smarty_tpl->getValue('user')->getSurname()) {?> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                        (@<?php if ($_smarty_tpl->getValue('user')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>)
                                    </li>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php } else { ?>
                            <p class="text-muted">Non segui nessun utente.</p>
                        <?php }?>
                    </div>
                    <div id="followers-users-section" style="display: none;">
                        <?php if ((true && ($_smarty_tpl->hasVariable('followers') && null !== ($_smarty_tpl->getValue('followers') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('followers')) > 0) {?>
                            <ul class="list-group list-group-flush">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('followers'), 'user');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach2DoElse = false;
?>
                                    <li class="list-group-item">
                                        <?php if ($_smarty_tpl->getValue('user')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                        <?php if ($_smarty_tpl->getValue('user')->getSurname()) {?> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                        (@<?php if ($_smarty_tpl->getValue('user')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>)
                                    </li>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php } else { ?>
                            <p class="text-muted">Nessun follower al momento.</p>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="/mealplan/create" method="get">
                <button type="submit" class="btn btn-outline-primary w-100">Crea Meal Plan</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="/mealplan/list" method="get">
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->getValue('profile')->getIdUser();?>
" />
                <button type="submit" class="btn btn-outline-success w-100">Visualizza i miei Meal Plan</button>
            </form>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    function toggleFollowTab(tab) {
        const followed = document.getElementById('followed-users-section');
        const followers = document.getElementById('followers-users-section');
        if (tab === 'followed') {
            followed.style.display = 'block';
            followers.style.display = 'none';
        } else {
            followed.style.display = 'none';
            followers.style.display = 'block';
        }
    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "body"} */
}
