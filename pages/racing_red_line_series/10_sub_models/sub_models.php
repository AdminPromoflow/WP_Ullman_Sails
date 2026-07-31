<?php
$cssTime = @filemtime('10_sub_models/sub_models.css') ?: time();
$jsTime  = @filemtime('10_sub_models/sub_models.js') ?: time();
?>
<link rel="stylesheet" href="10_sub_models/sub_models.css?v=<?= $cssTime ?>">

<body>
  <section class="wrap" data-sr-reveal>
    <h2 class="sr-item">How we build things that last</h2>

    <div class="grid sr-item">
      <article class="card sr-item">
        <h3>Race-Focused Design</h3>
        <p>
          Engineered for racing speed and precision, with sails optimised
          for stability, aerodynamic flow, and a competitive edge on the racecourse.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Low-Stretch, Fast-Recovery Fabrics</h3>
        <p>
          Built with high-performance racing fabrics designed for
          shape retention, low stretch, and quick recovery after load changes.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Axia Code Sails (50 / 60 / 75)</h3>
        <p>
          Code sail options using premium laminate cloths, aimed at delivering
          depth, control, and efficient power when sailing downwind and reaching.
        </p>
      </article>

      <article class="card sr-item">
        <h3>Luff System Options</h3>
        <p>
          Available with Ullman’s Active Luff System or as cable-luff (direct furling)
          configurations to enhance control and help reduce rig loads.
        </p>
      </article>
    </div>
  </section>

  <script defer src="10_sub_models/sub_models.js?v=<?= $jsTime ?>" type="text/javascript"></script>
</body>
