<header class="luxury-header">
    <div class="container-fluid px-lg-5 px-3">
        <div class="d-flex align-items-center justify-content-between">

            <!-- BRAND / LOGO -->
            <a href="{{ route('home') }}" class="brand-container" aria-label="Sara's Boutique Home">
                <img src="{{ asset('assets/img/logo1.png') }}" alt="Sara's Boutique - Fashion · Elegance · You" class="brand-logo-img">
            </a>

                <nav class="d-none d-lg-block">
    <ul class="nav-luxury-links">

        <li>
            <a href="{{ route('home') }}"
               class="nav-luxury-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>
        </li>

        <li>
            <a href="{{ route('collections') }}"
               class="nav-luxury-link {{ request()->routeIs('collections') || request()->routeIs('product.show') ? 'active' : '' }}">
                Collections
            </a>
        </li>

        <li>
            <a href="{{ route('home') }}#newarrivals"
               class="nav-luxury-link">
                New Arrivals
            </a>
        </li>

        <li>
            <a href="{{ route('home') }}#bestsellers"
               class="nav-luxury-link">
                Best Sellers
            </a>
        </li>

        <li>
            <a href="{{ route('about') }}"
               class="nav-luxury-link {{ request()->routeIs('about') ? 'active' : '' }}">
                About Us
            </a>
        </li>

        <li>
            <a href="{{ route('contact') }}"
               class="nav-luxury-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                Contact
            </a>
        </li>

    </ul>
</nav>

            

            <div class="d-flex align-items-center gap-3">
                <div class="nav-actions">
                    <!-- Search Icon -->
                    <button type="button" class="action-icon-btn" data-bs-toggle="modal"
                        data-bs-target="#searchModal" title="Search Collection" aria-label="Search">
                        <i class="bi bi-search"></i>
                    </button>

                    <!-- User profile / Admin Login -->
                    <!-- <a href="{{ route('admin.dashboard') }}" class="action-icon-btn" title="Account / Admin Portal"
                        aria-label="Account">
                        <i class="bi bi-person"></i>
                    </a> -->

                    <!-- Wishlist icon -->
                    <a href="{{ route('collections') }}" class="action-icon-btn position-relative" title="Wishlist" aria-label="Wishlist">
                        <i class="bi bi-heart"></i>
                    </a>
                </div>

                <!-- Mobile Hamburger Toggle -->
                <button class="luxury-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const navLinks = document.querySelectorAll('.nav-luxury-link');

    function updateActiveNav() {
        const hash = window.location.hash;

        // If we're on New Arrivals
        if (hash === '#newarrivals') {
            navLinks.forEach(link => link.classList.remove('active'));

            const newArrivalsLink = document.querySelector(
                '.nav-luxury-link[href*="#newarrivals"]'
            );

            if (newArrivalsLink) {
                newArrivalsLink.classList.add('active');
            }

            return;
        }

        // If we're on Best Sellers
        if (hash === '#bestsellers') {
            navLinks.forEach(link => link.classList.remove('active'));

            const bestSellersLink = document.querySelector(
                '.nav-luxury-link[href*="#bestsellers"]'
            );

            if (bestSellersLink) {
                bestSellersLink.classList.add('active');
            }

            return;
        }

        // For Home, Collections, About and Contact,
        // let Laravel Blade handle the active class.
    }

    updateActiveNav();

    window.addEventListener('hashchange', updateActiveNav);

});
</script>