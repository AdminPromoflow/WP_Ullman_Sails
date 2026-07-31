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


        <h1 id="services-title" class="services__title sr-item">Guardrail &amp; Lifeline Covers</h1>

        <p class="services__lead sr-item">
          Soften the blow of the guardrails during a long hike—hence the nickname
          “gut busters”. These covers do the job. Available in a range of colours,
          they’re a simple upgrade in both comfort and care. Let us know what you
          need covered and we’ll tailor them to fit. <br><br>
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div> -->
      </div>

      <div class="services__media services__media--guardrail-lifeline sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
