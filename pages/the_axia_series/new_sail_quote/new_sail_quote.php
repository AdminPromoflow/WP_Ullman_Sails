<?php
$css_file = __DIR__ . '/new_sail_quote.css';
$js_file  = __DIR__ . '/new_sail_quote.js';

$css_time = is_file($css_file) ? filemtime($css_file) : time();
$js_time  = is_file($js_file) ? filemtime($js_file) : time();
?>

<link rel="stylesheet" href="../the_axia_series/new_sail_quote/new_sail_quote.css?v=<?= $css_time ?>">

<div class="container_bottom">
  <a
    class="button_quote button_quote_2 js_quote_button"
    href="<?php echo esc_url(ullman_page_url('New_Sail_Quote')); ?>"
    aria-label="Get a new sail quote"
  >
    New Sail Quote
  </a>
</div>

<script defer src="../the_axia_series/new_sail_quote/new_sail_quote.js?v=<?= $js_time ?>"></script>
