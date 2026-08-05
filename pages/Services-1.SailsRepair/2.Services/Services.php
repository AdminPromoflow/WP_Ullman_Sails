
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

        <h1 id="services-title" class="services__title sr-item">
          Expert Sail Repair Services for Optimal Performance
        </h1>

        <p class="services__lead sr-item">
          A professional sail inspection can identify worn stitching, tears, chafe, UV-damaged covers,
          tired hardware and other issues before repair work begins. The recommended work depends on
          the sail's material, construction, age and overall condition.
        </p>

        <p class="services__lead sr-item">
          Our sailmakers undertake routine servicing and repairs such as patching damaged cloth,
          replacing failed stitching or UV protection and attending to fittings where appropriate.
          If a sail is no longer safely or economically repairable, the loft will explain the available options.
        </p>

        <p class="services__lead sr-item">
          Contact the loft for an assessment and a repair recommendation suited to your sail and intended use.
        </p>

        <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div>
      </div>

      <div class="services__media services__media--sail-repair sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
