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
    'title' => 'Custom string laminate',
    'text'  => 'Crosscut or radial woven polyester for crisp shape and reliable club-race durability afloat.',
  ],
  [
    'title' => 'Custom string laminate',
    'text'  => 'Custom string-laminate membrane for low stretch and rock-solid shape retention upwind fast.',
  ],
  [
    'title' => 'Carbon & aramid fibres',
    'text'  => ' Carbon/aramid fibres deliver strength efficiency and clean load paths at race speeds today.',
  ],
  [
    'title' => 'Film/taffeta/NWT skins',
    'text'  => 'Choose film taffeta or NWT skins to finetune durability versus weight without losing speed.',
  ],
  [
    'title' => ' Luff systems',
    'text'  => 'Upgrade luff systems for cleaner entry, easier hoists and better control when trimming now.',
  ],
  [
    'title' => 'Telltale windows',
    'text'  => 'Telltale windows speed up flow reading, helping you nail modes and shifts, with confidence.',
  ],
  [
    'title' => 'Glowfast draft stripes',
    'text'  => ' Glowfast draft stripes, keep key trim marks visible during night manoeuvres and checks now.',
  ],
  [
    'title' => 'Lite Skin finishing',
    'text'  => 'Lite Skin finishing add abrasion resistance and stealth aesthetic with minimal weight gain.',
  ],
  [
    'title' => 'Carbon battens',
    'text'  => ' Carbon battens reduce weight aloft, and hold leech stability through gust response too now.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" data-sr-reveal aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">The FiberPath&nbsp;Series</p>
      <h2 id="au-title" class="au-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        Custom string-laminate upwind sails: low stretch, locked-in shape, race-ready options, fast.
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
