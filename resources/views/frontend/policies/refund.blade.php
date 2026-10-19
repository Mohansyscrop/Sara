@extends('layouts.app')

@section('title', "Refund & Cancellation Policy | Sara’s Boutique Puducherry — Fair Return Terms")
@section('meta_description', "Review the official Refund & Cancellation Policy for Sara’s Boutique in Shanmugapuram, Puducherry. Transparent procedures for pre-dispatch cancellations, 7-day returns for defective garments, and secure Razorpay refund processing.")
@section('meta_keywords', "Sara's Boutique Refund Policy, Cancellation Terms Puducherry, Razorpay Refund Timelines, Churidar Return Policy, Ethnic Wear Exchange Puducherry")
@section('canonical_url', route('refund.policy'))
@section('og_title', "Refund & Cancellation Policy | Sara’s Boutique Puducherry")
@section('og_description', "Official Refund & Cancellation Policy for Sara’s Boutique. Clear terms for order cancellation before dispatch, 7-day return guidelines, and transparent refund timelines.")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/policies.css') }}">
@endpush

@section('content')

    <!-- ===================== HERO BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Refund and Cancellation Policy Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">
                <span class="collection-eyebrow hero-load-item delay-1">RETURNS &amp; CANCELLATIONS</span>
                <h1 class="collection-main-title hero-load-item delay-2">Refund &amp; Cancellation Policy</h1>
                <span class="collection-script-subtitle hero-load-item delay-3">Fair, Transparent &amp; Customer-First Boutique Care</span>

                <p class="collection-desc hero-load-item delay-4">
                    We want you to be completely satisfied with every handcrafted ensemble from Sara’s Boutique. Learn about our clear, fair terms regarding cancellations, exchanges, and refunds.
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
                        <li><a href="{{ route('refund.policy') }}">Policies</a></li>
                        <li class="crumb-sep">›</li>
                        <li class="active">Refund &amp; Cancellation</li>
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
                                <i class="bi bi-arrow-counterclockwise"></i> Customer Protection Standards
                            </span>
                            <h2 class="policy-card-title">Refund, Return &amp; Order Cancellation Policy</h2>
                            <div class="policy-meta-info">
                                <span><i class="bi bi-calendar3 me-1 text-gold"></i> Last Updated: October 2026</span>
                                <span><i class="bi bi-shield-check me-1 text-gold"></i> Return Window: 7 Days from Delivery</span>
                                <span><i class="bi bi-credit-card me-1 text-gold"></i> Settlement: Original Payment Mode</span>
                            </div>
                        </div>

                        <!-- Highlights Notice Box -->
                        <div class="policy-callout-box">
                            <div class="policy-callout-icon">
                                <i class="bi bi-info-circle-fill"></i>
                            </div>
                            <div>
                                <strong>Consumer-First Guarantee:</strong> In strict compliance with the Consumer Protection (E-Commerce) Rules, 2020, and the Consumer Protection Act, 2019, Sara’s Boutique guarantees your right to a replacement or full refund if you receive an item that is damaged, defective, or materially different from what was ordered.
                            </div>
                        </div>

                        <!-- 1. Order Cancellation Prior to Dispatch -->
                        <section class="policy-section" id="cancellation-pre-dispatch">
                            <h3 class="policy-section-title">1. Order Cancellation (Before Dispatch)</h3>
                            <p class="policy-text">
                                We understand that circumstances may change after an order is placed:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Pre-Dispatch Cancellation Window:</strong> You may cancel your order at any time <strong>before it is marked as "Shipped" or dispatched</strong> from our Shanmugapuram boutique (typically within 12 to 24 hours of placing the order).</li>
                                <li><strong>How to Cancel:</strong> To cancel, simply message our boutique concierge on WhatsApp at <a href="https://wa.me/919442634491" target="_blank" class="text-dark fw-semibold">+91 94426 34491</a> or email <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a> with your unique Order ID (e.g., <code>SB-YYYYMMDD-XXXXX</code>) and the subject line <em>"Request for Order Cancellation"</em>.</li>
                                <li><strong>Refund for Cancelled Orders:</strong> Once pre-dispatch cancellation is confirmed, a <strong>100% full refund</strong> (including any shipping charges paid) is initiated immediately back to your original source of payment (via Razorpay or bank transfer).</li>
                            </ul>
                        </section>

                        <!-- 2. Cancellation After Dispatch -->
                        <section class="policy-section" id="cancellation-post-dispatch">
                            <h3 class="policy-section-title">2. Order Cancellation (After Dispatch)</h3>
                            <p class="policy-text">
                                Once an order has been securely packed and handed over to our domestic courier partner, it is in physical transit and cannot be recalled or cancelled mid-route.
                            </p>
                            <p class="policy-text">
                                In such instances, please allow the parcel to be delivered. You may then initiate an eligible return or exchange under our <strong>7-Day Return &amp; Exchange Policy</strong> outlined below. If you decline to accept delivery at your doorstep, the parcel will return to our boutique, and any applicable two-way transit courier charges will be deducted from your refund.
                            </p>
                        </section>

                        <!-- 3. Return Eligibility & Timeframe -->
                        <section class="policy-section" id="return-eligibility">
                            <h3 class="policy-section-title">3. Return &amp; Exchange Eligibility (Within 7 Days)</h3>
                            <p class="policy-text">
                                We offer a <strong>7-Day Return / Exchange Request Window</strong> <span class="policy-flag">Owner Confirmation: Standard 7-Day Window</span> commencing on the date the tracking confirms delivery of your parcel.
                            </p>
                            <p class="policy-text">
                                To be eligible for a return or size exchange, the garment must satisfy all of the following condition requirements:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Unworn &amp; Unwashed:</strong> The garment must be completely unused, unworn, unwashed, and in the exact brand-new condition in which it was received.</li>
                                <li><strong>Original Tags &amp; Packaging:</strong> All original boutique tags, security labels, brand tags, and protective sleeves must be intact and attached without tampering.</li>
                                <li><strong>Free from Odors &amp; Stains:</strong> Garments showing any signs of perfume, makeup stains, deodorant marks, body odor, fabric snags, or dry-cleaning will not be eligible for return.</li>
                                <li><strong>Complete Ensemble:</strong> Multi-piece ensembles (e.g., Kurta + Bottom Pant + Dupatta) must be returned together with all accompanying accessories and fabric swatches.</li>
                            </ul>
                        </section>

                        <!-- 4. Damaged, Defective, or Incorrect Products -->
                        <section class="policy-section" id="defective-damaged">
                            <h3 class="policy-section-title">4. Damaged, Defective, or Incorrect Items</h3>
                            <p class="policy-text">
                                While our boutique team performs meticulous 3-point quality inspections prior to packing, if your order arrives damaged during transit, has a manufacturing defect (e.g., torn seams, broken zipper), or contains an incorrect size/item:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Notify Us Within 48 Hours:</strong> Contact us within <strong>48 hours of confirmed delivery</strong> via email (<a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a>) or WhatsApp (<a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a>).</li>
                                <li><strong>Required Documentation:</strong> Please share:
                                    <ol class="mt-2 mb-2">
                                        <li>Your Order Number (e.g., <code>SB-XXXXX</code>);</li>
                                        <li>Clear photographs and/or a brief unboxing video highlighting the defective or incorrect area;</li>
                                        <li>A photo of the outer courier flyer with the shipping label visible.</li>
                                    </ol>
                                </li>
                                <li><strong>Zero-Cost Resolution:</strong> For verified defective or damaged pieces, Sara’s Boutique will arrange a complimentary reverse courier pickup (or reimburse domestic reverse speed-post shipping expenses).</li>
                                <li><strong>Your Choice of Remedy:</strong> You may choose between an immediate replacement with a fresh piece, an exchange for another collection design, or a <strong>100% full monetary refund</strong> to your original payment method.</li>
                            </ul>
                        </section>

                        <!-- 5. Non-Returnable / Excluded Items -->
                        <section class="policy-section" id="exclusions">
                            <h3 class="policy-section-title">5. Non-Returnable &amp; Excluded Products</h3>
                            <p class="policy-text">
                                Due to hygiene reasons and bespoke custom production, the following categories cannot be returned or refunded unless received in a damaged or defective condition:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Custom-Stitched or Altered Garments:</strong> Pieces customized to specific body measurements, customized hem alterations, or custom stitched necklines requested by the patron;</li>
                                <li><strong>Final Clearance / Archive Sale:</strong> Items purchased from heavily discounted seasonal clearance sections where explicitly tagged as <em>"Final Sale"</em>;</li>
                                <li><strong>Wear &amp; Tear / Improper Washing:</strong> Items damaged due to improper hand-washing, chlorine bleaching, high-heat iron burns, or failure to follow pure silk/chanderi dry-clean-only instructions;</li>
                                <li>Returns requested after the expiration of the 7-day post-delivery window.</li>
                            </ul>
                        </section>

                        <!-- 6. Step-by-Step Return Process -->
                        <section class="policy-section" id="return-process">
                            <h3 class="policy-section-title">6. How to Request a Return or Exchange</h3>
                            <p class="policy-text">
                                We make our return process simple, dignified, and straightforward:
                            </p>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6 col-12">
                                    <div class="p-3 rounded-3 h-100" style="background: #faf6f0; border: 1px solid #ebdcc5;">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <span class="badge rounded-circle bg-dark text-white p-2" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">1</span>
                                            <strong style="color: var(--policy-plum);">Initiate Your Request</strong>
                                        </div>
                                        <p class="small mb-0 text-muted">Message WhatsApp <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a> or email <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a> with your Order ID, reason, and photo evidence if damaged.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="p-3 rounded-3 h-100" style="background: #faf6f0; border: 1px solid #ebdcc5;">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <span class="badge rounded-circle bg-dark text-white p-2" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">2</span>
                                            <strong style="color: var(--policy-plum);">Return Authorization</strong>
                                        </div>
                                        <p class="small mb-0 text-muted">Our concierge reviews your request within 24 business hours and issues a Return Authorization Number along with return shipping instructions.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="p-3 rounded-3 h-100" style="background: #faf6f0; border: 1px solid #ebdcc5;">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <span class="badge rounded-circle bg-dark text-white p-2" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">3</span>
                                            <strong style="color: var(--policy-plum);">Safe Packaging &amp; Dispatch</strong>
                                        </div>
                                        <p class="small mb-0 text-muted">Pack the garment securely in its original packaging. Depending on your pin code, we arrange a doorstep pickup or provide our boutique return address in Shanmugapuram, Puducherry.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="p-3 rounded-3 h-100" style="background: #faf6f0; border: 1px solid #ebdcc5;">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <span class="badge rounded-circle bg-dark text-white p-2" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">4</span>
                                            <strong style="color: var(--policy-plum);">Inspection &amp; Refund</strong>
                                        </div>
                                        <p class="small mb-0 text-muted">Upon receiving the parcel, our team inspects the piece within 48 business hours and triggers your refund or dispatches your replacement piece.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- 7. Refund Timelines & Payment Provider (Razorpay) Settlement -->
                        <section class="policy-section" id="refund-timelines">
                            <h3 class="policy-section-title">7. Refund Processing &amp; Payment Gateway Settlement</h3>
                            <p class="policy-text">
                                We pride ourselves on prompt, transparent financial settlements:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Quality Inspection Window:</strong> Returns are inspected by our quality team within <strong>2 to 4 business days</strong> of arrival at our boutique.</li>
                                <li><strong>Prepaid Online Orders (Razorpay):</strong> Once approved, the refund is initiated directly via Razorpay back to the original source of payment (credit card, debit card, Net Banking account, or UPI handle).</li>
                                <li><strong>Banking Settlement Timeline:</strong> Under RBI guidelines and inter-bank clearing cycles:
                                    <ul class="mt-1 mb-1">
                                        <li><strong>UPI Refunds:</strong> Typically reflect within <strong>24 to 48 hours</strong>;</li>
                                        <li><strong>Net Banking &amp; Debit Cards:</strong> Typically reflect within <strong>3 to 5 business days</strong>;</li>
                                        <li><strong>Credit Cards:</strong> Typically reflect on your card statement within <strong>5 to 7 business days</strong> depending on your card issuer’s billing cycle.</li>
                                    </ul>
                                </li>
                                <li><strong>Direct / Offline Orders:</strong> For direct WhatsApp orders paid via direct bank transfer or store settlement, refunds are disbursed via verified NEFT/IMPS/UPI directly to the customer’s verified Indian bank account within 3 business days of return approval.</li>
                                <li>You will receive a refund confirmation notification along with the Razorpay Refund Reference Number (RRN) to track the credit with your bank.</li>
                            </ul>
                        </section>

                        <!-- 8. Return Address -->
                        <section class="policy-section" id="return-address">
                            <h3 class="policy-section-title">8. Official Store Return Address</h3>
                            <p class="policy-text">
                                All authorized returns must be addressed and dispatched to our physical boutique in Puducherry:
                            </p>
                            <div class="p-3 rounded-3" style="background: #faf6f0; border: 1px solid #ebdcc5;">
                                <p class="mb-1 fw-bold" style="color: var(--policy-plum);"><i class="bi bi-geo-alt-fill text-gold me-1"></i> Sara’s Boutique (Returns Department)</p>
                                <p class="mb-1">No. 1, 2nd Mani Road, 4th Cross Street,</p>
                                <p class="mb-1">Manikachettyar Nagar, Shanmugapuram,</p>
                                <p class="mb-1">Puducherry – 605009, India.</p>
                                <p class="mb-0"><strong>Contact Helpline:</strong> <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a></p>
                            </div>
                        </section>

                        <!-- 9. Sizing Exchanges & Store Credit -->
                        <section class="policy-section" id="exchanges">
                            <h3 class="policy-section-title">9. Exchanges &amp; Boutique Store Credit</h3>
                            <p class="policy-text">
                                If you love the design but need a different size:
                            </p>
                            <ul class="policy-list">
                                <li>We are happy to provide a complimentary <strong>one-time size exchange</strong> (subject to stock availability in your requested size).</li>
                                <li>If your required alternative size is sold out, you may select any other design from our collections or opt for a full refund or boutique store credit.</li>
                                <li>Boutique store credit is issued as a digital voucher valid for <strong>6 months</strong> from the date of issuance and can be redeemed online or at our Shanmugapuram boutique store.</li>
                            </ul>
                        </section>

                        <!-- 10. Customer Support Contact -->
                        <section class="policy-section" id="support-contact">
                            <h3 class="policy-section-title">10. Dedicated Return &amp; Refund Assistance</h3>
                            <p class="policy-text">
                                Our friendly team is here to ensure that your experience with Sara’s Boutique is pleasant and worry-free. For any questions concerning returns or refunds:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Email Support:</strong> <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a></li>
                                <li><strong>Customer Support Phone:</strong> <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a></li>
                                <li><strong>WhatsApp Concierge:</strong> <a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique%2C%20I%20have%20an%20inquiry%20regarding%20a%20return%20or%20refund." target="_blank" rel="noopener noreferrer" class="text-dark fw-semibold">+91 94426 34491</a></li>
                                <li><strong>Store Timings:</strong> Monday to Sunday, 10:00 AM – 9:00 PM IST.</li>
                            </ul>
                        </section>

                        <!-- Bottom Concierge Banner -->
                        <div class="policy-concierge-banner">
                            <div>
                                <h4 class="policy-concierge-title">Need to Request a Return or Exchange?</h4>
                                <p class="policy-concierge-desc">Our Puducherry concierge will assist you step-by-step with your return authorization.</p>
                            </div>
                            <div>
                                <a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique%2C%20I%20would%20like%20to%20request%20a%20return%2Fexchange%20for%20my%20order." 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="btn-concierge-wa">
                                    <i class="bi bi-whatsapp"></i> Chat with Support
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
