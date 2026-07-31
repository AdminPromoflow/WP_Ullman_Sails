/* =========================================================
   REVEAL ONLY — IntersectionObserver + stagger (70ms)
   Ejecuta UNA sola vez por sección [data-sr-reveal]
========================================================= */
(() => {
  const STAGGER_MS = 70;
  const SECTION_SEL = "[data-sr-reveal]";

  const sections = document.querySelectorAll(SECTION_SEL);
  if (!sections.length) return;

  const prefersReduced =
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealSection = (section) => {
    if (!section) return;
    if (section.dataset.srDone === "1" || section.classList.contains("is-revealed")) return;

    const items = section.querySelectorAll(".sr-item");
    items.forEach((el, i) => {
      el.style.setProperty("--sr-delay", `${i * STAGGER_MS}ms`);
    });

    section.classList.add("is-revealed");
    section.dataset.srDone = "1";
  };

  // Reduced motion (o sin soporte IO): muestra todo sin animación
  if (prefersReduced || !("IntersectionObserver" in window)) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const section = entry.target;

        revealSection(section);
        io.unobserve(section); // <- una sola vez por sección
      });
    },
    {
      root: null,
      rootMargin: "0px 0px -12% 0px",
      threshold: 0.15
    }
  );

  sections.forEach((sec) => {
    if (sec.dataset.srDone === "1" || sec.classList.contains("is-revealed")) return;
    io.observe(sec);
  });
})();
