<?php
declare(strict_types=1);

// =========================
// Design & Construction — data + shared SVG
// =========================
$dac_cube_svg = <<<SVG
<svg class="dac-cube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <polygon points="12,2 22,7 12,12 2,7" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="2,7 12,12 12,22 2,17" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="22,7 12,12 12,22 22,17" fill="#0f2140" stroke="#0f2140" stroke-width="1.4"></polygon>
</svg>
SVG;

$dac_items = [
  [
    'title' => 'Precision shaping',
    'text'  => 'Maintains designed shape under load for steadier trim.',
  ],
  [
    'title' => 'UltraLam & FiberPath',
    'text'  => 'High-end composites balance low-stretch control and strength.',
  ],
  [
    'title' => '3D design',
    'text'  => 'Uses 3D tools and testing to refine shape and service life.',
  ],
  [
    'title' => 'Reinforced build',
    'text'  => 'Triple-step seams and heavy reinforcements resist fatigue.',
  ],
  [
    'title' => 'Cruising options',
    'text'  => 'Reefs, luff systems and furling/UV upgrades aid control.',
  ],
];

// Filesystem paths (for filemtime)
$dacCssFs = __DIR__ . '/3_design_and_construction/design_and_construction.css';
$dacJsFs  = __DIR__ . '/3_design_and_construction/design_and_construction.js';

// Public paths
$dacCssPublic = '3_design_and_construction/design_and_construction.css';
$dacJsPublic  = '3_design_and_construction/design_and_construction.js';

// Versions
$dacCssV = is_file($dacCssFs) ? filemtime($dacCssFs) : time();
$dacJsV  = is_file($dacJsFs)  ? filemtime($dacJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $dacCssPublic ?>?v=<?= $dacCssV ?>">

<section class="design-and-construction" data-sr-reveal aria-labelledby="dac-title">
  <div class="dac-wrap">

    <header class="dac-header">
      <p class="dac-tagline sr-item">Performance Series</p>
      <h2 id="dac-title" class="dac-title sr-item">Reliable by Design</h2>

      <p class="dac-subtitle sr-item">
        Built for offshore passages, high latitudes and demanding cruising, Ullman’s Performance Series targets sustained speed, structural integrity and long service life—ideal for serious passagemakers and superyachts that need dependable performance in harsh conditions.
      </p>
    </header>

    <ul class="dac-grid" role="list">
      <?php foreach ($dac_items as $item): ?>
        <li class="dac-card sr-item">
          <div class="dac-icon" aria-hidden="true">
            <?= $dac_cube_svg ?>
          </div>

          <h3 class="dac-card-title"><?= htmlspecialchars((string)$item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
          <p class="dac-card-text"><?= htmlspecialchars((string)$item['text'], ENT_QUOTES, 'UTF-8') ?></p>
        </li>
      <?php endforeach; ?>
    </ul>

  </div>
</section>

<script defer src="<?= $dacJsPublic ?>?v=<?= $dacJsV ?>" type="text/javascript"></script>
