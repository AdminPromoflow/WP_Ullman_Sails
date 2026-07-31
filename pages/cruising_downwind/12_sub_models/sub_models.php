<?php
$cssFile    = __DIR__ . '/12_sub_models/sub_models.css';
$jsFile     = __DIR__ . '/12_sub_models/sub_models.js';

$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>
<link rel="stylesheet" href="12_sub_models/sub_models.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<body>

  <section class="wrap" data-sr-reveal>
      <h2 class="sr-item">How we build things that last</h2>

      <div class="grid sr-item">
        <article class="card sr-item">
          <h3>Blue Line Series</h3>
          <p>
            Easy-trim cruising spinnakers that add downwind
            speed while keeping handling safe—plus options like the ATN sock.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Cruising AP Spinnaker</h3>
          <p>
            Standard 165% asym for power with control,
            typically 1.5oz nylon, built to stay hoisted across a wide range.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Cruising Mini Spinnaker</h3>
          <p>
            145% Mini for simpler, forgiving downwind
            sailing—great for singlehanders, easier hoists/douses with an ATN sock.
          </p>
        </article>

        <article class="card sr-item">
          <h3>The Axia Series — Blue Line (Downwind Cruising)</h3>
          <p>
            Dedicated downwind cruising sails for stable,
            smooth flying shapes and confident broad-reaching/running, tailored to your rig.
          </p>
        </article>

        <article class="card sr-item">
          <h3>Lightweight fabrics for easier handling</h3>
          <p>
            Comfortable ride and greater confidence on passage
            Built for cruisers who want to sail deeper, faster, and with control.
          </p>
        </article>
      </div>
    </section>

  <script defer src="12_sub_models/sub_models.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>" type="text/javascript"></script>
</body>
