<!-- SAIL HANDLING AND SAIL ACCESSORIES -->
<?php
$cssFile    = __DIR__ . '/sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.css';
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
?>

<link rel="stylesheet"
      href="sail_handling_and_sail_accessories/sail_handling_and_sail_accessories.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

      <section class="sail_handling_and_sail_accessories" aria-labelledby="shsa-title">
        <div class="shsa-wrap">

          <!-- Header (centrado) -->
          <header class="shsa-header">
            <p class="shsa-label">Navigator Series</p>
            <h2 id="shsa-title" class="shsa-title">Handling systems</h2>
            <p class="shsa-subtitle">
              Sailmakers customise hardware and finishing to fit your furling unit or other handling systems—so your sails hoist,
              reef, and deploy smoothly in real cruising conditions.
            </p>
          </header>

          <!-- “Filter” visual (no funcional, como en la imagen) -->
          <div class="shsa-filter" aria-hidden="true">
            <button class="shsa-filter-btn" type="button">
              All systems
              <span class="shsa-chevron" aria-hidden="true">▾</span>
            </button>
          </div>

          <!-- List -->
          <div class="shsa-list" role="list">
            <!-- item 1 -->
            <article class="shsa-item" role="listitem">
              <div class="shsa-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" class="shsa-svg" aria-hidden="true">
                  <path d="M6 20h12M8 18V4h8v14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M9 7h6M9 10h6M9 13h6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>

              <div class="shsa-content">
                <p class="shsa-category">Compatibility</p>
                <h3 class="shsa-item-title">Furling-unit-ready finishing</h3>
                <p class="shsa-item-desc">
                  Details and hardware are specified to suit your furler for consistent roll, clean UV protection, and reliable
                  handling over time.
                </p>
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
                <p class="shsa-category">Hardware</p>
                <h3 class="shsa-item-title">Custom slides, hanks & attachments</h3>
                <p class="shsa-item-desc">
                  Choose the right connection method for your rig—matched to your track, foil, and preferred hoisting and reefing
                  routine.
                </p>
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
                <p class="shsa-category">Control</p>
                <h3 class="shsa-item-title">Reefing and trim support</h3>
                <p class="shsa-item-desc">
                  Reef points, reinforcement, and practical trim aids that reduce workload and help you keep an efficient sail
                  shape across changing conditions.
                </p>
                <p class="shsa-author">Ullman Sails</p>
              </div>
            </article>

          </div>

        </div>
      </section>
