<?php
$cssFile = __DIR__ . '/../../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">
    <div class="services__layout">

      <div class="services__copy">

        <h1 id="services-title" class="services__title sr-item">Wheel and Binnacle Cover</h1>

        <p class="services__lead sr-item">
          A wheel and binnacle cover reduces direct exposure to UV, rain, salt spray and
          dirt while the helm is not in use. It is tailored around the wheel, binnacle and
          instrument arrangement, but does not replace the equipment manufacturers’ care,
          inspection or storage guidance.<br><br>
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--wheelbinnacle sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>

<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
