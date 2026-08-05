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

        <h1 id="services-title" class="services__title sr-item">Dodgers</h1>

        <p class="services__lead sr-item">
          Side dodgers fitted to guardrails and stanchions can reduce wind and spray around
          the cockpit. They can be made in acrylic marine canvas and personalised with a boat
          name or sail number. Shape, height and fastening positions should preserve the required
          visibility, access and operation of lines and deck equipment.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--dodgers sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
