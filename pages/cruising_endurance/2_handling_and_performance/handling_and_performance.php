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
    'title' => 'Custom Offshore Design',
    'text'  => 'Custom-designed by Ullman’s team to keep the boat easy to sail and predictable offshore as conditions change on passage.',
  ],
  [
    'title' => 'Reefing Endurance',
    'text'  => 'Mainsails add reinforcement in high-load areas so they can remain reefed for extended periods without damage, even with repeated reefing.',
  ],
  [
    'title' => 'Roller-Reefing Headsails',
    'text'  => 'Genoas are built for roller reefing, with head and tack reinforcement to prevent distortion, hold shape steadier and extend service life.',
  ],
  [
    'title' => 'Shape-Holding Cloth Choices',
    'text'  => 'Enduro Dacron and taffeta-coated laminates are chosen for load control and shape retention, keeping trim steadier across a broad wind range.',
  ],
  [
    'title' => 'Bluewater Confidence',
    'text'  => 'Upgraded finishing adds strength over Navigator with robust seams and hardware, giving ocean cruisers dependable control over many miles.',
  ],
];

// Filesystem paths (for filemtime)
$ph_css_fs = __DIR__ . '/2_handling_and_performance/handling_and_performance.css';
$ph_js_fs  = __DIR__ . '/2_handling_and_performance/handling_and_performance.js';
$ph_img_fs = __DIR__ . '/2_handling_and_performance/img/performance-and-handling.jpg';

// Public paths
$ph_css_public = '2_handling_and_performance/handling_and_performance.css';
$ph_js_public  = '2_handling_and_performance/handling_and_performance.js';
$ph_img_public = '2_handling_and_performance/img/performance-and-handling.jpg';

// Versions
$ph_css_v = is_file($ph_css_fs) ? filemtime($ph_css_fs) : null;
$ph_js_v  = is_file($ph_js_fs)  ? filemtime($ph_js_fs)  : null;
$ph_img_v = is_file($ph_img_fs) ? filemtime($ph_img_fs) : null;
?>

<link rel="stylesheet" href="<?= $ph_css_public ?><?= $ph_css_v ? '?v='.$ph_css_v : '' ?>">

<section class="performance-and-handling" data-sr-reveal aria-labelledby="ph-title">
  <div class="ph-grid">

    <header class="ph-left">
      <p class="ph-tagline sr-item" data-sr-delay="0">Endurance Series</p>

      <h2 id="ph-title" class="ph-title sr-item" data-sr-delay="70">Performance and Handling</h2>

      <img
        class="ph-image sr-item"
        data-sr-delay="140"
        src="2_handling_and_performance/img/performance-and-handling.jpg<?= $ph_img_v ? '?v='.$ph_img_v : '' ?>"
        alt="Endurance Series sails shown under offshore load"
        loading="lazy"
        decoding="async"
      >
    </header>

    <div class="ph-right">
      <ol class="ph-steps" role="list">
        <?php foreach ($ph_steps as $i => $step): ?>
          <?php $delay = 210 + ($i * 70); ?>
          <li class="ph-step sr-item" data-sr-delay="<?= (int)$delay ?>">
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

<script defer src="<?= $ph_js_public ?><?= $ph_js_v ? '?v='.$ph_js_v : '' ?>" type="text/javascript"></script>
