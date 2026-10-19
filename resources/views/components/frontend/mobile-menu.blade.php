<div class="offcanvas offcanvas-end offcanvas-luxury" tabindex="-1" id="mobileMenu"
    aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header border-bottom border-warning border-opacity-25 pb-3">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('home') }}" class="d-inline-block">
                <img src="{{ asset('assets/img/logo1.png') }}" alt="Sara's Boutique"
                    style="height: 52px; width: auto; object-fit: contain; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.5)) drop-shadow(0 0 10px rgba(212,175,55,0.3));">
            </a>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column justify-content-between pt-4">
        <ul class="nav flex-column gap-3" id="mobileNavLinks">
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('home') ? 'active' : '' }} fs-5" href="{{ route('home') }}">
                    <i class="bi bi-house-door me-2 text-gold"></i>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('collections') || request()->routeIs('product.show') ? 'active' : '' }} fs-5" href="{{ route('collections') }}">
                    <i class="bi bi-grid me-2 text-gold"></i>Collections
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link fs-5" href="{{ route('home') }}#newarrivals">
                    <i class="bi bi-stars me-2 text-gold"></i>New Arrivals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link fs-5" href="{{ route('home') }}#bestsellers">
                    <i class="bi bi-trophy me-2 text-gold"></i>Best Sellers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('about') ? 'active' : '' }} fs-5" href="{{ route('about') }}">
                    <i class="bi bi-bookmark-heart me-2 text-gold"></i>About Us
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-luxury-link {{ request()->routeIs('contact*') ? 'active' : '' }} fs-5" href="{{ route('contact.us') }}">
                    <i class="bi bi-envelope me-2 text-gold"></i>Contact Us
                </a>
            </li>

            <!-- Store Policies Section -->
            <li class="nav-item pt-2 border-top border-secondary border-opacity-25">
                <div class="text-uppercase small fw-bold text-gold opacity-75 mb-2" style="font-size: 0.72rem; letter-spacing: 0.8px;">
                    Store Policies &amp; Help
                </div>
                <div class="d-flex flex-column gap-2 ps-1">
                    <a class="text-white-50 text-decoration-none small py-1" href="{{ route('terms') }}">
                        <i class="bi bi-file-text me-2 text-gold"></i>Terms &amp; Conditions
                    </a>
                    <a class="text-white-50 text-decoration-none small py-1" href="{{ route('privacy') }}">
                        <i class="bi bi-shield-lock me-2 text-gold"></i>Privacy Policy
                    </a>
                    <a class="text-white-50 text-decoration-none small py-1" href="{{ route('shipping.policy') }}">
                        <i class="bi bi-truck me-2 text-gold"></i>Shipping &amp; Delivery
                    </a>
                    <a class="text-white-50 text-decoration-none small py-1" href="{{ route('refund.policy') }}">
                        <i class="bi bi-arrow-counterclockwise me-2 text-gold"></i>Refund / Cancellation
                    </a>
                </div>
            </li>

            <li class="nav-item pt-2 border-top border-secondary border-opacity-25">
                <a class="nav-luxury-link fs-6 text-gold" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-shield-lock me-1"></i> Admin Portal
                </a>
            </li>
        </ul>

        <div class="border-top border-warning border-opacity-25 pt-4 mt-4">
            <div class="d-flex flex-column gap-2 mb-3">
                <a href="tel:+919442634491" class="text-white text-decoration-none small">
                    <i class="bi bi-telephone-fill text-gold me-2"></i> +91 94426 34491
                </a>
                <a href="mailto:Sarasboutique2026@gmail.com" class="text-white text-decoration-none small">
                    <i class="bi bi-envelope-fill text-gold me-2"></i> Sarasboutique2026@gmail.com
                </a>
                <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Sara%E2%80%99s%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." target="_blank" rel="noopener noreferrer" class="text-white text-decoration-none small">
                    <i class="bi bi-whatsapp text-gold me-2"></i> WhatsApp Enquiry
                </a>
                <div class="text-white-50 small mt-1">
                    <i class="bi bi-geo-alt text-gold me-2"></i> Shanmugapuram, Puducherry
                </div>
            </div>
            <div class="d-flex gap-3 align-items-center pt-2 border-top border-secondary border-opacity-25">
                <a href="https://wa.me/919442634491" target="_blank" rel="noopener noreferrer" class="text-gold fs-5" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                <a href="tel:+919442634491" class="text-gold fs-5" aria-label="Call"><i class="bi bi-telephone-fill"></i></a>
                <a href="mailto:Sarasboutique2026@gmail.com" class="text-gold fs-5" aria-label="Email"><i class="bi bi-envelope-fill"></i></a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuEl = document.getElementById('mobileMenu');
        if (!mobileMenuEl) return;

        // Ensure links navigate properly and dismiss offcanvas only when staying on the same page
        mobileMenuEl.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (!href || href === '#' || href.startsWith('javascript:')) return;

                const currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
                let targetUrl;
                try {
                    targetUrl = new URL(href, window.location.origin);
                } catch (err) {
                    return;
                }

                const targetPath = targetUrl.pathname.replace(/\/+$/, '') || '/';
                const isSamePage = (targetPath === currentPath);
                const hasHash = Boolean(targetUrl.hash);

                if (isSamePage) {
                    // Close offcanvas if we are staying on current page (e.g. hash link or home click while already on home)
                    const offcanvasInstance = bootstrap.Offcanvas.getInstance(mobileMenuEl);
                    if (offcanvasInstance) {
                        offcanvasInstance.hide();
                    }

                    if (!hasHash) {
                        // Scrolling to top of the current page
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        // Anchor scroll on current page
                        const targetElement = document.querySelector(targetUrl.hash);
                        if (targetElement) {
                            e.preventDefault();
                            targetElement.scrollIntoView({ behavior: 'smooth' });
                            history.pushState(null, null, targetUrl.hash);
                        }
                    }
                }
                // If isSamePage is false, allow standard default browser navigation to targetUrl!
            });
        });
    });
</script>
