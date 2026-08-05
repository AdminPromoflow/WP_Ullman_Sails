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

        <h1 id="services-title" class="services__title sr-item">Wheel Cover</h1>

        <p class="services__lead sr-item">
          A fitted wheel cover reduces direct exposure to UV, rain, salt spray and dirt while the
          helm is not in use. The cover can be shaped to the wheel and closed with a zip, drawcord
          or other fastening selected for the installation.
        </p>

        <p class="services__lead sr-item">
          Marine canvas can be chosen to coordinate with a sprayhood, bimini or other cockpit canvas.
          A cover supports routine care but does not replace inspection, cleaning or maintenance of
          the wheel and steering system, and it must be removed before operating the boat.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--wheelcover sr-item" aria-hidden="true"></div>
    </div>
  </div>
</section>
