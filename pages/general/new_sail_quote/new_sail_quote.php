<?php
$css_file = __DIR__ . '/new_sail_quote.css';
$js_file  = __DIR__ . '/new_sail_quote.js';

$css_time = is_file($css_file) ? filemtime($css_file) : time();
$js_time  = is_file($js_file) ? filemtime($js_file) : time();
$sectionUrl = get_template_directory_uri() . '/pages/general/new_sail_quote';
?>

<link rel="stylesheet" href="<?php echo esc_url($sectionUrl . '/new_sail_quote.css?v=' . $css_time); ?>">

<div class="container_bottom">
  <a
    class="ullman-button ullman-button--red button_quote button_quote_2 js_quote_button"
    href="<?php echo esc_url(ullman_page_url('new_sail_quote')); ?>"
    aria-label="Get a new sail quote"
  >
    New Sail Quote
  </a>
</div>

<script defer src="<?php echo esc_url($sectionUrl . '/new_sail_quote.js?v=' . $js_time); ?>"></script>
