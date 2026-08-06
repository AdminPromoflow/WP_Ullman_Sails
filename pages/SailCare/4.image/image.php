<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/image.css';
$navJsFs  = __DIR__ . '/image.js';

/* Public paths (as used in HTML) */
$navCssPublic = '../SailCare/4.image/image.css';
$navJsPublic  = '../SailCare/4.image/image.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">


<section class="image" aria-labelledby="sailcare-covers-title">
  <div class="image__card">
    <p class="image__kicker">Complete your sail care</p>
    <h2 class="image__title" id="sailcare-covers-title">Protect your sails between outings</h2>
    <p class="image__copy">A properly fitted cover helps shield sails and canvas from UV exposure, weather and everyday wear.</p>
    <a class="image__link" href="<?php echo esc_url(ullman_page_url('Covers')); ?>">
      Explore covers <span aria-hidden="true">→</span>
    </a>
  </div>
</section>
<script defer src="<?= $navJsPublic ?>?v=<?= $navJsV ?>" type="text/javascript"></script>
