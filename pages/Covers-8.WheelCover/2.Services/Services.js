/* =========================
   Reveal only (IntersectionObserver + stagger)
   (Save as: ../Covers/2.Services/Services.js)
========================= */
(() => {
  const sections = Array.from(document.querySelectorAll("[data-sr-reveal]"));
  if (!sections.length) return;

  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  sections.forEach((section) => {
    if (section.dataset.srDone === "1") return;
    section.dataset.srDone = "1";

    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (!items.length) return;

    if (reduce) {
      items.forEach((el) => el.classList.add("is-revealed"));
      return;
    }

    // same feel as your Stack Pack (90ms stagger)
    items.forEach((el, i) => el.style.setProperty("--sr-delay", `${i * 90}ms`));

    let remaining = items.length;

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          entry.target.classList.add("is-revealed");
          io.unobserve(entry.target);

          remaining -= 1;
          if (remaining <= 0) io.disconnect(); // ✅ once per section
        });
      },
      { threshold: 0.18, rootMargin: "0px 0px -10% 0px" }
    );

    items.forEach((el) => io.observe(el));
  });
})();
