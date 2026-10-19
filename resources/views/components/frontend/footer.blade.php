<!-- ===================== LUXURY THEME FOOTER ===================== -->
<footer class="luxury-footer">
    <div class="container-fluid px-lg-5 px-md-4 px-3">
        <div class="row g-4 justify-content-between">

            <!-- Col 1: Brand & Story (Larger Logo) -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer-brand-col">
                    <div class="mb-3">
                        <a href="{{ route('home') }}" class="d-inline-block">
                            <img src="{{ asset('assets/img/logo1.png') }}" 
                                 alt="Sara's Boutique" 
                                 style="height: 76px; max-height: 85px; width: auto; object-fit: contain; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.5)) drop-shadow(0 0 14px rgba(212,175,55,0.35)); transition: transform 0.3s ease;"
                                 onmouseover="this.style.transform='scale(1.03)'" 
                                 onmouseout="this.style.transform='scale(1)'">
                        </a>
                    </div>
                    <p class="footer-brand-desc mb-3">
                        A women's ethnic boutique in Puducherry that began as a home venture in 2023 and developed into our boutique shop by 2026. Handpicked pure fabrics, exquisite Churidar sets, and warm personal attention.
                    </p>

                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(212,175,55,0.12); border: 1px solid rgba(212,175,55,0.3); font-size: 12px; color: var(--gold);">
                        <i class="bi bi-patch-check-fill text-gold"></i>
                        <span>Shanmugapuram, Puducherry · Est. 2023</span>
                    </div>

                    <!-- Verified Connect Links -->
                    <div class="footer-social-icons">
                        <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Sara%E2%80%99s%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." target="_blank" aria-label="WhatsApp Enquiry" title="Chat on WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        <a href="tel:+919442634491" aria-label="Call Sara's Boutique" title="Call Us"><i class="bi bi-telephone-fill"></i></a>
                        <a href="mailto:Sarasboutique2026@gmail.com" aria-label="Email Sara's Boutique" title="Send Email"><i class="bi bi-envelope-fill"></i></a>
                        <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" target="_blank" rel="noopener noreferrer" aria-label="Store Location" title="View Store Location"><i class="bi bi-geo-alt-fill"></i></a>
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
                    <li><a href="{{ route('about') }}#whychoose">Why Choose Us</a></li>
                    <li><a href="{{ route('about') }}">Our Artisans</a></li>
                </ul>
            </div>

            <!-- Col 3: Signature Edits -->
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

            <!-- Col 4: Customer Support & Policies -->
            <div class="col-lg-2 col-md-3 col-6">
                <h3 class="footer-col-title">Customer Support &amp; Policies</h3>
                <ul class="footer-links-list">
                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                    <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('shipping.policy') }}">Shipping &amp; Delivery Policy</a></li>
                    <li><a href="{{ route('refund.policy') }}">Refund / Cancellation Policy</a></li>
                    <li><a href="{{ route('contact') }}#faqs">FAQs &amp; Help</a></li>
                    <li><a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique" target="_blank">WhatsApp Concierge</a></li>
                </ul>
            </div>

            <!-- Col 5: Visit Our Boutique Store & Contact -->
            <div class="col-lg-3 col-md-6 col-12">
                <h3 class="footer-col-title">Visit Our Boutique</h3>
                
                <div class="footer-contact-info mb-3">
                    <a href="tel:+919442634491" class="footer-contact-item">
                        <i class="bi bi-telephone-fill text-gold"></i>
                        <span>+91 94426 34491</span>
                    </a>
                    <a href="mailto:Sarasboutique2026@gmail.com" class="footer-contact-item">
                        <i class="bi bi-envelope-fill text-gold"></i>
                        <span>Sarasboutique2026@gmail.com</span>
                    </a>
                    <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="footer-contact-item" 
                       style="align-items: flex-start;">
                        <i class="bi bi-geo-alt-fill text-gold mt-1" style="flex-shrink: 0;"></i>
                        <span>No. 1, 2nd Mani Road, 4th Cross Street,<br>Manikachettyar Nagar, Shanmugapuram,<br>Puducherry – 605009, India</span>
                    </a>
                </div>

                <div class="p-2 px-3 rounded-3 mb-3" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(212,175,55,0.25); font-size: 12px; color: #e3d2ee;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-clock-history text-gold"></i>
                        <div>
                            <strong class="text-white d-block">Store Timings</strong>
                            <span>Open Daily: 10:00 AM – 9:00 PM IST</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="btn btn-sm rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2" 
                       style="background: rgba(212,175,55,0.15); border: 1px solid var(--gold); color: var(--gold); font-size: 12px;">
                        <i class="bi bi-map"></i> Get Directions
                    </a>
                    <a href="https://wa.me/919442634491?text=Hi%20Sara%E2%80%99s%20Boutique,%20I%20would%20like%20to%20visit%20your%20store%20in%20Shanmugapuram." 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="btn btn-sm rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2 text-white" 
                       style="background: linear-gradient(135deg, #128C7E, #25D366); font-size: 12px;">
                        <i class="bi bi-whatsapp"></i> WhatsApp Us
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar: Copyright & Legal Policies -->
    <div class="footer-bottom-bar">
        <div class="container-fluid px-lg-5 px-md-4 px-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="copyright-text mb-0">
                    &copy; {{ date('Y') }} Sara’s Boutique. Handcrafted with elegance in Puducherry. All rights reserved.
                </p>
                <div class="legal-links">
                    <a href="{{ route('contact.us') }}">Contact Us</a>
                    <span class="legal-divider">•</span>
                    <a href="{{ route('terms') }}">Terms &amp; Conditions</a>
                    <span class="legal-divider">•</span>
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <span class="legal-divider">•</span>
                    <a href="{{ route('shipping.policy') }}">Shipping &amp; Delivery Policy</a>
                    <span class="legal-divider">•</span>
                    <a href="{{ route('refund.policy') }}">Refund / Cancellation Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ===================== END LUXURY THEME FOOTER ===================== -->
