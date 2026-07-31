<?php
$css_file = __DIR__ . '/../Covers-22.Exterior_Cushions/new_sail_quote/new_sail_quote.css';
$js_file  = __DIR__ . '/../Covers-22.Exterior_Cushions/new_sail_quote/new_sail_quote.js';

$css_time = is_file($css_file) ? filemtime($css_file) : time();
$js_time  = is_file($js_file) ? filemtime($js_file) : time();
?>

<link rel="stylesheet" href="../Covers-22.Exterior_Cushions/new_sail_quote/new_sail_quote.css?v=<?= $css_time ?>">

<div id="container_bottom" class="container_bottom">
  <a
    class="button_quote button_quote_2 js_quote_button"
    aria-label="Get a new sail quote"
  >
    New Cover Quote
  </a>
</div>

<script defer src="../Covers-22.Exterior_Cushions/new_sail_quote/new_sail_quote.js?v=<?= $js_time ?>"></script>
