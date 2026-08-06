<?php
$sectionUrl = get_template_directory_uri() . '/pages/Racing/series_section';
$cssTime = filemtime(__DIR__ . '/series_section.css');
$jsTime  = filemtime(__DIR__ . '/series_section.js');

$img1Time = filemtime(__DIR__ . '/img/race.jpg');
$img2Time = filemtime(__DIR__ . '/img/fiberpath.jpg');
$img3Time = filemtime(__DIR__ . '/img/red_line.jpg');
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/series_section.css?v=' . $cssTime); ?>">

<div class="series-list">

  <!-- Race Series -->
  <section class="series-section"
    data-sr-reveal
    data-sr-stagger="70"
    aria-labelledby="series-title-navigator"
  >
    <header class="series-header">
      <p class="series-subtitle">Racing Sails</p>
      <h2 id="series-title-navigator" class="series-title">Race Series</h2>
    </header>

    <div class="series-container">


      <div class="series-text">
        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('racing_race_series')); ?>">Cloth <em>Selection</em></a></h4>
        <p><strong>RACE DACRON</strong></p>
        <p>Race Dacron is a woven-polyester option. Ullman lists cross-cut and radial construction, with the final cloth weight and layout selected for the boat and racing programme.</p>

        <p><strong>RACE LAMINATE</strong></p>
        <p>Race laminates can reduce weight and stretch compared with woven Dacron. Fibre, film or non-woven components and panel layout vary with the required load, durability and class or rating constraints.</p>
      </div>
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sectionUrl . '/img/race.jpg?v=' . $img1Time); ?>"
          alt="Race Series sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('racing_race_series')); ?>">View Brochure</a>
      </figure>
    </div>
  </section>

  <!-- FiberPath Series -->
  <section class="series-section"
    data-sr-reveal
    data-sr-stagger="70"
    aria-labelledby="series-title-voyager"
  >
    <header class="series-header">
      <p class="series-subtitle">RACING SAILS</p>
      <h2 id="series-title-voyager" class="series-title">FiberPath Series</h2>
    </header>

    <div class="series-container">
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sectionUrl . '/img/fiberpath.jpg?v=' . $img2Time); ?>"
          alt="FiberPath Series sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('racing_fiberpath_series')); ?>">View Brochure</a>
      </figure>

      <div class="series-text">
        <hr class="series-divider" aria-hidden="true">

        <p><strong>FiberPath Regatta</strong></p>
        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('racing_fiberpath_series')); ?>">Custom Fibre Layout <em>for Racing</em></a></h4>
        <p>FiberPath Regatta uses a custom string-laminate layout with carbon, aramid or a specified blend. Ullman lists film, taffeta and non-woven textile skin options; the selected build balances weight, handling and abrasion protection.</p>

        <p><strong>FiberPath Grand Prix</strong></p>
        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('racing_fiberpath_series')); ?>">Custom Load Paths, <em>Programme-Specific Build</em></a></h4>
        <p>FiberPath Grand Prix is the higher-specification custom string-laminate option. Fibre layout and external surfaces are selected around the sail loads and programme; results also depend on boat setup, crew and conditions.</p>
      </div>
    </div>
  </section>

  <!-- The Axia Series – Red Line -->
  <section class="series-section is-reversed"
    data-sr-reveal
    data-sr-stagger="70"
    aria-labelledby="series-title-race"
  >
    <header class="series-header">
      <p class="series-subtitle">Racing Sails DOWNWIND</p>
      <h2 id="series-title-race" class="series-title">The Axia Series – Red Line</h2>
    </header>

    <div class="series-container">


      <div class="series-text">
        <p><strong>RED LINE AXIA CODE SAILS</strong></p>
        <p>
          Axia Red Line is Ullman’s downwind racing range for Code sails and symmetrical
          or asymmetrical spinnakers. Each model covers a different girth and apparent-wind
          application. Luff structure, furling system, cloth and operating wind range must be
          specified for the individual sail, boat and racing rules.
        </p>
      </div>
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sectionUrl . '/img/red_line.jpg?v=' . $img3Time); ?>"
          alt="Axia Red Line downwind sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('racing_red_line_series')); ?>">View Brochure</a>
      </figure>
    </div>
  </section>

</div>

<script src="<?php echo esc_url($sectionUrl . '/series_section.js?v=' . $jsTime); ?>" defer></script>
