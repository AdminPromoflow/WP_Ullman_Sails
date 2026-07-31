// File: cruising_navigator/6_available_upgrades/available_upgrades.js
(() => {
  const STAGGER_MS = 70;
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  const revealSectionOnce = (section) => {
    const items = section.querySelectorAll(".sr-item");
    items.forEach((el, i) => {
      el.style.setProperty("--sr-delay", `${i * STAGGER_MS}ms`);
      el.classList.add("is-revealed");
    });
  };

  if (reducedMotion) {
    sections.forEach(revealSectionOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        revealSectionOnce(entry.target);
        io.unobserve(entry.target); // reveal once per section
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
