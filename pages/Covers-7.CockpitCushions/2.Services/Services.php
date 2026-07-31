<?php
$cssFile = __DIR__ . '/../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile)  ? filemtime($jsFile)  : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">
    <div class="services__layout">

      <div class="services__copy">

        <h1 id="services-title" class="services__title sr-item">Cockpit Cushions</h1>

        <p class="services__lead sr-item">
          Cockpit cushions bring a new level of comfort to your sailing experience, transforming
          hard seating into inviting relaxation zones. Crafted from high-density foam and covered
          in marine fabric, these cushions are designed for long-lasting durability in the harshest
          sea environments. Whether you're cruising long distances or enjoying a quiet evening in port,
          good cushions make a huge difference. The materials used are typically UV resistant and
          waterproof, ensuring that the colours and quality remain intact over time. This
          means they won’t fade or degrade under strong sun or salt spray. Every serious cruiser knows
          that seating comfort is essential.
        </p>

        <p class="services__lead sr-item">
          One of the key features is the non-slip backing, which keeps the cushions in place even when
          the boat is heeling or rocking. This adds not only convenience but safety when moving around
          the cockpit. Many modern cockpit cushions also come with removable covers, making them easy
          to clean after salty or wet adventures. Designed to match the boat’s aesthetics, they also
          enhance the style of your vessel. Whether in port or under sail, they create a welcoming
          outdoor space for dining, lounging, or planning your next leg. Functional and stylish,
          they are more than a luxury — they’re practical gear.
        </p>

        <p class="services__lead sr-item">
          These cushions are not just for show — they provide durable, ergonomic support for those
          long hours on the helm or lounging under the sprayhood. Thanks to high-quality foam,
          they hold their shape over time and resist flattening. Some even feature dual-density
          foam for added support and softness in the right areas. The marine fabric is mildew-resistant
          and quick-drying, perfect for wet weather or salty conditions. A good set of cockpit cushions
          can turn your boat into a floating living room. And when not in use, they’re easy to stack and stow.
        </p>

        <p class="services__lead sr-item">
          Fun fact: The concept of cockpit cushions was inspired by classic yacht lounges — early sailors
          stitched wool and cotton by hand before waterproof, UV-resistant materials revolutionised their
          use. Now, even custom-stitched embroidery is common for cruisers who want comfort with a touch of
          personal flair.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--cockpitcushions sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
