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

$jsPublic = '6_available_upgrades/available_upgrades.js';
$jsFs     = __DIR__ . '/available_upgrades.js';
$jsSrc    = versioned_asset($jsPublic, $jsFs);

$upgrades = [
  [
    'title' => 'Race Dacron cloth',
    'text'  => 'Woven race polyester may be specified in cross-cut or radial layouts according to the sail and programme.',
  ],
  [
    'title' => 'Race Laminate cloth',
    'text'  => 'Laminate options can reduce weight and stretch; fibre, film and surface construction are confirmed in the quote.',
  ],
  [
    'title' => 'Panel layout',
    'text'  => 'Cross-cut or radial construction is selected for the material, sail geometry, loads and budget.',
  ],
  [
    'title' => 'Luff system',
    'text'  => 'Slides, bolt ropes, headstay systems and related reinforcement are matched to the rig and handling method.',
  ],
  [
    'title' => 'Batten configuration',
    'text'  => 'Batten layout, material, receptacles and tensioning are specified for the sail design and class rules.',
  ],
  [
    'title' => 'Reefing and hardware',
    'text'  => 'Reefs, rings, webbing and attachments are included where required by the individual specification.',
  ],
  [
    'title' => 'Class or rating compliance',
    'text'  => 'Dimensions, materials, sail numbers and insignia must follow the applicable class or rating rules.',
  ],
  [
    'title' => 'Trim aids',
    'text'  => 'Draft stripes, telltales and windows can be positioned to suit the sail and trimmer.',
  ],
  [
    'title' => 'Handling and storage',
    'text'  => 'Bag type and storage guidance should reflect whether the sail is rolled, flaked or folded.',
  ],
  [
    'title' => 'Written build specification',
    'text'  => 'Availability and price of every option must be confirmed by the loft before production.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title" data-sr-reveal>
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">The Race&nbsp;Series</p>
      <h2 id="au-title" class="ss-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        Options vary by sail, boat, rules and loft. The written build specification
        controls over this general list.
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
