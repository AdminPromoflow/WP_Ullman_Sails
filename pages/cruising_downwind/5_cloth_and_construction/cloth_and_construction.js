// File: cruising_navigator/5_cloth_and_construction/cloth_and_construction.js

(() => {
  'use strict';

  const prefersReducedMotion =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function createDots(rotator, total, activeIndex) {
    const dotsWrap = rotator.querySelector('.nav-rotator__dots');
    if (!dotsWrap) return [];

    dotsWrap.innerHTML = '';

    for (let i = 0; i < total; i++) {
      const dot = document.createElement('span');
      dot.className = 'nav-rotator__dot' + (i === activeIndex ? ' is-active' : '');
      dotsWrap.appendChild(dot);
    }

    return Array.from(dotsWrap.querySelectorAll('.nav-rotator__dot'));
  }

  function initRotator(rotator) {
    const images = Array.from(rotator.querySelectorAll('.nav-rotator__img'));
    const capSub = rotator.querySelector('.nav-rotator__capSub');
    const interval = Number(rotator.getAttribute('data-interval')) || 3000;

    if (!images.length || !capSub) return;

    let currentIndex = images.findIndex((img) => img.classList.contains('is-active'));
    if (currentIndex < 0) currentIndex = 0;

    images.forEach((img, index) => {
      img.classList.toggle('is-active', index === currentIndex);
    });

    capSub.textContent = images[currentIndex].getAttribute('data-sub') || '';
    let dots = createDots(rotator, images.length, currentIndex);

    if (images.length <= 1) return;

    function updateCaption(text) {
      if (prefersReducedMotion) {
        capSub.textContent = text;
        return;
      }

      capSub.classList.add('is-fading');

      window.setTimeout(() => {
        capSub.textContent = text;
        capSub.classList.remove('is-fading');
      }, 140);
    }

    function goTo(nextIndex) {
      const oldIndex = currentIndex;
      currentIndex = (nextIndex + images.length) % images.length;

      if (oldIndex === currentIndex) return;

      images[oldIndex].classList.remove('is-active');
      images[currentIndex].classList.add('is-active');

      if (dots[oldIndex]) dots[oldIndex].classList.remove('is-active');
      if (dots[currentIndex]) dots[currentIndex].classList.add('is-active');

      const nextLabel = images[currentIndex].getAttribute('data-sub') || '';
      updateCaption(nextLabel);
    }

    let timer = null;

    function start() {
      if (timer !== null) return;
      timer = window.setInterval(() => {
        goTo(currentIndex + 1);
      }, interval);
    }

    function stop() {
      if (timer === null) return;
      window.clearInterval(timer);
      timer = null;
    }

    rotator.addEventListener('mouseenter', stop);
    rotator.addEventListener('mouseleave', start);
    rotator.addEventListener('focusin', stop);
    rotator.addEventListener('focusout', start);

    start();
  }

  function initReveal() {
    const STAGGER_MS = 70;
    const sections = Array.from(document.querySelectorAll('[data-sr-reveal]'));

    if (!sections.length) return;

    function revealSection(section) {
      if (section.dataset.srDone === '1') return;
      section.dataset.srDone = '1';

      const items = Array.from(section.querySelectorAll('.sr-item'));

      items.forEach((item, index) => {
        item.style.setProperty(
          '--sr-delay',
          prefersReducedMotion ? '0ms' : `${index * STAGGER_MS}ms`
        );
      });

      requestAnimationFrame(() => {
        items.forEach((item) => item.classList.add('is-revealed'));
      });
    }

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
      sections.forEach(revealSection);
      return;
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        revealSection(entry.target);
        io.unobserve(entry.target);
      });
    }, {
      threshold: 0.18
    });

    sections.forEach((section) => io.observe(section));
  }

  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.nav-rotator').forEach(initRotator);
    initReveal();
  });
})();
