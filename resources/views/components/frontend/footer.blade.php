<!-- ===================== LUXURY THEME FOOTER ===================== -->
<footer class="luxury-footer">
    <div class="container-fluid px-lg-5 px-md-4 px-3">
        <div class="row g-4 justify-content-between">

            <!-- Col 1: Brand & Story -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-brand-col">
                    <div class="footer-brand-logo mb-3">
                        <img src="{{ asset('assets/img/logo1.png') }}" alt="Sara's Boutique" class="img-fluid" style="max-height: 50px;">
                    </div>
                    <p class="footer-brand-desc">
                        Curators of bespoke Indian ethnic couture, luxury churidar ensembles, and handcrafted bridal
                        heirlooms woven in pure mulberry silk with Silk Mark certification.
                    </p>

                    <div class="footer-contact-info">
                        <a href="tel:+919876543210" class="footer-contact-item">
                            <i class="bi bi-telephone-fill text-gold"></i> +91 98765 43210
                        </a>
                        <a href="mailto:concierge@sarasboutique.com" class="footer-contact-item">
                            <i class="bi bi-envelope-fill text-gold"></i> concierge@sarasboutique.com
                        </a>
                        <span class="footer-contact-item">
                            <i class="bi bi-geo-alt-fill text-gold"></i> Flagship Boutique: Jubilee Hills, Hyderabad
                        </span>
                    </div>

                    <!-- Social Icons -->
                    <div class="footer-social-icons">
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="https://wa.me/919876543210" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="col-lg-2 col-md-3 col-6">
                <h3 class="footer-col-title">Quick Links</h3>
                <ul class="footer-links-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('collections') }}">Collections</a></li>
                    <li><a href="{{ route('home') }}#bestsellers">Best Sellers</a></li>
                    <li><a href="{{ route('home') }}#newarrivals">New Arrivals</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 3: Customer Care -->
            <div class="col-lg-2 col-md-3 col-6">
                <h3 class="footer-col-title">Customer Care</h3>
                <ul class="footer-links-list">
                    <li><a href="{{ route('about') }}#whychoose">Why Choose Us</a></li>
                    <li><a href="{{ route('contact') }}#faqs">FAQs &amp; Help</a></li>
                    <li><a href="{{ route('about') }}">Our Artisans</a></li>
                    <li><a href="{{ route('contact') }}">Store Location</a></li>
                    <li><a href="https://wa.me/919876543210" target="_blank">WhatsApp VIP Line</a></li>
                    <li><a href="{{ route('admin.dashboard') }}">Admin Portal</a></li>
                </ul>
            </div>

            <!-- Col 4: Exclusive Edits -->
            <div class="col-lg-2 col-md-3 col-6">
                <h3 class="footer-col-title">Signature Edits</h3>
                <ul class="footer-links-list">
                    <li><a href="{{ route('collections', ['category' => 'silk-festive-sets']) }}">Silk Churidars</a></li>
                    <li><a href="{{ route('collections', ['category' => 'anarkali-ensembles']) }}">Royal Anarkalis</a></li>
                    <li><a href="{{ route('collections', ['category' => 'straight-cut-suits']) }}">Straight-Cut Suits</a></li>
                    <li><a href="{{ route('collections', ['category' => 'bridal-churidar-sets']) }}">Bridal Trousseau</a></li>
                    <li><a href="{{ route('collections', ['category' => 'handloom-chanderi']) }}">Handloom Chanderi</a></li>
                    <li><a href="{{ route('collections', ['category' => 'velvet-winter-suits']) }}">Velvet Ensembles</a></li>
                </ul>
            </div>

            <!-- Col 5: Join Our Newsletter & Payment Badges -->
            <div class="col-lg-3 col-md-9 col-12">
                <h3 class="footer-col-title">Join The Inner Circle</h3>
                <p class="newsletter-desc">
                    Subscribe to receive VIP access to private previews, festive collections, and styling consultations.
                </p>

                <form class="newsletter-pill-form reveal-scale"
                    onsubmit="event.preventDefault(); showToast('Thank you for subscribing to Sara\'s Inner Circle! Use coupon FESTIVE25'); this.reset();">
                    <input type="email" class="form-control newsletter-input" placeholder="Your email address"
                        aria-label="Your email address" required>
                    <button class="newsletter-submit-btn" type="submit" aria-label="Subscribe">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <!-- Payment & Trust Badges -->
                <div class="footer-payment-badges mt-3">
                    <span class="payment-pill-tag"><i class="bi bi-shield-lock-fill"></i> 100% Secure</span>
                    <span class="payment-pill-tag"><i class="bi bi-qr-code"></i> UPI</span>
                    <span class="payment-pill-tag"><i class="bi bi-credit-card-2-front-fill"></i> Cards</span>
                    <span class="payment-pill-tag"><i class="bi bi-bank"></i> NetBanking</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar: Copyright & Legal Policies -->
    <div class="footer-bottom-bar">
        <div class="container-fluid px-lg-5 px-md-4 px-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="copyright-text mb-0">
                    &copy; {{ date('Y') }} Sara's Boutique. Handcrafted with elegance. All rights reserved.
                </p>
                <div class="legal-links">
                    <a href="{{ route('about') }}">Heritage Craftsmanship</a>
                    <span class="legal-divider">•</span>
                    <a href="{{ route('contact') }}">Flagship Boutique</a>
                    <span class="legal-divider">•</span>
                    <a href="{{ route('collections') }}">Silk Mark Certified</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ===================== END LUXURY THEME FOOTER ===================== -->
