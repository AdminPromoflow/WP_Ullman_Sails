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

        <h1 id="services-title" class="services__title sr-item">Boom Cover</h1>

        <p class="services__lead sr-item">
          A boom cover protects your mainsail from damaging UV light while it’s furled
          on the boom—helping extend its life between sails. Made from UV-stable acrylic
          canvas in a wide range of colours, our covers include a collar to wrap neatly
          around the mast and secure clip fastenings beneath the boom. Simple, smart,
          and built to last.
        </p>

          <div class="services__actions sr-item">
            <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
          </div>
      </div>

      <div class="services__media services__media--boomcover sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
