<?php
/* Smarty version 5.5.1, created on 2025-07-12 15:29:13
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_687263297a42b8_16388895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ac68559fa4878591241a4c01ed322b6238dcebb' => 
    array (
      0 => 'login.tpl',
      1 => 1752326949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_687263297a42b8_16388895 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="/recipeek/public/default/logo.png" />
  <title>Accedi o Registrati</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/recipeek/public/assets/style.css" />

</head>

<body class="d-flex">

<main class="main-content">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="text-center mb-4">
        <h1 class="text-light">Recipeek</h1>
        <img src="/recipeek/public/default/logo.png" alt="Recipeek Logo" style="width: 80px; height: auto;" />
      </div>
      <div class="card shadow">
        <div class="card-body">

          <!-- Toggle buttons -->
          <div class="toggle-buttons">
            <button class="btn btn-secondary tab-btn active" onclick="showLogin()">Login</button>
            <button class="btn btn-secondary tab-btn" onclick="showRegister()">Registrazione</button>
          </div>

          <!-- Form Wrapper -->
          <div class="form-toggle-wrapper">
            <div class="form-panel" id="formPanel">

              <!-- Login Form -->
              <div class="form-box" id="loginForm">
                <h3 class="text-center mb-4 text-light">Accedi</h3>
                <?php if ($_smarty_tpl->getValue('mode') == 'login' && $_smarty_tpl->getValue('error')) {?>
                  <div class="alert alert-danger text-light bg-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                <?php }?>
                <form method="post" action="/recipeek/User/checkLogin">
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
                <h3 class="text-center mb-4 text-light">Registrati</h3>
                <?php if ($_smarty_tpl->getValue('mode') == 'register' && $_smarty_tpl->getValue('error')) {?>
                  <div class="alert alert-danger text-light bg-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                <?php }?>
                <form method="post" action="/recipeek/User/register">
                  <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Cognome</label>
                    <input type="text" name="surname" class="form-control" required>
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
                    <input type="password" id="regPassword" name="password" class="form-control" required>
                    <div id="passwordFeedback" class="form-text text-warning"></div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Data di nascita</label>
                    <input type="date" name="birthDate" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Genere</label>
                    <select name="gender" class="form-select" required>
                      <option value="">Seleziona il genere</option>
                      <option value="Maschio">Maschio</option>
                      <option value="Femmina">Femmina</option>
                      <option value="Non specificato">Non specificato</option>
                      <option value="Altro">Altro</option>
                    </select>
                  </div>
                  <button type="submit" id="registerBtn" class="btn btn-primary w-100">Registrati</button>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</main>

<!-- Bootstrap Bundle -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<!-- Form switch logic -->
<?php echo '<script'; ?>
 src="/recipeek/public/assets/tab_btn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/recipeek/public/assets/chk_psw.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
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
