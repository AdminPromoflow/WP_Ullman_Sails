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
    'text'  => 'Tightly woven premium Dacron resists UV, flogging and marine wear, reducing stretch and tearing so the sail holds its shape for longer in regular cruising use.',
  ],
  [
    'title' => 'Cross-Cut Panel Layout',
    'text'  => 'Traditional cross-cut panels spread loads evenly and support long-term shape stability, making the sail reliable and easy to handle across varied coastal conditions.',
  ],
  [
    'title' => 'Layered Corner Reinforcements',
    'text'  => 'Multi-layer “block patches” strengthen tack, clew and head, distributing high loads from sheets and halyards to prevent distortion, stretching and early corner failure.',
  ],
  [
    'title' => 'Triple-Step Stitching & UV Thread',
    'text'  => 'Triple-step zigzag seams add redundancy and strength, while UV-resistant thread helps stitching last in sunlight; UV covers may use Tenara for maximum longevity.',
  ],
  [
    'title' => 'Marine-Grade Corner Hardware',
    'text'  => 'Stainless steel rings withstand high loads without corrosion, and an aluminium headboard on mainsails spreads stress at the head for a durable, secure attachment.',
  ],
  [
    'title' => 'Reinforced Batten Pockets',
    'text'  => 'Reinforced batten pockets reduce chafe and splitting, keeping fibreglass battens secure and lowering the risk of pocket damage during flogging or heavy handling.',
  ],
  [
    'title' => 'Furling Fit & UV Protection Options',
    'text'  => 'Hardware and finishing can be tailored to your furling unit, with optional UV covers protecting leech and foot when furled, extending service life in sunny climates.',
  ],
  [
    'title' => 'Cruising-Focused Specs & Upgrades',
    'text'  => 'Built for coastal cruising with solid baseline construction, plus options like extra reefs, foam luff pads and anti-mildew treatments for tougher use and longer life.',
  ],
  [
    'title' => 'Manufacturer Claims & User Feedback',
    'text'  => 'Ullman positions Navigator as affordable yet durable, and owner feedback commonly cites strong build quality, good shape retention and confidence over multiple seasons.',
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

<section class="strength-in-the-details" aria-labelledby="sid-title" data-sr-reveal>
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline sr-item" data-sr-delay="0">Navigator Series</p>
      <h2 id="sid-title" class="sid-title sr-item" data-sr-delay="70">Durability and Reinforcement</h2>
      <p class="sid-intro sr-item" data-sr-delay="140">
        Built for coastal cruising and day sailing, the Ullman Sails Navigator Series blends premium Dacron with proven reinforcement for reliable shape and durability. Explore the nine key features below.
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
