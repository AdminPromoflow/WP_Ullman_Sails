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
    'title' => 'High-pressure lamination',
    'text'  => 'High-pressure, high-heat lamination bonds fibres and skins into a tougher membrane, resisting fatigue and delamination while staying light aloft for long life.',
  ],
  [
    'title' => 'Load-path fibre mapping',
    'text'  => 'Custom string layouts follow true load paths, cutting stretch so entry, draft and leech stay steadier and fast upwind, even as trim changes in gusts and lulls.',
  ],
  [
    'title' => ' Carbon & aramid fibres',
    'text'  => 'Carbon and aramid fibres deliver high strength with very low stretch, resisting creep so entry and draft stay where you designed them for repeatable speed too.',
  ],
  [
    'title' => 'Protective skin options',
    'text'  => 'Choose film for minimum weight, or add taffeta/NWT skins for abrasion resistance; they protect the membrane from deck wear and flogging with small weight gain.',
  ],
  [
    'title' => 'Reinforced load points',
    'text'  => 'Triple-step seams, radial patches, and stainless rings backed by Spectra/Dyneema webbing reinforce corners and reduce chafe at high-load points on every hoist.',
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
      <p class="sid-tagline sr-item">The FiberPath&nbsp;Series</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Handling</h2>
      <p class="sid-intro sr-item">
        String-mapped membrane race sails built with high-pressure, high-heat lamination carbon/aramid fibres and film or taffeta/NWT skins for low stretch and abrasion life afloat.
      </p>
    </header>

    <hr class="sid-divider sr-item" aria-hidden="true">

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
