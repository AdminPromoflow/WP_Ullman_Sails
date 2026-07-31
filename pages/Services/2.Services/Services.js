(() => {
  const section = document.querySelector("[data-sr-section]");
  if (!section) return;

  const items = Array.from(section.querySelectorAll("[data-sr-item]"));
  if (!items.length) return;

  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce) return; // en reduce, todo queda visible (porque no agregamos sr-ready)

  // Activamos el modo “reveal” solo si JS está corriendo
  document.documentElement.classList.add("sr-ready");

  // Stagger suave (header + cards)
  items.forEach((el, i) => el.style.setProperty("--sr-delay", `${i * 90}ms`));

  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (!e.isIntersecting) return;
      e.target.classList.add("is-revealed");
      io.unobserve(e.target);
    });
  }, { threshold: 0.15 });

  items.forEach(el => io.observe(el));
})();
