<?php
/* Smarty version 5.5.1, created on 2025-06-22 13:02:14
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6857e2b666c136_12781729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ac68559fa4878591241a4c01ed322b6238dcebb' => 
    array (
      0 => 'login.tpl',
      1 => 1750590129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6857e2b666c136_12781729 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login / Registrazione</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 2rem; background-color: #f9f9f9; }
        .form-container { 
            width: 300px; 
            height: 600px; 
            margin: auto; 
            background: white; 
            padding: 2rem; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
            position: relative;
            overflow: hidden;
        }
        h2 { text-align: center; margin-bottom: 1rem; }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%; padding: 0.5rem; margin: 0.5rem 0 1rem; border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            width: 100%; padding: 0.7rem; background-color: #4CAF50; color: white; border: none; border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }
        .switch-buttons {
            width: 200px;
            margin: 0 auto 2rem;
            position: relative;
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #ccc;
        }
        .switch-buttons button {
            background: none;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0.5rem 0;
            cursor: pointer;
            color: #555;
            width: 100px;
            transition: color 0.3s ease;
        }
        .switch-buttons button.active {
            color: #4CAF50;
            font-weight: bold;
        }
        #btn-log {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 3px;
            background-color: #4CAF50;
            transition: left 0.3s ease;
        }
        form {
            position: absolute;
            width: 90%;
            top: 80px;
            left: 0;
            transition: left 0.4s ease;
        }
        #register {
            left: 400px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <div class="switch-buttons">
            <button id="btn-login" class="active" onclick="login()">Log In</button>
            <button id="btn-register" onclick="register()">Register</button>
            <div id="btn-log"></div>
        </div>
        <?php if ($_smarty_tpl->getValue('mode') == 'register') {?>
        <?php echo '<script'; ?>
>
            window.addEventListener("load", () => {
                register(); // forza la vista sul form di registrazione
            });
        <?php echo '</script'; ?>
>
        <?php }?>

        <form id="login" method="post" action="/recipeek/User/checkLogin">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Accedi</button>
        </form>

        <form id="register" method="post" action="/recipeek/User/register">
            <h2>Registrati</h2>
            <input type="text" name="name" placeholder="Nome" required />
            <input type="text" name="surname" placeholder="Cognome" required />
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="date" name="birthDate" placeholder="Data di nascita" required />
            <input type="text" name="gender" placeholder="Genere" required />
            <button type="submit">Registrati</button>
        </form>
        
    </div>
        <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
            <p style="color: red; text-align: center;"><?php echo $_smarty_tpl->getValue('error');?>
</p>
        <?php }?>
    <?php echo '<script'; ?>
> 
    const x = document.getElementById("login");
    const y = document.getElementById("register");
    const z = document.getElementById("btn-log");
    const btnLogin = document.getElementById("btn-login");
    const btnRegister = document.getElementById("btn-register");

    function register(){
      x.style.left = "-400px";
      y.style.left = "0px";
      z.style.left = "100px";
      btnRegister.classList.add("active");
      btnLogin.classList.remove("active");
    }

    function login(){
      x.style.left = "0px";
      y.style.left = "400px";
      z.style.left = "0px";
      btnLogin.classList.add("active");
      btnRegister.classList.remove("active");
    }
    <?php echo '</script'; ?>
>

</body>
</html><?php }
}
