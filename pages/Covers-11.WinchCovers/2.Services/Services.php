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

        <h1 id="services-title" class="services__title sr-item">Winch Covers</h1>

        <p class="services__lead sr-item">
          Winch covers are essential for maintaining your deck hardware in top condition during cruising and mooring.
          They protect your winches from salt, UV rays, and grime, ensuring they function smoothly when you need them most.
          Typically made of abrasion-resistant canvas or flexible neoprene, these covers stand up to tough marine environments.
          Their waterproof nature keeps moisture out, while dustproof properties prevent clogging of the internal gears.
          With a secure fit, they remain in place even under sail or in high winds. A well-covered winch is a winch that lasts.
        </p>

        <p class="services__lead sr-item">
          Over time, exposure to sun and sea wears down metal surfaces and internal mechanisms. A UV-protected winch cover extends the service life
          of this vital deck gear. Most designs feature easy on/off systems such as elastic edging or Velcro for quick deployment. Whether you're
          preparing for a passage or wrapping up after a day sail, installing the cover takes seconds. It's one of the simplest and most affordable
          ways to reduce wear. For sailors, that’s a smart investment in long-term performance.
        </p>

        <p class="services__lead sr-item">
          Both canvas and neoprene materials offer different advantages depending on your cruising needs. Canvas is highly abrasion-resistant and looks
          traditional, while neoprene hugs the winch for a secure fit and modern feel. Some cruisers even use colour-coded covers to identify winch
          functions at a glance. The design may seem minor, but it reflects the care and precision that define serious sailing. Protecting your gear is
          about efficiency, not just aesthetics.
        </p>

        <p class="services__lead sr-item">
          Fun fact: In offshore racing, crews remove winch covers seconds before action, but in cruising, they're essential during extended stops or
          marina stays to reduce corrosion and mechanical issues over time.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--winchcovers sr-item" aria-hidden="true"></div>

    </div>

  </div>
</section>
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
