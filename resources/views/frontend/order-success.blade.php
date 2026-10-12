@extends('layouts.app')

@section('title', 'Order Confirmed - ' . $order->order_number . " | Sara's Boutique")

@push('styles')
<style>
    .order-success-hero {
        background: linear-gradient(135deg, #1A120B 0%, #2B1B17 50%, #150E0C 100%);
        color: #F8F4E3;
        padding: 5rem 0 3.5rem;
        position: relative;
        overflow: hidden;
    }
    .order-success-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 20%, rgba(212, 175, 55, 0.15) 0%, transparent 70%);
        pointer-events: none;
    }
    .success-check-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.35);
        animation: pulseScale 1.8s infinite ease-in-out;
    }
    @keyframes pulseScale {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    .order-summary-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid rgba(212, 175, 55, 0.25);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.06);
        padding: 2.2rem;
        margin-top: -2.5rem;
        position: relative;
        z-index: 10;
    }
    .order-pill-badge {
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.35rem 0.85rem;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .order-item-img {
        width: 70px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ECECEC;
    }
    .btn-luxury-gold {
        background: linear-gradient(135deg, #B8860B 0%, #D4AF37 100%);
        color: #1A120B !important;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 0.75rem 1.8rem;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-luxury-gold:hover {
        background: linear-gradient(135deg, #D4AF37 0%, #F3E5AB 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.35);
    }
    .btn-outline-dark-custom {
        border: 1px solid #333;
        color: #333;
        padding: 0.75rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    .btn-outline-dark-custom:hover {
        background: #333;
        color: #fff;
    }
    @media print {
        header, footer, .no-print, .btn-luxury-gold, .btn-outline-dark-custom {
            display: none !important;
        }
        .order-summary-card {
            box-shadow: none !important;
            border: 1px solid #000 !important;
            margin-top: 0 !important;
        }
        .order-success-hero {
            background: #fff !important;
            color: #000 !important;
            padding: 1rem 0 !important;
        }
    }
</style>
@endpush

@section('content')

<!-- Order Hero Section -->
<section class="order-success-hero text-center">
    <div class="container position-relative">
        <div class="success-check-icon">
            <i class="bi bi-check-lg"></i>
        </div>
        <span class="text-uppercase tracking-wider small text-warning fw-bold mb-2 d-block">Payment Received Successfully</span>
        <h1 class="display-5 fw-bold mb-2 font-playfair">Thank You for Your Order!</h1>
        <p class="text-muted text-light opacity-75 mb-3">
            Your luxury ensemble is now confirmed. We have sent a confirmation receipt to <strong>{{ $order->customer_email }}</strong>.
        </p>
        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-dark bg-opacity-50 border border-secondary border-opacity-50">
            <span class="text-light small">Order Number:</span>
            <strong class="text-warning font-monospace">{{ $order->order_number }}</strong>
        </div>
    </div>
</section>

<!-- Main Order Details Container -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <div class="order-summary-card">
                    <!-- Top Status Bar -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mb-4 border-bottom gap-3">
                        <div>
                            <span class="text-muted small d-block">Order Date</span>
                            <strong>{{ $order->created_at->format('M d, Y • h:i A') }}</strong>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Payment Method</span>
                            <strong class="text-capitalize">{{ $order->payment_method }} (Online)</strong>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Payment Status</span>
                            <span class="order-pill-badge">
                                <i class="bi bi-shield-check"></i> {{ strtoupper($order->payment_status) }}
                            </span>
                        </div>
                        @if($order->razorpay_payment_id)
                        <div>
                            <span class="text-muted small d-block">Razorpay Payment ID</span>
                            <span class="font-monospace small text-muted">{{ $order->razorpay_payment_id }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Items Purchased -->
                    <h5 class="fw-bold mb-3 font-playfair">Item Ordered</h5>
                    <div class="table-responsive mb-4">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Specification</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-end">Price</th>
                                    <th scope="col" class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    @php
                                        $itemImg = $item->product_image ? (str_starts_with($item->product_image, 'http') || str_starts_with($item->product_image, 'assets/') ? asset($item->product_image) : asset('storage/' . $item->product_image)) : asset('assets/img/card_pink.jpg');
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $itemImg }}" alt="{{ $item->product_name }}" class="order-item-img">
                                                <div>
                                                    <h6 class="mb-1 fw-bold">{{ $item->product_name }}</h6>
                                                    @if($item->product_sku)
                                                        <small class="text-muted">SKU: {{ $item->product_sku }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="d-block small"><strong>Color:</strong> {{ $item->color ?? 'As shown' }}</span>
                                            <span class="d-block small"><strong>Size:</strong> {{ $item->size ?? 'Free Size' }}</span>
                                        </td>
                                        <td class="text-center fw-bold">{{ $item->quantity }}</td>
                                        <td class="text-end font-monospace">₹{{ number_format($item->price, 2) }}</td>
                                        <td class="text-end fw-bold font-monospace">₹{{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Two-column: Shipping Address & Financial Breakdown -->
                    <div class="row g-4 pt-3 border-top">
                        <!-- Shipping Details -->
                        <div class="col-12 col-md-6">
                            <h5 class="fw-bold mb-3 font-playfair">Shipping Details</h5>
                            <div class="p-3 bg-light rounded-3">
                                <p class="mb-1 fw-bold text-dark">{{ $order->customer_name }}</p>
                                <p class="mb-1 text-muted"><i class="bi bi-geo-alt me-1"></i> {{ $order->shipping_address }}</p>
                                <p class="mb-1 text-muted">{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                                <p class="mb-1 text-muted"><i class="bi bi-telephone me-1"></i> {{ $order->customer_phone }}</p>
                                <p class="mb-0 text-muted"><i class="bi bi-envelope me-1"></i> {{ $order->customer_email }}</p>
                            </div>
                            @if($order->customer_notes)
                                <div class="mt-3">
                                    <small class="text-muted d-block fw-bold">Customer Note:</small>
                                    <small class="fst-italic text-secondary">{{ $order->customer_notes }}</small>
                                </div>
                            @endif
                        </div>

                        <!-- Price Breakdown -->
                        <div class="col-12 col-md-6">
                            <h5 class="fw-bold mb-3 font-playfair">Payment Summary</h5>
                            <div class="p-3 bg-light rounded-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Subtotal</span>
                                    <span class="font-monospace">₹{{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Insured Express Shipping</span>
                                    <span class="font-monospace">{{ $order->shipping_amount > 0 ? '₹' . number_format($order->shipping_amount, 2) : 'FREE' }}</span>
                                </div>
                                <div class="d-flex justify-content-between pt-2 border-top">
                                    <span class="fw-bold text-dark fs-5">Total Paid</span>
                                    <span class="fw-bold text-danger fs-5 font-monospace">₹{{ number_format($order->total_amount, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dispatch Assurance Banner -->
                    <div class="mt-4 p-3 rounded-3" style="background: rgba(212, 175, 55, 0.08); border-left: 4px solid #D4AF37;">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-shield-shaded fs-3 text-warning"></i>
                            <div>
                                <h6 class="mb-1 fw-bold text-dark">White-Glove Artisan Dispatch</h6>
                                <p class="mb-0 small text-muted">
                                    Every garment is quality-inspected, steam-pressed, and packed in luxury protective casing before dispatch. You will receive courier tracking updates via SMS & Email.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions Row -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 pt-3 border-top gap-3 no-print">
                        <button type="button" class="btn-outline-dark-custom" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print Invoice
                        </button>
                        <a href="{{ route('collections') }}" class="btn-luxury-gold">
                            <i class="bi bi-bag"></i> Continue Shopping
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection
