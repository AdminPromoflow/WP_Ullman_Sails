<!-- CLOTH SELECTION AND PERFORMANCE -->
<?php
$cssFile    = __DIR__ . '/cloth_selection_and_performance/cloth_selection_and_performance.css';
$jsFile     = __DIR__ . '/cloth_selection_and_performance/cloth_selection_and_performance.js';

$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;

$imgFile1    = __DIR__ . '/../Cruising-1.Navigator/2.Services/Image/Nav_Main.2048_0_1.png';
$imgVersion1 = is_file($imgFile1) ? filemtime($imgFile1) : null;

$imgFile2    = __DIR__ . '/../Cruising-1.Navigator/2.Services/Image/Nav_Head.2048_0_1.png';
$imgVersion2 = is_file($imgFile2) ? filemtime($imgFile2) : null;

$imgFile3    = __DIR__ . '/../Cruising-1.Navigator/2.Services/Image/Nav_Jib.2048_0_1.png';
$imgVersion3 = is_file($imgFile3) ? filemtime($imgFile3) : null;
?>

<link rel="stylesheet"
      href="cloth_selection_and_performance/cloth_selection_and_performance.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">


      <section class="nav-specsheet" aria-label="Navigator cloth and components">
        <div class="nav-specsheet__wrap">
          <div class="nav-specsheet__panel">

            <div class="nav-specsheet__grid">
              <!-- ===== Imagen (rota cada 3s) ===== -->
              <figure class="nav-rotator" aria-label="Navigator sail image rotator" data-interval="3000">
                <div class="nav-rotator__frame">
                  <img class="nav-rotator__img is-active"
                       src="../Cruising-1.Navigator/2.Services/Image/Nav_Main.2048_0_1.png<?= $imgVersion1 ? '?v='.$imgVersion1 : '' ?>"
                       alt="Navigator Series sail view 1"
                       data-sub="MAINSAIL">

                  <img class="nav-rotator__img"
                       src="../Cruising-1.Navigator/2.Services/Image/Nav_Head.2048_0_1.png<?= $imgVersion2 ? '?v='.$imgVersion2 : '' ?>"
                       alt="Navigator Series sail view 2"
                       data-sub="HEADSAIL">

                  <img class="nav-rotator__img"
                       src="../Cruising-1.Navigator/2.Services/Image/Nav_Jib.2048_0_1.png<?= $imgVersion3 ? '?v='.$imgVersion3 : '' ?>"
                       alt="Navigator Series sail view 3"
                       data-sub="JIB">
                </div>

                <figcaption class="nav-rotator__caption">
                  <span class="nav-rotator__capTitle">THE NAVIGATOR SERIES</span>
                  <span class="nav-rotator__capSub">MAINSAIL</span>

                  <div class="nav-rotator__dots" aria-hidden="true">
                    <span class="nav-rotator__dot is-active"></span>
                    <span class="nav-rotator__dot"></span>
                    <span class="nav-rotator__dot"></span>
                  </div>
                </figcaption>
              </figure>


              <!-- ===== Texto fijo ===== -->
              <div class="nav-specsheet__text">
                <h2 class="nav-specsheet__title">Cloth Selection &amp; Construction</h2>

                <div class="nav-specsheet__meta">
                  <div class="nav-specsheet__metaTop">NAVIGATOR DACRON</div>
                  <div class="nav-specsheet__metaSub">CROSSCUT WOVEN POLYESTER</div>
                </div>

                <h3 class="nav-specsheet__subtitle">Standard Components</h3>

                <div class="nav-specsheet__list">
                  <div class="nav-specsheet__row">
                    <div class="nav-specsheet__key">STITCHING</div>
                    <div class="nav-specsheet__val">TRIPLE-STEP</div>
                  </div>

                  <div class="nav-specsheet__row">
                    <div class="nav-specsheet__key">RINGS</div>
                    <div class="nav-specsheet__val">STAINLESS STEEL</div>
                  </div>

                  <div class="nav-specsheet__row">
                    <div class="nav-specsheet__key">THREAD</div>
                    <div class="nav-specsheet__val">HIGH PERFORMANCE DURABLE THREAD</div>
                  </div>

                  <div class="nav-specsheet__row">
                    <div class="nav-specsheet__key">SLIDES</div>
                    <div class="nav-specsheet__val">HANKS OR SLIDES</div>
                  </div>

                  <div class="nav-specsheet__row">
                    <div class="nav-specsheet__key">BATTEN POCKETS</div>
                    <div class="nav-specsheet__val">REINFORCED POCKETS &amp; BATTENS</div>
                  </div>

                  <div class="nav-specsheet__row">
                    <div class="nav-specsheet__key">PATCHES</div>
                    <div class="nav-specsheet__val">BLOCK PATCHES</div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <script defer
              src="cloth_selection_and_performance/cloth_selection_and_performance.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>">
      </script>
