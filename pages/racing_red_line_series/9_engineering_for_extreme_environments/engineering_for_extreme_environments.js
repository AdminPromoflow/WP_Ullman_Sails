// engineering_for_extreme_environments_reveal.js
(() => {
  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Si reduce motion, revela todo inmediatamente (sin animar)
  if (prefersReduced) {
    sections.forEach((s) => s.classList.add('is-revealed'));
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        const section = entry.target;
        section.classList.add('is-revealed');

        // UNA sola vez por sección
        io.unobserve(section);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((s) => io.observe(s));
})();
