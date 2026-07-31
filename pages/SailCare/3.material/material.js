/* =========================================================
   Reveal only — runs once per section (data-sr-reveal)
   File: SailCare/3.material/material.js
   ========================================================= */

(() => {
  const sections = document.querySelectorAll('[data-sr-reveal]');

  // If user prefers reduced motion, reveal immediately.
  const prefersReduced =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealNow = (section) => {
    if (section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';
    section.classList.add('is-revealed');
  };

  // Stagger helper (90ms)
  const applyStagger = (section) => {
    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * 90}ms`);
    });
  };

  sections.forEach((section) => applyStagger(section));

  if (prefersReduced) {
    sections.forEach(revealNow);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        revealNow(entry.target);
        io.unobserve(entry.target);
      });
    },
    { threshold: 0.18 }
  );

  sections.forEach((section) => io.observe(section));
})();
