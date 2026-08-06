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
    'title' => 'Application-specific cloth',
    'text'  => 'Code laminates and lightweight spinnaker fabrics behave differently. Cloth and weight are selected for the sail model, boat and expected conditions.',
  ],
  [
    'title' => 'Luff and furling specification',
    'text'  => 'Where a Code sail is furled, the luff structure, cable and furler must be specified as a compatible system. Classic spinnakers use different handling arrangements.',
  ],
  [
    'title' => 'Code sail geometry',
    'text'  => 'Mid-girth, clew height and sheeting position distinguish JT, Code 50, Code 60 and Code 75 applications.',
  ],
  [
    'title' => 'Spinnaker geometry',
    'text'  => 'Symmetrical sails require a spinnaker-pole arrangement; asymmetrical sails are offered across a broad mid-girth range for reaching to running.',
  ],
  [
    'title' => 'Care and operating limits',
    'text'  => 'Light downwind cloth is vulnerable to overload, chafe and handling damage. Follow the sailmaker’s wind limits and arrange inspection after damage or heavy use.',
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

<section class="strength-in-the-details" data-sr-reveal aria-labelledby="sid-title">
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline sr-item">The Axia&nbsp;Series&nbsp;- Red Line</p>
      <h2 id="sid-title" class="sid-title sr-item">Durability and Handling</h2>
      <p class="sid-intro sr-item">
        Red Line construction is not one universal membrane or luff system. Materials,
        reinforcement and handling equipment vary between Code sails and classic
        spinnakers and must be recorded in the final specification.
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
