<?php
$cssFile = __DIR__ . '/sub_models.css';
$jsFile  = __DIR__ . '/sub_models.js';
$cssTime = is_file($cssFile) ? filemtime($cssFile) : time();
$jsTime  = is_file($jsFile) ? filemtime($jsFile) : time();
?>
<link rel="stylesheet" href="10_sub_models/sub_models.css?v=<?= $cssTime ?>">

<section class="wrap" data-sr-reveal>
    <h2 class="sr-item">Axia Red Line Range</h2>

    <div class="cards-flex sr-item">
      <article class="card sr-item">
        <h3>Axia JT</h3>
        <p>
          High-clewed overlapping reaching headsail listed by Ullman for medium to
          strong winds. Final geometry and wind range are boat-specific.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Axia Code 50 / 60 / 75</h3>
        <p>
          Code models with different mid-girths and reaching applications. Sheeting,
          luff and furling details depend on the selected model and rig.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Axia Symmetrical</h3>
        <p>
          Symmetrical spinnaker for boats equipped with a spinnaker pole, with shape
          and size customised for the boat and racing requirements.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Axia Asymmetrical</h3>
        <p>
          Asymmetrical spinnaker in the 80–97% mid-girth range for reaching to running.
          Wind limits depend on the vessel and cloth selection.
        </p>
      </article>
    </div>
  </section>

<script defer src="10_sub_models/sub_models.js?v=<?= $jsTime ?>" type="text/javascript"></script>
