<?php
$servicesCssFs = __DIR__ . '/Services.css';
$servicesJsFs  = __DIR__ . '/Services.js';
$servicesUrl   = get_template_directory_uri() . '/pages/Cuising-6.BlueLineSpinnakers-Customize/2.Services';
?>

<link rel="stylesheet" href="<?php echo esc_url($servicesUrl . '/Services.css?v=' . ullman_file_version($servicesCssFs)); ?>">
<script defer src="<?php echo esc_url($servicesUrl . '/Services.js?v=' . ullman_file_version($servicesJsFs)); ?>"></script>

<section class="textblue" data-sr-reveal>

  <div class="servicesblue">
    <h1 class="sr-item">Custom Spinnaker Graphics</h1>
    <h2 class="sr-item">Want to customise your sails?</h2>

    <p class="sr-item">If you want to liven up your spinnaker, or if you have sponsors to appease, we can help you to apply any graphics you require to mainsail, headsails or spinnakers.</p>
    <p class="sr-item">All you have to do is decide what graphic you would like on your sail and send us a high res file (if you need help with this please let us know). The graphic is then painted or cut from vinyl or other suitable material and applied to your sail. The results are fantastic and they really make your boat stand out.</p>
    <p class="sr-item">Or you can get really creative and make your own custom coloured sail with our spinnaker customiser!</p>
    <p class="sr-item">Choose a colour and click the panels you want in that colour. If you make a mistake, just choose a new colour and keep clicking, or hit the clear button to start over again.</p>
    <p class="sr-item">When you are happy with your design, click the Download Spinnaker Image button at the bottom of the page. Send us the image and we can get to work on making your perfect spinnaker!</p>
    <p class="sr-item">Have fun!</p>

    <div class="buttonTitleBlue sr-item">
    <a href="<?php echo esc_url(ullman_page_url('ContactUs')); ?>"><span class="openContactUsBlueBlue">Contact us</span></a>
    </div>
  </div>
</section>
