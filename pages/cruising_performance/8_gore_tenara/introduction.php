<?php
declare(strict_types=1);

// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssFs = __DIR__ . '/8_gore_tenara/introduction.css';
$introJsFs  = __DIR__ . '/8_gore_tenara/introduction.js';

$introCssVersion = is_file($introCssFs) ? filemtime($introCssFs) : time();
$introJsVersion  = is_file($introJsFs)  ? filemtime($introJsFs)  : time();
?>

<link
  rel="stylesheet"
  href="8_gore_tenara/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  data-sr-reveal
  aria-labelledby="navigator-title"
>
  <div class="sailing-content">

    <!-- Reveal order (decidido): h1 -> p1 -> p2 -> p3 -->
    <h1 class="au-title sr-item" id="navigator-title">Gore® Tenara® thread</h1>

    <p class="sr-item">
      Performance Series finishing can include Gore® Tenara® thread to boost longevity. It resists UV degradation and helps seams stay dependable through long passages and harsh sun.
    </p>

    <p class="sr-item">
      Tenara on seams &amp; UV covers: Gore® Tenara® thread is specified on all seams and UV covers, reinforcing the areas most exposed to sunlight, chafe and repeated handling over time.
    </p>

    <p class="sr-item">
      100% Tenara thread: Built with 100% Gore® Tenara® thread for maximum durability, maintaining seam integrity and consistent finish quality when sailing in high-UV, high-mileage conditions.
    </p>

  </div>
</section>

<script
  defer
  src="8_gore_tenara/introduction.js?v=<?= $introJsVersion ?>"
></script>
