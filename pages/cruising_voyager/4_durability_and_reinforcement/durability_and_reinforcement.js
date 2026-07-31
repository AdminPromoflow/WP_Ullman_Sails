/* cruising_navigator/4_durability_and_reinforcement/durability_and_reinforcement.js
   Reveal only: IntersectionObserver + stagger (70ms) + prefers-reduced-motion
   - Ejecuta UNA sola vez por sección (unobserve)
*/
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('.strength-in-the-details[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const applyDelays = (section) => {
    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', prefersReduced ? '0ms' : `${i * STAGGER_MS}ms`);
    });
  };

  const revealOnce = (section) => {
    if (section.classList.contains('is-revealed')) return;
    applyDelays(section);
    section.classList.add('is-revealed');
  };

  // Fallback: sin IO o con reduced motion -> revela inmediatamente
  if (!('IntersectionObserver' in window) || prefersReduced) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          revealOnce(entry.target);
          io.unobserve(entry.target); // una sola vez por sección
        }
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
