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
    'title' => 'Race fabrics ',
    'text'  => 'Red Line racing fabrics are engineered for shape retention, low stretch and fast recovery, helping the sail bounce back after hard gusts and keep power steady.',
  ],
  [
    'title' => 'Active or cabled luffs',
    'text'  => 'Active Luff System or torsional cabled luffs stabilise the luff for direct furling improving depth control and reducing rig loads when rolling at speed afloat.',
  ],
  [
    'title' => 'Premium laminate Code cloth',
    'text'  => 'Premium laminate cloths in Axia Codes minimise stretch and hold draft stable through load cycles, giving reliable furling and trim in shifting breeze offshore.',
  ],
  [
    'title' => ' Coated spinnaker cloth',
    'text'  => 'Coated racing nylons and polyesters resist distortion and help the kite rotate smoothly holding a clean flying shape in pressure and during fast drops on deck.',
  ],
  [
    'title' => 'Protection upgrades',
    'text'  => 'Take-down patches torsional luff cables and clew tabs protect high-wear areas, reduce twist and make furling more steady at speed in tough conditions offshore.',
  ],
];

// Filesystem paths (for filemtime)
$sidCssFs = __DIR__ . '/4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsFs  = __DIR__ . '/4_durability_and_reinforcement/durability_and_reinforcement.js';

// Public paths
$sidCssPublic = '4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsPublic  = '4_durability_and_reinforcement/durability_and_reinforcement.js';

// Versions
$sidCssV = is_file($sidCssFs) ? filemtime($sidCssFs) : time();
$sidJsV  = is_file($sidJsFs)  ? filemtime($sidJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $sidCssPublic ?>?v=<?= $sidCssV ?>">

<section class="strength-in-the-details" data-sr-reveal aria-labelledby="sid-title">
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline sr-item">The Axia&nbsp;Series&nbsp;- Red Line</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Handling</h2>
      <p class="sid-intro sr-item">
        Axia Series – Red Line: downwind Codes and spinnakers built from premium laminates and coated racing nylons/polyesters with Active or cabled luffs for furling control and durability offshore.
      </p>
    </header>

    <hr class="sid-divider" aria-hidden="true">

    <div class="sid-grid">
      <?php foreach ($sid_items as $item): ?>
        <article class="sid-item sr-item">
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
