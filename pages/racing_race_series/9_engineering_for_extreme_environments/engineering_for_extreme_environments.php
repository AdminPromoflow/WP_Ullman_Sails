<?php
declare(strict_types=1);

$efeeCssFs = __DIR__ . '/9_engineering_for_extreme_environments/engineering_for_extreme_environments.css';
$efeeJsFs  = __DIR__ . '/9_engineering_for_extreme_environments/engineering_for_extreme_environments.js';

$efeeCssPublic = '9_engineering_for_extreme_environments/engineering_for_extreme_environments.css';
$efeeJsPublic  = '9_engineering_for_extreme_environments/engineering_for_extreme_environments.js';

$efeeCssV = is_file($efeeCssFs) ? filemtime($efeeCssFs) : time();
$efeeJsV  = is_file($efeeJsFs)  ? filemtime($efeeJsFs)  : time();
?>

<!-- ENGINEERING FOR EXTREME ENVIRONMENTS -->

<link rel="stylesheet" href="<?= $efeeCssPublic ?>?v=<?= $efeeCssV ?>">

<section class="engineering_for_extreme_environments" data-sr-reveal aria-labelledby="efee-title">
  <div class="efee-wrap">

    <header class="efee-header">
      <h2 id="efee-title" class="efee-title sr-item">Engineering for extreme environments</h2>
    </header>

    <div class="efee-grid" role="list">
      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">01</div>
        <div class="efee-body">
          <h3 class="efee-item-title">High-load radial construction</h3>
          <p class="efee-text">
            Radial layouts and reinforced load paths distribute extreme racing loads efficiently, maintaining sail shape and control during heavy-air starts, frequent manoeuvres and sustained high-pressure trimming.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">02</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Performance cloth options</h3>
          <p class="efee-text">
            Race Dacron or advanced laminate constructions are selected to balance durability, responsiveness and shape retention, allowing sailors to push hard in demanding conditions without sacrificing reliability.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">03</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Heavy-duty finishing details</h3>
          <p class="efee-text">
            Triple-step stitching, stainless steel rings, Spectra/Dyneema webbing and reinforced slide entry points increase resistance to wear, shock loads and repeated high-load trimming cycles.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">04</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Precision control under pressure</h3>
          <p class="efee-text">
            Draft stripes, telltales and stable profiles give clear feedback and dependable handling, helping racers maintain speed, balance and confidence when conditions become aggressive and unforgiving.
          </p>
        </div>
      </article>
    </div>

  </div>
</section>

<script defer src="<?= $efeeJsPublic ?>?v=<?= $efeeJsV ?>" type="text/javascript"></script>
