<?php
$cssFile = __DIR__ . '/SailCare/5.type/type.css';
$jsFile  = __DIR__ . '/SailCare/5.type/type.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../SailCare/5.type/type.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<div class="series-list">

  <!-- Woven Dacron and Spectra/Dyneema Sails -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-navigator" id="Woven_Dacron">
    <header class="series-header">
      <p class="series-subtitle">MATERIAL TYPE</p>
      <h2 id="series-title-navigator" class="series-title">Sail Care for Material Type</h2>
    </header>

    <div class="series-container" >
      <figure class="series-image">
        <img
          src="../SailCare/5.type/img/Woven-1.jpg"
          alt="Navigator Series cruising sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

      <div class="series-text" >
        <h3 class="series-code">Woven Dacron and Spectra/Dyneema Sails</h3> <br>
        <h4 class="class="series-cloth"">Hard-finish Dacron sails, most commonly used for dinghy sails and One Design keelboat sails, should only be rolled and stored where they will not be crushed.</h4><br>
        <p>Store safely rolled, rinse metal components occasionally, and avoid using harsh chemicals or chlorine.</p>
        <p>Hard-finish Dacron sails, commonly used for dinghy and One Design keelboat sails, should always be rolled and stored to avoid crushing.</p>
        <p>Never clean sails in a chlorinated swimming pool, as the stitching is not resistant to chlorine.</p>
        <p>Avoid using solvents or harsh chemicals on sails without professional guidance.</p>
        <p>Rinse aluminum headboards, stainless steel rings, and nickel-plated grommets occasionally with fresh water to maintain their integrity.</p>
      </div>
    </div>
  </section>

  <!-- Laminate and FiberPath Sails -->
  <section class="series-section is-reversed" data-sr-reveal aria-labelledby="series-title-endurance" id="Laminate">

    <div class="series-container">

      <div class="series-text">
        <h3 class="series-code">Laminate and FiberPath Sails</h3> <br>
        <h4 class="series-cloth">Laminate and FiberPath sails provide unmatched performance and durability, offering superior shape-holding characteristics. These sails require careful handling to maintain their performance. </h4><br>
        <h4 class="series-cloth">Several essential steps should be taken to ensure a long and valuable life for your sails:</h4> <br>
        <p>When storing, avoid flaking or folding the sails along the same line each time.</p>
        <p>Never clean sails in a chlorinated swimming pool, as the stitching on laminate sails is particularly vulnerable to chlorine damage.</p>
        <p>Refrain from using solvents or cleaning agents on sails without professional guidance.</p>
        <p>Avoid flaking or folding FiberPath sails along the same line each time you store them.</p>

        <h4 class="series-cloth">By following these best practices, you can ensure your laminate and FiberPath sails remain in top condition to help you achieve your sailing goals.</h4>
        <h4 class="series-cloth">If you have any questions, contact your local Ullman Sails loft.</h4>
      </div>
      <figure class="series-image">
        <img
          src="../SailCare/5.type/img/FiberPath-2.jpg"
          alt="Endurance Series cruising sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

    </div>
  </section>

  <!-- Spinnaker Cloth -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-voyager" id="Spinnaker_Cloth">
    <div class="series-container">
      <figure class="series-image">
        <img
          src="../SailCare/5.type/img/Spinnaker-3.jpg"
          alt="Voyager Series cruising sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

      <div class="series-text">
        <h3 class="series-code">Spinnaker Cloth</h3><br>
        <h4 class="series-tagline">Handle with care, as spinnaker cloth is especially sensitive to UV rays and stress. Its lightweight properties are achieved using extremely thin material, making it more fragile and particularly vulnerable to UV exposure and damage from flogging.</h4> <br>
        <p>Modern spinnaker cloth is generally color-stable, but "bleeding" can still occur if colored spinnakers are stored wet.</p>
        <p>Avoid hoisting spinnakers at the dock to dry by flapping, as this can cause destructive "flutter and impact" damage similar to manufacturer tests.</p>
        <p>Nylon is a robust and lightweight fiber that can stretch significantly under load, but using a spinnaker beyond its recommended wind range or during broaching with explosive refills can lead to blowouts.</p>
        <p>Regularly inspect and cover or tape any snag points on the boat that could tear a spinnaker during hoisting or dropping.</p>
        <p>Only use solvents or cleaning agents on sails with professional guidance.</p>
        <p>Prevent flapping and store sails properly to avoid color bleeding and material damage.</p>
        <hr class="series-divider" aria-hidden="true">

        <h4 class="series-cloth">By following these best practices, your spinnaker cloth sails can last substantially longer and perform better:</h4>
        <h4 class="series-cloth">If you have any questions, contact your local Ullman Sails loft.</h4>


      </div>
    </div>
  </section>



</div>

<script defer src="../SailCare/5.type/type.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
