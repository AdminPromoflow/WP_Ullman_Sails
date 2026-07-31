<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$navCssFs = __DIR__ . '/Covers/navigation/navigation.css';

/* Public paths (as used in HTML) */
$navCssPublic = '../Covers/navigation/navigation.css';

/* Version values (cache-busting) */
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
?>

<link rel="stylesheet" href="<?= $navCssPublic ?>?v=<?= $navCssV ?>">

<?php
/**
 * Reusable breadcrumb items for any section/page.
 * - If 'href' is null (or missing), it will render as the current page (no link).
 */
$breadcrumbs = $breadcrumbs ?? [
  ['label' => 'Home',          'href' => '../Home/index.php'],
  ['label' => 'Cover',          'href' => '../Covers/index.php'],
  ['label' => 'Sprayhood','href' => null],
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
            <a class="nav-breadcrumbs__link" href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>">
              <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
            </a>
          <?php else: ?>
            <span class="nav-breadcrumbs__current" aria-current="page">
              <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
            </span>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </nav>
</section>
