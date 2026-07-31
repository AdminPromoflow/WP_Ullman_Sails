<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssFile    = __DIR__ . '/1_introduction/introduction.css';
$introJsFile     = __DIR__ . '/1_introduction/introduction.js';
$introImgFile    = __DIR__ . '/1_introduction/img/ullman_sails.png';

$introCssVersion = is_file($introCssFile) ? filemtime($introCssFile) : null;
$introJsVersion  = is_file($introJsFile)  ? filemtime($introJsFile)  : null;
$introImgVersion = is_file($introImgFile) ? filemtime($introImgFile) : null;
?>

<link
  rel="stylesheet"
  href="1_introduction/introduction.css<?= $introCssVersion ? '?v='.$introCssVersion : '' ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  aria-labelledby="navigator-title"
  data-sr-reveal
>
  <div class="sailing-content">
    <!-- Brand mark: provide meaningful alt text for accessibility -->
    <div class="img-title-sailing-content sr-item">
      <img
        src="1_introduction/img/ullman_sails.png<?= $introImgVersion ? '?v='.$introImgVersion : '' ?>"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h1 id="navigator-title" class="sr-item">Endurance Series</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p class="sr-item">
      Endurance Series sails are Ullman’s most durable cruising option for offshore and passagemaking. Custom-designed and reinforced for long-distance exposure, they deliver dependable bluewater strength and control.
    </p>
  </div>
</section>

<script
  defer
  src="1_introduction/introduction.js<?= $introJsVersion ? '?v='.$introJsVersion : '' ?>"
></script>
