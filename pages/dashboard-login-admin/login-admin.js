class AdminLogin {
  constructor() {
    this.form = document.querySelector('.login-admin__form');
    this.emailInput = document.querySelector('#admin-login-email');
    this.passwordInput = document.querySelector('#admin-login-password');
    this.passwordToggle = document.querySelector('.login-admin__password-toggle');
    this.submitButton = document.querySelector('.login-admin__submit');
    this.submitLabel = this.submitButton?.querySelector('span');
    this.notice = document.querySelector('.login-admin__notice');
    this.defaultNotice = this.notice?.textContent || '';

    if (
      !(this.form instanceof HTMLFormElement)
      || !(this.emailInput instanceof HTMLInputElement)
      || !(this.passwordInput instanceof HTMLInputElement)
    ) {
      return;
    }

    this.form.addEventListener('submit', (event) => {
      event.preventDefault();
      this.login();
    });

    if (this.passwordToggle instanceof HTMLButtonElement) {
      this.passwordToggle.addEventListener('click', () => this.togglePasswordVisibility());
    }
  }

  togglePasswordVisibility() {
    const willShowPassword = this.passwordInput.type === 'password';

    this.passwordInput.type = willShowPassword ? 'text' : 'password';
    this.passwordToggle.textContent = willShowPassword ? 'Hide' : 'Show';
    this.passwordToggle.setAttribute('aria-pressed', String(willShowPassword));
    this.passwordInput.focus({ preventScroll: true });
  }

  async login() {

    if (!this.form.reportValidity()) {
      return;
    }

    const data = {
      action: 'login',
      email: this.emailInput.value.trim(),
      password: this.passwordInput.value
    };

    const debugStep = new URLSearchParams(window.location.search).get('debug_step');

    if (debugStep) {
      data.debug_step = debugStep;
    }

    this.setBusy(true);
    this.showMessage(this.defaultNotice, false);

    try {
      const response = await this.makeAjaxRequest(data);
      alert(JSON.stringify(response));


      if (response?.debug === true) {
        console.info('Login breakpoint:', response);
        this.showMessage(`Breakpoint: ${response.stage}`, false);
        return;
      }

      if (response?.success === true) {
        this.showMessage('Authenticated. Redirecting…', false);
        window.location.assign(this.form.dataset.successUrl);
        return;
      }

      this.showMessage(response?.message || 'Invalid credentials', true);
      this.passwordInput.focus({ preventScroll: true });
      this.passwordInput.select();
    } catch (error) {
      console.error('Admin login request failed:', error);
      this.showMessage('Unable to sign in. Please try again.', true);
    } finally {
      this.setBusy(false);
    }
  }

  async makeAjaxRequest(data) {
    const controllerUrl = window.ullmanAjax?.controllerUrl;

    if (!controllerUrl) {
      throw new Error('The login endpoint is unavailable.');
    }

    const request = await fetch(controllerUrl, {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json; charset=UTF-8',
        Accept: 'application/json'
      },
      body: JSON.stringify(data)
    });

    const responseText = await request.text();

    try {
      return JSON.parse(responseText);
    } catch (error) {
      throw new Error('The login service returned an invalid response.');
    }
  }

  setBusy(isBusy) {
    if (this.submitButton instanceof HTMLButtonElement) {
      this.submitButton.disabled = isBusy;
      this.submitButton.setAttribute('aria-busy', String(isBusy));
    }

    if (this.submitLabel) {
      this.submitLabel.textContent = isBusy ? 'Signing in…' : 'Sign in';
    }
  }

  showMessage(message, isError) {
    if (!this.notice) {
      return;
    }

    this.notice.textContent = message;
    this.notice.classList.toggle('is-error', isError);
  }
}

document.addEventListener('DOMContentLoaded', () => new AdminLogin());
