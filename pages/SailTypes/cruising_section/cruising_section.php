<?php
declare(strict_types=1);

$cssFile = __DIR__ . '/../SailTypes/cruising_section/cruising_section.css';
$jsFile  = __DIR__ . '/../SailTypes/cruising_section/cruising_section.js';
$assetUrl = get_template_directory_uri() . '/pages/SailTypes/cruising_section';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;

$sections = [
  1 => [
    'theme' => 'cruising',
    'title' => 'Cruising sails',
    'subtitle' => "When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series,
    Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique
    features and benefits...",
    'items' => [
      ['href' => '../cruising_navigator/index.php',   'img' => '../Cruising/cruising_section/img/navigator.png',   'alt' => 'Navigator Icon',   'label' => 'Navigator'],
      ['href' => '../cruising_endurance/index.php',   'img' => '../Cruising/cruising_section/img/Endurance.png',   'alt' => 'Endurance Icon',   'label' => 'Endurance'],
      ['href' => '../cruising_voyager/index.php',     'img' => '../Cruising/cruising_section/img/voyager.png',     'alt' => 'Voyager Icon',     'label' => 'Voyager'],
      ['href' => '../cruising_performance/index.php', 'img' => '../Cruising/cruising_section/img/performance.png', 'alt' => 'Performance Icon', 'label' => 'Performance'],
      ['href' => '../cruising_downwind/index.php',    'img' => '../Cruising/cruising_section/img/downwind.png',    'alt' => 'Downwind Icon',    'label' => 'Downwind'],
    ],
    'cta_key' => 'cruising',
    'cta_label' => 'Explore cruising sails',
  ],

  2 => [
    'theme' => 'racing',
    'title' => 'Racing Sails',
    'subtitle' => "When it comes to racing sails, speed, stability, and control are key. Our race ranges are designed to deliver
    confident handling, efficient shapes, and the responsiveness you need to push harder when it counts.",
    'items' => [
      ['href' => '../racing_race_series/index.php',      'img' => '../SailTypes/cruising_section/img/voyager.png', 'alt' => 'Race series icon',     'label' => 'Race'],
      ['href' => '../racing_fiberpath_series/index.php', 'img' => '../SailTypes/cruising_section/img/Endurance.png', 'alt' => 'FiberPath series icon', 'label' => 'FiberPath'],
      ['href' => '../racing_red_line_series/index.php',  'img' => '../SailTypes/cruising_section/img/downwind.png',  'alt' => 'Red Line series icon',  'label' => 'The Axia Series'],
    ],
    'cta_key' => 'racing',
    'cta_label' => 'Explore racing sails',
  ],

  3 => [
    'theme' => 'downwind',
    'title' => 'The Axia Series',
    'subtitle' => "Built for high-performance sailing, The Axia Series delivers responsive handling, efficient shapes,
    and reliable control when conditions demand more.",
    'items' => [
      ['href' => '../cruising_downwind/index.php',      'img' => '../the_axia_series/the_axia_series_section/img/downwind.png', 'alt' => 'Blue Line Icon', 'label' => 'Blue Line'],
      ['href' => '../racing_red_line_series/index.php', 'img' => '../the_axia_series/the_axia_series_section/img/downwind.png', 'alt' => 'Red Line Icon',  'label' => 'Red Line'],
    ],
    'cta_key' => 'the_axia_series',
    'cta_label' => 'Explore the Axia Series',
  ],
];
?>

<script>document.documentElement.classList.add('js');</script>

<link rel="stylesheet" href="<?= esc_url($assetUrl . '/cruising_section.css' . ($cssVer ? '?v=' . $cssVer : '')) ?>">

<?php for ($i=1; $i<=3; $i++): $cfg = $sections[$i]; ?>
  <div class="sail-section-marker" aria-hidden="true">
    <span><?= htmlspecialchars($cfg['title'], ENT_QUOTES, 'UTF-8') ?></span>
  </div>
<section class="cruising-section cruising-section--<?= htmlspecialchars($cfg['theme'], ENT_QUOTES, 'UTF-8') ?>" data-sr-reveal aria-labelledby="cruising-title-<?= $i ?>">
  <div class="img-title-sailing-content">
    <img
      src="../cruising_navigator/1_introduction/img/ullman_sails.png"
      alt="Ullman Sails"
      decoding="async"
      width="240"
      height="72"
    >
  </div>

  <h1 id="cruising-title-<?= $i ?>" class="cruising-title"><?= $cfg['title'] ?></h1>

  <p class="cruising-subtitle">
    <?= $cfg['subtitle'] ?>
  </p>

  <ul class="cruising-icons" role="list">
    <?php foreach ($cfg['items'] as $item): ?>
      <li class="cruising-icon">
        <a class="cruising-link" href="<?= $item['href'] ?>">
          <img src="<?= $item['img'] ?>" alt="<?= $item['alt'] ?>" loading="lazy" decoding="async">
          <h3 class="series"><?= $item['label'] ?></h3>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <div class="cruising-section__action">
    <a class="ullman-button--primary cruising-section__cta" href="<?= esc_url(ullman_page_url($cfg['cta_key'])) ?>">
      <?= htmlspecialchars($cfg['cta_label'], ENT_QUOTES, 'UTF-8') ?>
    </a>
  </div>
</section>
<?php endfor; ?>

<script defer src="<?= esc_url($assetUrl . '/cruising_section.js' . ($jsVer ? '?v=' . $jsVer : '')) ?>"></script>
