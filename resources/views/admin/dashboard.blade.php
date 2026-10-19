@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active text-muted" aria-current="page">Dashboard Overview</li>
@endsection

@section('content')

    <!-- Top Greeting & Quick Actions -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="font-family: 'Playfair Display', Georgia, serif; letter-spacing: 0.25px; color: #240038 !important;">
                Welcome, {{ auth()->user()->name ?? 'Administrator' }}
            </h2>
            <p class="text-muted small mb-0" style="font-family: 'Poppins', sans-serif;">Live performance overview for Sara's Boutique luxury ethnic catalog.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            @can('create products')
            <a href="{{ route('admin.products.create') }}" class="btn btn-gold btn-sm shadow-sm d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Add New Product
            </a>
            @endcan
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-gold btn-sm d-flex align-items-center gap-1">
                <i class="bi bi-shop"></i> View Boutique
            </a>
        </div>
    </div>

    <!-- Stat Widgets Grid -->
    <div class="row g-3 mb-4">
        <!-- Card 1: Direct Orders -->
        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">Direct Orders</span>
                    <div class="stat-icon-box" style="background: rgba(225, 29, 72, 0.12); color: #e11d48;">
                        <i class="bi bi-bag-heart-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $totalOrders }}</h3>
                <div class="small text-muted">
                    @if($newOrders > 0)
                        <span class="text-danger fw-semibold"><i class="bi bi-bell-fill"></i> {{ $newOrders }} New Inquiries</span>
                    @else
                        <span class="text-success fw-semibold"><i class="bi bi-check-circle"></i> All Handled</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 2: Total Products -->
        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">Total Products</span>
                    <div class="stat-icon-box" style="background: rgba(212, 175, 55, 0.15); color: #b8860b;">
                        <i class="bi bi-bag-check-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $totalProducts }}</h3>
                <div class="small text-muted">
                    <span class="text-success fw-semibold"><i class="bi bi-check-circle-fill"></i> {{ $activeProducts }}</span> Active in Store
                </div>
            </div>
        </div>

        <!-- Card 3: Categories -->
        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">Collections</span>
                    <div class="stat-icon-box" style="background: rgba(59, 0, 90, 0.1); color: #3b005a;">
                        <i class="bi bi-tags-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $totalCategories }}</h3>
                <div class="small text-muted">
                    <span class="fw-semibold" style="color: #3b005a;">Active taxonomies</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Contact Enquiries -->
        <div class="col-6 col-lg-3">
            <div class="stat-widget">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.75px; font-size: 0.72rem; font-family: 'Poppins', sans-serif;">New Enquiries</span>
                    <div class="stat-icon-box" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                        <i class="bi bi-envelope-heart-fill"></i>
                    </div>
                </div>
                <h3 class="mb-1" style="font-family: 'Playfair Display', Georgia, serif; color: #240038;">{{ $newContacts }}</h3>
                <div class="small text-muted">
                    <span class="fw-semibold" style="color: #b8860b;">{{ $totalContacts }}</span> Total client inquiries
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <!-- Chart 1: Products By Category -->
        <div class="col-12 col-lg-7">
            <div class="card-custom h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: rgba(212, 175, 55, 0.2) !important;">
                    <h5 class="m-0" style="font-family: 'Playfair Display', Georgia, serif; font-weight: 700; color: #240038;">Products By Collection</h5>
                    <span class="badge px-3 py-1" style="background: #faf6ef; color: #8c6209; border: 1px solid rgba(212, 175, 55, 0.35);">Distribution</span>
                </div>
                <div style="height: 280px;">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart 2: Customer Enquiries Breakdown -->
        <div class="col-12 col-lg-5">
            <div class="card-custom h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: rgba(212, 175, 55, 0.2) !important;">
                    <h5 class="m-0" style="font-family: 'Playfair Display', Georgia, serif; font-weight: 700; color: #240038;">Enquiry Pipeline</h5>
                    <span class="badge px-3 py-1" style="background: #faf6ef; color: #3b005a; border: 1px solid rgba(59, 0, 90, 0.2);">Live Pipeline</span>
                </div>
                <div style="height: 280px; position: relative;" class="d-flex align-items-center justify-content-center">
                    <canvas id="contactStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Direct Orders Row -->
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="card-custom">
                <div class="card-header-custom d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="m-0" style="font-family: 'Playfair Display', Georgia, serif; font-weight: 700; color: #240038;">
                            <i class="bi bi-bag-heart-fill text-danger me-2"></i> Recent Direct Orders &amp; Inquiries
                        </h5>
                        <p class="text-muted small mb-0 mt-1">Real-time express checkout submissions captured from product pages</p>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-gold fw-semibold shadow-sm">
                        View All Direct Orders &rarr;
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Client Details</th>
                                <th>Ensemble / Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date &amp; Time</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $ro)
                                @php
                                    $item = $ro->items->first();
                                    $roImg = null;
                                    if ($item) {
                                        if ($item->product_image) {
                                            $roImg = (str_starts_with($item->product_image, 'http') || str_starts_with($item->product_image, 'assets/')) 
                                                ? asset($item->product_image) 
                                                : asset('storage/' . $item->product_image);
                                        } elseif ($item->product && $item->product->main_image) {
                                            $roImg = $item->product->main_image_url;
                                        }
                                    }
                                    if (!$roImg) $roImg = asset('assets/img/card_pink.jpg');
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $ro->id) }}" class="fw-bold font-monospace text-decoration-none" style="color: #3b005a;">
                                            {{ $ro->order_number }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark small">{{ $ro->customer_name }}</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">
                                            <i class="bi bi-telephone me-1"></i>{{ $ro->customer_phone }} • {{ $ro->city }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($item)
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ $roImg }}" alt="{{ $item->product_name }}" width="36" height="46" class="rounded object-fit-cover shadow-sm border">
                                                <div>
                                                    <div class="fw-semibold text-dark small text-truncate" style="max-width: 170px;" title="{{ $item->product_name }}">{{ $item->product_name }}</div>
                                                    <div class="text-muted" style="font-size: 0.72rem;">{{ $item->size }} | {{ $item->color }} (Qty: {{ $item->quantity }})</div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted small">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold font-monospace" style="color: #b8860b;">₹{{ number_format($ro->total_amount, 2) }}</span>
                                    </td>
                                    <td>
                                        @if($ro->order_status === 'new')
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">New Lead</span>
                                        @elseif($ro->order_status === 'processing')
                                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1" style="color: #b8860b !important;">Processing</span>
                                        @elseif($ro->order_status === 'confirmed')
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1">Confirmed</span>
                                        @elseif($ro->order_status === 'delivered')
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">Delivered</span>
                                        @else
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1">{{ ucfirst($ro->order_status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-muted small">
                                        {{ $ro->created_at->diffForHumans() }}
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.orders.show', $ro->id) }}" class="btn btn-sm btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted small">
                                        <i class="bi bi-inbox me-1"></i> No direct orders placed yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Tables Row -->
    <div class="row g-4">
        <!-- Recent Products -->
        <div class="col-12 col-lg-7">
            <div class="card-custom">
                <div class="card-header-custom d-flex align-items-center justify-content-between">
                    <h5 class="m-0" style="font-family: 'Playfair Display', Georgia, serif; font-weight: 700; color: #240038;">Recently Added Ensembles</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-link text-decoration-none fw-semibold" style="color: #b8860b;">View All Products &rarr;</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Collection</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProducts as $p)
                                @php
                                    $pImg = $p->main_image ? (str_starts_with($p->main_image, 'http') || str_starts_with($p->main_image, 'assets/') ? asset($p->main_image) : asset('storage/' . $p->main_image)) : asset('assets/img/card_pink.jpg');
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ $pImg }}" alt="{{ $p->name }}" width="42" height="52" class="rounded object-fit-cover shadow-sm border" style="border-color: rgba(212, 175, 55, 0.25);">
                                            <div>
                                                <div class="fw-semibold text-dark small text-truncate" style="max-width: 190px; font-family: 'Poppins', sans-serif;">{{ $p->name }}</div>
                                                <div class="text-muted" style="font-size: 0.75rem;">{{ $p->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-secondary border small">{{ $p->category->name ?? 'Uncategorized' }}</span></td>
                                    <td class="fw-bold" style="color: #b8860b; font-family: 'Poppins', sans-serif;">₹{{ number_format($p->price) }}</td>
                                    <td>
                                        @if($p->status == 1)
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">Active</span>
                                        @else
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-outline-gold px-2 py-1" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No products found yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Contact Inquiries -->
        <div class="col-12 col-lg-5">
            <div class="card-custom">
                <div class="card-header-custom d-flex align-items-center justify-content-between">
                    <h5 class="m-0" style="font-family: 'Playfair Display', Georgia, serif; font-weight: 700; color: #240038;">Concierge Inquiries</h5>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-link text-decoration-none fw-semibold" style="color: #b8860b;">View All &rarr;</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th class="text-end">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $c)
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-dark small">{{ $c->name }}</div>
                                        <div class="text-muted" style="font-size: 0.72rem;">{{ $c->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td>
                                        <div class="small text-truncate text-secondary" style="max-width: 130px;" title="{{ $c->subject }}">
                                            {{ $c->subject ?? 'Fitting Request' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($c->status == 'New')
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">New</span>
                                        @elseif($c->status == 'In Progress')
                                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25" style="color: #b8860b !important;">In Progress</span>
                                        @else
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Resolved</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.contacts.show', $c->id) }}" class="btn btn-sm btn-outline-secondary" title="View Enquiry">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No enquiries received yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Category Chart
    const ctxCat = document.getElementById('categoryChart').getContext('2d');
    const gradCat = ctxCat.createLinearGradient(0, 0, 0, 300);
    gradCat.addColorStop(0, 'rgba(212, 175, 55, 0.95)');
    gradCat.addColorStop(1, 'rgba(59, 0, 90, 0.75)');

    new Chart(ctxCat, {
        type: 'bar',
        data: {
            labels: @json($categoryLabels),
            datasets: [{
                label: 'Products',
                data: @json($categoryCounts),
                backgroundColor: gradCat,
                borderColor: '#d4af37',
                borderWidth: 1.5,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(212, 175, 55, 0.1)' },
                    ticks: { color: '#6b7280', font: { family: 'Poppins' } }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#374151', font: { family: 'Poppins' }, maxRotation: 45, minRotation: 0 }
                }
            }
        }
    });

    // Contact Status Doughnut Chart
    const ctxStatus = document.getElementById('contactStatusChart').getContext('2d');
    const statusData = @json($statusCounts);
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: Object.keys(statusData).length ? Object.keys(statusData) : ['New', 'In Progress', 'Resolved'],
            datasets: [{
                data: Object.values(statusData).length ? Object.values(statusData) : [1, 0, 0],
                backgroundColor: ['#e11d48', '#d4af37', '#10b981', '#3b005a'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#374151', font: { family: 'Poppins', size: 12 }, boxWidth: 14, padding: 15 }
                }
            },
            cutout: '70%'
        }
    });
</script>
@endpush
