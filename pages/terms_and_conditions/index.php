<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../terms_and_conditions/style.css?v=<?= file_exists('../terms_and_conditions/style.css') ? filemtime('../terms_and_conditions/style.css') : time() ?>">

  </head>
  <body id="container_accessories_home">

    <?php include "../general/menu/menu.php" ?>
    <div id="searchHide" class="searchHide">
    <?php include "../general/arrows_up_down/arrows_up_down.php" ?>
    <?php include "../terms_and_conditions/navigation/navigation.php" ?>
    <?php include "../terms_and_conditions/terms_and_conditions/TermsAndConditions.php" ?>
    </div>
    <?php include "../General/Charging/charging.php"; ?>

  </body>
  <?php include "../general/footer/Footer.php" ?>


</html>
