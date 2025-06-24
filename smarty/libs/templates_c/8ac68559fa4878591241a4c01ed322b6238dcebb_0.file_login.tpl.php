<?php
/* Smarty version 5.5.1, created on 2025-06-24 00:06:36
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6859cfec4a0a51_68135993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ac68559fa4878591241a4c01ed322b6238dcebb' => 
    array (
      0 => 'login.tpl',
      1 => 1750716393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6859cfec4a0a51_68135993 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accedi o Registrati</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-toggle-wrapper {
      position: relative;
      width: 100%;
      overflow: hidden;
      height: auto;
    }

    .form-panel {
      width: 200%;
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .form-box {
      width: 50%;
      padding: 2rem;
    }

    .toggle-buttons {
      display: flex;
      justify-content: center;
      margin-bottom: 1.5rem;
    }

    .toggle-buttons button {
      margin: 0 1rem;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">

          <!-- Toggle buttons -->
          <div class="toggle-buttons">
            <button class="btn btn-outline-primary" onclick="showLogin()">Login</button>
            <button class="btn btn-outline-success" onclick="showRegister()">Registrazione</button>
          </div>

          <!-- Form Wrapper -->
          <div class="form-toggle-wrapper">
            <div class="form-panel" id="formPanel">

              <!-- Login Form -->
              <div class="form-box" id="loginForm">
                <h3 class="text-center mb-4">Accedi</h3>
                <?php if ($_smarty_tpl->getValue('mode') == 'login' && $_smarty_tpl->getValue('error')) {?>
                  <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                <?php }?>
                <form method="post" action="/recipeek/User/login">
                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Accedi</button>
                </form>
              </div>

              <!-- Register Form -->
              <div class="form-box" id="registerForm">
                <h3 class="text-center mb-4">Registrati</h3>
                <?php if ($_smarty_tpl->getValue('mode') == 'register' && $_smarty_tpl->getValue('error')) {?>
                  <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                <?php }?>
                <form method="post" action="/recipeek/User/register">
                  <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Data di nascita</label>
                    <input type="date" name="birthDate" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Genere</label>
                    <input type="text" name="gender" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success w-100">Registrati</button>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<!-- Form switch logic -->
<?php echo '<script'; ?>
>
  function showLogin() {
    document.getElementById('formPanel').style.transform = 'translateX(0%)';
  }

  function showRegister() {
    document.getElementById('formPanel').style.transform = 'translateX(-50%)';
  }

  // Se Smarty imposta il mode, attiva il pannello giusto
  <?php if ($_smarty_tpl->getValue('mode') == 'register') {?>
  window.addEventListener("load", () => {
    showRegister();
  });
  <?php }
echo '</script'; ?>
>

</body>
</html><?php }
}
