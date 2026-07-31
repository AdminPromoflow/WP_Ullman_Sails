/* =========================
   Reveal only — IntersectionObserver + stagger (70ms) + prefers-reduced-motion
   File: cruising_navigator/2_handling_and_performance/handling_and_performance.js
========================= */
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll(
    '.performance-and-handling[data-sr-reveal]'
  );
  if (!sections.length) return;

  const prefersReduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealOnce = (section) => {
    if (section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';

    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, idx) => {
      el.style.setProperty('--sr-delay', `${idx * STAGGER_MS}ms`);

      if (prefersReduce) {
        el.classList.add('is-revealed');
      } else {
        window.setTimeout(() => {
          el.classList.add('is-revealed');
        }, idx * STAGGER_MS);
      }
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
          io.unobserve(entry.target); // execute ONE time per section
        }
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
