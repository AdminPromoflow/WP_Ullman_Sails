<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>News | Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <style media="screen">
    body{
      margin: 0px;
      padding: 0px;
      font-family: 'Poppins', sans-serif;
      background-color:#F8F8FA;
      font-size: 1em;
    }
      .news{
        position: relative;
        display: grid;
        grid-template-columns: clamp(14.5rem, 17vw, 16.5rem) minmax(0, 1fr) clamp(16rem, 19vw, 18rem);
        align-items: start;
        width: 100%;
        min-height: 100vh;
        background: #f4f6f9;
      }

      .content {
        min-width: 0;
        min-height: 100vh;
        background: #f4f6f9;
      }

      .leftPanel{
        position: sticky;
        top: 0;
        height: 100vh;
        min-width: 0;
        overflow: hidden;
        background: #202E52;
        z-index: 10;
      }

      .rightPanel{
        position: sticky;
        top: 0;
        height: 100vh;
        min-width: 0;
        overflow-y: auto;
        background: #eef3f8;
        scrollbar-width: thin;
        scrollbar-color: rgba(32,46,82,.3) transparent;
      }

      .IconMenuNews{
        position: fixed;
        z-index: 30;
        display: none;
        align-items: center;
        gap: .65rem;
        left: 1rem;
        top: 5.5rem;
        min-height: 2.55rem;
        padding: .55rem .8rem;
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 2px;
        color: #ffffff;
        background: #202e52;
        box-shadow: 0 12px 30px rgba(17,28,66,.24);
        font: inherit;
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        cursor: pointer;
      }

      .IconMenuNews__bars,
      .IconMenuNews__bars::before,
      .IconMenuNews__bars::after{
        display: block;
        width: 1.15rem;
        height: 2px;
        border-radius: 2px;
        background: currentColor;
      }

      .IconMenuNews__bars{
        position: relative;
      }

      .IconMenuNews__bars::before,
      .IconMenuNews__bars::after{
        position: absolute;
        left: 0;
        content: "";
      }

      .IconMenuNews__bars::before{ top: -.36rem; }
      .IconMenuNews__bars::after{ top: .36rem; }

      .news-drawer-backdrop{
        position: fixed;
        inset: 0;
        z-index: 19;
        display: none;
        padding: 0;
        border: 0;
        background: rgba(17,28,66,.48);
        backdrop-filter: blur(3px);
        cursor: pointer;
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

      @media screen and (max-width: 1180px) {
        .news{
          grid-template-columns: clamp(14.5rem, 22vw, 16.5rem) minmax(0, 1fr);
        }

        .rightPanel{
          display: none;
        }
      }

     @media screen and (max-width: 760px) {
        .news{
          display: block;
        }

        .content{
          width: 100%;
        }

        .leftPanel{
          position: fixed;
          inset: 0 auto 0 0;
          z-index: 20;
          width: min(88vw, 23rem);
          height: 100dvh;
          visibility: hidden;
          transform: translateX(-105%);
          transition: transform .28s ease, visibility .28s ease;
          box-shadow: 18px 0 42px rgba(0, 39, 72, .28);
        }

        body.news-menu-open{
          overflow: hidden;
        }

        body.news-menu-open .leftPanel{
          visibility: visible;
          transform: translateX(0);
        }

        body.news-menu-open .news-drawer-backdrop{
          display: block;
        }

        .IconMenuNews{
          display: inline-flex;
        }
      }

      @media (prefers-reduced-motion: reduce){
        .leftPanel{ transition: none; }
      }
    </style>
    <?php include __DIR__ . "/../general/menu/menu.php" ?>
    <?php include __DIR__ . "/../general/arrows_up_down/arrows_up_down.php"; ?>

    <section class="news">

    <button id="IconMenuNews" class="IconMenuNews" type="button" aria-controls="leftPanel" aria-expanded="false">
      <span class="IconMenuNews__bars" aria-hidden="true"></span>
      Stories
    </button>

    <button id="NewsMenuBackdrop" class="news-drawer-backdrop" type="button" aria-label="Close news navigation" tabindex="-1"></button>

    <section id="leftPanel" class="leftPanel" data-home-url="<?php echo esc_url(ullman_page_url('home')); ?>">

      <?php  include __DIR__ . "/LeftPanel/LeftPanel.php" ?>
    </section>

    <main class="content" id="newsContent">
      <?php  include __DIR__ . "/Content/Content.php" ?>
    </main>
    <section class="rightPanel">
      <?php  include __DIR__ . "/RightPanel/RightPanel.php" ?>
    </section>
    <?php include __DIR__ . "/../general/charging/charging.php"; ?>


</section>
<?php include __DIR__ . "/../general/footer/Footer.php" ?>


<script type="text/javascript">
document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;
  const panel = document.getElementById("leftPanel");
  const openButton = document.getElementById("IconMenuNews");
  const closeButton = document.getElementById("IconCloseMenuNews");
  const backdrop = document.getElementById("NewsMenuBackdrop");

  function openMenu() {
    body.classList.add("news-menu-open");
    openButton?.setAttribute("aria-expanded", "true");
    window.setTimeout(() => closeButton?.focus(), 0);
  }

  function closeMenu({ returnFocus = false } = {}) {
    body.classList.remove("news-menu-open");
    openButton?.setAttribute("aria-expanded", "false");
    if (returnFocus) openButton?.focus();
  }

  openButton?.addEventListener("click", openMenu);
  closeButton?.addEventListener("click", () => closeMenu({ returnFocus: true }));
  backdrop?.addEventListener("click", () => closeMenu({ returnFocus: true }));

  panel?.querySelectorAll(".item-left-panel").forEach((link) => {
    link.addEventListener("click", () => closeMenu());
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && body.classList.contains("news-menu-open")) {
      closeMenu({ returnFocus: true });
    }
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 760) closeMenu();
  });
});
</script>
  </body>

</html>
