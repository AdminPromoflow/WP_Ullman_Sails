<?php
$cssFile = __DIR__ . '/../../Covers/2.Services/Services.css';
$jsFile  = __DIR__ . '/../../Covers/2.Services/Services.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVer  = is_file($jsFile) ? filemtime($jsFile) : null;
?>

<link rel="stylesheet" href="../Covers/2.Services/Services.css<?= $cssVer ? '?v='.$cssVer : '' ?>">
<script defer src="../Covers/2.Services/Services.js<?= $jsVer ? '?v='.$jsVer : '' ?>"></script>

<section class="services services--single" aria-labelledby="services-title" data-sr-reveal>
  <div class="services__inner">
    <div class="services__layout">

      <div class="services__copy">

        <h1 id="services-title" class="services__title sr-item">Winter Cover</h1>

        <p class="services__lead sr-item">
          A winter cover is a vital piece of equipment for boat owners preparing for storage during
          the cold season. Designed for full protection, it shields your cruising sailboat from snow,
          ice, rain, and freezing winds. These heavy-duty, cold-resistant covers are made from waterproof
          marine-grade fabric, ensuring durability throughout the harshest winter months. Proper
          ventilation flaps help prevent condensation from forming underneath. This is key for mould
          prevention, preserving your deck, canvas, and rigging. Investing in a quality winter cover
          can significantly reduce spring maintenance work.
        </p>

        <p class="services__lead sr-item">
          Cruising sailors often leave their boats idle during winter, making complete storage
          protection essential. A winter cover protects not only the deck but also sensitive
          areas like hatches, winches, and cockpit gear. Its full protection design often extends
          down the hull sides, creating a barrier against freezing conditions and UV degradation
          alike. Snow accumulation on exposed decks can add stress to structural elements,
          especially on older boats. Cold-resistant materials help ensure the cover remains
          flexible and doesn’t crack or tear. It's a simple step that offers long-term boat
          care benefits.
        </p>

        <p class="services__lead sr-item">
          Many winter covers are now custom-fitted to each boat model, providing an exact,
          tight fit that prevents flapping and water ingress. Elastic hems, straps, and
          reinforced stitching are common on these heavy-duty models. While the exterior
          repels snow and ice, interior ventilation helps maintain airflow, keeping mildew
          and dampness at bay. For sailors who store their vessels outdoors, especially in northern
          climates, a winter cover can be as crucial as antifreeze. It’s about protecting your
          investment during long periods of inactivity.
        </p>

        <p class="services__lead sr-item">
          Fun fact: Well-ventilated winter covers with mildew control systems are even used in
          Scandinavian countries where boats are stored under metres of snow—proof of their
          importance in extreme conditions.
        </p>

        <div class="services__actions sr-item">
          <a class="ullman-button--primary covers-back-button" href="<?php echo esc_url(ullman_page_url('covers')); ?>">Back to covers</a>
        </div>
      </div>

      <div class="services__media services__media--wintercover sr-item" aria-hidden="true"></div>

    </div>
  </div>
</section>
