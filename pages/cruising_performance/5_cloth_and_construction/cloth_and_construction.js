/* =========================
   cloth_and_construction.js
   - Rotator (tu script)
   - Reveal only (IntersectionObserver + stagger 70ms)
   - Sin parallax
   - Reveal: UNA sola vez por sección
========================= */

(() => {
  const STAGGER_MS = 70;

  const prefersReduced = window.matchMedia
    ? window.matchMedia("(prefers-reduced-motion: reduce)").matches
    : false;

  function initRotator(){
    const rotator = document.querySelector(".nav-specsheet .nav-rotator");
    if (!rotator) return;

    const interval = parseInt(rotator.dataset.interval || "3000", 10);
    const imgs = Array.from(rotator.querySelectorAll(".nav-rotator__img"));
    const dots = Array.from(rotator.querySelectorAll(".nav-rotator__dot"));
    const capSub = rotator.querySelector(".nav-rotator__capSub");

    if (!imgs.length || !capSub) return;

    let i = 0;

    function setActive(index){
      imgs.forEach((img, idx) => img.classList.toggle("is-active", idx === index));
      dots.forEach((dot, idx) => dot.classList.toggle("is-active", idx === index));

      // fade del texto (bonito)
      capSub.classList.add("is-fading");
      setTimeout(() => {
        capSub.textContent = imgs[index].dataset.sub || "MAINSAIL";
        capSub.classList.remove("is-fading");
      }, 220);
    }

    // Estado inicial
    setActive(0);

    // Rotación
    setInterval(() => {
      i = (i + 1) % imgs.length;
      setActive(i);
    }, Math.max(500, interval));
  }

  function initReveal(){
    const section = document.querySelector(".nav-specsheet[data-sr-reveal]");
    if (!section) return;

    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (!items.length) return;

    const revealOnce = () => {
      // Delays: data-sr-delay o fallback stagger
      items.forEach((el, idx) => {
        const attr = el.getAttribute("data-sr-delay");
        const delay = Number.isFinite(Number(attr)) ? Number(attr) : (idx * STAGGER_MS);
        el.style.transitionDelay = `${Math.max(0, delay)}ms`;
      });

      if (prefersReduced) {
        items.forEach((el) => el.classList.add("is-revealed"));
        return;
      }

      items.forEach((el) => {
        const delay = parseInt(el.style.transitionDelay || "0", 10) || 0;
        window.setTimeout(() => el.classList.add("is-revealed"), delay);
      });
    };

    const io = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (!entry.isIntersecting) continue;
          revealOnce();
          io.unobserve(section); // UNA sola vez por sección
          break;
        }
      },
      { threshold: 0.15, rootMargin: "0px 0px -10% 0px" }
    );

    io.observe(section);
  }

  function boot(){
    initRotator();
    initReveal();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot, { once: true });
  } else {
    boot();
  }
})();
