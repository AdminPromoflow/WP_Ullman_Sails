
<?php
$cssFile = __DIR__ . '/FAQS.css';
$jsFile  = __DIR__ . '/FAQS.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="8.FAQS/FAQS.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<section class="faq" id="sailcare-faq" aria-labelledby="sailcare-faq-title">
  <div class="faq__shell">

    <!-- Left / Intro -->
    <header class="faq__intro">
      <p class="faq__kicker">COMMON QUESTIONS</p>

      <h2 id="sailcare-faq-title" class="faq__title">Sail Care FAQ</h2>

      <p class="faq__lead">
        Quick answers about inspections, cleaning and storage. For advice specific
        to your sails, contact your local Ullman Sails loft.
      </p>
    </header>

    <!-- Right / Accordion -->
    <div class="faq__panel">
      <div class="acc" data-acc>
        <div class="acc__item">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq-inspection" id="faq-inspection-btn">
              <span class="acc__label">How often should sails be inspected?</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="faq-inspection" role="region" aria-labelledby="faq-inspection-btn" hidden>
            <div class="acc__inner">
              <p>Regularly, especially after heavy use or exposure to harsh conditions.</p>
            </div>
          </div>
        </div>

        <div class="acc__item">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq-cleaning" id="faq-cleaning-btn">
              <span class="acc__label">Can I use household cleaning agents on my sails?</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="faq-cleaning" role="region" aria-labelledby="faq-cleaning-btn" hidden>
            <div class="acc__inner">
              <p>It’s best to consult a professional before using any cleaning agents.</p>

            </div>
          </div>
        </div>

        <div class="acc__item is-open">
          <h3 class="acc__h">
            <button class="acc__btn" type="button" aria-expanded="true" aria-controls="faq-storage" id="faq-storage-btn">
              <span class="acc__label">What’s the best way to store sails?</span>
              <span class="acc__icon" aria-hidden="true"></span>
            </button>
          </h3>

          <div class="acc__content" id="faq-storage" role="region" aria-labelledby="faq-storage-btn">
            <div class="acc__inner ">
              <p>Store sails dry, rolled, and away from direct sunlight to prevent UV damage and mildew growth.</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<script defer src="8.FAQS/FAQS.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
