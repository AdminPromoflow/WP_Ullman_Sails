// File: cruising_navigator/5_cloth_and_construction/cloth_and_construction.js

/* =========================
   Rotator (tu código tal cual)
========================= */
(() => {
  const prefersReducedMotion =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function ensureDots(rotator, count) {
    const dotsWrap = rotator.querySelector('.nav-rotator__dots');
    if (!dotsWrap) return [];

    // If dots are missing or mismatch, rebuild them
    const existing = Array.from(dotsWrap.querySelectorAll('.nav-rotator__dot'));
    if (existing.length !== count) {
      dotsWrap.innerHTML = '';
      for (let i = 0; i < count; i++) {
        const dot = document.createElement('span');
        dot.className = 'nav-rotator__dot' + (i === 0 ? ' is-active' : '');
        dotsWrap.appendChild(dot);
      }
    }
    return Array.from(dotsWrap.querySelectorAll('.nav-rotator__dot'));
  }

  function initRotator(rotator) {
    const interval = Number(rotator.getAttribute('data-interval')) || 3000;

    const images = Array.from(rotator.querySelectorAll('.nav-rotator__img'));
    const capSub = rotator.querySelector('.nav-rotator__capSub');

    if (!images.length || !capSub) return;

    // Dots (auto)
    const dots = ensureDots(rotator, images.length);

    // Current index
    let index = images.findIndex(img => img.classList.contains('is-active'));
    if (index < 0) index = 0;

    // Force initial state (caption + dots)
    capSub.textContent = images[index].getAttribute('data-sub') || capSub.textContent;
    images.forEach((img, i) => img.classList.toggle('is-active', i === index));
    dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));

    if (images.length <= 1) return;

    function setActive(next) {
      const prev = index;
      index = (next + images.length) % images.length;

      images[prev]?.classList.remove('is-active');
      images[index]?.classList.add('is-active');

      dots[prev]?.classList.remove('is-active');
      dots[index]?.classList.add('is-active');

      const nextLabel = images[index].getAttribute('data-sub') || '';

      if (!prefersReducedMotion) capSub.classList.add('is-fading');
      window.setTimeout(() => {
        capSub.textContent = nextLabel;
        if (!prefersReducedMotion) capSub.classList.remove('is-fading');
      }, prefersReducedMotion ? 0 : 140);
    }

    let timer = window.setInterval(() => setActive(index + 1), interval);

    // Pause on hover/focus
    const pause = () => { if (timer) { clearInterval(timer); timer = null; } };
    const resume = () => { if (!timer) timer = window.setInterval(() => setActive(index + 1), interval); };

    rotator.addEventListener('mouseenter', pause);
    rotator.addEventListener('mouseleave', resume);
    rotator.addEventListener('focusin', pause);
    rotator.addEventListener('focusout', resume);
  }

  document.querySelectorAll('.nav-rotator').forEach(initRotator);
})();

/* =========================
   Reveal only (IntersectionObserver + stagger + PRM)
   - Una sola vez por sección
   - Stagger: 70ms
========================= */
(() => {
  const STAGGER_MS = 70;

  const prefersReducedMotion =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const sections = Array.from(document.querySelectorAll('[data-sr-reveal]'));
  if (!sections.length) return;

  const done = new WeakSet();

  function revealSection(section) {
    if (done.has(section)) return;
    done.add(section);

    const items = Array.from(section.querySelectorAll('.sr-item'));
    if (!items.length) return;

    // Delays (stagger)
    items.forEach((el, i) => {
      el.style.setProperty('--sr-delay', prefersReducedMotion ? '0ms' : `${i * STAGGER_MS}ms`);
    });

    // Trigger reveal
    requestAnimationFrame(() => {
      items.forEach(el => el.classList.add('is-revealed'));
    });
  }

  // No IO or reduced motion => reveal immediately
  if (!('IntersectionObserver' in window) || prefersReducedMotion) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;
      revealSection(entry.target);
      io.unobserve(entry.target); // UNA sola vez por sección
    }
  }, {
    threshold: 0.15,
    rootMargin: '0px 0px -8% 0px',
  });

  sections.forEach(sec => io.observe(sec));
})();
