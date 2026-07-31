(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealOnce = (section) => {
    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (!items.length) return;

    items.forEach((el, i) => {
      if (!el.style.getPropertyValue("--sr-delay")) {
        el.style.setProperty("--sr-delay", `${i * STAGGER_MS}ms`);
      }
      el.classList.add("is-revealed");
    });
  };

  if (prefersReduced || !("IntersectionObserver" in window)) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        revealOnce(entry.target);

        // UNA sola vez por sección
        io.unobserve(entry.target);
      }
    },
    {
      threshold: 0.15,
      rootMargin: "0px 0px -10% 0px",
    }
  );

  sections.forEach((section) => io.observe(section));
})();
