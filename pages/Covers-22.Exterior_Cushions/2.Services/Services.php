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
        <a class="services__back sr-item" href="<?php echo esc_url(ullman_page_url('Covers')); ?>" aria-label="Back to Boat Covers">← Boat Covers</a>

        <h1 id="services-title" class="services__title sr-item">Exterior Cushions</h1>

        <p class="services__lead sr-item">
          Custom exterior cushions add padding and comfort to cockpit or deck seating.
          Foam, drainage and cover fabric can be selected for the exposure, storage and
          appearance required, including coordination with other canvas. Resistance to UV,
          water and mildew depends on the specified materials, construction and ongoing care.<br><br>
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--exteriorcushions sr-item" aria-hidden="true"></div>
    </div>
  </div>
</section>
