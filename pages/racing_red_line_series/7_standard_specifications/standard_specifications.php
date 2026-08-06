<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/standard_specifications.css';
$ssJsFs  = __DIR__ . '/standard_specifications.js';
$ssImgFs = __DIR__ . '/img/standard_specifications.jpg';

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
  'Axia model and intended apparent-wind range',
  'Mid-girth, sail area and rating classification',
  'Code laminate or spinnaker-cloth specification',
  'Symmetrical or asymmetrical geometry',
  'Luff, cable and furling arrangement where applicable',
  'Sheets, attachments and retrieval arrangement',
  'Reinforcement and finishing details',
  'Sail numbers, trim marks, colours and graphics',
  'Boat-specific operating limits',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?>?v=<?= $ssCssV ?>">

<section class="standard_specifications" data-sr-reveal aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item" style="--sr-delay: 0ms;">Specification Areas</h2>
      <p class="ss-subtitle sr-item" style="--sr-delay: 70ms;">Red Line models do not share one universal construction. Confirm each item in the final written quotation.</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item" style="--sr-delay: 140ms;">
        <div class="ss-image">
          <img
            src="<?= $ssImgPublic ?>?v=<?= $ssImgV ?>"
            alt="Axia Red Line specification details"
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
              <p class="ss-row-title"><?= $safe_feature ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

    </div>

  </div>
</section>

<script defer src="<?= $ssJsPublic ?>?v=<?= $ssJsV ?>" type="text/javascript"></script>
