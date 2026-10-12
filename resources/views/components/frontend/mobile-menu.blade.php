<div class="offcanvas offcanvas-end offcanvas-luxury" tabindex="-1" id="mobileMenu"
    aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header border-bottom border-warning border-opacity-25 pb-3">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/img/logo1.png') }}" alt="Sara's Boutique"
                style="height: 52px; width: auto; object-fit: contain; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.5)) drop-shadow(0 0 10px rgba(212,175,55,0.3));">
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-between pt-4">
        <ul class="nav flex-column gap-3">
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('home') ? 'active' : '' }} fs-5" href="{{ route('home') }}" data-bs-dismiss="offcanvas">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('collections') ? 'active' : '' }} fs-5" href="{{ route('collections') }}">Collections</a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link fs-5" href="{{ route('home') }}#newarrivals" data-bs-dismiss="offcanvas">New Arrivals</a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link fs-5" href="{{ route('home') }}#bestsellers" data-bs-dismiss="offcanvas">Best Sellers</a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('about') ? 'active' : '' }} fs-5" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('contact') ? 'active' : '' }} fs-5" href="{{ route('contact') }}">Contact Us</a>
            </li>
            <li class="nav-item pt-2 border-top border-secondary border-opacity-25">
                <a class="nav-luxury-link fs-6 text-gold" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-shield-lock me-1"></i> Admin Portal
                </a>
            </li>
        </ul>

        <div class="border-top border-warning border-opacity-25 pt-4 mt-4">
            <div class="d-flex flex-column gap-2 mb-3">
                <a href="tel:+919876543210" class="text-white text-decoration-none small">
                    <i class="bi bi-telephone text-gold me-2"></i> +91 98765 43210
                </a>
                <a href="https://wa.me/919876543210" target="_blank" class="text-white text-decoration-none small">
                    <i class="bi bi-whatsapp text-gold me-2"></i> WhatsApp Concierge
                </a>
            </div>
            <div class="d-flex gap-3 social-links">
                <a href="#" class="text-gold fs-5"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-gold fs-5"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-gold fs-5"><i class="bi bi-pinterest"></i></a>
                <a href="#" class="text-gold fs-5"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
