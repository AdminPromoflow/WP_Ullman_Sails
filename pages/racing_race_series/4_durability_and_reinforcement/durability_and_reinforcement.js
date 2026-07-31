// durability_and_reinforcement.js — Reveal only (once per section)
(() => {
  const section = document.querySelector('.strength-in-the-details[data-sr-reveal]');
  if (!section) return;

  // If already revealed (e.g., back/forward cache), do nothing
  if (section.classList.contains('is-revealed')) return;

  const items = section.querySelectorAll('.sr-item');
  const STAGGER_MS = 70;

  // Assign stagger delays
  items.forEach((el, i) => {
    el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
  });

  const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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
})();
