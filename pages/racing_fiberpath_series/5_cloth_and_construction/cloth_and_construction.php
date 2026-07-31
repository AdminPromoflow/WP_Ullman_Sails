<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.js';

/* Rotator images (filesystem paths for filemtime) */
$fpRegattaMainFs = __DIR__ . '/img/GrandPrix_Main.png';
$fpRegattaHeadFs = __DIR__ . '/img/Regatta_Head.png';
$fpRegattaJibFs  = __DIR__ . '/img/Regatta_Jib.png';

$fpGrandPrixMainFs = __DIR__ . '/../../cruising_navigator/5_cloth_and_construction/img/sail_1.png';
$fpGrandPrixHeadFs = __DIR__ . '/../../cruising_navigator/5_cloth_and_construction/img/sail_2.png';
$fpGrandPrixJibFs  = __DIR__ . '/../../cruising_navigator/5_cloth_and_construction/img/sail_2.png';

/* Public paths */
$nsCssPublic = '5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = '5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();

$fpRegattaMainV = is_file($fpRegattaMainFs) ? filemtime($fpRegattaMainFs) : time();
$fpRegattaHeadV = is_file($fpRegattaHeadFs) ? filemtime($fpRegattaHeadFs) : time();
$fpRegattaJibV  = is_file($fpRegattaJibFs)  ? filemtime($fpRegattaJibFs)  : time();

$fpGrandPrixMainV = is_file($fpGrandPrixMainFs) ? filemtime($fpGrandPrixMainFs) : time();
$fpGrandPrixHeadV = is_file($fpGrandPrixHeadFs) ? filemtime($fpGrandPrixHeadFs) : time();
$fpGrandPrixJibV  = is_file($fpGrandPrixJibFs)  ? filemtime($fpGrandPrixJibFs)  : time();
?>

<link rel="stylesheet" href="<?= $nsCssPublic ?>?v=<?= $nsCssV ?>">

<section class="nav-specsheet" data-sr-reveal aria-label="Downwind cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <!-- =========================
       1) FIBERPATH (3 images)
  ========================== -->
  <div class="nav-specsheet__wrap sr-item">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator" aria-label="FiberPath image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../racing_fiberpath_series/5_cloth_and_construction/img/GrandPrix_Main.png?v=<?= $fpRegattaMainV ?>"
                 alt="FiberPath sail view 1"
                 data-sub="THE FIBERPATH REGATTA SERIES — MAINSAIL">

            <img class="nav-rotator__img"
                 src="../racing_fiberpath_series/5_cloth_and_construction/img/Regatta_Head.png?v=<?= $fpRegattaHeadV ?>"
                 alt="FiberPath sail view 2"
                 data-sub="THE FIBERPATH REGATTA SERIES — HEADSAIL">

            <img class="nav-rotator__img"
                 src="../racing_fiberpath_series/5_cloth_and_construction/img/Regatta_Jib.png?v=<?= $fpRegattaJibV ?>"
                 alt="FiberPath sail view 3"
                 data-sub="THE FIBERPATH REGATTA SERIES — JIB">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">FIBERPATH</span>
            <span class="nav-rotator__capSub">FIBERPATH — CUSTOM STRING LAMINATE</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__group" aria-label="Cloth Selection and Construction">
            <div class="nav-specsheet__groupTitle">FIBERPATH</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">CUSTOM STRING LAMINATE</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Standard Components</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">STAINLESS STEEL RINGS WITH SPECTRA/DYNEEMA WEBBING REINFORCEMENT</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">HIGH-PERFORMANCE DURABLE THREAD</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"> SLIDES</div>
              <div class="nav-specsheet__val">ADDITIONAL REINFORCEMENTS AT SLIDE ENTRY POINTS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">LEECH OR LUFF LOADING VELCRO PUSH-IN, ROCKET TENSIONER, OR OTHER ADJUSTABLE OUTBOARD END STYLES WITH BATTENS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">RADIAL PATCHES</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION ADHESIVE</div>
              <div class="nav-specsheet__val">ULTRABOND HOJOS ON LAMINATE, ARAMID &amp; PEN SAILS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">SAIL NUMBERS</div>
              <div class="nav-specsheet__val">STANDARD STYLE &amp; COLOURS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">DRAFT STRIPES</div>
              <div class="nav-specsheet__val">RACE-STYLE MID MARKS APPLIED AT 50% OF FOOT &amp; 50% OF EACH DRAFT STRIP</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">TELLTALES</div>
              <div class="nav-specsheet__val">TELLTALES ON LEECH &amp; BODY</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- =========================
       2) FIBERPATH (2 images)
  ========================== -->
  <div class="nav-specsheet__wrap sr-item">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator" aria-label="FiberPath image rotator 2" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../racing_fiberpath_series/5_cloth_and_construction/img/GrandPrix_Main.png?v=<?= $fpGrandPrixMainV ?>"
                 alt="FiberPath sail view A"
                 data-sub="THE FIBERPATH GRAND PRIX SERIES — MAINSAIL">

            <img class="nav-rotator__img"
                 src="../racing_fiberpath_series/5_cloth_and_construction/img/Regatta_Head.png?v=<?= $fpGrandPrixHeadV ?>"
                 alt="FiberPath sail view B"
                 data-sub="THE FIBERPATH GRAND PRIX SERIES — HEADSAIL">

            <img class="nav-rotator__img"
                 src="../racing_fiberpath_series/5_cloth_and_construction/img/Regatta_Jib.png?v=<?= $fpGrandPrixJibV ?>"
                 alt="FiberPath sail view C"
                 data-sub="THE FIBERPATH GRAND PRIX SERIES — JIB">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">FIBERPATH</span>
            <span class="nav-rotator__capSub">FIBERPATH — CUSTOM STRING LAMINATE</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__group" aria-label="Cloth Selection and Construction">
            <div class="nav-specsheet__groupTitle">FIBERPATH</div>
            <div class="nav-specsheet__groupItems">
              <div class="nav-specsheet__item">CUSTOM STRING LAMINATE</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Standard Components</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">STAINLESS STEEL RINGS WITH SPECTRA/DYNEEMA WEBBING REINFORCEMENT</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">HIGH-PERFORMANCE DURABLE THREAD</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">ADDITIONAL REINFORCEMENTS AT SLIDE ENTRY POINTS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">LEECH OR LUFF LOADING VELCRO PUSH-IN, ROCKET TENSIONER, OR OTHER ADJUSTABLE OUTBOARD END STYLES WITH BATTENS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">RADIAL PATCHES</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION ADHESIVE</div>
              <div class="nav-specsheet__val">ULTRABOND HOJOS ON LAMINATE, ARAMID &amp; PEN SAILS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">SAIL NUMBERS</div>
              <div class="nav-specsheet__val">STANDARD STYLE &amp; COLOURS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">DRAFT STRIPES</div>
              <div class="nav-specsheet__val">RACE-STYLE MID MARKS APPLIED AT 50% OF FOOT &amp; 50% OF EACH DRAFT STRIP</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">TELLTALES</div>
              <div class="nav-specsheet__val">TELLTALES ON LEECH &amp; BODY</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>
