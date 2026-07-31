/* =========================
   sub_models.js
   Reveal only (IntersectionObserver + stagger + prefers-reduced-motion)
   - Runs ONCE per section
========================= */
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  const done = new WeakSet();
  const prefersReduced =
    typeof window !== "undefined" &&
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealSection = (section) => {
    if (done.has(section)) return;
    done.add(section);

    const items = section.querySelectorAll(".sr-item");
    if (!items.length) return;

    items.forEach((el, i) => {
      el.style.setProperty("--sr-delay", `${i * STAGGER_MS}ms`);
    });

    requestAnimationFrame(() => {
      items.forEach((el) => el.classList.add("is-revealed"));
    });
  };

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
        io.unobserve(section); // UNA sola vez por sección
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
