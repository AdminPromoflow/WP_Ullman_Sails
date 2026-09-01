const loginEmail = document.getElementById('login-email');
const loginPassword = document.getElementById('login-password');
const submitLogin = document.getElementById('submit-login');
const passwordToggle = document.querySelector('.login-admin__password-toggle');

class LoginDashboard {
  constructor() {
    if (submitLogin instanceof HTMLButtonElement) {
      submitLogin.addEventListener('click', (event) => {
        event.preventDefault();
        this.loginDashboard();
      });
    }
  }

  async loginDashboard() {
    const email = loginEmail.value;
    const password = loginPassword.value;

    const url = window.ullmanAjax.controllerUrl;

    const data = {
      action: "login",
      email: email,
      password: password
    };

    const response = await this.makeAjaxRequest(url, data);

    if (!response) return;

    console.log(response);
  }

  async makeAjaxRequest(url, data) {
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      });

      if (!response.ok) {
        throw new Error("Network error.");
      }

      return await response.json();
    } catch (error) {
      console.error("Error:", error);
      return null;
    }
  }
}

if (loginPassword instanceof HTMLInputElement && passwordToggle instanceof HTMLButtonElement) {
  passwordToggle.addEventListener('click', () => {
    const willShowPassword = loginPassword.type === 'password';

    loginPassword.type = willShowPassword ? 'text' : 'password';
    passwordToggle.textContent = willShowPassword ? 'Hide' : 'Show';
    passwordToggle.setAttribute('aria-pressed', String(willShowPassword));
    loginPassword.focus({ preventScroll: true });
  });
}

new LoginDashboard();
