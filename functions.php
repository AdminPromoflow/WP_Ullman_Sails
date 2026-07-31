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

/**
 * Changes whenever PHP, CSS or JavaScript inside a page directory changes.
 */
function ullman_directory_version(string $directory): string {
    static $versions = [];

    if (isset($versions[$directory])) {
        return $versions[$directory];
    }

    if (!is_dir($directory)) {
        return $versions[$directory] = (string) time();
    }

    $files = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }

        $extension = strtolower($file->getExtension());

        if (in_array($extension, ['php', 'css', 'js'], true)) {
            $files[] = $file->getPathname();
        }
    }

    sort($files, SORT_STRING);
    $context = hash_init('sha256');

    foreach ($files as $file) {
        hash_update($context, $file . ':' . ullman_file_version($file) . ';');
    }

    return $versions[$directory] = substr(hash_final($context), 0, 12);
}

/**
 * A lightweight signature of every public page resource.
 *
 * This is intentionally based on path, modification time, and size instead of
 * hashing media files: the pages directory contains large images, and reading
 * all of them on every request would slow down the site. Any normal deployment
 * or edit changes at least one of those values, so the public page version is
 * refreshed before WordPress renders the page.
 */
function ullman_site_version(): string {
    static $version = null;

    if ($version !== null) {
        return $version;
    }

    $themeDirectory = get_template_directory();
    $files = [
        $themeDirectory . '/functions.php',
        $themeDirectory . '/index.php',
        $themeDirectory . '/style.css',
    ];
    $pagesDirectory = $themeDirectory . '/pages';

    if (is_dir($pagesDirectory)) {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($pagesDirectory, FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }
    }

    sort($files, SORT_STRING);
    $context = hash_init('sha256');

    foreach ($files as $file) {
        $mtime = @filemtime($file);
        $size = @filesize($file);

        hash_update(
            $context,
            $file . ':' . ($mtime === false ? '0' : (string) $mtime)
            . ':' . ($size === false ? '0' : (string) $size) . ';'
        );
    }

    return $version = substr(hash_final($context), 0, 12);
}

/**
 * Every public resource affects every page version. This keeps links generated
 * from any menu, footer, or cached browser tab aligned with the current site.
 */
function ullman_shared_version(): string {
    static $version = null;

    if ($version !== null) {
        return $version;
    }

    return $version = ullman_site_version();
}

function ullman_page_version(string $template): string {
    return substr(
        hash(
            'sha256',
            ullman_directory_version(dirname($template)) . '|' . ullman_shared_version()
        ),
        0,
        12
    );
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
        $homeVersion = ullman_page_version($homeTemplate);

        return add_query_arg('v', $homeVersion, home_url('/'));
    }

    $route = $routes[$normalizedKey];
    $template = get_template_directory() . '/pages/' . $route['template'];
    $version = ullman_page_version($template);

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

    /* Public templates are under active migration; never cache their HTML. */
    nocache_headers();

    if (!headers_sent()) {
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0', true);
        header('Expires: Wed, 11 Jan 1984 05:00:00 GMT', true);
    }

    $versionedUrl = ullman_page_url($normalizedKey ?: 'home');
    $versionedQuery = (string) wp_parse_url($versionedUrl, PHP_URL_QUERY);
    parse_str($versionedQuery, $versionedArgs);
    $expectedVersion = isset($versionedArgs['v']) ? (string) $versionedArgs['v'] : '';
    $currentVersion = isset($_GET['v']) ? (string) wp_unslash($_GET['v']) : '';

    if ($expectedVersion === '' || !hash_equals($expectedVersion, $currentVersion)) {
        $redirectArgs = wp_unslash($_GET);
        $redirectArgs['v'] = $expectedVersion;
        $redirectUrl = add_query_arg(
            $redirectArgs,
            remove_query_arg('v', $versionedUrl)
        );

        wp_safe_redirect($redirectUrl, 302);
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

    if ((!is_string($key) || $key === '') && (is_front_page() || is_home())) {
        $key = 'home';
    }

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
    $routes = ullman_page_routes();
    $pageKey = get_query_var('ullman_page');
    $pageDirectory = is_string($pageKey) && isset($routes[$pageKey])
        ? trim(str_replace('\\', '/', dirname($routes[$pageKey]['template'])), '/')
        : '';

    $publicAssetUrl = static function (string $path) use ($pagesUrl): string {
        $normalizedPath = ltrim($path, '/');

        /* Hostinger is case-sensitive: the real directory is /pages/Home. */
        $normalizedPath = (string) preg_replace(
            '/^home\//i',
            'Home/',
            $normalizedPath
        );

        return esc_url($pagesUrl . $normalizedPath);
    };

    $html = (string) preg_replace_callback(
        '/\b(href|src|poster)=([' . "\"'" . '])\.\.\/([^' . "\"'" . ']+)\2/i',
        static function (array $match) use ($publicAssetUrl): string {
            return $match[1] . '=' . $match[2]
                . $publicAssetUrl($match[3])
                . $match[2];
        },
        $html
    );

    /*
     * Breadcrumb markup is shared but was historically copied into every page
     * directory. Serve one canonical stylesheet so every navigation has the
     * same responsive spacing, colours, and interaction states.
     */
    $navigationCssFs = get_template_directory() . '/pages/general/navigation/navigation.css';
    $navigationCssUrl = $pagesUrl . 'general/navigation/navigation.css';
    $navigationCssVersion = ullman_file_version($navigationCssFs);

    $html = (string) preg_replace_callback(
        '/\bhref=([' . "\"'" . '])'
            . preg_quote($pagesUrl, '/')
            . '[^\/' . "\"'" . ']+\/navigation\/navigation\.css(?:\?[^' . "\"'" . ']*)?\1/i',
        static function (array $match) use ($navigationCssUrl, $navigationCssVersion): string {
            return 'href=' . $match[1]
                . esc_url($navigationCssUrl . '?v=' . $navigationCssVersion)
                . $match[1];
        },
        $html
    );

    /*
     * Section templates historically use paths such as
     * "2_handling_and_performance/handling_and_performance.css". Those paths
     * work only when the PHP file is opened directly. On a WordPress permalink
     * the browser instead requests /racing-race-series/2_handling..., causing
     * 404 responses. Resolve existing local assets from the current page's
     * directory to their public theme URL.
     */
    if ($pageDirectory !== '') {
        $pageAssetsDirectory = get_template_directory() . '/pages/' . $pageDirectory . '/';

        $html = (string) preg_replace_callback(
            '/\b(href|src|poster)=([' . "\"'" . '])'
                . '(?![a-z][a-z0-9+.-]*:|\/\/|\/|#|\.\.\/)'
                . '([^' . "\"'" . ']+\.(?:css|js|png|jpe?g|gif|webp|svg|avif|ico|mp4|webm)(?:\?[^' . "\"'" . ']*)?)\2/i',
            static function (array $match) use ($pagesUrl, $pageDirectory, $pageAssetsDirectory): string {
                $assetPath = (string) wp_parse_url($match[3], PHP_URL_PATH);
                $assetPath = rawurldecode(ltrim($assetPath, '/'));

                if (
                    $assetPath === ''
                    || str_contains($assetPath, '..')
                    || !is_file($pageAssetsDirectory . $assetPath)
                ) {
                    return $match[0];
                }

                return $match[1] . '=' . $match[2]
                    . esc_url($pagesUrl . $pageDirectory . '/' . $match[3])
                    . $match[2];
            },
            $html
        );
    }

    /* Also migrate legacy paths inside inline CSS background-image declarations. */
    $html = (string) preg_replace_callback(
        '/url\(\s*([' . "\"'" . ']?)\.\.\/([^)' . "\"'" . ']+)\1\s*\)/i',
        static function (array $match) use ($publicAssetUrl): string {
            $quote = $match[1] !== '' ? $match[1] : '"';

            return 'url(' . $quote . $publicAssetUrl($match[2]) . $quote . ')';
        },
        $html
    );

    /*
     * Load the shared design system after legacy section styles. This lets one
     * accessible, responsive typographic system govern every public template
     * while the individual page markup is progressively modernised.
     */
    $foundationsFs = get_template_directory() . '/pages/general/design-system/foundations.css';
    $foundationsUrl = $pagesUrl . 'general/design-system/foundations.css';
    $foundationsTag = '<link rel="stylesheet" href="'
        . esc_url($foundationsUrl . '?v=' . ullman_file_version($foundationsFs))
        . '">';
    $lastBodyClose = strripos($html, '</body>');

    if ($lastBodyClose === false) {
        return $html . $foundationsTag;
    }

    return substr($html, 0, $lastBodyClose)
        . $foundationsTag
        . substr($html, $lastBodyClose);
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
