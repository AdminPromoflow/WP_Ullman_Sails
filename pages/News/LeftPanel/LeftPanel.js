document.addEventListener("DOMContentLoaded", () => {
  const homeButton = document.getElementById("goHome");
  const logoButton = document.getElementById("logoNews");
  const menuLinks = document.querySelectorAll(".item-left-panel");

  function goToHome() {
    window.location.href = "../Home/";
  }

  function setActiveLink(targetId) {
    menuLinks.forEach(link => {
      link.classList.toggle("is-active", link.dataset.target === targetId);
    });
  }

  function goToArticle(targetId) {
    const target = document.getElementById(targetId);
    if (!target) return;

    target.scrollIntoView({
      behavior: "smooth",
      block: "start"
    });

    setActiveLink(targetId);
  }

  if (homeButton) {
    homeButton.addEventListener("click", goToHome);
  }

  if (logoButton) {
    logoButton.addEventListener("click", goToHome);
  }

  menuLinks.forEach(link => {
    link.addEventListener("click", () => {
      const targetId = link.dataset.target;
      goToArticle(targetId);
    });
  });

  const articles = document.querySelectorAll(".news-card[id]");

  if ("IntersectionObserver" in window && articles.length) {
    const observer = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            setActiveLink(entry.target.id);
          }
        });
      },
      {
        root: null,
        threshold: 0.35
      }
    );

    articles.forEach(article => observer.observe(article));
  }
});
