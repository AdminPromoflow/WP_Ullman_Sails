
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
          Welcome to your trusted destination for comprehensive sail repair solutions.
          Our team of skilled sailmakers and technicians is dedicated to giving new life to your sails,
          ensuring they perform at their peak on every voyage.
        </p>

        <p class="services__lead sr-item">
          From minor repairs to major overhauls, we specialise in addressing a wide range of sail issues —
          including tears, stitching, UV damage, and more. With a commitment to quality craftsmanship and attention to detail,
          we take pride in extending the lifespan of your sails and maximising your sailing experience.
        </p>

        <p class="services__lead sr-item">
          Choose us for reliable, expert sail repairs that keep you sailing confidently — whatever the conditions.
        </p>

        <div class="services__actions sr-item">
          <a class="btn" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">Contact us</a>
        </div>
      </div>

      <div class="services__media services__media--repair sr-item" aria-hidden="true"></div>
    </div>

  </div>
</section>
