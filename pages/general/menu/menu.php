<?php
declare(strict_types=1);

$menuCssFs = __DIR__ . '/menu.css';
$menuJsFs  = __DIR__ . '/menu.js';

$menuLogoFs       = __DIR__ . '/img/logo.png';
$menuLogoMobileFs = __DIR__ . '/img/logo_mobile.png';
$menuSearchFs     = __DIR__ . '/img/search.png';
$menuOpenFs       = __DIR__ . '/img/menu.png';
$menuCloseFs      = __DIR__ . '/img/close.png';
$menuSearchDataFs = dirname(__DIR__, 2) . '/Search/search/search-data.js';

$menuCssV = ullman_file_version($menuCssFs);
$menuJsV  = ullman_file_version($menuJsFs);

$menuLogoV       = ullman_file_version($menuLogoFs);
$menuLogoMobileV = ullman_file_version($menuLogoMobileFs);
$menuSearchV     = ullman_file_version($menuSearchFs);
$menuOpenV       = ullman_file_version($menuOpenFs);
$menuCloseV      = ullman_file_version($menuCloseFs);
$menuSearchDataV = ullman_file_version($menuSearchDataFs);
$menuUrl = get_template_directory_uri() . '/pages/general/menu';
$searchDataUrl = get_template_directory_uri() . '/pages/Search/search/search-data.js';

/* Maps the legacy search index paths to their real, versioned WordPress URLs. */
$menuPageUrls = [];

foreach (ullman_page_routes() as $routeKey => $route) {
  $directory = strtok($route['template'], '/');

  if (is_string($directory) && $directory !== '') {
    $menuPageUrls[$directory] = ullman_page_url($routeKey);
  }
}
?>

<link rel="stylesheet" href="<?php echo esc_url($menuUrl . '/menu.css?v=' . $menuCssV); ?>">

<section class="ull-nav-wrap" id="menuContainer">
  <header class="ull-nav" id="mainMenu">
    <a class="ull-nav__brand" href="<?php echo esc_url(ullman_page_url('home')); ?>" aria-label="Home">
      <img class="ull-nav__logo" id="logoOpenHome" src="<?php echo esc_url($menuUrl . '/img/logo.png?v=' . $menuLogoV); ?>" alt="Ullman Sails">
      <img class="ull-nav__logo--mobile" id="logoOpenHomeMobile" src="<?php echo esc_url($menuUrl . '/img/logo_mobile.png?v=' . $menuLogoMobileV); ?>" alt="Ullman Sails">
    </a>

    <nav class="ull-nav__desktop" aria-label="Primary navigation">
      <ul class="ull-nav__list" id="navList">
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('home')); ?>">Home</a></li>

        <li class="ull-nav__item ull-nav__item--has-submenu js-hide-when-search" id="openSubItemsMenu">
          <a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('sail_types')); ?>">Sail Types</a>
          <div class="ull-nav__submenu" id="subItemsMenu" role="menu" aria-label="Sail Types submenu">
            <a href="<?php echo esc_url(ullman_page_url('cruising')); ?>" role="menuitem">Cruising Sails</a>
            <a href="<?php echo esc_url(ullman_page_url('racing')); ?>" role="menuitem">Racing Sails</a>
            <a href="<?php echo esc_url(ullman_page_url('the_axia_series')); ?>" role="menuitem">The Axia Series</a>
          </div>
        </li>

        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Boat covers</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('sail_care')); ?>">SailCare</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('services')); ?>">Services</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('news')); ?>">News</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('about_us')); ?>">About Us</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="<?php echo esc_url(ullman_page_url('contact_us')); ?>">Contact Us</a></li>
      </ul>
    </nav>

    <div class="ull-nav__actions">
      <form class="ull-search" id="searchForm" role="search" aria-label="Search site">
        <button class="ull-search__icon" id="searchIconBtn" type="button" aria-label="Toggle search">
          <img src="<?php echo esc_url($menuUrl . '/img/search.png?v=' . $menuSearchV); ?>" alt="">
        </button>
        <input class="ull-search__input" id="searchInput" type="text" placeholder="Search..." autocomplete="off">
        <button class="ull-search__btn" id="searchButton" type="submit">Search</button>
        <div class="ull-search-results" id="searchResults" aria-live="polite">
          <p class="ull-search-results__title">Search results</p>

          <a class="ull-search-results__item" href="<?php echo esc_url(ullman_page_url('cruising')); ?>">
            <span class="ull-search-results__name">Cruising Sails</span>
            <span class="ull-search-results__desc">Sails for coastal cruising and long-distance sailing.</span>
          </a>

          <a class="ull-search-results__item" href="<?php echo esc_url(ullman_page_url('racing')); ?>">
            <span class="ull-search-results__name">Racing Sails</span>
            <span class="ull-search-results__desc">Performance sails for competitive sailing.</span>
          </a>
          <a class="ull-search-results__item" href="<?php echo esc_url(ullman_page_url('racing')); ?>">
            <span class="ull-search-results__name">Racing Sails</span>
            <span class="ull-search-results__desc">Performance sails for competitive sailing.</span>
          </a>
          <a class="ull-search-results__item" href="<?php echo esc_url(ullman_page_url('racing')); ?>">
            <span class="ull-search-results__name">Racing Sails</span>
            <span class="ull-search-results__desc">Performance sails for competitive sailing.</span>
          </a>


        </div>
      </form>
    </div>

    <button class="ull-nav__toggle" id="openMenuMobile" type="button" aria-label="Open menu" aria-expanded="false">
      <img src="<?php echo esc_url($menuUrl . '/img/menu.png?v=' . $menuOpenV); ?>" alt="">
    </button>
    <button class="ull-nav__toggle" id="closeMenuMobile" type="button" aria-label="Close menu" aria-expanded="false">
      <img src="<?php echo esc_url($menuUrl . '/img/close.png?v=' . $menuCloseV); ?>" alt="">
    </button>
  </header>

  <div class="ull-drawer-overlay" id="menuMobileBackground" aria-hidden="true"></div>

  <aside class="ull-drawer" id="menuMobile" aria-label="Mobile menu" aria-hidden="true">
    <div class="ull-drawer__header"><span class="ull-drawer__title">Menu</span></div>

    <nav class="ull-drawer__nav" aria-label="Mobile navigation">
      <div class="ull-drawer__search">
        <form class="ull-search is-open ull-search--mobile" id="searchFormMobile" role="search" aria-label="Search site (mobile)">
          <input class="ull-search__input" id="searchInputMobile" type="text" placeholder="Search..." autocomplete="off">
          <button class="ull-search__btn" id="searchButtonMobile" type="submit">Search</button>

          <div class="ull-search-results-mobile" id="searchResultsMobile" aria-live="polite">
          <p class="ull-search-results-mobile__title">Search results</p>

          <a class="ull-search-results-mobile__item" href="<?php echo esc_url(ullman_page_url('racing')); ?>">
            <span class="ull-search-results-mobile__name">Page: Racing Sails</span>
            <span class="ull-search-results-mobile__desc">Performance sails for competitive sailing.</span>
          </a>
        </div>
        </form>
      </div>
      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('home')); ?>">Home</a>

      <button class="ull-drawer__acc" type="button" data-acc="sails" aria-expanded="false">Sail Types</button>
      <div class="ull-drawer__panel" data-panel="sails">
        <a class="ull-drawer__sublink" href="<?php echo esc_url(ullman_page_url('sail_types')); ?>">All Sail Types</a>
        <a class="ull-drawer__sublink" href="<?php echo esc_url(ullman_page_url('cruising')); ?>">Cruising Sails</a>
        <a class="ull-drawer__sublink" href="<?php echo esc_url(ullman_page_url('racing')); ?>">Racing Sails</a>
        <a class="ull-drawer__sublink" href="<?php echo esc_url(ullman_page_url('the_axia_series')); ?>">The Axia Series</a>

      </div>

      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Boat covers</a>
      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('sail_care')); ?>">SailCare</a>
      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('services')); ?>">Services</a>
      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('news')); ?>">News</a>
      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('about_us')); ?>">About Us</a>
      <a class="ull-drawer__link" href="<?php echo esc_url(ullman_page_url('contact_us')); ?>">Contact Us</a>


    </nav>
  </aside>
</section>



<script>
window.ullmanMenuPageUrls = <?php echo wp_json_encode($menuPageUrls); ?>;
window.ullmanPageUrl = function (directory, parameters = {}) {
  const routes = window.ullmanMenuPageUrls || {};
  const requestedDirectory = String(directory || "").toLowerCase();
  const routeKey = Object.keys(routes).find(
    (key) => key.toLowerCase() === requestedDirectory
  );

  if (!routeKey) return "";

  const destination = new URL(routes[routeKey], window.location.origin);

  Object.entries(parameters).forEach(([key, value]) => {
    if (value !== undefined && value !== null && value !== "") {
      destination.searchParams.set(key, String(value));
    }
  });

  return destination.toString();
};
</script>
<script defer src="<?php echo esc_url($searchDataUrl . '?v=' . $menuSearchDataV); ?>"></script>
<script defer src="<?php echo esc_url($menuUrl . '/menu.js?v=' . $menuJsV); ?>"></script>
