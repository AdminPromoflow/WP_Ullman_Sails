<?php
declare(strict_types=1);

$loginError = '';
$loginName = '';
$rememberLogin = false;
$adminUrl = admin_url();
$requestedRedirect = isset($_REQUEST['redirect_to'])
    ? wp_validate_redirect((string) wp_unslash($_REQUEST['redirect_to']), $adminUrl)
    : $adminUrl;

if (is_user_logged_in()) {
    wp_safe_redirect($requestedRedirect);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $loginName = isset($_POST['log'])
        ? sanitize_text_field((string) wp_unslash($_POST['log']))
        : '';
    $password = isset($_POST['pwd'])
        ? (string) wp_unslash($_POST['pwd'])
        : '';
    $rememberLogin = !empty($_POST['rememberme']);
    $nonce = isset($_POST['ullman_login_nonce'])
        ? sanitize_text_field((string) wp_unslash($_POST['ullman_login_nonce']))
        : '';

    if ($nonce === '' || !wp_verify_nonce($nonce, 'ullman_admin_login')) {
        $loginError = 'Your session expired. Please refresh the page and try again.';
    } elseif ($loginName === '' || $password === '') {
        $loginError = 'Enter your email or username and password.';
    } else {
        $user = wp_signon([
            'user_login' => $loginName,
            'user_password' => $password,
            'remember' => $rememberLogin,
        ], is_ssl());

        if (is_wp_error($user)) {
            $loginError = 'We could not sign you in. Check your details and try again.';
        } else {
            wp_safe_redirect($requestedRedirect);
            exit;
        }
    }
}

$pageDirectory = __DIR__;
$pageUrl = get_template_directory_uri() . '/pages/login-admin';
$loginCssVersion = ullman_file_version($pageDirectory . '/login-admin.css');
$loginJsVersion = ullman_file_version($pageDirectory . '/login-admin.js');
$photoUrl = get_template_directory_uri() . '/pages/Home/1_slider/img/cruising_sails_voyager.jpg';
$logoUrl = get_template_directory_uri() . '/pages/general/menu/img/logo.png';
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Admin Login | Ullman Sails</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo esc_url($pageUrl . '/login-admin.css?v=' . $loginCssVersion); ?>">
</head>
<body class="login-admin-page">
  <main class="login-admin">
    <section
      class="login-admin__visual"
      style="--login-photo: url('<?php echo esc_url($photoUrl); ?>')"
      aria-label="Ullman Sails yacht at sea"
    >
      <a class="login-admin__brand" href="<?php echo esc_url(ullman_page_url('home')); ?>" aria-label="Ullman Sails home">
        <img src="<?php echo esc_url($logoUrl); ?>" alt="Ullman Sails">
      </a>

      <div class="login-admin__visual-copy">
        <span class="login-admin__rule" aria-hidden="true"></span>
        <p>Performance, craftsmanship<br>and confidence at sea.</p>
      </div>
    </section>

    <section class="login-admin__panel" aria-labelledby="login-title">
      <a class="login-admin__back ullman-context-back" href="<?php echo esc_url(ullman_page_url('home')); ?>">
        <span aria-hidden="true">&#8592;</span>
        Back to website
      </a>

      <div class="login-admin__content">
        <div class="login-admin__heading">
          <p class="login-admin__eyebrow">Admin portal</p>
          <h1 id="login-title">Welcome back</h1>
          <p>Sign in to manage the Ullman Sails website.</p>
        </div>

        <?php if ($loginError !== ''): ?>
          <div class="login-admin__alert" id="login-error" role="alert">
            <?php echo esc_html($loginError); ?>
          </div>
        <?php endif; ?>

        <form class="login-admin__form" method="post" action="<?php echo esc_url(ullman_page_url('login-admin')); ?>">
          <?php wp_nonce_field('ullman_admin_login', 'ullman_login_nonce'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_attr($requestedRedirect); ?>">

          <div class="login-admin__field">
            <label for="admin-login-name">Email or username</label>
            <input
              id="admin-login-name"
              name="log"
              type="text"
              value="<?php echo esc_attr($loginName); ?>"
              autocomplete="username"
              autocapitalize="none"
              spellcheck="false"
              placeholder="Enter your email or username"
              <?php echo $loginError !== '' ? 'aria-describedby="login-error"' : ''; ?>
              required
              autofocus
            >
          </div>

          <div class="login-admin__field">
            <label for="admin-login-password">Password</label>
            <div class="login-admin__password">
              <input
                id="admin-login-password"
                name="pwd"
                type="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                <?php echo $loginError !== '' ? 'aria-describedby="login-error"' : ''; ?>
                required
              >
              <button class="login-admin__password-toggle" type="button" aria-controls="admin-login-password" aria-pressed="false">
                Show
              </button>
            </div>
          </div>

          <label class="login-admin__remember">
            <input type="checkbox" name="rememberme" value="forever" <?php checked($rememberLogin); ?>>
            <span>Remember me</span>
          </label>

          <button class="login-admin__submit" type="submit" data-default-label="Sign in">
            <span>Sign in</span>
            <span aria-hidden="true">&#8594;</span>
          </button>
        </form>

        <p class="login-admin__notice">Authorized personnel only.</p>
      </div>
    </section>
  </main>

  <script src="<?php echo esc_url($pageUrl . '/login-admin.js?v=' . $loginJsVersion); ?>" defer></script>
</body>
</html>
