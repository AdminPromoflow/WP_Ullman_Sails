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
    'title' => 'Material-led durability',
    'text'  => 'UltraLam and Performance FiberPath constructions are selected to balance low stretch, load management and durability for demanding cruising.',
  ],
  [
    'title' => 'Custom reinforcement',
    'text'  => 'Fiber density, patches, hardware and finishing are engineered for the individual yacht rather than applied as one universal specification.',
  ],
  [
    'title' => 'Protection and seam choices',
    'text'  => 'UV protection and thread choices, including GORE® TENARA® where specified, are selected for the climate and service requirements.',
  ],
];

// Filesystem paths (for filemtime)
$sidCssFs = __DIR__ . '/durability_and_reinforcement.css';
$sidJsFs  = __DIR__ . '/durability_and_reinforcement.js';

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
      <p class="sid-tagline sr-item">Performance Series</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Reinforcement</h2>
      <p class="sid-intro sr-item">
        Performance sails are custom projects. Durability depends on the selected construction, reinforcement, protection and appropriate operation within the sail’s design limits.
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
