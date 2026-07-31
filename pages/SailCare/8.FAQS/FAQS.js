/* tips.js — Accordion (smooth open/close + aria + hidden) */
(() => {
  const DURATION = 520; // ms (sube este número si lo quieres aún más lento)

  function setupAccordion(acc) {
    const items = Array.from(acc.querySelectorAll(".acc__item"));

    // Para medir alturas, el panel debe existir
    const getPanel = (item) => item.querySelector(".acc__content");
    const getBtn = (item) => item.querySelector(".acc__btn");

    const prepPanel = (panel) => {
      if (!panel) return;
      panel.style.overflow = "hidden";
      panel.style.transition = `max-height ${DURATION}ms ease, opacity ${DURATION}ms ease`;
      if (!panel.style.maxHeight) panel.style.maxHeight = "0px";
      if (!panel.style.opacity) panel.style.opacity = "0";
    };

    const animateOpen = (panel) => {
      if (!panel) return;

      // 1) mostrar para poder medir
      panel.hidden = false;

      // 2) preparar estilos
      prepPanel(panel);

      // 3) set estado inicial (cerrado)
      panel.style.maxHeight = "0px";
      panel.style.opacity = "0";

      // 4) next frame => abrir hacia altura real
      requestAnimationFrame(() => {
        const full = panel.scrollHeight;
        panel.style.maxHeight = full + "px";
        panel.style.opacity = "1";
      });

      // 5) al terminar, deja max-height auto-like (grande) para que responda a cambios de contenido
      window.setTimeout(() => {
        // Si sigue abierto, “liberamos” maxHeight
        if (!panel.closest(".acc__item")?.classList.contains("is-open")) return;
        panel.style.maxHeight = "999px";
      }, DURATION + 40);
    };

    const animateClose = (panel) => {
      if (!panel) return;

      prepPanel(panel);

      // Si estaba en 999px, igual medimos y cerramos
      const full = panel.scrollHeight;
      panel.style.maxHeight = full + "px";
      panel.style.opacity = "1";

      requestAnimationFrame(() => {
        panel.style.maxHeight = "0px";
        panel.style.opacity = "0";
      });

      // al finalizar, ocultar de verdad
      window.setTimeout(() => {
        // Si sigue cerrado, ocultamos
        if (panel.closest(".acc__item")?.classList.contains("is-open")) return;
        panel.hidden = true;
      }, DURATION + 40);
    };

    const closeItem = (item) => {
      item.classList.remove("is-open");
      const btn = getBtn(item);
      const panel = getPanel(item);
      if (btn) btn.setAttribute("aria-expanded", "false");
      animateClose(panel);
    };

    const openItem = (item) => {
      item.classList.add("is-open");
      const btn = getBtn(item);
      const panel = getPanel(item);
      if (btn) btn.setAttribute("aria-expanded", "true");
      animateOpen(panel);
    };

    // Init: respeta .is-open al cargar
    items.forEach((item) => {
      const btn = getBtn(item);
      const panel = getPanel(item);
      const isOpen = item.classList.contains("is-open");

      if (btn) btn.setAttribute("aria-expanded", isOpen ? "true" : "false");
      if (panel) {
        prepPanel(panel);
        if (isOpen) {
          panel.hidden = false;
          panel.style.opacity = "1";
          panel.style.maxHeight = "999px";
        } else {
          panel.hidden = true;
          panel.style.opacity = "0";
          panel.style.maxHeight = "0px";
        }
      }
    });

    acc.addEventListener("click", (e) => {
      const btn = e.target.closest(".acc__btn");
      if (!btn || !acc.contains(btn)) return;

      const item = btn.closest(".acc__item");
      if (!item) return;

      const isOpen = item.classList.contains("is-open");

      // modo acordeón (cierra otros)
      items.forEach((it) => {
        if (it !== item) closeItem(it);
      });

      // toggle actual
      if (isOpen) closeItem(item);
      else openItem(item);
    });
  }

  window.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-acc]").forEach(setupAccordion);
  });
})();
