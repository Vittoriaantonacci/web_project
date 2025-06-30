<?php
/* Smarty version 5.5.1, created on 2025-06-28 18:54:48
  from 'file:new_post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68601e585087d5_15857790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c3cfd0c3966a9f79c2f71d9ce9a328f2e5db0d2' => 
    array (
      0 => 'new_post.tpl',
      1 => 1751129639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68601e585087d5_15857790 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_138366510768601e58500c67_63099706', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_47538697268601e58506d58_01315643', "body");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_138366510768601e58500c67_63099706 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Crea Nuovo Post<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_47538697268601e58506d58_01315643 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <h2 class="mb-4">Crea un nuovo post</h2>
        <form method="post" action="/recipeek/Post/onCreate" enctype="multipart/form-data">
            <!-- Titolo -->
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo del post" required />
            </div>

            <!-- Descrizione -->
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Scrivi una descrizione..." required></textarea>
            </div>

            <!-- Categoria -->
            <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Es. Dolce, Primo, Secondo..." required />
            </div>

            <!-- Immagine -->
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required />
            </div>

            <!-- Bottone invio -->
            <button type="submit" class="btn btn-primary">➕ Crea</button>
        </form>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
}
