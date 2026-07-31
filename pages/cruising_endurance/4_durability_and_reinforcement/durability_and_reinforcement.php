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
    'title' => 'Load Reinforcement',
    'text'  => 'Extra patching and structure in high-load zones, especially around reefs, so the mainsail can stay reefed for long periods without fatigue or distortion.',
  ],
  [
    'title' => 'Furling Durability',
    'text'  => 'Headsails are reinforced at head and tack for roller furling, reducing shape distortion when partly furled and extending service life on long passages.',
  ],
  [
    'title' => 'Reinforced Finish',
    'text'  => 'Upgraded finishing package: multiple triple-step seams, double leech tapes, stronger slides and rings with webbing straps—built to spread loads and resist wear.',
  ],
  [
    'title' => 'Tenara Upgrade',
    'text'  => 'Optional Gore Tenara thread for all stitching, selected for UV and marine resilience; it helps minimise seam breakdown from sun, salt and heat over long seasons.',
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

<section class="strength-in-the-details" aria-labelledby="sid-title" data-sr-reveal>
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline sr-item">Navigator Series</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Reinforcement</h2>
      <p class="sid-intro sr-item">
        Endurance sails are built for offshore miles, with durability-led reinforcement to handle sustained loads, frequent reefing and long UV exposure—keeping shape and reliability at sea.
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
