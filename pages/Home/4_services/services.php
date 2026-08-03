<?php
$sectionCss = __DIR__ . '/services.css';
$sectionJs  = __DIR__ . '/services.js';

$sectionCssTime = file_exists($sectionCss) ? filemtime($sectionCss) : time();
$sectionJsTime  = file_exists($sectionJs) ? filemtime($sectionJs) : time();
$sectionUrl = get_template_directory_uri() . '/pages/Home/4_services';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/services.css?v=' . $sectionCssTime); ?>">

<section class="events-section" aria-labelledby="sail_types_title">
  <div class="events-shell">

    <header class="events-header">
      <div class="img-title-sailing-content">
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/pages/Home/1_slider/img/ullman_sails.png'); ?>"
          alt="Ullman Sails"
          decoding="async"
          width="240"
          height="72"
        >
      </div>

      <h2 id="sail_types_title" class="sail_types_title">Services</h2>
    </header>

    <div class="events-list">

      <article class="event-card">
        <div class="event-card__media" aria-hidden="true">
          <div class="event-card__placeholder">
            <img
              class="event-card__image"
              src="<?php echo esc_url($sectionUrl . '/img/services.jpg'); ?>"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <div class="event-card__content">
          <h3 class="event-card__title"><a class="event-card__title-link" href="<?php echo esc_url(ullman_page_url('services_1_sails_repair')); ?>">All Sails Repair</a></h3>
          <p class="event-card__subtitle">Restore freshness and comfort to your sails and canvas.</p>

          <p class="event-card__text">
            Bring new life to tired sails and fabric covers with a careful service designed to
            improve freshness, appearance and everyday comfort on board.
          </p>
        </div>

        <div class="event-card__action">
          <a href="<?php echo esc_url(ullman_page_url('services_1_sails_repair')); ?>" class="ullman-button ullman-button--red st-btn st-btn-dark">Discover service</a>
        </div>
      </article>




      <article class="event-card">
        <div class="event-card__media" aria-hidden="true">
          <div class="event-card__placeholder">
            <img
              class="event-card__image"
              src="<?php echo esc_url($sectionUrl . '/img/cleaning.jpg'); ?>"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <div class="event-card__content">
          <h3 class="event-card__title"><a class="event-card__title-link" href="<?php echo esc_url(ullman_page_url('services_2_sails_cleaning')); ?>">Sail and Canvas Cleaning</a></h3>
          <p class="event-card__subtitle">Professional cleaning for a cleaner finish and longer life.</p>

          <p class="event-card__text">
            Our cleaning service helps remove built-up dirt, marks and salt residue while preserving
            the look, feel and long-term performance of your sails and canvas.
          </p>
        </div>

        <div class="event-card__action">
          <a href="<?php echo esc_url(ullman_page_url('services_2_sails_cleaning')); ?>" class="ullman-button ullman-button--red st-btn st-btn-dark">Discover service</a>
        </div>
      </article>






      <article class="event-card">
        <div class="event-card__media" aria-hidden="true">
          <div class="event-card__placeholder">
            <img
              class="event-card__image"
              src="<?php echo esc_url($sectionUrl . '/img/covers.jpg'); ?>"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <div class="event-card__content">
          <h3 class="event-card__title"><a class="event-card__title-link" href="<?php echo esc_url(ullman_page_url('services_3_canvas_repair')); ?>">Canvas Repair</a></h3>
          <p class="event-card__subtitle">Reliable repair work to bring damaged canvas back into shape.</p>

          <p class="event-card__text">
            From worn seams to damaged panels, we carry out dependable repair work that helps restore
            strength, function and a neat finish to your canvas.
          </p>
        </div>

        <div class="event-card__action">
          <a href="<?php echo esc_url(ullman_page_url('services_3_canvas_repair')); ?>" class="ullman-button ullman-button--red st-btn st-btn-dark">Discover service</a>
        </div>
      </article>


    </div>
  </div>
</section>

<script defer src="<?php echo esc_url($sectionUrl . '/services.js?v=' . $sectionJsTime); ?>"></script>
