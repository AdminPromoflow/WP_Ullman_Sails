// File: 10_sub_models/sub_models.js
// Reveal only — IntersectionObserver + stagger (70ms) + prefers-reduced-motion
// Runs ONCE per section ([data-sr-reveal])

(() => {
  const STAGGER_MS = 70;

  const sections = Array.from(document.querySelectorAll('[data-sr-reveal]'));
  if (!sections.length) return;

  document.documentElement.classList.add('js-sr');

  const prefersReduced =
    window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function getItems(section) {
    return Array.from(section.querySelectorAll('.sr-item'));
  }

  function applyDelays(items) {
    for (let i = 0; i < items.length; i++) {
      items[i].style.setProperty('--sr-delay', `${i * STAGGER_MS}ms`);
    }
  }

  function revealOnce(section) {
    if (section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';

    const items = getItems(section);
    if (!items.length) return;

    applyDelays(items);
    for (let i = 0; i < items.length; i++) {
      items[i].classList.add('is-revealed');
    }
  }

  if (prefersReduced) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver((entries, obs) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;
      revealOnce(entry.target);
      obs.unobserve(entry.target);
    }
  }, { threshold: 0.18 });

  sections.forEach(section => io.observe(section));
})();
