<?php
declare(strict_types=1);

// =========================
// Design & Construction — data + shared SVG
// =========================
$dac_cube_svg = <<<SVG
<svg class="dac-cube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <polygon points="12,2 22,7 12,12 2,7" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="2,7 12,12 12,22 2,17" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="22,7 12,12 12,22 22,17" fill="#0f2140" stroke="#0f2140" stroke-width="1.4"></polygon>
</svg>
SVG;

$dac_items = [
  [ 'title' => 'Cruising Blue Line', 'text' => 'Purpose-built for cruising sailors who prioritize dependable downwind performance and approachable handling.' ],
  [ 'title' => 'Code Range', 'text' => 'Code 50, Code 60 and Code 70 are differentiated by mid-girth and progressively broader target angles.' ],
  [ 'title' => 'Spinnaker Range', 'text' => 'Custom symmetrical and asymmetrical spinnakers extend the inventory into deeper downwind sailing.' ],
  [ 'title' => 'Luff Technology', 'text' => 'Axia combines Active Luff™ development with proven cable-based options; the correct solution depends on the model.' ],
  [ 'title' => 'Verified Materials', 'text' => 'Ullman identifies Code Zero laminate and nylon spinnaker cloth as core Axia material families.' ],
  [ 'title' => 'Custom Specification', 'text' => 'Shape, size, cloth and handling systems are selected for the yacht and the owner’s requirements.' ],
];

// Filesystem paths (for filemtime)
$cssFile = __DIR__ . '/design_and_construction.css';
$jsFile  = __DIR__ . '/design_and_construction.js';

// Versions
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="3_design_and_construction/design_and_construction.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="design-and-construction" data-sr-reveal aria-labelledby="dac-title">
  <div class="dac-wrap">

    <header class="dac-header">
      <p class="dac-tagline">Axia Blue Line</p>
      <h2 id="dac-title" class="dac-title">Purpose-Built Downwind Design</h2>

      <p class="dac-subtitle">
        Axia Blue Line is the current Ullman cruising range for Code sails and symmetrical and asymmetrical spinnakers. Each model has a distinct role and must be specified for the individual yacht.
      </p>
    </header>

    <ul class="dac-grid" role="list">
      <?php foreach ($dac_items as $item): ?>
        <li class="dac-card">
          <div class="dac-icon" aria-hidden="true">
            <?= $dac_cube_svg ?>
          </div>

          <h3 class="dac-card-title"><?= htmlspecialchars((string)$item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
          <p class="dac-card-text"><?= htmlspecialchars((string)$item['text'], ENT_QUOTES, 'UTF-8') ?></p>
        </li>
      <?php endforeach; ?>
    </ul>

  </div>
</section>

<script defer src="3_design_and_construction/design_and_construction.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>" type="text/javascript"></script>
