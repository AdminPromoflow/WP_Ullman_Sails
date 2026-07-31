<!-- SAIL HANDLING AND SAIL ACCESSORIES -->
<link rel="stylesheet"
      href="../Sails-Types-Example/sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.css?v=<?= filemtime(__DIR__ . '/../Sails-Types-Example/sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.css'); ?>">

<section class="sail_handling_and_sail_accessories" aria-labelledby="shsa-title">
  <div class="shsa-wrap">

    <!-- Header (centrado) -->
    <header class="shsa-header">
      <p class="shsa-label">Sail handling</p>
      <h2 id="shsa-title" class="shsa-title">Sail handling and sail accessories</h2>
      <p class="shsa-subtitle">Options that make sailing easier, safer, and more efficient.</p>
    </header>

    <!-- “Filter” visual (no funcional, como en la imagen) -->
    <div class="shsa-filter" aria-hidden="true">
      <button class="shsa-filter-btn" type="button">
        All options
        <span class="shsa-chevron" aria-hidden="true">▾</span>
      </button>
    </div>

    <!-- List -->
    <div class="shsa-list" role="list">
      <!-- item 1 -->
      <article class="shsa-item" role="listitem">
        <div class="shsa-icon" aria-hidden="true">
          <!-- icono (sin imágenes) -->
          <svg viewBox="0 0 24 24" class="shsa-svg" aria-hidden="true">
            <path d="M6 20h12M8 18V4h8v14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M9 7h6M9 10h6M9 13h6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </div>

        <div class="shsa-content">
          <p class="shsa-category">Accessories</p>
          <h3 class="shsa-item-title">Tell-tales & trim guides</h3>
          <p class="shsa-item-desc">Simple visual aids to improve trimming and reduce guesswork.</p>
          <p class="shsa-author">Ullman Sails</p>
        </div>
      </article>

      <!-- item 2 -->
      <article class="shsa-item" role="listitem">
        <div class="shsa-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" class="shsa-svg" aria-hidden="true">
            <path d="M12 3v18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M7 8l5-5 5 5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7 16l5 5 5-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>

        <div class="shsa-content">
          <p class="shsa-category">Sail handling</p>
          <h3 class="shsa-item-title">Reef points & hardware</h3>
          <p class="shsa-item-desc">Hardware upgrades and reinforcement that simplify reefing under load.</p>
          <p class="shsa-author">Ullman Sails</p>
        </div>
      </article>

      <!-- item 3 -->
      <article class="shsa-item" role="listitem">
        <div class="shsa-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" class="shsa-svg" aria-hidden="true">
            <path d="M4 12c2.5-4 6-6 8-6s5.5 2 8 6c-2.5 4-6 6-8 6s-5.5-2-8-6Z" fill="none" stroke="currentColor" stroke-width="1.8"/>
            <path d="M12 9.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" fill="none" stroke="currentColor" stroke-width="1.8"/>
          </svg>
        </div>

        <div class="shsa-content">
          <p class="shsa-category">Protection</p>
          <h3 class="shsa-item-title">UV covers & chafe guards</h3>
          <p class="shsa-item-desc">Protection for high-wear zones to extend sail life in sun and salt.</p>
          <p class="shsa-author">Ullman Sails</p>
        </div>
      </article>

    </div>

  </div>
</section>
