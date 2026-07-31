<?php
$cssPublic = '../Search/search/search.css';
$jsPublic  = '../Search/search/search.js';

$cssFs =  '../Search/search/search.css';
$jsFs  = '../Search/search/search.js';

$cssVer = is_file($cssFs) ? filemtime($cssFs) : null;
$jsVer  = is_file($jsFs)  ? filemtime($jsFs)  : null;
?>
<link rel="stylesheet" href="<?= $cssPublic ?><?= $cssVer ? '?v='.$cssVer : '' ?>">


  <section class="search-page">
    <div class="search-page__inner">
      <div class="img-title">
        <img
          src="../cruising_navigator/1_introduction/img/ullman_sails.png"
          alt="Ullman Sails"
          decoding="async"
          width="240"
          height="72"
        >
      </div>
      <h1 id="services-title" class="covers-title">Search</h1>

      <header class="search-hero">
        <p class="search-hero__text">
          Find pages, services, sailing information and more.
        </p>
      </header>

      <div class="search-box">
        <div class="search-box__wrap">
          <svg class="search-box__icon" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M10.5 4a6.5 6.5 0 1 1 0 13a6.5 6.5 0 0 1 0-13Zm0-2a8.5 8.5 0 1 0 5.33 15.12l4.52 4.53a1 1 0 0 0 1.42-1.42l-4.53-4.52A8.5 8.5 0 0 0 10.5 2Z"/>
          </svg>

          <input
            type="text"
            id="searchField"
            class="search-box__input"
            placeholder="Search for pages, for example: Ullman Sails"
            autocomplete="off"
          >

          <button id="clearSearch" class="search-box__clear" type="button">
            Clear
          </button>
        </div>
      </div>

      <div class="search-meta">
        <p id="searchStatus" class="search-meta__status">Type a word to begin your search.</p>
      </div>

      <section class="results-section">
        <div id="resultsContainer" class="results-grid"></div>

        <div id="emptyState" class="empty-state is-hidden">
          <h2>No results found</h2>
          <p>Try another keyword related to Ullman Sails, covers, services or sail types.</p>
        </div>
      </section>

    </div>
  </section>

  <script defer src="<?= $jsPublic ?><?= $jsVer ? '?v='.$jsVer : '' ?>"></script>
