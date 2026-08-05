
<?php
$cssFs = __DIR__ . '/Services.css';
$jsFs  = __DIR__ . '/Services.js';

$cssVer = is_file($cssFs) ? filemtime($cssFs) : time();
$jsVer  = is_file($jsFs)  ? filemtime($jsFs)  : time();
?>

<link rel="stylesheet" href="../Services-2.SailsCleaning/2.Services/Services.css?v=<?= $cssVer ?>">
<script defer src="../Services-2.SailsCleaning/2.Services/Services.js?v=<?= $jsVer ?>"></script>
<section class="text">
  <h1>Sail & Canvas Cleaning</h1>
  <p>
Professional cleaning can address dirt, salt residue, algae, mildew and some
stains on sails and marine canvas. The safe process depends on the fibre,
laminate, coating, age and condition of the item, so specialist assessment is
recommended before stain removers or protective treatments are used.
  </p>


  <div class="common_issues-container">

    <h2>Common Issues We See on Sails & Canvas</h2>
    <p>UK weather is hard on marine fabrics. From algae and mildew to salt
      crystals, rust, food spills and pollution marks, these are common sources
      of staining, retained moisture or abrasion. Cleaning advice must be matched
      to the particular sailcloth or canvas material.</p>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/green_algae_and_dilldew.png" alt="">
      <h2>GREEN ALGAE AND MILDEW</h2>
      <p>Damp storage and residue on a fabric can encourage mildew. Store items dry and arrange material-appropriate cleaning when growth or staining appears.</p>
    <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/rust_stains.png" alt="">
      <h2>RUST STAINS</h2>
      <p>Rust marks should be assessed promptly. Early professional treatment may improve the chance of reducing a stain, but complete removal cannot be guaranteed.</p>
<!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/acid_pollution.png" alt="">
      <h2>ACIDIC POLLUTION</h2>
      <p>Exhaust deposits and airborne pollution can discolour marine fabrics. Suitable cleaning may reduce the deposits, with results depending on the material and age of the stain.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/sailt_crystals.png" alt="">
      <h2>SALT CRYSTALS</h2>
      <p>Remove salt residue with the cleaning method recommended for the material. Dry salt crystals can abrade fibres and salt can retain moisture.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/food_and_beverage_stains.png" alt="">
      <h2>FOOD & BEVERAGE STAINS</h2>
      <p>Address food and drink spills promptly because mildew can grow on dirt and other residue left on a fabric.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/coatings.png" alt="">
      <h2>COATINGS</h2>
      <p>Some marine fabrics can be re-treated for water repellency after cleaning. Compatibility and application must follow the fabric and treatment manufacturer's guidance.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>
  </div>


  <div class="services-container">

    <h2>Specialist Treatments & Protective Finishes</h2>
    <p>Persistent mildew, loss of water repellency and weathered clear panels may
       need specialist treatment after cleaning. Availability, compatibility and
       expected results should be confirmed after the material has been inspected.</p>

    <div class="services-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/M5_LOG.png" alt="">
      <h2>M5 PROCESS</h2>
      <p>Specialist providers describe M5 as a cleaning and coating treatment for black-dot mildew or green algae, intended to help inhibit regrowth for up to nine months. Duration varies with use and conditions; confirm current availability with the loft.</p>
    <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="services-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/coatings.png" alt="">
      <h2>WATER-REPELLENT RE-TREATMENT</h2>
      <p>Compatible marine fabrics may benefit from a manufacturer-approved re-treatment after cleaning. It can renew water repellency, but it cannot restore structural strength or correct a worn-out sail shape.</p>
  <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="services-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/SEAVIEW_LOGO.png" alt="">
      <h2>SEAVIEW</h2>
      <p>Specialist providers offer polishing and dedicated coatings for compatible clear window panels. Suitability, expected results and price must be confirmed before treatment.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

  </div>


  <div class="how_connect">

    <h2>Matching the Issue to the Right Service</h2>

    <p>
      Think of it as a simple flow: we deal with the cause first (cleaning or stain treatment),
      then apply the most suitable protection where it adds real value. Here’s how the common
      issues link to our specialist options:
    </p>

    <div class="how_connect_cards">

      <div class="how_connect_card">
        <h4>Algae / Mildew (including black-dot mildew) → M5</h4>
        <p>
          Best when you’re seeing recurring growth, black spotting, green algae, or that damp smell that keeps coming back.
        </p>
        <p><strong>What it involves:</strong> thorough cleaning followed by an anti-fungal coating.</p>
          <p><strong>Why specify it:</strong> specialist providers state that it can help inhibit regrowth for up to nine months; this is not a fixed guarantee and depends on use and conditions.</p>
      </div>

      <div class="how_connect_card">
        <h4>Reduced water repellency → material-compatible re-treatment</h4>
        <p>
          Some canvas and sail materials can receive a new water-repellent treatment after cleaning and complete drying.
        </p>
        <p><strong>What it does:</strong> renews water shedding on compatible fabrics. It does not repair damaged fibres, laminates, stitching or sail shape.</p>
      </div>

      <div class="how_connect_card">
        <h4>Clear window panels → SEAVIEW</h4>
        <p>
          For compatible transparent panels that require professional cleaning and polishing.
        </p>
        <p><strong>What it does:</strong> specialist providers describe a dedicated clear-panel polish or coating. Results depend on the panel material and its condition.</p>
      </div>

      <div class="how_connect_card how_connect_card_wide">
        <h4>Salt / Rust / Food &amp; beverage / Pollution → Clean or treat first, then consider a coating</h4>
        <p>These are usually resolved by the correct cleaning or prompt stain treatment:</p>

        <ul>
          <li><strong>Salt crystals:</strong> removing salt prevents abrasion and reduces damp retention.</li>
          <li><strong>Rust stains:</strong> quicker treatment gives the best chance of full removal.</li>
          <li><strong>Food &amp; drink:</strong> tackling spills helps prevent mildew setting in.</li>
          <li><strong>Acidic pollution:</strong> regular cleaning helps prevent discolouration and keeps fabrics looking smart.</li>
        </ul>

        <p><strong>Afterwards:</strong> if the fabric manufacturer permits it, an appropriate re-treatment can renew water repellency after cleaning.</p>
      </div>

    </div>

  </div>

  <a class="link_contact_us" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">
    <div class="buttonTitle">
      <span class="buttonTitle__label">Contact us</span>
    </div>
  </a>
</section>
