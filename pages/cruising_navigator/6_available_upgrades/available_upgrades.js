// available_upgrades.js — Reveal only (once per section)
// Stagger: 70ms

(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const revealSection = (section) => {
    const items = section.querySelectorAll('.sr-item');
    if (!items.length) return;

    // Apply stagger delays (0, 70ms, 140ms, ...)
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });

    // Trigger reveal next frame (ensures transitions run)
    requestAnimationFrame(() => {
      items.forEach((el) => el.classList.add('is-revealed'));
    });
  };

  // Fallback: if IO not supported, reveal immediately
  if (!('IntersectionObserver' in window)) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        const section = entry.target;
        revealSection(section);

        // Run ONLY once per section
        io.unobserve(section);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
