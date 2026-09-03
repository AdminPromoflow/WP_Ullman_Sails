<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_name('ULLMAN_ADMIN_SESSION');
    session_start();
}

$isAuthenticated = !empty($_SESSION['ullman_admin_authenticated']);
$adminEmail = isset($_SESSION['ullman_admin_email'])
    ? (string) $_SESSION['ullman_admin_email']
    : '';
$adminRole = isset($_SESSION['ullman_admin_role'])
    ? strtolower((string) $_SESSION['ullman_admin_role'])
    : '';

if (!$isAuthenticated || $adminEmail === '' || $adminRole !== 'admin') {
    wp_safe_redirect(ullman_page_url('dashboard-login-admin'));
    exit;
}

$pageDirectory = __DIR__;
$pageUrl = get_template_directory_uri() . '/pages/dashboard-user-manager';
$dashboardUrl = get_template_directory_uri() . '/pages/dashboard-admin';
$baseCssVersion = ullman_file_version(get_template_directory() . '/pages/dashboard-admin/dashboard-admin.css');
$pageCssVersion = ullman_file_version($pageDirectory . '/dashboard-user-manager.css');
$pageJsVersion = ullman_file_version($pageDirectory . '/dashboard-user-manager.js');
$logoUrl = get_template_directory_uri() . '/pages/general/menu/img/logo.png';
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>User Manager | Ullman Sails</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo esc_url($dashboardUrl . '/dashboard-admin.css?v=' . $baseCssVersion); ?>">
  <link rel="stylesheet" href="<?php echo esc_url($pageUrl . '/dashboard-user-manager.css?v=' . $pageCssVersion); ?>">
</head>
<body class="dashboard-admin-page user-manager-page">
  <div class="dashboard-admin">
    <aside class="dashboard-sidebar" id="dashboard-sidebar" aria-label="Dashboard navigation">
      <div class="dashboard-sidebar__top">
        <a class="dashboard-sidebar__brand" href="<?php echo esc_url(ullman_page_url('home')); ?>" aria-label="Ullman Sails home">
          <img src="<?php echo esc_url($logoUrl); ?>" alt="Ullman Sails">
        </a>
        <p class="dashboard-sidebar__caption">Content manager</p>
      </div>

      <nav class="dashboard-nav" aria-label="Admin sections">
        <p class="dashboard-nav__label">Workspace</p>
        <a class="dashboard-nav__item" href="<?php echo esc_url(ullman_page_url('dashboard-admin')); ?>">
          <span class="dashboard-nav__number" aria-hidden="true">01</span>
          <span>News</span>
        </a>
        <a class="dashboard-nav__item is-active" href="<?php echo esc_url(ullman_page_url('dashboard-user-manager')); ?>" aria-current="page">
          <span class="dashboard-nav__number" aria-hidden="true">02</span>
          <span>Users</span>
          <span class="dashboard-nav__count" id="navigation-users-count">0</span>
        </a>
      </nav>

      <div class="dashboard-sidebar__footer">
        <a href="<?php echo esc_url(ullman_page_url('home')); ?>" target="_blank" rel="noopener noreferrer">View website <span aria-hidden="true">&#8599;</span></a>
        <a href="<?php echo esc_url(ullman_page_url('dashboard-login-admin')); ?>">Return to login</a>
      </div>
    </aside>

    <button class="dashboard-overlay" type="button" aria-label="Close navigation" tabindex="-1"></button>

    <main class="dashboard-main">
      <header class="dashboard-topbar">
        <div class="dashboard-topbar__left">
          <button class="dashboard-menu-toggle" type="button" aria-controls="dashboard-sidebar" aria-expanded="false">
            <span></span><span></span><span></span>
            <span class="dashboard-sr-only">Open navigation</span>
          </button>
          <p><span>Dashboard</span><span aria-hidden="true">/</span><strong>Users</strong></p>
        </div>
        <div class="dashboard-topbar__right">
          <div class="dashboard-profile" aria-label="Current administrator">
            <span class="dashboard-profile__status" aria-hidden="true"></span>
            <span class="dashboard-profile__name"><?php echo esc_html($adminEmail); ?></span>
            <span class="dashboard-profile__avatar" aria-hidden="true">AD</span>
          </div>
          <button id="logout-dashboard" class="dashboard-logout" type="button">Logout</button>
        </div>
      </header>

      <div class="dashboard-content">
        <section class="dashboard-heading" aria-labelledby="user-manager-title">
          <div>
            <p class="dashboard-heading__eyebrow">Administration</p>
            <h1 id="user-manager-title">User manager</h1>
            <p>Create administrator accounts, update their access and disable users who should no longer sign in.</p>
          </div>
          <div class="dashboard-heading__actions">
            <button class="dashboard-create-button" id="create-user" type="button"><span aria-hidden="true">+</span> New user</button>
          </div>
        </section>

        <section class="dashboard-stats" aria-label="User overview">
          <article>
            <p>Total users</p>
            <strong id="total-users-count">0</strong>
            <span>Administrator accounts</span>
          </article>
          <article>
            <p>Active users</p>
            <strong id="active-users-count">0</strong>
            <span>Can access the dashboard</span>
          </article>
          <article>
            <p>Inactive users</p>
            <strong id="inactive-users-count">0</strong>
            <span>Access is currently blocked</span>
          </article>
        </section>

        <section class="user-manager-workspace" aria-label="User administration">
          <section class="user-directory" aria-labelledby="user-directory-title">
            <header class="user-panel-header">
              <div>
                <p class="dashboard-kicker">Directory</p>
                <h2 id="user-directory-title">Dashboard users</h2>
              </div>
              <div class="user-panel-header__tools">
                <span class="user-directory__count" id="user-directory-count">0 users</span>
                <button class="user-refresh" id="refresh-users" type="button" aria-label="Refresh users">Refresh</button>
              </div>
            </header>

            <div class="user-directory__tools">
              <label class="user-search" for="user-search-input">
                <span class="dashboard-sr-only">Search users</span>
                <input id="user-search-input" type="search" placeholder="Search name or email..." autocomplete="off">
                <span aria-hidden="true">&#8981;</span>
              </label>
              <div class="user-filters" role="group" aria-label="Filter users">
                <button class="is-active" type="button" data-user-filter="all">All</button>
                <button type="button" data-user-filter="active">Active</button>
                <button type="button" data-user-filter="inactive">Inactive</button>
              </div>
            </div>

            <div class="user-table" role="table" aria-label="Ullman Sails dashboard users">
              <div class="user-table__head" role="row">
                <span role="columnheader">User</span>
                <span role="columnheader">Role</span>
                <span role="columnheader">Status</span>
                <span role="columnheader">Updated</span>
                <span role="columnheader" class="dashboard-sr-only">Actions</span>
              </div>
              <div class="user-table__body" id="users-list" role="rowgroup" aria-live="polite">
                <p class="user-table__empty">Loading users...</p>
              </div>
            </div>
          </section>

          <aside class="user-editor" aria-labelledby="user-editor-title">
            <header class="user-panel-header">
              <div>
                <p class="dashboard-kicker" id="user-editor-mode">New account</p>
                <h2 id="user-editor-title">Add user</h2>
              </div>
              <span class="user-editor__state" id="user-editor-state">Ready</span>
            </header>

            <form id="user-editor-form" class="user-editor__form" action="" method="post">
              <input id="user-id" type="hidden" value="">

              <label class="user-field" for="user-name">
                <span>Full name</span>
                <input id="user-name" name="name" type="text" maxlength="150" autocomplete="name" required>
              </label>

              <label class="user-field" for="user-email">
                <span>Email address</span>
                <input id="user-email" name="email" type="email" maxlength="255" autocomplete="email" required>
              </label>

              <label class="user-field" for="user-password">
                <span>Password</span>
                <div class="user-password-control">
                  <input id="user-password" name="password" type="password" minlength="8" maxlength="72" autocomplete="new-password">
                  <button id="toggle-user-password" type="button" aria-controls="user-password" aria-pressed="false">Show</button>
                </div>
                <small id="password-help">Required for new users. Use at least 8 characters.</small>
              </label>

              <label class="user-field" for="user-role-display">
                <span>Role</span>
                <input id="user-role-display" type="text" value="Administrator" disabled>
                <input id="user-role" name="role" type="hidden" value="admin">
                <small>Only administrators can access this dashboard.</small>
              </label>

              <label class="user-field" for="user-status">
                <span>Account status</span>
                <select id="user-status" name="status">
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
                <small id="status-help">Inactive accounts cannot sign in.</small>
              </label>

              <dl class="user-record-meta" id="user-record-meta" hidden>
                <div>
                  <dt>User ID</dt>
                  <dd id="user-record-id">—</dd>
                </div>
                <div>
                  <dt>Created</dt>
                  <dd id="user-record-created">—</dd>
                </div>
                <div>
                  <dt>Last updated</dt>
                  <dd id="user-record-updated">—</dd>
                </div>
              </dl>

              <div class="user-editor__actions">
                <button class="dashboard-button dashboard-button--secondary" id="cancel-user-edit" type="button">Clear</button>
                <button class="dashboard-button dashboard-button--primary" id="save-user" type="submit">Create user</button>
              </div>
            </form>
          </aside>
        </section>
      </div>
    </main>
  </div>

  <dialog class="dashboard-dialog dashboard-dialog--confirm" id="delete-user-dialog" aria-labelledby="delete-user-title">
    <div class="dashboard-dialog__surface">
      <header class="dashboard-dialog__header">
        <div>
          <p class="dashboard-kicker">Delete user</p>
          <h2 id="delete-user-title">Delete this account?</h2>
        </div>
        <button class="dashboard-dialog__close" id="close-delete-user" type="button" aria-label="Close delete confirmation">&#10005;</button>
      </header>
      <div class="dashboard-confirmation">
        <span aria-hidden="true">!</span>
        <p>The account for <strong id="delete-user-name"></strong> will be permanently removed. Users with page activity must be made inactive instead.</p>
      </div>
      <footer class="dashboard-dialog__footer">
        <button class="dashboard-button dashboard-button--secondary" id="cancel-delete-user" type="button">Cancel</button>
        <button class="dashboard-button dashboard-button--danger" id="confirm-delete-user" type="button">Delete user</button>
      </footer>
    </div>
  </dialog>

  <div class="dashboard-toast" id="dashboard-toast" role="status" aria-live="polite">
    <span id="dashboard-toast-icon" aria-hidden="true">&#10003;</span>
    <div><strong id="dashboard-toast-title">User manager</strong><small id="dashboard-toast-message"></small></div>
  </div>

  <script>
    window.ullmanUserManager = <?php echo wp_json_encode(array(
        'currentUserEmail' => $adminEmail,
    )); ?>;
  </script>
  <?php ullman_ajax_config(); ?>
  <script src="<?php echo esc_url($pageUrl . '/dashboard-user-manager.js?v=' . $pageJsVersion); ?>" defer></script>
</body>
</html>
