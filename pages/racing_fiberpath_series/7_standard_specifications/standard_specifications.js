// standard_specifications.js — Reveal only (IntersectionObserver + stagger)
(() => {
  const STAGGER_MS = 70;   // requested stagger
  const THRESHOLD = 0.15;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const reduceMotion =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealed = new WeakSet();

  const revealSection = (section) => {
    if (revealed.has(section)) return; // run once per section
    revealed.add(section);

    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, idx) => {
      el.style.setProperty('--sr-delay', `${idx * STAGGER_MS}ms`);
      requestAnimationFrame(() => el.classList.add('is-revealed'));
    });
  };

  if (reduceMotion) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        revealSection(entry.target);
        io.unobserve(entry.target);
      }
    },
    { threshold: THRESHOLD }
  );

  sections.forEach((section) => io.observe(section));
})();
