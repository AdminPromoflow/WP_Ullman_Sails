<?php
/* =======================
   sail_types_section.php
   ======================= */
declare(strict_types=1);

/* CSS + JS (filemtime) */
$cssV = filemtime(__DIR__ . '/../Racing/sail_types_section/sail_types_section.css');
$jsV  = filemtime(__DIR__ . '/../Racing/sail_types_section/sail_types_section.js');

/* Arrows */
$arrowLeftV  = filemtime(__DIR__ . '/../Racing/sail_types_section/img/arrow_left.png');
$arrowRightV = filemtime(__DIR__ . '/../Racing/sail_types_section/img/arrow_right.png');

/* Slides */
$navigatorV   = filemtime(__DIR__ . '/../Racing/sail_types_section/img/race.jpg');
$enduranceV   = filemtime(__DIR__ . '/../Racing/sail_types_section/img/fiberpath.jpg');
$voyagerV     = filemtime(__DIR__ . '/../Racing/sail_types_section/img/red_line.jpg');
?>

<link rel="stylesheet" href="../Racing/sail_types_section/sail_types_section.css?v=<?= $cssV ?>">
<script defer src="../Racing/sail_types_section/sail_types_section.js?v=<?= $jsV ?>"></script>

<section class="sail-types-section" aria-labelledby="sail-types-heading">
  <h2 id="sail-types-heading" data-st-parallax-text>
    Discover Your <br>Perfect Sail
  </h2>

  <p class="sail-types-subtitle" data-st-parallax-text>
    From everyday cruising to long-distance adventures, we have a sail type to match every journey.
  </p>

  <div class="sail-types-container">

    <button class="sail-types-arrow sail-types-arrow-left" type="button" aria-label="Previous">
      <img src="../Racing/sail_types_section/img/arrow_left.png?v=<?= $arrowLeftV ?>" alt="">
    </button>

    <button class="sail-types-arrow sail-types-arrow-right" type="button" aria-label="Next">
      <img src="../Racing/sail_types_section/img/arrow_right.png?v=<?= $arrowRightV ?>" alt="">
    </button>

    <div class="sail-types-scroller-container">

      <a href="<?php echo esc_url(ullman_page_url('racing_race_series')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="../Racing/sail_types_section/img/race.jpg?v=<?= $navigatorV ?>"
            alt="Race Series"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Race Series
            </p>
          </div>
        </article>
      </a>

      <a href="<?php echo esc_url(ullman_page_url('racing_fiberpath_series')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="../Racing/sail_types_section/img/fiberpath.jpg?v=<?= $enduranceV ?>"
            alt="Fiberpath Series"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              Fiberpath Series
            </p>
          </div>
        </article>
      </a>

      <a href="<?php echo esc_url(ullman_page_url('racing_red_line_series')); ?>" class="sail-types-link">
        <article class="sail-types-box">
          <img
            data-st-parallax-img
            src="../Racing/sail_types_section/img/red_line.jpg?v=<?= $voyagerV ?>"
            alt="The Axia Series - Red Line"
            loading="lazy"
            decoding="async"
          >
          <div class="sail-types-overlay"></div>
          <div class="sail-types-caption">
            <p class="sail-types-title" data-st-parallax-text>
              The Axia Series - Red Line
            </p>
          </div>
        </article>
      </a>

    </div>

    <div class="sail-types-dots" aria-label="Slider dots">
      <button class="sail-types-dot is-active" data-index="0" type="button" aria-label="Go to slide 1"></button>
      <button class="sail-types-dot" data-index="1" type="button" aria-label="Go to slide 2"></button>
      <button class="sail-types-dot" data-index="2" type="button" aria-label="Go to slide 3"></button>
    </div>

  </div>
</section>
