/* =========================================================
   File: cruising_navigator/6_cloth_and_construction/cloth_and_construction.js
   - Rotator (your logic)
   - Reveal only (IntersectionObserver + stagger 70ms) — once per section
========================================================= */

/* ===== Rotator ===== */
document.addEventListener("DOMContentLoaded", () => {
  const rotator = document.querySelector(".nav-rotator");
  if (!rotator) return;

  const interval = parseInt(rotator.dataset.interval || "3000", 10);
  const imgs = Array.from(rotator.querySelectorAll(".nav-rotator__img"));
  const dots = Array.from(rotator.querySelectorAll(".nav-rotator__dot"));
  const capSub = rotator.querySelector("#navCapSub");

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
  }, interval);
});

/* ===== Reveal only (once per section) ===== */
document.addEventListener("DOMContentLoaded", () => {
  const STAGGER_MS = 70;

  const roots = document.querySelectorAll("[data-sr-reveal]");
  if (!roots.length) return;

  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const applyDelays = (root) => {
    const items = root.querySelectorAll(".sr-item");
    items.forEach((el, idx) => {
      el.style.setProperty("--sr-delay", `${idx * STAGGER_MS}ms`);
    });
  };

  roots.forEach(applyDelays);

  if (reducedMotion) {
    roots.forEach((root) => root.classList.add("is-revealed"));
    return;
  }

  const io = new IntersectionObserver((entries, obs) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;

      const root = entry.target;
      root.classList.add("is-revealed");

      // Run ONCE per section
      obs.unobserve(root);
    }
  }, {
    threshold: 0.18,
    rootMargin: "0px 0px -10% 0px",
  });

  roots.forEach((root) => io.observe(root));
});
