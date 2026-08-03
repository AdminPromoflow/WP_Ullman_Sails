<?php
$sliderCss = __DIR__ . '/Slider.css';
$sliderJs  = __DIR__ . '/Slider.js';

$sliderCssTime = file_exists($sliderCss) ? filemtime($sliderCss) : time();
$sliderJsTime  = file_exists($sliderJs)  ? filemtime($sliderJs)  : time();
?>

<link rel="stylesheet" href="../SailTypes/1.Slider/Slider.css?v=<?= $sliderCssTime ?>">

<section class="home-slider" aria-label="Home slider">
  <div id="homeSliderTrack" class="home-slider__track">

    <!-- CLONE (last real) -->
    <article class="home-slider__slide bg-axia is-caption-left" data-clone="last" aria-hidden="true">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../SailTypes/1.Slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">THE AXIA SERIES</h1>
        <h2 class="home-slider__subtitle">High-performance sails built to respond when it matters.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="<?php echo esc_url(ullman_page_url('the_axia_series')); ?>">Explore</a>
      </div>
    </article>

    <!-- REAL 1 -->
    <article class="home-slider__slide bg-racing-1 is-caption-left">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../SailTypes/1.Slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">RACING SAILS</h1>
        <h2 class="home-slider__subtitle">Built for speed. Tuned for results.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="<?php echo esc_url(ullman_page_url('Racing')); ?>">Click here</a>
      </div>
    </article>

    <!-- REAL 2 -->
    <article class="home-slider__slide bg-cruising-1">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../SailTypes/1.Slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">CRUISING SAILS</h1>
        <h2 class="home-slider__subtitle">Comfort at sea. Confidence in every mile.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="<?php echo esc_url(ullman_page_url('Cruising')); ?>">Click here</a>
      </div>
    </article>

    <!-- REAL 3 -->
    <article class="home-slider__slide bg-axia">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../SailTypes/1.Slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">THE AXIA SERIES</h1>
        <h2 class="home-slider__subtitle">High-performance sails built to respond when it matters.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="<?php echo esc_url(ullman_page_url('the_axia_series')); ?>">Explore</a>
      </div>
    </article>

    <!-- CLONE (first real) -->
    <article class="home-slider__slide bg-racing-1 is-caption-left" data-clone="first" aria-hidden="true">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../SailTypes/1.Slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">RACING SAILS</h1>
        <h2 class="home-slider__subtitle">Built for speed. Tuned for results.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="<?php echo esc_url(ullman_page_url('Racing')); ?>">Click here</a>
      </div>
    </article>

  </div>

  <button id="homeSliderPrev" class="home-slider__arrow home-slider__arrow--left" type="button" aria-label="Previous slide">
    <img src="../SailTypes/1.Slider/img/left.png" alt="">
  </button>

  <button id="homeSliderNext" class="home-slider__arrow home-slider__arrow--right" type="button" aria-label="Next slide">
    <img src="../SailTypes/1.Slider/img/right.png" alt="">
  </button>
</section>

<script src="../SailTypes/1.Slider/Slider.js?v=<?= $sliderJsTime ?>" defer></script>
