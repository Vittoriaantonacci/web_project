<?php
/* Smarty version 5.5.1, created on 2025-07-11 18:36:42
  from 'file:homePage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68713d9a35d103_89805408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14fda0aa01694e2fec01347e05de3cf4898ce0f4' => 
    array (
      0 => 'homePage.tpl',
      1 => 1752251799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68713d9a35d103_89805408 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_199384302068713d9a3474f5_77084557', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_133641874268713d9a34a685_97007404', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_149716907868713d9a35c962_10352379', "script");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_199384302068713d9a3474f5_77084557 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Home - Recipeek<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_133641874268713d9a34a685_97007404 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#saved-posts">Followed</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#created-posts">ForYou</button>
        </div>

        <!-- Sezione: Post Salvati -->
        <div id="saved-posts" class="tab-content fade show">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('posts')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
                  <a href="/recipeek/Post/view/<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
" class="card text-decoration-none">
                    <div class="card-body">
                      <h6 class="card-subtitle mb-2"><?php echo $_smarty_tpl->getValue('post')->getCategory();?>
</h6>
                      <h5 class="card-title"><?php echo $_smarty_tpl->getValue('post')->getTitle();?>
</h5>
                      <h6 class="card-subtitle mb-2">di <?php echo $_smarty_tpl->getValue('post')->getProfile()->getUsername();?>
</h6>
                      <p class="card-text"><?php echo $_smarty_tpl->getValue('post')->getDescription();?>
</p>
                      <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getValue('post')->getCreationTimeStr();?>
</p>
                    </div>
                  </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Non ci sono post di utenti che segui.</p>
            <?php }?>
        </div>

        <!-- Sezione: Post Creati -->
        <div id="created-posts" class="tab-content fade" style="display: none;">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('yourPosts')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yourPosts'), 'post');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach1DoElse = false;
?>
                  <a href="/recipeek/Post/view/<?php echo $_smarty_tpl->getValue('post')->getIdPost();?>
" class="card text-decoration-none">
                    <div class="card-body">
                      <h6 class="card-subtitle mb-2"><?php echo $_smarty_tpl->getValue('post')->getCategory();?>
</h6>
                      <h5 class="card-title"><?php echo $_smarty_tpl->getValue('post')->getTitle();?>
</h5>
                      <h6 class="card-subtitle mb-2">di <?php echo $_smarty_tpl->getValue('post')->getProfile()->getUsername();?>
</h6>
                      <p class="card-text"><?php echo $_smarty_tpl->getValue('post')->getDescription();?>
</p>
                      <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getValue('post')->getCreationTimeStr();?>
</p>
                    </div>
                  </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Nessun post trovato, prova a ricaricare la pagina.</p>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_149716907868713d9a35c962_10352379 extends \Smarty\Runtime\Block
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
