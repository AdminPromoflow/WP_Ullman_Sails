const loginEmail = document.querySelector('#login-email');
const loginPassword = document.querySelector('#login-password');
const submitLogin = document.querySelector('#submit-login');
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

  loginDashboard() {
    alert('Login dashboard test');
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
