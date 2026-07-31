document.addEventListener("DOMContentLoaded", () => {
  const articles = [...document.querySelectorAll(".news-card[data-title]")];
  const index = document.getElementById("newsIndex");

  if (index && articles.length) {
    const fragment = document.createDocumentFragment();

    articles.forEach((article) => {
      const link = document.createElement("a");
      link.href = `#${article.id}`;
      link.textContent = article.dataset.title || "Article";
      fragment.appendChild(link);
    });

    index.appendChild(fragment);
  }

  const revealItems = document.querySelectorAll(".reveal");

  if ("IntersectionObserver" in window) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target);
      });
    }, {
      threshold: 0.12,
      rootMargin: "0px 0px -40px 0px"
    });

    revealItems.forEach((item) => revealObserver.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add("is-visible"));
  }

  const navLinks = [...document.querySelectorAll("#newsIndex a")];

  if ("IntersectionObserver" in window && navLinks.length) {
    const activeObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const id = entry.target.id;
        navLinks.forEach((link) => {
          link.classList.toggle("is-active", link.getAttribute("href") === `#${id}`);
        });
      });
    }, {
      threshold: 0.35,
      rootMargin: "-20% 0px -55% 0px"
    });

    articles.forEach((article) => activeObserver.observe(article));
  }
});
