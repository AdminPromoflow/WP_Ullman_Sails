<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/introduction.css');
$introJsVersion  = filemtime(__DIR__ . '/introduction.js');
?>

<link rel="stylesheet" href="8_gore_tenara/introduction.css?v=<?= $introCssVersion ?>">

<section
  class="sailing-types-introduction"
  id="voyager-tenara"
  data-sr-reveal
  aria-labelledby="voyager-tenara-title"
>
  <div class="sailing-content">
    <!-- Brand mark: provide meaningful alt text for accessibility -->
    <!-- (si luego vuelves a poner el logo, solo agrégale class="sr-item" para que entre al stagger) -->

    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h2 class="au-title sr-item" id="voyager-tenara-title">GORE® TENARA® Sewing Thread</h2>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p class="sr-item">
      GORE® TENARA® is an ePTFE sewing thread for outdoor and marine applications. Gore states that it resists UV sunlight, saltwater, extreme weather, acid rain and many chemicals.
    </p>

    <p class="sr-item">
      It does not absorb water and is designed for extended seam life. Its use on a Voyager sail is project-specific and must be confirmed with the local loft; it should not be assumed to be standard on every sail.
    </p>

  </div>
</section>

<script
  defer
  src="8_gore_tenara/introduction.js?v=<?= $introJsVersion ?>"
></script>
