<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/introduction.css');
$introJsVersion  = filemtime(__DIR__ . '/introduction.js');
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
        src="1_introduction/img/ullman_sails.png"
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
      Race Series sails are custom-designed for the boat and racing programme. Ullman
      offers Race Dacron and race-laminate constructions and describes a design process
      that uses 3D tools, computer analysis and on-water testing. The final material,
      panel layout and finishing depend on the class or rating rules and expected use.
    </p>
  </div>
</section>

<script
  defer
  src="../racing_race_series/1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>
