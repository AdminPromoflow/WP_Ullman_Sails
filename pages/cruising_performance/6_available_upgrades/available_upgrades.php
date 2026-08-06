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

/* JS path (to keep the same pattern with versioning) */
$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'UltraLam or Performance FiberPath',
    'text'  => 'Select the construction that best matches the yacht’s load case, performance target, durability needs and budget.',
  ],
  [
    'title' => 'Fiber and skin specification',
    'text'  => 'Fiber density, fiber type and protective skins are engineering choices for the individual FiberPath project.',
  ],
  [
    'title' => 'Reefing and handling integration',
    'text'  => 'Reefs, battens, luff systems and furling details are designed around the yacht and crew’s operating plan.',
  ],
  [
    'title' => 'UV and chafe protection',
    'text'  => 'Covers, protective layers and finishing are selected for the expected climate, mileage and handling loads.',
  ],
  [
    'title' => 'GORE® TENARA® thread',
    'text'  => 'Where specified, ePTFE thread provides resistance to UV, saltwater and extreme weather; confirm its use and extent with the loft.',
  ],
  [
    'title' => 'Documented custom specification',
    'text'  => 'Hardware, reinforcement and finishing should be recorded in the project quotation rather than assumed from a generic list.',
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
      <h2 id="au-title" class="ss-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        Performance sails are engineered projects. Confirm every material, handling and finishing choice with the local loft.
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
