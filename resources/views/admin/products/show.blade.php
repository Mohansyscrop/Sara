@extends('layouts.admin')

@section('title', 'Product Details: ' . $product->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none" style="color: #c5a059;">Products</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">{{ $product->name }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">{{ $product->name }}</h3>
            <p class="text-muted small mb-0">SKU: <span class="fw-medium" style="color: #b58d43;">{{ $product->sku }}</span> • Category: <span class="text-secondary">{{ $product->category->name ?? 'Uncategorized' }}</span></p>
        </div>
        <div class="d-flex gap-2">
            @can('edit products')
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-gold btn-sm shadow-sm">
                <i class="bi bi-pencil me-1"></i> Edit Product
            </a>
            @endcan
            <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="btn btn-outline-warning btn-sm fw-medium" style="border-color: #c5a059; color: #a17c38; background: #fdfaf5;">
                <i class="bi bi-box-arrow-up-right me-1"></i> View Live
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left: Imagery & Gallery -->
        <div class="col-12 col-lg-5">
            <div class="card-custom p-4 text-center mb-4">
                @php
                    $mainUrl = $product->main_image ? (str_starts_with($product->main_image, 'http') || str_starts_with($product->main_image, 'assets/') ? asset($product->main_image) : asset('storage/' . $product->main_image)) : asset('assets/img/card_pink.jpg');
                @endphp
                <img src="{{ $mainUrl }}" alt="{{ $product->name }}" class="img-fluid rounded-3 mb-3 border" style="max-height: 450px; object-fit: cover; border-color: #e5e7eb;">

                @if($product->images && $product->images->count() > 0)
                    <div class="d-flex justify-content-center flex-wrap gap-2 pt-2 border-top" style="border-color: #f3f4f6;">
                        @foreach($product->images as $gImg)
                            @php
                                $gUrl = str_starts_with($gImg->image_path, 'http') || str_starts_with($gImg->image_path, 'assets/') ? asset($gImg->image_path) : asset('storage/' . $gImg->image_path);
                            @endphp
                            <img src="{{ $gUrl }}" alt="Gallery Image" width="60" height="80" class="rounded object-fit-cover border" style="border-color: #e5e7eb;">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Right: Full Details -->
        <div class="col-12 col-lg-7">
            <div class="card-custom p-4 mb-4">
                <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                    <i class="bi bi-cash-stack me-1"></i> Pricing &amp; Inventory Status
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="text-muted small">Price</div>
                        <div class="fs-4 fw-bold" style="color: #b58d43;">₹{{ number_format($product->price) }}</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-muted small">MRP</div>
                        <div class="fs-5 text-decoration-line-through text-muted">₹{{ number_format($product->mrp ?? $product->price) }}</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-muted small">Discount</div>
                        <div class="fs-5 text-danger fw-bold">{{ (int)$product->discount }}% OFF</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-muted small">Stock</div>
                        <div class="fs-5 text-success fw-bold">{{ $product->stock_quantity }} units</div>
                    </div>
                </div>

                <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                    <i class="bi bi-tags me-1"></i> Specifications
                </h5>
                <div class="row g-2 mb-4 text-dark">
                    <div class="col-md-6"><strong>Fabric:</strong> {{ $product->fabric ?? 'Pure Silk' }}</div>
                    <div class="col-md-6"><strong>Color:</strong> {{ $product->color ?? '—' }}</div>
                    <div class="col-md-6"><strong>Occasion:</strong> {{ $product->occasion ?? 'Festive / Bridal' }}</div>
                    <div class="col-md-6"><strong>Status:</strong> 
                        @if($product->status == 1)
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Published</span>
                        @else
                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Draft</span>
                        @endif
                    </div>
                </div>

                <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                    <i class="bi bi-file-text me-1"></i> Descriptions
                </h5>
                <div class="mb-3">
                    <strong class="text-muted small d-block mb-1">Short Description:</strong>
                    <p class="text-dark small">{{ $product->short_description ?? '—' }}</p>
                </div>
                <div>
                    <strong class="text-muted small d-block mb-1">Full Description:</strong>
                    <div class="text-dark small">{!! nl2br(e($product->full_description ?? '—')) !!}</div>
                </div>
            </div>
        </div>
    </div>

@endsection
