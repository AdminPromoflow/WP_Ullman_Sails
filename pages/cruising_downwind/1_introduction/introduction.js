/* introduction.js — Reveal + Basic Parallax (no HTML changes) */
(() => {
  try {
    document.documentElement.classList.add("js-sr");

    const sections = Array.from(document.querySelectorAll("[data-sr-reveal]"));
    if (!sections.length) return;

    const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
    if (reduceMotion) {
      sections.forEach(s => s.classList.add("is-revealed"));
      return;
    }

    // ---- Reveal (stagger) ----
    sections.forEach((section) => {
      const items = Array.from(section.querySelectorAll("h1,h2,h3,h4,p,li,figure,img,hr,.sr-target"));
      const filtered = items.filter(el => el && !el.hasAttribute("data-sr-ignore"));

      filtered.forEach((el, i) => {
        el.classList.add("sr-item");
        el.style.setProperty("--sr-delay", `${i * 70}ms`);
        if (el.tagName === "HR") el.classList.add("sr-hr");
      });
    });

    if (!("IntersectionObserver" in window)) {
      sections.forEach(s => s.classList.add("is-revealed"));
    } else {
      const io = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-revealed");
            io.unobserve(entry.target);
          });
        },
        { threshold: 0.18, rootMargin: "0px 0px -10% 0px" }
      );
      sections.forEach(s => io.observe(s));
    }

    // ---- Basic Parallax (sets CSS vars) ----
    const intro = document.querySelector(".sailing-types-introduction");
    if (!intro) return;

    let raf = 0;

    const clamp = (v, min, max) => Math.max(min, Math.min(max, v));

    const update = () => {
      raf = 0;

      const r = intro.getBoundingClientRect();
      const vh = window.innerHeight || 1;

      // progress: 0 when top enters, 1 when it leaves
      const t = (r.top + r.height) / (vh + r.height);
      const p = 1 - clamp(t, 0, 1); // 0..1

      // subtle values
      intro.style.setProperty("--p-bg", `${(p - 0.5) * 18}px`);
      intro.style.setProperty("--p-logo", `${(p - 0.5) * -10}px`);
      intro.style.setProperty("--p-title", `${(p - 0.5) * -18}px`);
      intro.style.setProperty("--p-text", `${(p - 0.5) * -12}px`);
    };

    const onScroll = () => {
      if (raf) return;
      raf = requestAnimationFrame(update);
    };

    update();
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll, { passive: true });

  } catch (e) {
    console.error("Intro reveal/parallax error:", e);
  }
})();
