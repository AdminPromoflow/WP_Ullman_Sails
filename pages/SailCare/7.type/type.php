<?php
$cssFile = __DIR__ . '/SailCare/7.type/type.css';
$jsFile  = __DIR__ . '/SailCare/7.type/type.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../SailCare/7.type/type.css<?= $cssVer ? '?v='.$cssVer : '' ?>">

<div class="series-list">

  <!-- Keelboat and Multihull -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-navigator" id="Keelboat_Multihull">
    <header class="series-header">
      <p class="series-subtitle">SAIL CARE</p>
      <h2 id="series-title-navigator" class="series-title">Sail Care for Boat Type</h2>
    </header>

    <div class="series-container" >
      <figure class="series-image">
        <img
          src="../SailCare/7.type/img/phoenixinterior1.jpg"
          alt="Navigator Series cruising sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

      <div class="series-text" >
        <h3 class="series-code">Keelboat and Multihull Cruising Sails</h3> <br>
        <h4 class="class="series-cloth"">Caring for keelboat and multihull sails is straightforward but essential. Protect the sails from UV exposure, avoid flapping, and ensure proper tensioning. Regularly check and adjust sail settings to minimize wear and tear</h4><br>
        <p>On windy days, hoist sails gradually to avoid exposing them to full wind strength.</p>
        <p>When storing on the boom, use a quality cover to protect the mainsail from UV damage.</p>
        <p>Avoid motor-sailing with a flapping mainsail; keep it trimmed and tack with the wind to prevent unnecessary wear.</p>
        <p>Ensure leech lines are correctly tensioned to prevent the sail's edge from fluttering.</p>
        <p>Reduce luff tension when the sail is rolled between uses for furling headsails.</p>
        <p>When reefing a furling headsail, bear away and take the reef under reduced load to minimize flogging and potential damage.</p>
        <p>Practice mainsail reefing so it can be done swiftly, reducing the chance of flogging.</p>
        <p>For slab-reefing mainsails, secure the reefed portion properly and avoid testing the sail with unsecured reefing, which can cause damage.</p> <br>
        <h4 class="series-cloth">If you have any questions, contact your local Ullman Sails loft.</h4>
        <h4 class="series-cloth">The care requirements for your sail may vary based on the material, so be sure to follow the appropriate steps for optimal maintenance.</h4>
      </div>
    </div>
  </section>

  <!-- Dinghy and One Design Keelboat Sails -->
  <section class="series-section is-reversed" data-sr-reveal aria-labelledby="series-title-endurance" id="Dinghy_Sails">

    <div class="series-container">

      <div class="series-text">
        <h3 class="series-code">Dinghy and One Design Keelboat Sails</h3> <br>
        <h4 class="series-cloth">Store sails dry and rolled to prevent UV damage. Rinse with fresh water occasionally and avoid using harsh chemicals or chlorine for cleaning.</h4><br>
        <p>Mainsails and jibs should be stored dry, rolled in a sausage or tube bag, and out of direct UV exposure.</p>
        <p>Store spinnakers dry, loosely packed in their bag, and shielded from UV light.</p>
        <p>For sails with adjustable battens, release the batten tension before storage.</p>
        <p>Roll battened sails parallel to the battens to prevent permanent twists whenever possible.</p>
        <p>Avoid hoisting sails and leaving them flapping for long periods.</p>
        <p>Occasionally rinse both laminate and woven Dacron sails with fresh water.</p>
        <p>Avoid drying a wet sail by hoisting it or allowing it to flap.</p>
        <p>Never clean sails in a chlorinated swimming pool</p>
        <p>Avoid using solvents or cleaning agents on sails unless guided by a professional.</p>

        <h4 class="series-cloth">If you have any questions, contact your local Ullman Sails loft.</h4>
        <h4 class="series-cloth">The care requirements for your sail may vary based on the material, so be sure to follow the appropriate steps for optimal maintenance.</h4>
      </div>
      <figure class="series-image">
        <img
          src="../SailCare/7.type/img/type2.jpg"
          alt="Endurance Series cruising sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

    </div>
  </section>

  <!-- Keelboat and Multihull Racing Sails -->
  <section class="series-section" data-sr-reveal aria-labelledby="series-title-voyager" id="Keelboat_Sails">
    <div class="series-container">
      <figure class="series-image">
        <img
          src="../SailCare/7.type/img/type3.jpg"
          alt="Voyager Series cruising sails"
          loading="lazy"
          decoding="async"
        />
      </figure>

      <div class="series-text">
        <h3 class="series-code">Keelboat and Multihull Racing Sails</h3><br>
        <h4 class="series-tagline">Caring for these sail types requires more attention. Protect them from UV exposure, avoid repeated folding in the same areas, and store properly to prevent damage. Regular maintenance is essential for maintaining optimal performance.</h4> <br>
        <p>Flake mainsails neatly onto the boom for storage.</p>
        <p>When stored on the boom, a quality cover will protect the mainsail from UV exposure, ensuring the entire sail, including the clew and luff, is covered.</p>
        <p>Keep the boom cover in place until you can hoist the mainsail.</p>
        <p>Store headsails dry and neatly flaked in their bags.</p>
        <p>Avoid repeatedly flaking sails on the same fold line to prevent wear.</p>
        <p>Store spinnakers dry, loosely packed in their bag or "turtle."</p>
        <p>Release batten tension for storage if your sails have adjustable battens.</p>
        <p>Avoid storing sails on deck or the dock unless they are under UV-protective covers.</p>
        <p>Do not crush sails stored below by walking on them.</p>
        <p>On windy days, hoist sails gradually to avoid full wind strength.</p>
        <p>Tension leech lines sufficiently to prevent the sail's edge from fluttering.</p>
        <p>Avoid over-tensioning the luff; adjust headsail luff tension in the pre-start rather than keeping it fully tensioned.</p>
        <p>Use sails within their designed wind range.</p>
        <p>Practice mainsail reefing regularly so it can be done quickly to prevent flogging.</p>
        <p>For slab-reefing mainsails, ensure the reefed portion is securely fastened, and avoid testing the sail with unsecured reefing, which can cause damage.</p>

        <h4 class="series-cloth">If you have any questions, contact your local Ullman Sails loft.</h4> <br>
        <h4 class="series-cloth">The care requirements for your sail may vary based on the material, so be sure to follow the appropriate steps for optimal maintenance.</h4>


      </div>
    </div>
  </section>



</div>

<script defer src="../SailCare/7.type/type.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
