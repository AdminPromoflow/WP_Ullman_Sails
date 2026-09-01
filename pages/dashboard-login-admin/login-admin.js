(() => {
  const passwordInput = document.querySelector('#admin-login-password');
  const passwordToggle = document.querySelector('.login-admin__password-toggle');
  const form = document.querySelector('.login-admin__form');

  if (passwordInput instanceof HTMLInputElement && passwordToggle instanceof HTMLButtonElement) {
    passwordToggle.addEventListener('click', () => {
      const willShowPassword = passwordInput.type === 'password';

      passwordInput.type = willShowPassword ? 'text' : 'password';
      passwordToggle.textContent = willShowPassword ? 'Hide' : 'Show';
      passwordToggle.setAttribute('aria-pressed', String(willShowPassword));
      passwordInput.focus({ preventScroll: true });
    });
  }

  if (form instanceof HTMLFormElement) {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
    });
  }
})();
