<?php
declare(strict_types=1);

/* =========================================================
   SAIL TYPES
   ========================================================= */

/* ---------------------------------------------------------
   CSS and JS file system paths
   --------------------------------------------------------- */
$st_css_fs = __DIR__ . '/sail_types.css';
$st_js_fs  = __DIR__ . '/sail_types.js';

/* ---------------------------------------------------------
   CSS and JS public paths
   --------------------------------------------------------- */
$st_url = get_template_directory_uri() . '/pages/Home/2_sail_types';
$st_css_public = $st_url . '/sail_types.css';
$st_js_public  = $st_url . '/sail_types.js';

/* ---------------------------------------------------------
   Versioning with filemtime
   --------------------------------------------------------- */
$st_css_v = is_file($st_css_fs) ? filemtime($st_css_fs) : time();
$st_js_v  = is_file($st_js_fs) ? filemtime($st_js_fs) : time();
?>

<!-- ========================================================
     CSS
     ======================================================== -->
<link rel="stylesheet" href="<?php echo esc_url($st_css_public . '?v=' . $st_css_v); ?>">

<!-- ========================================================
     Sail Types section
     ======================================================== -->
<section class="sail-types" aria-labelledby="sail_types_title">
  <div class="st-wrap">

    <!-- ----------------------------------------------------
         Section header
         ---------------------------------------------------- -->
    <div class="st-header">

      <!-- Ullman Sails logo -->
      <div class="img-title-sailing-content">
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/pages/Home/1_slider/img/ullman_sails.png'); ?>"
          alt="Ullman Sails"
          decoding="async"
          width="240"
          height="72"
        >
      </div>

      <!-- Main title -->
      <h1 id="sail_types_title" class="sail_types_title">Sail Types</h1>
    </div>

    <!-- ----------------------------------------------------
         Cards grid
         ---------------------------------------------------- -->
    <ul class="st-grid" role="list">

      <!-- ==================================================
           Card 1 — Racing Sails
           ================================================== -->
      <li class="st-card" style="--i: 0;">
        <div class="st-icon" aria-hidden="true">
          <img
            class="st-icon-img"
            src="<?php echo esc_url($st_url . '/img/racing_section.jpg'); ?>"
            alt=""
            loading="lazy"
            decoding="async"
          >
        </div>

        <h3 class="st-card-title">Racing Sails</h3>

        <p class="st-card-text">
          Built for speed and control—lightweight shapes, crisp trim response,
          and race-ready materials that help you secure seconds each leg.
        </p>

        <a class="st-btn st-btn-clear" href="<?php echo esc_url(ullman_page_url('racing')); ?>">
          See more
          <span class="st-btn-icon" aria-hidden="true">→</span>
        </a>
      </li>

      <!-- ==================================================
           Card 2 — Cruising Sails
           ================================================== -->
      <li class="st-card" style="--i: 1;">
        <div class="st-icon" aria-hidden="true">
          <img
            class="st-icon-img"
            src="<?php echo esc_url($st_url . '/img/cruising_section.jpg'); ?>"
            alt=""
            loading="lazy"
            decoding="async"
          >
        </div>

        <h3 class="st-card-title">Cruising Sails</h3>

        <p class="st-card-text">
          Made for relaxed, reliable miles—hardwearing cloth, easy handling,
          and balanced power so you sail comfortably, day after day at sea.
        </p>

        <a class="st-btn st-btn-dark" href="<?php echo esc_url(ullman_page_url('cruising')); ?>">
          See more
          <span class="st-btn-icon" aria-hidden="true">→</span>
        </a>
      </li>

      <!-- ==================================================
           Card 3 — The Axia Series
           ================================================== -->
      <li class="st-card" style="--i: 2;">
        <div class="st-icon" aria-hidden="true">
          <img
            class="st-icon-img"
            src="<?php echo esc_url($st_url . '/img/axia_series.jpg'); ?>"
            alt=""
            loading="lazy"
            decoding="async"
          >
        </div>

        <h3 class="st-card-title">The Axia Series</h3>

        <p class="st-card-text">
          A high-end performance range—advanced construction, excellent shape
          retention, and meticulous detailing for sailors who demand more.
        </p>

        <a class="st-btn st-btn-clear" href="<?php echo esc_url(ullman_page_url('the_axia_series')); ?>">
          See more
          <span class="st-btn-icon" aria-hidden="true">→</span>
        </a>
      </li>

    </ul>
  </div>
</section>

<!-- ========================================================
     JavaScript
     ======================================================== -->
<script defer src="<?php echo esc_url($st_js_public . '?v=' . $st_js_v); ?>" type="text/javascript"></script>
