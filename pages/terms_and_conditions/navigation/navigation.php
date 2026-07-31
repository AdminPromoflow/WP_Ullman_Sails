<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/General/navigation/navigation.css';
$navJsFs  = __DIR__ . '/General/navigation/navigation.js';

/* Public paths (as used in HTML) */
$navCssPublic = '../General/navigation/navigation.css';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV  = is_file($navJsFs)  ? filemtime($navJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">

<?php
/**
 * Reusable breadcrumb items for any section/page.
 * - If 'href' is null (or missing), it will render as the current page (no link).
 */
$breadcrumbs = $breadcrumbs ?? [
  ['label' => 'Home',  'href' => '../Home/index.php'],
    ['label' => 'Terms And Conditions','href' => null],

];
?>

<section class="nav-section" aria-label="Page navigation">
  <nav class="nav-breadcrumbs" aria-label="Breadcrumb">
    <ol class="nav-breadcrumbs__list">
      <?php foreach ($breadcrumbs as $item): ?>
        <?php
          $label = (string)($item['label'] ?? '');
          $href  = (string)($item['href']  ?? '');
          if ($href === '') $href = '#'; // opcional: fallback si faltó href
        ?>
        <li class="nav-breadcrumbs__item">
          <a class="nav-breadcrumbs__link" href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>
  </nav>
</section>
