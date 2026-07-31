<?php
declare(strict_types=1);

// =========================
// Strength in the Details — items + shared SVG
// =========================
$dac_cube_svg = <<<SVG
<svg class="dac-cube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <polygon points="12,2 22,7 12,12 2,7" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="2,7 12,12 12,22 2,17" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="22,7 12,12 12,22 22,17" fill="#0f2140" stroke="#0f2140" stroke-width="1.4"></polygon>
</svg>
SVG;

$sid_items = [
  [
    'title' => 'Seams & UV',
    'text'  => 'Tenara thread and multi-pass stitching support long seam life, and UV covers are specified to withstand relentless sun, salt and repeated load cycling over years.',
  ],
  [
    'title' => 'High-load zones',
    'text'  => 'Extra reinforcement at reefs and high-stress panels limits distortion and damage when sailing reefed, and when furling or reefing for long periods offshore.',
  ],
  [
    'title' => 'Hardware & patches',
    'text'  => 'Reinforced attachment points, stainless rings and Dyneema/Spectra back-up webbing strengthen load transfers and cut wear at hanks, slides and corners in service.',
  ],
  [
    'title' => 'Durable build',
    'text'  => 'Radial layouts and protective layers (films plus taffeta) combine low stretch with abrasion and UV resistance, improving longevity without sacrificing shape.',
  ],
];

// Filesystem paths (for filemtime)
$sidCssFs = __DIR__ . '/4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsFs  = __DIR__ . '/4_durability_and_reinforcement/durability_and_reinforcement.js';

// Public paths
$sidCssPublic = '4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsPublic  = '4_durability_and_reinforcement/durability_and_reinforcement.js';

// Versions
$sidCssV = is_file($sidCssFs) ? filemtime($sidCssFs) : time();
$sidJsV  = is_file($sidJsFs)  ? filemtime($sidJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $sidCssPublic ?>?v=<?= $sidCssV ?>">

<section class="strength-in-the-details" data-sr-reveal aria-labelledby="sid-title">
  <div class="sid-wrap">

    <header class="sid-header">
      <!-- Orden del reveal (decidido): tagline -> title -> intro -> items -->
      <p class="sid-tagline sr-item">Voyager Series</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Reinforcement</h2>
      <p class="sid-intro sr-item">
        Voyager sails are built for long offshore use, resisting UV, reefing and furling wear, with targeted reinforcements that protect load points, extend seam life and keep the sail’s shape reliable over time.
      </p>
    </header>

    <hr class="sid-divider" aria-hidden="true">

    <div class="sid-grid">
      <?php foreach ($sid_items as $item): ?>
        <article class="sid-item sr-item">
          <div class="sid-media" aria-hidden="true">
            <div class="sid-media-inner">
              <?= $dac_cube_svg ?>
            </div>
          </div>

          <div class="sid-content">
            <h3 class="sid-item-title"><?= htmlspecialchars((string)$item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="sid-item-text"><?= htmlspecialchars((string)$item['text'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script defer src="<?= $sidJsPublic ?>?v=<?= $sidJsV ?>" type="text/javascript"></script>
