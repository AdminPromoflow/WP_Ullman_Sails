// Slider.js
class HomeSlider {
  constructor(rootSelector = ".home-slider", options = {}) {
    this.root = document.querySelector(rootSelector);
    if (!this.root) return;

    this.track   = this.root.querySelector("#homeSliderTrack");
    this.btnPrev = this.root.querySelector("#homeSliderPrev");
    this.btnNext = this.root.querySelector("#homeSliderNext");
    if (!this.track) return;

    this.intervalMs   = options.intervalMs ?? 5000;
    this.reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches ?? false;

    this.slides = Array.from(this.track.querySelectorAll(".home-slider__slide"));
    this.total  = this.slides.length;

    this.hasClones =
      this.total >= 3 &&
      this.slides[0]?.dataset.clone === "last" &&
      this.slides[this.total - 1]?.dataset.clone === "first";

    if (this.hasClones) {
      this.slides[0].setAttribute("data-is-clone", "1");
      this.slides[this.total - 1].setAttribute("data-is-clone", "1");
    }

    this.index = this.hasClones ? 1 : 0;

    this.isAnimating = false;
    this.paused = false;
    this.timer = null;

    this.updateMetrics();
    this.bind();

    this.jumpTo(this.index);

    if (!this.reduceMotion) this.start();
  }

  updateMetrics() {
    this.slideW = this.root.getBoundingClientRect().width || window.innerWidth;
  }

  setTransition(on) {
    if (this.reduceMotion) {
      this.track.style.transition = "none";
      return;
    }
    this.track.style.transition = on
      ? "transform .9s cubic-bezier(.2,.9,.2,1)"
      : "none";
  }

  applyTransform() {
    this.track.style.transform = `translate3d(${-this.index * this.slideW}px, 0, 0)`;
  }

  setActive() {
    this.slides.forEach((s) => s.classList.remove("is-active"));
    const active = this.slides[this.index];
    if (!active) return;
    void active.offsetWidth;
    active.classList.add("is-active");
  }

  jumpTo(i) {
    this.index = i;
    this.setTransition(false);
    this.applyTransform();
    this.track.offsetHeight;
    this.setTransition(true);
    this.setActive();
    this.isAnimating = false;
  }

  goTo(i) {
    if (this.total < 2) return;

    if (this.reduceMotion) {
      if (this.hasClones) {
        if (i <= 0) i = this.total - 2;
        if (i >= this.total - 1) i = 1;
      } else {
        if (i < 0) i = this.total - 1;
        if (i > this.total - 1) i = 0;
      }
      this.index = i;
      this.setTransition(false);
      this.applyTransform();
      this.setActive();
      return;
    }

    if (this.isAnimating) return;
    this.isAnimating = true;

    this.index = i;
    this.setTransition(true);
    this.applyTransform();
    this.setActive();
  }

  next() { this.goTo(this.index + 1); }
  prev() { this.goTo(this.index - 1); }

  fixLoopIfNeeded() {
    if (!this.hasClones) return;

    if (this.index === 0) {
      this.jumpTo(this.total - 2);
      return;
    }
    if (this.index === this.total - 1) {
      this.jumpTo(1);
      return;
    }
  }

  bind() {
    this.btnNext?.addEventListener("click", () => this.next());
    this.btnPrev?.addEventListener("click", () => this.prev());

    this.track.addEventListener("transitionend", (e) => {
      if (e.propertyName !== "transform") return;
      this.fixLoopIfNeeded();
      this.isAnimating = false;
    });

    this.root.addEventListener("mouseenter", () => (this.paused = true));
    this.root.addEventListener("mouseleave", () => (this.paused = false));
    this.root.addEventListener("focusin", () => (this.paused = true));
    this.root.addEventListener("focusout", () => (this.paused = false));

    document.addEventListener("visibilitychange", () => {
      this.paused = document.hidden;
    });

    let t = null;
    window.addEventListener("resize", () => {
      clearTimeout(t);
      t = setTimeout(() => {
        this.updateMetrics();
        this.jumpTo(this.index);
      }, 120);
    });

    this.root.setAttribute("tabindex", "0");
    this.root.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") this.next();
      if (e.key === "ArrowLeft") this.prev();
    });
  }

  start() {
    this.stop();
    this.timer = setInterval(() => {
      if (!this.paused) this.next();
    }, this.intervalMs);
  }

  stop() {
    if (this.timer) clearInterval(this.timer);
    this.timer = null;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new HomeSlider(".home-slider", { intervalMs: 5000 });
});
