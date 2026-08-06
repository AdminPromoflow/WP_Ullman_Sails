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

/* JS paths (add for reveal) */
$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Enduro Dacron or Enduro Laminate',
    'text'  => 'Choose a durable woven polyester construction or a lighter, lower-stretch, taffeta-coated cruising laminate.',
  ],
  [
    'title' => 'Cross-cut or radial woven construction',
    'text'  => 'The official brochure lists cross-cut and radial options for woven Dacron; suitability depends on the sail and project.',
  ],
  [
    'title' => 'Reefing configuration',
    'text'  => 'Reef layout and reinforcement are determined by the mainsail, expected conditions and the owner’s passage-making plans.',
  ],
  [
    'title' => 'Roller-reefing configuration',
    'text'  => 'Headsail design, reinforcement and UV protection are matched to the furling system and expected use.',
  ],
  [
    'title' => 'GORE® TENARA® thread',
    'text'  => 'Where specified, this ePTFE thread resists UV, saltwater and extreme weather; confirm its use and extent with the loft.',
  ],
  [
    'title' => 'Handling and finishing details',
    'text'  => 'Hardware, battens, slides and finishing are custom choices and should be documented in the individual sail quotation.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" data-sr-reveal aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">Endurance Series</p>
      <h2 id="au-title" class="ss-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        Endurance sails are custom projects. These are configuration decisions to make with the local Ullman Sails loft.
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
