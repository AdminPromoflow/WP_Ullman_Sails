/* =========================
   Reveal only — IntersectionObserver + stagger (70ms) + prefers-reduced-motion
   File: cruising_navigator/6_available_upgrades/available_upgrades.js
========================= */
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('.available_upgrades[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealOnce = (section) => {
    if (section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';

    const items = section.querySelectorAll('.sr-item');

    items.forEach((el, idx) => {
      el.style.setProperty('--sr-delay', prefersReduce ? '0ms' : `${idx * STAGGER_MS}ms`);
    });

    if (prefersReduce) {
      items.forEach((el) => el.classList.add('is-revealed'));
      return;
    }

    // Ensure initial styles paint before toggling
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        items.forEach((el) => el.classList.add('is-revealed'));
      });
    });
  };

  if (prefersReduce) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          revealOnce(entry.target);
          io.unobserve(entry.target); // ONE time per section
        }
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
