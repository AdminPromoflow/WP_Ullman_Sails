<?php
declare(strict_types=1);

// =========================
// Endurance — data + shared SVG
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
    'title' => 'Design Focus',
    'text'  => 'Custom shapes for steady balance and easier trimming aboard.',
  ],
  [
    'title' => 'Strength Details',
    'text'  => 'Reinforcements, stitching and hardware where loads bite hard.',
  ],
  [
    'title' => 'Cloth Choice',
    'text'  => 'Enduro Dacron or cruise laminates, matched to your sailing.',
  ],
  [
    'title' => 'Cut & Layout',
    'text'  => 'Cross-cut, radial or Tri-Axis layouts to control stretch.',
  ],
  [
    'title' => 'Tenara Upgrade',
    'text'  => 'Optional Gore Tenara thread for UV-tough, long-life seams.',
  ],
];

// Filesystem paths (for filemtime)
$dacCssFs = __DIR__ . '/3_design_and_construction/design_and_construction.css';
$dacJsFs  = __DIR__ . '/3_design_and_construction/design_and_construction.js';

// Public paths
$dacCssPublic = '3_design_and_construction/design_and_construction.css';
$dacJsPublic  = '3_design_and_construction/design_and_construction.js';

// Versions
$dacCssV = is_file($dacCssFs) ? filemtime($dacCssFs) : null;
$dacJsV  = is_file($dacJsFs)  ? filemtime($dacJsFs)  : null;
?>

<link rel="stylesheet" href="<?= $dacCssPublic ?><?= $dacCssV ? '?v='.$dacCssV : '' ?>">

<section class="design-and-construction" data-sr-reveal aria-labelledby="dac-title">
  <div class="dac-wrap">

    <header class="dac-header">
      <p class="dac-tagline sr-item">Endurance Series</p>
      <h2 id="dac-title" class="dac-title sr-item">Reliable by Design</h2>

      <p class="dac-subtitle sr-item">
        Endurance sails are Ullman’s hard-wearing choice for offshore cruising, built to keep shape and confidence over long miles. They prioritise structural strength, UV resistance and balanced handling when conditions turn demanding, tuned to your boat and crew.
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

<script defer src="<?= $dacJsPublic ?><?= $dacJsV ? '?v='.$dacJsV : '' ?>" type="text/javascript"></script>
