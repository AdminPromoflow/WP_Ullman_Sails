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

    <!-- 2) Título -->
    <h1 id="navigator-title" class="sr-item">The FiberPath&nbsp;Series</h1>

    <!-- 3) Texto -->
    <p class="sr-item">
      FiberPath is Ullman Sails’ custom string-laminate racing range. Fibre paths are
      placed to follow the expected loads of the individual sail, while fibre blends and
      external skins are selected for the boat, racing programme and required balance of
      weight, stretch resistance, handling and abrasion protection.
    </p>
  </div>
</section>

<script
  defer
  src="1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>
