<?php
declare(strict_types=1);

function esc(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function versioned_asset(string $publicPath, string $fsPath): string {
  if (!is_file($fsPath)) {
    return $publicPath;
  }
  $v = filemtime($fsPath);
  $sep = str_contains($publicPath, '?') ? '&' : '?';
  return $publicPath . $sep . 'v=' . $v;
}

/* Public + filesystem paths */
$cssPublic = '6_available_upgrades/available_upgrades.css';
$cssFs     = __DIR__ . '/6_available_upgrades/available_upgrades.css';
$cssHref   = versioned_asset($cssPublic, $cssFs);

/* JS paths (para el reveal) */
$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/6_available_upgrades/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => '100% Gore® Tenara® thread stitching',
    'text'  => 'All seams stitched in 100% Gore® Tenara® for maximum UV resistance and seam longevity.',
  ],
  [
    'title' => 'Limited leather finishings (corners)',
    'text'  => 'Selective leather corner patches reduce chafe and abrasion where loads and wear are highest.',
  ],
  [
    'title' => 'Anti-mildew treatment',
    'text'  => 'Anti-mildew treatment helps keep the sail fresher, reducing staining and odours in damp stowage.',
  ],
  [
    'title' => 'Luff systems',
    'text'  => 'Luff system options improve hoists and tension control for smoother handling and better headsail shape.',
  ],
  [
    'title' => 'Additional reefs for mainsails',
    'text'  => 'Extra reef points let you reduce area quickly and keep the boat balanced as conditions build.',
  ],
  [
    'title' => 'Foam luff for headsails',
    'text'  => 'Foam luff inserts support shape when reefed on the furler, keeping the draft forward and stable.',
  ],
  [
    'title' => 'UV covers / treatments (furling systems)',
    'text'  => 'UV covers or treatments protect exposed leech and foot on furlers, extending cloth life in sun.',
  ],
  [
    'title' => 'Sail numbers',
    'text'  => 'Sail numbers add clear identification for racing or marina control, applied to suit your layout.',
  ],
  [
    'title' => 'Full-length battens',
    'text'  => 'Full-length battens support roach and shape, improving stability and reducing flogging in lulls.',
  ],
  [
    'title' => 'UV-resistant thread upgrade',
    'text'  => 'Upgrade to UV-resistant thread throughout to improve stitch durability in harsh, high-UV use.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title" data-sr-reveal>
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item" data-sr-delay="0">Voyager Series</p>
      <h2 id="au-title" class="au-title sr-item" data-sr-delay="70">Available Upgrades</h2>
      <p class="au-subtitle sr-item" data-sr-delay="140">
        Durability-focused options to extend service life and improve handling for Voyager sails.
      </p>
    </header>

    <div class="au-list" role="list">
      <?php foreach ($upgrades as $i => $item): ?>
        <?php $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT); ?>

        <article class="au-row sr-item" role="listitem" data-sr-delay="<?= 210 + ((int)$i * 70) ?>">
          <div class="au-num" aria-hidden="true"><?= esc($num) ?></div>

          <div class="au-body">
            <h3 class="au-row-title"><?= esc((string)$item['title']) ?></h3>
            <p class="au-row-text"><?= esc((string)$item['text']) ?></p>
          </div>
        </article>

        <?php if ($i < $total - 1): ?>
          <hr class="au-divider sr-item" aria-hidden="true" data-sr-delay="<?= 210 + ((int)$i * 70) + 35 ?>">
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script defer src="<?= esc($jsSrc) ?>"></script>
