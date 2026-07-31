class Menu {
  constructor({ breakpointPx = 1280, bottomThresholdPx = 8, minScrollDeltaPx = 6, minGapPx = 10 } = {}) {
    this.bp = breakpointPx;
    this.bottomT = bottomThresholdPx;
    this.minDelta = minScrollDeltaPx;
    this.minGap = minGapPx;

    this.lastY = Math.max(0, window.scrollY || 0);
    this.navHidden = false;
    this.rafL = 0;
    this.rafS = 0;
    this.currentWord = "";

    const $ = id => document.getElementById(id);

    this.wrap = $("menuContainer");
    this.header = $("mainMenu");

    this.brand = this.header?.querySelector(".ull-nav__brand");
    this.desktop = this.header?.querySelector(".ull-nav__desktop");
    this.list = $("navList") || this.header?.querySelector(".ull-nav__list");
    this.actions = this.header?.querySelector(".ull-nav__actions");

    this.openBtn = $("openMenuMobile");
    this.closeBtn = $("closeMenuMobile");
    this.overlay = $("menuMobileBackground");
    this.drawer = $("menuMobile");

    this.searchForm = $("searchForm");
    this.searchIconBtn = $("searchIconBtn");
    this.searchInput = $("searchInput");
    this.searchResults = $("searchResults");

    this.searchFormMobile = $("searchFormMobile");
    this.searchInputMobile = $("searchInputMobile");

    this.pagesData = window.pagesData || [];

    this.init();
  }

  async init() {
    if (!this.wrap || !this.header) return;


    this.searchInput?.addEventListener("input", async () => {
      const word = this.searchInput.value.trim().toLowerCase();
      this.currentWord = word;

      if (word === "") {
        this.clearResults();
        return;
      }

      await this.buildSearchText();

      const results = this.pagesData.filter((page) => {
        return (
          page.title.toLowerCase().includes(word) ||
          page.category.toLowerCase().includes(word) ||
          page.path.toLowerCase().includes(word) ||
          page.url.toLowerCase().includes(word) ||
          page.text?.toLowerCase().includes(word)
        );
      });

      const uniqueResults = this.removeDuplicateUrls(results);

      if (uniqueResults.length === 0) {
        this.clearResults();
        return;
      }

      this.drawResults(uniqueResults);
    });


    this.searchInputMobile?.addEventListener("input", async () => {
      const word = this.searchInputMobile.value.trim().toLowerCase();
      this.currentWord = word;

      if (word === "") {
        this.clearResultsMobile();
        return;
      }

      await this.buildSearchText();

      const results = this.pagesData.filter((page) => {
        return (
          page.title.toLowerCase().includes(word) ||
          page.category.toLowerCase().includes(word) ||
          page.path.toLowerCase().includes(word) ||
          page.url.toLowerCase().includes(word) ||
          page.text?.toLowerCase().includes(word)
        );
      });

      const uniqueResults = this.removeDuplicateUrls(results);

      if (uniqueResults.length === 0) {
        this.clearResultsMobile();
        return;
      }

      this.drawResultsMobile(uniqueResults);
    });

    this.openBtn?.addEventListener("click", () => this.setDrawer(true));
    this.closeBtn?.addEventListener("click", () => this.setDrawer(false));
    this.overlay?.addEventListener("click", () => this.setDrawer(false));

    this.searchForm?.addEventListener("click", () => {
      if (!this.isMobile()) this.setSearch(true);
    });

    this.searchIconBtn?.addEventListener("click", (e) => {
      if (this.isMobile()) return;

      e.preventDefault();
      e.stopPropagation();

      this.setSearch(!this.searchForm.classList.contains("is-open"));
      this.requestLayout();
    });

    document.addEventListener("click", (e) => {
      if (!this.isMobile() && !this.searchForm?.contains(e.target)) {
        this.setSearch(false);
      }
    });

    this.searchForm?.addEventListener("submit", (e) => this.onSearchSubmit(e, false));
    this.searchFormMobile?.addEventListener("submit", (e) => this.onSearchSubmit(e, true));

    window.addEventListener("keydown", (e) => {
      if (e.key !== "Escape") return;

      this.setDrawer(false);
      this.setSearch(false);
    });

    window.addEventListener("scroll", () => this.onScrollRaf(), { passive: true });
    window.addEventListener("resize", () => this.requestLayout(), { passive: true });

    if ("ResizeObserver" in window) {
      this.ro = new ResizeObserver(() => this.requestLayout());
      this.ro.observe(this.header);
    }

    document.fonts?.ready?.then(() => this.requestLayout()).catch(() => {});

    this.setupAccordions();
    this.setDrawer(false);
    this.setSearch(false);
    this.requestLayout(true);
  }

  async getPageText(url) {
    const response = await fetch(url);
    const html = await response.text();
    const doc = new DOMParser().parseFromString(html, "text/html");

    doc.querySelectorAll(`
      #menuContainer,
      #footer_container,
      style,
      script,
      link,
      noscript
    `).forEach((el) => el.remove());

    return doc.querySelector("main")?.innerText.trim() || doc.body.innerText.trim();
  }

  async buildSearchText() {
    for (const page of this.pagesData) {
      if (!page.text) {
        page.text = await this.getPageText(page.url);
      }
    }
  }

  escapeRegExp(text) {
    return text.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
  }

  highlightTypedText(text, searchText) {
    if (!text || !searchText) return text;

    const cleanSearch = searchText.trim();

    if (!cleanSearch) return text;

    const regex = new RegExp(`(${this.escapeRegExp(cleanSearch)})`, "gi");

    return text.replace(regex, `<mark class="ull-search-results__highlight">$1</mark>`);
  }

  getTextSnippet(text, searchText) {
    if (!text || !searchText) return "";

    const cleanText = text.replace(/\s+/g, " ").trim();
    const cleanSearch = searchText.trim().toLowerCase();

    const textWords = cleanText.split(" ");
    const searchWords = cleanSearch.split(/\s+/).filter(Boolean);

    const index = textWords.findIndex((_, i) => {
      const phrase = textWords
        .slice(i, i + searchWords.length)
        .join(" ")
        .toLowerCase();

      return phrase.includes(cleanSearch);
    });

    if (index === -1) return "";

    const start = Math.max(0, index - 3);
    const end = Math.min(textWords.length, index + searchWords.length + 3);

    const snippet = textWords.slice(start, end).join(" ");

    return this.highlightTypedText(snippet, searchText);
  }

  removeDuplicateUrls(results) {
    const urls = new Set();

    return results.filter((page) => {
      if (urls.has(page.url)) return false;

      urls.add(page.url);
      return true;
    });
  }

  drawResults(results) {
    if (!this.searchResults) return;

    this.searchResults.style.display = "block";

    this.searchResults.innerHTML = `
      <p class="ull-search-results__title">Search results</p>
    `;

    results.forEach((page) => {
      const snippet = this.getTextSnippet(page.text, this.currentWord);

      this.searchResults.innerHTML += `
        <a class="ull-search-results__item" href="${page.url}">
          <span class="ull-search-results__name">Page: ${page.title}</span>
          <span class="ull-search-results__desc">${snippet || page.category}</span>
        </a>
      `;
    });
  }

  clearResults() {
    if (!this.searchResults) return;

    this.searchResults.innerHTML = "";
    this.searchResults.style.display = "none";
  }

  drawResultsMobile(results) {
    const searchResultsMobile = document.getElementById("searchResultsMobile");

    if (!searchResultsMobile) return;

    searchResultsMobile.style.display = "block";

    searchResultsMobile.innerHTML = `
      <p class="ull-search-results-mobile__title">Search results</p>
    `;

    results.forEach((page) => {
      const snippet = this.getTextSnippet(page.text, this.currentWord);

      searchResultsMobile.innerHTML += `
        <a class="ull-search-results-mobile__item" href="${page.url}">
          <span class="ull-search-results-mobile__name">Page: ${page.title}</span>
          <span class="ull-search-results-mobile__desc">${snippet || page.category}</span>
        </a>
      `;
    });
  }
  clearResultsMobile() {
    const searchResultsMobile = document.getElementById("searchResultsMobile");

    if (!searchResultsMobile) return;

    searchResultsMobile.innerHTML = "";
    searchResultsMobile.style.display = "none";
  }

  onSearchSubmit(e, isMobile) {
    e.preventDefault();

    const firstResult = this.searchResults?.querySelector(".ull-search-results__item");

    if (firstResult) {
      window.location.href = firstResult.getAttribute("href");
    }

    if (isMobile) this.setDrawer(false);
  }

  vw() {
    const w = window.innerWidth || 0;
    const cw = document.documentElement?.clientWidth || 0;

    return cw ? Math.min(w || cw, cw) : w;
  }

  isMobile() {
    return this.wrap.classList.contains("is-mobile");
  }

  isOverflown() {
    if (!this.header || !this.brand || !this.desktop || !this.actions) return false;

    const hw = this.header.clientWidth;

    if (!hw) return false;

    const cs = getComputedStyle(this.header);

    const usable = Math.max(
      0,
      hw - (parseFloat(cs.paddingLeft) || 0) - (parseFloat(cs.paddingRight) || 0)
    );

    const navW = this.list?.scrollWidth || this.desktop.scrollWidth || 0;
    const safe = 24;
    const required = this.brand.offsetWidth + navW + this.actions.offsetWidth + this.minGap + safe;

    if (required > usable) return true;

    if (!this.isMobile() && this.list) {
      const nr = this.list.getBoundingClientRect();
      const ar = this.actions.getBoundingClientRect();
      const gap = ar.left - nr.right;

      if (gap < this.minGap) return true;
    }

    return false;
  }

  shouldMobile() {
    return this.vw() <= this.bp || this.isOverflown();
  }

  requestLayout(immediate = false) {
    if (immediate) return this.syncLayout();

    if (this.rafL) return;

    this.rafL = requestAnimationFrame(() => {
      this.rafL = 0;
      this.syncLayout();
    });
  }

  syncLayout() {
    const next = this.shouldMobile();
    const cur = this.isMobile();

    if (next !== cur) {
      this.wrap.classList.toggle("is-mobile", next);
      this.setSearch(false);

      if (!next) this.setDrawer(false);
    }

    if (!this.isMobile()) this.setDrawer(false);
  }

  setDrawer(open) {
    if (!this.isMobile()) open = false;

    this.wrap.classList.toggle("is-drawer-open", open);
    this.drawer?.classList.toggle("is-open", open);
    document.body.classList.toggle("is-drawer-open", open);

    this.drawer?.setAttribute("aria-hidden", open ? "false" : "true");
    this.overlay?.setAttribute("aria-hidden", open ? "false" : "true");
    this.openBtn?.setAttribute("aria-expanded", open ? "true" : "false");
    this.closeBtn?.setAttribute("aria-expanded", open ? "true" : "false");
  }

  setSearch(open) {
    if (!this.searchForm || !this.header) return;

    if (this.isMobile()) open = false;

    const isOpen = this.searchForm.classList.contains("is-open");

    if (open === isOpen) return;

    this.searchForm.classList.toggle("is-open", open);
    this.header.classList.toggle("is-search-open", open);

    open ? setTimeout(() => this.searchInput?.focus(), 0) : this.searchInput?.blur();
  }

  setupAccordions() {
    if (!this.drawer) return;

    this.drawer.querySelectorAll("[data-acc]").forEach((btn) => {
      btn.addEventListener("click", () => {
        const key = btn.getAttribute("data-acc");
        const panel = this.drawer.querySelector(`[data-panel="${key}"]`);

        if (!panel) return;

        const willOpen = !panel.classList.contains("is-open");

        this.drawer.querySelectorAll(".ull-drawer__panel.is-open").forEach((p) => {
          p.classList.remove("is-open");
        });

        this.drawer.querySelectorAll("[data-acc][aria-expanded='true']").forEach((b) => {
          b.setAttribute("aria-expanded", "false");
        });

        panel.classList.toggle("is-open", willOpen);
        btn.setAttribute("aria-expanded", willOpen ? "true" : "false");
      });
    });
  }

  onScrollRaf() {
    if (this.rafS) return;
  }

  setNavHidden(hidden) {
    this.navHidden = hidden;
    this.header.classList.toggle("is-hidden", hidden);
    this.wrap.classList.toggle("is-nav-hidden", hidden);
  }

  atBottom(y) {
    const d = document.documentElement;
    const sh = Math.max(d.scrollHeight, document.body.scrollHeight);

    return y + window.innerHeight >= sh - this.bottomT;
  }

  onScroll() {
    const y = Math.max(0, window.scrollY || 0);
    const delta = y - this.lastY;

    if (Math.abs(delta) < this.minDelta) return;

    if (this.atBottom(y)) {
      if (this.navHidden) this.setNavHidden(false);
      this.lastY = y;
      return;
    }

    if (y <= window.innerHeight) {
      if (this.navHidden) this.setNavHidden(false);
      this.lastY = y;
      return;
    }

    if (delta > 0) {
      if (!this.navHidden) this.setNavHidden(true);
    } else {
      if (this.navHidden) this.setNavHidden(false);
    }

    this.lastY = y;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new Menu({
    breakpointPx: 1280,
    minGapPx: 10
  });
});
