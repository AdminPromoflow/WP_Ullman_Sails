(() => {
  const section = document.querySelector('.sail-types');
  if (!section) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    section.classList.add('is-visible');
    return;
  }

  const io = new IntersectionObserver(
    (entries, observer) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          section.classList.add('is-visible');
          observer.unobserve(section);
          break;
        }
      }
    },
    { threshold: 0.15 }
  );

  io.observe(section);
})();
