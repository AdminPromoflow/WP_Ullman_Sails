// design_and_construction.js — Reveal only (IntersectionObserver + stagger + reduced motion)
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const reduceMotion =
    !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

  const prep = (section) => {
    const items = Array.from(section.querySelectorAll('.sr-item'));
    for (let i = 0; i < items.length; i++) {
      const delay = reduceMotion ? 0 : i * STAGGER_MS;
      items[i].style.setProperty('--sr-delay', `${delay}ms`);
    }
    return items;
  };

  const revealOnce = (section) => {
    if (section.dataset.srDone === '1') return; // once per section
    section.dataset.srDone = '1';

    const items = prep(section);
    for (const el of items) el.classList.add('is-revealed');
  };

  // Fallback: no IO OR reduced motion => reveal immediately
  if (reduceMotion || !('IntersectionObserver' in window)) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        revealOnce(entry.target);
        io.unobserve(entry.target);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => {
    prep(section);
    io.observe(section);
  });
})();
