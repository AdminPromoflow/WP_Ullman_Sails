/* =========================
   Reveal only — Strength in the Details
   - IntersectionObserver
   - Stagger 70ms
   - prefers-reduced-motion
   - Runs once per section
========================= */
(() => {
  const STAGGER_MS = 70;
  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced =
    !!window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealSection = (section) => {
    if (section.dataset.srDone === '1') return;

    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
      el.classList.add('is-revealed');
    });

    section.dataset.srDone = '1';
  };

  // Reduced motion or no IO support: reveal immediately
  if (prefersReduced || !('IntersectionObserver' in window)) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        const section = entry.target;
        revealSection(section);

        // Run once per section
        io.unobserve(section);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
