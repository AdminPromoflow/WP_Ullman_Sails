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
    'title' => 'Axia JT',
    'text'  => 'A high-clewed overlapping reaching headsail that Ullman lists for medium to strong winds; final range is boat-specific.',
  ],
  [
    'title' => 'Axia Code 50',
    'text'  => 'A 51–60% mid-girth screecher that may sheet inside the cap shrouds, subject to the individual rig and design.',
  ],
  [
    'title' => 'Axia Code 60',
    'text'  => 'A 60–70% mid-girth reaching to broad-reaching sail, normally sheeted outside the cap shrouds.',
  ],
  [
    'title' => 'Axia Code 75',
    'text'  => 'A Code Zero-style sail with more than 75% mid-girth so it can rate as a spinnaker under the referenced definition.',
  ],
  [
    'title' => 'Axia Symmetrical',
    'text'  => 'A symmetrical spinnaker for boats equipped with a spinnaker pole, custom-sized for the boat and requirements.',
  ],
  [
    'title' => 'Axia Asymmetrical',
    'text'  => 'An 80–97% mid-girth asymmetrical spinnaker for reaching to running; wind limits depend on vessel and cloth selection.',
  ],
  [
    'title' => 'Luff and furling system',
    'text'  => 'Cable, structured-luff and furler details are sail-specific and must be confirmed as a compatible package.',
  ],
  [
    'title' => 'Colour layout and graphics',
    'text'  => 'Panel colours and graphics are subject to cloth availability, added weight, production method and class or rating rules.',
  ],
  [
    'title' => 'Written build specification',
    'text'  => 'Cloth, weight, construction, hardware, markings, included accessories and operating limits must be confirmed by the loft.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title" data-sr-reveal>
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline sr-item">The Axia&nbsp;Series&nbsp;- Red Line</p>
      <h2 id="au-title" class="ss-title sr-item">Available Models and Configuration</h2>
      <p class="au-subtitle sr-item">
        Select by intended angle, girth, rig, rating requirements and handling system.
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
