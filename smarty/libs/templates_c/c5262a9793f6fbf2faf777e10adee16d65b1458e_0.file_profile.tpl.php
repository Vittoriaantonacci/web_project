<?php
/* Smarty version 5.5.1, created on 2025-07-12 00:28:03
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68718ff37410b8_28989570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5262a9793f6fbf2faf777e10adee16d65b1458e' => 
    array (
      0 => 'profile.tpl',
      1 => 1752272846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68718ff37410b8_28989570 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_119210269468718ff371f2b8_57870361', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_151145919468718ff3740cb1_10875580', "script");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "body"} */
class Block_119210269468718ff371f2b8_57870361 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-3 text-center">
            <form method="post" action="/recipeek/Profile/updatePicture" enctype="multipart/form-data">
                <label for="profilePicInput" style="cursor:pointer;">
                    <?php if ($_smarty_tpl->getValue('profile')->getProPic()) {?>
                        <img src="/recipeek/public/uploads/propic/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getProPic()->getImagePath(), ENT_QUOTES, 'UTF-8', true);?>
" class="img-fluid rounded shadow" alt="Immagine profilo">
                    <?php } else { ?>
                        <img src="/recipeek/public/default/profile_ph.png" class="img-fluid rounded shadow" alt="Immagine profilo">
                    <?php }?>
                </label>
                <input type="file" id="profilePicInput" name="image" class="d-none" accept="image/*" onchange="this.form.submit()">
            </form>
        </div>
        <div class="col-md-9">
            <h2 class="mb-0" data-bs-toggle="modal" data-bs-target="#editNicknameModal" style="cursor:pointer;">
                <?php if ($_smarty_tpl->getValue('profile')->getNickname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </h2>
            <p class="mb-1" data-bs-toggle="modal" data-bs-target="#editUsernameModal" style="cursor:pointer;">
                @<?php if ($_smarty_tpl->getValue('profile')->getUsername()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getUsername(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </p>
            <p class="mb-1" data-bs-toggle="modal" data-bs-target="#editEmailModal" style="cursor:pointer;">
                <strong>Email:</strong> <?php if ($_smarty_tpl->getValue('profile')->getEmail()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getEmail(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </p>
            <p class="mb-1" data-bs-toggle="modal" data-bs-target="#editNameModal" style="cursor:pointer;">
                <strong>Nome:</strong> <?php if ($_smarty_tpl->getValue('profile')->getName()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getName(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
                <?php if ($_smarty_tpl->getValue('profile')->getSurname()) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getSurname(), ENT_QUOTES, 'UTF-8', true);
} else { ?>vuoto<?php }?>
            </p>
            <p data-bs-toggle="modal" data-bs-target="#editBioModal" style="cursor:pointer;"><strong>Biografia:</strong> <?php if ($_smarty_tpl->getValue('profile')->getBiography()) {
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
                <div id="followed-users-section" class="card-body tab-content fade show">
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
                <div id="followers-users-section" class="card-body tab-content fade" style="display: none;">
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

</div>

<!-- Modal modifica nickname -->
<div class="modal fade" id="editNicknameModal" tabindex="-1" aria-labelledby="editNicknameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNicknameLabel">Modifica Nickname</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="nickname">
                <input type="text" class="form-control" name="value" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica email -->
<div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmailLabel">Modifica Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="email">
                <input type="email" class="form-control" name="value" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica nome e cognome -->
<div class="modal fade" id="editNameModal" tabindex="-1" aria-labelledby="editNameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateName">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNameLabel">Modifica Nome e Cognome</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getName(), ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="mb-2">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" class="form-control" name="surname" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getSurname(), ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica username -->
<div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsernameLabel">Modifica Username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="username">
                <input type="text" class="form-control" name="value" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal modifica biografia -->
<div class="modal fade" id="editBioModal" tabindex="-1" aria-labelledby="editBioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updateField">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBioLabel">Modifica Biografia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="field" value="biography">
                <textarea class="form-control" name="value" rows="4"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getBiography(), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal caricamento immagine profilo -->
<div class="modal fade" id="editProfilePicModal" tabindex="-1" aria-labelledby="editProfilePicLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/recipeek/Profile/updatePicture" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfilePicLabel">Cambia immagine profilo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <input type="file" class="form-control" name="image" accept="image/*" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Carica</button>
            </div>
        </div>
    </form>
  </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_151145919468718ff3740cb1_10875580 extends \Smarty\Runtime\Block
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
