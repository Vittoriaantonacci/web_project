  function showLogin() {
    document.getElementById('formPanel').style.transform = 'translateX(0%)';
  }

  function showRegister() {
    document.getElementById('formPanel').style.transform = 'translateX(-50%)';
  }

  const passwordInput = document.getElementById("regPassword");
  const feedback = document.getElementById("passwordFeedback");
  const registerBtn = document.getElementById("registerBtn");

  if (passwordInput) {
    passwordInput.addEventListener("input", () => {
      const value = passwordInput.value;
      const lengthCheck = value.length >= 8;
      const numberCheck = /[0-9]/.test(value);
      const symbolCheck = /[^A-Za-z0-9]/.test(value);
      const letterCheck = /[A-Za-z]/.test(value);

      let messages = [];
      if (!lengthCheck) messages.push("almeno 8 caratteri alfanumerici");
      if (!numberCheck) messages.push("almeno un numero");
      if (!symbolCheck) messages.push("almeno un simbolo");
      if (!letterCheck) messages.push("almeno una lettera");

      if (messages.length > 0) {
        feedback.innerHTML = "La password deve contenere:<br> - " + messages.join("<br> - ");
        feedback.classList.remove("text-success");
        feedback.classList.add("text-warning");
      } else {
        feedback.textContent = "✔ Password valida";
        feedback.classList.remove("text-warning");
        feedback.classList.add("text-success");
      }

      if (registerBtn) {
        registerBtn.disabled = messages.length > 0;
      }
    });
  }