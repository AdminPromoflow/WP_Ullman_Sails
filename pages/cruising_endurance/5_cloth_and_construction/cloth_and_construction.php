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

<section class="nav-specsheet" data-sr-reveal aria-label="Endurance cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item" data-sr-delay="0">Cloth Selection &amp; Construction</h2>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <!-- Rotator (reveal como bloque, NO en cada img para no romper el rotator) -->
        <figure class="nav-rotator sr-item" aria-label="Endurance sail image rotator" data-interval="3000" data-sr-delay="70">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="5_cloth_and_construction/img/sail_1.png?v=<?= $sail1V ?>"
                 alt="Endurance Series sail view 1"
                 data-sub="MAINSAIL, THE ENDURANCE SERIES">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_2.png?v=<?= $sail2V ?>"
                 alt="Endurance Series sail view 2"
                 data-sub="HEADSAIL, THE ENDURANCE SERIES">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_3.png?v=<?= $sail3V ?>"
                 alt="Endurance Series sail view 3"
                 data-sub="JIB, THE ENDURANCE SERIES">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">THE ENDURANCE SERIES</span>
            <span class="nav-rotator__capSub" id="navCapSub">MAINSAIL, THE ENDURANCE SERIES</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <!-- Text -->
        <div class="nav-specsheet__text">

          <div class="nav-specsheet__group sr-item" aria-label="Cloth Selection and Construction" data-sr-delay="140">
            <div class="nav-specsheet__groupTitle">ENDURO DACRON</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">CROSSCUT WOVEN POLYESTER</div>
              <div class="nav-specsheet__item">RADIAL WOVEN POLYESTER</div>
            </div>
          </div>

          <div class="nav-specsheet__group sr-item" data-sr-delay="210">
            <div class="nav-specsheet__groupTitle">ENDURO LAMINATE</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">RADIAL TAFFETA</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle sr-item" data-sr-delay="280">Standard Components</h3>

          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row sr-item" data-sr-delay="350">
              <div class="nav-specsheet__key">STITCHING</div>
              <div class="nav-specsheet__val">MULTIPLE TRIPLE-STEP</div>
            </div>

            <div class="nav-specsheet__row sr-item" data-sr-delay="420">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">STAINLESS STEEL &​amp; WEBBING LOAD STRAPS</div>
            </div>

            <div class="nav-specsheet__row sr-item" data-sr-delay="490">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">HIGH PERFORMANCE DURABLE THREAD</div>
            </div>

            <div class="nav-specsheet__row sr-item" data-sr-delay="560">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">HEAVIER, STRONGER, REINFORCED</div>
            </div>

            <div class="nav-specsheet__row sr-item" data-sr-delay="630">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">REINFORCED POCKETS &​amp; BATTENS</div>
            </div>

            <div class="nav-specsheet__row sr-item" data-sr-delay="700">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">RADIAL PATCHES</div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>
