@extends('layouts.admin')

@section('title', 'Direct Orders & Product Inquiries')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Direct Orders</li>
@endsection

@section('content')

    <!-- Top KPI Highlights -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">Total Orders</span>
                    <div class="stat-icon-box" style="background: rgba(212, 175, 55, 0.15); color: #b8860b;">
                        <i class="bi bi-bag-check-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $totalOrdersCount }}</h3>
                <div class="small text-muted">
                    <span class="text-dark fw-semibold">₹{{ number_format($totalPipelineValue, 2) }}</span> Pipeline Value
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">New Inquiries</span>
                    <div class="stat-icon-box" style="background: rgba(225, 29, 72, 0.1); color: #e11d48;">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $newOrdersCount }}</h3>
                <div class="small text-muted">
                    <span class="text-danger fw-semibold">Awaiting Concierge Action</span>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">In Progress</span>
                    <div class="stat-icon-box" style="background: rgba(59, 0, 90, 0.1); color: #3b005a;">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $processingOrdersCount }}</h3>
                <div class="small text-muted">
                    <span class="text-info fw-semibold">Processing / Confirmed</span>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">Delivered</span>
                    <div class="stat-icon-box" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $deliveredOrdersCount }}</h3>
                <div class="small text-muted">
                    <span class="text-success fw-semibold">₹{{ number_format($totalRevenue, 2) }}</span> Verified Revenue
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="card-custom p-3 mb-4">
        <form action="{{ route('admin.orders.index') }}" method="GET">
            <div class="row g-2 align-items-center justify-content-between">
                <div class="col-12 col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm border-start-0 ps-0" placeholder="Search order #, customer, phone, SKU, product..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-gold">Search</button>
                    </div>
                </div>

                <div class="col-12 col-md-5 d-flex gap-2">
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">All Order Statuses</option>
                        @foreach($statuses as $st)
                            <option value="{{ $st }}" {{ request('status') === $st ? 'selected' : '' }}>
                                {{ ucfirst($st) }}
                            </option>
                        @endforeach
                    </select>

                    <select name="payment_status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">Payment Status</option>
                        @foreach($paymentStatuses as $pst)
                            <option value="{{ $pst }}" {{ request('payment_status') === $pst ? 'selected' : '' }}>
                                {{ ucfirst($pst) }}
                            </option>
                        @endforeach
                    </select>

                    <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}" onchange="this.form.submit()" title="Filter by date">

                    @if(request()->hasAny(['search', 'status', 'payment_status', 'date']))
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-secondary text-nowrap" title="Clear Filters">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    @endif
                </div>

                <div class="col-12 col-md-3 text-md-end text-muted small">
                    Showing <strong>{{ $orders->total() }}</strong> total direct orders
                </div>
            </div>
        </form>
    </div>

    <!-- Main Orders Table Card -->
    <div class="card-custom">
        <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
                <thead>
                    <tr>
                        <th style="min-width: 140px;">Order Details</th>
                        <th style="min-width: 180px;">Client Information</th>
                        <th style="min-width: 220px;">Ordered Product &amp; Specs</th>
                        <th style="min-width: 110px;">Total Amount</th>
                        <th style="min-width: 110px;">Order Status</th>
                        <th style="min-width: 110px;">Payment</th>
                        <th class="text-end" style="min-width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        @php
                            $firstItem = $order->items->first();
                            $itemImg = null;
                            if ($firstItem) {
                                if ($firstItem->product_image) {
                                    $itemImg = (str_starts_with($firstItem->product_image, 'http') || str_starts_with($firstItem->product_image, 'assets/')) 
                                        ? asset($firstItem->product_image) 
                                        : asset('storage/' . $firstItem->product_image);
                                } elseif ($firstItem->product && $firstItem->product->main_image) {
                                    $itemImg = $firstItem->product->main_image_url;
                                }
                            }
                            if (!$itemImg) $itemImg = asset('assets/img/card_pink.jpg');
                        @endphp
                        <tr>
                            <!-- Order Number & Date -->
                            <td>
                                <div class="fw-bold text-dark font-monospace" style="font-size: 0.88rem; color: #3b005a !important;">
                                    {{ $order->order_number }}
                                </div>
                                <div class="text-muted small mt-1">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $order->created_at->format('d M Y') }}
                                </div>
                                <div class="text-muted" style="font-size: 0.72rem;">
                                    <i class="bi bi-clock me-1"></i>{{ $order->created_at->format('h:i A') }}
                                </div>
                            </td>

                            <!-- Customer Information -->
                            <td>
                                <div class="fw-bold text-dark" style="font-size: 0.92rem;">
                                    {{ $order->customer_name }}
                                </div>
                                <div class="small mt-1">
                                    <a href="tel:{{ $order->customer_phone }}" class="text-decoration-none fw-medium" style="color: #b58d43;">
                                        <i class="bi bi-telephone-fill me-1"></i>{{ $order->customer_phone }}
                                    </a>
                                </div>
                                <div class="small text-muted text-truncate" style="max-width: 190px;" title="{{ $order->customer_email }}">
                                    <i class="bi bi-envelope me-1"></i>{{ $order->customer_email }}
                                </div>
                                <div class="small text-secondary mt-1" title="{{ $order->shipping_address }}, {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}">
                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $order->city }}, {{ $order->state }} ({{ $order->pincode }})
                                </div>
                            </td>

                            <!-- Product & Variants -->
                            <td>
                                @if($firstItem)
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $itemImg }}" alt="{{ $firstItem->product_name }}" class="rounded shadow-sm border" style="width: 48px; height: 60px; object-fit: cover;">
                                        <div>
                                            <div class="fw-bold text-dark small text-truncate" style="max-width: 170px;" title="{{ $firstItem->product_name }}">
                                                {{ $firstItem->product_name }}
                                            </div>
                                            @if($firstItem->product_sku)
                                                <div class="text-muted" style="font-size: 0.72rem;">
                                                    SKU: <strong class="font-monospace">{{ $firstItem->product_sku }}</strong>
                                                </div>
                                            @endif
                                            <div class="small text-muted">
                                                <span>Size: <strong class="text-dark">{{ $firstItem->size ?? 'M' }}</strong></span> | 
                                                <span>Color: <strong class="text-dark">{{ $firstItem->color ?? 'Rose Pink' }}</strong></span>
                                            </div>
                                            <div class="small fw-semibold text-secondary">
                                                Qty: {{ $firstItem->quantity }} × ₹{{ number_format($firstItem->price) }}
                                            </div>
                                        </div>
                                    </div>
                                    @if($order->items->count() > 1)
                                        <div class="badge bg-light text-muted border mt-1" style="font-size: 0.7rem;">
                                            + {{ $order->items->count() - 1 }} more item(s)
                                        </div>
                                    @endif
                                @else
                                    <span class="text-muted small">No items recorded</span>
                                @endif
                            </td>

                            <!-- Total Amount -->
                            <td>
                                <div class="fw-bold text-dark font-monospace fs-6">
                                    ₹{{ number_format($order->total_amount, 2) }}
                                </div>
                                <div class="small text-muted" style="font-size: 0.72rem;">
                                    Subtotal: ₹{{ number_format($order->subtotal) }}
                                </div>
                                <div class="small {{ $order->shipping_amount == 0 ? 'text-success' : 'text-muted' }}" style="font-size: 0.72rem;">
                                    Shipping: {{ $order->shipping_amount == 0 ? 'FREE' : '₹'.number_format($order->shipping_amount) }}
                                </div>
                            </td>

                            <!-- Order Status -->
                            <td>
                                @if($order->order_status === 'new')
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                                        <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> New Lead
                                    </span>
                                @elseif($order->order_status === 'processing')
                                    <span class="badge bg-warning bg-opacity-10 border border-warning border-opacity-25 px-2 py-1" style="color: #b58d43 !important;">
                                        <i class="bi bi-hourglass-split me-1"></i> Processing
                                    </span>
                                @elseif($order->order_status === 'confirmed')
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1">
                                        <i class="bi bi-check-circle me-1"></i> Confirmed
                                    </span>
                                @elseif($order->order_status === 'shipped')
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">
                                        <i class="bi bi-truck me-1"></i> Shipped
                                    </span>
                                @elseif($order->order_status === 'delivered')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">
                                        <i class="bi bi-check2-all me-1"></i> Delivered
                                    </span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1">
                                        {{ ucfirst($order->order_status) }}
                                    </span>
                                @endif
                            </td>

                            <!-- Payment Status -->
                            <td>
                                @if($order->payment_status === 'paid')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">
                                        <i class="bi bi-check-circle-fill me-1"></i> Paid
                                    </span>
                                @elseif($order->payment_status === 'pending')
                                    <span class="badge bg-warning bg-opacity-10 border border-warning border-opacity-25" style="color: #a17c38 !important;">
                                        Pending
                                    </span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                @endif
                                <div class="text-muted mt-1" style="font-size: 0.7rem;">
                                    {{ $order->payment_method === 'direct_order' ? 'Direct Inquiry' : ucfirst($order->payment_method) }}
                                </div>
                            </td>

                            <!-- Actions -->
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="View Complete Order Details">
                                        <i class="bi bi-eye-fill"></i> View
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" title="Delete Order" onclick="confirmDeleteOrder('{{ $order->id }}', '{{ $order->order_number }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <form id="del-order-{{ $order->id }}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-warning opacity-75"></i>
                                    <h5 class="fw-bold mb-1">No Direct Orders Found</h5>
                                    <p class="small mb-0">No customer has submitted the express direct checkout modal matching your criteria yet.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="p-3 border-top d-flex justify-content-between align-items-center">
                <div class="small text-muted">
                    Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} direct orders
                </div>
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold text-danger">Confirm Delete</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3">
                    <p class="small mb-0">Are you sure you want to delete order <strong id="deleteOrderNumberText"></strong>? This action cannot be reversed.</p>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="confirmDeleteOrderBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    let orderToDeleteId = null;

    function confirmDeleteOrder(orderId, orderNumber) {
        orderToDeleteId = orderId;
        document.getElementById('deleteOrderNumberText').textContent = orderNumber;
        const modal = new bootstrap.Modal(document.getElementById('deleteOrderModal'));
        modal.show();
    }

    document.getElementById('confirmDeleteOrderBtn')?.addEventListener('click', function () {
        if (orderToDeleteId) {
            const form = document.getElementById('del-order-' + orderToDeleteId);
            if (form) form.submit();
        }
    });
</script>
@endpush
