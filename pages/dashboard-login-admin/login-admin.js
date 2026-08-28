(() => {
  const passwordInput = document.querySelector('#admin-login-password');
  const passwordToggle = document.querySelector('.login-admin__password-toggle');
  const form = document.querySelector('.login-admin__form');
  const submitButton = document.querySelector('.login-admin__submit');

  if (passwordInput instanceof HTMLInputElement && passwordToggle instanceof HTMLButtonElement) {
    passwordToggle.addEventListener('click', () => {
      const willShowPassword = passwordInput.type === 'password';

      passwordInput.type = willShowPassword ? 'text' : 'password';
      passwordToggle.textContent = willShowPassword ? 'Hide' : 'Show';
      passwordToggle.setAttribute('aria-pressed', String(willShowPassword));
      passwordInput.focus({ preventScroll: true });
    });
  }

  if (form instanceof HTMLFormElement && submitButton instanceof HTMLButtonElement) {
    form.addEventListener('submit', () => {
      const label = submitButton.querySelector('span');

      submitButton.disabled = true;

      if (label) {
        label.textContent = 'Signing in\u2026';
      }
    });
  }
})();
