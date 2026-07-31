<?php
$cssFile = __DIR__ . '/../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">


<section class="services services--single" aria-labelledby="services-title">
  <div class="services__inner">

    <div class="services__layout">
      <div class="services__copy">
        <h1 id="services-title" class="services__title sr-item">Stack Pack</h1>

        <p class="services__lead sr-item">
          A stack pack works with your lazyjacks to make lowering and stowing your mainsail simple, guiding it
          straight into the bag. Once zipped closed, it keeps the sail protected and tidy, so you can enjoy a
          clutter-free cockpit. Made to fit your rig and rigging — just get in touch to start the conversation.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <!-- Optional image panel -->
      <div class="services__media services__media--stackpack sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>

<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
