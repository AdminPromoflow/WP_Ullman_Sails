<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/7_standard_specifications/standard_specifications.css';
$ssJsFs  = __DIR__ . '/7_standard_specifications/standard_specifications.js';
$ssImgFs = __DIR__ . '/7_standard_specifications/img/standard_specifications.jpg';

/* Public paths */
$ssCssPublic = '7_standard_specifications/standard_specifications.css';
$ssJsPublic  = '7_standard_specifications/standard_specifications.js';
$ssImgPublic = '7_standard_specifications/img/standard_specifications.jpg';

/* Versions */
$ssCssV = is_file($ssCssFs) ? filemtime($ssCssFs) : time();
$ssJsV  = is_file($ssJsFs)  ? filemtime($ssJsFs)  : time();
$ssImgV = is_file($ssImgFs) ? filemtime($ssImgFs) : time();

/**
 * Standard specification items.
 * Using an array keeps the markup DRY and reduces maintenance errors.
 */
$ss_features = [
  'Racecourse shape',
  'Lightweight build',
  'Structured luff',
  'Furling control ',
  'Materials',
  'Construction & finishing ',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?>?v=<?= $ssCssV ?>">

<section class="standard_specifications" data-sr-reveal aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item" style="--sr-delay: 0ms;">Standard Specifications</h2>
      <p class="ss-subtitle sr-item" style="--sr-delay: 70ms;">Race-ready downwind sails: light, fast rotation, structured luff, furl control, durable finish no:</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item" style="--sr-delay: 140ms;">
        <div class="ss-image">
          <img
            src="<?= $ssImgPublic ?>?v=<?= $ssImgV ?>"
            alt="Navigator sail standard specifications"
            loading="lazy"
            decoding="async"
          >
        </div>
      </figure>

      <ol class="ss-list">
        <?php foreach ($ss_features as $i => $feature): ?>
          <?php
            $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            $safe_feature = htmlspecialchars((string)$feature, ENT_QUOTES, 'UTF-8');
            $delay = 210 + ($i * 70); // stagger 70ms
          ?>
          <li class="ss-row sr-item" style="--sr-delay: <?= (int)$delay ?>ms;">
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

<script defer src="<?= $ssJsPublic ?>?v=<?= $ssJsV ?>" type="text/javascript"></script>
