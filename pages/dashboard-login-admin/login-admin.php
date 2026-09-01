<?php
declare(strict_types=1);

$pageDirectory = __DIR__;
$pageUrl = get_template_directory_uri() . '/pages/dashboard-login-admin';
$loginCssVersion = filemtime($pageDirectory . '/login-admin.css');
$loginJsVersion = filemtime($pageDirectory . '/login-admin.js');
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
      <a class="login-admin__back" href="<?php echo esc_url(ullman_page_url('home')); ?>">
        <span aria-hidden="true">&#8592;</span>
        Back to website
      </a>

      <div class="login-admin__content">
        <div class="login-admin__heading">
          <p class="login-admin__eyebrow">Admin portal</p>
          <h1 id="login-title">Welcome back</h1>
          <p>Sign in to manage the Ullman Sails website.</p>
        </div>

        <form class="login-admin__form" method="post" action="" data-interface-only>
          <div class="login-admin__field">
            <label for="login-email">Email or username</label>
            <input
              id="login-email"
              name="log"
              type="text"
              autocomplete="username"
              autocapitalize="none"
              spellcheck="false"
              placeholder="Enter your email or username"
              required
              autofocus
            >
          </div>

          <div class="login-admin__field">
            <label for="login-password">Password</label>
            <div class="login-admin__password">
              <input
                id="login-password"
                name="pwd"
                type="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                required
              >
              <button class="login-admin__password-toggle" type="button" aria-controls="login-password" aria-pressed="false">
                Show
              </button>
            </div>
          </div>

          <label class="login-admin__remember">
            <input type="checkbox" name="rememberme" value="forever">
            <span>Remember me</span>
          </label>

          <button id="submit-login" class="login-admin__submit" type="submit" data-default-label="Sign in">
            <span>Sign in</span>
            <span aria-hidden="true">&#8594;</span>
          </button>
        </form>

        <p class="login-admin__notice">Authorized personnel only.</p>
      </div>
    </section>
  </main>

  <?php ullman_ajax_config(); ?>
  <script src="<?php echo esc_url($pageUrl . '/login-admin.js?v=' . $loginJsVersion); ?>" defer></script>
</body>
</html>
