<?php
$cssFile = __DIR__ . '/services.css';
$jsFile  = __DIR__ . '/services.js';

$cssVer = file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVer  = file_exists($jsFile)  ? filemtime($jsFile)  : time();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Racing Sails</title>

  <!-- Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../Racing/2.Services/services.css?v=<?= $cssVer ?>">
</head>
<body>

<section class="text">
  <div class="text__container">

    <a class="link_a" href="<?php echo esc_url(ullman_page_url('SailTypes')); ?>">&lt; Sail types</a>

  <!--  <div class="cruisingIntro">
  <p class="cruisingIntro__eyebrow">CRUISING</p>

  <h1 class="cruisingIntro__title">Cruising Sails</h1>

  <p class="cruisingIntro__text">
    When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series,
    Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique
    features and benefits...
  </p>

  <p class="cruisingIntro__text">
    Blue Line Spinnakers are a popular choice for cruisers looking for maximum downwind performance...
  </p>
</div> -->


    <!-- navSeries: 2 slides + flechas -->
    <div class="navSeries" id="navSeries">
      <div class="navSeries__wrap">

        <div class="navSeries__topRow">
          <div class="navSeries__top">
            <p class="navSeries__eyebrow">EXPLORE</p>
            <h2 class="navSeries__title">
              Cruising <span class="navSeries__titleItalic">Series</span>
            </h2>
          </div>

          <div class="navSeries__controls" aria-label="Cruising series slider controls">
            <button class="navSeries__arrow navSeries__arrow--prev" type="button" aria-label="Previous series">
              <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

            <button class="navSeries__arrow navSeries__arrow--next" type="button" aria-label="Next series">
              <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="navSeries__viewport" aria-live="polite">



          <!-- SLIDE 2 -->
          <article class="navSeries__slide" data-slide="1">
            <div class="navSeries__grid">

              <div class="navSeries__mediaCol">
                <figure class="navSeries__media">
                  <img class="navSeries__img"
                       src="../Racing/2.Services/Image/EnduranceSeries.jpg"
                       alt="Endurance Series cruising sails in stronger conditions"
                       loading="lazy"
                       decoding="async" />
                </figure>

                <a class="navSeries__brochure" href="<?php echo esc_url(ullman_page_url('Racing-2.Endurance')); ?>">VIEW BROCHURE</a>
              </div>

              <div class="navSeries__content">
                <p class="navSeries__kicker">CRUISING</p>
                <h3 class="navSeries__headline">Built for Longer Seasons & Heavy Use</h3>

                <p class="navSeries__text">
                  The Endurance Series is designed for cruisers who sail often and want extra longevity. Reinforcements are
                  focused on high-load areas to reduce wear over time.
                </p>

                <p class="navSeries__text">
                  A tougher build approach helps the sail hold shape longer, cope with repeated hoists, and stay dependable
                  in a wider range of real-world conditions.
                </p>

                <div class="navSeries__divider"></div>

                <h4 class="navSeries__subhead">Cloth <span class="navSeries__subItalic">Selection</span></h4>
                <p class="navSeries__label">ENDURANCE DACRON</p>

                <p class="navSeries__text">
                  A more robust Dacron option aimed at durability and long-term cruising reliability, with practical details
                  and a clean, hard-wearing finish.
                </p>
              </div>

            </div>
          </article>

        </div>
      </div>
    </div>

    <!-- Cards -->

  </div>
</section>

<script src="../Cruising/2.Services/services.js?v=<?= $jsVer ?>" defer></script>
</body>
</html>
