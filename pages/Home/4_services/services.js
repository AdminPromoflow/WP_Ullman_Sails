document.addEventListener('DOMContentLoaded', function () {
  const servicesSection = document.querySelector('.events-section');
  if (!servicesSection) return;

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReducedMotion) {
    servicesSection.classList.add('is-visible');
    return;
  }

  const observer = new IntersectionObserver(function (entries, obs) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        servicesSection.classList.add('is-visible');
        obs.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.22,
    rootMargin: '0px 0px -8% 0px'
  });

  observer.observe(servicesSection);
});
