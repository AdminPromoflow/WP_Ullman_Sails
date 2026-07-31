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

    <!-- 2) Título -->
    <h1 id="navigator-title" class="sr-item">The FiberPath&nbsp;Series</h1>

    <!-- 3) Texto -->
    <p class="sr-item">
      Reliable strength for coastal and bluewater cruising: FiberPath builds sails with engineered load paths for dependable shape under sustained loads. Reinforcement is focused in high-load zones, supporting durability and consistent performance over long miles.
    </p>
  </div>
</section>

<script
  defer
  src="../../1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>
