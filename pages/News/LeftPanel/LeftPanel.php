<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/News/LeftPanel/LeftPanel.css';
$navJsFs  = __DIR__ . '/News/LeftPanel/LeftPanel.js';

/* Public paths (as used in HTML) */
$navCssPublic = '../News/LeftPanel/LeftPanel.css';
$navJsPublic  = '../News/LeftPanel/LeftPanel.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">


<script defer src="<?= $navJsPublic ?>?v=<?= $navJsV ?>" type="text/javascript"></script>
<aside class="left-panel" id="leftPanel">
  <div class="scroll-left-panel" id="scrollLeftPanel">


    <button type="button" id="logoNews" class="left-panel-logo" aria-label="Go to home">
      <img class="logo-news" src="../News/LeftPanel/Images/LogoUS.png" alt="Ullman Sails logo">
    </button>

    <nav class="content-left-panel" aria-label="News navigation">
      <button type="button" id="link-news-rc1000" class="item-left-panel" data-target="news-rc1000">
        Ullman Sails support RC1000
      </button>

      <button type="button" id="link-news-inshore-offshore" class="item-left-panel" data-target="news-inshore-offshore">
        Ullman Sails Inshore &amp; Offshore Race Series
      </button>

      <button type="button" id="link-news-quarter-ton-cup" class="item-left-panel" data-target="news-quarter-ton-cup">
        Victory in the Quarter Ton Cup
      </button>

      <button type="button" id="link-news-loft-updates" class="item-left-panel" data-target="news-loft-updates">
        Loft Updates
      </button>

      <button type="button" id="link-news-customer-updates" class="item-left-panel" data-target="news-customer-updates">
        Customer Updates
      </button>

      <button type="button" id="link-news-quarter-tonner-developments" class="item-left-panel" data-target="news-quarter-tonner-developments">
        Quarter Tonner Developments
      </button>

      <button type="button" id="link-news-london-boat-show" class="item-left-panel" data-target="news-london-boat-show">
        London Boat Show
      </button>

      <button type="button" id="link-news-newest-team-member" class="item-left-panel" data-target="news-newest-team-member">
        Welcome The Newest Member Of Our Team
      </button>

      <button type="button" id="link-news-penarth-code-zero" class="item-left-panel" data-target="news-penarth-code-zero">
        Penarth – Cruising Code Zero
      </button>

      <button type="button" id="link-news-once-in-a-lifetime-storm" class="item-left-panel" data-target="news-once-in-a-lifetime-storm">
        Hit By a Once in a Life Time Storm
      </button>
    </nav>

  </div>
</aside>
