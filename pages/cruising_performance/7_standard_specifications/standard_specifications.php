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
  'Four reefs with webbing handles, reef blocks, and low-friction rings',
  'Colour-coded mainsail luff reefs for accuracy',
  'Mainsail luff furling reef system',
  'Covered seams for enhanced UV and chafe protection',
  'Multi-layer batten pockets with external webbing',
  'Double leech and foot tapes',
  'Dual overhead leechlines',
  'External stainless steel rings with webbing',
  'Rope luff pads for headsails',
  'Spectra/Dyneema webbings',
  'Extra-wide seams with triple-step stitching',
  'UV covers standard',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?>?v=<?= $ssCssV ?>">

<section class="standard_specifications" data-sr-reveal aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item">Standard Specifications</h2>
      <p class="ss-subtitle sr-item">
        All Performance Series sails are built to our highest standards, with finishing details upgraded from the Voyager Series.
      </p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item">
        <div class="ss-image">
          <img
            src="<?= $ssImgPublic ?>?v=<?= $ssImgV ?>"
            alt="Performance Series — standard specifications"
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

<script defer src="<?= $ssJsPublic ?>?v=<?= $ssJsV ?>" type="text/javascript"></script>
