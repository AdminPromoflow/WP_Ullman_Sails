<?php
declare(strict_types=1);

// =========================
// Sail Types — data + image per item
// =========================

$st_default_icon = 'assets/icons/sail-icon.png';

$st_items = [
  [
    'title' => 'Racing Sails',
    'text'  => 'Built for speed and control—lightweight shapes, crisp trim response, and race-ready materials that help you secure seconds each leg.',
    'icon'  => '../SailTypes/3_design_and_construction/img/racing_section.jpg',
    'url'   => '../Racing/index.php',
  ],
  [
    'title' => 'Cruising Sails',
    'text'  => 'Made for relaxed, reliable miles—hardwearing cloth, easy handling, and balanced power so you sail comfortably, day after day at sea.',
    'icon'  => '../SailTypes/3_design_and_construction/img/cruising_section.jpg',
    'url'   => '../Cruising/index.php',
  ],
  [
    'title' => 'The Axia Series',
    'text'  => 'A high-end performance range—advanced construction, excellent shape retention, and meticulous detailing for sailors who demand more.',
    'icon'  => '../SailTypes/3_design_and_construction/img/axia_series.jpg',
    'url'   => '../the_axia_series/index.php',
  ],
];

// Filesystem paths (for filemtime)
$stCssFs = __DIR__ . '/3_design_and_construction/design_and_construction.css';
$stJsFs  = __DIR__ . '/3_design_and_construction/design_and_construction.js';

// Public paths
$stCssPublic = '3_design_and_construction/design_and_construction.css';
$stJsPublic  = '3_design_and_construction/design_and_construction.js';

// Versions
$stCssV = is_file($stCssFs) ? filemtime($stCssFs) : time();
$stJsV  = is_file($stJsFs)  ? filemtime($stJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $stCssPublic ?>?v=<?= $stCssV ?>">

<section class="sail-types" aria-labelledby="st-title">
  <div class="st-wrap">

    <h2 id="st-title" class="sr-only">Design and Construction</h2>

    <ul class="st-grid" role="list">
      <?php foreach ($st_items as $i => $item): ?>
        <?php
          $icon = $item['icon'] ?? $st_default_icon;
          $url  = $item['url']  ?? '#';
        ?>
        <li class="st-card" style="--i: <?= (int)$i ?>;">
          <div class="st-icon" aria-hidden="true">
            <img
              class="st-icon-img"
              src="<?= htmlspecialchars((string)$icon, ENT_QUOTES, 'UTF-8') ?>"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>

          <h3 class="st-card-title"><?= htmlspecialchars((string)$item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
          <p class="st-card-text"><?= htmlspecialchars((string)$item['text'], ENT_QUOTES, 'UTF-8') ?></p>

          <a class="st-btn" href="<?= htmlspecialchars((string)$url, ENT_QUOTES, 'UTF-8') ?>">
            See more
            <span class="st-btn-icon" aria-hidden="true">→</span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

  </div>
</section>

<script defer src="<?= $stJsPublic ?>?v=<?= $stJsV ?>" type="text/javascript"></script>
