// design-and-construction.js
(() => {
  const section = document.querySelector('.design-and-construction');
  if (!section) return;

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          section.classList.add('is-visible');
          io.disconnect();
          break;
        }
      }
    },
    { threshold: 0.15 }
  );

  io.observe(section);
})();
