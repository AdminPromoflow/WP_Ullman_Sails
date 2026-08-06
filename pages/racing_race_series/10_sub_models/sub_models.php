<?php
declare(strict_types=1);

$cssFile = __DIR__ . '/sub_models.css';
$jsFile  = __DIR__ . '/sub_models.js';
$cssTime = is_file($cssFile) ? filemtime($cssFile) : time();
$jsTime  = is_file($jsFile) ? filemtime($jsFile) : time();
?>
<link rel="stylesheet" href="10_sub_models/sub_models.css?v=<?= $cssTime ?>">

<section class="wrap" data-sr-reveal>
    <h2 class="sr-item">Race Series Construction Choices</h2>

    <div class="cards-flex sr-item">
      <article class="card sr-item">
        <h3>Race Dacron</h3>
        <p>
          Woven race polyester available in cross-cut or radial construction,
          with cloth weight selected for the individual sail and programme.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Race Laminate</h3>
        <p>
          Laminate construction can reduce weight and stretch compared with
          woven Dacron; fibre and surface details vary by specification.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Panel Layout</h3>
        <p>
          Cross-cut or radial layout is chosen around material properties,
          sail geometry, load direction, class rules and budget.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Final Specification</h3>
        <p>
          Luff, battens, reefing, hardware, reinforcements, markings and
          accessories must be confirmed in the written quotation.
        </p>
      </article>
    </div>
  </section>

<script defer src="10_sub_models/sub_models.js?v=<?= $jsTime ?>" type="text/javascript"></script>
