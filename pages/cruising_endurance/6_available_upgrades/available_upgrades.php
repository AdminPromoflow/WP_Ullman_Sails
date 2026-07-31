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

/* JS paths (add for reveal) */
$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/6_available_upgrades/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Luff systems',
    'text'  => 'Low-friction luff systems for smooth hoists, easier drops and a cleaner sail shape under load at sea.',
  ],
  [
    'title' => 'Additional reefs',
    'text'  => 'Extra reef points to reduce area quickly, keep balance and stay comfortable as wind builds offshore.',
  ],
  [
    'title' => 'UV covers / treatments',
    'text'  => 'UV covers and treatments for furling sails protect fabric from sun and extend service life offshore.',
  ],
  [
    'title' => 'Sail numbers',
    'text'  => 'Sail numbers for quick identification, race compliance and clearer comms at distance offshore at sea.',
  ],
  [
    'title' => 'Full-length battens',
    'text'  => 'Full-length battens to stabilise the leech, hold shape and reduce flutter in choppy seas for control.',
  ],
  [
    'title' => 'Anti-mildew treatment',
    'text'  => 'Anti-mildew treatment to help prevent mould, staining and odour during wet, damp stowage below decks.',
  ],
  [
    'title' => 'UV-resistant thread upgrade',
    'text'  => 'UV-resistant thread upgrade to protect seams from UV damage and deliver longer life offshore at sea.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" data-sr-reveal aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">Endurance Series</p>
      <h2 id="au-title" class="au-title sr-item">Available Upgrades</h2>
      <p class="au-subtitle sr-item">
        Selected upgrades to boost performance, durability and easier handling for Endurance sails offshore.
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
          <hr class="au-divider" aria-hidden="true">
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script defer src="<?= esc($jsSrc) ?>" type="text/javascript"></script>
