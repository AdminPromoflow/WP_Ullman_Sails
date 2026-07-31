
<?php
$cssFile = __DIR__ . '/../SailCare/8.tips/tips.css';
$jsFile  = __DIR__ . '/../SailCare/8.tips/tips.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../SailCare/8.tips/tips.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<section class="tips" aria-labelledby="tips-title">
  <div class="tips__shell">

    <!-- Left / Intro -->
    <header class="tips__intro">
      <p class="tips__kicker">tips</p> <br>

      <h1 id="tips-title" class="tips__title">
        Sail Care FAQ <br><br>
      </h1>

      <p class="tips__lead">
        As a sailor, you understand the importance of keeping your sails in top
        condition. A key aspect of sail maintenance is protecting them from the
        damaging effects of UV radiation. Sunlight can rapidly degrade sailcloth,
        weakening, fading, and eventual failure.
      </p>
    </header>

    <!-- Right / Accordion -->
    <div class="tips__panel">
      <div class="acc" data-acc>
        <div class="acc__item">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="false" aria-controls="acc-uv" id="acc-uv-btn">
              <span class="acc__label">How often should sails be inspected?</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="acc-uv" role="region" aria-labelledby="acc-uv-btn" hidden>
            <div class="acc__inner">
              <p>Regularly, especially after heavy use or exposure to harsh conditions.</p>
            </div>
          </div>
        </div>

        <div class="acc__item">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="false" aria-controls="acc-mildew" id="acc-mildew-btn">
              <span class="acc__label">Can I use household cleaning agents on my sails?</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="acc-mildew" role="region" aria-labelledby="acc-mildew-btn" hidden>
            <div class="acc__inner">
              <p>It’s best to consult a professional before using any cleaning agents.</p>

            </div>
          </div>
        </div>

        <div class="acc__item is-open">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="true" aria-controls="acc-replace" id="acc-replace-btn">
              <span class="acc__label">What’s the best way to store sails?</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="acc-replace" role="region" aria-labelledby="acc-replace-btn">
            <div class="acc__inner ">
              <p>Store sails dry, rolled, and away from direct sunlight to prevent UV damage and mildew growth.</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<script defer src="../SailCare/8.tips/tips.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
