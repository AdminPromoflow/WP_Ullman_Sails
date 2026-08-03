<?php
$sectionCss = __DIR__ . '/covers.css';
$sectionJs  = __DIR__ . '/covers.js';

$sectionCssTime = file_exists($sectionCss) ? filemtime($sectionCss) : time();
$sectionJsTime  = file_exists($sectionJs) ? filemtime($sectionJs) : time();
$sectionUrl = get_template_directory_uri() . '/pages/Home/3_covers';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/covers.css?v=' . $sectionCssTime); ?>">

<section class="covers" aria-labelledby="covers-title">
  <div class="section_covers">
    <div class="img-title-sailing-content">
      <img
        src="<?php echo esc_url(get_template_directory_uri() . '/pages/Home/1_slider/img/ullman_sails.png'); ?>"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <h2 id="covers-title">Covers</h2>

    <a href="<?php echo esc_url(ullman_page_url('covers')); ?>" class="covers_button ullman-button ullman-button--red ullman-button--primary">
      <span class="covers_button__label">Explore covers</span>
    </a>
  </div>
</section>

<script defer src="<?php echo esc_url($sectionUrl . '/covers.js?v=' . $sectionJsTime); ?>"></script>
