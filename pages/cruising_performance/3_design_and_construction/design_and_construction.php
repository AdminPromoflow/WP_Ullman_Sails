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
    'title' => '3D design and analysis',
    'text'  => 'Ullman uses 3D design tools and numerical analysis to optimize flying shape and structure before production.',
  ],
  [
    'title' => 'UltraLam',
    'text'  => 'A high-end cruising laminate option selected for low stretch, responsiveness and durability.',
  ],
  [
    'title' => 'Performance FiberPath',
    'text'  => 'A custom fiber-layout option with reinforcement aligned to the sail’s expected loads.',
  ],
  [
    'title' => 'Custom construction',
    'text'  => 'The material, reinforcement and finishing package is developed for the yacht and operating environment.',
  ],
  [
    'title' => 'System integration',
    'text'  => 'Reefing, furling and luff details are matched to the yacht’s equipment and crew requirements.',
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
      <p class="dac-tagline sr-item">Performance Series</p>
      <h2 id="dac-title" class="dac-title sr-item">Reliable by Design</h2>

      <p class="dac-subtitle sr-item">
        The Performance Series combines Ullman’s design process with UltraLam or custom FiberPath constructions for offshore, high-latitude and superyacht applications.
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
