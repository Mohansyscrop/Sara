@extends('layouts.app')

@section('title', "Contact Us | Saras Boutique Puducherry — Handpicked Women's Fashion")
@section('meta_description', "Get in touch with Saras Boutique. Visit our boutique at Shanmugapuram, Puducherry – 605009, or contact us via WhatsApp and phone (+91 94426 34491) for collection enquiries.")
@section('meta_keywords', "Saras Boutique Contact, Puducherry Boutique, Shanmugapuram Boutique, Women's Ethnic Wear Puducherry, WhatsApp Enquiry 9442634491")
@section('og_title', "Contact Us | Saras Boutique Puducherry")
@section('og_image', asset('assets/img/contact_store.jpg'))

@push('styles')
    <!-- Collection Page Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
    <!-- Scoped Contact Page Luxury Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endpush

@section('content')

    <!-- ===================== 3. CONTACT HERO BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Contact Saras Boutique Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">

                <!-- Gold Eyebrow -->
                <span class="collection-eyebrow hero-load-item delay-1">GET IN TOUCH</span>

                <!-- Main Title -->
                <h1 class="collection-main-title hero-load-item delay-2">Contact Us</h1>

                <!-- Cursive Gold Script -->
                <span class="collection-script-subtitle hero-load-item delay-3">We'd Love to Hear from You</span>

                <!-- Description Paragraph -->
                <p class="collection-desc hero-load-item delay-4">
                    Whether you have a question about our collections, wish to enquire about fabrics and sizing,
                    or plan a visit to our boutique in Puducherry, we are here to assist you warmly.
                </p>

                <!-- Gold Ornate Divider Line -->
                <div class="collection-ornate-divider hero-load-item delay-4" aria-hidden="true">
                    <span class="line"></span>
                    <span class="diamond"><i class="bi bi-diamond-fill"></i></span>
                    <span class="line"></span>
                </div>

                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb" class="hero-load-item delay-5">
                    <ol class="collection-breadcrumbs">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="crumb-sep">›</li>
                        <li class="active">Contact Us</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>

    <!-- ===================== 4, 5 & 6. CONTACT CONTENT SECTION ===================== -->
    <section class="contact-main-section" aria-label="Contact Information and Inquiry Form">
        <!-- Background Subtle Mandala Flourishes -->
        <svg class="decor-mandala-corner-left" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="100" r="90" stroke="#D4AF37" stroke-width="1.5" stroke-dasharray="4 4" />
            <circle cx="100" cy="100" r="65" stroke="#D4AF37" stroke-width="1" />
            <circle cx="100" cy="100" r="40" stroke="#D4AF37" stroke-width="1.5" />
            <path d="M100 0 V200 M0 100 H200 M30 30 L170 170 M30 170 L170 30" stroke="#D4AF37" stroke-width="0.8" />
        </svg>

        <svg class="decor-mandala-corner-right" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="100" r="90" stroke="#D4AF37" stroke-width="1.5" stroke-dasharray="4 4" />
            <circle cx="100" cy="100" r="65" stroke="#D4AF37" stroke-width="1" />
            <circle cx="100" cy="100" r="40" stroke="#D4AF37" stroke-width="1.5" />
            <path d="M100 0 V200 M0 100 H200 M30 30 L170 170 M30 170 L170 30" stroke="#D4AF37" stroke-width="0.8" />
        </svg>

        <div class="container">
            <div class="row g-5 align-items-start">

                <!-- ── 5. LEFT COLUMN: CONTACT INFORMATION ── -->
                <div class="col-lg-5 col-12 reveal-left">
                    <span class="section-gold-eyebrow">OFFICIAL BUSINESS DETAILS</span>
                    <h2 class="contact-info-title">Let's Connect</h2>
                    <div class="contact-info-script">Personalized boutique care</div>

                    <p class="contact-info-intro">
                        Have a question about our collections, sizing, or wish to plan a visit to our boutique shop in Puducherry? Reach out directly via phone, email, or WhatsApp.
                    </p>

                    <!-- Contact Details Blocks List -->
                    <div class="contact-info-blocks-list">

                        <!-- ADDRESS -->
                        <div class="contact-info-card-item">
                            <div class="contact-icon-bubble" title="Boutique Location">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <h4 class="contact-item-heading">Our Boutique Store</h4>
                                <div class="contact-item-body">
                                    <strong>Sara's Boutique</strong><br>
                                    No. 1, 2nd Mani Road, 4th Cross Street,<br>
                                    Manikachettyar Nagar, Shanmugapuram,<br>
                                    Puducherry – 605009, India.
                                </div>
                                <div class="mt-2">
                                    <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" target="_blank" rel="noopener noreferrer" class="small text-gold fw-semibold text-decoration-none">
                                        <i class="bi bi-cursor-fill me-1"></i> Get Directions on Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- PHONE -->
                        <div class="contact-info-card-item">
                            <div class="contact-icon-bubble" title="Mobile Number">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <h4 class="contact-item-heading">Mobile Number</h4>
                                <div class="contact-item-body">
                                    <a href="tel:+919442634491" class="fw-semibold text-dark text-decoration-none">+91 94426 34491</a><br>
                                    <span class="small text-muted">Tap to call our boutique directly</span>
                                </div>
                            </div>
                        </div>

                        <!-- WHATSAPP -->
                        <div class="contact-info-card-item">
                            <div class="contact-icon-bubble" style="background: rgba(37, 211, 102, 0.12); color: #25d366;" title="WhatsApp Enquiry">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div>
                                <h4 class="contact-item-heading">WhatsApp Enquiry</h4>
                                <div class="contact-item-body">
                                    <span class="fw-semibold text-dark">+91 94426 34491</span><br>
                                    <span class="small text-muted mb-2 d-block">Quick responses for collections, sizing &amp; orders</span>
                                    <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Saras%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-success rounded-pill px-3 d-inline-flex align-items-center gap-2">
                                        <i class="bi bi-whatsapp"></i> Enquire on WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="contact-info-card-item">
                            <div class="contact-icon-bubble" title="Official Email">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <h4 class="contact-item-heading">Official Email</h4>
                                <div class="contact-item-body">
                                    <a href="mailto:Sarasboutique2026@gmail.com" class="fw-semibold text-dark text-decoration-none">Sarasboutique2026@gmail.com</a><br>
                                    <span class="small text-muted">Tap to compose an email</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ── 6, 7 & 8. RIGHT COLUMN: CONTACT FORM ── -->
                <div class="col-lg-7 col-12">
                    <div class="contact-form-luxury-card reveal-right">

                        <span class="section-gold-eyebrow">SEND US A MESSAGE</span>
                        <h3 class="form-heading">Drop Us a Message</h3>
                        <p class="form-subtitle">Fill out the form below and we'll get back to you shortly.</p>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="contactInquiryForm" action="{{ route('contact.store') }}" method="POST" onsubmit="handleContactSubmit(event)">
                            @csrf

                            <!-- Row 1: Full Name & Email Address -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6 col-12">
                                    <label for="fullNameInput" class="form-label-luxury">
                                        Full Name <span class="required-star">*</span>
                                    </label>
                                    <input type="text" class="form-control-luxury @error('name') is-invalid @enderror" 
                                           id="fullNameInput" name="name" value="{{ old('name') }}"
                                           placeholder="Your name" required autocomplete="name">
                                    <div class="form-feedback-error" id="nameError">Please enter your full name.</div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="emailInput" class="form-label-luxury">
                                        Email Address <span class="required-star">*</span>
                                    </label>
                                    <input type="email" class="form-control-luxury @error('email') is-invalid @enderror" 
                                           id="emailInput" name="email" value="{{ old('email') }}"
                                           placeholder="you@example.com" required autocomplete="email">
                                    <div class="form-feedback-error" id="emailError">Please enter a valid email address.</div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Phone & Contact Method -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6 col-12">
                                    <label for="phoneInput" class="form-label-luxury">Phone Number</label>
                                    <input type="tel" class="form-control-luxury @error('phone') is-invalid @enderror" 
                                           id="phoneInput" name="phone" value="{{ old('phone') }}"
                                           placeholder="+91 94426 34491" autocomplete="tel">
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="contactMethodSelect" class="form-label-luxury">Preferred Contact Method</label>
                                    <select class="form-control-luxury form-select" id="contactMethodSelect" name="contact_method">
                                        <option value="WhatsApp" selected>WhatsApp</option>
                                        <option value="Email">Email</option>
                                        <option value="Phone Call">Phone Call</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 3: Subject Dropdown -->
                            <div class="mb-3">
                                <label for="subjectSelect" class="form-label-luxury">
                                    Subject <span class="required-star">*</span>
                                </label>
                                <select class="form-control-luxury form-select @error('subject') is-invalid @enderror" 
                                        id="subjectSelect" name="subject" required>
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select an option</option>
                                    <option value="Product Sizing & Fabric Inquiries" {{ old('subject') == 'Product Sizing & Fabric Inquiries' ? 'selected' : '' }}>Product Inquiries &amp; Sizing Assistance</option>
                                    <option value="Order Status & Tracking" {{ old('subject') == 'Order Status & Tracking' ? 'selected' : '' }}>Order Status &amp; Tracking</option>
                                    <option value="Payment & Billing Support" {{ old('subject') == 'Payment & Billing Support' ? 'selected' : '' }}>Payment &amp; Billing Support</option>
                                    <option value="Shipping & Delivery Inquiries" {{ old('subject') == 'Shipping & Delivery Inquiries' ? 'selected' : '' }}>Shipping &amp; Delivery Inquiries</option>
                                    <option value="Order Cancellation Request" {{ old('subject') == 'Order Cancellation Request' ? 'selected' : '' }}>Order Cancellation Request</option>
                                    <option value="Returns & Exchanges" {{ old('subject') == 'Returns & Exchanges' ? 'selected' : '' }}>Returns &amp; Refund Assistance</option>
                                    <option value="Custom Fitting & Bridal Concierge" {{ old('subject') == 'Custom Fitting & Bridal Concierge' ? 'selected' : '' }}>Custom Fitting &amp; Bridal Concierge</option>
                                    <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                </select>
                                <div class="form-feedback-error" id="subjectError">Please select a subject for your message.</div>
                                @error('subject')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Row 4: Message Textarea -->
                            <div class="mb-3">
                                <label for="messageTextarea" class="form-label-luxury">
                                    Message <span class="required-star">*</span>
                                </label>
                                <textarea class="form-control-luxury @error('message') is-invalid @enderror" 
                                          id="messageTextarea" name="message" rows="4"
                                          placeholder="Type your message here..." required>{{ old('message') }}</textarea>
                                <div class="form-feedback-error" id="messageError">Please write your message (at least 10 characters).</div>
                                @error('message')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Form Action Row: Submit Button + Decorative Note -->
                            <div class="form-footer-action-row">
                                <button type="submit" class="btn-send-message" id="submitBtn">
                                    <span id="btnText">Send Message</span>
                                    <i class="bi bi-arrow-right" id="btnArrow"></i>
                                    <span class="spinner-border spinner-border-sm d-none" id="btnSpinner" role="status" aria-hidden="true"></span>
                                </button>

                                <div class="form-decorative-signoff">
                                    We look forward<br>
                                    to hearing from you! <i class="bi bi-heart-fill heart-icon"></i>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 9 & 10. STORE LOCATION SECTION ===================== -->
    <section class="store-location-section" aria-label="Saras Boutique Location in Shanmugapuram Puducherry">
        <div class="container">

            <div class="location-unified-card reveal-scale">

                <!-- Col 1: Storefront Photo -->
                <div class="location-store-photo-wrap">
                    <img src="{{ asset('assets/img/contact_store.jpg') }}" alt="Saras Boutique Store in Shanmugapuram Puducherry"
                        loading="lazy">
                </div>

                <!-- Col 2: Visit Our Store Information Box -->
                <div class="location-info-panel">
                    <div class="location-pin-icon-wrap" title="Store Pin">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <h3 class="location-panel-heading">Visit Our Boutique</h3>

                    <p class="location-panel-desc">
                        Experience our handpicked collections in person. Walk into our boutique in Shanmugapuram, explore fabrics, try on sets, and receive personalized assistance.
                    </p>

                    <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" target="_blank"
                        rel="noopener noreferrer" class="btn-directions text-decoration-none">
                        <span>Get Directions on Google Maps</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Col 3: Live Interactive Google Maps Location -->
                <div class="location-map-wrap position-relative">
                    <iframe 
                        src="https://maps.google.com/maps?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0; width: 100%; height: 100%; min-height: 380px; display: block;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Saras Boutique Puducherry Google Maps Location">
                    </iframe>

                    <!-- Floating Boutique Location Card -->
                    <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="map-floating-boutique-card text-decoration-none shadow-sm"
                       title="Open full directions in Google Maps">
                        <div class="map-floating-pin-circle">
                            <i class="bi bi-geo-alt-fill text-gold"></i>
                        </div>
                        <div class="map-floating-text">
                            <div class="map-floating-title">Saras Boutique <i class="bi bi-box-arrow-up-right ms-1 text-gold" style="font-size: 11px;"></i></div>
                            <div class="map-floating-subtitle">No. 1, 2nd Mani Road, 4th Cross Street, Shanmugapuram, Puducherry – 605009</div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- ===================== 11. SERVICE BENEFITS STRIP ===================== -->
    <section class="service-benefits-strip" aria-label="Saras Boutique Service Guarantees">
        <div class="container">
            <div class="row g-4 align-items-center stagger-group">

                <div class="col-lg-3 col-sm-6 col-12 stagger-item">
                    <div class="benefit-col-item">
                        <div class="benefit-icon-ring" title="Free Shipping Across India">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <div class="benefit-item-title">Free Shipping</div>
                            <div class="benefit-item-sub">On orders above ₹4,000</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 stagger-item">
                    <div class="benefit-col-item">
                        <div class="benefit-icon-ring" title="Easy 7-Day Returns">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                            <div class="benefit-item-title">Easy Returns</div>
                            <div class="benefit-item-sub">Within 7 days</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 stagger-item">
                    <div class="benefit-col-item">
                        <div class="benefit-icon-ring" title="100% Safe and Encrypted Payments">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <div class="benefit-item-title">Secure Payments</div>
                            <div class="benefit-item-sub">100% safe &amp; secure</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 stagger-item">
                    <div class="benefit-col-item">
                        <div class="benefit-icon-ring" title="Friendly Stylist & Customer Support">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div>
                            <div class="benefit-item-title">Customer Support</div>
                            <div class="benefit-item-sub">We're here to help</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 12 & 13. FAQ SECTION ===================== -->
    <section class="faq-luxury-section" id="faqs" aria-label="Frequently Asked Questions">
        <div class="container">
            <div class="row g-5 align-items-center">

                <div class="col-lg-5 col-12 reveal-left">
                    <div class="faq-left-media-wrap">
                        <img src="{{ asset('assets/img/contact_faq_fabric.jpg') }}" alt="Handcrafted Gold Zardozi Embroidery on Purple Silk"
                            loading="lazy">
                    </div>

                    <span class="section-gold-eyebrow">QUICK ANSWERS</span>
                    <h3 class="faq-main-heading">Frequently Asked Questions</h3>
                    <p class="faq-main-desc">
                        Find quick answers to the most common questions about our products, boutique visits, shipping, and WhatsApp support.
                    </p>

                    <a href="#contactInquiryForm" class="btn-view-all-faqs text-decoration-none"
                        onclick="document.getElementById('subjectSelect').value='General Inquiry';">
                        <span>Send an Inquiry</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="col-lg-7 col-12 reveal-right">
                    <div class="faq-accordion-container" id="faqAccordion">

                        <div class="faq-accordion-item active">
                            <button type="button" class="faq-header-btn" onclick="toggleFaq(this)">
                                <span>How can I enquire or purchase from Saras Boutique?</span>
                                <span class="faq-toggle-icon"><i class="bi bi-plus"></i></span>
                            </button>
                            <div class="faq-body-content">
                                You can browse our collections online and enquire directly on WhatsApp at +91 94426 34491, submit our contact form, or visit our boutique shop located at Shanmugapuram, Puducherry.
                            </div>
                        </div>

                        <div class="faq-accordion-item">
                            <button type="button" class="faq-header-btn" onclick="toggleFaq(this)">
                                <span>Can I visit your boutique store in Puducherry?</span>
                                <span class="faq-toggle-icon"><i class="bi bi-plus"></i></span>
                            </button>
                            <div class="faq-body-content">
                                Yes! We welcome you to visit us at No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009, India. You can view our collections in person and receive personalized styling advice.
                            </div>
                        </div>

                        <div class="faq-accordion-item">
                            <button type="button" class="faq-header-btn" onclick="toggleFaq(this)">
                                <span>Do you deliver across India?</span>
                                <span class="faq-toggle-icon"><i class="bi bi-plus"></i></span>
                            </button>
                            <div class="faq-body-content">
                                Yes! Saras Boutique ships carefully packaged orders across India via trusted express courier partners with door delivery.
                            </div>
                        </div>

                        <div class="faq-accordion-item">
                            <button type="button" class="faq-header-btn" onclick="toggleFaq(this)">
                                <span>How can I get sizing and fitting assistance?</span>
                                <span class="faq-toggle-icon"><i class="bi bi-plus"></i></span>
                            </button>
                            <div class="faq-body-content">
                                Connect directly with us via WhatsApp at +91 94426 34491. We will be happy to share detailed measurements, close-up fabric videos, and fit recommendations.
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 14. NEWSLETTER SECTION ===================== -->
    <section class="newsletter-luxury-banner" aria-label="Subscribe to Sara's Boutique Newsletter">
        <div class="container">
            <div class="row align-items-center g-4 reveal-scale">

                <div class="col-lg-6 col-12">
                    <div class="newsletter-banner-script">Stay Connected</div>
                    <h3 class="newsletter-banner-title">Join Our Fashion Family</h3>
                    <p class="newsletter-banner-desc">
                        Be the first to know about new arrivals, exclusive offers and style inspiration.
                    </p>
                </div>

                <div class="col-lg-6 col-12">
                    <form class="newsletter-pill-input-box" onsubmit="event.preventDefault(); showToast('Thank you for subscribing to Saras Boutique updates!'); this.reset();">
                        <input type="email" placeholder="Enter your email address" required
                            aria-label="Enter your email address" id="newsletterEmailInput">
                        <button type="submit" class="btn-subscribe-gold">
                            <span>Subscribe</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function toggleFaq(button) {
            const clickedItem = button.closest('.faq-accordion-item');
            const allItems = document.querySelectorAll('.faq-accordion-item');
            allItems.forEach(item => {
                if (item !== clickedItem) {
                    item.classList.remove('active');
                }
            });
            clickedItem.classList.toggle('active');
        }

        function handleContactSubmit(event) {
            event.preventDefault();

            const form = document.getElementById('contactInquiryForm');
            const nameInput = document.getElementById('fullNameInput');
            const emailInput = document.getElementById('emailInput');
            const subjectSelect = document.getElementById('subjectSelect');
            const messageTextarea = document.getElementById('messageTextarea');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnArrow = document.getElementById('btnArrow');
            const btnSpinner = document.getElementById('btnSpinner');

            let isValid = true;

            if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
                nameInput.classList.add('is-invalid');
                isValid = false;
            } else {
                nameInput.classList.remove('is-invalid');
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailInput.value.trim() || !emailRegex.test(emailInput.value.trim())) {
                emailInput.classList.add('is-invalid');
                isValid = false;
            } else {
                emailInput.classList.remove('is-invalid');
            }

            if (!subjectSelect.value) {
                subjectSelect.classList.add('is-invalid');
                isValid = false;
            } else {
                subjectSelect.classList.remove('is-invalid');
            }

            if (!messageTextarea.value.trim() || messageTextarea.value.trim().length < 5) {
                messageTextarea.classList.add('is-invalid');
                isValid = false;
            } else {
                messageTextarea.classList.remove('is-invalid');
            }

            if (!isValid) return;

            btnText.textContent = 'Sending...';
            btnArrow.classList.add('d-none');
            btnSpinner.classList.remove('d-none');
            submitBtn.disabled = true;

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                btnText.textContent = 'Sent Successfully!';
                btnSpinner.classList.add('d-none');
                btnArrow.classList.remove('d-none');
                btnArrow.className = 'bi bi-check-lg';

                showToast(data.message || 'Thank you! Your message has been received.');
                form.reset();

                setTimeout(() => {
                    btnText.textContent = 'Send Message';
                    btnArrow.className = 'bi bi-arrow-right';
                    submitBtn.disabled = false;
                }, 3000);
            })
            .catch(err => {
                // Fallback submit normally
                form.submit();
            });
        }
    </script>
@endpush
