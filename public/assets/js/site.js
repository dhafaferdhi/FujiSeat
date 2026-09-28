const menuButton = document.querySelector('.nav-toggle');
const mainNav = document.querySelector('.main-nav');

if (menuButton && mainNav) {
    const closeMenu = () => {
        menuButton.setAttribute('aria-expanded', 'false');
        menuButton.setAttribute('aria-label', 'Open navigation');
        mainNav.classList.remove('is-open');
    };

    menuButton.addEventListener('click', () => {
        const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', String(!isOpen));
        menuButton.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
        mainNav.classList.toggle('is-open', !isOpen);
    });

    mainNav.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            closeMenu();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });
}

const slider = document.querySelector('[data-slider]');

const safeSessionStorage = {
    get(key) {
        try {
            return window.sessionStorage.getItem(key);
        } catch {
            return null;
        }
    },
    set(key, value) {
        try {
            window.sessionStorage.setItem(key, String(value));
        } catch {
            // Ignore storage failures in private browsing or restricted environments.
        }
    },
};

if (slider) {
    const slides = [...slider.querySelectorAll('[data-slide]')];
    const dots = [...slider.querySelectorAll('[data-dot]')];
    const current = slider.querySelector('[data-current]');
    const savedIndex = Number.parseInt(safeSessionStorage.get('fujiSeat.sliderIndex') ?? '0', 10);
    let index = Number.isInteger(savedIndex) && savedIndex >= 0 && savedIndex < slides.length ? savedIndex : 0;
    let timer;

    const showSlide = (nextIndex) => {
        index = ((nextIndex % slides.length) + slides.length) % slides.length;
        slides.forEach((slide, slideIndex) => {
            const active = slideIndex === index;
            slide.classList.toggle('is-active', active);
            slide.setAttribute('aria-hidden', String(!active));
        });
        dots.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === index));
        safeSessionStorage.set('fujiSeat.sliderIndex', index);
        if (current) current.textContent = String(index + 1).padStart(2, '0');
    };

    const startTimer = () => {
        clearInterval(timer);
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            timer = setInterval(() => showSlide(index + 1), 6500);
        }
    };

    slider.querySelector('[data-previous]')?.addEventListener('click', () => { showSlide(index - 1); startTimer(); });
    slider.querySelector('[data-next]')?.addEventListener('click', () => { showSlide(index + 1); startTimer(); });
    dots.forEach((dot, dotIndex) => dot.addEventListener('click', () => { showSlide(dotIndex); startTimer(); }));
    slider.addEventListener('mouseenter', () => clearInterval(timer));
    slider.addEventListener('mouseleave', startTimer);
    showSlide(index);
    startTimer();
}

const productGallery = document.querySelector('[data-product-gallery]');

if (productGallery) {
    const images = [...productGallery.querySelectorAll('[data-gallery-image]')];
    const dots = [...productGallery.querySelectorAll('[data-gallery-dot]')];
    const productName = productGallery.querySelector('.product-feature-copy [data-product-name]');
    const productDetail = productGallery.querySelector('.product-feature-copy [data-product-detail]');
    const productLink = productGallery.querySelector('[data-product-link]');
    const productCurrent = productGallery.querySelector('[data-product-current]');
    const pauseButton = productGallery.querySelector('[data-gallery-pause]');
    const savedIndex = Number.parseInt(safeSessionStorage.get('fujiSeat.productGalleryIndex') ?? '0', 10);
    let index = Number.isInteger(savedIndex) && savedIndex >= 0 && savedIndex < images.length ? savedIndex : 0;
    let timer;
    let isPaused = false;

    const showProduct = (nextIndex) => {
        index = ((nextIndex % images.length) + images.length) % images.length;
        images.forEach((item, itemIndex) => item.classList.toggle('is-active', itemIndex === index));
        dots.forEach((item, itemIndex) => {
            const isActive = itemIndex === index;
            item.classList.toggle('is-active', isActive);
            item.setAttribute('aria-pressed', String(isActive));
        });
        if (productName) {
            productName.textContent = images[index].dataset.productName;
        }
        if (productDetail) {
            productDetail.textContent = images[index].dataset.productDetail;
        }
        if (productLink) {
            productLink.setAttribute('href', '#product-' + (index + 1));
        }
        if (productCurrent) {
            productCurrent.textContent = String(index + 1).padStart(2, '0');
        }
        safeSessionStorage.set('fujiSeat.productGalleryIndex', index);
    };

    const startTimer = () => {
        clearInterval(timer);
        if (!isPaused && !productGallery.matches(':hover') && !productGallery.contains(document.activeElement) && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            timer = setInterval(() => showProduct(index + 1), 5000);
        }
    };

    productGallery.querySelector('[data-gallery-previous]')?.addEventListener('click', () => { showProduct(index - 1); startTimer(); });
    productGallery.querySelector('[data-gallery-next]')?.addEventListener('click', () => { showProduct(index + 1); startTimer(); });
    dots.forEach((dot, dotIndex) => dot.addEventListener('click', () => { showProduct(dotIndex); startTimer(); }));
    productGallery.addEventListener('mouseenter', () => clearInterval(timer));
    productGallery.addEventListener('mouseleave', startTimer);
    productGallery.addEventListener('focusin', () => clearInterval(timer));
    productGallery.addEventListener('focusout', () => requestAnimationFrame(startTimer));
    pauseButton?.addEventListener('click', () => {
        isPaused = !isPaused;
        pauseButton.textContent = isPaused ? 'Resume' : 'Pause';
        pauseButton.setAttribute('aria-pressed', String(isPaused));
        pauseButton.setAttribute('aria-label', isPaused ? 'Resume automatic product slideshow' : 'Pause automatic product slideshow');
        startTimer();
    });
    showProduct(index);
    startTimer();
}
