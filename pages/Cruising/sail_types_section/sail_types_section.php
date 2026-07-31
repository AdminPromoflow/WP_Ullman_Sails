<?php
/* =======================
   sail_types_section.php
   ======================= */
declare(strict_types=1);

/* CSS + JS (filemtime) */
$cssV = filemtime(__DIR__ . '/sail_types_section.css');
$jsV  = filemtime(__DIR__ . '/sail_types_section.js');

/* Arrows */
$arrowLeftV  = filemtime(__DIR__ . '/img/arrow_left.png');
$arrowRightV = filemtime(__DIR__ . '/img/arrow_right.png');

/* Slides */
$navigatorV   = filemtime(__DIR__ . '/img/Navigator.png');
$enduranceV   = filemtime(__DIR__ . '/img/Endurance.png');
$voyagerV     = filemtime(__DIR__ . '/img/Voyager.png');
$performanceV = filemtime(__DIR__ . '/img/Performance.png');
$downwindV    = filemtime(__DIR__ . '/img/Downwind.png');
$sectionUrl = get_template_directory_uri() . '/pages/Cruising/sail_types_section';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/sail_types_section.css?v=' . $cssV); ?>">
<script defer src="<?php echo esc_url($sectionUrl . '/sail_types_section.js?v=' . $jsV); ?>"></script>

<section class="sail-types-section" aria-labelledby="sail-types-heading">
  <h2 id="sail-types-heading" class="sail-types-heading" data-st-parallax-text>
    <span class="sail-types-heading__eyebrow">Sail types</span>
    Discover Your <br>Perfect Sail
  </h2>

  <p class="sail-types-subtitle" data-st-parallax-text>
    From everyday cruising to long-distance adventures, we have a sail type to match every journey.
  </p>

  <div class="sail-types-container">

    <button class="sail-types-arrow sail-types-arrow-left" type="button" aria-label="Previous">
      <img src="<?php echo esc_url($sectionUrl . '/img/arrow_left.png?v=' . $arrowLeftV); ?>" alt="">
    </button>

    <button class="sail-types-arrow sail-types-arrow-right" type="button" aria-label="Next">
      <img src="<?php echo esc_url($sectionUrl . '/img/arrow_right.png?v=' . $arrowRightV); ?>" alt="">
    </button>

    <div class="sail-types-scroller-container">

      <a href="<?php echo esc_url(ullman_page_url('cruising_navigator')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="<?php echo esc_url($sectionUrl . '/img/Navigator.png?v=' . $navigatorV); ?>"
            alt="Navigator"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Navigator Series
            </p>
          </div>
        </article>
      </a>

      <a href="<?php echo esc_url(ullman_page_url('cruising_endurance')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="<?php echo esc_url($sectionUrl . '/img/Endurance.png?v=' . $enduranceV); ?>"
            alt="Endurance"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Endurance Series
            </p>
          </div>
        </article>
      </a>

      <a href="<?php echo esc_url(ullman_page_url('cruising_voyager')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="<?php echo esc_url($sectionUrl . '/img/Voyager.png?v=' . $voyagerV); ?>"
            alt="Voyager"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Voyager Series
            </p>
          </div>
        </article>
      </a>

      <a href="<?php echo esc_url(ullman_page_url('cruising_performance')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="<?php echo esc_url($sectionUrl . '/img/Performance.png?v=' . $performanceV); ?>"
            alt="Performance"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Performance
            </p>
          </div>
        </article>
      </a>

      <a href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="<?php echo esc_url($sectionUrl . '/img/Downwind.png?v=' . $downwindV); ?>"
            alt="Downwind"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Downwind
            </p>
          </div>
        </article>
      </a>

    </div>

    <div class="sail-types-dots" aria-label="Slider dots">
      <button class="sail-types-dot is-active" data-index="0" type="button" aria-label="Go to slide 1"></button>
      <button class="sail-types-dot" data-index="1" type="button" aria-label="Go to slide 2"></button>
      <button class="sail-types-dot" data-index="2" type="button" aria-label="Go to slide 3"></button>
      <button class="sail-types-dot" data-index="3" type="button" aria-label="Go to slide 4"></button>
      <button class="sail-types-dot" data-index="4" type="button" aria-label="Go to slide 5"></button>
    </div>

  </div>
</section>
