<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<section class="textRed" data-sr-reveal>

  <div class="servicesRed">
    <h1 class="sr-item">Custom Spinnaker Graphics</h1>
    <h2 class="sr-item">Want to customize your sails?</h2>

    <p class="sr-item">If you want to liven up your spinnaker, or if you have sponsors to appease, we can help you apply any graphics you require to mainsails, headsails, or spinnakers.</p>
    <p class="sr-item">All you have to do is decide what graphic you would like on your sail and send us a high-res file (if you need help with this, please let us know). The graphic is then painted or cut from vinyl or other suitable material and applied to your sail. The results are fantastic and really make your boat stand out.</p>
    <p class="sr-item">Or you can get really creative and make your own custom-colored sail with our spinnaker customizer!</p>
    <p class="sr-item">Choose a color and click the panels you want in that color. If you make a mistake, just choose a new color and keep clicking, or hit the clear button to start over again.</p>
    <p class="sr-item">When you are happy with your design, click the "Download Spinnaker Image" button at the bottom of the page. Send us the image and we can get to work on making your perfect spinnaker!</p>
    <p class="sr-item">Have fun!</p>

    <div class="buttonTitleRed sr-item">
      <h3 class="openContactUsRed">Contact us</h3>
    </div>
  </div>
</section>

<script defer src="2.Services/Services.js?v=<?= $introJsVersion ?>"></script>
