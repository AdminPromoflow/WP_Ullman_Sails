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

$jsPublic  = '6_available_upgrades/available_upgrades.js';
$jsFs      = __DIR__ . '/6_available_upgrades/available_upgrades.js';
$jsSrc     = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Additional reefs for mainsails',
    'text'  => 'Add extra reef points to reduce sail area quickly and keep the boat balanced as conditions build.',
  ],
  [
    'title' => 'Roller reef patch',
    'text'  => 'Reinforce high-wear areas for reefing and furling to protect shape and extend service life.',
  ],
  [
    'title' => 'Foam luff for headsails',
    'text'  => 'Helps maintain a cleaner entry and more consistent drive when the sail is partially furled.',
  ],
  [
    'title' => 'UV covers / treatments for furling sails',
    'text'  => 'Add UV protection on exposed edges to reduce sun damage when the sail is furled on the rig.',
  ],
  [
    'title' => 'Sail numbers & draft stripes',
    'text'  => 'Improve identification and trim visibility with clear numbers and stripes for monitoring draft position.',
  ],
  [
    'title' => 'Full battens',
    'text'  => 'Support smoother leech behaviour and shape retention, with more controlled handling in many setups.',
  ],
  [
    'title' => 'Anti-mildew treatment',
    'text'  => 'Helps reduce mildew growth in humid conditions and storage, keeping the cloth cleaner for longer.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" data-sr-reveal aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">Navigator Series</p>
      <h2 id="au-title" class="au-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        Enhance performance, durability, and ease of use with tailored options for your sail and sailing style.
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

<script defer src="<?= esc($jsSrc) ?>" type="text/javascript"></script>
