<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.js';

/* Current public directory of the main page */
$currentDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
if ($currentDir === '') {
  $currentDir = '/';
}

/* Public paths resolved from the main page URL */
$nsCssPublic = $currentDir . '/5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = $currentDir . '/5_cloth_and_construction/cloth_and_construction.js';

/* Sibling section paths */
$racingBase = $currentDir . '/../racing_red_line_series/5_cloth_and_construction';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();
?>

<link rel="stylesheet" href="<?= htmlspecialchars($nsCssPublic, ENT_QUOTES) ?>?v=<?= (int)$nsCssV ?>">

<section class="nav-specsheet" data-sr-reveal aria-label="Downwind cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Code sails image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="<?= htmlspecialchars($racingBase . '/img/Red_Line-Axia_JT_3.2048_0_1.png', ENT_QUOTES) ?>"
                 alt="Axia Code 50 sail view"
                 data-sub="AXIA JT REACHING HEADSAIL">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars($racingBase . '/img/RL_CODE_50.2048_0_1.png', ENT_QUOTES) ?>"
                 alt="Axia Code 60 sail view"
                 data-sub="AXIA CODE 50 50-60% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars($racingBase . '/img/RL_CODE_60.2048_0_1.png', ENT_QUOTES) ?>"
                 alt="Axia Code 70 sail view"
                 data-sub="AXIA CODE 60 60-70% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars($racingBase . '/img/RL_CODE_75.2048_0_1.png', ENT_QUOTES) ?>"
                 alt="Axia Code 75 sail view"
                 data-sub="AXIA CODE 75 75% MID GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CODE SAILS</span>
            <span class="nav-rotator__capSub">AXIA JT REACHING HEADSAIL</span>

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
              <div class="nav-specsheet__val">NYLON &amp; POLYESTER SPINNAKER CLOTH</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Construction</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">RADIAL</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CABLED LUFF</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">ACTIVE LUFF</div></div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">V TRIM STRIPES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM DRAFT STRIPES AND NUMBERS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TOP-DOWN FURLING SETUP</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TORSIONAL LUFF CABLES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">FURLING CLEW VELCRO TABS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">SOFT CLEW</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM GRAPHICS</div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Classic spinnakers image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="<?= htmlspecialchars($racingBase . '/img2/RL_AXIA_SYMM.2048_0_1.png', ENT_QUOTES) ?>"
                 alt="Axia Symm sail view"
                 data-sub="AXIA SYMM SYMMETRICAL DOWNWIND">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars($racingBase . '/img2/RL_AXIA_ASYMM.2048_0_1.png', ENT_QUOTES) ?>"
                 alt="Axia Asymm sail view"
                 data-sub="AXIA ASSYM 80%+ MID-GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CLASSIC SPINNAKERS</span>
            <span class="nav-rotator__capSub">AXIA SYMM SYMMETRICAL DOWNWIND</span>

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
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">RADIAL</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CABLED LUFF</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">ACTIVE LUFF</div></div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">V TRIM STRIPES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM DRAFT STRIPES AND NUMBERS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TOP-DOWN FURLING SETUP</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TORSIONAL LUFF CABLES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">FURLING CLEW VELCRO TABS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">SOFT CLEW</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM GRAPHICS</div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<script defer src="<?= htmlspecialchars($nsJsPublic, ENT_QUOTES) ?>?v=<?= (int)$nsJsV ?>"></script>
