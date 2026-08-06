<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/cloth_and_construction.js';

/* Public paths */
$nsCssPublic = '5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = '5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $nsCssPublic ?>?v=<?= $nsCssV ?>">

<section class="nav-specsheet" data-sr-reveal aria-label="Downwind cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <!-- =========================
       1) CODE SAILS (3 images)
  ========================== -->
  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Code sails image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../racing_red_line_series/5_cloth_and_construction/img/Red_Line-Axia_JT_3.2048_0_1.png"
                 alt="Axia JT reaching headsail view"
                 data-sub="AXIA JT REACHING HEADSAIL">

            <img class="nav-rotator__img"
                 src="../racing_red_line_series/5_cloth_and_construction/img/RL_CODE_50.2048_0_1.png"
                 alt="Axia Code 50 sail view"
                 data-sub="AXIA CODE 50 51-60% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="../racing_red_line_series/5_cloth_and_construction/img/RL_CODE_60.2048_0_1.png"
                 alt="Axia Code 60 sail view"
                 data-sub="AXIA CODE 60 60-70% MID-GIRTH">

           <img class="nav-rotator__img"
                src="../racing_red_line_series/5_cloth_and_construction/img/RL_CODE_75.2048_0_1.png"
                alt="Axia Code 75 sail view"
                data-sub="AXIA CODE 75 MORE THAN 75% MID-GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CODE SAILS</span>
            <span class="nav-rotator__capSub">AXIA JT — HIGH-CLEWED REACHING HEADSAIL</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text sr-item">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">CODE SAILS</div>
            <div class="nav-specsheet__metaSub">CLOTH SELECTION</div>
          </div>

          <h3 class="nav-specsheet__subtitle">Cloth Selection</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">CODE ZERO LAMINATE</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">NYLON SPINNAKER CLOTH WHERE APPROPRIATE</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Construction</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">PANEL LAYOUT SPECIFIED FOR THE MODEL AND CLOTH</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">LUFF STRUCTURE SPECIFIED FOR THE SAIL AND RIG</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">FURLING SYSTEM CONFIRMED AS A COMPATIBLE PACKAGE WHERE USED</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">TRIM STRIPES AND NUMBERS WHERE SPECIFIED</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">MID-GIRTH AND RATING DETAILS CONFIRMED BEFORE BUILD</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">FURLING OR RETRIEVAL ARRANGEMENT MATCHED TO THE SAIL</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">CABLE AND HARDWARE SPECIFIED WHERE REQUIRED</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">CLEW AND ATTACHMENT DETAILS SET BY THE FINAL DESIGN</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">BOAT-SPECIFIC WIND GUIDANCE PROVIDED BY THE LOFT</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">COLOURS AND GRAPHICS SUBJECT TO CLOTH AND RULES</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- =========================
       2) CLASSIC SPINNAKERS (2 images)
  ========================== -->
  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Classic spinnakers image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../racing_red_line_series/5_cloth_and_construction/img2/RL_AXIA_SYMM.2048_0_1.png"
                 alt="Axia symmetrical spinnaker view"
                 data-sub="AXIA SYMM SYMMETRICAL DOWNWIND">

            <img class="nav-rotator__img"
                 src="../racing_red_line_series/5_cloth_and_construction/img2/RL_AXIA_ASYMM.2048_0_1.png"
                 alt="Axia asymmetrical spinnaker view"
                 data-sub="AXIA ASYMM 80-97% MID-GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CLASSIC SPINNAKERS</span>
            <span class="nav-rotator__capSub">AXIA SYMM — SYMMETRICAL DOWNWIND</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text sr-item">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">CLASSIC SPINNAKERS</div>
            <div class="nav-specsheet__metaSub">CLOTH SELECTION</div>
          </div>

          <h3 class="nav-specsheet__subtitle">Cloth Selection</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">NYLON SPINNAKER CLOTH</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Construction</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">CUSTOM PANEL LAYOUT FOR THE BOAT AND SAIL</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">SYMMETRICAL OR ASYMMETRICAL GEOMETRY AS SELECTED</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">POLE, TACK AND SHEETING ARRANGEMENT CONFIRMED WITH THE LOFT</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">TRIM STRIPES AND NUMBERS WHERE SPECIFIED</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">MID-GIRTH AND RATING DETAILS CONFIRMED BEFORE BUILD</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">LAUNCH, DOUSE OR RETRIEVAL ARRANGEMENT MATCHED TO THE BOAT</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">ATTACHMENT HARDWARE SET BY THE FINAL DESIGN</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">REINFORCEMENT SPECIFIED FOR EXPECTED LOADS AND HANDLING</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">BOAT-SPECIFIC WIND GUIDANCE PROVIDED BY THE LOFT</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key"></div>
              <div class="nav-specsheet__val">COLOURS AND GRAPHICS SUBJECT TO CLOTH AND RULES</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>
