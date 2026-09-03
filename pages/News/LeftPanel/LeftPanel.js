document.addEventListener("DOMContentLoaded", () => {
  const homeButton = document.getElementById("goHome");
  const logoButton = document.getElementById("logoNews");
  const panel = document.getElementById("leftPanel");

  function goToHome() {
    const homeUrl = panel?.dataset.homeUrl;
    if (homeUrl) window.location.href = homeUrl;
  }

  homeButton?.addEventListener("click", goToHome);
  logoButton?.addEventListener("click", goToHome);
});
