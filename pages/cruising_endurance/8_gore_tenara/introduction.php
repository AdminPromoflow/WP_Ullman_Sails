<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$introCssFs = __DIR__ . '/8_gore_tenara/introduction.css';
$introJsFs  = __DIR__ . '/8_gore_tenara/introduction.js';

/* Public paths */
$introCssPublic = '8_gore_tenara/introduction.css';
$introJsPublic  = '8_gore_tenara/introduction.js';

/* Versions (safe) */
$introCssVersion = is_file($introCssFs) ? filemtime($introCssFs) : time();
$introJsVersion  = is_file($introJsFs)  ? filemtime($introJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $introCssPublic ?>?v=<?= $introCssVersion ?>">

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  data-sr-reveal
  aria-labelledby="gore-tenara-title"
>
  <div class="sailing-content">

    <h1 class="au-title sr-item" data-sr-delay="0" id="gore-tenara-title">Gore® Tenara®</h1>

    <p class="sr-item" data-sr-delay="70">Endurance Series sails can be upgraded with Gore® Tenara® thread throughout the entire sail, strengthening seam durability for long offshore use and long-term reliability.</p>

    <p class="sr-item" data-sr-delay="140">Tenara is hydrophobic and unaffected by UV degradation, helping seams stay stable under harsh sunlight and reducing stitch breakdown over extended passages.</p>

    <p class="sr-item" data-sr-delay="210">It is resistant to saltwater, extreme weather, chemicals and acid rain, designed to keep stitching dependable through relentless exposure in demanding offshore conditions.</p>

    <p class="sr-item" data-sr-delay="280">Because stitching is critical, Ullman Sails strongly endorses Gore® Tenara® to hold your sail together long-term, protecting the load-bearing seams that keep structure intact.</p>

  </div>
</section>

<script defer src="<?= $introJsPublic ?>?v=<?= $introJsVersion ?>"></script>
