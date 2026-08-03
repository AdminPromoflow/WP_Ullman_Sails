<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style media="screen">
    html {
      scroll-behavior: smooth;
    }
    body{
      margin: 0px;
      padding: 0px;
      font-family: 'Poppins', sans-serif;
      background-color: #F8F8FA;
      font-size: 15px;
      width: 100vw;
      overflow-x: hidden;
    }
    h1{
      color: #005598!important;
      font-size: clamp(3rem, 5vw, 6rem);
      font-weight: 600;
      max-width: 18ch;
      margin: 15px auto 20px;
    }
    h2{
      color: #005598!important;
    }
    h3{
      color: #202E52!important;
    }
    .cac-num{
      color: #005598!important;
    }
    .ss-num{
      color: #202E52!important;
    }
    :root { --series-section-subtitle: "Voyager Series"; }
    body :is(.ph-tagline, .dac-tagline, .sid-tagline, .au-tagline), body :is(.csp-title, .ss-title, .efee-title, .customize-cta__title, section.wrap > h2)::before { color: #c5234a; font-size: clamp(.68rem, .82vw, .82rem); font-weight: 600; letter-spacing: .18em; line-height: 1.3; text-align: center; text-transform: uppercase; }
    body :is(.ph-tagline, .dac-tagline, .sid-tagline, .au-tagline) { width: 100%; margin-inline: auto; text-align: center; }
    body :is(.csp-title, .ss-title, .efee-title, .customize-cta__title, section.wrap > h2)::before { display: block; margin: 0 0 .55rem; content: var(--series-section-subtitle); }
    body p:not(.sailing-types-introduction p):not(.ph-tagline):not(.dac-tagline):not(.sid-tagline):not(.au-tagline) { text-align: justify; }
    </style>
  </head>
  <body>
    <?php include __DIR__ . "/../general/menu/menu.php"?>

    <?php include __DIR__ . "/../general/charging/charging.php"; ?>
    <?php include __DIR__ . "/../cruising_voyager/new_sail_quote/new_sail_quote.php"; ?>


    <?php include __DIR__ . "/../general/arrows_up_down/arrows_up_down.php" ?>

    <?php include __DIR__ . "/../cruising_voyager/0_slider/slider.php";?>
    <?php include __DIR__ . "/navigation/navigation.php"?>

    <?php include __DIR__ . "/1_introduction/introduction.php";?>
    <?php include __DIR__ . "/2_handling_and_performance/handling_and_performance.php";?>
    <?php include __DIR__ . "/3_design_and_construction/design_and_construction.php";?>
    <?php include __DIR__ . "/4_durability_and_reinforcement/durability_and_reinforcement.php";?>
    <?php include __DIR__ . "/5_cloth_and_construction/cloth_and_construction.php";?>
    <?php include __DIR__ . "/7_standard_specifications/standard_specifications.php";?>
    <?php include __DIR__ . "/6_available_upgrades/available_upgrades.php";?>
    <?php include __DIR__ . "/8_gore_tenara/introduction.php" ?>

    <?php// include __DIR__ . "/5_cloth_selection/cloth_selection.php";?>
    <?php// include __DIR__ . "/sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.php";?>
    <?php // include __DIR__ . "/gore_tenara_thread/gore_tenara_thread.php";?>
    <?php // include __DIR__ . "/engineering_for_extreme_environments/engineering_for_extreme_environments.php";?>
    <?php // include __DIR__ . "/sub_ranges_models/sub_ranges_models.php";?>



    <?php include __DIR__ . "/../general/footer/Footer.php"?>
  </body>
</html>
