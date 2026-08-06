<?php
$cssFile = __DIR__ . '/cruising_section.css';
$jsFile  = __DIR__ . '/cruising_section.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
$sectionUrl = get_template_directory_uri() . '/pages/Cruising/cruising_section';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/cruising_section.css' . ($cssVer ? '?v=' . $cssVer : '')); ?>">
<section class="cruising-section" aria-labelledby="cruising-title">
  <div class="img-title-sailing-content">
      <img
        src="<?php echo esc_url(get_template_directory_uri() . '/pages/Home/1_slider/img/ullman_sails.png'); ?>"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

  <h1 id="cruising-title" class="cruising-title">Cruising sails</h1>

  <p class="cruising-subtitle">
    Every Ullman cruising sail is custom-built around the boat, cruising style and budget. The range covers
    day and coastal sailing, offshore and high-latitude cruising, performance-focused yachts and dedicated
    downwind sailing.
  </p>

  <ul class="cruising-icons" role="list">
    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_navigator')); ?>">
        <img src="<?php echo esc_url($sectionUrl . '/img/navigator.png'); ?>" alt="Navigator Icon">
        <h3 class="series">Navigator</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_endurance')); ?>">
        <img src="<?php echo esc_url($sectionUrl . '/img/Endurance.png'); ?>" alt="Endurance Icon">
        <h3 class="series">Endurance</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_voyager')); ?>">
        <img src="<?php echo esc_url($sectionUrl . '/img/voyager.png'); ?>" alt="Voyager Icon">
        <h3 class="series">Voyager</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_performance')); ?>">
        <img src="<?php echo esc_url($sectionUrl . '/img/performance.png'); ?>" alt="Performance Icon">
        <h3 class="series">Performance</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>">
        <img src="<?php echo esc_url($sectionUrl . '/img/downwind.png'); ?>" alt="Downwind Icon">
        <h3 class="series">Downwind</h3>
      </a>
    </li>
  </ul>

  <figure class="cruising-image">
    <div class="cruising-image-inner">
      <img src="<?php echo esc_url($sectionUrl . '/img/cruising_section.jpg'); ?>" alt="Cruising Sails">
    </div>
  </figure>
</section>
<script defer src="<?php echo esc_url($sectionUrl . '/cruising_section.js' . ($jsVer ? '?v=' . $jsVer : '')); ?>"></script>
