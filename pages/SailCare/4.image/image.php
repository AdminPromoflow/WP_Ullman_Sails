<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/SailCare/4.image/image.css';
$navJsFs  = __DIR__ . '/SailCare/4.image/image.js';

/* Public paths (as used in HTML) */
$navCssPublic = '../SailCare/4.image/image.css';
$navJsPublic  = '../SailCare/4.image/image.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">


<section class="image">
  <a href="<?php echo esc_url(ullman_page_url('Covers')); ?>">
    
  </a>

</section>
<script defer src="<?= $navJsPublic ?>?v=<?= $navJsV ?>" type="text/javascript"></script>
