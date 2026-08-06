<?php
declare(strict_types=1);

/**
 * Ajusta SOLO estos 2 URLs si esta sección se incluye desde otra ruta.
 * (El filemtime asume que Services.css y Services.js están en la misma carpeta que este index.php)
 */
$cssFs  = __DIR__ . '/Services.css';
$jsFs   = __DIR__ . '/Services.js';

$servicesBaseUrl = rtrim(get_template_directory_uri(), '/') . '/pages/Services/2.Services';
$cssUrl = $servicesBaseUrl . '/Services.css';
$jsUrl  = $servicesBaseUrl . '/Services.js';

$cssVer = is_file($cssFs) ? filemtime($cssFs) : null;
$jsVer  = is_file($jsFs)  ? filemtime($jsFs)  : null;
?>

<link rel="stylesheet" href="<?= $cssUrl ?><?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="<?= $jsUrl ?><?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services-section" aria-labelledby="services-title" data-sr-section>
  <div class="services-shell">

    <header class="services-head">
      <p class="services-brand" data-sr-item>ULLMAN SAILS</p>

      <h1 id="services-title" class="services-title" data-sr-item>Services</h1>

      <p class="services-subtitle" data-sr-item>
        Ullman Sails offers a range of services to help you maintain and extend the life of your sail inventory.
        Our loft experts will recommend the right solution for your goals and your budget — and a new sail isn’t always the answer.
      </p>
    </header>

    <div class="services-grid" role="list">
      <!-- Card 1 -->
      <a class="svc-card" href="<?php echo esc_url(ullman_page_url('Services-1.SailsRepair')); ?>" role="listitem" aria-label="All Sail Repairs" data-sr-item>
        <figure class="svc-media">
          <img src="<?= esc_url($servicesBaseUrl . '/img/services.jpg?v=' . ullman_file_version(__DIR__ . '/img/services.jpg')) ?>" alt="All Sail Repairs" loading="lazy" decoding="async">
        </figure>

        <div class="svc-body">
          <p class="svc-kicker">ALL SAIL</p>
          <h2 class="svc-title">REPAIRS</h2>
          <span class="svc-rule" aria-hidden="true"></span>
          <p class="svc-text">Professional inspection and repairs for common issues including tears, worn stitching, chafe and UV-damaged components.</p>
          <span class="svc-link ullman-button ullman-button--navy">LEARN MORE <span aria-hidden="true">→</span></span>
        </div>

        <span class="svc-bottomline" aria-hidden="true"></span>
      </a>

      <!-- Card 2 -->
      <a class="svc-card" href="<?php echo esc_url(ullman_page_url('Services-2.SailsCleaning')); ?>" role="listitem" aria-label="Sail and Canvas Cleaning" data-sr-item>
        <figure class="svc-media">
          <img src="<?= esc_url($servicesBaseUrl . '/img/cleaning.jpg?v=' . ullman_file_version(__DIR__ . '/img/cleaning.jpg')) ?>" alt="Sail and Canvas Cleaning" loading="lazy" decoding="async">
        </figure>

        <div class="svc-body">
          <p class="svc-kicker">SAIL AND CANVAS</p>
          <h2 class="svc-title">CLEANING</h2>
          <span class="svc-rule" aria-hidden="true"></span>
          <p class="svc-text">Professional sail and canvas cleaning, with treatments selected for the material and its condition.</p>
          <span class="svc-link ullman-button ullman-button--navy">LEARN MORE <span aria-hidden="true">→</span></span>
        </div>

        <span class="svc-bottomline" aria-hidden="true"></span>
      </a>

      <!-- Card 3 -->
      <a class="svc-card" href="<?php echo esc_url(ullman_page_url('Services-3.CanvasRepair')); ?>" role="listitem" aria-label="Canvas Repairs" data-sr-item>
        <figure class="svc-media">
          <img src="<?= esc_url($servicesBaseUrl . '/img/covers.jpg?v=' . ullman_file_version(__DIR__ . '/img/covers.jpg')) ?>" alt="Canvas Repairs" loading="lazy" decoding="async">
        </figure>

        <div class="svc-body">
          <p class="svc-kicker">CANVAS</p>
          <h2 class="svc-title">REPAIRS</h2>
          <span class="svc-rule" aria-hidden="true"></span>
          <p class="svc-text">Inspection and repair of boat covers, biminis and other marine-canvas products where their condition allows.</p>
          <span class="svc-link ullman-button ullman-button--navy">LEARN MORE <span aria-hidden="true">→</span></span>
        </div>

        <span class="svc-bottomline" aria-hidden="true"></span>
      </a>
    </div>

  </div>
</section>
