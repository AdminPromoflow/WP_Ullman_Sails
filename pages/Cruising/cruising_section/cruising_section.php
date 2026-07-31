<?php
$cssFile = __DIR__ . '/../Cruising/cruising_section/cruising_section.css';
$jsFile  = __DIR__ . '/../Cruising/cruising_section/cruising_section.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Cruising/cruising_section/cruising_section.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
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

  <h1 id="cruising-title" class="cruising-title">Cruising sails</h1>

  <p class="cruising-subtitle">
    When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series,
    Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique
    features and benefits...
  </p>

  <ul class="cruising-icons" role="list">
    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_navigator')); ?>">
        <img src="../Cruising/cruising_section/img/navigator.png" alt="Navigator Icon">
        <h3 class="series">Navigator</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_endurance')); ?>">
        <img src="../Cruising/cruising_section/img/Endurance.png" alt="Endurance Icon">
        <h3 class="series">Endurance</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_voyager')); ?>">
        <img src="../Cruising/cruising_section/img/voyager.png" alt="Voyager Icon">
        <h3 class="series">Voyager</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_performance')); ?>">
        <img src="../Cruising/cruising_section/img/performance.png" alt="Performance Icon">
        <h3 class="series">Performance</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>">
        <img src="../Cruising/cruising_section/img/downwind.png" alt="Downwind Icon">
        <h3 class="series">Downwind</h3>
      </a>
    </li>
  </ul>

  <figure class="cruising-image">
    <div class="cruising-image-inner">
      <img src="../Cruising/cruising_section/img/cruising_section.jpg" alt="Cruising Sails">
    </div>
  </figure>
</section>
<script defer src="../Cruising/cruising_section/cruising_section.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
