@extends('layouts.app')

@section('title', "Shipping & Delivery Policy | Sara’s Boutique Puducherry — Domestic Shipping")
@section('meta_description', "Review the official Shipping and Delivery Policy for Sara’s Boutique in Shanmugapuram, Puducherry. Learn about order dispatch times, transit estimates, courier tracking, and free shipping on orders above ₹4,000.")
@section('meta_keywords', "Sara's Boutique Shipping Policy, Domestic Delivery India, Free Shipping Puducherry, Churidar Courier Delivery, Ethnic Wear Shipping Timelines")
@section('canonical_url', route('shipping.policy'))
@section('og_title', "Shipping & Delivery Policy | Sara’s Boutique Puducherry")
@section('og_description', "Official Shipping Policy for Sara’s Boutique. Clear dispatch timelines, shipping charges (Free on ₹4,000+), express tracking, and doorstep delivery across India.")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/policies.css') }}">
@endpush

@section('content')

    <!-- ===================== HERO BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Shipping and Delivery Policy Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">
                <span class="collection-eyebrow hero-load-item delay-1">DOMESTIC FULFILMENT</span>
                <h1 class="collection-main-title hero-load-item delay-2">Shipping &amp; Delivery Policy</h1>
                <span class="collection-script-subtitle hero-load-item delay-3">Carefully Packed &amp; Safely Delivered to Your Doorstep</span>

                <p class="collection-desc hero-load-item delay-4">
                    Every Churidar set and designer ensemble is inspected and packaged with boutique care before being dispatched via trusted domestic express couriers across India.
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
                        <li><a href="{{ route('shipping.policy') }}">Policies</a></li>
                        <li class="crumb-sep">›</li>
                        <li class="active">Shipping &amp; Delivery</li>
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
                                <i class="bi bi-truck"></i> Fulfilment &amp; Logistics Standards
                            </span>
                            <h2 class="policy-card-title">Shipping &amp; Delivery Guidelines</h2>
                            <div class="policy-meta-info">
                                <span><i class="bi bi-calendar3 me-1 text-gold"></i> Last Updated: October 2026</span>
                                <span><i class="bi bi-box-seam me-1 text-gold"></i> Standard Dispatch: 1–3 Business Days</span>
                                <span><i class="bi bi-geo-alt me-1 text-gold"></i> Origin: Shanmugapuram, Puducherry</span>
                            </div>
                        </div>

                        <!-- Highlights Callout Box -->
                        <div class="policy-callout-box">
                            <div class="policy-callout-icon">
                                <i class="bi bi-stars"></i>
                            </div>
                            <div>
                                <strong>Free Domestic Shipping:</strong> We are delighted to offer <strong>FREE Standard Shipping</strong> on all domestic prepaid orders with an order subtotal of <strong>₹4,000 or above</strong>. For orders below ₹4,000, a nominal flat delivery charge of <strong>₹150.00</strong> is applied at checkout.
                            </div>
                        </div>

                        <!-- 1. Serviceable Locations -->
                        <section class="policy-section" id="serviceable-locations">
                            <h3 class="policy-section-title">1. Serviceable Delivery Locations</h3>
                            <p class="policy-text">
                                Sara’s Boutique provides doorstep delivery across India to all serviceable PIN codes handled by our logistics partners (including Tier-1, Tier-2, Tier-3 cities, and towns).
                            </p>
                            <p class="policy-text">
                                At this time, our online checkout processes domestic orders within the Republic of India only. If you require international shipping (e.g., to the USA, UK, UAE, Singapore, or Malaysia), please contact our VIP Concierge via WhatsApp at <a href="https://wa.me/919442634491" target="_blank" class="text-dark fw-semibold">+91 94426 34491</a> for customized international courier quotes and customs guidelines.
                            </p>
                        </section>

                        <!-- 2. Processing & Dispatch Timelines -->
                        <section class="policy-section" id="dispatch-timelines">
                            <h3 class="policy-section-title">2. Order Processing &amp; Dispatch Timelines</h3>
                            <p class="policy-text">
                                Each order undergoes rigorous quality verification, hand-steaming, and careful packaging before dispatch:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Ready-to-Ship Boutique Collections:</strong> Dispatched within <strong>1 to 2 business days</strong> <span class="policy-flag">Configurable Baseline</span> following successful payment authorization.</li>
                                <li><strong>Pieces Requiring Custom Hemming / Minor Alterations:</strong> Dispatched within <strong>3 to 5 business days</strong> <span class="policy-flag">Owner Confirmation</span> to ensure precision craftsmanship.</li>
                                <li><strong>Dispatch Days:</strong> Our boutique fulfilment team operates from <strong>Monday through Saturday</strong> (excluding Sundays and declared national or Puducherry state public holidays).</li>
                                <li>Orders confirmed after 4:00 PM IST on Saturday are scheduled for handover to courier partners on the following business day (Monday).</li>
                            </ul>
                        </section>

                        <!-- 3. Estimated Transit & Delivery Timelines -->
                        <section class="policy-section" id="delivery-timelines">
                            <h3 class="policy-section-title">3. Estimated Shipping &amp; Delivery Timelines</h3>
                            <p class="policy-text">
                                Total delivery time is the sum of our internal dispatch window plus courier transit time. Below are standard transit estimates based on typical domestic courier schedules:
                            </p>

                            <!-- Responsive Shipping Table -->
                            <div class="policy-table-responsive">
                                <table class="policy-table">
                                    <thead>
                                        <tr>
                                            <th>Destination Region</th>
                                            <th>Estimated Transit Time</th>
                                            <th>Typical Courier Mode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Puducherry &amp; Tamil Nadu</strong></td>
                                            <td>2 to 3 Business Days</td>
                                            <td>Express Regional Surface / Air</td>
                                        </tr>
                                        <tr>
                                            <td><strong>South India</strong> (Karnataka, Kerala, Andhra Pradesh, Telangana)</td>
                                            <td>3 to 5 Business Days</td>
                                            <td>Express Interstate Air / Surface</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Metro Cities Across India</strong> (Mumbai, Delhi NCR, Kolkata, Pune, Ahmedabad)</td>
                                            <td>4 to 6 Business Days</td>
                                            <td>National Express Air Cargo</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Rest of India</strong> (Central, Northern, Eastern &amp; Western States)</td>
                                            <td>5 to 7 Business Days</td>
                                            <td>Standard Express Courier</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Special Coverage &amp; Remote Pincodes</strong> (J&amp;K, North-East, Island territories)</td>
                                            <td>7 to 10 Business Days</td>
                                            <td>India Post Speed Post / Air Cargo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <p class="policy-text small text-muted">
                                <em>*Note: The timelines above are business estimates provided by third-party logistics carriers. Actual delivery may vary due to regional factors, weather conditions, local holidays, or festive peak seasons.</em>
                            </p>
                        </section>

                        <!-- 4. Shipping Fees & Free Shipping Threshold -->
                        <section class="policy-section" id="shipping-charges">
                            <h3 class="policy-section-title">4. Shipping Charges &amp; Free Delivery Condition</h3>
                            <p class="policy-text">
                                We maintain complete transparency regarding our shipping fees. There are no hidden packaging or convenience surcharges at checkout:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Orders ₹4,000 and Above:</strong> <strong>FREE Standard Domestic Shipping</strong> <span class="policy-flag">Verified Checkout Logic</span>. The shipping charge is automatically discounted to ₹0.00 at checkout.</li>
                                <li><strong>Orders Below ₹4,000:</strong> A flat shipping and handling charge of <strong>₹150.00</strong> is added to cover insured express transit.</li>
                                <li>All shipping charges are shown explicitly in your order breakdown prior to completing payment through Razorpay or direct order submission.</li>
                            </ul>
                        </section>

                        <!-- 5. Courier Tracking & Delivery Notifications -->
                        <section class="policy-section" id="tracking-notifications">
                            <h3 class="policy-section-title">5. Courier Tracking &amp; Notifications</h3>
                            <p class="policy-text">
                                We keep you informed at every milestone of your parcel’s journey:
                            </p>
                            <ul class="policy-list">
                                <li>As soon as your parcel is packed and handed over to our courier partner (such as Blue Dart, Delhivery, DTDC, or Speed Post <span class="policy-flag">Owner Confirmation: Preferred Partner</span>), we generate a unique Air Waybill / Tracking Number (AWB).</li>
                                <li>You will receive an automated dispatch notification via <strong>Email and/or SMS/WhatsApp</strong> containing your tracking number and direct tracking URL.</li>
                                <li>You can track the live movement of your shipment directly on the carrier’s portal from our Puducherry boutique right up to your delivery address.</li>
                            </ul>
                        </section>

                        <!-- 6. Delivery Attempts & Failed Deliveries -->
                        <section class="policy-section" id="delivery-attempts">
                            <h3 class="policy-section-title">6. Delivery Attempts &amp; Undelivered Parcels</h3>
                            <p class="policy-text">
                                To ensure successful doorstep delivery, please note:
                            </p>
                            <ul class="policy-list">
                                <li>The courier executive will generally attempt delivery <strong>up to 3 times</strong> at your address. An SMS or phone call notification is typically sent prior to delivery.</li>
                                <li>If you are unavailable, you may authorize a family member, neighbor, or building security desk to receive the package on your behalf.</li>
                                <li><strong>Incorrect Address / Incomplete Details:</strong> If an order cannot be delivered due to an incorrect address, non-existent PIN code, or repeated failure to reach the recipient on the provided phone number, the package will be marked as "Return to Origin" (RTO) and returned to our boutique.</li>
                                <li>In the event of an RTO caused by incorrect customer details or failure to accept delivery, the re-dispatch shipping cost (₹150) will be payable by the customer before the parcel is re-sent.</li>
                            </ul>
                        </section>

                        <!-- 7. Transit Delays Beyond Control -->
                        <section class="policy-section" id="delays">
                            <h3 class="policy-section-title">7. Unforeseen Delays &amp; Force Majeure</h3>
                            <p class="policy-text">
                                While we and our courier partners strive for timely delivery, certain circumstances beyond reasonable control may occasionally cause transit delays:
                            </p>
                            <ul class="policy-list">
                                <li>Severe weather conditions, cyclones, heavy rains, or flooding;</li>
                                <li>National, state, or regional strikes, bandhs, or road blockades;</li>
                                <li>High-volume festive seasons (e.g., Diwali, Pongal, Eid, Christmas) where logistics carriers experience temporary network backlogs;</li>
                                <li>Statutory checkpoints, octroi, or local regulatory inspections.</li>
                            </ul>
                            <p class="policy-text">
                                In case of any significant delay, our concierge team monitors the tracking closely and coordinates with carrier dispatch managers to expedite delivery.
                            </p>
                        </section>

                        <!-- 8. Damaged, Tampered, or Missing Shipments -->
                        <section class="policy-section" id="damaged-shipments">
                            <h3 class="policy-section-title">8. Damaged, Tampered, or Missing Shipments</h3>
                            <p class="policy-text">
                                We pack every boutique ensemble with waterproof, secure outer tamper-evident packaging. Please follow these precautions:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Examine Outer Package:</strong> Upon arrival, check the parcel thoroughly. If the external box or courier flyer is noticeably crushed, torn, unsealed, or tampered with, <strong>do not accept delivery</strong>. Mention "Package Damaged / Refused" on the delivery sheet/device.</li>
                                <li><strong>Unboxing Protocol:</strong> If you accept the package, we strongly advise recording a continuous, uninterrupted video while opening the outer courier flyer and removing the boutique contents. This serves as vital proof for insurance and replacement claims.</li>
                                <li><strong>48-Hour Reporting Window:</strong> In the rare instance of missing items, transit damage, or wrong contents delivered, you must notify our customer care team within <strong>48 hours</strong> of delivery with your Order ID and clear photographs/unboxing video.</li>
                            </ul>
                        </section>

                        <!-- 9. Support Contact -->
                        <section class="policy-section" id="shipping-support">
                            <h3 class="policy-section-title">9. Need Assistance with Your Shipment?</h3>
                            <p class="policy-text">
                                If your order has not arrived within the estimated timeframe or you need to update a delivery note before dispatch, please get in touch with us immediately:
                            </p>
                            <ul class="policy-list">
                                <li><strong>Customer Support Phone:</strong> <a href="tel:+919442634491" class="text-dark fw-semibold">+91 94426 34491</a></li>
                                <li><strong>WhatsApp Concierge:</strong> <a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique%2C%20I%20need%20assistance%20tracking%20my%20shipment." target="_blank" rel="noopener noreferrer" class="text-dark fw-semibold">+91 94426 34491</a></li>
                                <li><strong>Email:</strong> <a href="mailto:Sarasboutique2026@gmail.com" class="text-dark fw-semibold">Sarasboutique2026@gmail.com</a></li>
                                <li><strong>Boutique Store:</strong> No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009.</li>
                            </ul>
                        </section>

                        <!-- Bottom Concierge Banner -->
                        <div class="policy-concierge-banner">
                            <div>
                                <h4 class="policy-concierge-title">Need to Track an Existing Order?</h4>
                                <p class="policy-concierge-desc">Share your Order Number on WhatsApp for an immediate real-time update from our dispatch desk.</p>
                            </div>
                            <div>
                                <a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique%2C%20could%20you%20please%20help%20me%20track%20my%20order%3F" 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="btn-concierge-wa">
                                    <i class="bi bi-whatsapp"></i> Track on WhatsApp
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
