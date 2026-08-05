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


        <h1 id="services-title" class="services__title sr-item">Dinghy Cover</h1>

        <p class="services__lead sr-item">
          Dinghy covers can be patterned for different hulls and storage arrangements, from
          club racers to traditional designs. Support, drainage and ventilation should suit
          how the boat is stored. A road cover is a separate application and must be designed,
          fitted and secured specifically for towing.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--dinghycover sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
