/* =========================================================
   REVEAL ONLY — once per section
   - IntersectionObserver + stagger (70ms)
   - prefers-reduced-motion respected
========================================================= */
(() => {
  const STAGGER_MS = 70;

  const roots = document.querySelectorAll('[data-sr-reveal]');
  if (!roots.length) return;

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Apply per-item delays (order = DOM order inside the section)
  const applyDelays = (root) => {
    const items = root.querySelectorAll('.sr-item');
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });
  };

  roots.forEach(applyDelays);

  // Reduced motion: reveal immediately (no observer needed)
  if (reducedMotion) {
    roots.forEach((root) => root.classList.add('is-revealed'));
    return;
  }

  const io = new IntersectionObserver((entries, obs) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;

      const root = entry.target;
      root.classList.add('is-revealed');

      // Run ONCE per section
      obs.unobserve(root);
    }
  }, {
    threshold: 0.18,
    rootMargin: '0px 0px -10% 0px'
  });

  roots.forEach((root) => io.observe(root));
})();
