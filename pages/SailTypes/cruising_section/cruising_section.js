/* cruising_section.js — Reveal for ALL repeated sections (reload + scroll) */
(() => {
  // Marca JS activo (por si no lo pusiste en el head)
  document.documentElement.classList.add("js");

  const sections = Array.from(document.querySelectorAll(".cruising-section[data-sr-reveal]"));
  if (!sections.length) return;

  const reveal = (sec) => {
    if (sec.dataset.srDone === "1") return;
    sec.dataset.srDone = "1";

    // 2 frames: asegura que el estado oculto se “pinte” y luego transicione a visible
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        sec.classList.add("is-visible");
      });
    });
  };

  const isInViewNow = (el) => {
    const r = el.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight;
    return r.top < vh * 0.88 && r.bottom > vh * 0.12;
  };

  // ✅ Al recargar: revela TODAS las que ya estén visibles
  window.addEventListener("load", () => {
    sections.forEach((sec) => {
      if (isInViewNow(sec)) reveal(sec);
    });
  }, { once: true });

  // ✅ Al hacer scroll: revela cada una cuando entra
  if (!("IntersectionObserver" in window)) {
    // fallback: si no hay soporte, muestra todo
    sections.forEach((sec) => {
      sec.classList.add("is-visible");
      sec.dataset.srDone = "1";
    });
    return;
  }

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      reveal(entry.target);
      io.unobserve(entry.target);
    });
  }, {
    threshold: 0.12,
    rootMargin: "0px 0px -10% 0px",
  });

  sections.forEach((sec) => io.observe(sec));
})();
