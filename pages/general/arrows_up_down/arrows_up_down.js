class PageArrows {
  constructor({
    upId = 'arrow_up_page',
    downId = 'arrow_down_page',
    header = 80,
    margin = 32,
    stepRatio = 0.72
  } = {}) {
    this.up = document.getElementById(upId);
    this.down = document.getElementById(downId);
    if (!this.up && !this.down) return;

    this.header = header;
    this.margin = margin;
    this.stepRatio = stepRatio;

    this.update = this.update.bind(this);
    this.onUp = event => this.scrollPage(event, -1);
    this.onDown = event => this.scrollPage(event, 1);

    this.up?.addEventListener('click', this.onUp);
    this.down?.addEventListener('click', this.onDown);
    window.addEventListener('scroll', this.update, { passive: true });
    window.addEventListener('resize', this.update);
    window.visualViewport?.addEventListener('resize', this.update);
    this.update();
  }

  prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  viewportHeight() {
    return window.visualViewport?.height || window.innerHeight;
  }

  maxScrollY() {
    return Math.max(0, document.documentElement.scrollHeight - this.viewportHeight());
  }

  getStep() {
    return Math.max(280, Math.round(this.viewportHeight() * this.stepRatio));
  }

  scrollPage(event, direction) {
    event.preventDefault();

    const target = Math.max(
      0,
      Math.min(window.scrollY + (this.getStep() * direction), this.maxScrollY())
    );

    window.scrollTo({
      top: target,
      behavior: this.prefersReducedMotion() ? 'auto' : 'smooth'
    });
  }

  update() {
    const y = window.scrollY;
    const max = this.maxScrollY();

    if (this.up) {
      this.up.style.display = y > this.header + this.margin ? 'flex' : 'none';
    }

    if (this.down) {
      this.down.style.display = y < max - this.margin ? 'flex' : 'none';
    }
  }

  destroy() {
    this.up?.removeEventListener('click', this.onUp);
    this.down?.removeEventListener('click', this.onDown);
    window.removeEventListener('scroll', this.update);
    window.removeEventListener('resize', this.update);
    window.visualViewport?.removeEventListener('resize', this.update);
  }
}

document.addEventListener('DOMContentLoaded', () => new PageArrows());
