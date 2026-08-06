<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/cloth_and_construction.js';

/* Absolute public paths: WordPress permalinks are not filesystem directories. */
$nsBasePublic = rtrim(get_template_directory_uri(), '/') . '/pages/cruising_downwind/5_cloth_and_construction';
$nsCssPublic  = $nsBasePublic . '/cloth_and_construction.css';
$nsJsPublic   = $nsBasePublic . '/cloth_and_construction.js';

/* Keep this section self-contained so it does not depend on another series. */
$nsAssetUrl = static function (string $relativePath) use ($nsBasePublic): string {
  $relativePath = ltrim($relativePath, '/');
  $assetFs = __DIR__ . '/' . $relativePath;
  $version = is_file($assetFs) ? (int) filemtime($assetFs) : time();

  return $nsBasePublic . '/' . $relativePath . '?v=' . $version;
};

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
                 src="<?= esc_url($nsAssetUrl('img/RL_CODE_50.2048_0_1.png')) ?>"
                 alt="Axia Blue Line Code 50 sail view"
                 data-sub="AXIA CODE 50 50-60% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= esc_url($nsAssetUrl('img/RL_CODE_60.2048_0_1.png')) ?>"
                 alt="Axia Blue Line Code 60 sail view"
                 data-sub="AXIA CODE 60 60-70% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= esc_url($nsAssetUrl('img/RL_CODE_75.2048_0_1.png')) ?>"
                 alt="Axia Blue Line Code 70 sail view"
                 data-sub="AXIA CODE 70 70-80% MID-GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CODE SAILS</span>
            <span class="nav-rotator__capSub">AXIA CODE 50 50-60% MID-GIRTH</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
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
              <div class="nav-specsheet__val">NYLON SPINNAKER CLOTH</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Construction</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">MODEL-SPECIFIC ACTIVE LUFF™ OR CABLE-BASED SOLUTION</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOMIZED SHAPE AND SIZE</div></div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">FURLING SYSTEM SELECTED FOR THE MODEL</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM GRAPHICS WHERE AVAILABLE</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">FINAL DETAILS CONFIRMED BY THE LOFT</div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Symmetrical and asymmetrical spinnakers image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="<?= esc_url($nsAssetUrl('img/RL_AXIA_SYMM.2048_0_1.png')) ?>"
                 alt="Axia Blue Line symmetrical spinnaker"
                 data-sub="AXIA SYMM SYMMETRICAL DOWNWIND">

            <img class="nav-rotator__img"
                 src="<?= esc_url($nsAssetUrl('img/RL_AXIA_ASYMM.2048_0_1.png')) ?>"
                 alt="Axia Blue Line asymmetrical spinnaker"
                 data-sub="AXIA ASYMMETRICAL 80-97% MID-GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">SYMMETRICAL &amp; ASYMMETRICAL</span>
            <span class="nav-rotator__capSub">AXIA SYMM SYMMETRICAL DOWNWIND</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text sr-item">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">SYMMETRICAL &amp; ASYMMETRICAL</div>
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
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">SYMMETRICAL: CUSTOM FOR BOATS WITH A SPINNAKER POLE</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">ASYMMETRICAL: 80-97% MID-GIRTH</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOMIZED SHAPE AND SIZE</div></div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">SOCK OR FURLING OPTION SELECTED FOR THE MODEL</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM GRAPHICS WHERE AVAILABLE</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">WIND LIMIT SET BY BOAT, MODEL AND CLOTH</div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<script defer src="<?= htmlspecialchars($nsJsPublic, ENT_QUOTES) ?>?v=<?= (int)$nsJsV ?>"></script>
