<?php
$sectionCss = __DIR__ . '/video.css';
$sectionJs  = __DIR__ . '/video.js';

$sectionCssTime = file_exists($sectionCss) ? filemtime($sectionCss) : time();
$sectionJsTime  = file_exists($sectionJs) ? filemtime($sectionJs) : time();
$sectionUrl = get_template_directory_uri() . '/pages/Home/5.Video';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/video.css?v=' . $sectionCssTime); ?>">
<section class="contactus-hero" aria-labelledby="contactus-main-heading">
  <!-- Left side -->
  <div class="contactus-hero__media">


    <div class="contactus-video-card">
      <video
        class="contactus-video"
        autoplay
        muted
        loop
        playsinline
        preload="auto"
        poster="<?php echo esc_url($sectionUrl . '/img/contactus-poster.jpg'); ?>"
      >
        <source src="<?php echo esc_url($sectionUrl . '/videoUpdated.mp4'); ?>" type="video/mp4">
      </video>
    </div>
  </div>

  <!-- Right side -->
  <div class="contactus-hero__content">
    <div class="contactus-hero__content-inner">
      <div class="contactus-hero__brand contactus-hero__brand--right">
        <div class="img-title-sailing-content">
          <img
            src="<?php echo esc_url(get_template_directory_uri() . '/pages/Home/1_slider/img/ullman_sails.png'); ?>"
            alt="Ullman Sails"
            decoding="async"
            width="240"
            height="72"
          >
        </div>

        <h2 id="contactus-title-right" class="contactus-side-title">Contact us</h2>
      </div>


      <div class="contactus-hero__actions">
        <a href="<?php echo esc_url(ullman_page_url('new_sail_quote')); ?>" class="contactus-btn contactus-btn--secondary">New Sail Quote</a>
        <a href="<?php echo esc_url(ullman_page_url('new_repair_quote')); ?>" class="contactus-btn contactus-btn--primary">New Repair Quote</a>
        <a href="<?php echo esc_url(ullman_page_url('contact_us')); ?>" class="contactus-btn contactus-btn--primary">Contact us</a>

      </div>

    </div>
  </div>
</section>

<script src="<?php echo esc_url($sectionUrl . '/video.js?v=' . $sectionJsTime); ?>" type="text/javascript"></script>
