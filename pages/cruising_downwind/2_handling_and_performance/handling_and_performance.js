/* =========================
   handling_and_performance.js — REVEAL ONLY
   File: cruising_navigator/2_handling_and_performance/handling_and_performance.js
========================= */
(() => {
  try {
    document.documentElement.classList.add("js-sr");

    const section = document.querySelector(".performance-and-handling[data-sr-reveal]");
    if (!section) return;

    const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
    if (reduceMotion) {
      section.classList.add("is-revealed");
      return;
    }

    // 1) Items in order (stagger)
    const items = [
      section.querySelector(".ph-tagline"),
      section.querySelector(".ph-title"),
      section.querySelector(".ph-image"),
      ...Array.from(section.querySelectorAll(".ph-step"))
    ].filter(Boolean);

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
    console.error("Performance & Handling reveal error:", e);
  }
})();
