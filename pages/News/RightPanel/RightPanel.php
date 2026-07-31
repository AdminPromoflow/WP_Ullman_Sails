<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/News/RightPanel/RightPanel.css';
$navJsFs  = __DIR__ . '/News/RightPanel/RightPanel.js';

/* Public paths (as used in HTML) */
$navCssPublic = '../News/RightPanel/RightPanel.css';
$navJsPublic  = '../News/RightPanel/RightPanel.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">
<section class="facebook-feed-section" aria-label="Ullman Sails Facebook posts">
  <div class="facebook-feed-grid">

    <article class="facebook-feed-card">
      <iframe
        class="facebook-embed facebook-embed--547"
        src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fullmansailssolent%2Fposts%2Fpfbid024jm85JR9HzyMfRcG1JpzRmLCuvHGNrpanSsbuC9Hb6LKJHCh4CYrSDEwYBJy6xkWl&show_text=true&width=500"
        title="Facebook post 1"
        width="280"
        height="547"
        scrolling="no"
        frameborder="0"
        allowfullscreen="true"
        loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
      </iframe>
    </article>

    <article class="facebook-feed-card">
      <iframe
        class="facebook-embed facebook-embed--390"
        src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fullmansailssolent%2Fposts%2Fpfbid02jxwE3Uox22ATmcVG2yXZaDY1thUFoUFA1jTFzpQyy4zS2nVvX7JTZ8MHUVbGcyfpl&show_text=true&width=500"
        title="Facebook post 2"
        width="280"
        height="390"
        scrolling="no"
        frameborder="0"
        allowfullscreen="true"
        loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
      </iframe>
    </article>

    <article class="facebook-feed-card">
      <iframe
        class="facebook-embed facebook-embed--575"
        src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fullmansailssolent%2Fposts%2Fpfbid0tkbeVebMKKaTUUEAUHnfZ9bbA7CYWiq6FMXvwANgTGfWA95hCzVyXv4dCUqonREl&show_text=true"
        title="Facebook post 3"
        width="280"
        height="575"
        scrolling="yes"
        frameborder="0"
        allowfullscreen="true"
        loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
      </iframe>
    </article>

    <article class="facebook-feed-card">
      <iframe
        class="facebook-embed facebook-embed--705"
        src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fullmansailssolent%2Fposts%2Fpfbid0YrGymntLWmP6vp9SzdenKEXjcp2C76WiaSYrmR7VWi2xasyamLzcVe4G3kvESzeAl&show_text=true"
        title="Facebook post 4"
        width="280"
        height="705"
        scrolling="yes"
        frameborder="0"
        allowfullscreen="true"
        loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
      </iframe>
    </article>

  </div>
</section>
<script defer src="<?= $navJsPublic ?>?v=<?= $navJsV ?>" type="text/javascript"></script>
