/* =========================================
   Reveal only — IntersectionObserver + stagger
   - Se ejecuta UNA sola vez por sección
   - Stagger: 70ms
   - Respeta prefers-reduced-motion
========================================= */
(() => {
  const STAGGER_MS = 70;

  const sections = Array.from(document.querySelectorAll("[data-sr-reveal]"));
  if (!sections.length) return;

  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealSection = (section) => {
    if (section.dataset.srDone === "1") return;

    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (!items.length) {
      section.dataset.srDone = "1";
      return;
    }

    items.forEach((el, i) => {
      const delay = prefersReduced ? 0 : i * STAGGER_MS;
      el.style.transitionDelay = `${delay}ms`;
    });

    requestAnimationFrame(() => {
      items.forEach(el => el.classList.add("is-revealed"));
    });

    section.dataset.srDone = "1";
  };

  if (prefersReduced) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const section = entry.target;
        revealSection(section);
        io.unobserve(section); // ✅ una sola vez por sección
      });
    },
    {
      threshold: 0.18,
      root: null,
      rootMargin: "0px 0px -10% 0px"
    }
  );

  sections.forEach((s) => io.observe(s));
})();
