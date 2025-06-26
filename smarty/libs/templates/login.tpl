<!DOCTYPE html>
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
                {if $mode eq 'login' && $error}
                  <div class="alert alert-danger">{$error}</div>
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
                <h3 class="text-center mb-4">Registrati</h3>
                {if $mode eq 'register' && $error}
                  <div class="alert alert-danger">{$error}</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Form switch logic -->
<script>
  function showLogin() {
    document.getElementById('formPanel').style.transform = 'translateX(0%)';
  }

  function showRegister() {
    document.getElementById('formPanel').style.transform = 'translateX(-50%)';
  }

  // Se Smarty imposta il mode, attiva il pannello giusto
  {if $mode eq 'register'}
  window.addEventListener("load", () => {
    showRegister();
  });
  {/if}
</script>

</body>
</html>