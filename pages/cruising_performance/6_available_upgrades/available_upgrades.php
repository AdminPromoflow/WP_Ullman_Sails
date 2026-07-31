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

/* JS path (to keep the same pattern with versioning) */
$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/6_available_upgrades/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Upgraded luff systems',
    'text'  => 'Improves load distribution and smoother hoists for more reliable shape.',
  ],
  [
    'title' => 'Additional reefs',
    'text'  => 'Extends your depowering range for heavy-weather balance and control.',
  ],
  [
    'title' => 'Full-length battens (slab reefing)',
    'text'  => 'Supports stable shape and cleaner reefs; recommended for slab systems.',
  ],
  [
    'title' => 'Carbon batten',
    'text'  => 'Lighter, stiffer battens for better shape retention and reduced pocket stress.',
  ],
  [
    'title' => 'UV covers / treatments (furling systems)',
    'text'  => 'Protects exposed sailcloth when furled, extending lifespan.',
  ],
  [
    'title' => 'Anti-mildew treatment',
    'text'  => 'Helps resist mildew in humid, stowed, or tropical conditions.',
  ],
  [
    'title' => 'UV-resistant thread upgrade',
    'text'  => 'Boosts seam longevity where sun exposure is most punishing.',
  ],
  [
    'title' => 'Limited leather finishings / corner reinforcements',
    'text'  => 'Adds chafe protection at high-wear corners.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section
  class="available_upgrades"
  data-sr-reveal
  aria-labelledby="au-title"
>
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">Performance Series</p>
      <h2 id="au-title" class="au-title sr-item">Available Upgrades</h2>
      <p class="au-subtitle sr-item">
        Luff control and load management, reefing and handling, plus protection upgrades to extend service life.
      </p>
    </header>

    <div class="au-list" role="list">
      <?php foreach ($upgrades as $i => $item): ?>
        <?php $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT); ?>

        <article class="au-row sr-item" role="listitem">
          <div class="au-num" aria-hidden="true"><?= esc($num) ?></div>

          <div class="au-body">
            <h3 class="au-row-title"><?= esc((string)$item['title']) ?></h3>
            <p class="au-row-text"><?= esc((string)$item['text']) ?></p>
          </div>
        </article>

        <?php if ($i < $total - 1): ?>
          <hr class="au-divider sr-item" aria-hidden="true">
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script defer src="<?= esc($jsSrc) ?>"></script>
