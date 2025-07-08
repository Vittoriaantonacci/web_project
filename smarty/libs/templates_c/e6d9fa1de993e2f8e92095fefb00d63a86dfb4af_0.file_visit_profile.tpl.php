<?php
/* Smarty version 5.5.1, created on 2025-07-08 16:56:10
  from 'file:visit_profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686d318a200406_94773488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6d9fa1de993e2f8e92095fefb00d63a86dfb4af' => 
    array (
      0 => 'visit_profile.tpl',
      1 => 1751986555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686d318a200406_94773488 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_716752099686d318a1c1f90_75334983', "body");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "body"} */
class Block_716752099686d318a1c1f90_75334983 extends \Smarty\Runtime\Block
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
            <?php if ($_smarty_tpl->getValue('isFollowed') !== null) {?>
                <div class="mt-2">
                    <button class="btn btn-follow <?php if ($_smarty_tpl->getValue('isFollowed')) {?>btn-danger<?php } else { ?>btn-outline-danger<?php }?>"
                            data-action="<?php if ($_smarty_tpl->getValue('isFollowed')) {?>unfollow<?php } else { ?>follow<?php }?>"
                            data-user-id="<?php echo $_smarty_tpl->getValue('profile')->getIdUser();?>
">
                        🤝 <?php if ($_smarty_tpl->getValue('isFollowed')) {?>Non seguire più<?php } else { ?>Segui<?php }?>
                    </button>
                </div>
            <?php }?>
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
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
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
                            <p class="text-muted">Nessun follower al momento.</p>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-center">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-light" onclick="toggleContentTab('recipes')">Ricette</button>
                        <button class="btn btn-sm btn-outline-light" onclick="toggleContentTab('mealplans')">Piani Alimentari</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="recipes-section">
                        <?php if ((true && ($_smarty_tpl->hasVariable('recipes') && null !== ($_smarty_tpl->getValue('recipes') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('recipes')) > 0) {?>
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recipes'), 'recipe');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recipe')->value) {
$foreach2DoElse = false;
?>
                                    <div class="col">
                                        <div class="card h-100 clickable-card" onclick="window.location.href='/recipe/<?php echo $_smarty_tpl->getValue('recipe')->getIdRecipe();?>
'">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getNameRecipe(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                                                <p class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recipe')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php } else { ?>
                            <p class="text-muted">Nessuna ricetta disponibile.</p>
                        <?php }?>
                    </div>
                    <div id="mealplans-section" style="display: none;">
                        <?php if ((true && ($_smarty_tpl->hasVariable('mealPlans') && null !== ($_smarty_tpl->getValue('mealPlans') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('mealPlans')) > 0) {?>
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('mealPlans'), 'mealPlan');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealPlan')->value) {
$foreach3DoElse = false;
?>
                                    <div class="col">
                                        <div class="card h-100 clickable-card" onclick="window.location.href='/mealplan/<?php echo $_smarty_tpl->getValue('mealPlan')->getIdMealPlan();?>
'">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getNameMealPlan(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                                                <p class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php } else { ?>
                            <p class="text-muted">Nessun piano alimentare disponibile.</p>
                        <?php }?>
                    </div>
                </div>
            </div>
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
    function toggleContentTab(tab) {
        const recipes = document.getElementById('recipes-section');
        const mealplans = document.getElementById('mealplans-section');
        if (tab === 'recipes') {
            recipes.style.display = 'block';
            mealplans.style.display = 'none';
        } else {
            recipes.style.display = 'none';
            mealplans.style.display = 'block';
        }
    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "body"} */
}
