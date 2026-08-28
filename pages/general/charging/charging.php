<?php
$sectionCss = __DIR__ . '/charging.css';
$sectionJs = __DIR__ . '/charging.js';
$chargingGif = __DIR__ . '/Img/charge.gif';

$cssVersion = file_exists($sectionCss) ? filemtime($sectionCss) : time();
$jsVersion = file_exists($sectionJs) ? filemtime($sectionJs) : time();
$chargingGifVersion = file_exists($chargingGif) ? filemtime($chargingGif) : time();
$sectionUrl = get_template_directory_uri() . '/pages/general/charging';
?>

<!-- CSS -->
<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/charging.css?v=' . $cssVersion); ?>">

<div class="charging_background" id="charging_background">
  <img src="<?php echo esc_url($sectionUrl . '/Img/charge.gif?v=' . $chargingGifVersion); ?>" alt="Loading...">
  <p>Please wait, we are loading the data.</p>
</div>

<!-- JavaScript -->
<script src="<?php echo esc_url($sectionUrl . '/charging.js?v=' . $jsVersion); ?>" type="text/javascript" defer></script>
