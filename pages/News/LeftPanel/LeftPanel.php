<?php
declare(strict_types=1);

$navCssFs = __DIR__ . '/LeftPanel.css';
$navJsFs = __DIR__ . '/LeftPanel.js';
$navBaseUrl = get_template_directory_uri() . '/pages/News/LeftPanel';
$navCssPublic = $navBaseUrl . '/LeftPanel.css';
$navJsPublic = $navBaseUrl . '/LeftPanel.js';
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV = is_file($navJsFs) ? filemtime($navJsFs) : time();
?>

<link rel="stylesheet" href="<?php echo esc_url($navCssPublic . '?v=' . $navCssV); ?>">
<script defer src="<?php echo esc_url($navJsPublic . '?v=' . $navJsV); ?>" type="text/javascript"></script>

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
      <p class="left-panel__title">News</p>
      <p class="left-panel__intro">Stories from the loft, the racecourse and life on the water.</p>
    </header>

    <nav class="content-left-panel" aria-label="News navigation">
      <p class="content-left-panel__label">Browse stories</p>
      <div id="newsNavigationItems" aria-live="polite" aria-busy="true">
        <p class="left-panel__loading" role="status">Loading stories...</p>
      </div>
    </nav>
  </div>
</aside>
