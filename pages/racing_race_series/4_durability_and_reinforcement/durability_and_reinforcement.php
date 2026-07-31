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
    'title' => 'Triple-step stitching',
    'text'  => 'Triple-step stitching on every seam boosts strength against flogging and load cycles, helping the sail keep shape and last longer at sea.',
  ],
  [
    'title' => 'Rings + webbing',
    'text'  => 'Stainless rings with Spectra/Dyneema webbing reinforcement spread corner loads lowering tear risk and keeping attachments secure in heavy air.',
  ],
  [
    'title' => 'Radial patche',
    'text'  => 'Radial patches distribute corner loads; construction adhesive and UltraBond HOJOs lock reinforcements onto laminate, aramid and PEN sails well.',
  ],
  [
    'title' => 'Slide entry reinforcements',
    'text'  => 'Added reinforcement at slide entry points reduces chafe and point-loading when hoisting, dropping and re-hoisting in races all-day.',
  ],
  [
    'title' => 'Lite Skin finishing',
    'text'  => 'Optional Lite Skin finishing adds a protective outer layer for better abrasion resistance and longer life while keeping a crisp race feel.',
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
      <p class="sid-tagline sr-item">The Race&nbsp;Series</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Handling</h2>
      <p class="sid-intro sr-item">
        The Race Series — Radial-built sails with triple-step seams, stainless rings with Spectra/Dyneema webbing plus radial patches and slide reinforcements for hard racing, with a wide trim range.
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
