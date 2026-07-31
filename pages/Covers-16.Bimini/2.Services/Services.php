<?php
$cssFile = __DIR__ . '/../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">
    <div class="services__layout">

      <div class="services__copy">

        <h1 id="services-title" class="services__title sr-item">Bimini Sunshade</h1>

        <p class="services__lead sr-item">
          A bimini provides welcome shade on hot summer days—an acrylic canvas "roof" for your cockpit that offers protection from the sun without blocking the breeze.
          Add a clear viewing panel above the helm if you want to keep an eye on the sail and choose from a wide range of colours to suit your boat’s look.
          All our biminis are built with UV-stable materials and thread for lasting performance. Questions? Just ask—we’re here to help.
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div> -->
      </div>

      <div class="services__media services__media--bimini sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
