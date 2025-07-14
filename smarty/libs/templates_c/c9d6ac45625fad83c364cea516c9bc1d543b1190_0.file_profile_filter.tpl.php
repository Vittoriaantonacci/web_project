<?php
/* Smarty version 5.5.1, created on 2025-07-14 15:20:23
  from 'file:profile_filter.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68750417494ea1_84432715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9d6ac45625fad83c364cea516c9bc1d543b1190' => 
    array (
      0 => 'profile_filter.tpl',
      1 => 1752499219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68750417494ea1_84432715 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_201051687168750417480e46_66923290', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_209341600068750417484366_47781609', "body");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_106253896468750417494842_04524043', 'script');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_201051687168750417480e46_66923290 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Cerca utente<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_209341600068750417484366_47781609 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

    <h2>Cerca utente</h2>

    <!-- Sezione utenti -->
        <div class="card">
          <div class="card-body">
            <input type="text" class="form-control mb-3" placeholder="Cerca profilo..." id="user-filter-select">
              <div id="tab-users" class="tab-content fade show" data-link-prefix="/recipeek/Profile/visitProfile/">
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('profiles')) > 0) {?> 
                          <div class="card mb-2">
                              <div class="d-flex align-items-center">
                                <?php if ($_smarty_tpl->getValue('profile')->getProPic()) {?>
                                    <img src="/recipeek/public/uploads/propic/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getProPic()->getImagePath(), ENT_QUOTES, 'UTF-8', true);?>
" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                <?php } else { ?>
                                    <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                                <?php }?>
                                <div class="ms-3 card-body">
                                    <p class="mb-0 fw-bold"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getNickname(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                    <p class="mb-1">@<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('profile')->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                </div>
                              </div>
                          </div>
                  <?php } else { ?>
                      <p class="card-text">Nessun profilo selezionato.</p>
                  <?php }?>
              </div>
          </div>
        </div>
<?php
}
}
/* {/block "body"} */
/* {block 'script'} */
class Block_106253896468750417494842_04524043 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/upd_usr.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
