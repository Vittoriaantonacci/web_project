<?php
/* Smarty version 5.5.1, created on 2025-06-27 18:05:13
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685ec139d1c1f3_05201956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38221675b6cd2e2c84a95460e97e8f3a676f49d4' => 
    array (
      0 => 'post.tpl',
      1 => 1751037406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685ec139d1c1f3_05201956 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_932728008685ec139cea8b1_39556839', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_337342302685ec139cf59f3_21375993', "body");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_932728008685ec139cea8b1_39556839 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_337342302685ec139cf59f3_21375993 extends \Smarty\Runtime\Block
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
<div class="mt-3">
    <?php if ($_smarty_tpl->getValue('isLiked')) {?>
        <form method="post" action="/recipeek/Post/removeLike">
            <input type="hidden" name="postId" value="<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
" />
            <button class="btn btn-danger">❤️ Rimuovi Like</button>
        </form>
    <?php } else { ?>
        <form method="post" action="/recipeek/Post/addLike">
            <input type="hidden" name="postId" value="<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
" />
            <button class="btn btn-outline-danger">🤍 Metti Like</button>
        </form>
    <?php }?>
</div>

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
}
