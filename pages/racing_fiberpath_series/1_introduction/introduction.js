/* ==============================
   Reveal only — IntersectionObserver + stagger
   - Runs ONCE per section
   - No parallax
   ============================== */

(() => {
  const STAGGER_MS = 70;

  const sections = Array.from(document.querySelectorAll('[data-sr-reveal]'));
  if (!sections.length) return;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealSection = (section) => {
    const items = Array.from(section.querySelectorAll('.sr-item'));
    if (!items.length) return;

    // Assign stagger delays (CSS uses --sr-delay)
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    });

    // Add revealed class next frame (ensures transitions kick in consistently)
    requestAnimationFrame(() => {
      items.forEach((el) => el.classList.add('is-revealed'));
    });
  };

  // Reduced motion: show immediately, no observer needed
  if (prefersReduced) {
    sections.forEach(revealSection);
    return;
  }

  const done = new WeakSet();

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const section = entry.target;
        if (done.has(section)) return;

        done.add(section);
        revealSection(section);

        // Ensure it runs only once per section
        io.unobserve(section);
      });
    },
    { threshold: 0.2 }
  );

  sections.forEach((section) => io.observe(section));
})();
