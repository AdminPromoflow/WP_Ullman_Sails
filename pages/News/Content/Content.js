document.addEventListener("DOMContentLoaded", () => {
  const storiesContainer = document.getElementById("newsStories");
  const navigationContainer = document.getElementById("newsNavigationItems");
  const storySelect = document.getElementById("newsStorySelect");
  const status = document.querySelector(".news-reader-status");
  const previousButtons = [...document.querySelectorAll("[data-news-previous]")];
  const nextButtons = [...document.querySelectorAll("[data-news-next]")];
  const newsroom = document.querySelector(".newsroom");
  const endpoint = window.ullmanAjax?.controllerUrl;

  if (!(storiesContainer instanceof HTMLElement) || !(navigationContainer instanceof HTMLElement)) return;

  let articles = [];
  let menuLinks = [];
  let indexById = new Map();
  let currentIndex = 0;

  function parseContent(content) {
    if (typeof content !== "string") return content;

    try {
      return JSON.parse(content);
    } catch (error) {
      return content;
    }
  }

  function getBlocks(story) {
    if (!Array.isArray(story?.sections)) return [];

    return story.sections
      .flatMap((section) => Array.isArray(section?.blocks) ? section.blocks : [])
      .filter((block) => block && typeof block === "object");
  }

  function getBlock(story, tag) {
    return getBlocks(story).find((block) => block.tag === tag);
  }

  function safeUrl(value) {
    if (typeof value !== "string" || !value.trim()) return "";

    try {
      const url = new URL(value, window.location.origin);
      return ["http:", "https:"].includes(url.protocol) ? url.href : "";
    } catch (error) {
      return "";
    }
  }

  function slugify(value) {
    return String(value || "story")
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .toLowerCase()
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/^-+|-+$/g, "") || "story";
  }

  function getStoryId(story, usedIds) {
    const sourceBlock = getBlock(story, "source_url");
    const sourcePayload = parseContent(sourceBlock?.content || "");
    const sourceValue = typeof sourcePayload === "string" ? sourcePayload : sourcePayload?.url;
    let candidate = "";

    if (typeof sourceValue === "string") {
      try {
        candidate = new URL(sourceValue, window.location.href).hash.slice(1);
      } catch (error) {
        candidate = "";
      }
    }

    if (!/^news-[a-z0-9-]+$/.test(candidate)) {
      candidate = `news-${slugify(story?.title)}`;
    }

    if (usedIds.has(candidate)) candidate = `${candidate}-${Number(story?.id) || usedIds.size + 1}`;
    usedIds.add(candidate);
    return candidate;
  }

  function createTextBlock(block) {
    const paragraph = document.createElement("p");
    paragraph.textContent = String(block.content || "");
    return paragraph;
  }

  function createHeadingBlock(block) {
    const heading = document.createElement("h3");
    heading.className = "news-subtitle";
    heading.textContent = String(block.content || "");
    return heading;
  }

  function createImageBlock(block, storyTitle) {
    const payload = parseContent(block.content);
    const source = safeUrl(typeof payload === "string" ? payload : payload?.src);

    if (!source) return null;

    const figure = document.createElement("figure");
    const image = document.createElement("img");
    const alt = typeof payload === "object" && payload !== null ? payload.alt : "";
    const caption = typeof payload === "object" && payload !== null ? payload.caption : "";

    figure.className = "news-media";
    image.src = source;
    image.alt = String(alt || storyTitle || "News image");
    image.loading = "lazy";
    image.decoding = "async";
    figure.append(image);

    if (caption) {
      const figcaption = document.createElement("figcaption");
      figcaption.textContent = String(caption);
      figure.append(figcaption);
    }

    return figure;
  }

  function listHeading(tag) {
    if (!tag || tag === "list") return "";

    return String(tag)
      .replace(/[_-]+/g, " ")
      .replace(/\b\w/g, (character) => character.toUpperCase());
  }

  function createListBlock(block) {
    const payload = parseContent(block.content);
    const values = Array.isArray(payload)
      ? payload
      : String(block.content || "").split(/\r?\n/);
    const items = values.map((value) => String(value).trim()).filter(Boolean);

    if (!items.length) return null;

    const fragment = document.createDocumentFragment();
    const headingText = listHeading(block.tag);

    if (headingText) {
      const heading = document.createElement("h3");
      heading.className = "news-subtitle";
      heading.textContent = headingText;
      fragment.append(heading);
    }

    const list = document.createElement("ul");
    list.className = "news-listing";

    items.forEach((value) => {
      const item = document.createElement("li");
      item.textContent = value;
      list.append(item);
    });

    fragment.append(list);
    return fragment;
  }

  function createLinkBlock(block) {
    if (block.tag === "source_url") return null;

    const payload = parseContent(block.content);
    const url = safeUrl(typeof payload === "string" ? payload : payload?.url);

    if (!url) return null;

    const paragraph = document.createElement("p");
    const link = document.createElement("a");
    const label = typeof payload === "object" && payload !== null ? payload.label : "";

    link.href = url;
    link.target = "_blank";
    link.rel = "noopener noreferrer";
    link.textContent = String(label || "Read more");
    paragraph.append(link);
    return paragraph;
  }

  function createQuoteBlock(block) {
    const quote = document.createElement("blockquote");
    quote.className = "news-quote";
    quote.textContent = String(block.content || "");
    return quote;
  }

  function createContentBlock(block, storyTitle) {
    const type = String(block.block_type || "").toLowerCase();

    if (type === "meta" || block.tag === "source_order" || block.tag === "news_tag") return null;
    if (type === "heading") return createHeadingBlock(block);
    if (type === "image") return createImageBlock(block, storyTitle);
    if (type === "list") return createListBlock(block);
    if (type === "link") return createLinkBlock(block);
    if (type === "quote") return createQuoteBlock(block);
    if (["text", "paragraph"].includes(type)) return createTextBlock(block);
    return block.content ? createTextBlock(block) : null;
  }

  function createArticle(story, storyId) {
    const article = document.createElement("article");
    const header = document.createElement("header");
    const tag = document.createElement("span");
    const title = document.createElement("h2");
    const content = document.createElement("div");
    const tagBlock = getBlock(story, "news_tag");
    let visibleBlocks = 0;

    article.className = "news-card reveal";
    article.id = storyId;
    article.dataset.title = String(story.title || "Untitled story");
    header.className = "news-card__header";
    tag.className = "news-card__tag";
    tag.textContent = String(tagBlock?.content || "News");
    title.className = "news-card__title";
    title.textContent = String(story.title || "Untitled story");
    content.className = "news-card__content";

    getBlocks(story).forEach((block) => {
      const element = createContentBlock(block, story.title);
      if (!element) return;
      content.append(element);
      visibleBlocks += 1;
    });

    if (!visibleBlocks) {
      const empty = document.createElement("p");
      empty.textContent = "This story does not have any published content yet.";
      content.append(empty);
    }

    header.append(tag, title);
    article.append(header, content);
    return article;
  }

  function createNavigationButton(story, storyId, index) {
    const button = document.createElement("button");
    const number = document.createElement("span");
    const label = document.createElement("span");

    button.type = "button";
    button.id = `link-${storyId}`;
    button.className = "item-left-panel";
    button.dataset.target = storyId;
    number.className = "item-left-panel__number";
    number.setAttribute("aria-hidden", "true");
    number.textContent = String(index + 1).padStart(2, "0");
    label.textContent = String(story.title || "Untitled story");
    button.append(number, label);
    return button;
  }

  function showMessage(message, isError = false) {
    const notice = document.createElement("div");
    const copy = document.createElement("p");

    notice.className = `newsroom__message${isError ? " is-error" : ""}`;
    copy.textContent = message;
    notice.append(copy);

    if (isError) {
      const retry = document.createElement("button");
      retry.type = "button";
      retry.className = "newsroom__retry";
      retry.textContent = "Try again";
      retry.addEventListener("click", loadNews, { once: true });
      notice.append(retry);
    }

    storiesContainer.replaceChildren(notice);
    storiesContainer.setAttribute("aria-busy", "false");
    navigationContainer.replaceChildren();
    navigationContainer.setAttribute("aria-busy", "false");

    if (status) status.textContent = message;
  }

  function setCurrentStory(index, options = {}) {
    if (!articles.length) return;

    const { scroll = false, updateHash = false } = options;
    const nextIndex = Math.max(0, Math.min(index, articles.length - 1));
    const activeArticle = articles[nextIndex];
    currentIndex = nextIndex;

    articles.forEach((article, articleIndex) => {
      article.hidden = articleIndex !== currentIndex;
      article.classList.toggle("is-visible", articleIndex === currentIndex);
    });

    menuLinks.forEach((link) => {
      const isActive = link.dataset.target === activeArticle.id;
      link.classList.toggle("is-active", isActive);
      link.toggleAttribute("aria-current", isActive);
      if (isActive) link.setAttribute("aria-current", "page");
    });

    if (storySelect instanceof HTMLSelectElement) storySelect.value = activeArticle.id;
    if (status) status.textContent = `Story ${currentIndex + 1} of ${articles.length}: ${activeArticle.dataset.title}`;

    previousButtons.forEach((button) => { button.disabled = currentIndex === 0; });
    nextButtons.forEach((button) => { button.disabled = currentIndex === articles.length - 1; });

    if (updateHash) history.replaceState(null, "", `#${activeArticle.id}`);
    if (scroll) {
      newsroom?.scrollIntoView({
        behavior: window.matchMedia("(prefers-reduced-motion: reduce)").matches ? "auto" : "smooth",
        block: "start"
      });
    }
  }

  function renderNews(stories) {
    const usedIds = new Set();
    const articleFragment = document.createDocumentFragment();
    const navigationFragment = document.createDocumentFragment();
    const selectFragment = document.createDocumentFragment();

    stories.forEach((story, index) => {
      const storyId = getStoryId(story, usedIds);
      const article = createArticle(story, storyId);
      const navigationButton = createNavigationButton(story, storyId, index);
      const option = document.createElement("option");

      option.value = storyId;
      option.textContent = `${String(index + 1).padStart(2, "0")} — ${story.title || "Untitled story"}`;
      articleFragment.append(article);
      navigationFragment.append(navigationButton);
      selectFragment.append(option);
    });

    storiesContainer.replaceChildren(articleFragment);
    navigationContainer.replaceChildren(navigationFragment);
    storiesContainer.setAttribute("aria-busy", "false");
    navigationContainer.setAttribute("aria-busy", "false");

    if (storySelect instanceof HTMLSelectElement) {
      storySelect.replaceChildren(selectFragment);
      storySelect.disabled = false;
    }

    articles = [...storiesContainer.querySelectorAll(".news-card[id][data-title]")];
    menuLinks = [...navigationContainer.querySelectorAll(".item-left-panel[data-target]")];
    indexById = new Map(articles.map((article, index) => [article.id, index]));
    document.documentElement.classList.add("news-reader-ready");

    const requestedIndex = indexById.get(window.location.hash.slice(1));
    setCurrentStory(typeof requestedIndex === "number" ? requestedIndex : 0);

    document.querySelectorAll(".newsroom .reveal").forEach((item) => item.classList.add("is-visible"));
  }

  async function loadNews() {
    storiesContainer.setAttribute("aria-busy", "true");
    navigationContainer.setAttribute("aria-busy", "true");

    try {
      if (!endpoint) throw new Error("The news service is not configured.");

      const response = await fetch(endpoint, {
        method: "POST",
        credentials: "same-origin",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ action: "read_news" })
      });
      const result = await response.json();

      if (!response.ok || result?.success !== true || !Array.isArray(result.news)) {
        throw new Error(result?.message || "The news service returned an invalid response.");
      }

      if (!result.news.length) {
        showMessage("There are no published stories at the moment.");
        return;
      }

      renderNews(result.news);
    } catch (error) {
      console.error("News loading error:", error);
      showMessage("We could not load the news. Please try again.", true);
    }
  }

  storySelect?.addEventListener("change", () => {
    const index = indexById.get(storySelect.value);
    if (typeof index === "number") setCurrentStory(index, { scroll: true, updateHash: true });
  });

  navigationContainer.addEventListener("click", (event) => {
    const link = event.target.closest(".item-left-panel[data-target]");
    const index = link ? indexById.get(link.dataset.target) : undefined;
    if (typeof index === "number") setCurrentStory(index, { scroll: true, updateHash: true });
  });

  previousButtons.forEach((button) => {
    button.addEventListener("click", () => setCurrentStory(currentIndex - 1, { scroll: true, updateHash: true }));
  });

  nextButtons.forEach((button) => {
    button.addEventListener("click", () => setCurrentStory(currentIndex + 1, { scroll: true, updateHash: true }));
  });

  window.addEventListener("hashchange", () => {
    const index = indexById.get(window.location.hash.slice(1));
    if (typeof index === "number") setCurrentStory(index, { scroll: true });
  });

  loadNews();
});
