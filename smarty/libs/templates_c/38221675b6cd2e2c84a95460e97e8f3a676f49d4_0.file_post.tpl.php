<?php
/* Smarty version 5.5.1, created on 2025-07-08 16:28:01
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686d2af17f2a00_61126399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38221675b6cd2e2c84a95460e97e8f3a676f49d4' => 
    array (
      0 => 'post.tpl',
      1 => 1751984873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686d2af17f2a00_61126399 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_271557000686d2af17c1700_68412225', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1934351592686d2af17d26d3_68031400', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1916643365686d2af17f1cc1_31357629', 'script');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_271557000686d2af17c1700_68412225 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1934351592686d2af17d26d3_68031400 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="card post-card">
    <div class="card-body">
        <h2 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <h6 class="card-subtitle mb-2 text-muted">
            di <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getProfile()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>

        </h6>
        <p class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
        <p class="text-muted small">Creato il: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getCreationTimeStr(), ENT_QUOTES, 'UTF-8', true);?>
</p>
    </div>
</div>

<?php if ($_smarty_tpl->getValue('isLiked') !== null) {?>
<div class="mt-3">
    <button class="btn btn-like <?php if ($_smarty_tpl->getValue('isLiked')) {?>btn-danger<?php } else { ?>btn-outline-danger<?php }?>"
            data-action="<?php if ($_smarty_tpl->getValue('isLiked')) {?>removeLike<?php } else { ?>addLike<?php }?>"
            data-post-id="<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
">
        <?php if ($_smarty_tpl->getValue('isLiked')) {?>❤️ Rimuovi Like<?php } else { ?>🤍 Metti Like<?php }?>
    </button>
</div>
<?php }
if ($_smarty_tpl->getValue('isSaved') !== null) {?>
    <div class="mt-3">
        <button class="btn btn-save <?php if ($_smarty_tpl->getValue('isSaved')) {?>btn-warning<?php } else { ?>btn-outline-warning<?php }?>"
                data-action="<?php if ($_smarty_tpl->getValue('isSaved')) {?>removeSave<?php } else { ?>addSave<?php }?>"
                data-post-id="<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
">
            🔖 <?php if ($_smarty_tpl->getValue('isSaved')) {?>Rimuovi dai salvati<?php } else { ?>Salva post<?php }?>
        </button>
    </div>
<?php }?>

<div class="card mt-4">
    <div class="card-header">Commenti</div>
    <div class="card-body">
        <?php if ($_smarty_tpl->getValue('post')->getComments() && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('post')->getComments()) > 0) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('post')->getComments(), 'comment');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach0DoElse = false;
?>
                <div class="mb-3 border-bottom pb-2">
                    <strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')->getUser()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</strong>
                    <small class="text-muted ms-2"><?php echo $_smarty_tpl->getValue('comment')->getCreationTimeStr();?>
</small>
                    <p class="mb-1"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')->getBody(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <p class="text-muted">Ancora nessun commento.</p>
        <?php }?>
    </div>
    <div class="card-footer">
        <form method="post" action="/recipeek/Post/addComment">
            <input type="hidden" name="postId" value="<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
" />
            <div class="mb-2">
                <textarea name="body" class="form-control" rows="2" placeholder="Scrivi un commento..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
        </form>
    </div>
</div>

<?php
}
}
/* {/block "body"} */
/* {block 'script'} */
class Block_1916643365686d2af17f1cc1_31357629 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/btn_state.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
