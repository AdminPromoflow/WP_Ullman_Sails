document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelector(".news-home");
  if (!section) return;

  const tabList = section.querySelector(".news-tabs");
  const tabs = Array.from(section.querySelectorAll(".news-tabs__button"));
  const groups = Array.from(section.querySelectorAll(".news-group"));
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const REVEAL_DELAY = 70;

  let activeIndex = Math.max(
    0,
    tabs.findIndex((tab) => tab.classList.contains("is-active"))
  );

  let sectionVisible = reduceMotion;

  function getGroupItems(index) {
    const group = groups[index];
    return group ? Array.from(group.querySelectorAll(".sr-item")) : [];
  }

  function setTabs(index) {
    tabs.forEach((tab, i) => {
      const isActive = i === index;
      tab.classList.toggle("is-active", isActive);
      tab.setAttribute("aria-selected", isActive ? "true" : "false");
      tab.setAttribute("tabindex", isActive ? "0" : "-1");
    });
  }

  function setGroups(index) {
    groups.forEach((group, i) => {
      const isActive = i === index;
      group.classList.toggle("is-active", isActive);
      group.hidden = !isActive;
    });
  }

  function revealGroup(index) {
    const items = getGroupItems(index);
    if (!items.length) return;

    if (reduceMotion) {
      items.forEach((item) => {
        item.style.transitionDelay = "0ms";
        item.classList.add("is-revealed");
      });
      return;
    }

    items.forEach((item) => {
      item.classList.remove("is-revealed");
      item.style.transitionDelay = "0ms";
    });

    requestAnimationFrame(() => {
      items.forEach((item, itemIndex) => {
        item.style.transitionDelay = `${itemIndex * REVEAL_DELAY}ms`;
        item.classList.add("is-revealed");
      });
    });
  }

  function activateTab(index, shouldFocus = false) {
    if (index < 0 || index >= tabs.length) return;

    activeIndex = index;
    setTabs(index);
    setGroups(index);

    if (sectionVisible) {
      revealGroup(index);
    }

    if (shouldFocus) {
      tabs[index].focus();
    }
  }

  function showSection() {
    if (sectionVisible) return;
    sectionVisible = true;
    section.classList.add("is-visible");
    revealGroup(activeIndex);
  }

  if (tabList) {
    tabList.addEventListener("click", (event) => {
      const button = event.target.closest(".news-tabs__button");
      if (!button) return;

      const nextIndex = tabs.indexOf(button);
      if (nextIndex === -1) return;

      activateTab(nextIndex, true);
    });

    tabList.addEventListener("keydown", (event) => {
      const currentButton = event.target.closest(".news-tabs__button");
      if (!currentButton) return;

      const currentIndex = tabs.indexOf(currentButton);
      if (currentIndex === -1) return;

      let nextIndex = null;

      if (event.key === "ArrowRight") nextIndex = (currentIndex + 1) % tabs.length;
      if (event.key === "ArrowLeft") nextIndex = (currentIndex - 1 + tabs.length) % tabs.length;
      if (event.key === "Home") nextIndex = 0;
      if (event.key === "End") nextIndex = tabs.length - 1;

      if (nextIndex === null) return;

      event.preventDefault();
      activateTab(nextIndex, true);
    });
  }

  section.addEventListener("click", (event) => {
    const button = event.target.closest(".news-card__cta");
    if (!button) return;

    const url = button.dataset.url?.trim();
    if (url) {
      window.location.assign(url);
    }
  });

  activateTab(activeIndex);

  if (reduceMotion || !("IntersectionObserver" in window)) {
    section.classList.add("is-visible");
    sectionVisible = true;
    revealGroup(activeIndex);
    return;
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        showSection();
        obs.unobserve(entry.target);
      });
    },
    {
      threshold: 0.18
    }
  );

  observer.observe(section);
});
