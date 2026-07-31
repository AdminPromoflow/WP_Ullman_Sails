// engineering_for_extreme_environments.js — Reveal only (IntersectionObserver + stagger + reduced motion)
(() => {
  const STAGGER_MS = 70;

  const section = document.querySelector('.engineering_for_extreme_environments[data-sr-reveal]');
  if (!section) return;

  const reduceMotion =
    !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

  const items = Array.from(section.querySelectorAll('.sr-item'));

  // set delays once (DOM order)
  for (let i = 0; i < items.length; i++) {
    const delay = reduceMotion ? 0 : i * STAGGER_MS;
    items[i].style.setProperty('--sr-delay', `${delay}ms`);
  }

  const revealOnce = () => {
    if (section.dataset.srDone === '1') return; // once per section
    section.dataset.srDone = '1';
    for (const el of items) el.classList.add('is-revealed');
  };

  // Fallback: reduced motion or no IO => reveal immediately
  if (reduceMotion || !('IntersectionObserver' in window)) {
    revealOnce();
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        revealOnce();
        io.unobserve(section);
        break;
      }
    },
    { threshold: 0.15 }
  );

  io.observe(section);
})();
