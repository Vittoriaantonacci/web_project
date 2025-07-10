<?php
/* Smarty version 5.5.1, created on 2025-07-09 19:09:02
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686ea22eb19526_32867617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5262a9793f6fbf2faf777e10adee16d65b1458e' => 
    array (
      0 => 'profile.tpl',
      1 => 1752080939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686ea22eb19526_32867617 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1449791546686ea22eab9a73_88345222', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2064872661686ea22eb18d36_59966290', "script");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "body"} */
class Block_1449791546686ea22eab9a73_88345222 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            <?php if ($_smarty_tpl->getValue('profile')->getProPic()) {?>
                <img src="/recipeek/public/uploads/propic/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getProPic()->getPath(), ENT_QUOTES, 'UTF-8', true);?>
" class="img-fluid rounded shadow" alt="Immagine profilo">
            <?php } else { ?>
                <img src="/recipeek/public/default/profile_ph.png" class="img-fluid rounded shadow" alt="Immagine profilo">
            <?php }?>
        </div>
        <div class="col-md-9">
            <h2 class="mb-0">
                <?php if ($_smarty_tpl->getValue('profile')->getNickname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </h2>
            <p class="mb-1">@<?php if ($_smarty_tpl->getValue('profile')->getUsername()) {
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
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-secondary w-100 tab-btn active" data-variant="secondary" data-target="#followed-users-section">Seguiti</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary w-100 tab-btn" data-variant="secondary" data-target="#followers-users-section">Follower</button>
                    </div>
                </div>
                <div id="followed-users-section" class="tab-content fade show">
                    <?php if ((true && ($_smarty_tpl->hasVariable('followed') && null !== ($_smarty_tpl->getValue('followed') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('followed')) > 0) {?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('followed'), 'user');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
?>
                            <a href="/recipeek/Profile/visitProfile/<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
"  class="card text-decoration-none">
                                <div class="card-body">
                                    <?php if ($_smarty_tpl->getValue('user')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                    <?php if ($_smarty_tpl->getValue('user')->getSurname()) {?> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                    (@<?php if ($_smarty_tpl->getValue('user')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>)
                                </div>
                            </a>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <p class="text-muted">Non segui nessun utente.</p>
                    <?php }?>
                </div>
                <div id="followers-users-section" class="tab-content fade" style="display: none;">
                    <?php if ((true && ($_smarty_tpl->hasVariable('followers') && null !== ($_smarty_tpl->getValue('followers') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('followers')) > 0) {?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('followers'), 'user');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach1DoElse = false;
?>
                            <a href="/recipeek/Profile/visitProfile/<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
"  class="card text-decoration-none"">
                                <div class="card-body">
                                    <?php if ($_smarty_tpl->getValue('user')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                    <?php if ($_smarty_tpl->getValue('user')->getSurname()) {?> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                                    (@<?php if ($_smarty_tpl->getValue('user')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('user')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>)
                                </div>
                            </a>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <p class="text-muted">Nessun follower al momento.</p>
                    <?php }?>
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

<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_2064872661686ea22eb18d36_59966290 extends \Smarty\Runtime\Block
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
