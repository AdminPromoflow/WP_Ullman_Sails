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

        <h1 id="services-title" class="services__title sr-item">Window and Hatch Covers</h1>

        <p class="services__lead sr-item">
          Custom window and hatch covers can manage light, privacy and direct UV exposure.
          Mesh can preserve some airflow and outward visibility, while opaque acrylic canvas
          provides more shade and darkness. The result depends on fabric openness, colour,
          fit and the hatch or window arrangement.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--windowhatch sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
