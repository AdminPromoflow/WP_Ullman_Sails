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
    'title' => 'Custom design',
    'text'  => 'Shape and dimensions are matched to the boat and programme.',
  ],
  [
    'title' => 'Race Dacron',
    'text'  => 'Woven polyester is available in cross-cut or radial layouts.',
  ],
  [
    'title' => 'Race laminate',
    'text'  => 'Laminate and fibre choices are selected for load and use.',
  ],
  [
    'title' => 'Sail-specific finish',
    'text'  => 'Hardware, reinforcement and trim aids follow the final quote.',
  ],
];

// Filesystem paths (for filemtime)
$dacCssFs = __DIR__ . '/design_and_construction.css';
$dacJsFs  = __DIR__ . '/design_and_construction.js';

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
      <p class="dac-tagline sr-item">The Race&nbsp;Series</p>

      <h2 id="dac-title" class="dac-title sr-item">Reliable by Design</h2>

      <p class="dac-subtitle sr-item">
        Race Series combines a custom sail shape with woven Race Dacron or race-laminate
        construction. Ullman’s public material describes 3D design, computer analysis and
        on-water testing. Race results and service life also depend on boat setup, crew,
        conditions, use and care.
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
