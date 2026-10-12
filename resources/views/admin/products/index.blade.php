@extends('layouts.admin')

@section('title', 'Products Management')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Products</li>
@endsection

@section('content')

    <!-- Action Bar & Filter Form -->
    <div class="card-custom p-3 mb-4">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-12 col-md-4">
                <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm border-start-0 ps-0" placeholder="Search by name, SKU, fabric..." value="{{ request('search') }}">
                        @if(request('category_id')) <input type="hidden" name="category_id" value="{{ request('category_id') }}"> @endif
                        @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif
                        <button type="submit" class="btn btn-sm btn-gold">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-5">
                <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex gap-2 justify-content-md-end">
                    @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                    
                    <select name="category_id" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">All Statuses</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published (Active)</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft (Inactive)</option>
                    </select>

                    @if(request()->hasAny(['search', 'category_id', 'status']))
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary text-nowrap" title="Clear Filters">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    @endif
                </form>
            </div>

            <div class="col-12 col-md-3 text-md-end">
                @can('create products')
                <a href="{{ route('admin.products.create') }}" class="btn btn-gold btn-sm w-100 w-md-auto shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> Add Product
                </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card-custom">
        <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th style="width: 70px;">Image</th>
                        <th>Product &amp; SKU</th>
                        <th>Category</th>
                        <th>Fabric / Color</th>
                        <th>Price &amp; MRP</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        @php
                            $img = $product->main_image ? (str_starts_with($product->main_image, 'http') || str_starts_with($product->main_image, 'assets/') ? asset($product->main_image) : asset('storage/' . $product->main_image)) : asset('assets/img/card_pink.jpg');
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ $img }}" alt="{{ $product->name }}" width="48" height="60" class="rounded object-fit-cover border" style="border-color: #e5e7eb;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $product->name }}</div>
                                <div class="text-muted small">SKU: <span class="fw-medium" style="color: #b58d43;">{{ $product->sku }}</span></div>
                                <div class="d-flex gap-1 mt-1">
                                    @if($product->is_featured) <span class="badge" style="background: rgba(197, 160, 89, 0.15); color: #9c7a36; font-size: 0.65rem;">Featured</span> @endif
                                    @if($product->is_bestseller) <span class="badge bg-danger bg-opacity-10 text-danger" style="font-size: 0.65rem;">Best Seller</span> @endif
                                    @if($product->is_new_arrival) <span class="badge bg-info bg-opacity-10 text-info" style="font-size: 0.65rem;">New Arrival</span> @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border small">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td>
                                <div class="small text-dark fw-medium">{{ $product->fabric ?? '—' }}</div>
                                <div class="small text-muted">{{ $product->color ?? '—' }}</div>
                            </td>
                            <td>
                                <div class="fw-bold" style="color: #b58d43;">₹{{ number_format($product->price) }}</div>
                                @if($product->mrp && $product->mrp > $product->price)
                                    <div class="small text-decoration-line-through text-muted">₹{{ number_format($product->mrp) }}</div>
                                @endif
                            </td>
                            <td>
                                @if($product->stock_quantity > 5)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">{{ $product->stock_quantity }} in stock</span>
                                @elseif($product->stock_quantity > 0)
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25" style="color: #b58d43 !important;">{{ $product->stock_quantity }} low stock</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">Out of stock</span>
                                @endif
                            </td>
                            <td>
                                @if($product->status == 1)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Published</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Draft</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-outline-secondary" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @can('edit products')
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('delete products')
                                    <button type="button" class="btn btn-outline-danger" title="Delete" onclick="confirmDelete('{{ $product->id }}', '{{ addslashes($product->name) }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @endcan
                                </div>

                                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-box-seam fs-1 d-block text-warning opacity-50 mb-2" style="color: #c5a059 !important;"></i>
                                No products found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="card-footer bg-transparent border-top p-3 d-flex justify-content-center" style="border-color: #f3f4f6;">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection

@push('scripts')
<script>
    function confirmDelete(id, name) {
        if (confirm(`Are you sure you want to delete "${name}"? This action cannot be undone.`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
@endpush
