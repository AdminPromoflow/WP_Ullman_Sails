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

        <h1 id="services-title" class="services__title sr-item">Boat Cover</h1>

        <p class="services__lead sr-item">
          A boat cover is essential for protecting your vessel during storage or travel.
          Made from durable tarp material, it offers full weatherproof protection against
          rain, sun, dust, and salt. Designed to provide a snug fit, it wraps securely
          over your sailboat, shielding both the deck and interior. The cover acts as a
          UV shield, blocking harmful rays that fade and weaken marine surfaces. Its
          reinforced seams and adjustable tie-down straps ensure it stays in place in
          windy conditions. Many models are foldable for easy storage when not in use.<br><br>

          Cruising sailboats benefit greatly from a proper boat cover. Besides hull protection,
          it keeps dirt, birds, and leaves from accumulating on deck. Whether moored, trailered,
          or in dry dock, a cover adds years of life to your topside finish and rigging. Some
          covers feature breathable panels that prevent moisture build-up under the fabric. A
          good fit is critical—not too loose to flap, not too tight to tear. Most weatherproof
          models are also mildew-resistant and double-stitched for extra strength.<br><br>

          For sailors who frequently tow or relocate their boats, a boat cover designed for travel
          is ideal. These feature rugged tarp materials with extra-reinforced corners to withstand
          high-speed wind drag. An effective UV shield preserves your gelcoat, canvas, and fittings
          from sun damage over long journeys. Tie-down points are strategically placed for even
          pressure distribution. Thanks to their lightweight build, modern covers offer easy storage
          without sacrificing durability. It's a smart move for long-term care.<br><br>

          Fun fact: Some high-end boat covers now come with solar-powered ventilation systems built-in,
          combining hull protection with moisture control and renewable energy use.
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div> -->
      </div>

      <div class="services__media services__media--boatcover sr-item" aria-hidden="true"></div>
    </div>
  </div>
</section>
