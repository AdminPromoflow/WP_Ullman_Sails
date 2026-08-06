<?php
$cssFile    = __DIR__ . '/sub_models.css';
$jsFile     = __DIR__ . '/sub_models.js';

$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>
<link rel="stylesheet" href="12_sub_models/sub_models.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

  <section class="wrap" data-sr-reveal>
      <h2 class="sr-item">Axia Blue Line Models</h2>

      <div class="cards-flex sr-item">
        <article class="card sr-item">
          <h3>Axia Code 50</h3>
          <p>
            50–60% mid-girth screecher for close reaching. Ullman lists a typical target of 65–80° TWA in 5–10 knots TWS, with broader angles as wind increases.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Axia Code 60</h3>
          <p>
            60–70% mid-girth reaching to broad-reaching sail, normally sheeted outside the cap shrouds. In lighter wind it can work below 95° TWA.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Axia Code 70</h3>
          <p>
            70–80% mid-girth furling asymmetric spinnaker for reaching. Ullman lists light-air angles below 110° TWA, broadening as wind increases.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Axia Symmetrical</h3>
          <p>
            A custom symmetrical downwind spinnaker for boats equipped with a spinnaker pole.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Axia Asymmetrical</h3>
          <p>
            An 80–97% mid-girth all-purpose asymmetric spinnaker for reaching through running. The wind limit depends on the yacht and cloth selection.
          </p>
        </article>
      </div>
    </section>

  <script defer src="12_sub_models/sub_models.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>" type="text/javascript"></script>
