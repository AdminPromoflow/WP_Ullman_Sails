<?php
$cssFile = __DIR__ . '/1_introduction/introduction.css';
$jsFile  = __DIR__ . '/1_introduction/introduction.js';

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

    <h1 id="downwind-title">Downwind Series</h1>

    <p>
      Downwind with Blue Line and Axia Blue Line: easy-trim spinnakers and code sails built for cruisers adding smooth power and confidence. Compatible with spinnaker socks and top-down furlers across changing angles.
    </p>
  </div>
</section>

<script defer src="1_introduction/introduction.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>"></script>
