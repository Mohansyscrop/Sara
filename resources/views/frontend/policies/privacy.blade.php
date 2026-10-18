@extends('layouts.app')

@section('title', "Privacy Policy | Sara’s Boutique Puducherry — Data Protection & Security")
@section('meta_description', "Read the official Privacy Policy for Sara’s Boutique in Shanmugapuram, Puducherry. Learn how we safeguard your personal data, ensure secure Razorpay payments, and respect your privacy rights.")
@section('meta_keywords', "Sara's Boutique Privacy Policy, Saras Boutique Puducherry, Data Security, Razorpay Payment Privacy, Puducherry Online Boutique Privacy")
@section('canonical_url', route('privacy'))
@section('og_title', "Privacy Policy | Sara’s Boutique Puducherry")
@section('og_description', "Privacy Policy for Sara’s Boutique. Clear standards for customer data handling, secure payment tokenization, and strict data privacy under Indian IT laws.")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/policies.css') }}">
@endpush

@section('content')

    <!-- ===================== HERO BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Privacy Policy Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">
                <span class="collection-eyebrow hero-load-item delay-1">DATA PROTECTION &amp; TRUST</span>
                <h1 class="collection-main-title hero-load-item delay-2">Privacy Policy</h1>
                <span class="collection-script-subtitle hero-load-item delay-3">Your Privacy &amp; Data Security Are Sacred to Us</span>

                <p class="collection-desc hero-load-item delay-4">
                    Sara’s Boutique is dedicated to maintaining the confidentiality, integrity, and security of all personal details shared by our valued patrons when browsing or ordering.
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
                        <li><a href="{{ route('privacy') }}">Policies</a></li>
                        <li class="crumb-sep">›</li>
                        <li class="active">Privacy Policy</li>
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
                                <i class="bi bi-shield-lock-fill"></i> Data Protection &amp; Confidentiality
                            </span>
                            <h2 class="policy-card-title">Customer Privacy &amp; Data Protection Policy</h2>
                            <div class="policy-meta-info">
                                <span><i class="bi bi-calendar3 me-1 text-gold"></i> Last Updated: October 2026</span>
                                <span><i class="bi bi-check2-circle me-1 text-gold"></i> Regulatory Framework: IT Act 2000 &amp; DPDP Act</span>
                                <span><i class="bi bi-geo-alt me-1 text-gold"></i> Sara’s Boutique, Puducherry</span>
                            </div>
                        </div>

                        <!-- Payment Compliance Notice Box -->
                        <div class="policy-callout-box info">
                            <div class="policy-callout-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div>
                                <strong>Payment Security Guarantee:</strong> Sara’s Boutique does <strong>NOT</strong> collect, process, or store your debit/credit card numbers, CVV codes, Net Banking passwords, or UPI PINs. All online payments are handled directly by <strong>Razorpay</strong> over bank-grade 256-bit SSL encrypted sessions adhering to global PCI-DSS Level 1 compliance.
                            </div>
                        </div>

                        <!-- 1. Introduction -->
                        <section class="policy-section" id="introduction">
                            <h3 class="policy-section-title">1. Introduction &amp; Scope</h3>
                            <p class="policy-text">
                                This Privacy Policy explains how <strong>Sara’s Boutique</strong> ("we", "us", or "our"), situated at No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009, collects, uses, protects, and discloses personal information obtained from customers and visitors through our website (<a href="{{ url('/') }}" class="text-dark fw-semibold">{{ url('/') }}</a>) and our customer service channels.
                            </p>
                            <p class="policy-text">
                                We are committed to complying with applicable data protection laws of India, including the Information Technology Act, 2000, the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011, and the Digital Personal Data Protection Act, 2023 (DPDP Act).
                            </p>
                        </section>

                        <!-- 2. What We Collect -->
                        <section class="policy-section" id="data-collected">
                            <h3 class="policy-section-title">2. Customer Information We Collect</h3>
                            <p class="policy-text">
                                We only collect personal information that is reasonably necessary to fulfill your orders, provide styling and sizing consultations, and deliver customer service:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Contact Information:</strong> Your full name, email address, and mobile/telephone number;</li>
                                <li><strong>Shipping &amp; Delivery Address:</strong> Street address, flat/house number, landmark, city, state, postal PIN code, and country (India);</li>
                                <li><strong>Order &amp; Transaction Details:</strong> Products purchased, sizes, colour selections, quantities, order date, order reference number (e.g., <code>SB-YYYYMMDD-XXXXX</code>), and subtotal amounts;</li>
                                <li><strong>Payment Transaction References:</strong> Gateway payment identifier (e.g., Razorpay Payment ID and Order ID), payment timestamp, and transaction status (e.g., Paid, Pending, Refunded). <em>Note: No sensitive banking credentials are ever stored by us.</em></li>
                                <li><strong>Customer Support Inquiries:</strong> Details and messages you submit through our Contact Us form, email correspondence, or official WhatsApp chat conversations regarding collections, sizing, and order tracking;</li>
                                <li><strong>Technical &amp; Session Data:</strong> Technical logs including your IP address, browser type, operating system, and session identifiers necessary for shopping cart functionality.</li>
                            </ul>
                        </section>

                        <!-- 3. What We DO NOT Collect -->
                        <section class="policy-section" id="what-we-do-not-collect">
                            <h3 class="policy-section-title">3. Information We Explicitly DO NOT Store</h3>
                            <p class="policy-text">
                                To ensure maximum safety for our customers, Sara’s Boutique explicitly maintains a zero-storage policy for sensitive financial data:
                            </p>
                            <ul class="policy-list">
                                <li>We do <strong>NOT</strong> collect or store credit or debit card numbers, card expiry dates, or CVV/CVC codes.</li>
                                <li>We do <strong>NOT</strong> store Net Banking user credentials or passwords.</li>
                                <li>We do <strong>NOT</strong> ask for, view, or store UPI MPINs or OTPs (One-Time Passwords).</li>
                            </ul>
                            <p class="policy-text">
                                When you initiate checkout on our website, you are securely connected to Razorpay’s payment gateway interface. The payment aggregator directly interacts with your issuing bank through secure protocols. Sara’s Boutique only receives a cryptographic success/failure confirmation along with an official transaction reference ID to mark your order as confirmed.
                            </p>
                        </section>

                        <!-- 4. How We Use Information -->
                        <section class="policy-section" id="how-we-use-data">
                            <h3 class="policy-section-title">4. Purpose of Data Collection &amp; How It Is Used</h3>
                            <p class="policy-text">
                                Your personal details are used strictly for legitimate commercial and customer-support purposes:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Order Fulfilment:</strong> Processing your boutique purchase, tailoring/altering sets if requested, preparing the package, and dispatching it to your doorstep;</li>
                                <li><strong>Delivery Coordination:</strong> Sharing your shipping address and contact telephone number with authorized domestic courier partners for accurate doorstep delivery;</li>
                                <li><strong>Order Communications:</strong> Sending order confirmations, dispatch alerts, tracking URLs, delivery status updates, and invoice receipts via email, SMS, or WhatsApp;</li>
                                <li><strong>Concierge Styling &amp; Support:</strong> Answering inquiries regarding fabric care, sizing fitments, returns, exchanges, or order modifications;</li>
                                <li><strong>Accounting &amp; Legal Compliance:</strong> Maintaining commercial sales ledgers, GST tax invoices, and fulfilling statutory requirements under Indian law;</li>
                                <li><strong>Security &amp; Fraud Prevention:</strong> Detecting and mitigating fraudulent orders, unauthorized access, or misuse of our platform.</li>
                            </ul>
                        </section>

                        <!-- 5. Third-Party Sharing -->
                        <section class="policy-section" id="data-sharing">
                            <h3 class="policy-section-title">5. Data Sharing &amp; Third-Party Service Providers</h3>
                            <p class="policy-text">
                                <strong>We never sell, trade, rent, or lease your personal data to third-party marketing agencies.</strong> We only share necessary customer data with trusted third parties under strict confidentiality and operational necessity:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Payment Gateway (Razorpay):</strong> Transaction amount and basic contact identifiers are transmitted to Razorpay Software Private Limited to verify and tokenize your payment.</li>
                                <li><strong>Logistics &amp; Courier Partners:</strong> Recipient name, complete delivery address, and contact phone number are shared with reputable domestic express courier services (e.g., Delhivery, Blue Dart, DTDC, India Post Speed Post) solely for executing physical delivery.</li>
                                <li><strong>Web Hosting &amp; Email Providers:</strong> Secure cloud server infrastructure and transactional email delivery providers that process database records under confidentiality agreements.</li>
                                <li><strong>Law Enforcement &amp; Legal Mandates:</strong> We may disclose information if required to do so by applicable Indian law, court order, or governmental authority in good-faith compliance with valid legal processes.</li>
                            </ul>
                        </section>

                        <!-- 6. Cookies & Analytics -->
                        <section class="policy-section" id="cookies">
                            <h3 class="policy-section-title">6. Cookies &amp; Website Session Technologies</h3>
                            <p class="policy-text">
                                Our website uses limited, essential functional cookies:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Session Cookies:</strong> Temporary cookies used to remember your active session, shopping bag items, and language/display settings while you navigate pages;</li>
                                <li><strong>CSRF Security Cookies:</strong> Cryptographic token cookies required by the Laravel web framework to protect forms and checkout submissions against Cross-Site Request Forgery (CSRF) attacks;</li>
                                <li><strong>No Third-Party Ad Trackers:</strong> We do not deploy invasive cross-site advertising trackers or sell browsing profiles to behavioral ad networks.</li>
                            </ul>
                            <p class="policy-text">
                                You can configure your internet browser to refuse cookies or alert you when cookies are being sent. Note that disabling essential session cookies may cause certain interactive features (such as shopping bag management and secure checkout) to function improperly.
                            </p>
                        </section>

                        <!-- 7. Data Security Safeguards -->
                        <section class="policy-section" id="data-security">
                            <h3 class="policy-section-title">7. Data Security Safeguards</h3>
                            <p class="policy-text">
                                We implement practical technical and operational safeguards to protect your personal information against unauthorized access, loss, alteration, or disclosure:
                            </p>
                            <ul class="policy-list">
                                <li><strong>SSL/TLS Encryption:</strong> All data transmitted between your browser and our website is protected using industry-standard HTTPS encryption;</li>
                                <li><strong>Restricted Access:</strong> Access to customer order records is restricted to authorized boutique personnel who require the information for order dispatch and customer support;</li>
                                <li><strong>Secure Server Infrastructure:</strong> Regular software security patches, firewalls, and encrypted database connections are maintained.</li>
                            </ul>
                            <p class="policy-text">
                                While we employ standard industry safeguards, please note that no method of electronic storage or transmission over the public internet is 100% impenetrable. We encourage customers to maintain confidential credentials and notify us immediately of any suspected irregularities.
                            </p>
                        </section>

                        <!-- 8. Data Retention Period -->
                        <section class="policy-section" id="data-retention">
                            <h3 class="policy-section-title">8. Data Retention</h3>
                            <p class="policy-text">
                                We retain customer personal information for as long as is necessary to fulfill the purposes outlined in this policy:
                            </p>
                            <ul class="policy-list">
                                <li>Order and transactional data is retained for a minimum period of 7 years in accordance with Indian commercial bookkeeping, GST, and income tax regulations;</li>
                                <li>Customer inquiries, messages, and correspondence are retained for up to 12 months to assist with customer support history and recurring patron consultations;</li>
                                <li>When data is no longer required, it is securely deleted, purged, or anonymized.</li>
                            </ul>
                        </section>

                        <!-- 9. Customer Rights under Indian Law -->
                        <section class="policy-section" id="customer-rights">
                            <h3 class="policy-section-title">9. Your Privacy Rights &amp; Choices</h3>
                            <p class="policy-text">
                                Under applicable Indian laws and the Digital Personal Data Protection Act, you have the right to:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Access &amp; Review:</strong> Request a summary of personal information we maintain concerning your account and orders;</li>
                                <li><strong>Correction &amp; Updating:</strong> Request the correction or updating of inaccurate or incomplete personal contact details;</li>
                                <li><strong>Erasure / Deletion:</strong> Request the deletion of personal data, subject to statutory retention requirements under tax and accounting laws;</li>
                                <li><strong>Withdrawal of Consent:</strong> Opt out of non-essential promotional messages or newsletters at any time.</li>
                            </ul>
                            <p class="policy-text">
                                To exercise any of these rights, please email our support team at <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a> with the subject line <em>"Data Privacy Request"</em>. We will process verified requests within 30 business days.
                            </p>
                        </section>

                        <!-- 10. Grievance Officer & Contact Details -->
                        <section class="policy-section" id="grievance-officer">
                            <h3 class="policy-section-title">10. Grievance Redressal &amp; Privacy Officer</h3>
                            <p class="policy-text">
                                In accordance with the Information Technology Act, 2000, and rules made thereunder, the details of our Grievance Redressal Officer for privacy concerns are:
                            </p>
                            <div class="p-3 rounded-3" style="background: #faf6f0; border: 1px solid #ebdcc5;">
                                <p class="mb-1"><strong>Designation:</strong> Customer Care &amp; Privacy Grievance Officer</p>
                                <p class="mb-1"><strong>Enterprise:</strong> Sara’s Boutique</p>
                                <p class="mb-1"><strong>Postal Address:</strong> No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009, India.</p>
                                <p class="mb-1"><strong>Direct Email:</strong> <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a></p>
                                <p class="mb-0"><strong>Direct Phone:</strong> <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a></p>
                            </div>
                        </section>

                        <!-- 11. Policy Modifications -->
                        <section class="policy-section" id="modifications">
                            <h3 class="policy-section-title">11. Updates to This Privacy Policy</h3>
                            <p class="policy-text">
                                We may periodically update this Privacy Policy to reflect operational enhancements, new payment gateway capabilities, or regulatory directives. When changes occur, the updated policy will be posted on this page with an updated "Last Updated" date. We encourage you to review this policy periodically.
                            </p>
                        </section>

                        <!-- Bottom Concierge Banner -->
                        <div class="policy-concierge-banner">
                            <div>
                                <h4 class="policy-concierge-title">Concerned About Your Data Privacy?</h4>
                                <p class="policy-concierge-desc">Feel free to reach out to our Puducherry team anytime for privacy or security inquiries.</p>
                            </div>
                            <div>
                                <a href="mailto:Sarasboutique2026@gmail.com?subject=Privacy%20Question" class="btn-concierge-wa" style="background: linear-gradient(135deg, #240038 0%, #4a026e 100%); border: 1px solid var(--policy-gold);">
                                    <i class="bi bi-envelope-fill"></i> Email Privacy Team
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
