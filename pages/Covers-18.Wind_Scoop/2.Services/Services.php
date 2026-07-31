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

        <h1 id="services-title" class="services__title sr-item">Wind Scoop</h1>

        <p class="services__lead sr-item">
          A wind scoop channels breeze down through your foredeck hatch, bringing fresh air into the cabin—even on still, stuffy days.
          Made from lightweight spinnaker cloth, it’s simple to set up and surprisingly effective, whether you're in a UK marina or anchored
          somewhere warmer. A small bit of kit that makes a big difference to life onboard.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--windscoop sr-item" aria-hidden="true"></div>

    </div>

  </div>
</section>
