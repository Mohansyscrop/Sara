@extends('layouts.app')

@section('title', 'Order Received - ' . $order->order_number . " | Sara's Boutique")

@push('styles')
<style>
    /* ── Friendly Luxury Order Confirmation Theme ── */
    .order-success-page {
        background: #FAF6F0;
        min-height: 85vh;
    }

    .order-hero-banner {
        background: linear-gradient(135deg, #240038 0%, #3B005A 50%, #4D0A5E 100%);
        color: #F8F4E3;
        padding: 4rem 1rem 4.5rem;
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    .order-hero-banner::before {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 20%, rgba(212, 175, 55, 0.2) 0%, transparent 65%);
        pointer-events: none;
    }
    .order-hero-banner::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 24px;
        background: #FAF6F0;
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .celebrate-icon-box {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        background: linear-gradient(135deg, #d4af37 0%, #f5d77f 50%, #b8860b 100%);
        color: #240038;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2.4rem;
        margin-bottom: 1.25rem;
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.45);
        animation: friendlyPulse 2.2s infinite ease-in-out;
        border: 3px solid rgba(255, 255, 255, 0.7);
    }
    @keyframes friendlyPulse {
        0%, 100% { transform: scale(1); box-shadow: 0 10px 30px rgba(212, 175, 55, 0.45); }
        50% { transform: scale(1.06); box-shadow: 0 14px 38px rgba(212, 175, 55, 0.65); }
    }

    .hero-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(212, 175, 55, 0.45);
        color: #fce7a1;
        font-size: 0.8rem;
        letter-spacing: 1px;
        text-uppercase: uppercase;
        font-weight: 600;
        padding: 0.35rem 1.1rem;
        border-radius: 50px;
        margin-bottom: 0.85rem;
    }

    .order-number-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px dashed rgba(212, 175, 55, 0.6);
        padding: 0.45rem 1.2rem;
        border-radius: 50px;
        margin-top: 0.85rem;
    }

    /* Friendly Card Containers */
    .friendly-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.22);
        box-shadow: 0 12px 35px rgba(59, 0, 90, 0.05);
        padding: 2rem;
        margin-bottom: 1.75rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    /* Friendly Progress Timeline */
    .timeline-steps {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        position: relative;
        padding: 0.5rem 0;
    }
    .timeline-steps::before {
        content: "";
        position: absolute;
        top: 26px;
        left: 36px;
        right: 36px;
        height: 3px;
        background: #F0E8DD;
        z-index: 1;
    }
    .timeline-step {
        position: relative;
        z-index: 2;
        text-align: center;
        flex: 1;
        padding: 0 0.5rem;
    }
    .step-icon-circle {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: #F5EFEB;
        color: #8C827A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-bottom: 0.65rem;
        border: 3px solid #ffffff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
    }
    .timeline-step.completed .step-icon-circle {
        background: #10B981;
        color: #ffffff;
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.35);
    }
    .timeline-step.active .step-icon-circle {
        background: linear-gradient(135deg, #B8860B 0%, #D4AF37 100%);
        color: #240038;
        box-shadow: 0 6px 18px rgba(212, 175, 55, 0.45);
        animation: friendlyPulse 2s infinite ease-in-out;
    }
    .step-title {
        font-family: 'Poppins', sans-serif;
        font-size: 0.88rem;
        font-weight: 700;
        color: #240038;
        margin-bottom: 0.2rem;
    }
    .step-desc {
        font-size: 0.76rem;
        color: #716960;
        line-height: 1.35;
    }

    /* Friendly Concierge Helper Card */
    .concierge-callout-box {
        background: linear-gradient(135deg, #FFFDF8 0%, #FFF8EC 100%);
        border: 1.5px solid rgba(212, 175, 55, 0.35);
        border-radius: 16px;
        padding: 1.5rem;
    }

    .btn-friendly-whatsapp {
        background: #25D366;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.92rem;
        padding: 0.65rem 1.35rem;
        border-radius: 50px;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        transition: all 0.25s ease;
        box-shadow: 0 6px 18px rgba(37, 211, 102, 0.3);
    }
    .btn-friendly-whatsapp:hover {
        background: #1EBE5D;
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(37, 211, 102, 0.4);
    }

    .btn-friendly-gold {
        background: linear-gradient(135deg, #B8860B 0%, #D4AF37 100%);
        color: #1A002C !important;
        font-weight: 700;
        letter-spacing: 0.3px;
        padding: 0.8rem 2rem;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 8px 22px rgba(212, 175, 55, 0.35);
    }
    .btn-friendly-gold:hover {
        background: linear-gradient(135deg, #D4AF37 0%, #FFF1C5 100%);
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(212, 175, 55, 0.5);
    }

    .btn-friendly-outline {
        border: 1.5px solid #3B005A;
        color: #3B005A;
        background: #ffffff;
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.25s ease;
    }
    .btn-friendly-outline:hover {
        background: #3B005A;
        color: #ffffff;
        transform: translateY(-2px);
    }

    /* Product card list item */
    .order-prod-thumb {
        width: 76px;
        height: 98px;
        object-fit: cover;
        border-radius: 12px;
        border: 1.5px solid rgba(212, 175, 55, 0.3);
        box-shadow: 0 4px 10px rgba(0,0,0,0.06);
    }

    .info-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        background: #F6F1EA;
        color: #3B005A;
        font-size: 0.78rem;
        font-weight: 600;
        padding: 0.25rem 0.65rem;
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.25);
    }

    .badge-status-friendly {
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
        font-weight: 600;
        font-size: 0.82rem;
        padding: 0.35rem 0.85rem;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    @media (max-width: 767px) {
        .timeline-steps {
            flex-direction: column;
            gap: 1.5rem;
            padding-left: 1.5rem;
        }
        .timeline-steps::before {
            top: 20px;
            bottom: 20px;
            left: 38px;
            width: 3px;
            height: auto;
            right: auto;
        }
        .timeline-step {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            text-align: left;
            padding: 0;
            width: 100%;
        }
        .step-icon-circle {
            margin-bottom: 0;
            min-width: 48px;
            width: 48px;
            height: 48px;
        }
        .friendly-card {
            padding: 1.35rem;
        }
    }

    @media print {
        header, footer, .no-print, .btn-friendly-gold, .btn-friendly-outline, .btn-friendly-whatsapp {
            display: none !important;
        }
        .order-hero-banner {
            background: #ffffff !important;
            color: #000000 !important;
            padding: 1rem 0 !important;
        }
        .friendly-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
            break-inside: avoid;
        }
    }
</style>
@endpush

@section('content')

<div class="order-success-page pb-5">

    <!-- Warm, Friendly & Celebratory Hero Section -->
    <section class="order-hero-banner">
        <div class="container position-relative">
            <div class="celebrate-icon-box">
                <i class="bi bi-gift-fill"></i>
            </div>

            <div>
                <span class="hero-badge-pill">
                    <i class="bi bi-stars"></i> Order Successfully Received
                </span>
            </div>

            @php
                $firstName = explode(' ', trim($order->customer_name))[0] ?? 'Valued Client';
            @endphp
            <h1 class="display-5 fw-bold mb-2" style="font-family: 'Playfair Display', Georgia, serif; letter-spacing: 0.5px;">
                Thank You, {{ $firstName }}!
            </h1>
            <p class="mx-auto text-light opacity-90 mb-2" style="max-width: 620px; font-size: 1.05rem;">
                Your luxury ensemble order is officially confirmed. Our boutique artisans and stylists are thrilled to craft and prepare your bespoke outfit with exquisite care.
            </p>

            <div class="order-number-chip">
                <span class="text-light small">Order Reference:</span>
                <strong class="text-warning font-monospace" id="orderNumberVal">{{ $order->order_number }}</strong>
                <button type="button" class="btn btn-sm btn-link p-0 text-white-50 text-decoration-none ms-1 no-print" onclick="copyOrderNumber()" title="Copy Order Number">
                    <i class="bi bi-copy text-warning"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container" style="margin-top: -1.5rem; position: relative; z-index: 5;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <!-- 1. Friendly Visual Next-Steps Journey Tracker -->
                <div class="friendly-card mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                        <div>
                            <h5 class="fw-bold mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">
                                <i class="bi bi-compass text-gold me-2"></i> What Happens Next?
                            </h5>
                            <p class="text-muted small mb-0">Follow along as our Puducherry atelier prepares your ensemble</p>
                        </div>
                        <span class="badge-status-friendly">
                            <i class="bi bi-patch-check-fill text-success"></i> {{ strtoupper($order->order_status ?? 'NEW') }}
                        </span>
                    </div>

                    <div class="timeline-steps">
                        <!-- Step 1 -->
                        <div class="timeline-step completed">
                            <div class="step-icon-circle">
                                <i class="bi bi-check2"></i>
                            </div>
                            <div>
                                <div class="step-title">Order Received</div>
                                <div class="step-desc">Captured in boutique queue</div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="timeline-step active">
                            <div class="step-icon-circle">
                                <i class="bi bi-chat-heart-fill"></i>
                            </div>
                            <div>
                                <div class="step-title">Concierge Touchpoint</div>
                                <div class="step-desc">Size &amp; measurement check</div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="timeline-step">
                            <div class="step-icon-circle">
                                <i class="bi bi-stars"></i>
                            </div>
                            <div>
                                <div class="step-title">Artisan Quality Prep</div>
                                <div class="step-desc">Steam press &amp; silk check</div>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="timeline-step">
                            <div class="step-icon-circle">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>
                            <div>
                                <div class="step-title">Insured Courier Dispatch</div>
                                <div class="step-desc">Delivered to your doorstep</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Friendly Reassurance & Concierge Assistance Callout -->
                <div class="concierge-callout-box mb-4">
                    <div class="row align-items-center g-3">
                        <div class="col-12 col-md-8">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 52px; height: 52px; background: #3B005A; color: #F5D77F; font-size: 1.4rem;">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">
                                        Personal Boutique Concierge Service
                                    </h6>
                                    <p class="small text-muted mb-0">
                                        @if($order->payment_method === 'direct_order')
                                            <strong>Zero Upfront Payment Required.</strong> Our personal stylist will connect with you on WhatsApp/Phone at <strong>{{ $order->customer_phone }}</strong> to confirm sizing, alteration details, and delivery date.
                                        @else
                                            Your payment has been logged securely. Our concierge team is standing by to assist with any customization or delivery queries.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-md-end no-print">
                            @php
                                $firstItemName = $order->items->first()->product_name ?? 'luxury suit set';
                                $waText = urlencode("Hello Sara's Boutique, I just placed direct order #" . $order->order_number . " for " . $firstItemName . ". Could you assist me with size confirmation?");
                            @endphp
                            <a href="https://wa.me/919442634491?text={{ $waText }}" target="_blank" class="btn-friendly-whatsapp w-100 justify-content-center">
                                <i class="bi bi-whatsapp fs-5"></i> Chat with Boutique
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. Ordered Ensembles Card -->
                <div class="friendly-card mb-4">
                    <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                        <h5 class="fw-bold mb-0" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">
                            <i class="bi bi-bag-check-fill text-gold me-2"></i> Your Selected Ensemble
                        </h5>
                        <span class="text-muted small">
                            Order Date: <strong>{{ $order->created_at->format('M d, Y • h:i A') }}</strong>
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="min-width: 200px;">Product Details</th>
                                    <th>Specifications</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    @php
                                        $itemImg = null;
                                        if ($item->product_image) {
                                            $itemImg = (str_starts_with($item->product_image, 'http') || str_starts_with($item->product_image, 'assets/')) 
                                                ? asset($item->product_image) 
                                                : asset('storage/' . $item->product_image);
                                        } elseif ($item->product && $item->product->main_image) {
                                            $itemImg = $item->product->main_image_url;
                                        }
                                        if (!$itemImg) $itemImg = asset('assets/img/card_pink.jpg');
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $itemImg }}" alt="{{ $item->product_name }}" class="order-prod-thumb">
                                                <div>
                                                    <h6 class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">{{ $item->product_name }}</h6>
                                                    @if($item->product_sku)
                                                        <span class="text-muted small d-block">SKU: <strong class="font-monospace">{{ $item->product_sku }}</strong></span>
                                                    @endif
                                                    <span class="badge bg-light text-secondary border mt-1" style="font-size: 0.72rem;">
                                                        <i class="bi bi-award me-1 text-gold"></i> Handcrafted Quality Guaranteed
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mb-1">
                                                <span class="info-pill-badge">
                                                    <i class="bi bi-palette-fill text-danger"></i> Color: <strong>{{ $item->color ?? 'Rose Pink' }}</strong>
                                                </span>
                                            </div>
                                            <div>
                                                <span class="info-pill-badge">
                                                    <i class="bi bi-tag-fill text-gold"></i> Size: <strong>{{ $item->size ?? 'M' }}</strong>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center fw-bold fs-6">{{ $item->quantity }}</td>
                                        <td class="text-end font-monospace text-muted">₹{{ number_format($item->price, 2) }}</td>
                                        <td class="text-end fw-bold font-monospace fs-6" style="color: #3B005A;">
                                            ₹{{ number_format($item->total, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 4. Two-Column: Shipping Destination & Payment Summary -->
                <div class="row g-4 mb-4">
                    <!-- Delivery Destination Card -->
                    <div class="col-12 col-md-6">
                        <div class="friendly-card h-100">
                            <h5 class="fw-bold mb-3 pb-2 border-bottom" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i> Delivery Destination
                            </h5>
                            <div class="p-3 bg-light rounded-4 border">
                                <div class="fw-bold text-dark fs-6 mb-1">
                                    {{ $order->customer_name }}
                                </div>
                                <div class="text-secondary small mb-2">
                                    <i class="bi bi-house-door me-1"></i> {{ $order->shipping_address }}
                                </div>
                                <div class="fw-semibold text-dark small mb-3">
                                    {{ $order->city }}, {{ $order->state }} - <span class="badge bg-white text-dark border font-monospace">{{ $order->pincode }}</span>
                                </div>
                                <div class="d-flex flex-wrap gap-3 pt-2 border-top small text-muted">
                                    <span>
                                        <i class="bi bi-telephone-fill me-1 text-success"></i> {{ $order->customer_phone }}
                                    </span>
                                    <span>
                                        <i class="bi bi-envelope-fill me-1 text-secondary"></i> {{ $order->customer_email }}
                                    </span>
                                </div>
                            </div>

                            @if($order->customer_notes)
                                <div class="mt-3 p-2 rounded-3 bg-warning bg-opacity-10 border border-warning border-opacity-25 small">
                                    <strong class="text-dark d-block"><i class="bi bi-card-text me-1 text-warning"></i> Special Notes / Customization:</strong>
                                    <span class="text-muted">{{ $order->customer_notes }}</span>
                                </div>
                            @endif

                            <div class="mt-3 d-flex align-items-center gap-2 text-muted small">
                                <i class="bi bi-truck text-success fs-5"></i>
                                <span>Complimentary white-glove courier pan-India delivery</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment & Financial Summary -->
                    <div class="col-12 col-md-6">
                        <div class="friendly-card h-100">
                            <h5 class="fw-bold mb-3 pb-2 border-bottom" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">
                                <i class="bi bi-receipt-cutoff text-gold me-2"></i> Payment Breakdown
                            </h5>

                            <div class="p-3 bg-light rounded-4 border mb-3">
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span>Ensemble Subtotal</span>
                                    <span class="font-monospace fw-semibold text-dark">₹{{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span>Insured Courier &amp; Tamper Box</span>
                                    <span class="font-monospace fw-bold {{ $order->shipping_amount == 0 ? 'text-success' : 'text-dark' }}">
                                        {{ $order->shipping_amount == 0 ? 'FREE' : '₹'.number_format($order->shipping_amount, 2) }}
                                    </span>
                                </div>
                                @if($order->discount_amount > 0)
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span>Savings / Promotion</span>
                                    <span class="font-monospace text-danger">-₹{{ number_format($order->discount_amount, 2) }}</span>
                                </div>
                                @endif
                                <div class="d-flex justify-content-between pt-2 border-top align-items-baseline">
                                    <div>
                                        <span class="fw-bold text-dark fs-6 d-block">Total Payable</span>
                                        <small class="text-muted" style="font-size: 0.75rem;">All taxes included</small>
                                    </div>
                                    <span class="fw-bold fs-4 font-monospace text-danger">₹{{ number_format($order->total_amount, 2) }}</span>
                                </div>
                            </div>

                            <div class="p-3 rounded-4" style="background: rgba(59, 0, 90, 0.04); border: 1px dashed rgba(59, 0, 90, 0.2);">
                                <div class="d-flex align-items-center justify-content-between small">
                                    <span class="text-muted">Payment Channel:</span>
                                    <span class="badge bg-light text-dark border fw-bold text-capitalize">
                                        {{ $order->payment_method === 'direct_order' ? 'Direct Order Inquiry' : $order->payment_method }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between small mt-2">
                                    <span class="text-muted">Payment Status:</span>
                                    @if($order->payment_status === 'paid')
                                        <span class="badge bg-success text-white">Paid Online</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Payment on Concierge Confirmation</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Trust & Artisan Quality Badges -->
                <div class="row g-3 mb-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-4 border shadow-sm h-100">
                            <i class="bi bi-patch-check-fill text-gold fs-3 d-block mb-1"></i>
                            <div class="fw-bold text-dark small">100% Pure Silk</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Silk Mark certified yarn</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-4 border shadow-sm h-100">
                            <i class="bi bi-scissors text-danger fs-3 d-block mb-1"></i>
                            <div class="fw-bold text-dark small">Custom Tailoring</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Bespoke size alterations</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-4 border shadow-sm h-100">
                            <i class="bi bi-shield-shaded text-success fs-3 d-block mb-1"></i>
                            <div class="fw-bold text-dark small">Insured Shipping</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Tamper-proof transit box</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-4 border shadow-sm h-100">
                            <i class="bi bi-heart-fill text-danger fs-3 d-block mb-1"></i>
                            <div class="fw-bold text-dark small">Sara's Heritage</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Handcrafted in Puducherry</small>
                        </div>
                    </div>
                </div>

                <!-- 6. Friendly Action Footer -->
                <div class="friendly-card d-flex flex-wrap align-items-center justify-content-between gap-3 no-print">
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn-friendly-outline" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print / Save Receipt
                        </button>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('collections') }}" class="btn-friendly-gold">
                            <i class="bi bi-bag-heart"></i> Continue Exploring Collections
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    function copyOrderNumber() {
        const orderNum = document.getElementById('orderNumberVal')?.textContent?.trim();
        if (orderNum) {
            navigator.clipboard.writeText(orderNum).then(() => {
                if (typeof showToast === 'function') {
                    showToast('Order reference copied to clipboard: ' + orderNum);
                } else {
                    alert('Order reference copied: ' + orderNum);
                }
            }).catch(() => {});
        }
    }
</script>
@endpush
