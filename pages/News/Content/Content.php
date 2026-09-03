<?php
declare(strict_types=1);

$navCssFs = __DIR__ . '/Content.css';
$navJsFs = __DIR__ . '/Content.js';
$navBaseUrl = get_template_directory_uri() . '/pages/News/Content';
$navCssPublic = $navBaseUrl . '/Content.css';
$navJsPublic = $navBaseUrl . '/Content.js';
$navCssV = is_file($navCssFs) ? filemtime($navCssFs) : time();
$navJsV = is_file($navJsFs) ? filemtime($navJsFs) : time();
?>

<link rel="stylesheet" href="<?php echo esc_url($navCssPublic . '?v=' . $navCssV); ?>">
<section class="newsroom" aria-labelledby="newsroom-title">
  <div class="newsroom__shell">
    <header class="newsroom__hero reveal">
      <p class="newsroom__eyebrow">Ullman Sails GBR</p>
      <h1 id="newsroom-title" class="newsroom__title">News &amp; Updates</h1>
      <p class="newsroom__lead">
        Race results, loft developments, customer stories and life on the water.
      </p>
    </header>

    <section class="news-reader-controls reveal" aria-label="News reader controls">
      <label class="news-story-picker" for="newsStorySelect">
        <span>Choose a story</span>
        <select id="newsStorySelect" aria-label="Choose a news story" disabled>
          <option>Loading stories...</option>
        </select>
      </label>

      <nav class="news-reader-nav" aria-label="Move between stories">
        <button class="news-reader-button" type="button" data-news-previous disabled>
          <span aria-hidden="true">←</span> Previous
        </button>
        <p class="news-reader-status" aria-live="polite">Loading news...</p>
        <button class="news-reader-button" type="button" data-news-next disabled>
          Next <span aria-hidden="true">→</span>
        </button>
      </nav>
    </section>

    <div class="newsroom__list" id="newsStories" aria-live="polite" aria-busy="true">
      <p class="newsroom__message" role="status">Loading the latest stories...</p>
    </div>

    <nav class="news-reader-nav news-reader-nav--footer" aria-label="Continue reading news">
      <button class="news-reader-button" type="button" data-news-previous disabled>
        <span aria-hidden="true">←</span> Previous story
      </button>
      <button class="news-reader-button" type="button" data-news-next disabled>
        Next story <span aria-hidden="true">→</span>
      </button>
    </nav>
  </div>
</section>
<?php ullman_ajax_config(); ?>
<script defer src="<?php echo esc_url($navJsPublic . '?v=' . $navJsV); ?>" type="text/javascript"></script>
