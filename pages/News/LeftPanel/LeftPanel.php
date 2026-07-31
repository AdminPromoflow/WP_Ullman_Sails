<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/LeftPanel.css';
$navJsFs  = __DIR__ . '/LeftPanel.js';

/* Public paths (as used in HTML) */
$navBaseUrl = get_template_directory_uri() . '/pages/News/LeftPanel';
$navCssPublic = $navBaseUrl . '/LeftPanel.css';
$navJsPublic  = $navBaseUrl . '/LeftPanel.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">


<script defer src="<?= $navJsPublic ?>?v=<?= $navJsV ?>" type="text/javascript"></script>
<aside class="left-panel" id="leftPanelNavigation">
  <div class="scroll-left-panel" id="scrollLeftPanel">
    <header class="left-panel__header">
      <button type="button" id="IconCloseMenuNews" class="btn-close-menu-news" aria-label="Close news navigation">
        <span aria-hidden="true"></span>
      </button>

      <button type="button" id="logoNews" class="left-panel-logo" aria-label="Go to home">
        <img class="logo-news" src="<?php echo esc_url($navBaseUrl . '/Images/LogoUS.png'); ?>" alt="Ullman Sails logo">
      </button>

      <p class="left-panel__eyebrow">Ullman Sails GBR</p>
      <h1 class="left-panel__title">News</h1>
      <p class="left-panel__intro">Stories from the loft, the racecourse and life on the water.</p>
    </header>

    <nav class="content-left-panel" aria-label="News navigation">
      <p class="content-left-panel__label">Latest stories</p>
      <button type="button" id="link-news-rc1000" class="item-left-panel is-active" data-target="news-rc1000" aria-current="page">
        <span class="item-left-panel__number" aria-hidden="true">01</span><span>Ullman Sails support RC1000</span>
      </button>

      <button type="button" id="link-news-inshore-offshore" class="item-left-panel" data-target="news-inshore-offshore">
        <span class="item-left-panel__number" aria-hidden="true">02</span><span>Ullman Sails Inshore &amp; Offshore Race Series</span>
      </button>

      <button type="button" id="link-news-quarter-ton-cup" class="item-left-panel" data-target="news-quarter-ton-cup">
        <span class="item-left-panel__number" aria-hidden="true">03</span><span>Victory in the Quarter Ton Cup</span>
      </button>

      <button type="button" id="link-news-loft-updates" class="item-left-panel" data-target="news-loft-updates">
        <span class="item-left-panel__number" aria-hidden="true">04</span><span>Loft Updates</span>
      </button>

      <button type="button" id="link-news-customer-updates" class="item-left-panel" data-target="news-customer-updates">
        <span class="item-left-panel__number" aria-hidden="true">05</span><span>Customer Updates</span>
      </button>

      <button type="button" id="link-news-quarter-tonner-developments" class="item-left-panel" data-target="news-quarter-tonner-developments">
        <span class="item-left-panel__number" aria-hidden="true">06</span><span>Quarter Tonner Developments</span>
      </button>

      <button type="button" id="link-news-london-boat-show" class="item-left-panel" data-target="news-london-boat-show">
        <span class="item-left-panel__number" aria-hidden="true">07</span><span>London Boat Show</span>
      </button>

      <button type="button" id="link-news-newest-team-member" class="item-left-panel" data-target="news-newest-team-member">
        <span class="item-left-panel__number" aria-hidden="true">08</span><span>Welcome The Newest Member Of Our Team</span>
      </button>

      <button type="button" id="link-news-penarth-code-zero" class="item-left-panel" data-target="news-penarth-code-zero">
        <span class="item-left-panel__number" aria-hidden="true">09</span><span>Penarth – Cruising Code Zero</span>
      </button>

      <button type="button" id="link-news-once-in-a-lifetime-storm" class="item-left-panel" data-target="news-once-in-a-lifetime-storm">
        <span class="item-left-panel__number" aria-hidden="true">10</span><span>Hit By a Once in a Life Time Storm</span>
      </button>
    </nav>

  </div>
</aside>
