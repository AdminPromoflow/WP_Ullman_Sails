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

        <h1 id="services-title" class="services__title sr-item">Cockpit Cushions</h1>

        <p class="services__lead sr-item">
          Custom cockpit cushions add padding and comfort to hard seating and can be patterned to
          the available space. Foam density, drainage and the cover fabric should be selected for
          the way the cushions will be used, exposed and stored.
        </p>

        <p class="services__lead sr-item">
          Marine fabrics and quick-dry foam options can improve resistance to UV, moisture and mildew,
          but performance depends on the exact materials and construction. Removable covers, ventilation
          and dry storage make cleaning and moisture management easier. Retaining fasteners or non-slip
          details can be specified where the boat layout requires them.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--cockpitcushions sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
