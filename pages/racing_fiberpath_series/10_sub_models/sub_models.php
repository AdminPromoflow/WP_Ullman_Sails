<?php
$cssFile = __DIR__ . '/sub_models.css';
$jsFile  = __DIR__ . '/sub_models.js';
$cssTime = is_file($cssFile) ? filemtime($cssFile) : time();
$jsTime  = is_file($jsFile) ? filemtime($jsFile) : time();
?>
<link rel="stylesheet" href="10_sub_models/sub_models.css?v=<?= $cssTime ?>">

<section class="wrap" data-sr-reveal>
    <h2 class="sr-item">FiberPath Racing Options</h2>

    <div class="cards-flex">
      <article class="card sr-item">
        <h3>Grand Prix</h3>
        <p>
          Ullman’s higher-specification custom string-laminate option. Fibre layout,
          skin and finishing are selected for the loads and racing programme.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Regatta</h3>
        <p>
          Custom string-laminate sails available with carbon, aramid or specified blends
          and film, taffeta or non-woven surface options, subject to the final specification.
        </p>
      </article>

      <!-- Si agregas más cards, solo ponles también: class="card sr-item" -->
    </div>
  </section>

<script defer src="10_sub_models/sub_models.js?v=<?= $jsTime ?>"></script>
