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
  aria-label="Navigator cloth and components"
>
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection</h2>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Navigator sail image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="5_cloth_and_construction/img/sail_1.png?v=<?= $sail1V ?>"
                 alt="Navigator Series sail view 1"
                 data-sub="MAINSAIL">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_2.png?v=<?= $sail2V ?>"
                 alt="Navigator Series sail view 2"
                 data-sub="HEADSAIL">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_3.png?v=<?= $sail3V ?>"
                 alt="Navigator Series sail view 3"
                 data-sub="JIB">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">THE NAVIGATOR SERIES</span>
            <span class="nav-rotator__capSub" id="navCapSub">MAINSAIL</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__meta sr-item">
            <div class="nav-specsheet__metaTop">NAVIGATOR DACRON</div>
            <div class="nav-specsheet__metaSub">CROSSCUT WOVEN POLYESTER</div>
          </div>

          <h3 class="nav-specsheet__subtitle sr-item">Standard Components</h3>

          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">STITCHING</div>
              <div class="nav-specsheet__val">TRIPLE-STEP</div>
            </div>

            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">STAINLESS STEEL</div>
            </div>

            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">HIGH PERFORMANCE DURABLE THREAD</div>
            </div>

            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">HANKS OR SLIDES</div>
            </div>

            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">REINFORCED POCKETS &amp; BATTENS</div>
            </div>

            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">BLOCK PATCHES</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>
