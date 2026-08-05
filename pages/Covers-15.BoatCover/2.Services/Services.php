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

        <h1 id="services-title" class="services__title sr-item">Boat Cover</h1>

        <p class="services__lead sr-item">
          A fitted boat cover reduces direct exposure to rain, UV, salt and dirt during storage.
          The fabric, seams, tie-down points and reinforced areas should be selected for the boat,
          climate and storage location rather than treated as universally weatherproof.
        </p>

        <p class="services__lead sr-item">
          Support poles or a frame help shed water and prevent pockets, while ventilation helps
          manage trapped moisture. The cover and boat still need periodic inspection. Storage,
          mooring and road-transport covers are different applications: a cover should only be
          used while towing when it has been specifically designed, fitted and secured for that use.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--boatcover sr-item" aria-hidden="true"></div>
    </div>
  </div>
</section>
