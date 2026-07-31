// cloth_and_construction.js
// 1) Rotator (tu lógica) + 2) Reveal only (una sola vez por sección)

(() => {
  // =========================
  // Rotator
  // =========================
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

  // =========================
  // Reveal only (one time per section)
  // =========================
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const revealed = new WeakSet();

  const revealSection = (section) => {
    if (revealed.has(section)) return;
    revealed.add(section);

    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, idx) => {
      const raw = el.getAttribute('data-sr-delay');
      const n = (raw !== null && raw !== '') ? Number(raw) : (idx * STAGGER_MS);
      const delay = Number.isFinite(n) ? n : (idx * STAGGER_MS);

      el.style.setProperty('--sr-delay', `${delay}ms`);
      el.classList.add('is-revealed');
    });
  };

  if (!('IntersectionObserver' in window)) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          revealSection(entry.target);
          io.unobserve(entry.target); // UNA sola vez por sección
        }
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
