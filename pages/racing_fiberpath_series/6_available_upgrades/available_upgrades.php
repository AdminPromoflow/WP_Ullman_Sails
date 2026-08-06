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
    'title' => 'Regatta or Grand Prix',
    'text'  => 'Select the FiberPath configuration with the loft according to boat size, racing level, load case and handling priorities.',
  ],
  [
    'title' => 'Fibre specification',
    'text'  => 'Carbon, aramid or a specified blend is chosen to suit the required balance of stretch resistance, weight, flex and durability.',
  ],
  [
    'title' => 'External skin',
    'text'  => 'Film, taffeta or non-woven textile surfaces may be specified where offered for the selected FiberPath construction.',
  ],
  [
    'title' => 'Luff system',
    'text'  => 'Slides, bolt ropes, headstay systems and related reinforcement are matched to the rig and the way the sail will be handled.',
  ],
  [
    'title' => 'Batten configuration',
    'text'  => 'Batten number, material, receptacles and tensioning are specified for the sail design and applicable class rules.',
  ],
  [
    'title' => 'Reefing and hardware',
    'text'  => 'Reefs, rings, webbing and attachment hardware are included only where required by the quoted specification.',
  ],
  [
    'title' => 'Class or rating compliance',
    'text'  => 'Measurements, materials, sail numbers and insignia must follow the relevant class or rating requirements.',
  ],
  [
    'title' => 'Trim references',
    'text'  => 'Draft stripes, telltales and windows can be positioned to suit the sail and trimmer, subject to the final build.',
  ],
  [
    'title' => 'Handling and storage',
    'text'  => 'Bag type and handling details should reflect whether the sail will be rolled, flaked or otherwise stored between races.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" data-sr-reveal aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">The FiberPath&nbsp;Series</p>
      <h2 id="au-title" class="ss-title sr-item">Available Options and Upgrades</h2>
      <p class="au-subtitle sr-item">
        The available configuration is sail-specific. The written quotation and build
        specification control over this general list.
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
