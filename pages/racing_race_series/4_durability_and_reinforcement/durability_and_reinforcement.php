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
    'title' => 'Material matched to use',
    'text'  => 'Race Dacron and laminate constructions offer different weight, stretch, handling and durability characteristics.',
  ],
  [
    'title' => 'Load-point reinforcement',
    'text'  => 'Corner patches, webbing, rings and other reinforcement are sized for the individual sail and its calculated loads.',
  ],
  [
    'title' => 'Panel layout',
    'text'  => 'Cross-cut or radial layouts are selected according to the material, sail geometry, load orientation and budget.',
  ],
  [
    'title' => 'Rig-specific hardware',
    'text'  => 'Slides, bolt ropes, battens, reef points and attachments are specified for the rig and the way the sail will be handled.',
  ],
  [
    'title' => 'Care and inspection',
    'text'  => 'Correct handling, UV protection, dry storage and timely inspection remain necessary for both woven and laminate race sails.',
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
      <p class="sid-tagline sr-item">The Race&nbsp;Series</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Handling</h2>
      <p class="sid-intro sr-item">
        Construction and reinforcement vary with sail type, material, boat and racing
        rules. Items shown elsewhere on this page are specification categories, not a
        promise that every Race Series sail includes the same components.
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
