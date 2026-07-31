<?php
$baseDir = __DIR__;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Ullman Sails</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <style>
    html {
      scroll-behaviour: smooth;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #F8F8FA;
      font-size: 15px;
      overflow-x: hidden;
    }

    h1,
    h2,
    .cac-num {
      color: #005598 !important;
    }

    h3,
    .ss-num {
      color: #202E52 !important;
    }
  </style>
</head>
<body>
  <?php include $baseDir . "/../general/menu/menu.php"; ?>
  <?php include $baseDir . "/../general/charging/charging.php"; ?>
  <?php include $baseDir . "/../racing_race_series/new_sail_quote/new_sail_quote.php"; ?>
  <?php include $baseDir . "/../general/arrows_up_down/arrows_up_down.php"; ?>

  <?php include $baseDir . "/../racing_race_series/0_slider/slider.php"; ?>
  <?php include $baseDir . "/navigation/navigation.php"; ?>

  <?php include $baseDir . "/1_introduction/introduction.php"; ?>
  <?php include $baseDir . "/2_handling_and_performance/handling_and_performance.php"; ?>
  <?php include $baseDir . "/3_design_and_construction/design_and_construction.php"; ?>
  <?php include $baseDir . "/4_durability_and_reinforcement/durability_and_reinforcement.php"; ?>
  <?php include $baseDir . "/5_cloth_and_construction/cloth_and_construction.php"; ?>
  <?php include $baseDir . "/7_standard_specifications/standard_specifications.php"; ?>
  <?php include $baseDir . "/6_available_upgrades/available_upgrades.php"; ?>
  <?php include $baseDir . "/racing_race_series/9_engineering_for_extreme_environments/engineering_for_extreme_environments.php"; ?>
  <?php include $baseDir . "/../general/footer/Footer.php"; ?>


  <?php // include $baseDir . "/5_cloth_selection/cloth_selection.php"; ?>
  <?php // include $baseDir . "/sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.php"; ?>
  <?php // include $baseDir . "/gore_tenara_thread/gore_tenara_thread.php"; ?>
  <?php // include $baseDir . "/engineering_for_extreme_environments/engineering_for_extreme_environments.php"; ?>
  <?php // include $baseDir . "/sub_ranges_models/sub_ranges_models.php"; ?>
</body>
</html>
