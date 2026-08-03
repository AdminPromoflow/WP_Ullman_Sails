<?php
declare(strict_types=1);

/**
 * The Axia Series — Section (Blue Line / Red Line)
 * Paths: ajusta las rutas si tu carpeta real no es TheAxiaSeries/axia_section
 */

$cssFile = __DIR__ . '/the_axia_series_section.css';
$jsFile  = __DIR__ . '/the_axia_series_section.js';

$cssUrl = '../the_axia_series/the_axia_series_section/the_axia_series_section.css';
$jsUrl  = '../the_axia_series/the_axia_series_section/the_axia_series_section.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;

function with_v(string $url, ?int $v): string {
  return $v ? ($url . '?v=' . $v) : $url;
}

// Iconos (ajusta nombres/rutas a los tuyos reales)
$blueFs  = __DIR__ . '/img/downwind.png';
$redFs   = __DIR__ . '/img/downwind.png';
$heroFs  = __DIR__ . '/img/axia_series.jpg';

$blueUrl = '../the_axia_series/the_axia_series_section/img/downwind.png';
$redUrl  = '../the_axia_series/the_axia_series_section/img/downwind.png';
$heroUrl = '../the_axia_series/the_axia_series_section/img/axia_series.jpg';

$blueV = is_file($blueFs) ? filemtime($blueFs) : null;
$redV  = is_file($redFs)  ? filemtime($redFs)  : null;
$heroV = is_file($heroFs) ? filemtime($heroFs) : null;
?>

<link rel="stylesheet" href="<?= with_v($cssUrl, $cssVer) ?>">

<section class="axia-section" data-sr-reveal aria-labelledby="axia-title">
  <!-- Glow sutil (opcional, ya tienes el CSS listo) -->
  <span class="cs-glow" aria-hidden="true"></span>

  <div class="img-title-sailing-content">
    <img
      src="../cruising_navigator/1_introduction/img/ullman_sails.png"
      alt="Ullman Sails"
      decoding="async"
      width="240"
      height="72"
    >
  </div>

  <h1 id="axia-title" class="axia-title">The Axia Series</h1>

  <p class="axia-subtitle">
    Built for high-performance sailing, The Axia Series delivers responsive handling, efficient shapes,
    and reliable control when conditions demand more.
  </p>

  <!-- SOLO 2 OPCIONES -->
  <ul class="axia-icons" role="list">
    <li class="axia-icon">
      <a class="axia-link" href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>">
        <img src="<?= with_v($blueUrl, $blueV) ?>" alt="Blue Line Icon" loading="lazy" decoding="async">
        <h3 class="series">Blue Line</h3>
      </a>
    </li>

    <li class="axia-icon">
      <a class="axia-link" href="<?php echo esc_url(ullman_page_url('racing_red_line_series')); ?>">
        <img src="<?= with_v($redUrl, $redV) ?>" alt="Red Line Icon" loading="lazy" decoding="async">
        <h3 class="series">Red Line</h3>
      </a>
    </li>
  </ul>

  <figure class="axia-image">
    <div class="axia-image-inner">
      <img src="<?= with_v($heroUrl, $heroV) ?>" alt="The Axia Series" loading="lazy" decoding="async">
    </div>
  </figure>
</section>

<script defer src="<?= with_v($jsUrl, $jsVer) ?>"></script>
