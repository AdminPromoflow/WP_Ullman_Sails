<?php
$cssTime = filemtime('10_sub_models/sub_models.css');
$jsTime  = filemtime('10_sub_models/sub_models.js');
?>
<link rel="stylesheet" href="10_sub_models/sub_models.css?v=<?= $cssTime ?>">

<body>

  <section class="wrap" data-sr-reveal>
    <h2 class="sr-item">How we build things that last</h2>

    <div class="grid">
      <article class="card sr-item">
        <h3>Grand Prix</h3>
        <p>
          The highest-performance FibrePath option, built for exceptional load management and the strongest shape-holding for maximum speed.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Regatta</h3>
        <p>
          Custom membrane sails that stay lightweight and low-stretch, with an optional rugged “skin” to extend racing life with minimal weight gain.
        </p>
      </article>

      <!-- Si agregas más cards, solo ponles también: class="card sr-item" -->
    </div>
  </section>

  <script defer src="10_sub_models/sub_models.js?v=<?= $jsTime ?>"></script>
</body>
