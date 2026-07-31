// File: cruising_navigator/7_standard_specifications/standard_specifications.js
(() => {
  const sections = Array.from(document.querySelectorAll('[data-sr-reveal]'));
  if (!sections.length) return;

  const prefersReduced =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const STAGGER_MS = 70; // requested
  const done = new WeakSet();

  function revealSection(section) {
    if (done.has(section)) return;
    done.add(section);

    const items = Array.from(section.querySelectorAll('.sr-item'));
    if (!items.length) return;

    for (let i = 0; i < items.length; i++) {
      const el = items[i];
      el.style.setProperty('--sr-delay', prefersReduced ? '0ms' : `${i * STAGGER_MS}ms`);
      el.classList.add('is-revealed');
    }
  }

  // Fallback (no IntersectionObserver)
  if (!('IntersectionObserver' in window)) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;

      const section = entry.target;
      revealSection(section);
      io.unobserve(section); // run once per section
    }
  }, { threshold: 0.15 });

  sections.forEach((s) => io.observe(s));
})();
