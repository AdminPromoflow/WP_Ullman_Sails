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

        <h1 id="services-title" class="services__title sr-item">Jib Sock</h1>

        <p class="services__lead sr-item">
          A jib sock offers simple, effective protection for your furled headsail—ideal
          if you prefer not to add the weight of a UV strip along the leech and foot.
          It shields your genoa from sun and weather, helping extend its life. Available
          in a range of colours and made to suit your rig—just get in touch to find the right fit.<br><br>
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact Us</a>
        </div> -->
      </div>

      <div class="services__media services__media--jibsock sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
