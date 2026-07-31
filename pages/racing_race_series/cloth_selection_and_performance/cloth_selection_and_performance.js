document.addEventListener("DOMContentLoaded", () => {
  const rotator = document.querySelector(".nav-rotator");
  if (!rotator) return;

  const interval = parseInt(rotator.dataset.interval || "3000", 10);
  const imgs = Array.from(rotator.querySelectorAll(".nav-rotator__img"));
  const dots = Array.from(rotator.querySelectorAll(".nav-rotator__dot"));
  const capSub = rotator.querySelector("#navCapSub");

  if (!imgs.length || !capSub) return;

  let i = 0;

  function setActive(index){
    imgs.forEach((img, idx) => img.classList.toggle("is-active", idx === index));
    dots.forEach((dot, idx) => dot.classList.toggle("is-active", idx === index));

    // fade del texto (bonito)
    capSub.classList.add("is-fading");
    setTimeout(() => {
      capSub.textContent = imgs[index].dataset.sub || "MAINSAIL";
      capSub.classList.remove("is-fading");
    }, 220);
  }

  // Estado inicial
  setActive(0);

  // Rotación
  setInterval(() => {
    i = (i + 1) % imgs.length;
    setActive(i);
  }, interval);
});
