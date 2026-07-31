// standard_specifications.js — Reveal only (once per section)
// Stagger: 70ms

(() => {
  const STAGGER_MS = 70;

  const section = document.querySelector('.standard_specifications[data-sr-reveal]');
  if (!section) return;

  const revealSection = (root) => {
    const items = root.querySelectorAll('.sr-item');
    if (!items.length) return;

    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });

    requestAnimationFrame(() => {
      items.forEach((el) => el.classList.add('is-revealed'));
    });
  };

  if (!('IntersectionObserver' in window)) {
    revealSection(section);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        revealSection(entry.target);

        // Run ONLY once for this section
        io.unobserve(entry.target);
      }
    },
    { threshold: 0.15 }
  );

  io.observe(section);
})();
