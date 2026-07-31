document.addEventListener('DOMContentLoaded', function () {
  const section = document.querySelector('.contactus-hero');
  if (!section) return;

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealSection = function () {
    section.classList.add('is-visible');
  };

  if (reduceMotion) {
    revealSection();
  } else {
    const observer = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        revealSection();
        obs.unobserve(entry.target);
      });
    }, {
      threshold: 0.2
    });

    observer.observe(section);
  }

  const video = section.querySelector('.contactus-video');
  if (!video) return;

  video.muted = true;
  video.autoplay = true;
  video.loop = true;
  video.playsInline = true;

  const playPromise = video.play();
  if (playPromise !== undefined) {
    playPromise.catch(function () {
      /* Silent fail if the browser delays autoplay */
    });
  }
});
