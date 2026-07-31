/* ==============================
   Reveal only — IntersectionObserver + stagger (70ms)
   - Ejecuta UNA sola vez por sección (data-sr-reveal)
   - Usa .sr-item + .is-revealed
   - Respeta prefers-reduced-motion
   ============================== */

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

    // Set transition delays (from data-sr-delay or fallback to stagger)
    items.forEach((el, i) => {
      const attr = el.getAttribute("data-sr-delay");
      const delay = Number.isFinite(Number(attr)) ? Number(attr) : (i * STAGGER_MS);
      el.style.transitionDelay = `${Math.max(0, delay)}ms`;
    });

    if (prefersReduced) {
      // Sin animaciones
      items.forEach((el) => el.classList.add("is-revealed"));
      return;
    }

    // Reveal escalonado (usa el delay ya definido)
    items.forEach((el) => {
      const delay = parseInt(el.style.transitionDelay || "0", 10) || 0;
      window.setTimeout(() => el.classList.add("is-revealed"), delay);
    });
  };

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const section = entry.target;
        if (!entry.isIntersecting) return;

        revealSection(section);

        // Ejecutar solo una vez por sección
        io.unobserve(section);
      });
    },
    {
      threshold: 0.22,
      rootMargin: "0px 0px -10% 0px",
    }
  );

  sections.forEach((sec) => io.observe(sec));
})();
