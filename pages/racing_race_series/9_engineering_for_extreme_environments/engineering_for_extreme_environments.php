<?php
declare(strict_types=1);

$efeeCssFs = __DIR__ . '/engineering_for_extreme_environments.css';
$efeeJsFs  = __DIR__ . '/engineering_for_extreme_environments.js';

$efeeCssPublic = '9_engineering_for_extreme_environments/engineering_for_extreme_environments.css';
$efeeJsPublic  = '9_engineering_for_extreme_environments/engineering_for_extreme_environments.js';

$efeeCssV = is_file($efeeCssFs) ? filemtime($efeeCssFs) : time();
$efeeJsV  = is_file($efeeJsFs)  ? filemtime($efeeJsFs)  : time();
?>

<!-- RACE SERIES SPECIFICATION -->

<link rel="stylesheet" href="<?= $efeeCssPublic ?>?v=<?= $efeeCssV ?>">

<section class="engineering_for_extreme_environments" data-sr-reveal aria-labelledby="efee-title">
  <div class="efee-wrap">

    <header class="efee-header">
      <h2 id="efee-title" class="efee-title sr-item">Specifying a Race Series Sail</h2>
    </header>

    <div class="efee-grid" role="list">
      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">01</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Define the racing programme</h3>
          <p class="efee-text">
            Boat type, sail function, expected wind range, crew priorities and event format guide the design brief.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">02</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Select the construction</h3>
          <p class="efee-text">
            Race Dacron or race laminate, together with cross-cut or radial layout, is chosen for the required balance of cost, weight, stretch and durability.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">03</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Confirm rig and rule details</h3>
          <p class="efee-text">
            Luff hardware, battens, reefing, measurements, numbers and insignia must match the rig and any class or rating requirements.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem">
        <div class="efee-num" aria-hidden="true">04</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Record the final specification</h3>
          <p class="efee-text">
            Materials, reinforcement, hardware, trim aids, bag and included accessories should be stated in the written quotation before production.
          </p>
        </div>
      </article>
    </div>

  </div>
</section>

<script defer src="<?= $efeeJsPublic ?>?v=<?= $efeeJsV ?>" type="text/javascript"></script>
