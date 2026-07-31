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


        <h1 id="services-title" class="services__title sr-item">Cockpit Enclosure</h1>

        <p class="services__lead sr-item">
          Turn your cockpit into a sheltered living space with a well-made enclosure—ideal
          for extending comfort and usability in unpredictable UK weather. We can cover
          existing bars or design bars to your requirements. Linking to your sprayhood,
          enclosures include clear windows and wind-up panels for flexibility. Whether
          you’re looking for extra protection, space to socialise, or simply a warmer
          cup of tea in the cockpit, we’re happy to talk through the best setup for your
          boat.<br><br>
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--cockpit-enclosure sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
