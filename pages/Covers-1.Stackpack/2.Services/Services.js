/* =========================
   Reveal only (IntersectionObserver + stagger)
========================= */
(() => {
  const items = Array.from(document.querySelectorAll(".sr-item"));
  if (!items.length) return;

  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce) {
    items.forEach(el => el.classList.add("is-revealed"));
    return;
  }

  // Stagger delay
  items.forEach((el, i) => el.style.setProperty("--sr-delay", `${i * 90}ms`));

  const io = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("is-revealed");
      obs.unobserve(entry.target);
    });
  }, { threshold: 0.18, rootMargin: "0px 0px -10% 0px" });

  items.forEach(el => io.observe(el));
})();
