class SearchPage {
  constructor() {
    this.searchField = document.getElementById("searchField");
    this.resultsContainer = document.getElementById("resultsContainer");
    this.emptyState = document.getElementById("emptyState");
    this.searchStatus = document.getElementById("searchStatus");
    this.clearSearch = document.getElementById("clearSearch");

    this.pagesData = [
      {
        title: "Ullman Sails Home",
        category: "Main Page",
        path: "/home",
        url: "#",
        text: "Discover Ullman Sails, performance craftsmanship, custom sail solutions and premium sailing services."
      },
      {
        title: "Cruising Sails",
        category: "Sail Types",
        path: "/cruising-sails",
        url: "#",
        text: "Explore cruising sails designed for comfort, durability and dependable sailing performance."
      },
      {
        title: "Racing Sails",
        category: "Sail Types",
        path: "/racing-sails",
        url: "#",
        text: "High-performance racing sails built for speed, responsiveness and competitive sailing conditions."
      },
      {
        title: "Navigator Series",
        category: "Series",
        path: "/navigator-series",
        url: "#",
        text: "The Navigator Series is designed for coastal cruising and day sailing with durable custom construction."
      },
      {
        title: "Endurance Series",
        category: "Series",
        path: "/endurance-series",
        url: "#",
        text: "The Endurance Series offers strength and reliability for sailors looking for long-lasting sail performance."
      },
      {
        title: "Voyager Series",
        category: "Series",
        path: "/voyager-series",
        url: "#",
        text: "Voyager Series sails are made for serious cruising sailors seeking balance, quality and dependable handling."
      },
      {
        title: "Expedition Series",
        category: "Series",
        path: "/expedition-series",
        url: "#",
        text: "Expedition Series sails are crafted for offshore conditions and demanding adventures at sea."
      },
      {
        title: "Covers",
        category: "Services",
        path: "/covers",
        url: "#",
        text: "Find custom covers for marine protection, quality finishing and tailored solutions for your boat."
      },
      {
        title: "Sail Repair",
        category: "Services",
        path: "/sail-repair",
        url: "#",
        text: "Professional sail repair services to restore performance, improve durability and extend sail life."
      },
      {
        title: "New Sail Quote",
        category: "Quote",
        path: "/new-sail-quote",
        url: "#",
        text: "Request a new sail quote by providing your sailing details, boat information and sail requirements."
      }
    ];

    this.init();
  }

  init() {




    if (!this.searchField || !this.resultsContainer || !this.emptyState || !this.searchStatus || !this.clearSearch) {
      console.error("SearchPage: One or more elements were not found.");
      return;
    }
      this.searchField.addEventListener("input", () => {
      //  alert(this.searchField.value);

        this.renderResults(this.searchField.value);
      });



    this.clearSearch.addEventListener("click", () => {
      this.resetSearch();
    });
  }

  escapeRegExp(value) {
    return value.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
  }

  highlightText(text, query) {
    if (!query.trim()) return text;

    const safeQuery = this.escapeRegExp(query);
    const regex = new RegExp(`(${safeQuery})`, "gi");

    return text.replace(regex, "<mark>$1</mark>");
  }

  filterResults(query) {
    const cleanQuery = query.trim().toLowerCase();

    if (!cleanQuery) {
      return [];
    }

    return this.pagesData.filter((item) => {
      return (
        item.title.toLowerCase().includes(cleanQuery) ||
        item.category.toLowerCase().includes(cleanQuery) ||
        item.path.toLowerCase().includes(cleanQuery) ||
        item.text.toLowerCase().includes(cleanQuery)
      );
    });
  }

  createResultCard(item, query) {
    return `
      <article class="result-card">
        <div class="result-card__top">
          <span class="result-card__category">${item.category}</span>
          <span class="result-card__path">${item.path}</span>
        </div>

        <h2 class="result-card__title">
          ${this.highlightText(item.title, query)}
        </h2>

        <p class="result-card__text">
          ${this.highlightText(item.text, query)}
        </p>

        <a class="result-card__link" href="${item.url}">
          View page
          <span aria-hidden="true">→</span>
        </a>
      </article>
    `;
  }

  renderResults(query) {
    const results = this.filterResults(query);

    this.resultsContainer.innerHTML = "";

    if (!query.trim()) {
      this.emptyState.classList.add("is-hidden");
      this.searchStatus.textContent = "Type a word to begin your search.";
      return;
    }

    if (results.length === 0) {
      this.emptyState.classList.remove("is-hidden");
      this.searchStatus.textContent = `No results for "${query}".`;
      return;
    }

    this.emptyState.classList.add("is-hidden");

    this.resultsContainer.innerHTML = results
      .map((item) => this.createResultCard(item, query))
      .join("");

    this.searchStatus.textContent = `${results.length} result${results.length > 1 ? "s" : ""} found for "${query}".`;
  }

  resetSearch() {
    this.searchField.value = "";
    this.resultsContainer.innerHTML = "";
    this.emptyState.classList.add("is-hidden");
    this.searchStatus.textContent = "Type a word to begin your search.";
    this.searchField.focus();
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new SearchPage();
});
