<?php
declare(strict_types=1);

// =========================
// Strength in the Details — items + shared SVG
// =========================
$dac_cube_svg = <<<SVG
<svg class="dac-cube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <polygon points="12,2 22,7 12,12 2,7" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="2,7 12,12 12,22 2,17" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="22,7 12,12 12,22 22,17" fill="#0f2140" stroke="#0f2140" stroke-width="1.4"></polygon>
</svg>
SVG;

$sid_items = [
  [
    'title' => 'Premium Dacron Cloth',
    'text'  => 'The series uses premium, tightly woven polyester sailcloth selected for dependable durability in day sailing and coastal cruising.',
  ],
  [
    'title' => 'Cross-Cut Panel Layout',
    'text'  => 'Navigator Dacron is built in a cross-cut layout, matching the straightforward construction described for the series by Ullman Sails.',
  ],
  [
    'title' => 'Custom Fit',
    'text'  => 'Every sail is designed around the boat’s measurements and the owner’s sailing style instead of being supplied as a standard stock sail.',
  ],
  [
    'title' => 'Practical Reinforcement',
    'text'  => 'Reinforcement and finishing are specified for the individual sail and intended recreational use; exact components are confirmed by the loft.',
  ],
  [
    'title' => 'UV and Handling Choices',
    'text'  => 'UV protection, roller-furling compatibility and sail inventory choices should be agreed with the local loft for the boat and sailing area.',
  ],
];

// Filesystem paths (for filemtime)
$sidCssFs = __DIR__ . '/durability_and_reinforcement.css';
$sidJsFs  = __DIR__ . '/durability_and_reinforcement.js';

// Public paths
$sidCssPublic = '4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsPublic  = '4_durability_and_reinforcement/durability_and_reinforcement.js';

// Versions
$sidCssV = is_file($sidCssFs) ? filemtime($sidCssFs) : time();
$sidJsV  = is_file($sidJsFs)  ? filemtime($sidJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $sidCssPublic ?>?v=<?= $sidCssV ?>">

<section class="strength-in-the-details" aria-labelledby="sid-title" data-sr-reveal>
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline sr-item" data-sr-delay="0">Navigator Series</p>
      <h2 id="sid-title" class="sid-title sr-item" data-sr-delay="70">Durability and Reinforcement</h2>
      <p class="sid-intro sr-item" data-sr-delay="140">
        Navigator is Ullman’s affordable, durable choice for day sailing and coastal cruising. Its final reinforcement, hardware and protection package is customized for the boat.
      </p>
    </header>

    <hr class="sid-divider sr-item" aria-hidden="true" data-sr-delay="210">

    <div class="sid-grid">
      <?php foreach ($sid_items as $i => $item): ?>
        <article class="sid-item sr-item" data-sr-delay="<?= 280 + ((int)$i * 70) ?>">
          <div class="sid-media" aria-hidden="true">
            <div class="sid-media-inner">
              <?= $dac_cube_svg ?>
            </div>
          </div>

          <div class="sid-content">
            <h3 class="sid-item-title"><?= htmlspecialchars((string)$item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="sid-item-text"><?= htmlspecialchars((string)$item['text'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script defer src="<?= $sidJsPublic ?>?v=<?= $sidJsV ?>" type="text/javascript"></script>
