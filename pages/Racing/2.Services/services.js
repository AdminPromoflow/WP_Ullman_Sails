// =========================
// Navigator/Cruising slider + reveal + autoplay
// =========================
(() => {
  const section = document.querySelector("#navSeries");
  if (!section) return;

  // ---- Reveal (IntersectionObserver) ----
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (reduceMotion) {
    section.classList.add("is-visible");
  } else {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            section.classList.add("is-visible");
            io.disconnect();
          }
        });
      },
      { threshold: 0.18 }
    );
    io.observe(section);
  }

  // ---- Slider ----
  const slides = Array.from(section.querySelectorAll(".navSeries__slide"));
  const prevBtn = section.querySelector(".navSeries__arrow--prev");
  const nextBtn = section.querySelector(".navSeries__arrow--next");

  if (!slides.length || !prevBtn || !nextBtn) return;

  let index = slides.findIndex((s) => s.classList.contains("is-active"));
  if (index < 0) index = 0;

  const setActive = (newIndex) => {
    slides[index].classList.remove("is-active");
    index = (newIndex + slides.length) % slides.length;
    slides[index].classList.add("is-active");
  };

  // Animación suave (opcional, sin layout raro)
  // Agrega esto en tu CSS si quieres:
  // .navSeries__slide.is-active{ animation: nsFade .35s ease; }
  // @keyframes nsFade{ from{opacity:0; transform: translateY(6px);} to{opacity:1; transform:none;} }

  // ---- Autoplay (cada 10s) ----
  const AUTOPLAY_MS = 5000;
  let timer = null;
  let paused = false;

  const startAuto = () => {
    if (reduceMotion) return;           // respeta reduce motion
    stopAuto();
    timer = window.setInterval(() => {
      if (!paused) setActive(index + 1);
    }, AUTOPLAY_MS);
  };

  const stopAuto = () => {
    if (timer) window.clearInterval(timer);
    timer = null;
  };

  const restartAuto = () => startAuto();

  prevBtn.addEventListener("click", () => { setActive(index - 1); restartAuto(); });
  nextBtn.addEventListener("click", () => { setActive(index + 1); restartAuto(); });

  // Pausa en hover / focus (más cómodo)
  section.addEventListener("mouseenter", () => { paused = true; });
  section.addEventListener("mouseleave", () => { paused = false; });
  section.addEventListener("focusin", () => { paused = true; });
  section.addEventListener("focusout", () => { paused = false; });

  // Teclado (← / →)
  section.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") { setActive(index - 1); restartAuto(); }
    if (e.key === "ArrowRight") { setActive(index + 1); restartAuto(); }
  });

  // Arranca autoplay
  startAuto();
})();
