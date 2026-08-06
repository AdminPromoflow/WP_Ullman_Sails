document.addEventListener("DOMContentLoaded", () => {
  const homeButton = document.getElementById("goHome");
  const logoButton = document.getElementById("logoNews");
  const panel = document.getElementById("leftPanel");
  const menuLinks = [...document.querySelectorAll(".item-left-panel[data-target]")];
  const articles = [...document.querySelectorAll(".news-card[id][data-title]")];
  const storySelect = document.getElementById("newsStorySelect");
  const status = document.querySelector(".news-reader-status");
  const previousButtons = [...document.querySelectorAll("[data-news-previous]")];
  const nextButtons = [...document.querySelectorAll("[data-news-next]")];
  const newsroom = document.querySelector(".newsroom");

  if (!articles.length) return;

  document.documentElement.classList.add("news-reader-ready");

  const indexById = new Map(articles.map((article, index) => [article.id, index]));
  let currentIndex = 0;

  function goToHome() {
    const homeUrl = panel?.dataset.homeUrl;
    if (homeUrl) window.location.href = homeUrl;
  }

  function setCurrentStory(index, options = {}) {
    const { scroll = false, updateHash = false } = options;
    const nextIndex = Math.max(0, Math.min(index, articles.length - 1));
    const activeArticle = articles[nextIndex];

    currentIndex = nextIndex;

    articles.forEach((article, articleIndex) => {
      article.hidden = articleIndex !== currentIndex;
    });

    menuLinks.forEach((link) => {
      const isActive = link.dataset.target === activeArticle.id;
      link.classList.toggle("is-active", isActive);
      link.toggleAttribute("aria-current", isActive);
    });

    if (storySelect) storySelect.value = activeArticle.id;

    if (status) {
      status.textContent = `Story ${currentIndex + 1} of ${articles.length}: ${activeArticle.dataset.title}`;
    }

    previousButtons.forEach((button) => {
      button.disabled = currentIndex === 0;
    });

    nextButtons.forEach((button) => {
      button.disabled = currentIndex === articles.length - 1;
    });

    if (updateHash) {
      history.replaceState(null, "", `#${activeArticle.id}`);
    }

    if (scroll) {
      newsroom?.scrollIntoView({
        behavior: window.matchMedia("(prefers-reduced-motion: reduce)").matches ? "auto" : "smooth",
        block: "start"
      });
    }
  }

  if (storySelect) {
    const options = document.createDocumentFragment();

    articles.forEach((article, index) => {
      const option = document.createElement("option");
      option.value = article.id;
      option.textContent = `${String(index + 1).padStart(2, "0")} — ${article.dataset.title}`;
      options.appendChild(option);
    });

    storySelect.appendChild(options);
    storySelect.addEventListener("change", () => {
      const index = indexById.get(storySelect.value);
      if (typeof index === "number") setCurrentStory(index, { scroll: true, updateHash: true });
    });
  }

  menuLinks.forEach((link) => {
    link.addEventListener("click", () => {
      const index = indexById.get(link.dataset.target);
      if (typeof index === "number") setCurrentStory(index, { scroll: true, updateHash: true });
    });
  });

  previousButtons.forEach((button) => {
    button.addEventListener("click", () => {
      setCurrentStory(currentIndex - 1, { scroll: true, updateHash: true });
    });
  });

  nextButtons.forEach((button) => {
    button.addEventListener("click", () => {
      setCurrentStory(currentIndex + 1, { scroll: true, updateHash: true });
    });
  });

  homeButton?.addEventListener("click", goToHome);
  logoButton?.addEventListener("click", goToHome);

  window.addEventListener("hashchange", () => {
    const index = indexById.get(window.location.hash.slice(1));
    if (typeof index === "number") setCurrentStory(index, { scroll: true });
  });

  const requestedIndex = indexById.get(window.location.hash.slice(1));
  setCurrentStory(typeof requestedIndex === "number" ? requestedIndex : 0);
});
