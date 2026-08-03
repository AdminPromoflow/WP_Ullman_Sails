
<?php
$cssFile = __DIR__ . '/../../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">

    <div class="services__layout">
      <div class="services__copy">

        <h1 id="services-title" class="services__title sr-item">
          Canvas Repair Expertise for Uninterrupted Seafaring
        </h1>

        <p class="services__lead sr-item">
          Discover the highest level of canvas repair at Ullman Sails, where we excel in restoring your nautical equipment to its best condition.
          Our dedicated team of canvas specialists takes pride in meticulously repairing tears, reinforcing seams, and rejuvenating weathered fabrics.
        </p>

        <p class="services__lead sr-item">
          Whether it's boat covers, sail bags, or awnings, we understand the importance of durable and functional canvas equipment for your maritime activities.
          With an unwavering commitment to quality and expert craft, we ensure your gear is ready to withstand the elements and accompany you on many more journeys.
          Choose Ullman Sails for canvas repair that ensures your equipment remains dependable and resilient for all your seafaring adventures.
        </p>

        <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div>
      </div>

      <div class="services__media services__media--repair sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
