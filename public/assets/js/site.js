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
        if (isOpen) {
            closeMenu();
            return;
        }
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
            const wasOpen = mainNav.classList.contains('is-open');
            closeMenu();
            if (wasOpen) {
                menuButton.focus();
            }
        }
    });

    document.addEventListener('click', (event) => {
        if (!mainNav.contains(event.target) && !menuButton.contains(event.target)) {
            closeMenu();
        }
    });

    window.matchMedia('(max-width: 850px)').addEventListener('change', closeMenu);
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
    const announcement = productGallery.querySelector('[data-gallery-announcement]');
    const seatViewer = productGallery.querySelector('[data-product-360]');
    const seatViewerHint = productGallery.querySelector('[data-product-360-hint]');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const initialIndex = Number.parseInt(productGallery.dataset.initialProduct ?? '0', 10);
    const savedIndex = Number.parseInt(safeSessionStorage.get('fujiSeat.productGalleryIndex') ?? String(initialIndex), 10);
    let index = Number.isInteger(savedIndex) && savedIndex >= 0 && savedIndex < images.length ? savedIndex : 0;
    let timer;
    let isPaused = false;
    let seatFrame = 0;
    let dragStartX = null;

    const showSeatFrame = (frame) => {
        seatFrame = ((frame % 8) + 8) % 8;
        seatViewer.style.backgroundPosition = `${(seatFrame % 4) * 100 / 3}% ${seatFrame < 4 ? 0 : 100}%`;
    };

    seatViewer?.addEventListener('pointerdown', (event) => {
        clearInterval(timer);
        dragStartX = event.clientX;
        seatViewer.setPointerCapture(event.pointerId);
    });
    seatViewer?.addEventListener('pointermove', (event) => {
        if (dragStartX === null) {
            return;
        }
        const frameChange = Math.trunc((event.clientX - dragStartX) / 24);
        if (frameChange !== 0) {
            showSeatFrame(seatFrame + frameChange);
            dragStartX += frameChange * 24;
        }
    });
    seatViewer?.addEventListener('pointerup', () => { dragStartX = null; startTimer(); });
    seatViewer?.addEventListener('pointercancel', () => { dragStartX = null; startTimer(); });
    seatViewer?.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
            event.preventDefault();
            showSeatFrame(seatFrame + (event.key === 'ArrowRight' ? 1 : -1));
        }
    });

    const showProduct = (nextIndex, announce = false) => {
        index = ((nextIndex % images.length) + images.length) % images.length;
        const rotationSprite = images[index].dataset.productRotationSprite;
        images.forEach((item, itemIndex) => {
            const isActive = itemIndex === index && !(seatViewer && rotationSprite);
            item.classList.toggle('is-active', isActive);
            item.setAttribute('aria-hidden', String(!isActive));
        });
        if (seatViewer) {
            seatViewer.hidden = !rotationSprite;
            seatViewer.style.backgroundImage = rotationSprite ? `url("${rotationSprite}")` : '';
            seatViewer.style.setProperty('--seat-frame-aspect', rotationSprite.endsWith('/seat-360-sprite.png') ? '3 / 4' : '1');
            seatViewer.setAttribute('aria-label', `${images[index].dataset.productName} illustrative seat, rotatable 360 degrees. Drag or use left and right arrow keys to rotate.`);
            seatViewerHint.hidden = !rotationSprite;
            showSeatFrame(0);
        }
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
        const launchFact = productGallery.querySelector('[data-product-fact="launch"]');
        const vehicleTypeFact = productGallery.querySelector('[data-product-fact="vehicle-type"]');
        if (launchFact) {
            launchFact.textContent = images[index].dataset.productLaunch;
        }
        if (vehicleTypeFact) {
            vehicleTypeFact.textContent = images[index].dataset.productVehicleType;
        }
        const companyFact = productGallery.querySelector('[data-product-fact="company"]');
        const productionStatusFact = productGallery.querySelector('[data-product-fact="production-status"]');
        if (companyFact) {
            companyFact.textContent = images[index].dataset.productCompany;
        }
        if (productionStatusFact) {
            productionStatusFact.textContent = images[index].dataset.productProductionStatus;
        }
        if (productLink) {
            productLink.setAttribute('href', '#product-' + (images[index].dataset.productTarget ?? (index + 1)));
        }
        if (productCurrent) {
            productCurrent.textContent = String(index + 1).padStart(2, '0');
        }
        if (announce && announcement) {
            announcement.textContent = images[index].dataset.productName + ', product ' + (index + 1) + ' of ' + images.length;
        }
        safeSessionStorage.set('fujiSeat.productGalleryIndex', index);
    };

    const startTimer = () => {
        clearInterval(timer);
        if (images.length > 1 && !isPaused && !document.hidden && !productGallery.matches(':hover') && !productGallery.contains(document.activeElement) && !reducedMotion.matches) {
            timer = setInterval(() => showProduct(index + 1), 5000);
        }
    };

    productGallery.querySelectorAll('[data-gallery-previous]').forEach((button) => button.addEventListener('click', () => { showProduct(index - 1, true); startTimer(); }));
    productGallery.querySelectorAll('[data-gallery-next]').forEach((button) => button.addEventListener('click', () => { showProduct(index + 1, true); startTimer(); }));
    dots.forEach((dot, dotIndex) => dot.addEventListener('click', () => { showProduct(dotIndex, true); startTimer(); }));
    productGallery.addEventListener('mouseenter', () => clearInterval(timer));
    productGallery.addEventListener('mouseleave', startTimer);
    productGallery.addEventListener('focusin', () => clearInterval(timer));
    productGallery.addEventListener('focusout', () => requestAnimationFrame(startTimer));
    document.addEventListener('visibilitychange', startTimer);
    reducedMotion.addEventListener('change', startTimer);
    pauseButton?.addEventListener('click', () => {
        isPaused = !isPaused;
        pauseButton.textContent = isPaused ? 'Resume' : 'Pause';
        pauseButton.setAttribute('aria-pressed', String(isPaused));
        pauseButton.setAttribute('aria-label', isPaused ? 'Resume automatic product slideshow' : 'Pause automatic product slideshow');
        startTimer();
    });
    if (images.length) {
        productGallery.querySelectorAll('[data-gallery-controls]').forEach((control) => { control.hidden = false; });
        showProduct(index);
        startTimer();
    }
}

const productsPage = document.querySelector('.products-content');

if (productsPage) {
    const catalog = productsPage.querySelector('[data-product-catalog]');
    const filters = [...catalog.querySelectorAll('[data-product-filter]')];
    const items = [...catalog.querySelectorAll('[data-catalog-item]')];
    const groups = [...catalog.querySelectorAll('[data-catalog-group]')];
    const resultCount = catalog.querySelector('[data-filter-count]');
    const vehicleProducts = catalog.querySelector('#vehicle-products');
    const categoryProducts = catalog.querySelector('#category-products');
    const categoriesSection = catalog.querySelector('#product-categories');

    const filterProducts = (category) => {
        filters.forEach((filter) => {
            const isActive = filter.dataset.productFilter === category;
            filter.classList.toggle('is-active', isActive);
            filter.setAttribute('aria-pressed', String(isActive));
        });
        items.forEach((item) => {
            item.hidden = category !== 'all' && !item.dataset.productCategory.split(' ').includes(category);
        });
        groups.forEach((group) => {
            group.hidden = ![...group.querySelectorAll('[data-catalog-item]')].some((item) => !item.hidden);
        });
        const productCount = vehicleProducts.querySelectorAll('[data-catalog-item]:not([hidden])').length;
        const categoryCount = categoryProducts.querySelectorAll('[data-catalog-item]:not([hidden])').length;
        const counts = [];
        if (productCount) {
            counts.push(productCount + ' vehicle product' + (productCount === 1 ? '' : 's'));
        }
        if (categoryCount) {
            counts.push(categoryCount + ' categor' + (categoryCount === 1 ? 'y' : 'ies'));
        }
        resultCount.textContent = counts.join(' / ');
        categoriesSection.classList.toggle('is-filtered-only', vehicleProducts.hidden);
    };

    catalog.querySelector('.product-filters').hidden = false;
    filters.forEach((button) => button.addEventListener('click', () => filterProducts(button.dataset.productFilter)));

    productsPage.querySelector('[data-show-categories]')?.addEventListener('click', () => {
        filterProducts('all');
    });
    productsPage.querySelectorAll('[data-show-all-products]').forEach((link) => {
        link.addEventListener('click', () => filterProducts('all'));
    });
    productsPage.querySelector('[data-product-link]')?.addEventListener('click', (event) => {
        const target = document.getElementById(event.currentTarget.hash.slice(1));
        if (target?.hidden) {
            filterProducts('all');
        }
        target?.classList.remove('products-reveal-pending');
    });
    const revealAnchorTarget = () => {
        const target = document.getElementById(window.location.hash.slice(1));
        if (target?.matches('[data-catalog-item], #product-categories')) {
            if (target.hidden) {
                filterProducts('all');
            }
            target.classList.remove('products-reveal-pending');
        }
    };
    window.addEventListener('hashchange', revealAnchorTarget);
    revealAnchorTarget();

    const dialog = productsPage.querySelector('[data-product-dialog]');
    if (dialog && typeof dialog.showModal === 'function') {
        let dialogTrigger;
        productsPage.querySelectorAll('[data-item-details]').forEach((link) => {
            link.addEventListener('click', (event) => {
                if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
                    return;
                }
                event.preventDefault();
                dialogTrigger = link;
                const item = link.closest('[data-catalog-item]');
                const image = item.querySelector('img');
                dialog.querySelector('[data-dialog-title]').textContent = item.querySelector('h3').textContent;
                dialog.querySelector('[data-dialog-description]').textContent = item.querySelector('[data-item-description]').textContent;
                const dialogImage = dialog.querySelector('[data-dialog-image]');
                dialogImage.src = image.src;
                dialogImage.alt = image.alt;
                dialogImage.width = image.naturalWidth;
                dialogImage.height = image.naturalHeight;
                dialog.querySelector('[data-dialog-image-link]').href = image.src;
                dialog.showModal();
                document.body.classList.add('has-product-dialog');
            });
        });
        dialog.querySelector('[data-dialog-close]').addEventListener('click', () => dialog.close());
        dialog.addEventListener('close', () => {
            document.body.classList.remove('has-product-dialog');
            dialogTrigger?.focus({ preventScroll: true });
        });
        dialog.addEventListener('click', (event) => {
            const bounds = dialog.getBoundingClientRect();
            if (event.target === dialog && (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom)) {
                dialog.close();
            }
        });
    }

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    if ('IntersectionObserver' in window && !reducedMotion.matches) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('products-reveal-pending');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08 });
        productsPage.querySelectorAll('[data-product-reveal]').forEach((element) => {
            if (element.getBoundingClientRect().top > window.innerHeight) {
                element.classList.add('products-reveal-pending');
                revealObserver.observe(element);
            }
        });
        reducedMotion.addEventListener('change', () => {
            if (reducedMotion.matches) {
                productsPage.querySelectorAll('.products-reveal-pending').forEach((element) => element.classList.remove('products-reveal-pending'));
                revealObserver.disconnect();
            }
        });
    }
}
