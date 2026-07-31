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
function ullman_page_url(string $key): string {
    $normalizedKey = sanitize_title($key);
    $routes = ullman_page_routes();

    if ($normalizedKey === 'home' || !isset($routes[$normalizedKey])) {
        return home_url('/');
    }

    return home_url('/' . $routes[$normalizedKey]['slug'] . '/');
}

/**
 * Routes pretty public URLs to the corresponding PHP page template.
 */
function ullman_register_page_routes(): void {
    foreach (ullman_page_routes() as $key => $route) {
        if ($key === 'home') {
            continue;
        }

        add_rewrite_rule(
            '^' . preg_quote($route['slug'], '/') . '/?$',
            'index.php?ullman_page=' . $key,
            'top'
        );
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

    return is_file($pageTemplate) ? $pageTemplate : $template;
}
add_filter('template_include', 'ullman_load_page_template');

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
