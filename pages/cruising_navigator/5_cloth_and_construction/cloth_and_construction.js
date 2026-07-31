// File: cruising_navigator/6_cloth_and_construction/cloth_and_construction.js
// Includes: rotator + Reveal only (IntersectionObserver + stagger 70ms + prefers-reduced-motion)

(() => {
  /* =========================
     ROTATOR (keep behaviour)
  ========================= */
  const rotators = document.querySelectorAll(".nav-rotator");
  rotators.forEach((rotator) => {
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
      window.setTimeout(() => {
        capSub.textContent = imgs[index].dataset.sub || "MAINSAIL";
        capSub.classList.remove("is-fading");
      }, 220);
    }

    setActive(0);

    window.setInterval(() => {
      i = (i + 1) % imgs.length;
      setActive(i);
    }, interval);
  });

  /* =========================
     REVEAL ONLY (one-time)
  ========================= */
  const STAGGER_MS = 70;
  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const prefersReduced = window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const prepare = (section) => {
    const items = section.querySelectorAll('.sr-item');
    items.forEach((el, idx) => {
      el.style.setProperty('--sr-delay', `${idx * STAGGER_MS}ms`);
    });
  };

  const revealOnce = (section) => {
    if (!section || section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';
    section.classList.add('is-revealed');
  };

  sections.forEach(prepare);

  if (prefersReduced) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        const section = entry.target;
        revealOnce(section);
        io.unobserve(section);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((section) => io.observe(section));
})();
