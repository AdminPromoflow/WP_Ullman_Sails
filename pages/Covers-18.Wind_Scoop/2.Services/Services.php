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

        <h1 id="services-title" class="services__title sr-item">Wind Scoop</h1>

        <p class="services__lead sr-item">
          A wind scoop directs available breeze through an open foredeck hatch to increase
          passive airflow below deck. It can be made from lightweight sailcloth and rigged
          from a halyard or supporting line. Performance depends on wind speed and direction,
          the scoop’s orientation and the hatch arrangement; it does not create airflow in still air.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--windscoop sr-item" aria-hidden="true"></div>

    </div>

  </div>
</section>
