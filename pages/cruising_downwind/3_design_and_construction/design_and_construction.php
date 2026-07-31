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
  [ 'title' => 'Cruising Focus',     'text' => 'Designed for downwind cruising with everyday comfort.' ],
  [ 'title' => 'Easy Trimming',      'text' => 'Easy to trim across a wide range of downwind conditions.' ],
  [ 'title' => 'Speed with Control', 'text' => 'Adds usable power while keeping handling safe and calm.' ],
  [ 'title' => 'Durability First',   'text' => 'Materials and build choices prioritise long service life.' ],
  [ 'title' => 'Tailored to Your Rig','text' => 'Built around your rig and your cruising goals.' ],
  [ 'title' => 'Handling Systems',   'text' => 'Works with socks and furlers to simplify hoists and drops.' ],
];

// Filesystem paths (for filemtime)
$cssFile = __DIR__ . '/3_design_and_construction/design_and_construction.css';
$jsFile  = __DIR__ . '/3_design_and_construction/design_and_construction.js';

// Versions
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="3_design_and_construction/design_and_construction.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="design-and-construction" data-sr-reveal aria-labelledby="dac-title">
  <div class="dac-wrap">

    <header class="dac-header">
      <p class="dac-tagline">Blue Line</p>
      <h2 id="dac-title" class="dac-title">Reliable by Design</h2>

      <p class="dac-subtitle">
        Both Blue Line and Axia Blue Line are built for relaxed downwind cruising: sails that trim easily in varied conditions, add usable speed without drama, prioritise durability, and can be tailored to your rig with handling aids such as socks or furlers.
      </p>
    </header>

    <ul class="dac-grid" role="list">
      <?php foreach ($dac_items as $item): ?>
        <li class="dac-card">
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

<script defer src="3_design_and_construction/design_and_construction.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>" type="text/javascript"></script>
