/* =========================
   Reveal only — Performance & Handling
   - IntersectionObserver
   - Stagger 70ms
   - prefers-reduced-motion
   - Ejecuta UNA sola vez por sección
========================= */
(() => {
  const STAGGER_MS = 70;
  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealSection = (section) => {
    if (!section || section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';

    const items = section.querySelectorAll('.sr-item');
    if (!items.length) return;

    // Apply stagger via CSS variable (no extra attrs/classes)
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });

    // Trigger reveal in next frame (ensures transitions apply)
    requestAnimationFrame(() => {
      items.forEach((el) => el.classList.add('is-revealed'));
    });
  };

  if (prefersReduced) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          revealSection(entry.target);
          io.unobserve(entry.target); // once per section
        }
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
