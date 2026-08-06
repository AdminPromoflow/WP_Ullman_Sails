(() => {
  const ready = (callback) => {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", callback, { once: true });
      return;
    }

    callback();
  };

  const setupGuideToggles = () => {
    const guideTexts = document.querySelectorAll(".sailcare-page .series-text");

    guideTexts.forEach((guide, index) => {
      if (guide.querySelectorAll(":scope > p").length < 8) return;

      const content = document.createElement("div");
      const contentId = `sailcare-guide-details-${index + 1}`;

      content.className = "series-text__content";
      content.id = contentId;

      while (guide.firstChild) {
        content.appendChild(guide.firstChild);
      }

      const toggle = document.createElement("button");
      toggle.className = "series-text__toggle";
      toggle.type = "button";
      toggle.setAttribute("aria-controls", contentId);
      toggle.setAttribute("aria-expanded", "false");
      toggle.textContent = "Show all care steps";

      guide.append(content, toggle);
      guide.classList.add("is-collapsible", "is-collapsed");

      toggle.addEventListener("click", () => {
        const isExpanded = toggle.getAttribute("aria-expanded") === "true";

        toggle.setAttribute("aria-expanded", String(!isExpanded));
        toggle.textContent = isExpanded ? "Show all care steps" : "Show fewer steps";
        guide.classList.toggle("is-collapsed", isExpanded);
      });
    });
  };

  const setupJumpNavigation = () => {
    const links = Array.from(document.querySelectorAll(".sailcare-jump-nav__link"));
    if (!links.length) return;
    const prefersReducedMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;

    const entries = links
      .map((link) => {
        const hash = link.hash.slice(1);
        const target = document.getElementById(hash);

        return target ? { link, target: target.closest("section") || target } : null;
      })
      .filter(Boolean);

    const setActive = (activeLink) => {
      links.forEach((link) => {
        const isActive = link === activeLink;

        link.classList.toggle("is-active", isActive);
        if (isActive) {
          link.setAttribute("aria-current", "location");
        } else {
          link.removeAttribute("aria-current");
        }
      });

      const scroller = activeLink?.parentElement;
      if (!activeLink || !scroller) return;

      const centeredPosition = activeLink.offsetLeft
        - (scroller.clientWidth - activeLink.offsetWidth) / 2;

      scroller.scrollTo({
        left: Math.max(0, centeredPosition),
        behavior: prefersReducedMotion ? "auto" : "smooth",
      });
    };

    links.forEach((link) => {
      link.addEventListener("click", () => setActive(link));
    });

    if (!("IntersectionObserver" in window)) return;

    const visibleSections = new Map();
    const observer = new IntersectionObserver(
      (observedEntries) => {
        observedEntries.forEach((entry) => {
          visibleSections.set(entry.target, entry.isIntersecting ? entry.intersectionRatio : 0);
        });

        const visible = entries
          .filter(({ target }) => (visibleSections.get(target) || 0) > 0)
          .sort((a, b) => (visibleSections.get(b.target) || 0) - (visibleSections.get(a.target) || 0));

        if (visible[0]) setActive(visible[0].link);
      },
      { rootMargin: "-28% 0px -58% 0px", threshold: [0, .15, .35, .6] }
    );

    entries.forEach(({ target }) => observer.observe(target));
  };

  ready(() => {
    setupGuideToggles();
    setupJumpNavigation();
  });
})();
