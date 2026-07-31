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

        <h1 id="services-title" class="services__title sr-item">RIB Cover</h1>

        <p class="services__lead sr-item">
          Need a cover for your RIB? Whether it’s to protect the console and seating or
          the whole boat, we can make sure it fits properly and does exactly what you
          need it to. Just give us a call — we’re happy to talk through the options and
          help you get it right. <br><br>
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div> -->
      </div>

      <div class="services__media services__media--rib-cover sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
