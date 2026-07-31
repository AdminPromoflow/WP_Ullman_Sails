console.log("✅ PARALLAX CARGÓ");

document.addEventListener('DOMContentLoaded', () => {
    // Verificar si el usuario prefiere movimiento reducido
    if (window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches) {
        console.log('Reduced motion preference detected, parallax disabled');
        return;
    }

    // Seleccionar todos los elementos con el atributo data-parallax
    const parallaxElements = document.querySelectorAll('[data-parallax]');
    if (!parallaxElements.length) {
        console.log('No parallax elements found');
        return;
    }

    console.log('Parallax initialized with', parallaxElements.length, 'elements');

    // Configuración por defecto
    const defaultConfig = {
        speed: 0.1,
        max: 30
    };

    // Estado para rastrear los elementos
    const elements = Array.from(parallaxElements).map(element => {
        const speed = parseFloat(element.getAttribute('data-speed')) || defaultConfig.speed;
        const max = parseFloat(element.getAttribute('data-max')) || defaultConfig.max;

        return {
            element,
            speed,
            max,
            top: 0,
            height: 0,
            active: true
        };
    });

    // Función para actualizar las posiciones
    function updatePositions() {
        const scrollY = window.scrollY;
        const viewportHeight = window.innerHeight;
        const viewportCenter = scrollY + (viewportHeight / 2);

        elements.forEach(item => {
            if (!item.active) return;

            const rect = item.element.getBoundingClientRect();
            const elementCenter = rect.top + scrollY + (rect.height / 2);
            const distanceFromViewportCenter = viewportCenter - elementCenter;

            // Calcular el desplazamiento con límites
            let offset = distanceFromViewportCenter * item.speed;
            offset = Math.max(-item.max, Math.min(item.max, offset));

            // Aplicar la transformación
            item.element.style.setProperty('--px-y', `${offset}px`);
        });
    }

    // Configurar el IntersectionObserver
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const element = elements.find(item => item.element === entry.target);
            if (element) {
                element.active = entry.isIntersecting;
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50% 0px'
    });

    // Observar todos los elementos
    elements.forEach(item => {
        observer.observe(item.element);
    });

    // Función para manejar el scroll con throttling
    let ticking = false;
    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                updatePositions();
                ticking = false;
            });
            ticking = true;
        }
    }

    // Event listeners
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);

    // Inicializar posiciones
    updatePositions();
});
