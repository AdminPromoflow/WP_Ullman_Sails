<!-- SUB-RANGES / MODELS -->
<?php
$cssFile    = __DIR__ . '/sub_ranges_models/sub_ranges_models.css';
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
?>

<link rel="stylesheet"
      href="sub_ranges_models/sub_ranges_models.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="sub_ranges_models" aria-labelledby="srm-title">
  <div class="srm-wrap">

    <!-- Top -->
    <header class="srm-top">
      <div class="srm-left">
        <p class="srm-tag">Sub-ranges</p>
        <h2 id="srm-title" class="srm-title">Models</h2>
      </div>

      <p class="srm-intro">
        We start by listening. We ask the hard questions and wait for real answers.
        Then we move forward with a plan that's been tested and refined.
      </p>
    </header>

    <!-- Grid (2 cols, 3 rows) -->
    <div class="srm-grid" role="list">
      <article class="srm-card" role="listitem">
        <h3 class="srm-card-title">Know the problem first</h3>
        <p class="srm-card-text">
          Most people rush past this part. We don't. Understanding what you're actually trying to solve changes everything that comes next.
        </p>
      </article>

      <article class="srm-card" role="listitem">
        <h3 class="srm-card-title">Build with intention</h3>
        <p class="srm-card-text">
          Every element serves a purpose. Nothing gets added because it looks good or feels trendy. It's there because it works.
        </p>
      </article>

      <article class="srm-card" role="listitem">
        <h3 class="srm-card-title">Test before you launch</h3>
        <p class="srm-card-text">
          We break things before you have to. Problems get caught and fixed in the quiet before the world sees it.
        </p>
      </article>

      <article class="srm-card" role="listitem">
        <h3 class="srm-card-title">Keep moving forward</h3>
        <p class="srm-card-text">
          Launch isn't the end. We watch what happens, learn from it, and make it better. That's how things actually improve.
        </p>
      </article>

      <article class="srm-card" role="listitem">
        <h3 class="srm-card-title">Start with clarity</h3>
        <p class="srm-card-text">
          We dig into what matters before anything else. The questions we ask shape everything that follows.
        </p>
      </article>

      <article class="srm-card" role="listitem">
        <h3 class="srm-card-title">Deliver with confidence</h3>
        <p class="srm-card-text">
          Once we know the path, we walk it without hesitation. The work gets finished right the first time.
        </p>
      </article>
    </div>

  </div>
</section>
