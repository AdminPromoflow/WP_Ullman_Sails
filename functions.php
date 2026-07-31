<?php
/**
 * Discovers every public page template stored in /pages. Home is the canonical
 * front page; every other directory becomes its lowercase, hyphenated slug.
 */
function ullman_page_routes(): array {
    static $routes = null;

    if ($routes !== null) {
        return $routes;
    }

    $routes = [
        'home' => [
            'slug' => '',
            'template' => 'Home/index.php',
        ],
    ];

    $pagesDirectory = get_template_directory() . '/pages';

    if (!is_dir($pagesDirectory)) {
        return $routes;
    }

    foreach (scandir($pagesDirectory) as $directory) {
        if ($directory === '.' || $directory === '..' || $directory === 'Home' || $directory === 'general') {
            continue;
        }

        $template = $pagesDirectory . '/' . $directory . '/index.php';

        if (!is_file($template)) {
            continue;
        }

        $key = sanitize_title($directory);
        $routes[$key] = [
            'slug' => $key,
            'template' => $directory . '/index.php',
        ];
    }

    return $routes;
}

/**
 * Returns a public WordPress URL. It never exposes a theme file path.
 */
function ullman_file_version(string $file): string {
    static $versions = [];

    if (isset($versions[$file])) {
        return $versions[$file];
    }

    if (!is_file($file)) {
        return $versions[$file] = (string) time();
    }

    $hash = hash_file('sha256', $file);

    return $versions[$file] = is_string($hash)
        ? substr($hash, 0, 12)
        : (string) filemtime($file);
}

function ullman_page_url(string $key): string {
    $normalizedKey = sanitize_title($key);
    $routes = ullman_page_routes();

    $aliases = [
        'about_us' => 'AboutUs',
        'about-us' => 'AboutUs',
        'contact_us' => 'ContactUs',
        'contact-us' => 'ContactUs',
        'sail_care' => 'SailCare',
        'sail-care' => 'SailCare',
        'sail_types' => 'SailTypes',
        'sail-types' => 'SailTypes',
        'new_sail_quote' => 'New_Sail_Quote',
        'new-sail-quote' => 'New_Sail_Quote',
        'new_repair_quote' => 'New_Repair_Quote',
        'new-repair-quote' => 'New_Repair_Quote',
        'new_cover_quote' => 'New_Cover_Quote',
        'new-cover-quote' => 'New_Cover_Quote',
        'services_1_sails_repair' => 'Services-1.SailsRepair',
        'services-1-sails-repair' => 'Services-1.SailsRepair',
        'services_2_sails_cleaning' => 'Services-2.SailsCleaning',
        'services-2-sails-cleaning' => 'Services-2.SailsCleaning',
        'services_3_canvas_repair' => 'Services-3.CanvasRepair',
        'services-3-canvas-repair' => 'Services-3.CanvasRepair',
        'racing-2-endurance' => 'cruising_endurance',
    ];

    if (isset($aliases[$normalizedKey])) {
        $normalizedKey = sanitize_title($aliases[$normalizedKey]);
    }

    if ($normalizedKey === 'home' || !isset($routes[$normalizedKey])) {
        $homeTemplate = get_template_directory() . '/pages/Home/index.php';
        $homeVersion = ullman_file_version($homeTemplate);

        return add_query_arg('v', $homeVersion, home_url('/'));
    }

    $route = $routes[$normalizedKey];
    $template = get_template_directory() . '/pages/' . $route['template'];
    $version = ullman_file_version($template);

    return add_query_arg('v', $version, home_url('/' . $route['slug'] . '/'));
}

/**
 * Adds the current template version to direct visits as well as navigation.
 */
function ullman_redirect_to_versioned_page(): void {
    if (
        is_admin()
        || wp_doing_ajax()
        || ($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET'
    ) {
        return;
    }

    $key = get_query_var('ullman_page');

    if ((!is_string($key) || $key === '') && (is_front_page() || is_home())) {
        $key = 'home';
    }

    $routes = ullman_page_routes();
    $normalizedKey = sanitize_title((string) $key);

    if ($normalizedKey !== 'home' && !isset($routes[$normalizedKey])) {
        return;
    }

    $versionedUrl = ullman_page_url($normalizedKey ?: 'home');
    $currentVersion = isset($_GET['v']) ? (string) wp_unslash($_GET['v']) : '';
    $expectedVersion = (string) wp_parse_url($versionedUrl, PHP_URL_QUERY);

    if ($currentVersion === '' || $expectedVersion !== 'v=' . $currentVersion) {
        wp_safe_redirect($versionedUrl, 302);
        exit;
    }
}
add_action('template_redirect', 'ullman_redirect_to_versioned_page');

/**
 * Routes pretty public URLs to the corresponding PHP page template.
 */
function ullman_register_page_routes(): void {
    $routeSlugs = [];

    foreach (ullman_page_routes() as $key => $route) {
        if ($key === 'home') {
            continue;
        }

        $routeSlugs[] = $route['slug'];

        add_rewrite_rule(
            '^' . preg_quote($route['slug'], '/') . '/?$',
            'index.php?ullman_page=' . $key,
            'top'
        );
    }

    /* Refresh WordPress permalinks once whenever the available routes change. */
    $routesVersion = md5(implode('|', $routeSlugs));

    if (get_option('ullman_page_routes_version') !== $routesVersion) {
        flush_rewrite_rules(false);
        update_option('ullman_page_routes_version', $routesVersion, false);
    }
}
add_action('init', 'ullman_register_page_routes');

function ullman_register_query_vars(array $vars): array {
    $vars[] = 'ullman_page';

    return $vars;
}
add_filter('query_vars', 'ullman_register_query_vars');

function ullman_load_page_template(string $template): string {
    $key = get_query_var('ullman_page');
    $routes = ullman_page_routes();

    if (!is_string($key) || !isset($routes[$key])) {
        return $template;
    }

    $pageTemplate = get_template_directory() . '/pages/' . $routes[$key]['template'];

    if (!is_file($pageTemplate)) {
        return $template;
    }

    ob_start('ullman_rewrite_legacy_asset_urls');

    return $pageTemplate;
}
add_filter('template_include', 'ullman_load_page_template');

/**
 * Preserves legacy section markup while serving it from WordPress permalinks.
 * A source path such as ../Cruising/section/style.css becomes the public theme
 * asset URL /wp-content/themes/<theme>/pages/Cruising/section/style.css.
 */
function ullman_rewrite_legacy_asset_urls(string $html): string {
    $pagesUrl = rtrim(get_template_directory_uri(), '/') . '/pages/';

    return preg_replace_callback(
        '/\b(href|src|poster)=([' . "\"'" . '])\.\.\/([^' . "\"'" . ']+)\2/i',
        static function (array $match) use ($pagesUrl): string {
            return $match[1] . '=' . $match[2]
                . esc_url($pagesUrl . ltrim($match[3], '/'))
                . $match[2];
        },
        $html
    );
}

/**
 * Prints the AJAX endpoint and nonce before legacy section scripts execute.
 */
function ullman_ajax_config(): void {
    static $rendered = false;

    if ($rendered) {
        return;
    }

    $rendered = true;
    printf(
        '<script>window.ullmanAjax=%s;</script>',
        wp_json_encode([
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ullman_forms'),
        ])
    );
}

/**
 * WordPress AJAX bridge for the existing form-mail controller.
 */
function ullman_handle_forms_ajax(): void {
    if (!check_ajax_referer('ullman_forms', 'nonce', false)) {
        wp_send_json_error(['message' => 'Invalid request.'], 403);
    }

    $formAction = isset($_POST['form_action'])
        ? sanitize_key(wp_unslash($_POST['form_action']))
        : '';

    if ($formAction === '') {
        wp_send_json_error(['message' => 'Missing form action.'], 400);
    }

    $_POST['action'] = $formAction;

    require_once get_template_directory() . '/controller/controller.php';

    ob_start();
    $handler = new ApiHandlerSendForms();
    $handler->handleRequest();
    $response = ob_get_clean();

    wp_die($response, '', ['response' => 200]);
}
add_action('wp_ajax_ullman_send_forms', 'ullman_handle_forms_ajax');
add_action('wp_ajax_nopriv_ullman_send_forms', 'ullman_handle_forms_ajax');
