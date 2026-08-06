<?php
$introCssFile = __DIR__ . '/introduction.css';
$introJsFile  = __DIR__ . '/introduction.js';

$introCssVersion = is_file($introCssFile) ? filemtime($introCssFile) : null;
$introJsVersion  = is_file($introJsFile)  ? filemtime($introJsFile)  : null;
?>

<link rel="stylesheet" href="1_introduction/introduction.css<?= $introCssVersion ? '?v='.$introCssVersion : '' ?>">

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
    <h1 id="navigator-title" class="sr-item" data-sr-delay="70">The Navigator Series</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p class="sr-item" data-sr-delay="140">
      Affordable, durable sails for day sailing and coastal cruising. Every Navigator sail is custom-designed for the
      boat and sailing style, using premium, tightly woven Dacron in a cross-cut layout.
    </p>
  </div>
</section>

<script defer src="1_introduction/introduction.js<?= $introJsVersion ? '?v='.$introJsVersion : '' ?>"></script>
