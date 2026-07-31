// =========================
// Cruising Section — elegant reveal (SIN parallax)
// =========================
(() => {
  const section = document.querySelector(".cruising-section");
  if (!section) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduceMotion) {
    section.classList.add("is-visible");
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        // Reveal 1 sola vez
        section.classList.add("is-visible");
        io.disconnect();
        break;
      }
    },
    { threshold: 0.22 }
  );

  io.observe(section);
})();
