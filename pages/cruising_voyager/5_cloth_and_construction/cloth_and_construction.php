<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.js';

/* Public paths */
$nsCssPublic = '5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = '5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();

/* Rotator image versions */
$sail1Fs = __DIR__ . '/img/sail_1.png';
$sail2Fs = __DIR__ . '/img/sail_2.png';
$sail3Fs = __DIR__ . '/img/sail_3.png';
$sail1V  = is_file($sail1Fs) ? filemtime($sail1Fs) : time();
$sail2V  = is_file($sail2Fs) ? filemtime($sail2Fs) : time();
$sail3V  = is_file($sail3Fs) ? filemtime($sail3Fs) : time();
?>

<link rel="stylesheet" href="<?= $nsCssPublic ?>?v=<?= $nsCssV ?>">

<section
  class="nav-specsheet"
  data-sr-reveal
  aria-label="Voyager cloth selection and construction"
>
  <!-- 1) Title -->
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <div class="nav-specsheet__wrap">
    <!-- 2) Panel -->
    <div class="nav-specsheet__panel sr-item">

      <div class="nav-specsheet__grid">

        <!-- 3) Rotator -->
        <figure class="nav-rotator sr-item" aria-label="Voyager sail image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="5_cloth_and_construction/img/sail_1.png?v=<?= $sail1V ?>"
                 alt="Voyager Series sail view 1"
                 data-sub="MAINSAIL, THE VOYAGER SERIES">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_2.png?v=<?= $sail2V ?>"
                 alt="Voyager Series sail view 2"
                 data-sub="HEADSAIL, THE VOYAGER SERIES">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_3.png?v=<?= $sail3V ?>"
                 alt="Voyager Series sail view 3"
                 data-sub="JIB, THE VOYAGER SERIES">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">THE VOYAGER SERIES</span>
            <span class="nav-rotator__capSub" id="navCapSub">MAINSAIL, THE VOYAGER SERIES</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <!-- 4) Text -->
        <div class="nav-specsheet__text sr-item">
          <div class="nav-specsheet__group" aria-label="Cloth Selection and Construction">
            <div class="nav-specsheet__groupTitle">ULTRACRUISE</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">RADIAL WOVEN ULTRA PE</div>
            </div>
          </div>

          <div class="nav-specsheet__group">
            <div class="nav-specsheet__groupTitle">VOYAGER DACRON</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">CROSSCUT WOVEN POLYESTER</div>
            </div>
          </div>

          <div class="nav-specsheet__group">
            <div class="nav-specsheet__groupTitle">VOYAGER FIBERPATH</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">FIBERPATH WITH TAFFETA</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Standard Components</h3>

          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">STITCHING</div>
              <div class="nav-specsheet__val">MULTIPLE TRIPLE-STEP</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">STAINLESS STEEL &amp; SPECTRA/DYNEEMA WEBBING</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">UV RESISTANT THREAD ON ALL SEAMING &amp; U.V COVERS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">ADDITIONAL REINFORCEMENTS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">REINFORCED POCKETS &amp; BATTENS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">OVERSIZED RADIAL PATCHES</div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>
