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
    'title' => 'Custom Design by Ullman Sails',
    'text'  => 'Each sail is individually crafted by an Ullman Sails designer to ensure it delivers a high-quality performance shape tailored to the boat.',
  ],
  [
    'title' => 'Efficient Sail Shape for Easier Trimming',
    'text'  => 'The sail’s efficient shape allows you to trim it easily across various conditions and helps reduce the boat’s heel, making it more stable.',
  ],
  [
    'title' => 'Custom Hardware and Finishing for Perfect Fit',
    'text'  => 'Our sailmakers will customise the sail with the right hardware and finishing details so it fits your furling unit or any other handling system perfectly.',
  ],
];

// Filesystem paths (for filemtime)
$ph_css_fs = __DIR__ . '/2_handling_and_performance/handling_and_performance.css';
$ph_js_fs  = __DIR__ . '/2_handling_and_performance/handling_and_performance.js';
$ph_img_fs = __DIR__ . '/2_handling_and_performance/img/performance-and-handling.jpg';

// Public paths
$ph_css_public = '2_handling_and_performance/handling_and_performance.css';
$ph_js_public  = '2_handling_and_performance/handling_and_performance.js';

// Versions
$ph_css_v = is_file($ph_css_fs) ? filemtime($ph_css_fs) : null;
$ph_js_v  = is_file($ph_js_fs)  ? filemtime($ph_js_fs)  : null;
$ph_img_v = is_file($ph_img_fs) ? filemtime($ph_img_fs) : null;
?>

<link rel="stylesheet" href="<?= $ph_css_public ?><?= $ph_css_v ? '?v='.$ph_css_v : '' ?>">

<section
  class="performance-and-handling"
  data-sr-reveal
  aria-labelledby="ph-title"
>
  <div class="ph-grid">

    <header class="ph-left">
      <p class="ph-tagline sr-item">Navigator Series</p>
      <h2 id="ph-title" class="ph-title sr-item">Performance and Handling</h2>

      <img
        class="ph-image sr-item"
        src="2_handling_and_performance/img/performance-and-handling.jpg<?= $ph_img_v ? '?v='.$ph_img_v : '' ?>"
        alt="Navigator Series sails shown under load"
        loading="lazy"
        decoding="async"
      >
    </header>

    <div class="ph-right">
      <ol class="ph-steps" role="list">
        <?php foreach ($ph_steps as $i => $step): ?>
          <li class="ph-step sr-item">
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
