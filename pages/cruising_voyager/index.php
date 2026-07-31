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
    </style>
  </head>
  <body>
    <?php include "../general/menu/menu.php"?>

    <?php include "../general/charging/charging.php"; ?>
    <?php include "../cruising_voyager/new_sail_quote/new_sail_quote.php"; ?>


    <?php include "../general/arrows_up_down/arrows_up_down.php" ?>

    <?php include "../cruising_voyager/0_slider/slider.php";?>
    <?php include "navigation/navigation.php"?>

    <?php include "1_introduction/introduction.php";?>
    <?php include "2_handling_and_performance/handling_and_performance.php";?>
    <?php include "3_design_and_construction/design_and_construction.php";?>
    <?php include "4_durability_and_reinforcement/durability_and_reinforcement.php";?>
    <?php include "5_cloth_and_construction/cloth_and_construction.php";?>
    <?php include "7_standard_specifications/standard_specifications.php";?>
    <?php include "6_available_upgrades/available_upgrades.php";?>
    <?php include "8_gore_tenara/introduction.php" ?>

    <?php// include "5_cloth_selection/cloth_selection.php";?>
    <?php// include "sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.php";?>
    <?php // include "gore_tenara_thread/gore_tenara_thread.php";?>
    <?php // include "engineering_for_extreme_environments/engineering_for_extreme_environments.php";?>
    <?php // include "sub_ranges_models/sub_ranges_models.php";?>



    <?php include "../general/footer/Footer.php"?>
  </body>
</html>
