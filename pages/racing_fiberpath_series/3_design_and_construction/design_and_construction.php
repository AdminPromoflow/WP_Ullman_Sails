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
    'title' => 'FibrePath layout',
    'text'  => 'Fibre paths tuned to loads for accurate shape control.',
  ],
  [
    'title' => 'Carbon + aramid',
    'text'  => 'Low-stretch fibres: speed, with steady draft position.',
  ],
  [
    'title' => 'Lamination',
    'text'  => 'Heat/pressure bonding for durability and long service.',
  ],
  [
    'title' => 'Skin options',
    'text'  => 'Film taffeta or NWT skins to suit your programme best.',
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
      <p class="dac-tagline sr-item">The FiberPath&nbsp;Series</p>
      <h2 id="dac-title" class="dac-title sr-item">Reliable by Design</h2>

      <p class="dac-subtitle sr-item">
        Elite upwind membranes for top-level racing. FiberPath uses mapped carbon/aramid fibre paths and high-pressure lamination to lock in draft position, reduce stretch, and keep peak shapes for longer so trim stays razor-precise. Suits One Design to Grand Prix.
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
