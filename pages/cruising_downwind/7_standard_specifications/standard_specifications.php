<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$cssFile = __DIR__ . '/7_standard_specifications/standard_specifications.css';
$jsFile  = __DIR__ . '/7_standard_specifications/standard_specifications.js';

/* Versions */
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;

/**
 * Standard specification items.
 * Using an array keeps the markup DRY and reduces maintenance errors.
 */
$ss_features = [
  'Radial construction',
  'Triple-step stitching on every seam',
  'Radial patches',
  'Nylon or Dacron leech tapes',
  'High-tenacity luff lines for larger sails',
  'Stainless steel rings',
];
?>

<link rel="stylesheet" href="7_standard_specifications/standard_specifications.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="standard_specifications" data-sr-reveal aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item">Standard Specifications</h2>
      <p class="ss-subtitle sr-item">Navigator sails come standard with the following features:</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item">
        <div class="ss-image">
          <img
            src="7_standard_specifications/img/standard_specifications.jpg"
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

<script defer src="7_standard_specifications/standard_specifications.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>"></script>
