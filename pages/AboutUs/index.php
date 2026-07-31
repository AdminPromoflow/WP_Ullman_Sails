<?php
declare(strict_types=1);

$aboutUsCss = __DIR__ . '/style.css';
$aboutUsCssVersion = is_file($aboutUsCss) ? filemtime($aboutUsCss) : time();
$aboutUsUrl = get_template_directory_uri() . '/pages/AboutUs';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="<?php echo esc_url($aboutUsUrl . '/style.css?v=' . $aboutUsCssVersion); ?>">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body class="aboutUs">
    <?php include __DIR__ . '/../general/arrows_up_down/arrows_up_down.php'; ?>
    <?php include __DIR__ . '/../general/menu/menu.php'; ?>
    <?php include __DIR__ . '/navigation/navigation.php'; ?>
    <?php include __DIR__ . '/seccion/AboutUs.php'; ?>
    <?php include __DIR__ . '/../general/charging/charging.php'; ?>
    <?php include __DIR__ . '/../general/footer/Footer.php'; ?>
  </body>

</html>
