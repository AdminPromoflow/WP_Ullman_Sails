/* =========================
   available_upgrades.js
   Reveal only — IntersectionObserver + stagger (70ms)
   - Sin parallax
   - Ejecuta UNA sola vez por sección ([data-sr-reveal])
   - Usa .sr-item + .is-revealed + data-sr-delay
========================= */

(() => {
  const STAGGER_MS = 70;

  const prefersReduced = window.matchMedia
    ? window.matchMedia("(prefers-reduced-motion: reduce)").matches
    : false;

  const sections = Array.from(document.querySelectorAll("[data-sr-reveal]"));
  if (sections.length === 0) return;

  const revealed = new WeakSet();

  const revealSection = (section) => {
    if (!section || revealed.has(section)) return;
    revealed.add(section);

    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (items.length === 0) return;

    // Delays: data-sr-delay o fallback stagger
    items.forEach((el, i) => {
      const attr = el.getAttribute("data-sr-delay");
      const delay = Number.isFinite(Number(attr)) ? Number(attr) : (i * STAGGER_MS);
      el.style.transitionDelay = `${Math.max(0, delay)}ms`;
    });

    if (prefersReduced) {
      items.forEach((el) => el.classList.add("is-revealed"));
      return;
    }

    items.forEach((el) => {
      const delay = parseInt(el.style.transitionDelay || "0", 10) || 0;
      window.setTimeout(() => el.classList.add("is-revealed"), delay);
    });
  };

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        const section = entry.target;
        revealSection(section);

        // UNA sola vez por sección
        io.unobserve(section);
      }
    },
    { threshold: 0.15, rootMargin: "0px 0px -10% 0px" }
  );

  sections.forEach((sec) => io.observe(sec));
})();
