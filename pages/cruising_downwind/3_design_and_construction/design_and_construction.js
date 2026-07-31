/* =========================
   design_and_construction.js — REVEAL ONLY
   File: cruising_navigator/3_design_and_construction/design_and_construction.js
========================= */
(() => {
  try {
    document.documentElement.classList.add("js-sr");

    const section = document.querySelector(".design-and-construction[data-sr-reveal]");
    if (!section) return;

    const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
    if (reduceMotion) {
      section.classList.add("is-revealed");
      return;
    }

    // 1) Items in order (stagger)
    const headerItems = Array.from(section.querySelectorAll(".dac-header > *"));
    const cards = Array.from(section.querySelectorAll(".dac-card"));

    const items = [...headerItems, ...cards].filter(Boolean);

    items.forEach((el, i) => {
      el.classList.add("sr-item");
      el.style.setProperty("--sr-delay", `${i * 70}ms`);
    });

    // 2) Reveal on enter (once)
    if (!("IntersectionObserver" in window)) {
      section.classList.add("is-revealed");
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (!entry.isIntersecting) continue;
          section.classList.add("is-revealed");
          io.disconnect();
          break;
        }
      },
      { threshold: 0.18, rootMargin: "0px 0px -10% 0px" }
    );

    io.observe(section);

  } catch (e) {
    console.error("Design & Construction reveal error:", e);
  }
})();
