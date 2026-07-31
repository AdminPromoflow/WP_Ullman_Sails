<?php
$cssFile = __DIR__ . '/SailCare/2.Services/Services.css';
$jsFile  = __DIR__ . '/SailCare/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../SailCare/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="../SailCare/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="sailcare" aria-labelledby="sailcare-title">
  <div class="sailcare__inner">

    <!-- TOP: image + text -->
    <div class="sailcare__row sailcare__row--top">
      <figure class="sailcare__media">
        <img
          src="../SailCare/2.Services/Image/sail2.jpg"
          alt="Sail care sail detail"
          loading="lazy"
          decoding="async"
        >
      </figure>

      <div class="sailcare__copy">
        <p class="sailcare__kicker"> SAIL CARE</p>
        <h1 id="sailcare-title" class="sailcare__title">Best Practices</h1>

        <p class="sailcare__p">
          Proper sail care protects your sails from harsh elements like sun, salt water, and high humidity. Although regular use exposes sails to these conditions, adopting good practices can significantly minimize damage and extend the lifespan of your sails. Essential practices include avoiding luffing, flapping, flogging, leech flutter, and crushing sails into bags, which can shorten their lifespan.
        </p>


      </div>
    </div>

    <!-- BOTTOM: text + image -->
    <div class="sailcare__row sailcare__row--bottom">
      <div class="sailcare__copy">
        <p class="sailcare__p">
          Ullman Sails offers a comprehensive list of best practices for maintaining the quality of your sails. While these guidelines can help reduce the need for major repairs, regular maintenance and service check-ups at your local loft should be prioritised. This approach is similar to the maintenance required for any long-term equipment.
        </p>
        <p class="sailcare__p">
          For help with service monitoring and scheduling, contact your nearest Ullman Sails loft.
        </p>
      </div>

      <figure class="sailcare__media">
        <img
          src="../SailCare/2.Services/Image/sail1.jpg"
          alt="Sail care sail folded and stored"
          loading="lazy"
          decoding="async"
        >
      </figure>
    </div>

  </div>
</section>
