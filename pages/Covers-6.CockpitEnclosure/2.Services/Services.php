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


        <h1 id="services-title" class="services__title sr-item">Cockpit Enclosure</h1>

        <p class="services__lead sr-item">
          A cockpit enclosure adds removable shelter around the cockpit and can make the
          space more usable in rain, spray and wind. It can connect to a sprayhood and use
          clear windows plus roll-up or removable panels for access and ventilation. The
          enclosure can be patterned to existing bars or developed with a new frame; it is
          weather-resistant shelter, not a guarantee of a watertight or heated space.<br><br>
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--cockpit-enclosure sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
