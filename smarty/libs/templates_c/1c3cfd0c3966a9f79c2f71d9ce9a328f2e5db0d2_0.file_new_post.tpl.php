<?php
/* Smarty version 5.5.1, created on 2025-07-09 18:49:34
  from 'file:new_post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686e9d9e30b239_79338271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c3cfd0c3966a9f79c2f71d9ce9a328f2e5db0d2' => 
    array (
      0 => 'new_post.tpl',
      1 => 1752079771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686e9d9e30b239_79338271 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1899534371686e9d9e2fb746_73294710', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1292138358686e9d9e308e85_37232631', "body");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_1899534371686e9d9e2fb746_73294710 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
Crea Nuovo Post<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_1292138358686e9d9e308e85_37232631 extends \Smarty\Runtime\Block
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
                <select class="form-select" id="category" name="category" required>
                    <option value="">Seleziona una categoria</option>
                    <option value="colazione">Colazione</option>
                    <option value="pranzo">Pranzo</option>
                    <option value="cena">Cena</option>
                    <option value="merenda">Merenda</option>
                    <option value="dolce">Dolce</option>
                    <option value="spuntino">Spuntino</option>
                    <option value="bevanda">Bevanda</option>
                    <option value="contorno">Contorno</option>
                    <option value="antipasto">Antipasto</option>
                </select>
            </div>

            <!-- Immagini -->
            <div class="mb-3">
                <label for="images" class="form-label">Immagini</label>
                <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple required />
                <small class="form-text text-muted">Puoi caricare fino a 5 immagini.</small>
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
