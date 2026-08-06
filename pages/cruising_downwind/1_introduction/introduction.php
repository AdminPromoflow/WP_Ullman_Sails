<?php
$cssFile = __DIR__ . '/introduction.css';
$jsFile  = __DIR__ . '/introduction.js';

$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="1_introduction/introduction.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  data-sr-reveal
  aria-labelledby="downwind-title"
>
  <div class="sailing-content">
    <div class="img-title-sailing-content">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <h1 id="downwind-title">Axia Series — Blue Line</h1>

    <p>
      Axia Blue Line is Ullman’s downwind cruising range for sailors who prioritize ease of use, durability and dependable performance. It includes versatile Code sails and symmetrical and asymmetrical spinnakers.
    </p>
  </div>
</section>

<script defer src="1_introduction/introduction.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>"></script>
