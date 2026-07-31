/* =========================
   Services — Reveal only (IntersectionObserver + stagger)
========================= */
(() => {
  const items = Array.from(document.querySelectorAll(".sr-item"));
  if (!items.length) return;

  // Respect reduced motion
  const reduceMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduceMotion) {
    items.forEach(el => el.classList.add("is-revealed"));
    return;
  }

  // Stagger delay
  items.forEach((el, i) => {
    el.style.setProperty("--sr-delay", `${i * 70}ms`);
  });

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("is-revealed");
      io.unobserve(entry.target);
    });
  }, {
    root: null,
    threshold: 0.12,
    rootMargin: "0px 0px -10% 0px"
  });

  items.forEach(el => io.observe(el));
})();
