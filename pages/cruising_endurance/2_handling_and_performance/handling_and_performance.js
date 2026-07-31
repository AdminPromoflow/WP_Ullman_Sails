// handling_and_performance.js — Reveal only (one time per section)
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const revealed = new WeakSet();

  const revealSection = (section) => {
    if (revealed.has(section)) return;
    revealed.add(section);

    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, idx) => {
      const raw = el.getAttribute('data-sr-delay');
      const n = raw !== null && raw !== '' ? Number(raw) : (idx * STAGGER_MS);
      const delay = Number.isFinite(n) ? n : (idx * STAGGER_MS);

      el.style.setProperty('--sr-delay', `${delay}ms`);
      el.classList.add('is-revealed');
    });
  };

  // Fallback: reveal immediately if IO is not supported
  if (!('IntersectionObserver' in window)) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          revealSection(entry.target);
          io.unobserve(entry.target); // ONE time per section
        }
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
