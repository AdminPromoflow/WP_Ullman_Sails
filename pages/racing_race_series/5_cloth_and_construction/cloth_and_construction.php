<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/cloth_and_construction.js';

/* Rotator images (filesystem paths for filemtime) */
$rrSail1Fs = __DIR__ . '/img/sail_1.png';
$rrSail2Fs = __DIR__ . '/img/sail_2.png';
$rrSail3Fs = __DIR__ . '/img/sail_3.png';

/* Public paths */
$nsCssPublic = '5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = '5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();

$rrSail1V = is_file($rrSail1Fs) ? filemtime($rrSail1Fs) : time();
$rrSail2V = is_file($rrSail2Fs) ? filemtime($rrSail2Fs) : time();
$rrSail3V = is_file($rrSail3Fs) ? filemtime($rrSail3Fs) : time();
?>

<link rel="stylesheet" href="<?= $nsCssPublic ?>?v=<?= $nsCssV ?>">

<section class="nav-specsheet" data-sr-reveal aria-label="Race Series cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <!-- Rotator -->
        <figure class="nav-rotator sr-item" aria-label="Race Series cloth and construction rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../racing_race_series/5_cloth_and_construction/img/sail_1.png?v=<?= $rrSail1V ?>"
                 alt="Race sail view 1"
                 data-sub="RACE DACRON — WOVEN POLYESTER">

            <img class="nav-rotator__img"
                 src="../racing_race_series/5_cloth_and_construction/img/sail_2.png?v=<?= $rrSail2V ?>"
                 alt="Race sail view 2"
                 data-sub="RACE LAMINATE — LAMINATE / NON-WOVEN">

            <img class="nav-rotator__img"
                 src="../racing_race_series/5_cloth_and_construction/img/sail_3.png?v=<?= $rrSail3V ?>"
                 alt="Race sail view 3"
                 data-sub="BUILD DETAILS — FINISHING">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">RACE SERIES</span>
            <span class="nav-rotator__capSub">RACE DACRON — WOVEN POLYESTER</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__group sr-item" aria-label="Cloth Selection and Construction">
            <div class="nav-specsheet__groupTitle">RACE DACRON</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">CROSSCUT &amp; RADIAL WOVEN POLYESTER</div>
            </div>
          </div>

          <div class="nav-specsheet__group sr-item">
            <div class="nav-specsheet__groupTitle">RACE LAMINATE</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">LAMINATE &amp; NON-WOVEN TEXTILE OPTIONS</div>
            </div>
          </div>

          <!-- =========================
               STANDARD COMPONENTS
          ========================== -->
          <h3 class="nav-specsheet__subtitle sr-item">Typical Specification Areas</h3>

          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">STITCHING</div>
              <div class="nav-specsheet__val">SEAM OR JOINING METHOD CONFIRMED FOR THE MATERIAL</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">RING TYPE AND REINFORCEMENT SET BY THE BUILD SPECIFICATION</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">THREAD SELECTED FOR MATERIAL AND APPLICATION</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">SLIDE SYSTEM AND LOCAL REINFORCEMENT SPECIFIED FOR THE RIG</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">BATTEN AND TENSIONING SYSTEM SPECIFIED FOR THE SAIL</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">CORNER AND LOAD-POINT REINFORCEMENT TO THE FINAL DESIGN</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">CONSTRUCTION ADHESIVE</div>
              <div class="nav-specsheet__val">ADHESIVE OR JOINING DETAILS CONFIRMED FOR THE SELECTED LAMINATE</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">SAIL NUMBERS</div>
              <div class="nav-specsheet__val">NUMBERS AND INSIGNIA TO CLASS OR OWNER REQUIREMENTS</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">DRAFT STRIPES</div>
              <div class="nav-specsheet__val">POSITION AND STYLE CONFIRMED WITH THE SAILMAKER</div>
            </div>
            <div class="nav-specsheet__row sr-item">
              <div class="nav-specsheet__key">TELLTALES</div>
              <div class="nav-specsheet__val">NUMBER AND POSITION CONFIRMED FOR THE SAIL</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>
