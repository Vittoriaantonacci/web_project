<!DOCTYPE html>
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
                {if $mode eq 'login' && $error}
                  <div class="alert alert-danger text-light bg-danger">{$error}</div>
                {/if}
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
                {if $mode eq 'register' && $error}
                  <div class="alert alert-danger text-light bg-danger">{$error}</div>
                {/if}
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Form switch logic -->
<script src="/recipeek/public/assets/tab_btn.js"></script>
<script src="/recipeek/public/assets/chk_psw.js"></script>
<script>
  // Se Smarty imposta il mode, attiva il pannello giusto
  {if $mode eq 'register'}
  window.addEventListener("load", () => {
    showRegister();
  });
  {/if}
</script>

</body>
</html>