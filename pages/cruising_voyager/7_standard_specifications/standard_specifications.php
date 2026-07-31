<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/7_standard_specifications/standard_specifications.css';
$ssJsFs  = __DIR__ . '/7_standard_specifications/standard_specifications.js';
$ssImgFs = __DIR__ . '/7_standard_specifications/img/standard_specifications.jpg';

/* Public path */
$ssCssPublic = '7_standard_specifications/standard_specifications.css';
$ssJsPublic  = '7_standard_specifications/standard_specifications.js';
$ssImgPublic = '7_standard_specifications/img/standard_specifications.jpg';

/* Version */
$ssCssV = is_file($ssCssFs) ? filemtime($ssCssFs) : time();
$ssJsV  = is_file($ssJsFs)  ? filemtime($ssJsFs)  : time();
$ssImgV = is_file($ssImgFs) ? filemtime($ssImgFs) : time();

/**
 * Standard specification items.
 * Using an array keeps the markup DRY and reduces maintenance errors.
 */
$ss_features = [
  'Triple-step stitching',
  'Gore Tenara® thread',
  'Stainless steel rings',
  'Spectra/Dyneema webbing',
  'Radial point patches',
  'Reinforced slides/hanks',
  'Reinforced batten pockets',
  'Vinylester battens',
  'Aluminium headboards',
  'Draft stripes',
  'Telltales',
];

?>

<link rel="stylesheet" href="<?= $ssCssPublic ?>?v=<?= $ssCssV ?>">

<section
  class="standard_specifications"
  data-sr-reveal
  aria-labelledby="ss-title"
>
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item">Standard Specifications</h2>
      <p class="ss-subtitle sr-item">
        Premium reinforcements and finishing (triple-step stitching, stainless rings, Tenara®, reinforced batten pockets).
      </p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item">
        <div class="ss-image">
          <img
            class="sr-item"
            src="<?= $ssImgPublic ?>?v=<?= $ssImgV ?>"
            alt="Voyager sail standard specifications"
            loading="lazy"
            decoding="async"
          >
        </div>
      </figure>

      <ol class="ss-list" role="list">
        <?php foreach ($ss_features as $i => $feature): ?>
          <?php
            $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            $safe_feature = htmlspecialchars((string)$feature, ENT_QUOTES, 'UTF-8');
          ?>
          <li class="ss-row sr-item">
            <span class="ss-num" aria-hidden="true"><?= $num ?></span>
            <div class="ss-main">
              <h3 class="ss-row-title"><?= $safe_feature ?></h3>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

    </div>

  </div>
</section>

<script defer src="<?= $ssJsPublic ?>?v=<?= $ssJsV ?>"></script>
