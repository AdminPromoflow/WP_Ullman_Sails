<?php
declare(strict_types=1);

$cssFs = __DIR__ . '/cruising_section.css';
$jsFs  = __DIR__ . '/cruising_section.js';

$cssUrl = '../Racing/cruising_section/cruising_section.css';
$jsUrl  = '../Racing/cruising_section/cruising_section.js';

$cssV = is_file($cssFs) ? filemtime($cssFs) : null;
$jsV  = is_file($jsFs)  ? filemtime($jsFs)  : null;

function with_v(string $url, ?int $v): string {
  return $v ? ($url . '?v=' . $v) : $url;
}

$img1Fs = __DIR__ . '/img/navigator.png';
$img2Fs = __DIR__ . '/img/Endurance.png';
$img3Fs = __DIR__ . '/img/voyager.png';
$img4Fs = __DIR__ . '/img/racing_section.jpg';

$img1Url = '../Racing/cruising_section/img/navigator.png';
$img2Url = '../Racing/cruising_section/img/Endurance.png';
$img3Url = '../Racing/cruising_section/img/voyager.png';
$img4Url = '../Racing/cruising_section/img/racing_section.jpg';

$img1V = is_file($img1Fs) ? filemtime($img1Fs) : null;
$img2V = is_file($img2Fs) ? filemtime($img2Fs) : null;
$img3V = is_file($img3Fs) ? filemtime($img3Fs) : null;
$img4V = is_file($img4Fs) ? filemtime($img4Fs) : null;
?>

<link rel="stylesheet" href="<?= with_v($cssUrl, $cssV) ?>">

<section class="cruising-section" aria-labelledby="cruising-title">
  <div class="img-title-sailing-content">
    <img
      src="../cruising_navigator/1_introduction/img/ullman_sails.png"
      alt="Ullman Sails"
      decoding="async"
      width="240"
      height="72"
    >
  </div>

  <h2 id="cruising-title" class="cruising-title">Racing Sails</h2>

  <p class="cruising-subtitle">
    When it comes to racing sails, performance, precision and innovation are essential. Race Icon, FiberPath, and The Axia Series – Red Line represent the pinnacle of high-performance sail design, delivering speed, control and advanced technology for competitive sailing at the highest level.
  </p>

  <ul class="cruising-icons" role="list">

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('racing_race_series')); ?>">
        <img src="<?= with_v($img1Url, $img1V) ?>" alt="Race Icon">
        <h3 class="series">Race</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('racing_fiberpath_series')); ?>">
        <img src="<?= with_v($img2Url, $img2V) ?>" alt="FiberPath Icon">
        <h3 class="series">FiberPath</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('racing_red_line_series')); ?>">
        <img src="<?= with_v($img3Url, $img3V) ?>" alt="Red Line Icon">
        <h3 class="series">The Axia Series - Red Line</h3>
      </a>
    </li>
    
  </ul>

  <figure class="cruising-image">
    <div class="cruising-image-inner">
      <img src="<?= with_v($img4Url, $img4V) ?>" alt="Racing Sails">
    </div>
  </figure>
</section>

<script defer src="<?= with_v($jsUrl, $jsV) ?>"></script>
