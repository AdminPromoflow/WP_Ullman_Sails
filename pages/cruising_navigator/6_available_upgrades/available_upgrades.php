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
$cssFs     = __DIR__ . '/available_upgrades.css';
$cssHref   = versioned_asset($cssPublic, $cssFs);

$jsPublic  = '6_available_upgrades/available_upgrades.js';
$jsFs      = __DIR__ . '/available_upgrades.js';
$jsSrc     = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Cloth weight and finish',
    'text'  => 'The loft selects the appropriate Navigator Dacron specification for the boat size, use and local conditions.',
  ],
  [
    'title' => 'Sail inventory',
    'text'  => 'Mainsail and headsail choices are planned around the boat, crew and intended day or coastal cruising.',
  ],
  [
    'title' => 'Furling and handling compatibility',
    'text'  => 'Hardware and finishing can be configured around the boat’s existing furling or sail-handling system.',
  ],
  [
    'title' => 'UV protection',
    'text'  => 'The appropriate UV cover or protection strategy is selected for furling sails and the expected sun exposure.',
  ],
  [
    'title' => 'Reefing and finishing details',
    'text'  => 'Reefs, battens, attachment hardware and finishing are specified individually rather than presented as universal standard features.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" data-sr-reveal aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">Navigator Series</p>
      <h2 id="au-title" class="ss-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        Navigator sails are custom products. Confirm these configuration choices with the local Ullman Sails loft.
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
