/* =========================
   series_section.js — CLEAN (Reveal only)
========================= */
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

    // 1) Mark items + stagger delay
    sections.forEach((section) => {
      const items = [
        ...section.querySelectorAll(".series-subtitle, .series-title, .series-image img, .series-text > *")
      ].filter(Boolean);

      items.forEach((el, i) => {
        el.classList.add("sr-item");
        el.style.setProperty("--sr-delay", `${i * 70}ms`);
        if (el.tagName === "HR") el.classList.add("sr-hr");
      });
    });

    // 2) Reveal on enter (once)
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
