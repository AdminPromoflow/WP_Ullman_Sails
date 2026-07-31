<?php

$homeCss = __DIR__ . '/style.css';
$homeJs  = __DIR__ . '/app.js';

$homeCssTime = ullman_file_version($homeCss);
$homeJsTime  = ullman_file_version($homeJs);
$homeUrl = get_template_directory_uri() . '/pages/Home';

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo esc_url($homeUrl . '/style.css?v=' . $homeCssTime); ?>">

<h1 class="ullman-sr-only">Ullman Sails</h1>

<?php

include __DIR__ . '/../general/menu/menu.php';
include __DIR__ . '/../general/arrows_up_down/arrows_up_down.php';
include __DIR__ . '/1_slider/slider.php';
include __DIR__ . '/../general/new_sail_quote/new_sail_quote.php';
include __DIR__ . '/navigation/navigation.php';
include __DIR__ . '/2_sail_types/sail_types.php';
include __DIR__ . '/3_covers/covers.php';
include __DIR__ . '/4_services/services.php';
include __DIR__ . '/5.Video/Video.php';
include __DIR__ . '/4.News/News.php';
include __DIR__ . '/../general/charging/charging.php';
include __DIR__ . '/../general/footer/Footer.php';

?>

<script src="<?php echo esc_url($homeUrl . '/app.js?v=' . $homeJsTime); ?>" defer></script>
