class PageArrows {
  constructor({
    upId='arrow_up_page',
    downId='arrow_down_page',
    header=80,
    duration=500,
    margin=40,
    step='page',      // 'page' | 'px' | 'ratio'
    stepPx=100000,       // si step='px'
    stepRatio=0.15    // si step='ratio'
  } = {}) {
    this.up = document.getElementById(upId);
    this.down = document.getElementById(downId);
    if (!this.up && !this.down) return;

    this.header = header;
    this.duration = duration;
    this.margin = margin;

    this.step = step;
    this.stepPx = stepPx;
    this.stepRatio = stepRatio;

    this.raf = 0;

    this.update = this.update.bind(this);
    this.onUp = () => this.page(-1);
    this.onDown = () => this.page(1);

    this.up?.addEventListener('click', this.onUp);
    this.down?.addEventListener('click', this.onDown);
    addEventListener('scroll', this.update, { passive: true });
    addEventListener('resize', this.update);
    this.update();
  }

  reduce(){ return matchMedia?.('(prefers-reduced-motion: reduce)')?.matches; }
  ease(t){ return t < .5 ? 4*t*t*t : 1 - Math.pow(-2*t+2,3)/2; }

  getStep() {
    if (this.step === 'px') return this.stepPx;
    if (this.step === 'ratio') return innerHeight * this.stepRatio - this.header;
    return innerHeight - this.header; // 'page'
  }

  scrollToY(y) {
    if (this.reduce()) return scrollTo(0, y);
    cancelAnimationFrame(this.raf);

    const start = scrollY;
    const max = document.documentElement.scrollHeight - innerHeight;
    const end = Math.max(0, Math.min(y, max));
    const d = end - start;
    if (Math.abs(d) < 1) return;

    const t0 = performance.now();
    const step = now => {
      const p = Math.min(1, (now - t0) / this.duration);
      scrollTo(0, start + d * this.ease(p));
      this.raf = p < 1 ? requestAnimationFrame(step) : 0;
    };
    this.raf = requestAnimationFrame(step);
  }

  page(dir) { this.scrollToY(scrollY + this.getStep() * dir); }

  update() {
    const y = scrollY;
    const max = document.documentElement.scrollHeight - innerHeight;
    this.up && (this.up.style.display = y > this.header + this.margin ? 'block' : 'none');
    this.down && (this.down.style.display = y < max - this.margin ? 'block' : 'none');
  }

  destroy() {
    this.up?.removeEventListener('click', this.onUp);
    this.down?.removeEventListener('click', this.onDown);
    removeEventListener('scroll', this.update);
    removeEventListener('resize', this.update);
    cancelAnimationFrame(this.raf);
    this.raf = 0;
  }
}

// Ejemplos:
// new PageArrows({ step: 'page' });           // pantallazo (actual)
// new PageArrows({ step: 'ratio', stepRatio: 0.7 }); // 70% de pantalla
// new PageArrows({ step: 'px', stepPx: 450 });       // 450px
document.addEventListener('DOMContentLoaded', () => new PageArrows());
