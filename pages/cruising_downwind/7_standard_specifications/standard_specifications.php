<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$cssFile = __DIR__ . '/standard_specifications.css';
$jsFile  = __DIR__ . '/standard_specifications.js';

/* Versions */
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;

/**
 * Standard specification items.
 * Using an array keeps the markup DRY and reduces maintenance errors.
 */
$ss_features = [
  'Axia Code 50: 50–60% mid-girth',
  'Axia Code 60: 60–70% mid-girth',
  'Axia Code 70: 70–80% mid-girth',
  'Axia Symmetrical: custom sail for a spinnaker pole',
  'Axia Asymmetrical: 80–97% mid-girth',
  'Code Zero laminate or nylon spinnaker cloth by model',
  'Final wind range, luff and handling system confirmed by the loft',
];
?>

<link rel="stylesheet" href="7_standard_specifications/standard_specifications.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="standard_specifications" data-sr-reveal aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title sr-item">Model Profiles</h2>
      <p class="ss-subtitle sr-item">Axia models have different geometries and uses; no single construction applies to the entire range:</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure sr-item">
        <div class="ss-image">
          <img
            src="7_standard_specifications/img/standard_specifications.jpg"
            alt="Axia Blue Line model profiles"
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

<script defer src="7_standard_specifications/standard_specifications.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>"></script>
