// =========================
// Cruising Section — reveal + parallax imagen (scroll real)
// =========================
(() => {
  const section = document.querySelector(".cruising-section");
  if (!section) return;

  const img = section.querySelector(".cruising-image img");
  if (!img) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduceMotion) {
    section.classList.add("is-visible");
    return;
  }

  const BASE_SCALE = 1.08;
  const MAX_MOVE_PX = 60; // sube a 80/100 si lo quieres más fuerte

  // ---- Reveal (1 vez) ----
  const revealIO = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;
      section.classList.add("is-visible");
      revealIO.disconnect();

      // ajusta parallax justo al revelar
      requestAnimationFrame(updateParallax);
      break;
    }
  }, { threshold: 0.2 });

  revealIO.observe(section);

  // ---- Parallax imagen (solo scroll/resize) ----
  let ticking = false;

  function clamp(val, min, max) {
    return Math.max(min, Math.min(max, val));
  }

  function updateParallax() {
    ticking = false;

    const rect = section.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight;

    // fuera de pantalla -> neutral
    if (rect.bottom < 0 || rect.top > vh) {
      img.style.transform = `translate3d(0, 0px, 0) scale(${BASE_SCALE})`;
      return;
    }

    // 0..1 atravesando viewport
    const progress = (vh - rect.top) / (vh + rect.height);
    const p = clamp(progress, 0, 1);

    // (-MAX/2 .. +MAX/2)
    const y = (0.5 - p) * MAX_MOVE_PX;

    img.style.transform = `translate3d(0, ${y.toFixed(2)}px, 0) scale(${BASE_SCALE})`;
  }

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(updateParallax);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll);

  // ✅ Aplica desde que carga, aunque el usuario ya esté scrolleado
  window.addEventListener("load", () => requestAnimationFrame(updateParallax));
  requestAnimationFrame(updateParallax);
})();
