<?php
$servicesCssFs = __DIR__ . '/Services.css';
$servicesJsFs  = __DIR__ . '/Services.js';
$servicesUrl   = get_template_directory_uri() . '/pages/Racing-4.RedLineSpinnakers-Customize/2.Services';
?>

<link rel="stylesheet" href="<?php echo esc_url($servicesUrl . '/Services.css?v=' . ullman_file_version($servicesCssFs)); ?>">

<section class="textRed" data-sr-reveal>

  <div class="servicesRed">
    <h1 class="sr-item">Axia Spinnaker Colour Tool</h1>
    <h2 class="sr-item">Plan a panel-colour layout</h2>

    <p class="sr-item">Use the tool below to explore colour layouts for an Axia symmetrical or asymmetrical spinnaker, then download the concept and send it to your Ullman representative for review.</p>
    <p class="sr-item">Choose the sail type and cloth weight before colouring individual panels. The digital layout is a planning aid, not a production specification or colour-accurate proof.</p>
    <p class="sr-item">Colour availability varies by fabric type, weight and production batch, and screen colours can differ from the finished cloth. The loft must confirm the palette, material compatibility and final panel layout before an order is accepted.</p>
    <p class="sr-item">Logos or sponsor graphics require a separate technical review because the application method, added weight, location and class or rating rules may affect what is suitable.</p>

  </div>
</section>

<script defer src="<?php echo esc_url($servicesUrl . '/Services.js?v=' . ullman_file_version($servicesJsFs)); ?>"></script>
