
<?php
$cssFs = __DIR__ . '/../Services-2.SailsCleaning/2.Services/Services.css';
$jsFs  = __DIR__ . '/../Services-2.SailsCleaning/2.Services/Services.js';

$cssVer = is_file($cssFs) ? filemtime($cssFs) : time();
$jsVer  = is_file($jsFs)  ? filemtime($jsFs)  : time();
?>

<link rel="stylesheet" href="../Services-2.SailsCleaning/2.Services/Services.css?v=<?= $cssVer ?>">
<script defer src="../Services-2.SailsCleaning/2.Services/Services.js?v=<?= $jsVer ?>"></script>
<section class="text">
  <h1>Sail & Canvas Cleaning</h1>
  <p>
Keep your sails and canvas in top condition with professional cleaning and
targeted treatments designed for UK conditions. From algae, mildew and salt
 build-up to rust marks, food stains and pollution discolouration, we tackle
  the causes first—then apply the right protective finish where it adds real
  benefit. The result is cleaner, smarter-looking fabrics that dry better, last
  longer, and are easier to maintain season after season.
  </p>


  <div class="common_issues-container">

    <h2>Common Issues We See on Sails & Canvas</h2>
    <p>UK weather is hard on marine fabrics. From algae and mildew to salt
      crystals, rust, food spills and pollution marks, these are the everyday
      problems that can shorten fabric life and spoil the finish. Below you’ll
      find what each issue means and the right first step to keep your sails
      and canvas clean, smart, and performing as they should.</p>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/green_algae_and_dilldew.png" alt="">
      <h2>GREEN ALGAE AND MILDEW</h2>
      <p>The UK's ever changing weather conditions make it difficult to stay algae and mildew free. Maintain your fabrics with regular seasonal cleaning.</p>
    <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/rust_stains.png" alt="">
      <h2>RUST STAINS</h2>
      <p>Tip Top Sail Laundry can make fresh rust stains from fittings vanish!

Don't delay treatment of your fabrics, the longer you leave it the less likely they will fade at all.</p>
<!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/acid_pollution.png" alt="">
      <h2>ACIDIC POLLUTION</h2>
      <p>Pollution caused by exhaust fumes and powerstation chimney fall out can miscolour fabrics. A regular clean will keep them looking good as new.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/sailt_crystals.png" alt="">
      <h2>SALT CRYSTALS</h2>
      <p>Keep your fabrics salt crystal free to avoid abrasion to threads. If left to dry they will attract moisture and allow damp growth.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/food_and_beverage_stains.png" alt="">
      <h2>FOOD & BEVERAGE STAINS</h2>
      <p>Avoid mildew growth by keeping on top of food and beverage stains.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="common_issues-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/coatings.png" alt="">
      <h2>COATINGS</h2>
      <p>Water repellent coatings are used with our experience to determine which product suits your fabric best.</p>
      <!--  <button type="button" name="button">Contact details</button> -->
    </div>
  </div>


  <div class="services-container">

    <h2>Specialist Treatments & Protective Finishes</h2>
    <p>Sometimes a standard clean isn’t enough. Our specialist processes are
       designed to tackle persistent problems, improve water repellency and
       handling, and enhance clear panels with a polished, rain-shedding finish.
       Choose a treatment when you want longer-lasting results and added
       protection.</p>

    <div class="services-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/M5_LOG.png" alt="">
      <h2>M5 PROCESS</h2>
      <p>Our new anti-fungal process, this involves cleaning and coating your fabric, If you suffer from black dot mildew or green algae growth, specify this service. It will prevent growth for up to 9 months</p>
    <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="services-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/SEAl_N_GLIDE_LOGO.png" alt="">
      <h2>SEAL & GLIDE</h2>
      <p>If your fabrics are soft and tired or your furling genoa or main needs to stay dryer and furl tighter, specify this treatment and see the amazing results.</p>
  <!--  <button type="button" name="button">Contact details</button> -->
    </div>

    <div class="services-box">
      <img src="../Services-2.SailsCleaning/2.Services/images/SEAVIEW_LOGO.png" alt="">
      <h2>SEAVIEW</h2>
      <p>Transparent fabrics, leave the workshop polished using our own, specifically developed 'window' coating. Watch the rain just run off as standard at no extra cost.</p>
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
        <p><strong>Why specify it:</strong> it’s designed to help prevent regrowth for up to 9 months, depending on use and conditions.</p>
      </div>

      <div class="how_connect_card">
        <h4>Poor water repellency / soft, tired fabric / furling not as tight → SEAL &amp; GLIDE</h4>
        <p>
          Ideal if your sail feels less “crisp”, holds moisture, takes longer to dry, or your furling genoa/main won’t roll
          as neatly or tightly as it should.
        </p>
        <p><strong>What it does:</strong> restores performance feel and improves water shedding, helping the sail stay drier and furl tighter.</p>
      </div>

      <div class="how_connect_card">
        <h4>Clear window panels → SEAVIEW</h4>
        <p>
          For transparent fabrics where you want a cleaner, clearer finish and better wet-weather visibility.
        </p>
        <p><strong>What it does:</strong> a dedicated “window” coating that leaves panels polished, with rain running off as standard.</p>
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

        <p><strong>Afterwards:</strong> if your fabric is suitable, a water-repellent coating can help keep it cleaner for longer and make future maintenance easier.</p>
      </div>

    </div>

  </div>

  <a class="link_contact_us" href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>">
    <div class="buttonTitle">
      <h3>Contact us</h3>
    </div>
  </a>
</section>
