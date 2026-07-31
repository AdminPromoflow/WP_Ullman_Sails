<?php
$cssFile = __DIR__ . '/SailCare/3.material/material.css';
$jsFile  = __DIR__ . '/SailCare/3.material/material.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../SailCare/3.material/material.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<section class="sci" aria-labelledby="sci-title" data-sr-reveal>
  <div class="sci__inner">

    <header class="sci__header sr-item">
      <p class="sci__kicker"> SAIL CARE</p>
      <h1 class="sci__pageTitle" id="sci-title">
        Sail Care by <em>Material</em> &amp; <em>Boat Type</em>
      </h1>
    </header>

    <div class="sci__grid">
      <!-- LEFT: cards -->
      <div class="sci__cards">

        <!-- MATERIAL TYPE -->
        <section class="sci-card sr-item" aria-labelledby="sci-mat-title">
          <p class="sci-card__label">MATERIAL TYPE</p>

          <h2 class="sci-card__title" id="sci-mat-title">
            Sail Care for <em>Material Type</em>
          </h2>

          <nav class="sci-card__nav" aria-label="Sail care by material type">
            <a class="sci-link" href="#Woven_Dacron">
              <span class="sci-link__text">Woven Dacron and Spectra/Dyneema Sails</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>

            <a class="sci-link" href="#Laminate">
              <span class="sci-link__text">Laminate</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>

            <a class="sci-link" href="#Laminate">
              <span class="sci-link__text">FiberPath</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>

            <a class="sci-link" href="#Spinnaker_Cloth">
              <span class="sci-link__text">Spinnaker Cloth (Nylon and Polyester)</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>
          </nav>
        </section>

        <!-- BOAT TYPE -->
        <section class="sci-card sr-item" aria-labelledby="sci-boat-title">
          <p class="sci-card__label">BOAT TYPE</p>

          <h2 class="sci-card__title" id="sci-boat-title">
            Sail Care for <em>Boat Type</em>
          </h2>

          <nav class="sci-card__nav" aria-label="Sail care by boat type">
            <a class="sci-link" href="#Keelboat_Multihull">
              <span class="sci-link__text">Keelboat and Multihull Cruising Sails</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>

            <a class="sci-link" href="#Dinghy_Sails">
              <span class="sci-link__text">Dinghy and One Design Sails</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>

            <a class="sci-link" href="#Keelboat_Sails">
              <span class="sci-link__text">Keelboat and Multihull Racing Sails</span>
              <span class="sci-link__chev" aria-hidden="true"></span>
            </a>
          </nav>
        </section>

      </div>

      <!-- RIGHT: sticky image -->
      <aside class="sci__aside sr-item" aria-label="Sail care image">
        <figure class="sci__media move-pan">
          <img
            src="../SailCare/3.material/img/material.png"
            alt="Sail care hero"
            loading="lazy"
            decoding="async"
          >
        </figure>
      </aside>
    </div>

  </div>
</section>

<script defer src="../SailCare/3.material/material.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
