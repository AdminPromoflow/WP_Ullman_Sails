<!-- =========================
     series_section.html — CLEAN (Reveal only)
========================= -->

<?php
$sectionCss = __DIR__ . '/series_section.css';
$sectionJs = __DIR__ . '/series_section.js';
$sectionCssTime = file_exists($sectionCss) ? filemtime($sectionCss) : time();
$sectionJsTime = file_exists($sectionJs) ? filemtime($sectionJs) : time();
$sectionUrl = get_template_directory_uri() . '/pages/Cruising/series_section';
$sailTypesUrl = get_template_directory_uri() . '/pages/Cruising/sail_types_section';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/series_section.css?v=' . $sectionCssTime); ?>">

<div class="series-list">

  <!-- Navigator Series -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-navigator">
    <header class="series-header">
      <p class="series-subtitle">Cruising sails</p>
      <h2 id="series-title-navigator" class="series-title">Navigator Series</h2>
    </header>

    <div class="series-container">
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sailTypesUrl . '/img/Navigator.png'); ?>"
          alt="Navigator Series cruising sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('cruising_navigator')); ?>">Explore Series</a>
      </figure>

      <div class="series-text">
        <h3 class="series-code"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_navigator')); ?>">NAVIGATOR</a></h3>
        <p class="series-tagline">Built for Smooth Bay Sailing</p>

        <p>The Navigator Series offers affordable, durable sails for day sailing and coastal cruising. Each sail is custom-designed to fit the boat and the sailor’s preferred style.</p>
        <p>Premium, tightly woven Dacron in a cross-cut layout provides easy handling and dependable durability for recreational use.</p>

        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_navigator')); ?>">Cloth <em>Selection</em></a></h4>
        <p><strong>NAVIGATOR DACRON</strong></p>
        <p>A premium, tightly woven polyester option for day and coastal sailing, built in a cross-cut panel layout.</p>
      </div>
    </div>
  </section>

  <!-- Endurance Series -->
  <section class="series-section is-reversed" data-sr-reveal aria-labelledby="series-title-endurance">
    <header class="series-header">
      <p class="series-subtitle">Cruising sails</p>
      <h2 id="series-title-endurance" class="series-title">Endurance Series</h2>
    </header>

    <div class="series-container">

      <div class="series-text">
        <h3 class="series-code"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_endurance')); ?>">ENDURANCE</a></h3>
        <p class="series-tagline">Reliable Strength for Coastal Cruising</p>

        <p>The Endurance Series is designed for offshore and passage-making cruisers, with reinforced high-load areas for sustained use and long-distance sailing.</p>
        <p>Mainsails receive reinforcement for extended reefing, while roller-reefing genoas are strengthened at the head and tack to help limit distortion.</p>

        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_endurance')); ?>">Cloth <em>Selection</em></a></h4>
        <p><strong>ENDURO DACRON / ENDURO LAMINATE</strong></p>
        <p>Choose durable woven polyester or a lower-stretch, taffeta-coated cruising laminate, matched to the boat and intended sailing.</p>
      </div>
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sailTypesUrl . '/img/Endurance.png'); ?>"
          alt="Endurance Series cruising sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('cruising_endurance')); ?>">Explore Series</a>
      </figure>

    </div>
  </section>

  <!-- Voyager Series -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-voyager">
    <header class="series-header">
      <p class="series-subtitle">Cruising sails</p>
      <h2 id="series-title-voyager" class="series-title">Voyager Series</h2>
    </header>

    <div class="series-container">
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sailTypesUrl . '/img/Voyager.png'); ?>"
          alt="Voyager Series cruising sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('cruising_voyager')); ?>">Explore Series</a>
      </figure>

      <div class="series-text">
        <h3 class="series-code"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_voyager')); ?>">VOYAGER</a></h3>
        <p class="series-tagline">Built for Confident Offshore Cruising</p>

        <p>The Voyager Series is Ullman’s premier range for luxury yachts and high-performance cruisers.</p>
        <p>Custom design and high-end materials help retain an efficient flying shape across a wider wind range.</p>

        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_voyager')); ?>">Cloth <em>Selection</em></a></h4>
        <p><strong>VOYAGER DACRON / ULTRACRUISE / VOYAGER FIBERPATH</strong></p>
        <p>Options range from reinforced cross-cut Dacron to woven Ultra-PE cloth and custom FiberPath construction with protective taffeta.</p>
      </div>
    </div>
  </section>

  <!-- Performance Series -->
  <section class="series-section is-reversed" data-sr-reveal aria-labelledby="series-title-performance">
    <header class="series-header">
      <p class="series-subtitle">Cruising sails</p>
      <h2 id="series-title-performance" class="series-title">Performance Series</h2>
    </header>

    <div class="series-container">


      <div class="series-text">
        <h3 class="series-code"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_performance')); ?>">PERFORMANCE</a></h3>
        <p class="series-tagline">Durable and Dependable Performance Cruising</p>

        <p>The Performance Series is designed for offshore and high-latitude cruising and superyachts operating in demanding conditions.</p>
        <p>Advanced design, precise construction and high-specification materials combine durability with performance.</p>

        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_performance')); ?>">Cloth <em>Selection</em></a></h4>
        <p><strong>ULTRALAM / PERFORMANCE FIBERPATH</strong></p>
        <p>UltraLam and custom FiberPath options are selected for low stretch, load management and durability in demanding applications.</p>
      </div>
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sailTypesUrl . '/img/Performance.png'); ?>"
          alt="Performance Series cruising sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('cruising_performance')); ?>">Explore Series</a>
      </figure>
    </div>
  </section>

  <!-- Axia Blue Line -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-blueline">
    <header class="series-header">
      <p class="series-subtitle">Cruising sails</p>
      <h2 id="series-title-blueline" class="series-title">Axia Series — Blue Line</h2>
    </header>

    <div class="series-container">
      <figure class="series-image">
        <img
          src="<?php echo esc_url($sailTypesUrl . '/img/Downwind.png'); ?>"
          alt="Axia Blue Line cruising downwind sails"
          loading="lazy"
          decoding="async"
        />
        <a class="view-brochure" href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>">Explore Series</a>
      </figure>

      <div class="series-text">
        <h3 class="series-code"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>">AXIA BLUE LINE</a></h3>
        <p class="series-tagline">Precision in Every Downwind Condition</p>

        <p>Axia Blue Line is the cruising side of Ullman’s downwind range, with Code sails and symmetrical and asymmetrical spinnakers.</p>
        <p>The sails are designed for easy trimming, dependable power and adaptable performance across changing wind angles and speeds.</p>

        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth"><a class="series-heading-link" href="<?php echo esc_url(ullman_page_url('cruising_downwind')); ?>">Cloth <em>Selection</em></a></h4>
        <p><strong>CODE ZERO LAMINATE / NYLON SPINNAKER CLOTH</strong></p>
        <p>Material and construction are matched to the selected Code or spinnaker model and the boat’s handling requirements.</p>
      </div>
    </div>
  </section>

</div>

<script src="<?php echo esc_url($sectionUrl . '/series_section.js?v=' . $sectionJsTime); ?>" defer></script>
