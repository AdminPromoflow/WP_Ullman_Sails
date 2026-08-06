<?php
$sailcareCss = __DIR__ . '/sailcare.css';
$sailcareJs  = __DIR__ . '/sailcare.js';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sail Care | Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../SailCare/sailcare.css?v=<?= htmlspecialchars(ullman_file_version($sailcareCss), ENT_QUOTES, 'UTF-8') ?>">
    <script defer src="../SailCare/sailcare.js?v=<?= htmlspecialchars(ullman_file_version($sailcareJs), ENT_QUOTES, 'UTF-8') ?>"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body class="sailcare-page">
    <style media="screen">
      body{
        margin: 0px;
        padding: 0px;
        font-family: 'Poppins', sans-serif;
        background-color: #F8F8FA;
        font-size: 15px;
      }
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      p {
        margin: 0 0 14px 0;
        font-size: 1.05rem;
        line-height: 1.75;
        color: rgba(15,33,64,.86);
      }
      h1 {
        color: #111C42;
        font-size: 2em;
      }
      h2 {
        color: #F2F2F2;
        font-size: 1.6em;
        font-weight: 500;
        text-align: left;
      }
      h4 {
        color: #111C42;
        font-size: 1em;
        font-weight: 500;
      }
      button {
        background-color: #111C42;
        padding: 15px;
        font-weight: bold;
        border: none;
        color: #F2F2F2;
      }
      button:hover {
        background-color: #F2F2F2;
        color: #111C42;
      }
      header {
        padding: 50px;
        background-color: aquamarine;
        text-align: center;
      }

      nav {
        display: flex;
        flex-direction: row;
        background-color:
      }

      nav a {
        color: white;
        padding: 14px 20px;
        text-decoration: none;
      }


    </style>
    <?php include __DIR__ . "/../general/menu/menu.php" ?>
    <?php include __DIR__ . "/../general/arrows_up_down/arrows_up_down.php"; ?>

    <main id="searchHide" class="searchHide">
    <?php include __DIR__ . "/../SailCare/1_slider/slider.php" ?>
    <?php include __DIR__ . "/../SailCare/navigation/navigation.php" ?>

    <?php include __DIR__ . "/../SailCare/new_sail_quote/new_sail_quote.php" ?>

    <?php include __DIR__ . "/2.Services/Services.php" ?>
    <?php include __DIR__ . "/../SailCare/3.material/material.php" ?>
    <?php include __DIR__ . "/../SailCare/4.image/image.php" ?>
    <?php include __DIR__ . "/../SailCare/5.type/type.php" ?>
    <?php include __DIR__ . "/../SailCare/6.tips/tips.php" ?>
    <?php include __DIR__ . "/../SailCare/7.type/type.php" ?>
    <?php include __DIR__ . "/../SailCare/8.FAQS/FAQS.php" ?>

    </main>
    <?php include __DIR__ . "/../general/charging/charging.php"; ?>


    <div id="searchContent" class="searchContent">
    </div>
    <?php include __DIR__ . "/../general/footer/Footer.php" ?>
  </body>

</html>
