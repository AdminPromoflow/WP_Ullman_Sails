<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/7_standard_specifications/standard_specifications.css';
$ssJsFs  = __DIR__ . '/7_standard_specifications/standard_specifications.js';
$ssImgFs = __DIR__ . '/7_standard_specifications/img/standard_specifications.jpg';

/* Public paths */
$ssCssPublic = '7_standard_specifications/standard_specifications.css';
$ssJsPublic  = '7_standard_specifications/standard_specifications.js';

/* Versions */
$ssCssV = is_file($ssCssFs) ? filemtime($ssCssFs) : null;
$ssJsV  = is_file($ssJsFs)  ? filemtime($ssJsFs)  : null;
$ssImgV = is_file($ssImgFs) ? filemtime($ssImgFs) : null;

/**
 * Standard specification items.
 * Using an array keeps the markup DRY and reduces maintenance errors.
 */
$ss_features = [
  'Triple-step stitching on every seam',
  'Stainless steel rings',
  'Aluminium headboards for mainsails',
  'Standard battened mainsails',
  'Fibreglass battens',
  'Reinforced batten pockets',
  'Hanks or slides',
  'Telltales on headsails',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?><?= $ssCssV ? '?v='.$ssCssV : '' ?>">

<section class="standard_specifications" aria-labelledby="ss-title" data-sr-reveal>
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item" data-sr-delay="0">Standard Specifications</h2>
      <p class="ss-subtitle sr-item" data-sr-delay="70">Navigator sails come standard with the following features:</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item" data-sr-delay="140">
        <div class="ss-image">
          <img
            src="7_standard_specifications/img/standard_specifications.jpg<?= $ssImgV ? '?v='.$ssImgV : '' ?>"
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
          ?>
          <li class="ss-row sr-item" data-sr-delay="<?= 210 + ((int)$i * 70) ?>">
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

<script defer src="<?= $ssJsPublic ?><?= $ssJsV ? '?v='.$ssJsV : '' ?>" type="text/javascript"></script>
