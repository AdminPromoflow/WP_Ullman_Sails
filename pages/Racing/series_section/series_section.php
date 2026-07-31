<?php
$cssTime = filemtime('../Racing/series_section/series_section.css');
$jsTime  = filemtime('../Racing/series_section/series_section.js');

$img1Time = filemtime('../Racing/series_section/img/race.jpg');
$img2Time = filemtime('../Racing/series_section/img/fiberpath.jpg');
$img3Time = filemtime('../Racing/series_section/img/red_line.jpg');
?>

<link rel="stylesheet" href="../Racing/series_section/series_section.css?v=<?= $cssTime ?>">

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

        <h4 class="series-cloth">Cloth <em>Selection</em></h4>
        <p><strong>RACE DACRON</strong></p>
        <p>Lightweight, durable choice for bay sailing, offering easy handling and reliable performance. Designed for recreational use, it features practical reinforcements and a clean finish.</p>

        <p><strong>RACE LAMINATE</strong></p>
        <p>Race Laminates are a lightweight option that delivers enhanced performance over Dacron, making it ideal for sailors seeking speed and efficiency. Radial Laminate provides superior durability and low stretch, ensuring long-lasting performance and reliability on the water.</p>
      </div>
      <figure class="series-image">
        <img
          src="../Racing/series_section/img/race.jpg?v=<?= $img1Time ?>"
          alt="Race Series sails"
          loading="lazy"
          decoding="async"
        />
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
          src="../Racing/series_section/img/fiberpath.jpg?v=<?= $img2Time ?>"
          alt="FiberPath Series sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

      <div class="series-text">
        <hr class="series-divider" aria-hidden="true">

        <p><strong>FiberPath Regatta</strong></p>
        <h4 class="series-cloth">Precision Engineered <em>for Speed</em></h4>
        <p>FiberPath Regatta sails deliver high-performance with a custom string laminate design. Engineered with carbon and aramid fibers, they offer strength and efficiency. Available with film, taffeta, or NWT skins for optimal durability and speed.</p>

        <p><strong>FiberPath Grand Prix</strong></p>
        <h4 class="series-cloth">Ultimate Strength, <em>Maximum Performance</em></h4>
        <p>FiberPath Grand Prix sails deliver elite performance and superior strength. By combining a custom string laminate with cutting-edge design, these sails offer exceptional load management and shape-holding abilities, making them the fastest sails on the water.</p>
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
          Axia is Ullman’s latest innovation in downwind sail technology, combining
          Active Luff™ construction while our expertise and experience recognize that
          cable-based technology remains one of the safest and fastest solutions
          available. Offering a perfect balance of power, durability, and adaptability,
          Axia delivers cutting-edge performance while remaining safe, reliable, and
          race-proven across all wind conditions.
        </p>
      </div>
      <figure class="series-image">
        <img
          src="../Racing/series_section/img/red_line.jpg?v=<?= $img3Time ?>"
          alt="Axia Red Line downwind sails"
          loading="lazy"
          decoding="async"
        />
      </figure>
    </div>
  </section>

</div>

<script src="../Racing/series_section/series_section.js?v=<?= $jsTime ?>" defer></script>
