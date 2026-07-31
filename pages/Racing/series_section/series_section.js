(() => {
  try {
    document.documentElement.classList.add("js-sr");

    const sections = Array.from(document.querySelectorAll(".series-section[data-sr-reveal]"));
    if (!sections.length) return;

    const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
    if (reduceMotion) {
      sections.forEach(s => s.classList.add("is-revealed"));
      return;
    }

    // 1) mark items + stagger delay
    sections.forEach((section) => {
      const sel = section.getAttribute("data-sr-items")
        || ".series-subtitle, .series-title, .series-image img, .view-brochure, .series-text > *";

      const stagger = Number(section.getAttribute("data-sr-stagger") || 70);

      const items = Array.from(section.querySelectorAll(sel)).filter(Boolean);

      items.forEach((el, i) => {
        el.classList.add("sr-item");
        el.style.setProperty("--sr-delay", `${i * stagger}ms`);
        if (el.tagName === "HR") el.classList.add("sr-hr");
      });
    });

    // 2) reveal on enter (once)
    if (!("IntersectionObserver" in window)) {
      sections.forEach(s => s.classList.add("is-revealed"));
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-revealed");
          io.unobserve(entry.target);
        });
      },
      { threshold: 0.18, rootMargin: "0px 0px -10% 0px" }
    );

    sections.forEach(s => io.observe(s));
  } catch (e) {
    console.error("Series reveal error:", e);
  }
})();
