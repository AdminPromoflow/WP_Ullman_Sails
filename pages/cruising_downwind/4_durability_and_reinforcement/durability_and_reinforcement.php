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
    'title' => 'Model-specific Materials',
    'text'  => 'Axia sails use Code Zero laminate or nylon spinnaker cloth depending on the selected Code or spinnaker model.',
  ],
  [
    'title' => 'Active or Cable-Based Luff',
    'text'  => 'The Axia range includes Active Luff™ development and proven cable-based solutions; the appropriate construction is selected for the sail’s role.',
  ],
  [
    'title' => 'Cruising Durability Focus',
    'text'  => 'Blue Line prioritizes ease of use, durability and dependable downwind performance rather than a race-only specification.',
  ],
  [
    'title' => 'Appropriate Handling System',
    'text'  => 'Furling equipment or a spinnaker sock may simplify handling, but compatibility depends on the selected model and must be confirmed with the loft.',
  ],
  [
    'title' => 'Custom Yacht Specification',
    'text'  => 'Cloth weight, size, reinforcement, graphics and wind limits vary by boat and sail; the loft documents the final specification.',
  ],
];

// Filesystem paths (for filemtime)
$cssFile = __DIR__ . '/durability_and_reinforcement.css';
$jsFile  = __DIR__ . '/durability_and_reinforcement.js';

// Versions
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="4_durability_and_reinforcement/durability_and_reinforcement.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="strength-in-the-details" aria-labelledby="sid-title" data-sr-reveal>
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline sr-item">Axia Blue Line</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Handling</h2>
      <p class="sid-intro sr-item">
        Axia Blue Line combines model-specific material, luff and handling choices. Code sails and classic spinnakers do not share one universal construction.
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

<script defer src="4_durability_and_reinforcement/durability_and_reinforcement.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>" type="text/javascript"></script>
