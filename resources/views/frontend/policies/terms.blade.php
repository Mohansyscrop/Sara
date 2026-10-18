@extends('layouts.app')

@section('title', "Terms & Conditions | Sara’s Boutique Puducherry — Official Store Terms")
@section('meta_description', "Review the official Terms and Conditions of Sara’s Boutique in Shanmugapuram, Puducherry. Understand our policies on order placement, product availability, transparent pricing, Razorpay payment processing, and dispute resolution.")
@section('meta_keywords', "Sara's Boutique Terms and Conditions, Saras Boutique Puducherry, Boutique Terms, Razorpay Payment Terms, Puducherry Ethnic Wear Terms")
@section('canonical_url', route('terms'))
@section('og_title', "Terms & Conditions | Sara’s Boutique Puducherry")
@section('og_description', "Official Terms and Conditions for Sara’s Boutique in Shanmugapuram, Puducherry. Clear guidelines for orders, pricing, payments, and customer care.")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/policies.css') }}">
@endpush

@section('content')

    <!-- ===================== HERO BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Terms and Conditions Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">
                <span class="collection-eyebrow hero-load-item delay-1">LEGAL &amp; COMPLIANCE</span>
                <h1 class="collection-main-title hero-load-item delay-2">Terms &amp; Conditions</h1>
                <span class="collection-script-subtitle hero-load-item delay-3">Honest, Clear &amp; Fair Boutique Standards</span>

                <p class="collection-desc hero-load-item delay-4">
                    Welcome to Sara’s Boutique. Please take a few moments to review our terms governing website browsing, order placements, payments, and our customer commitments.
                </p>

                <div class="collection-ornate-divider hero-load-item delay-4" aria-hidden="true">
                    <span class="line"></span>
                    <span class="diamond"><i class="bi bi-diamond-fill"></i></span>
                    <span class="line"></span>
                </div>

                <nav aria-label="breadcrumb" class="hero-load-item delay-5">
                    <ol class="collection-breadcrumbs">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="crumb-sep">›</li>
                        <li><a href="{{ route('terms') }}">Policies</a></li>
                        <li class="crumb-sep">›</li>
                        <li class="active">Terms &amp; Conditions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- ===================== MAIN POLICY SECTION ===================== -->
    <section class="policy-page-wrapper">
        <div class="container">
            <div class="row g-4 g-lg-5">

                <!-- ── MAIN CONTENT CARD ── -->
                <div class="col-lg-8 col-12">
                    <article class="policy-card">

                        <!-- Header & Meta Strip -->
                        <div class="policy-header-strip">
                            <span class="policy-badge-tag">
                                <i class="bi bi-patch-check-fill"></i> Official Store Agreement
                            </span>
                            <h2 class="policy-card-title">Terms of Service &amp; Customer Agreement</h2>
                            <div class="policy-meta-info">
                                <span><i class="bi bi-calendar3 me-1 text-gold"></i> Last Updated: October 2026</span>
                                <span><i class="bi bi-check2-circle me-1 text-gold"></i> Effective Date: October 2026</span>
                                <span><i class="bi bi-geo-alt me-1 text-gold"></i> Jurisdiction: Puducherry, India</span>
                            </div>
                        </div>

                        <!-- Compliance Notice Box -->
                        <div class="policy-callout-box">
                            <div class="policy-callout-icon">
                                <i class="bi bi-info-circle-fill"></i>
                            </div>
                            <div>
                                <strong>Customer Notice:</strong> By accessing, browsing, or placing an order through this website (<a href="{{ url('/') }}" class="text-decoration-underline text-dark fw-semibold">{{ url('/') }}</a>) or inquiring via our official WhatsApp concierge, you acknowledge and agree to be bound by these Terms &amp; Conditions, together with our 
                                <a href="{{ route('privacy') }}" class="text-decoration-underline text-dark fw-semibold">Privacy Policy</a>, 
                                <a href="{{ route('shipping.policy') }}" class="text-decoration-underline text-dark fw-semibold">Shipping Policy</a>, and 
                                <a href="{{ route('refund.policy') }}" class="text-decoration-underline text-dark fw-semibold">Refund &amp; Cancellation Policy</a>.
                            </div>
                        </div>

                        <!-- 1. Introduction & Business Identity -->
                        <section class="policy-section" id="business-identity">
                            <h3 class="policy-section-title">1. Business Identity &amp; About Sara’s Boutique</h3>
                            <p class="policy-text">
                                Sara’s Boutique is a women's ethnic fashion boutique located in Shanmugapuram, Puducherry, India. Founded in 2023 as an earnest home-based venture and expanded into our dedicated retail boutique shop by 2026, we specialize in handpicked Churidar sets, designer suits, festive ethnic ensembles, and personalized concierge customer care.
                            </p>
                            <p class="policy-text">
                                All references in these Terms to <strong>"Sara’s Boutique"</strong>, <strong>"we"</strong>, <strong>"us"</strong>, or <strong>"our"</strong> refer to Sara’s Boutique operating at:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Store &amp; Office Address:</strong> No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009, India.</li>
                                <li><strong>Official Email:</strong> <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a></li>
                                <li><strong>Customer Support Phone:</strong> <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a></li>
                                <li><strong>GST / Business Registration:</strong> Registered as a proprietorship enterprise in Puducherry <span class="policy-flag">Owner Confirmation: GSTIN to be displayed upon GST certificate issuance</span>.</li>
                            </ul>
                        </section>

                        <!-- 2. Eligibility & Website Usage -->
                        <section class="policy-section" id="eligibility">
                            <h3 class="policy-section-title">2. Website Usage &amp; Eligibility</h3>
                            <p class="policy-text">
                                To use this website, create an inquiry, or complete a purchase, you must be at least 18 years of age and legally competent to enter into a binding contract under the Indian Contract Act, 1872. If you are under 18 years of age, you may use our website only under the supervision and consent of a parent or legal guardian.
                            </p>
                            <p class="policy-text">
                                You agree to use this website solely for lawful personal shopping purposes. You shall not:
                            </p>
                            <ul class="policy-list">
                                <li>Use the website for any fraudulent, unauthorized, or unlawful activity;</li>
                                <li>Attempt to interfere with website servers, security, or network infrastructure;</li>
                                <li>Scrape, harvest, duplicate, or mirror catalog photographs, styling descriptions, or branding without prior written consent;</li>
                                <li>Submit false, misleading, or fictitious order inquiries or payment information.</li>
                            </ul>
                        </section>

                        <!-- 3. Product Descriptions, Handcrafted Nuances & Photography -->
                        <section class="policy-section" id="products">
                            <h3 class="policy-section-title">3. Product Descriptions, Fabrics, Colours &amp; Sizing</h3>
                            <p class="policy-text">
                                We take immense pride in presenting authentic, honest depictions of our Churidar sets and boutique garments. However, please note the following nuances inherent to ethnic textiles:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Handcrafted Nuances:</strong> Many of our ensembles feature handloom weaving, traditional block printing, hand-embroidery, Zari work, or hand-dyed fabrics (such as Chanderi, Tussar silk, or pure georgette). Subtle variations in weave, texture, embroidery threads, or dye shades are natural characteristics of handcrafted textiles and are not considered manufacturing defects.</li>
                                <li><strong>Color Variations:</strong> We photograph our products under professional studio and natural lighting. However, actual fabric colours may appear slightly different depending on your digital device screen resolution, brightness, and color calibration.</li>
                                <li><strong>Sizing &amp; Measurements:</strong> Detailed size measurements (Bust, Waist, Hip, Kurta Length, Bottom Length, and Sleeve Length) are provided where applicable. Because traditional tailoring involves minor manual seam allowances, a standard tolerance of ±0.5 to 1 inch is normal. If you have questions regarding sizing, our WhatsApp styling concierge is available at <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a> prior to placing your order.</li>
                                <li><strong>Availability:</strong> All boutique pieces are subject to stock availability. Because many designs are exclusive, limited-run pieces, an item may sell out. If an item becomes unavailable after your order is placed, we will notify you immediately and process a full refund or offer a replacement of equal value at your choice.</li>
                            </ul>
                        </section>

                        <!-- 4. Pricing, Taxes & Payment Gateway Processing -->
                        <section class="policy-section" id="pricing-payments">
                            <h3 class="policy-section-title">4. Product Pricing, Applicable Taxes &amp; Payment Processing</h3>
                            <p class="policy-text">
                                All prices displayed on Sara’s Boutique are denominated in <strong>Indian Rupees (INR - ₹)</strong>. 
                            </p>
                            <ul class="policy-list">
                                <li><strong>Price Accuracy:</strong> Prices shown on product pages are inclusive of applicable GST unless explicitly noted otherwise. Shipping fees, if applicable, are calculated and clearly itemized at checkout prior to final payment authorization.</li>
                                <li><strong>Price Revisions:</strong> We reserve the right to modify prices for products displayed on our website at any time without prior notice; however, any price changes will not affect orders that have already been confirmed and paid for.</li>
                                <li><strong>Payment Processing:</strong> Online digital payments on our website are facilitated securely through <strong>Razorpay</strong> (or other enabled RBI-authorized payment aggregators). Supported payment modes include UPI (Google Pay, PhonePe, Paytm, BHIM), Net Banking across major Indian banks, and Domestic Credit &amp; Debit Cards (Visa, MasterCard, RuPay).</li>
                                <li><strong>Card &amp; Banking Security:</strong> Sara’s Boutique does <strong>NOT</strong> collect, view, or store your sensitive card details, CVV, Net Banking passwords, or UPI PINs on its servers. All payment transactions are handled through Razorpay’s encrypted, PCI-DSS Level 1 compliant gateway.</li>
                                <li><strong>Payment Authorization:</strong> An order is deemed successfully received once payment authorization is confirmed by the payment gateway. If funds are debited from your bank account but an order confirmation is not generated due to a network timeout, the debited amount is automatically reconciled and refunded to your source account by your bank/Razorpay within standard banking timelines (usually 3–5 business days).</li>
                            </ul>
                        </section>

                        <!-- 5. Order Confirmation, Acceptance & Cancellation -->
                        <section class="policy-section" id="order-acceptance">
                            <h3 class="policy-section-title">5. Order Confirmation &amp; Fulfilment</h3>
                            <p class="policy-text">
                                Upon placing an order on our website:
                            </p>
                            <ul class="policy-list">
                                <li>You will receive an automated on-screen confirmation and an email/SMS notification containing your unique Order Number (e.g., <code>SB-YYYYMMDD-XXXXX</code>).</li>
                                <li>Order receipt does not signify final acceptance of your order. Sara’s Boutique reserves the right to accept or decline your order in whole or in part in instances such as: product unavailability, inability to verify delivery address or contact number, unserviceable courier pin code, or identified pricing/system errors.</li>
                                <li>In the unlikely event that an order must be cancelled by us after payment has been received, a 100% full refund will be initiated back to your original payment method promptly.</li>
                                <li>For complete cancellation guidelines initiated by customers, please refer to our dedicated <a href="{{ route('refund.policy') }}" class="text-decoration-underline text-dark fw-semibold">Refund &amp; Cancellation Policy</a>.</li>
                            </ul>
                        </section>

                        <!-- 6. Shipping & Doorstep Delivery -->
                        <section class="policy-section" id="shipping-fulfilment">
                            <h3 class="policy-section-title">6. Shipping, Transit &amp; Delivery</h3>
                            <p class="policy-text">
                                Orders are dispatched from our boutique in Shanmugapuram, Puducherry via trusted domestic express courier partners. Key terms include:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Standard Shipping Fee:</strong> ₹150 for orders below ₹4,000 across India.</li>
                                <li><strong>Free Shipping Condition:</strong> Orders with a subtotal of <strong>₹4,000 or more</strong> qualify for <strong>Free Standard Shipping</strong> across India.</li>
                                <li><strong>Dispatch Window:</strong> Standard orders are dispatched within 1 to 3 business days of payment confirmation.</li>
                                <li><strong>Estimated Transit:</strong> Typically 2–4 business days within Tamil Nadu &amp; Puducherry, and 3–7 business days for other parts of India.</li>
                                <li>Detailed delivery procedures, pin code coverage, and courier tracking details are set out in our <a href="{{ route('shipping.policy') }}" class="text-decoration-underline text-dark fw-semibold">Shipping &amp; Delivery Policy</a>.</li>
                            </ul>
                        </section>

                        <!-- 7. Customer Responsibilities -->
                        <section class="policy-section" id="customer-responsibilities">
                            <h3 class="policy-section-title">7. Customer Responsibilities</h3>
                            <p class="policy-text">
                                As a valued patron, you agree to:
                            </p>
                            <ul class="policy-list">
                                <li>Provide accurate, current, and complete delivery information, including full recipient name, complete street address with landmark, valid 6-digit PIN code, and active mobile phone number;</li>
                                <li>Ensure that someone is available to receive the package at the shipping address when delivery is attempted by the courier;</li>
                                <li>Carefully inspect the external package before accepting delivery from the courier agent. If the package appears visibly opened, damaged, or tampered with, refuse delivery or record an unboxing video as outlined in our policies;</li>
                                <li>Refrain from engaging in chargeback fraud or abusive behavior towards boutique staff or delivery personnel.</li>
                            </ul>
                        </section>

                        <!-- 8. Intellectual Property -->
                        <section class="policy-section" id="intellectual-property">
                            <h3 class="policy-section-title">8. Intellectual Property &amp; Website Content</h3>
                            <p class="policy-text">
                                All content displayed on this website—including but not limited to the <strong>Sara’s Boutique</strong> brand name, logo, graphic designs, product photographs, styling shoots, video clips, layout, text descriptions, and software code—is the proprietary intellectual property of Sara’s Boutique and is protected under the Indian Copyright Act, 1957, and Trademark laws.
                            </p>
                            <p class="policy-text">
                                No content may be copied, reproduced, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted, or distributed in any way to any other computer, server, website, or other medium for commercial publication or distribution without our express prior written permission.
                            </p>
                        </section>

                        <!-- 9. Limitation of Liability -->
                        <section class="policy-section" id="liability">
                            <h3 class="policy-section-title">9. Limitation of Liability</h3>
                            <p class="policy-text">
                                To the maximum extent permitted under applicable Indian law, Sara’s Boutique, its proprietor, employees, and associates shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of:
                            </p>
                            <ul class="policy-list">
                                <li>Your use of or inability to use this website;</li>
                                <li>Delays in courier transit caused by weather events, state border closures, strikes, or third-party courier logistical failures beyond our reasonable control;</li>
                                <li>Color shade variations attributable to digital screen displays.</li>
                            </ul>
                            <p class="policy-text">
                                In all events, the maximum aggregate liability of Sara’s Boutique for any claim arising out of or related to an order placed through this website shall be strictly limited to the actual amount paid by the customer for the specific product in dispute. Nothing in these Terms shall limit or exclude any statutory rights that cannot be excluded under the Consumer Protection Act, 2019.
                            </p>
                        </section>

                        <!-- 10. Customer Support & Dispute Resolution -->
                        <section class="policy-section" id="dispute-resolution">
                            <h3 class="policy-section-title">10. Customer Support, Grievances &amp; Dispute Resolution</h3>
                            <p class="policy-text">
                                We believe in warm, transparent, and personalized customer care. If you have any questions, dissatisfaction, or feedback regarding an order or our service, we encourage you to contact us directly:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Email Support:</strong> <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a></li>
                                <li><strong>Phone / WhatsApp Concierge:</strong> <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a></li>
                                <li><strong>In-Person Boutique Visit:</strong> No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009.</li>
                            </ul>
                            <p class="policy-text">
                                We endeavor to acknowledge all customer grievances within <strong>48 business hours</strong> and provide an amicable resolution within <strong>30 business days</strong> in compliance with the Consumer Protection (E-Commerce) Rules, 2020.
                            </p>
                        </section>

                        <!-- 11. Applicable Law & Jurisdiction -->
                        <section class="policy-section" id="governing-law">
                            <h3 class="policy-section-title">11. Applicable Law &amp; Jurisdiction</h3>
                            <p class="policy-text">
                                These Terms &amp; Conditions and any contractual or non-contractual disputes arising out of or in connection with your purchase or website usage shall be governed by, construed, and enforced in accordance with the substantive <strong>laws of the Republic of India</strong>.
                            </p>
                            <p class="policy-text">
                                Subject to the dispute resolution mechanism above, the competent courts situated in <strong>Puducherry (Union Territory of Puducherry), India</strong>, shall have exclusive territorial jurisdiction over all matters and disputes arising out of these Terms.
                            </p>
                        </section>

                        <!-- 12. Modifications to Terms -->
                        <section class="policy-section" id="modifications">
                            <h3 class="policy-section-title">12. Changes to These Terms</h3>
                            <p class="policy-text">
                                We reserve the right to amend or update these Terms &amp; Conditions at any time to reflect changes in our business practices, operational procedures, or legal and regulatory requirements. Any updates will become effective immediately upon being published on this page, with the revised "Last Updated" date clearly indicated.
                            </p>
                        </section>

                        <!-- Bottom Concierge Banner -->
                        <div class="policy-concierge-banner">
                            <div>
                                <h4 class="policy-concierge-title">Have Questions About Our Store Terms?</h4>
                                <p class="policy-concierge-desc">Our Puducherry boutique concierge is here to assist you warmly with any clarification.</p>
                            </div>
                            <div>
                                <a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique%2C%20I%20have%20a%20question%20regarding%20your%20Terms%20%26%20Conditions." 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="btn-concierge-wa">
                                    <i class="bi bi-whatsapp"></i> Chat with Concierge
                                </a>
                            </div>
                        </div>

                    </article>
                </div>

                <!-- ── SIDEBAR ── -->
                <div class="col-lg-4 col-12">
                    @include('components.frontend.policy-sidebar')
                </div>

            </div>
        </div>
    </section>

@endsection
