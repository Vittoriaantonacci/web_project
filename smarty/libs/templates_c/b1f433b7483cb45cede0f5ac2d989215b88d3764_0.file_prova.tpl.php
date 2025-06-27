<?php
/* Smarty version 5.5.1, created on 2025-06-26 18:34:35
  from 'file:prova.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_685d769b2ddcc4_44997163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1f433b7483cb45cede0f5ac2d989215b88d3764' => 
    array (
      0 => 'prova.tpl',
      1 => 1750955653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685d769b2ddcc4_44997163 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
        .main-content {
            margin-left: 260px;
            padding: 2rem;
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

<!-- Contenuto Principale -->
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</h2>
            <h6 class="card-subtitle mb-2 text-muted">
                di <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getProfile()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
 (ID: <?php echo $_smarty_tpl->getValue('post')->getProfile()->getIdUser();?>
)
            </h6>
            <p class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <p class="text-muted small">Creato il: <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getCreationTimeStr(), ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
