<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/navigation.css';
$navJsFs  = __DIR__ . '/navigation.js';

/* Public paths (as used in HTML) */
$navUrl = get_template_directory_uri() . '/pages/Home/navigation';
$navCssPublic = $navUrl . '/navigation.css';
$navJsPublic  = $navUrl . '/navigation.js';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?php echo esc_url($navCssPublic . '?v=' . $navCssV); ?>">

<?php
/**
 * Reusable breadcrumb items for any section/page.
 * - If 'href' is null (or missing), it will render as the current page (no link).
 */
$breadcrumbs = $breadcrumbs ?? [
  ['label' => 'Home',          'href' => ullman_page_url('home')]
];
?>

<section class="nav-section" aria-label="Page navigation">
  <nav class="nav-breadcrumbs" aria-label="Breadcrumb">
    <ol class="nav-breadcrumbs__list">
      <?php foreach ($breadcrumbs as $i => $item): ?>
        <?php
          $label  = (string)($item['label'] ?? '');
          $href   = $item['href'] ?? null;
          $isLast = ($i === array_key_last($breadcrumbs));
        ?>
        <li class="nav-breadcrumbs__item">
          <?php if (!$isLast && is_string($href) && $href !== ''): ?>
            <a class="nav-breadcrumbs__link" href="<?php echo esc_url($href); ?>">
              <?php echo esc_html($label); ?>
            </a>
          <?php else: ?>
            <span class="nav-breadcrumbs__current" aria-current="page">
              <?php echo esc_html($label); ?>
            </span>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </nav>
</section>

<script defer src="<?php echo esc_url($navJsPublic . '?v=' . $navJsV); ?>" type="text/javascript"></script>
