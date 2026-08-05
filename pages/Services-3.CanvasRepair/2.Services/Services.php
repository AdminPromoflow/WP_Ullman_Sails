
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
          Ullman Sails UK lists canvas among its services and has dedicated canvas personnel.
          A professional inspection can identify repairable tears, failed seams, worn fasteners,
          damaged zips or clear panels and areas weakened by exposure.
        </p>

        <p class="services__lead sr-item">
          Repair options depend on the fabric, thread, hardware, age and overall condition of the item.
          Work may include patching, re-stitching or replacement components where appropriate;
          severely degraded material may need partial or complete replacement rather than repair.
        </p>

        <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div>
      </div>

      <div class="services__media services__media--canvas-repair sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
