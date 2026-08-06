<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/engineering_for_extreme_environments.css');
$introJsVersion  = filemtime(__DIR__ . '/engineering_for_extreme_environments.js');
?>

<link
  rel="stylesheet"
  href="9_engineering_for_extreme_environments/engineering_for_extreme_environments.css?v=<?= $introCssVersion ?>"
>

<section
  class="engineering_for_extreme_environments"
  data-sr-reveal
  aria-labelledby="efee-title"
>
  <div class="efee-wrap">

    <header class="efee-header">
      <h2
        id="efee-title"
        class="efee-title sr-item"
        style="--sr-delay: 0ms"
      >
        Building an Axia Red Line Inventory
      </h2>
    </header>

    <div class="efee-grid" role="list">
      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 70ms">
        <div class="efee-num" aria-hidden="true">01</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Choose the required angles</h3>
          <p class="efee-text">
            Start with the gaps in the existing inventory: close reaching, reaching, broad reaching or running. Each Axia model serves a different application.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 140ms">
        <div class="efee-num" aria-hidden="true">02</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Check girth and rating treatment</h3>
          <p class="efee-text">
            Mid-girth and geometry affect both the sail’s intended use and how a class or rating rule may classify it.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 210ms">
        <div class="efee-num" aria-hidden="true">03</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Specify cloth and wind limits</h3>
          <p class="efee-text">
            Code laminate or spinnaker cloth and its weight are selected for the model, boat and conditions. The loft must provide boat-specific operating guidance.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 280ms">
        <div class="efee-num" aria-hidden="true">04</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Match the handling system</h3>
          <p class="efee-text">
            Pole, tack point, sheets, furler, luff cable and retrieval method must work together with the selected sail and deck layout.
          </p>
        </div>
      </article>
    </div>

  </div>
</section>
<script
  defer
  src="9_engineering_for_extreme_environments/engineering_for_extreme_environments.js?v=<?= $introJsVersion ?>"
></script>
