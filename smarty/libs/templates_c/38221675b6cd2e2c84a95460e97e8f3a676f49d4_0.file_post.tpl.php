<?php
/* Smarty version 5.5.1, created on 2025-07-10 16:44:14
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686fd1be06f870_29149907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38221675b6cd2e2c84a95460e97e8f3a676f49d4' => 
    array (
      0 => 'post.tpl',
      1 => 1752158616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686fd1be06f870_29149907 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1301562502686fd1be042390_52515643', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_415730500686fd1be04a076_20032470', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1429910670686fd1be06f210_30993379', 'script');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_1301562502686fd1be042390_52515643 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_415730500686fd1be04a076_20032470 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="card post-card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-6">
                <h2 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <div class="col-12 col-md-auto">
                    <a href="/recipeek/Profile/visitProfile/<?php echo $_smarty_tpl->getValue('post')->getProfile()->getIdUser();?>
" class="card text-decoration-none">
                        <div class="d-flex align-items-center">
                            <?php if ($_smarty_tpl->getValue('post')->getProfile()->getProPic()) {?>
                                <img src="/recipeek/public/uploads/propic/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getProfile()->getProPic()->getPath(), ENT_QUOTES, 'UTF-8', true);?>
" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                            <?php } else { ?>
                                <img src="/recipeek/public/default/profile_ph.png" class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                            <?php }?>
                            <div class="ms-3 card-body">
                                <p class="mb-0 fw-bold"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getProfile()->getNickname(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                <p class="mb-1">@<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getProfile()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            </div>
                        </div>
                    </a>
                </div>
                <p class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                <p class="text-muted small">Creato il: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getCreationTimeStr(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="col-sm-12 col-lg-6">
                <?php if ($_smarty_tpl->getValue('post')->getImages() && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('post')->getImages()) > 0) {?>
                    <div id="postImagesCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('post')->getImages(), 'image', false, NULL, 'imgLoop', array (
  'first' => true,
  'index' => true,
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach0DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_imgLoop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_imgLoop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_imgLoop']->value['index'];
?>
                                <div class="carousel-item <?php if (($_smarty_tpl->getValue('__smarty_foreach_imgLoop')['first'] ?? null)) {?>active<?php }?>">
                                    <img src="/recipeek/public/uploads/posts/<?php echo $_smarty_tpl->getValue('image')->getImagePath();?>
" class="fixed-post-img rounded shadow" alt="Immagine del post">
                                </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('post')->getImages()) > 1) {?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#postImagesCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Precedente</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#postImagesCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Successiva</span>
                            </button>
                        <?php }?>
                    </div>
                <?php } else { ?>
                    <img src="/recipeek/public/default/post_ph.png" class="fixed-post-img rounded shadow mb-3" alt="Immagine profilo">
                <?php }?>
            </div>
        </div>
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
    <div class="card-header bg-primary">Commenti</div>
    <div class="card-body">
        <?php if ($_smarty_tpl->getValue('post')->getComments() && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('post')->getComments()) > 0) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('post')->getComments(), 'comment');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach1DoElse = false;
?>
                <div class="mb-3 border-bottom pb-2">
                    <a href="/recipeek/Profile/visitProfile/<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')->getUser()->getIdUser(), ENT_QUOTES, 'UTF-8', true);?>
" class="nav-link text-decoration-none">
                        <strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')->getUser()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</strong>
                    </a>
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
class Block_1429910670686fd1be06f210_30993379 extends \Smarty\Runtime\Block
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
