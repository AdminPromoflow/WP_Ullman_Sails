
<?php
$cssFile = __DIR__ . '/../SailCare/6.tips/tips.css';
$jsFile  = __DIR__ . '/../SailCare/6.tips/tips.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../SailCare/6.tips/tips.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<section class="tips" aria-labelledby="tips-title">
  <div class="tips__shell">

    <!-- Left / Intro -->
    <header class="tips__intro">
      <p class="tips__kicker">TIPS</p> <br>

      <h1 id="tips-title" class="tips__title">
        Extend Sail Life: Tips to Guard Against UV Damage and Mildew <br><br>
      </h1>

      <p class="tips__lead">
        As a sailor, you understand the importance of keeping your sails in top condition. A key aspect of sail maintenance
        is protecting them from the damaging effects of UV radiation. Sunlight can rapidly degrade sailcloth, weakening,
        fading, and eventual failure.
      </p>
    </header>

    <!-- Right / Accordion -->
    <div class="tips__panel">
      <div class="acc" data-acc>
        <div class="acc__item">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="false" aria-controls="acc-uv" id="acc-uv-btn">
              <span class="acc__label">Preventing and Managing UV Damage</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="acc-uv" role="region" aria-labelledby="acc-uv-btn" hidden>
            <div class="acc__inner">
              <p>UV rays significantly threaten sails, causing structural damage and color fading. To prevent UV damage:</p> <br>
              <p>1. Keep sails out of the sun when not in use.</p>
              <p>2. Regularly inspect and repair sun covers.</p>
              <p>3. Store sails in their bags when not used and promptly replace damaged bags.</p>
              <p>4. Ensure furling sails are properly rolled behind the UV strip.</p><br>
              <p>If UV damage occurs, repair it immediately to prevent further deterioration. Regular inspection and maintenance are crucial to extending the life of your sails.</p>
            </div>
          </div>
        </div>

        <div class="acc__item">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="false" aria-controls="acc-mildew" id="acc-mildew-btn">
              <span class="acc__label">Preventing and Managing Mildew</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="acc-mildew" role="region" aria-labelledby="acc-mildew-btn" hidden>
            <div class="acc__inner">
              <p>Always dry sails before stowing, avoid sealing damp sails in bags, and improve airflow in storage.
                If mildew appears, clean early using sail-safe products and gentle techniques.</p> <br>
              <p>Mildew is another essential element to watch out for. It thrives in damp conditions, particularly in hot and humid environments. To prevent mildew:</p>
              <p>1. Rinse sails exposed to salt water with fresh water and allow them to dry thoroughly.</p>
              <p>2. Air out sails frequently, especially after rain.</p>
              <p>3. Avoid packing away damp or saltwater-soaked sails; store them in a dry place.</p><br>
              <p>If mildew is detected, clean it with diluted bleach and rinse thoroughly. For severe cases, industrial cleaning may be necessary. Regular inspection and proper storage can prevent mildew and extend the life of your sails.</p>

            </div>
          </div>
        </div>

        <div class="acc__item is-open">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="true" aria-controls="acc-replace" id="acc-replace-btn">
              <span class="acc__label">When to Replace Sails</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="acc-replace" role="region" aria-labelledby="acc-replace-btn">
            <div class="acc__inner ">
              <p>
                Sails deteriorate over time due to both use and abuse. Proper care can prolong their lifespan, but signs such as excessive helm, tears, weak stitching, and delamination indicate it’s time for replacement. We are happy to regularly assess your sails and help determine when a replacement is needed.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<script defer src="../SailCare/6.tips/tips.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
