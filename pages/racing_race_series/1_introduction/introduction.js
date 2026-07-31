/* =========================================================
   Reveal only (ONE TIME per section)
   - IntersectionObserver
   - Stagger 70ms
   - prefers-reduced-motion support
========================================================= */

(() => {
  "use strict";

  const STAGGER_MS = 70;

  const prefersReduced = (() => {
    try { return window.matchMedia("(prefers-reduced-motion: reduce)").matches; }
    catch { return false; }
  })();

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  // If reduced motion: reveal immediately (no observer).
  if (prefersReduced) {
    sections.forEach((sec) => {
      const items = sec.querySelectorAll(".sr-item");
      items.forEach((el) => el.classList.add("is-revealed"));
    });
    return;
  }

  const revealedOnce = new WeakSet();

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const section = entry.target;
      if (revealedOnce.has(section)) {
        io.unobserve(section);
        return;
      }

      const items = section.querySelectorAll(".sr-item");
      items.forEach((el, i) => {
        el.style.transitionDelay = `${i * STAGGER_MS}ms`;
        el.classList.add("is-revealed");
      });

      revealedOnce.add(section);
      io.unobserve(section); // ✅ ONE TIME per section
    });
  }, {
    root: null,
    threshold: 0.22,
    rootMargin: "0px 0px -10% 0px"
  });

  sections.forEach((sec) => io.observe(sec));
})();
