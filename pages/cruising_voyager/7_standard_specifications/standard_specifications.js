// File: cruising_navigator/7_standard_specifications/standard_specifications.js
// Reveal only — IntersectionObserver + stagger (70ms) + prefers-reduced-motion
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('.standard_specifications[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced =
    !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

  const prepare = (section) => {
    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });
  };

  const revealOnce = (section) => {
    if (!section || section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';
    section.classList.add('is-revealed');
  };

  sections.forEach(prepare);

  if (prefersReduced || typeof IntersectionObserver === 'undefined') {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        const section = entry.target;
        revealOnce(section);
        io.unobserve(section); // una sola vez por sección
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
