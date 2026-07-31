/* durability_and_reinforcement.js
   Reveal only — runs ONCE per section
*/
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealSection = (section) => {
    if (!section || section.classList.contains('is-revealed')) return;

    const items = section.querySelectorAll('.sr-item');
    for (let i = 0; i < items.length; i++) {
      items[i].style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    }

    section.classList.add('is-revealed');
  };

  // If reduced motion, reveal immediately (no hiding via CSS in reduce, but we still mark it)
  if (prefersReduced) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        const section = entry.target;
        revealSection(section);

        // run once per section
        io.unobserve(section);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
