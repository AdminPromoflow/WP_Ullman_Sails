<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/8_gore_tenara/introduction.css');
$introJsVersion  = filemtime(__DIR__ . '/8_gore_tenara/introduction.js');
?>

<link rel="stylesheet" href="8_gore_tenara/introduction.css?v=<?= $introCssVersion ?>">

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  data-sr-reveal
  aria-labelledby="navigator-title"
>
  <div class="sailing-content">
    <!-- Brand mark: provide meaningful alt text for accessibility -->
    <!-- (si luego vuelves a poner el logo, solo agrégale class="sr-item" para que entre al stagger) -->

    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h1 class="au-title sr-item" id="navigator-title">Gore® Tenara® thread</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p class="sr-item">
      Gore® Tenara® thread is standard on all seams and UV covers. It is hydrophobic and resists UV, saltwater, extreme weather, chemicals and acid rain, helping seams last offshore.
    </p>

    <p class="sr-item">
      Voyager sails can be upgraded to 100% Gore® Tenara® thread throughout every stitch, maximising long-term seam durability where sun and salt quickly punish conventional threads.
    </p>

  </div>
</section>

<script
  defer
  src="8_gore_tenara/introduction.js?v=<?= $introJsVersion ?>"
></script>
