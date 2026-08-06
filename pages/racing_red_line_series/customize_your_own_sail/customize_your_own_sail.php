<?php
$cssFile = __DIR__ . '/customize_your_own_sail.css';
$jsFile  = __DIR__ . '/customize_your_own_sail.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="customize_your_own_sail/customize_your_own_sail.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="customize_your_own_sail/customize_your_own_sail.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="customize-cta" aria-label="Customize your own sail" data-sr-reveal>
  <div class="customize-cta__inner">
    <h2 class="customize-cta__title sr-item">Customize your own sail</h2>

    <a class="customize-cta__btn sr-item" href="<?php echo esc_url(ullman_page_url('Racing-4.RedLineSpinnakers-Customize')); ?>" aria-label="Customize your own sail">
      Get started
    </a>
  </div>
</section>
