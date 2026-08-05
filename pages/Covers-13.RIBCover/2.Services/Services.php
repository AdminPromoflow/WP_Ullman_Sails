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

        <h1 id="services-title" class="services__title sr-item">RIB Cover</h1>

        <p class="services__lead sr-item">
          A RIB cover can be made for the console and seating or for the complete boat,
          reducing direct exposure to UV, rain and dirt during storage. Fit, support,
          drainage and ventilation depend on where and how the RIB is stored. A cover used
          while towing must be specifically designed and secured for transport.<br><br>
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--rib-cover sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
