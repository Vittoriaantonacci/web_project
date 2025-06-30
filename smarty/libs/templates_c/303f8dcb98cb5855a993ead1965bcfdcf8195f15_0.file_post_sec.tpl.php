<?php
/* Smarty version 5.5.1, created on 2025-06-29 13:55:28
  from 'file:post_sec.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686129b07ec580_44161675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '303f8dcb98cb5855a993ead1965bcfdcf8195f15' => 
    array (
      0 => 'post_sec.tpl',
      1 => 1751198117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686129b07ec580_44161675 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_971040446686129b07be023_12130218', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_382131153686129b07c8779_60080792', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_641715101686129b07eb005_33197464', "script");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_971040446686129b07be023_12130218 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
I tuoi Post<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_382131153686129b07c8779_60080792 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-outline-primary tab-btn active" data-target="#saved-posts">📌 Post Salvati</button>
            <button class="btn btn-outline-primary tab-btn" data-target="#created-posts">📝 Post Creati</button>
        </div>

        <!-- Sezione: Post Salvati -->
        <div id="saved-posts" class="tab-content fade show">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('savedPost')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('savedPost'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
                    <div class="styled-card mb-3">
                        <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                        <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        <p class="text-muted small">Categoria: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getCategory(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="text-muted">Nessun post salvato.</p>
            <?php }?>
        </div>

        <!-- Sezione: Post Creati -->
        <div id="created-posts" class="tab-content fade" style="display: none;">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('yourPost')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yourPost'), 'post');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach1DoElse = false;
?>
                    <div class="styled-card mb-3">
                        <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                        <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        <p class="text-muted small">Categoria: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getCategory(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="text-muted">Non hai ancora creato nessun post.</p>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_641715101686129b07eb005_33197464 extends \Smarty\Runtime\Block
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
