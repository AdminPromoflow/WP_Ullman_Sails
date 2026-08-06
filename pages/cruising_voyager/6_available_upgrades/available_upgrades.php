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

/* JS paths (para el reveal) */
$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Voyager Dacron',
    'text'  => 'A reinforced cross-cut woven-polyester option for durable, straightforward offshore cruising sails.',
  ],
  [
    'title' => 'UltraCruise',
    'text'  => 'A woven Ultra-PE and polyester option selected where low stretch and high tear resistance are priorities.',
  ],
  [
    'title' => 'Voyager FiberPath',
    'text'  => 'A custom fiber-layout option engineered around the sail’s expected loads and required cruising durability.',
  ],
  [
    'title' => 'Handling system integration',
    'text'  => 'Luff, furling, reefing and attachment details are configured for the yacht’s installed equipment.',
  ],
  [
    'title' => 'UV protection and finishing',
    'text'  => 'Covers, protective treatments, hardware and finishing are specified for the intended climate and use.',
  ],
  [
    'title' => 'GORE® TENARA® thread',
    'text'  => 'Where specified, ePTFE thread provides resistance to UV, saltwater and extreme weather; confirm its use with the loft.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title" data-sr-reveal>
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item" data-sr-delay="0">Voyager Series</p>
      <h2 id="au-title" class="ss-title sr-item" data-sr-delay="70">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item" data-sr-delay="140">
        Voyager is a custom range. Select the material, construction and finishing with the local Ullman Sails loft.
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
