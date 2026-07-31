<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/1_introduction/introduction.css');
$introJsVersion  = filemtime(__DIR__ . '/1_introduction/introduction.js');
?>

<link
  rel="stylesheet"
  href="1_introduction/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  aria-labelledby="navigator-title"
  data-sr-reveal
>
  <div class="sailing-content">
    <!-- Brand mark: provide meaningful alt text for accessibility -->
    <div class="img-title-sailing-content sr-item">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h1 class="sr-item" id="navigator-title">The Axia&nbsp;Series&nbsp;- Red Line</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p class="sr-item">
      Built to maximise racecourse performance, Axia Red Line is Ullman’s downwind racing range for symmetric, asymmetric and Code sails. Built for fast rotation, smooth acceleration and tight trims, with light construction and structured luffs for easy launches and pace to leeward.
    </p>
  </div>
</section>

<script
  defer
  src="../../1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>
