<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/1_introduction/introduction.css');
$introJsVersion  = filemtime(__DIR__ . '/1_introduction/introduction.js');
?>

<link
  rel="stylesheet"
  href="1_introduction/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  aria-labelledby="navigator-title"
  data-sr-reveal
>
  <div class="sailing-content">
    <!-- 1) Logo -->
    <div class="img-title-sailing-content sr-item">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <!-- 2) Title -->
    <h1 class="sr-item" id="navigator-title">The Race&nbsp;Series</h1>

    <!-- 3) Paragraph -->
    <p class="sr-item">
      Built to maximise racecourse performance, Ullman uses 3D modelling, CFD and two-boat testing to refine every design. Shapes are optimised for flow, balance and trim response, scaled from One Design to offshore.
    </p>
  </div>
</section>

<script
  defer
  src="../racing_race_series/1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>
