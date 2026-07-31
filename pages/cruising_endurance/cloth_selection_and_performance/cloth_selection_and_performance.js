// File: cloth_selection_and_performance/cloth_selection_and_performance.js
(() => {
  /* =========================
     Rotator
  ========================= */
  function initRotator() {
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

      capSub.classList.add("is-fading");
      setTimeout(() => {
        capSub.textContent = imgs[index].dataset.sub || "MAINSAIL";
        capSub.classList.remove("is-fading");
      }, 220);
    }

    setActive(0);

    setInterval(() => {
      i = (i + 1) % imgs.length;
      setActive(i);
    }, interval);
  }

  /* =========================
     Reveal only (IntersectionObserver + stagger)
     - Runs once per section
  ========================= */
  function initReveal() {
    const STAGGER_MS = 70;
    const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    const sections = document.querySelectorAll("[data-sr-reveal]");
    if (!sections.length) return;

    const revealSectionOnce = (section) => {
      const items = section.querySelectorAll(".sr-item");
      items.forEach((el, idx) => {
        el.style.setProperty("--sr-delay", `${idx * STAGGER_MS}ms`);
        el.classList.add("is-revealed");
      });
    };

    if (reducedMotion) {
      sections.forEach(revealSectionOnce);
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (!entry.isIntersecting) continue;
          revealSectionOnce(entry.target);
          io.unobserve(entry.target); // once per section
        }
      },
      { threshold: 0.15 }
    );

    sections.forEach((section) => io.observe(section));
  }

  /* =========================
     Boot
  ========================= */
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
      initRotator();
      initReveal();
    });
  } else {
    initRotator();
    initReveal();
  }
})();
