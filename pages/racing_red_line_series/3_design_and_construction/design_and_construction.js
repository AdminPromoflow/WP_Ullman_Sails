// File: cruising_navigator/3_design_and_construction/design_and_construction.js
(() => {
  const STAGGER_MS = 70;
  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const done = new WeakSet();

  const revealOnce = (section) => {
    if (!section || done.has(section)) return;
    done.add(section);

    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });

    // next frame ensures delays are applied before the class flip
    requestAnimationFrame(() => {
      section.classList.add('is-revealed');
    });
  };

  if (prefersReduced) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        revealOnce(entry.target);
        io.unobserve(entry.target); // runs ONE time per section
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
