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
        <h1 id="services-title" class="services__title sr-item">Wheel Leathering</h1>

        <p class="services__lead sr-item">
          A leather-wrapped wheel offers both comfort and control—providing a warmer,
          more reliable grip than bare metal. Made from marine-grade leather, it’s a
          subtle upgrade that adds a touch of style while enhancing your helm feel.
          Each piece is tailored by hand for a precise fit.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--wheelleathering sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
