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

        <h1 id="services-title" class="services__title sr-item">Winch Covers</h1>

        <p class="services__lead sr-item">
          Winch covers reduce direct exposure to sun, salt spray and dirt while the winches
          are not being operated. They can be made in marine canvas or another suitable
          material, with an elastic edge or fastening shaped for the individual winch.
        </p>

        <p class="services__lead sr-item">
          Covers must be removed before sailing or using the winches. They can help keep
          external surfaces cleaner, but they do not make a winch waterproof and do not
          replace the inspection, cleaning, lubrication and servicing specified by the
          winch manufacturer.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--winchcovers sr-item" aria-hidden="true"></div>

    </div>

  </div>
</section>
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
