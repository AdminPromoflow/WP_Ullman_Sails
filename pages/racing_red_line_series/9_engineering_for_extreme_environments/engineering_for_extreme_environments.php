<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/9_engineering_for_extreme_environments/engineering_for_extreme_environments.css');
$introJsVersion  = filemtime(__DIR__ . '/9_engineering_for_extreme_environments/engineering_for_extreme_environments.js');
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
        Engineering for extreme environments
      </h2>
    </header>

    <div class="efee-grid" role="list">
      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 70ms">
        <div class="efee-num" aria-hidden="true">01</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Ultra-high performance membrane design</h3>
          <p class="efee-text">
            Axia Red Line sails use advanced membrane technology to achieve maximum strength-to-weight ratios, delivering explosive response and precision control at the highest racing levels.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 140ms">
        <div class="efee-num" aria-hidden="true">02</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Carbon-driven load management</h3>
          <p class="efee-text">
            High-modulus carbon fibres dominate the load structure, minimising stretch under extreme loads and locking in sail shape during heavy-air racing and sustained upwind pressure.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 210ms">
        <div class="efee-num" aria-hidden="true">03</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Lightweight without compromise</h3>
          <p class="efee-text">
            Optimised film and fibre combinations reduce overall weight while preserving durability, allowing faster hoists, smoother manoeuvres and superior performance in marginal conditions.
          </p>
        </div>
      </article>

      <article class="efee-item sr-item" role="listitem" style="--sr-delay: 280ms">
        <div class="efee-num" aria-hidden="true">04</div>
        <div class="efee-body">
          <h3 class="efee-item-title">Elite racing focus</h3>
          <p class="efee-text">
            Designed for professional and top-level amateur racers, Red Line sails prioritise speed, stability and confidence when sailing at the limit, where small gains decide results.
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
