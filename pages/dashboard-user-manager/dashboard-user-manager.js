(() => {
  const currentUserEmail = String(window.ullmanUserManager?.currentUserEmail || '').trim().toLowerCase();
  const usersList = document.getElementById('users-list');
  const searchInput = document.getElementById('user-search-input');
  const filterButtons = [...document.querySelectorAll('[data-user-filter]')];
  const refreshButton = document.getElementById('refresh-users');
  const directoryCount = document.getElementById('user-directory-count');
  const createButton = document.getElementById('create-user');
  const form = document.getElementById('user-editor-form');
  const idInput = document.getElementById('user-id');
  const nameInput = document.getElementById('user-name');
  const emailInput = document.getElementById('user-email');
  const passwordInput = document.getElementById('user-password');
  const passwordToggle = document.getElementById('toggle-user-password');
  const roleInput = document.getElementById('user-role');
  const statusInput = document.getElementById('user-status');
  const passwordHelp = document.getElementById('password-help');
  const statusHelp = document.getElementById('status-help');
  const recordMeta = document.getElementById('user-record-meta');
  const recordId = document.getElementById('user-record-id');
  const recordCreated = document.getElementById('user-record-created');
  const recordUpdated = document.getElementById('user-record-updated');
  const editorMode = document.getElementById('user-editor-mode');
  const editorTitle = document.getElementById('user-editor-title');
  const editorState = document.getElementById('user-editor-state');
  const cancelEditButton = document.getElementById('cancel-user-edit');
  const saveButton = document.getElementById('save-user');
  const deleteDialog = document.getElementById('delete-user-dialog');
  const deleteUserName = document.getElementById('delete-user-name');
  const closeDeleteButton = document.getElementById('close-delete-user');
  const cancelDeleteButton = document.getElementById('cancel-delete-user');
  const confirmDeleteButton = document.getElementById('confirm-delete-user');
  const totalUsersCount = document.getElementById('total-users-count');
  const activeUsersCount = document.getElementById('active-users-count');
  const inactiveUsersCount = document.getElementById('inactive-users-count');
  const navigationUsersCount = document.getElementById('navigation-users-count');
  const toast = document.getElementById('dashboard-toast');
  const toastIcon = document.getElementById('dashboard-toast-icon');
  const toastTitle = document.getElementById('dashboard-toast-title');
  const toastMessage = document.getElementById('dashboard-toast-message');
  const logoutButton = document.getElementById('logout-dashboard');
  const menuToggle = document.querySelector('.dashboard-menu-toggle');
  const overlay = document.querySelector('.dashboard-overlay');

  let users = [];
  let activeFilter = 'all';
  let selectedUserId = 0;
  let pendingDeleteId = 0;
  let busy = false;
  let toastTimer;

  function normalizeUser(user = {}) {
    return {
      id: Number(user.id || 0),
      name: String(user.name || '').trim(),
      email: String(user.email || '').trim(),
      role: String(user.role || 'admin').trim().toLowerCase(),
      status: String(user.status || 'inactive').trim().toLowerCase(),
      createdAt: String(user.created_at || ''),
      updatedAt: String(user.updated_at || ''),
    };
  }

  function isCurrentUser(user) {
    return Boolean(user && currentUserEmail && user.email.toLowerCase() === currentUserEmail);
  }

  async function request(action, payload = {}) {
    const response = await fetch(window.ullmanAjax.controllerUrl, {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: JSON.stringify({ action, ...payload }),
    });

    const raw = await response.text();
    let result;

    try {
      result = raw ? JSON.parse(raw) : {};
    } catch (_error) {
      throw new Error('The server returned an invalid response.');
    }

    if (response.status === 401 && result.requires_login) {
      window.location.replace(window.ullmanAjax.loginUrl);
      throw new Error('Your administrator session has expired.');
    }

    if (!response.ok || result.success !== true) {
      throw new Error(result.message || 'The request could not be completed.');
    }

    return result;
  }

  function setBusy(isBusy, label = '') {
    busy = isBusy;
    refreshButton.disabled = isBusy;
    createButton.disabled = isBusy;
    saveButton.disabled = isBusy;
    cancelEditButton.disabled = isBusy;
    editorState.classList.toggle('is-busy', isBusy);
    editorState.textContent = isBusy ? (label || 'Working...') : 'Ready';
  }

  function showToast(title, message, type = 'success') {
    window.clearTimeout(toastTimer);
    toast.classList.toggle('is-error', type === 'error');
    toastIcon.textContent = type === 'error' ? '!' : '✓';
    toastTitle.textContent = title;
    toastMessage.textContent = message;
    toast.classList.add('is-visible');
    toastTimer = window.setTimeout(() => toast.classList.remove('is-visible'), 4200);
  }

  function initials(name) {
    const parts = String(name).trim().split(/\s+/).filter(Boolean);
    return parts.slice(0, 2).map((part) => part.charAt(0)).join('').toUpperCase() || 'US';
  }

  function formatDate(value) {
    if (!value) return '—';
    const normalized = value.includes('T') ? value : value.replace(' ', 'T');
    const date = new Date(normalized);

    if (Number.isNaN(date.getTime())) return value;

    return new Intl.DateTimeFormat('en-GB', {
      day: '2-digit',
      month: 'short',
      year: 'numeric',
    }).format(date);
  }

  function updateCounts() {
    const activeCount = users.filter((user) => user.status === 'active').length;
    const inactiveCount = users.length - activeCount;
    totalUsersCount.textContent = String(users.length);
    activeUsersCount.textContent = String(activeCount);
    inactiveUsersCount.textContent = String(inactiveCount);
    navigationUsersCount.textContent = String(users.length);
  }

  function visibleUsers() {
    const query = String(searchInput.value || '').trim().toLowerCase();

    return users.filter((user) => {
      const matchesFilter = activeFilter === 'all' || user.status === activeFilter;
      const matchesQuery = !query || `${user.name} ${user.email}`.toLowerCase().includes(query);
      return matchesFilter && matchesQuery;
    });
  }

  function makeActionButton(label, title, className, onClick, disabled = false) {
    const button = document.createElement('button');
    button.type = 'button';
    button.textContent = label;
    button.title = title;
    button.setAttribute('aria-label', title);
    button.className = className;
    button.disabled = disabled;
    button.addEventListener('click', (event) => {
      event.stopPropagation();
      onClick();
    });
    return button;
  }

  function renderUsers() {
    const visible = visibleUsers();
    usersList.replaceChildren();
    directoryCount.textContent = visible.length === users.length
      ? `${users.length} ${users.length === 1 ? 'user' : 'users'}`
      : `${visible.length} of ${users.length}`;

    if (visible.length === 0) {
      const empty = document.createElement('p');
      empty.className = 'user-table__empty';
      empty.textContent = users.length === 0
        ? 'No dashboard users have been created yet.'
        : 'No users match this search or filter.';
      usersList.append(empty);
      updateCounts();
      return;
    }

    visible.forEach((user) => {
      const row = document.createElement('div');
      const identity = document.createElement('div');
      const avatar = document.createElement('span');
      const identityText = document.createElement('span');
      const name = document.createElement('strong');
      const email = document.createElement('small');
      const role = document.createElement('span');
      const status = document.createElement('span');
      const updated = document.createElement('time');
      const actions = document.createElement('div');
      const current = isCurrentUser(user);

      row.className = `user-row${user.id === selectedUserId ? ' is-selected' : ''}`;
      row.setAttribute('role', 'row');
      row.dataset.userId = String(user.id);
      identity.className = 'user-row__identity';
      identity.setAttribute('role', 'cell');
      avatar.className = 'user-row__avatar';
      avatar.textContent = initials(user.name);
      name.textContent = current ? `${user.name} (You)` : user.name;
      email.textContent = user.email;
      identityText.append(name, email);
      identity.append(avatar, identityText);
      role.className = 'user-row__role';
      role.setAttribute('role', 'cell');
      role.textContent = user.role;
      status.className = `user-status${user.status === 'active' ? '' : ' is-inactive'}`;
      status.setAttribute('role', 'cell');
      status.textContent = user.status;
      updated.className = 'user-row__date';
      updated.setAttribute('role', 'cell');
      updated.dateTime = user.updatedAt;
      updated.textContent = formatDate(user.updatedAt);
      actions.className = 'user-row__actions';
      actions.setAttribute('role', 'cell');
      actions.append(
        makeActionButton('Edit', `Edit ${user.name}`, 'user-action-edit', () => startEdit(user.id)),
        makeActionButton(user.status === 'active' ? 'Disable' : 'Enable', current ? 'Your current account must remain active' : `${user.status === 'active' ? 'Disable' : 'Enable'} ${user.name}`, 'user-action-status', () => toggleUserStatus(user.id), current),
        makeActionButton('Delete', current ? 'You cannot delete your own account' : `Delete ${user.name}`, 'user-action-delete', () => requestDelete(user.id), current),
      );
      row.append(identity, role, status, updated, actions);
      row.addEventListener('click', () => startEdit(user.id));
      usersList.append(row);
    });

    updateCounts();
  }

  function resetEditor({ focus = false } = {}) {
    selectedUserId = 0;
    form.reset();
    idInput.value = '';
    roleInput.value = 'admin';
    statusInput.value = 'active';
    emailInput.disabled = false;
    statusInput.disabled = false;
    passwordInput.required = true;
    passwordInput.type = 'password';
    passwordToggle.textContent = 'Show';
    passwordToggle.setAttribute('aria-pressed', 'false');
    passwordHelp.textContent = 'Required for new users. Use at least 8 characters.';
    statusHelp.textContent = 'Inactive accounts cannot sign in.';
    editorMode.textContent = 'New account';
    editorTitle.textContent = 'Add user';
    saveButton.textContent = 'Create user';
    recordMeta.hidden = true;
    renderUsers();
    if (focus) nameInput.focus({ preventScroll: false });
  }

  function startEdit(id) {
    const user = users.find((item) => item.id === Number(id));
    if (!user) return;
    const current = isCurrentUser(user);

    selectedUserId = user.id;
    idInput.value = String(user.id);
    nameInput.value = user.name;
    emailInput.value = user.email;
    emailInput.disabled = current;
    passwordInput.value = '';
    passwordInput.type = 'password';
    passwordInput.required = false;
    passwordToggle.textContent = 'Show';
    passwordToggle.setAttribute('aria-pressed', 'false');
    roleInput.value = 'admin';
    statusInput.value = user.status === 'active' ? 'active' : 'inactive';
    statusInput.disabled = current;
    passwordHelp.textContent = 'Leave blank to keep the current password.';
    statusHelp.textContent = current
      ? 'Your current account must remain active.'
      : 'Inactive accounts cannot sign in.';
    editorMode.textContent = current ? 'Current account' : 'Selected account';
    editorTitle.textContent = 'Edit user';
    saveButton.textContent = 'Save changes';
    recordId.textContent = String(user.id);
    recordCreated.textContent = formatDate(user.createdAt);
    recordUpdated.textContent = formatDate(user.updatedAt);
    recordMeta.hidden = false;
    renderUsers();
    nameInput.focus({ preventScroll: false });
  }

  function formPayload() {
    const selected = users.find((user) => user.id === selectedUserId);

    return {
      name: String(nameInput.value || '').trim(),
      email: emailInput.disabled && selected ? selected.email : String(emailInput.value || '').trim().toLowerCase(),
      password: String(passwordInput.value || ''),
      role: String(roleInput.value || 'admin'),
      status: statusInput.disabled && selected ? selected.status : String(statusInput.value || 'active'),
    };
  }

  async function loadUsers({ announce = false, preserveSelection = true } = {}) {
    setBusy(true, 'Loading...');

    try {
      const result = await request('read_users');
      users = Array.isArray(result.users) ? result.users.map(normalizeUser) : [];

      if (preserveSelection && selectedUserId && users.some((user) => user.id === selectedUserId)) {
        startEdit(selectedUserId);
      } else if (!preserveSelection) {
        resetEditor();
      } else {
        renderUsers();
      }

      if (announce) showToast('Users refreshed', 'The directory is up to date.');
    } catch (error) {
      users = [];
      renderUsers();
      showToast('Unable to load users', error.message, 'error');
    } finally {
      setBusy(false);
    }
  }

  function openDeleteDialog() {
    if (deleteDialog instanceof HTMLDialogElement && typeof deleteDialog.showModal === 'function') {
      deleteDialog.showModal();
      return;
    }

    deleteDialog.setAttribute('open', '');
  }

  function closeDeleteDialog() {
    pendingDeleteId = 0;
    if (deleteDialog instanceof HTMLDialogElement && deleteDialog.open) deleteDialog.close();
    else deleteDialog.removeAttribute('open');
  }

  function requestDelete(id) {
    const user = users.find((item) => item.id === Number(id));
    if (!user || isCurrentUser(user)) return;
    pendingDeleteId = user.id;
    deleteUserName.textContent = user.name;
    openDeleteDialog();
  }

  async function deleteUser() {
    const id = pendingDeleteId;
    if (!id) return;
    confirmDeleteButton.disabled = true;

    try {
      await request('delete_user', { id });
      closeDeleteDialog();
      if (selectedUserId === id) resetEditor();
      await loadUsers({ preserveSelection: true });
      showToast('User deleted', 'The administrator account was removed.');
    } catch (error) {
      showToast('Unable to delete user', error.message, 'error');
    } finally {
      confirmDeleteButton.disabled = false;
    }
  }

  async function toggleUserStatus(id) {
    if (busy) return;
    const user = users.find((item) => item.id === Number(id));
    if (!user || isCurrentUser(user)) return;
    const nextStatus = user.status === 'active' ? 'inactive' : 'active';

    setBusy(true, nextStatus === 'active' ? 'Activating...' : 'Disabling...');

    try {
      const result = await request('update_user', {
        id: user.id,
        name: user.name,
        email: user.email,
        password: '',
        role: 'admin',
        status: nextStatus,
      });
      selectedUserId = user.id;
      await loadUsers({ preserveSelection: true });
      showToast(
        nextStatus === 'active' ? 'User activated' : 'User disabled',
        result.message || 'The account status was updated.',
      );
    } catch (error) {
      showToast('Unable to update status', error.message, 'error');
    } finally {
      setBusy(false);
    }
  }

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (busy) return;

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const payload = formPayload();
    const editing = selectedUserId > 0;

    setBusy(true, editing ? 'Saving...' : 'Creating...');

    try {
      const result = await request(
        editing ? 'update_user' : 'create_user',
        editing ? { id: selectedUserId, ...payload } : payload,
      );
      const savedId = Number(result.user?.id || selectedUserId || 0);
      await loadUsers({ preserveSelection: false });
      if (savedId) startEdit(savedId);
      showToast(editing ? 'User updated' : 'User created', result.message || 'The user was saved successfully.');
    } catch (error) {
      showToast(editing ? 'Unable to update user' : 'Unable to create user', error.message, 'error');
    } finally {
      setBusy(false);
    }
  });

  searchInput.addEventListener('input', renderUsers);
  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      activeFilter = button.dataset.userFilter || 'all';
      filterButtons.forEach((item) => item.classList.toggle('is-active', item === button));
      renderUsers();
    });
  });
  refreshButton.addEventListener('click', () => loadUsers({ announce: true }));
  createButton.addEventListener('click', () => resetEditor({ focus: true }));
  cancelEditButton.addEventListener('click', () => resetEditor({ focus: true }));
  passwordToggle.addEventListener('click', () => {
    const willShow = passwordInput.type === 'password';
    passwordInput.type = willShow ? 'text' : 'password';
    passwordToggle.textContent = willShow ? 'Hide' : 'Show';
    passwordToggle.setAttribute('aria-pressed', String(willShow));
    passwordInput.focus({ preventScroll: true });
  });
  closeDeleteButton.addEventListener('click', closeDeleteDialog);
  cancelDeleteButton.addEventListener('click', closeDeleteDialog);
  confirmDeleteButton.addEventListener('click', deleteUser);
  deleteDialog.addEventListener('click', (event) => {
    if (event.target === deleteDialog) closeDeleteDialog();
  });

  logoutButton.addEventListener('click', async () => {
    logoutButton.disabled = true;

    try {
      await request('logout');
      window.location.replace(window.ullmanAjax.loginUrl);
    } catch (error) {
      showToast('Unable to log out', error.message, 'error');
      logoutButton.disabled = false;
    }
  });

  function setNavigation(open) {
    document.body.classList.toggle('is-dashboard-nav-open', open);
    menuToggle?.setAttribute('aria-expanded', String(open));
  }

  menuToggle?.addEventListener('click', () => {
    setNavigation(!document.body.classList.contains('is-dashboard-nav-open'));
  });
  overlay?.addEventListener('click', () => setNavigation(false));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      setNavigation(false);
      if (deleteDialog.open) closeDeleteDialog();
    }
  });

  resetEditor();
  loadUsers();
})();
