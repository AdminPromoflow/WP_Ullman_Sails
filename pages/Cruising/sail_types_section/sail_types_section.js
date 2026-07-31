/* =======================
   sail_types_section.js
   (Solo slider, sin animación en el texto)
   ======================= */

// Cruising - Sail Types slider (arrows + dots) - smooth wrap + no dead clicks
(() => {
  const section = document.querySelector(".sail-types-section");
  if (!section) return;

  const container = section.querySelector(".sail-types-container");
  const scroller  = section.querySelector(".sail-types-scroller-container");
  const boxes     = Array.from(section.querySelectorAll(".sail-types-box"));
  const dots      = Array.from(section.querySelectorAll(".sail-types-dot"));
  const btnLeft   = section.querySelector(".sail-types-arrow-left");
  const btnRight  = section.querySelector(".sail-types-arrow-right");

  if (!container || !scroller || boxes.length === 0) return;

  let index = 0;
  let currentX = 0;

  const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;

  function getStep() {
    const box = boxes[0];
    const styles = window.getComputedStyle(box);
    const ml = parseFloat(styles.marginLeft) || 0;
    const mr = parseFloat(styles.marginRight) || 0;
    return box.offsetWidth + ml + mr;
  }

  function getMaxTranslate() {
    return Math.max(0, scroller.scrollWidth - container.clientWidth);
  }

  function getTranslateX(i) {
    const raw = i * getStep();
    return Math.min(raw, getMaxTranslate());
  }

  function nearlyEqual(a, b) {
    return Math.abs(a - b) < 1;
  }

  function setActiveDot(i) {
    if (!dots.length) return;
    dots.forEach((d) => d.classList.remove("is-active"));
    if (dots[i]) dots[i].classList.add("is-active");
  }

  function setDynamicDuration(fromX, toX, isWrap) {
    if (reduceMotion) {
      scroller.style.transitionDuration = "0ms";
      return;
    }
    const dist = Math.abs(toX - fromX);
    let ms = Math.min(900, Math.max(350, (dist / 1000) * 600));
    if (isWrap) ms = Math.min(1100, ms + 200);
    scroller.style.transitionDuration = `${Math.round(ms)}ms`;
  }

  function applyTransform(i, animate = true, isWrap = false) {
    const toX = getTranslateX(i);
    const fromX = currentX;

    if (!animate) {
      scroller.classList.add("no-transition");
      scroller.style.transform = `translateX(${-toX}px)`;
      scroller.offsetWidth;
      scroller.classList.remove("no-transition");
      currentX = toX;
      return;
    }

    setDynamicDuration(fromX, toX, isWrap);
    scroller.style.transform = `translateX(${-toX}px)`;
    currentX = toX;
  }

  function goTo(i, { wrap = false } = {}) {
    const max = boxes.length - 1;

    let target = i;
    if (target < 0) target = max;
    if (target > max) target = 0;

    index = target;
    applyTransform(index, true, wrap);
    setActiveDot(index);
  }

  if (btnRight) {
    btnRight.addEventListener("click", () => {
      const max = boxes.length - 1;
      const curX = getTranslateX(index);

      let next = index + 1;

      if (next > max) return goTo(0, { wrap: true });

      while (next <= max && nearlyEqual(getTranslateX(next), curX)) next++;

      if (next > max) goTo(0, { wrap: true });
      else goTo(next);
    });
  }

  if (btnLeft) {
    btnLeft.addEventListener("click", () => {
      const max = boxes.length - 1;
      const curX = getTranslateX(index);

      let prev = index - 1;

      if (prev < 0) return goTo(max, { wrap: true });

      while (prev >= 0 && nearlyEqual(getTranslateX(prev), curX)) prev--;

      if (prev < 0) goTo(max, { wrap: true });
      else goTo(prev);
    });
  }

  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      const i = Number(dot.getAttribute("data-index"));
      if (!Number.isNaN(i)) goTo(i);
    });
  });

  window.addEventListener("resize", () => {
    applyTransform(index, false);
    setActiveDot(index);
  });

  applyTransform(0, false);
  setActiveDot(0);
})();
