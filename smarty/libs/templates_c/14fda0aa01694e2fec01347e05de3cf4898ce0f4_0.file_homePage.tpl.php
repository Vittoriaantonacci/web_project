<?php
/* Smarty version 5.5.1, created on 2025-06-24 00:30:52
  from 'file:homePage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6859d59c14bbc2_49370577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14fda0aa01694e2fec01347e05de3cf4898ce0f4' => 
    array (
      0 => 'homePage.tpl',
      1 => 1750717849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6859d59c14bbc2_49370577 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Recipeek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .sidebar-left {
      width: 250px;
      min-height: 100vh;
      border-right: 1px solid #dee2e6;
      position: fixed;
      left: 0;
      top: 0;
      padding-top: 1rem;
      background-color: #fff;
    }
    .sidebar-right {
      width: 300px;
      min-height: 100vh;
      border-left: 1px solid #dee2e6;
      position: fixed;
      right: 0;
      top: 0;
      padding-top: 1rem;
      background-color: #f8f9fa;
    }
    .main-content {
      margin-left: 260px;
      margin-right: 310px;
      padding: 2rem;
    }
    .post-card {
      margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>

<!-- Sidebar Sinistra -->
<div class="sidebar-left">
  <div class="text-center mb-4">
    <h4>Recipeek</h4>
  </div>
  <ul class="nav flex-column px-3">
    <li class="nav-item"><a class="nav-link" href="/recipeek/User/home">🏠 Home</a></li>
    <li class="nav-item"><a class="nav-link" href="/recipeek/User/profile">👤 Profilo</a></li>
    <li class="nav-item"><a class="nav-link" href="/recipeek/Post/create">➕ Nuovo Post</a></li>
    <li class="nav-item"><a class="nav-link" href="/recipeek/User/logout">🚪 Logout</a></li>
  </ul>
</div>

<!-- Sidebar Destra -->
<div class="sidebar-right">
  <div class="p-3">
    <h5>Il tuo profilo</h5>

  </div>
</div>

<!-- Contenuto Principale -->
<div class="main-content">
  <!-- Filtro in alto -->
  <div class="mb-4">
    <form method="get" action="/recipeek/User/home">
      <div class="input-group">
        <input type="text" name="filter" class="form-control" placeholder="Cerca tra i post..." value="<?php echo $_smarty_tpl->getValue('filter');?>
">
        <button class="btn btn-outline-secondary" type="submit">Filtra</button>
      </div>
    </form>
  </div>

  <!-- Lista Post -->
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
    <div class="card post-card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $_smarty_tpl->getValue('post')[0]->getTitle();?>
</h5>
        <h6 class="card-subtitle mb-2 text-muted">di <?php echo $_smarty_tpl->getValue('post')[0]->getProfile()->getUsername();?>
</h6>
        <p class="card-text"><?php echo $_smarty_tpl->getValue('post')[0]->getDescription();?>
</p>
        <p class="text-muted small">Creato il: <?php echo $_smarty_tpl->getValue('post')[0]->getCreationTimeStr();?>
</p>
        <a href="/recipeek/Post/view/<?php echo $_smarty_tpl->getValue('post')[0]->getIdPost();?>
" class="btn btn-sm btn-outline-primary">Visualizza</a>
      </div>
    </div>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
