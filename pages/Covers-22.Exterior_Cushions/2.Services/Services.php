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
        <a class="services__back sr-item" href="<?php echo esc_url(ullman_page_url('Covers')); ?>" aria-label="Back to Boat Covers">← Boat Covers</a>

        <h1 id="services-title" class="services__title sr-item">Exterior Cushions</h1>

        <p class="services__lead sr-item">
          Add comfort to your cockpit with custom exterior cushions—made from matching
          acrylic canvas for a smart, coordinated look. Whether you're racing hard or
          cruising gently, a well-padded seat makes all the difference at the end of
          the day. Built to handle life outdoors, our cushions are practical, durable,
          and a welcome luxury. Let us know what you're after—we’re happy to help. <br><br>
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div> -->
      </div>

      <div class="services__media services__media--exteriorcushions sr-item" aria-hidden="true"></div>
    </div>
  </div>
</section>
