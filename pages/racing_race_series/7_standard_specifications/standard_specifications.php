<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/standard_specifications.css';
$ssJsFs  = __DIR__ . '/standard_specifications.js';
$ssImgFs = __DIR__ . '/img/standard_specifications.jpg';

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
  'Race Dacron or race-laminate construction',
  'Cross-cut or radial panel layout',
  'Cloth weight and fibre specification',
  'Corner and attachment reinforcement',
  'Luff, slide and batten systems',
  'Reefing details where required',
  'Class, rating and measurement requirements',
  'Sail numbers and insignia',
  'Draft stripes, telltales and windows',
  'Bag and handling details',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?>?v=<?= $ssCssV ?>">

<section class="standard_specifications" data-sr-reveal aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item">Standard Specifications</h2>
      <p class="ss-subtitle sr-item">The final written quotation defines what is standard for the individual sail; these are the main areas to confirm.</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item">
        <div class="ss-image">
          <img
            src="<?= $ssImgPublic ?>?v=<?= $ssImgV ?>"
            alt="Race Series sail specification details"
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
              <p class="ss-row-title"><?= $safe_feature ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

    </div>

  </div>
</section>

<script defer src="<?= $ssJsPublic ?>?v=<?= $ssJsV ?>" type="text/javascript"></script>
