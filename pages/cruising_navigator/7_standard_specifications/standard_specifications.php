<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/standard_specifications.css';
$ssJsFs  = __DIR__ . '/standard_specifications.js';
$ssImgFs = __DIR__ . '/img/standard_specifications.jpg';

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
  'Custom design for the boat’s specifications',
  'Premium, tightly woven Navigator Dacron',
  'Cross-cut panel construction',
  'Configuration for day sailing and coastal cruising',
  'Hardware matched to the sail-handling system',
  'Finishing and UV protection confirmed with the loft',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?><?= $ssCssV ? '?v='.$ssCssV : '' ?>">

<section class="standard_specifications" aria-labelledby="ss-title" data-sr-reveal>
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item" data-sr-delay="0">Custom Specification</h2>
      <p class="ss-subtitle sr-item" data-sr-delay="70">Navigator sails share this verified profile; exact hardware and finishing vary by project:</p>
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
              <p class="ss-row-title"><?= $safe_feature ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

    </div>

  </div>
</section>

<script defer src="<?= $ssJsPublic ?><?= $ssJsV ? '?v='.$ssJsV : '' ?>" type="text/javascript"></script>
