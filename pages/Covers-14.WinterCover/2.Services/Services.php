<?php
$cssFile = __DIR__ . '/../../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile) ? filemtime($jsFile) : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">
    <div class="services__layout">

      <div class="services__copy">

        <h1 id="services-title" class="services__title sr-item">Winter Cover</h1>

        <p class="services__lead sr-item">
          A winter cover reduces direct exposure to rain, snow, dirt and UV while a boat is
          stored. The design can extend over the deck and cockpit, with fastenings and reinforced
          areas placed for the individual boat and its storage arrangement.
        </p>

        <p class="services__lead sr-item">
          The cover needs adequate support and tension so that water, snow or ice do not form
          heavy pockets. Ventilation can help manage trapped moisture, but the boat and cover
          still require periodic inspection. A winter cover is only one part of winter storage
          and does not replace engine, plumbing, battery or other manufacturer-recommended
          winterisation procedures.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--wintercover sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
