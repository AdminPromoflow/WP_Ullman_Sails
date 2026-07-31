/* =========================
   Optional Contact Us buttons
========================= */

(() => {
  const buttonTitle = document.querySelectorAll(".OpenContactUs");

  buttonTitle.forEach((button) => {
    button.addEventListener("click", () => {
      window.open("../ContactUs/index.php", "_self");
    });
  });
})();

/* =========================
   Reveal only (IntersectionObserver + stagger)
========================= */

(() => {
  const items = Array.from(document.querySelectorAll(".sr-item"));
  if (!items.length) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (reduceMotion) {
    items.forEach((item) => item.classList.add("is-revealed"));
    return;
  }

  items.forEach((item, index) => {
    item.style.setProperty("--sr-delay", `${index * 90}ms`);
  });

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        entry.target.classList.add("is-revealed");
        obs.unobserve(entry.target);
      });
    },
    {
      threshold: 0.18,
      rootMargin: "0px 0px -10% 0px"
    }
  );

  items.forEach((item) => observer.observe(item));
})();
