<?php
declare(strict_types=1);

// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssFs = __DIR__ . '/introduction.css';
$introJsFs  = __DIR__ . '/introduction.js';

$introCssVersion = is_file($introCssFs) ? filemtime($introCssFs) : time();
$introJsVersion  = is_file($introJsFs)  ? filemtime($introJsFs)  : time();
?>

<link
  rel="stylesheet"
  href="8_gore_tenara/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="performance-tenara"
  data-sr-reveal
  aria-labelledby="performance-tenara-title"
>
  <div class="sailing-content">

    <!-- Reveal order (decidido): h1 -> p1 -> p2 -> p3 -->
    <h2 class="au-title sr-item" id="performance-tenara-title">GORE® TENARA® Sewing Thread</h2>

    <p class="sr-item">
      GORE® TENARA® is an ePTFE sewing thread for outdoor and marine applications. Gore states that it resists UV sunlight, saltwater, extreme weather, acid rain and many chemicals.
    </p>

    <p class="sr-item">
      It does not absorb water and is designed for extended seam life. These material properties make it relevant to demanding cruising projects where seam longevity is a priority.
    </p>

    <p class="sr-item">
      Its use is not assumed to be standard on every Performance sail. The thread type and the seams on which it is used must be confirmed in the individual project specification.
    </p>

  </div>
</section>

<script
  defer
  src="8_gore_tenara/introduction.js?v=<?= $introJsVersion ?>"
></script>
