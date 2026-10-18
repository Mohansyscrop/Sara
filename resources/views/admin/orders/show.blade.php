@extends('layouts.admin')

@section('title', 'Direct Order #' . $order->order_number)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}" class="text-decoration-none" style="color: #c5a059;">Direct Orders</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">{{ $order->order_number }}</li>
@endsection

@section('content')

    <!-- Top Action Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2">
                <h3 class="fw-bold mb-0 font-monospace" style="color: #240038;">
                    {{ $order->order_number }}
                </h3>
                @if($order->order_status === 'new')
                    <span class="badge bg-danger">New Lead</span>
                @elseif($order->order_status === 'processing')
                    <span class="badge bg-warning text-dark">In Progress</span>
                @elseif($order->order_status === 'confirmed')
                    <span class="badge bg-info">Confirmed</span>
                @elseif($order->order_status === 'delivered')
                    <span class="badge bg-success">Delivered</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($order->order_status) }}</span>
                @endif
            </div>
            <p class="text-muted small mb-0 mt-1">
                Submitted on {{ $order->created_at->format('l, F d, Y \a\t h:i A') }} ({{ $order->created_at->diffForHumans() }})
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Orders
            </a>
            <button onclick="window.print()" class="btn btn-sm btn-outline-dark">
                <i class="bi bi-printer me-1"></i> Print Slip
            </button>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->customer_phone) }}?text={{ urlencode('Hello ' . $order->customer_name . ', thank you for your order inquiry with Sara\'s Boutique for ' . ($order->items->first()->product_name ?? 'our handcrafted couture set') . ' (Order #' . $order->order_number . ').') }}" target="_blank" class="btn btn-sm btn-success">
                <i class="bi bi-whatsapp me-1"></i> WhatsApp Client
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left Column: Customer & Delivery Details + Product Items -->
        <div class="col-12 col-lg-8">

            <!-- Ordered Product Items Card -->
            <div class="card-custom mb-4">
                <div class="p-3 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0 font-serif" style="color: #240038;">
                        <i class="bi bi-bag-check-fill text-gold me-2"></i> Ordered Product Item(s)
                    </h6>
                    <span class="badge bg-light text-dark border">{{ $order->items->count() }} item(s)</span>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="min-width: 220px;">Product</th>
                                <th>Specifications</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Unit Price</th>
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
                                            <img src="{{ $itemImg }}" alt="{{ $item->product_name }}" class="rounded shadow-sm border" style="width: 55px; height: 70px; object-fit: cover;">
                                            <div>
                                                <div class="fw-bold text-dark">{{ $item->product_name }}</div>
                                                @if($item->product_sku)
                                                    <div class="text-muted small">
                                                        SKU: <span class="font-monospace fw-semibold">{{ $item->product_sku }}</span>
                                                    </div>
                                                @endif
                                                @if($item->product)
                                                    <a href="{{ route('admin.products.edit', $item->product->id) }}" class="small text-decoration-none" style="color: #b58d43;" target="_blank">
                                                        <i class="bi bi-box-arrow-up-right me-1"></i> View in Admin Catalog
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <span class="text-muted">Color:</span> <strong class="text-dark">{{ $item->color ?? 'As shown' }}</strong>
                                        </div>
                                        <div class="small mt-1">
                                            <span class="text-muted">Size:</span> <strong class="text-dark">{{ $item->size ?? 'M' }}</strong>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">{{ $item->quantity }}</td>
                                    <td class="text-end font-monospace">₹{{ number_format($item->price, 2) }}</td>
                                    <td class="text-end fw-bold font-monospace" style="color: #3b005a;">₹{{ number_format($item->total, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Financial Summary -->
                <div class="p-3 bg-light border-top">
                    <div class="row justify-content-end">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="d-flex justify-content-between small text-muted mb-1">
                                <span>Item Subtotal:</span>
                                <span class="font-monospace fw-semibold text-dark">₹{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between small text-muted mb-1">
                                <span>Insured Courier Delivery:</span>
                                <span class="font-monospace fw-semibold {{ $order->shipping_amount == 0 ? 'text-success' : 'text-dark' }}">
                                    {{ $order->shipping_amount == 0 ? 'FREE' : '₹'.number_format($order->shipping_amount, 2) }}
                                </span>
                            </div>
                            @if($order->discount_amount > 0)
                            <div class="d-flex justify-content-between small text-muted mb-1">
                                <span>Promotional Discount:</span>
                                <span class="font-monospace text-danger">-₹{{ number_format($order->discount_amount, 2) }}</span>
                            </div>
                            @endif
                            <div class="d-flex justify-content-between pt-2 border-top fs-6 fw-bold">
                                <span>Total Payable:</span>
                                <span class="font-monospace text-danger fs-5">₹{{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client & Delivery Details Card -->
            <div class="card-custom">
                <div class="p-3 border-bottom">
                    <h6 class="fw-bold mb-0 font-serif" style="color: #240038;">
                        <i class="bi bi-geo-alt-fill text-danger me-2"></i> Client &amp; Shipping Destination
                    </h6>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Full Name</label>
                            <div class="fw-bold text-dark fs-6">{{ $order->customer_name }}</div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Phone Number</label>
                            <div>
                                <a href="tel:{{ $order->customer_phone }}" class="fw-bold text-decoration-none fs-6" style="color: #b58d43;">
                                    <i class="bi bi-telephone-fill me-1"></i>{{ $order->customer_phone }}
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Email Address</label>
                            <div>
                                <a href="mailto:{{ $order->customer_email }}" class="text-dark text-decoration-none small">
                                    <i class="bi bi-envelope-fill text-secondary me-1"></i>{{ $order->customer_email }}
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">City &amp; State</label>
                            <div class="text-dark fw-semibold small">
                                {{ $order->city }}, {{ $order->state }}
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Full Delivery Address</label>
                            <div class="p-3 bg-light rounded-3 text-dark border">
                                <p class="mb-1 fw-medium">{{ $order->shipping_address }}</p>
                                <p class="mb-0 text-muted small">{{ $order->city }}, {{ $order->state }} - <strong>{{ $order->pincode }}</strong>, {{ $order->country }}</p>
                            </div>
                        </div>

                        @if($order->customer_notes)
                        <div class="col-12">
                            <label class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Client Notes / Alteration Requests</label>
                            <div class="p-3 bg-warning bg-opacity-10 rounded-3 border border-warning border-opacity-25 small">
                                <i class="bi bi-chat-quote-fill me-1 text-warning"></i> {{ $order->customer_notes }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Order Management & Status Controller -->
        <div class="col-12 col-lg-4">

            <!-- Status Manager Card -->
            <div class="card-custom mb-4">
                <div class="p-3 border-bottom">
                    <h6 class="fw-bold mb-0 font-serif" style="color: #240038;">
                        <i class="bi bi-sliders2 text-gold me-2"></i> Update Order Status
                    </h6>
                </div>
                <div class="p-4">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="order_status" class="form-label small fw-semibold text-muted text-uppercase">Order Fulfillment Status</label>
                            <select name="order_status" id="order_status" class="form-select">
                                @foreach($statuses as $val => $lbl)
                                    <option value="{{ $val }}" {{ old('order_status', $order->order_status) === $val ? 'selected' : '' }}>
                                        {{ $lbl }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment_status" class="form-label small fw-semibold text-muted text-uppercase">Payment Status</label>
                            <select name="payment_status" id="payment_status" class="form-select">
                                @foreach($paymentStatuses as $pval => $plbl)
                                    <option value="{{ $pval }}" {{ old('payment_status', $order->payment_status) === $pval ? 'selected' : '' }}>
                                        {{ $plbl }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="customer_notes" class="form-label small fw-semibold text-muted text-uppercase">Internal Notes / Tracking</label>
                            <textarea name="customer_notes" id="customer_notes" rows="3" class="form-control" placeholder="Add tracking ID, concierge notes, courier details...">{{ old('customer_notes', $order->customer_notes) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-gold w-100 shadow-sm py-2">
                            <i class="bi bi-check-lg me-1"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>

            <!-- Order Overview & Metadata -->
            <div class="card-custom">
                <div class="p-3 border-bottom">
                    <h6 class="fw-bold mb-0 font-serif" style="color: #240038;">
                        <i class="bi bi-info-circle-fill text-muted me-2"></i> Order Metadata
                    </h6>
                </div>
                <div class="p-3">
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Order Channel</span>
                            <strong class="text-dark">Express Direct Checkout</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Payment Mode</span>
                            <strong class="text-capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</strong>
                        </li>
                        @if($order->razorpay_order_id)
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Razorpay Order ID</span>
                            <span class="font-monospace small text-truncate" style="max-width: 140px;">{{ $order->razorpay_order_id }}</span>
                        </li>
                        @endif
                        @if($order->razorpay_payment_id)
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Razorpay Payment ID</span>
                            <span class="font-monospace small text-truncate" style="max-width: 140px;">{{ $order->razorpay_payment_id }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Currency</span>
                            <strong>{{ $order->currency }} (₹)</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Created</span>
                            <span>{{ $order->created_at->format('d M Y, h:i A') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0 py-2">
                            <span class="text-muted">Last Updated</span>
                            <span>{{ $order->updated_at->format('d M Y, h:i A') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection
