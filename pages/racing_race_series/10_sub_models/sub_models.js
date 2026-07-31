// sub_models.js — Reveal only (once per section)
(() => {
  const sections = document.querySelectorAll('section.wrap[data-sr-reveal]');
  if (!sections.length) return;

  const STAGGER_MS = 70;
  const prefersReduced =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  sections.forEach((section) => {
    if (section.classList.contains('is-revealed')) return;

    const items = section.querySelectorAll('.sr-item');

    // Assign stagger delays
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });

    // Reduced motion: reveal instantly, no observer
    if (prefersReduced) {
      section.classList.add('is-revealed');
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting) {
            section.classList.add('is-revealed'); // reveal ONCE per section
            io.disconnect();
            break;
          }
        }
      },
      { threshold: 0.15 }
    );

    io.observe(section);
  });
})();
