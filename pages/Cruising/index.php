<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>
    <style media="screen">
      body{
        margin: 0px;
        padding: 0px;
        font-family: 'Poppins', sans-serif;
        background-color: #F8F8FA;
      }
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }


      h2 {
        color: #111C42;
        font-size: 2em;
      }

      h4 {
        color: #111C42;
        font-size: 1em;
        font-weight: 500;
      }

    </style>
    <?php include "../general/menu/menu.php" ?>

    <div id="searchHide" class="searchHide">
      <?php // include "navigation/navigation.php"; ?>
      <?php include "../Cruising/new_sail_quote/new_sail_quote.php"; ?>

      <?php include "../general/arrows_up_down/arrows_up_down.php" ?>
      <?php include "navigation/navigation.php" ?>


      <?php include "cruising_section/cruising_section.php" ?>
      <?php include "sail_types_section/sail_types_section.php" ?>
      <?php include "series_section/series_section.php" ?>



    <?php //include "2.Services/Services.php" ?>
    </div>
    <?php include "../general/charging/charging.php"; ?>



    <div id="searchContent" class="searchContent">
    </div>
    <?php include "../general/footer/Footer.php" ?>
    <script type="text/javascript">
    // Función para manejar el scroll suave y respuesta rápida
        let isScrolling = false;
        let velocity = 0;
        let previousY = 0;

        function handleScroll() {
        if (!isScrolling) {
          requestAnimationFrame(() => {
            const currentY = window.scrollY;
            const deltaY = currentY - previousY;

            // Agregar aceleración
            velocity += deltaY * 0.05;
            // Aplicar desaceleración gradual
            velocity *= 0.0;

            window.scrollBy(0, velocity);

            previousY = currentY;
            isScrolling = false;
          });
        }
        }
    </script>


  </body>

</html>
