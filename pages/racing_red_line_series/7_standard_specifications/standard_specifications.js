/* =========================
   Reveal only — Standard Specifications
   - IntersectionObserver
   - Stagger via CSS delays (--sr-delay)
   - Runs ONCE per section
   - Respects prefers-reduced-motion
========================= */
(() => {
  const sections = document.querySelectorAll('.standard_specifications[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealOnce = (section) => {
    if (section.classList.contains('is-revealed')) return;
    section.classList.add('is-revealed');
  };

  // Reduced motion OR no IO support => reveal immediately (still once).
  if (prefersReduced || !('IntersectionObserver' in window)) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        revealOnce(entry.target);
        io.unobserve(entry.target); // once per section
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((s) => io.observe(s));
})();
