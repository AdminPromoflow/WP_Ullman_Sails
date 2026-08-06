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
    <!-- Brand mark: provide meaningful alt text for accessibility -->
    <div class="img-title-sailing-content sr-item" data-sr-delay="0">
      <img
        src="1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h1 id="navigator-title" class="sr-item" data-sr-delay="70">Performance Series</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p class="sr-item" data-sr-delay="140">
      The Performance Series is built for offshore and high-latitude cruising and superyachts. Advanced sail design, precise construction and high-specification materials combine durability with performance in demanding conditions.
    </p>
  </div>
</section>

<script
  defer
  src="1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>
