<?php
declare(strict_types=1);

// =========================
// Performance & Handling — data + shared SVG
// =========================
$ph_cube_svg = <<<SVG
<svg class="ph-cube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <polygon points="12,2 22,7 12,12 2,7" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="2,7 12,12 12,22 2,17" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="22,7 12,12 12,22 22,17" fill="#0f2140" stroke="#0f2140" stroke-width="1.4"></polygon>
</svg>
SVG;

$ph_steps = [
  [
    'title' => 'Safe Speed Spinnakers',
    'text'  => 'Easy-to-trim cruising spinnakers for varied conditions, adding speed while keeping sailing safe; sock options ease hoists.',
  ],
  [
    'title' => 'Smooth Stable Cruising',
    'text'  => 'Cruising sails with smooth rotation and stable flying shapes, delivering forgiving handling, comfort and confidence.',
  ],
];

// Filesystem paths (for filemtime)
$cssFile = __DIR__ . '/2_handling_and_performance/handling_and_performance.css';
$jsFile  = __DIR__ . '/2_handling_and_performance/handling_and_performance.js';

// Versions
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="2_handling_and_performance/handling_and_performance.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="performance-and-handling" data-sr-reveal aria-labelledby="ph-title">
  <div class="ph-grid">

    <header class="ph-left">
      <p class="ph-tagline">Downwind Series</p>
      <h2 id="ph-title" class="ph-title">Performance and Handling</h2>

      <img
        class="ph-image"
        src="2_handling_and_performance/img/performance-and-handling.jpg"
        alt="Sails shown under load"
        loading="lazy"
        decoding="async"
      >
    </header>

    <div class="ph-right">
      <ol class="ph-steps" role="list">
        <?php foreach ($ph_steps as $step): ?>
          <li class="ph-step">
            <div class="ph-marker" aria-hidden="true">
              <span class="ph-cube-wrap">
                <?= $ph_cube_svg ?>
              </span>
            </div>

            <div class="ph-body">
              <h3 class="ph-step-title"><?= htmlspecialchars((string)$step['title'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p class="ph-step-text"><?= htmlspecialchars((string)$step['text'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>

  </div>
</section>

<script defer src="2_handling_and_performance/handling_and_performance.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>" type="text/javascript"></script>
