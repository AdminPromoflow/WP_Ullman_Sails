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
        <a class="services__back sr-item" href="<?php echo esc_url(ullman_page_url('Covers')); ?>" aria-label="Back to Boat Covers">← Boat Covers</a>

        <h1 id="services-title" class="services__title sr-item">Wheel Cover</h1>

        <p class="services__lead sr-item">
          A wheel cover is an essential accessory for any sailing yacht with a helm station.
          Designed to protect the wheel from the elements, it offers UV protection that prevents
          the material from cracking or fading over time. Whether your vessel is moored, docked,
          or at anchor, this cover preserves the appearance and function of your steering gear.
          Built from marine-grade materials, it resists saltwater, sun exposure, and general wear.
          Its fit is often customized to your wheel’s dimensions for maximum effectiveness. Keeping
          your helm protected extends the life of one of the boat's most used components. <br><br>

          These covers often feature a zipper or drawstring closure, allowing for quick fit and easy
          removal when setting sail. In addition to shielding against sun, they are rainproof, keeping
          moisture off delicate leather or metal finishes. Some sailors even opt for double-layered
          options for better thermal protection. A proper wheel cover also provides dirt protection,
          especially in marinas or windy anchorages. Keeping grime off the wheel helps maintain grip
          and steering performance. It’s a small investment with long-term benefits. <br><br>

          Wheel covers not only preserve your helm from weather damage but also contribute to the yacht’s
          overall aesthetics. Matching your wheel cover to your cockpit’s look adds a sense of completeness
          and care to the boat. Many models are now designed to complement other canvas elements such as
          sprayhoods or biminis. A neglected steering wheel can crack, fade, and even become unsafe. With
          a well-fitted, high-quality cover, you protect a crucial system with style. Plus, it only takes
          a few seconds to slip on. <br><br>

          Fun fact: The first yacht wheel covers were repurposed barbecue lids or towels! Sailors quickly
          realized that UV protection and marine-grade material were necessary to preserve modern helm
          wheels — now it’s a standard among seasoned cruisers.
        </p>

        <!-- <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div> -->
      </div>

      <div class="services__media services__media--wheelcover sr-item" aria-hidden="true"></div>
    </div>
  </div>
</section>
