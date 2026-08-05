<?php
$serviceSliderImageFs = get_template_directory() . '/pages/Services/1.Slider/img/sails-cleaning.jpg';
$serviceSliderImageV = is_file($serviceSliderImageFs) ? (int) filemtime($serviceSliderImageFs) : time();
$serviceSliderImage = rtrim(get_template_directory_uri(), '/') . '/pages/Services/1.Slider/img/sails-cleaning.jpg?v=' . $serviceSliderImageV;
?>
<style media="screen">
.slideHome{
  position: relative;
  height: 80vh;
  min-height: 500px;
  width: 100vw;
  overflow: hidden;
}
.service-slider__image{
  position: absolute;
  inset: 0;
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.gradientSlideHome{
  position: relative;
  z-index: 1;
  height: 100%;
  width: 100%;

}

@media  (orientation: landscape) {
  .slideHome{
    height: 80vh;
    min-height: 500px;
  }
}
</style>

<section id="slideHome" class="slideHome">
  <img class="service-slider__image" src="<?= esc_url($serviceSliderImage) ?>" alt="Sail and canvas cleaning services" fetchpriority="high" decoding="async">
  <div class="gradientSlideHome">


  </div>
</section>
