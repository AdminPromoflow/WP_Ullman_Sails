<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$introCssFs = __DIR__ . '/introduction.css';
$introJsFs  = __DIR__ . '/introduction.js';

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
  id="endurance-tenara"
  data-sr-reveal
  aria-labelledby="endurance-tenara-title"
>
  <div class="sailing-content">

    <h2 class="au-title sr-item" data-sr-delay="0" id="endurance-tenara-title">GORE® TENARA® Sewing Thread</h2>

    <p class="sr-item" data-sr-delay="70">GORE® TENARA® is an ePTFE sewing thread intended for long-lasting outdoor and marine seams. Its use and extent on an Endurance sail must be confirmed in the individual specification.</p>

    <p class="sr-item" data-sr-delay="140">Gore states that the thread does not absorb water and maintains its strength under regular exposure to sunlight’s UV rays.</p>

    <p class="sr-item" data-sr-delay="210">It also resists saltwater, extreme weather, acid rain and many cleaning chemicals, making it relevant where seam life is a priority.</p>

    <p class="sr-item" data-sr-delay="280">Thread selection does not replace proper sail care or inspection; discuss the appropriate thread and construction with the local loft.</p>

  </div>
</section>

<script defer src="<?= $introJsPublic ?>?v=<?= $introJsVersion ?>"></script>
