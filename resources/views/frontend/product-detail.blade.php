@extends('layouts.app')

@section('title', ($product->meta_title ?? $product->name) . " | Sara's Boutique - Luxury Ethnic Couture")
@section('meta_description', $product->meta_description ?? $product->short_description)
@section('meta_keywords', $product->meta_keywords ?? ($product->name . ", Indian Ethnic Wear, Designer Salwar Suit, Zardozi Embroidery, Sara's Boutique"))
@section('og_title', $product->name . " | Sara's Boutique")
@section('og_description', $product->short_description)
@php
    $mainImgUrl = $product->main_image ? (str_starts_with($product->main_image, 'http') || str_starts_with($product->main_image, 'assets/') ? asset($product->main_image) : asset('storage/' . $product->main_image)) : asset('assets/img/card_pink.jpg');
@endphp
@section('og_image', $mainImgUrl)

@push('styles')
    <!-- Scoped Product Detail Luxury Page Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/productdetail.css') }}">
    <style>
        /* Luxury Razorpay Checkout Modal Styles */
        .checkout-modal .modal-content {
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.35);
            box-shadow: 0 25px 60px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .checkout-modal-header {
            background: linear-gradient(135deg, #1A120B 0%, #2B1B17 100%);
            color: #F8F4E3;
            padding: 1.25rem 1.75rem;
            border-bottom: 2px solid #D4AF37;
        }
        .checkout-prod-preview {
            background: #FAF8F5;
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 1rem;
        }
        .checkout-prod-img {
            width: 70px;
            height: 85px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ECEAE5;
        }
        .checkout-field-label {
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #555;
            margin-bottom: 0.3rem;
        }
        .checkout-input {
            border-radius: 8px;
            border: 1px solid #D6D3D1;
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }
        .checkout-input:focus {
            border-color: #D4AF37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
            outline: none;
        }
        .btn-pay-rzp {
            background: linear-gradient(135deg, #8E1616 0%, #B8860B 100%);
            color: #fff;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 0.85rem 1.5rem;
            border-radius: 50px;
            border: none;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 18px rgba(142, 22, 22, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-pay-rzp:hover:not(:disabled) {
            background: linear-gradient(135deg, #A81B1B 0%, #D4AF37 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(142, 22, 22, 0.35);
            color: #fff;
        }
        .btn-pay-rzp:disabled {
            opacity: 0.75;
            cursor: not-allowed;
        }
        .rzp-trust-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            color: #6B7280;
            font-size: 0.78rem;
            margin-top: 0.75rem;
        }
    </style>
@endpush

@section('content')

    <!-- ===================== BREADCRUMB / PRODUCT HERO BANNER ===================== -->
    <section class="product-hero-banner" aria-label="Product Header Banner">
        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">

                    <!-- Breadcrumbs -->
                    <nav aria-label="Breadcrumb" class="hero-load-item delay-1">
                        <ul class="product-hero-breadcrumbs">
                            <li><a href="{{ route('home') }}">Home</a> <i class="bi bi-chevron-right small"></i></li>
                            <li><a href="{{ route('collections') }}">Collections</a> <i class="bi bi-chevron-right small"></i></li>
                            @if($product->category)
                                <li><a href="{{ route('collections', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a> <i class="bi bi-chevron-right small"></i></li>
                            @endif
                            <li class="active" aria-current="page">{{ $product->name }}</li>
                        </ul>
                    </nav>

                    <!-- Main Product Banner Title -->
                    <h1 class="product-hero-title hero-load-item delay-2">{{ $product->name }}</h1>

                    <!-- Supporting Tags -->
                    <div class="product-hero-tags hero-load-item delay-3">
                        <span>{{ $product->fabric ?? 'Pure Silk' }}</span>
                        <span class="dot-sep">•</span>
                        <span>{{ $product->occasion ?? 'Festive & Bridal' }}</span>
                        <span class="dot-sep">•</span>
                        <span>{{ $product->color ?? 'Bespoke Couture' }}</span>
                    </div>

                </div>

                <!-- Right Side Cursive Motto Callout -->
                <div class="product-hero-callout d-none d-lg-block hero-load-scale delay-4">
                    <span class="script-motto">Grace in<br>Every Stitch</span>
                    <i class="bi bi-heart heart-accent"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== MAIN PRODUCT DETAIL SECTION ===================== -->
    <main class="product-detail-section" id="productDetailMain">
        <div class="container">
            <div class="row g-4 g-xl-5">

                <!-- ═════════ LEFT: PRODUCT IMAGE GALLERY ═════════ -->
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="product-gallery-stage reveal-left">

                        @php
                            $galleryImages = collect([$product->main_image]);
                            if ($product->images && $product->images->count() > 0) {
                                foreach($product->images as $img) {
                                    $galleryImages->push($img->image_path);
                                }
                            }
                            $galleryImages = $galleryImages->filter()->unique()->values();
                        @endphp

                        <!-- Left Side Vertical Thumbnail Strip -->
                        <div class="gallery-thumbs-col" id="thumbsContainer">
                            <button type="button" class="thumb-nav-arrow" id="thumbArrowUp" onclick="scrollThumbs('up')"
                                aria-label="Scroll thumbnails up">
                                <i class="bi bi-chevron-up"></i>
                            </button>

                            @foreach($galleryImages as $index => $imgPath)
                                @php
                                    $thumbUrl = str_starts_with($imgPath, 'http') || str_starts_with($imgPath, 'assets/') ? asset($imgPath) : asset('storage/' . $imgPath);
                                @endphp
                                <div class="thumb-img-card {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}" onclick="switchProductImage({{ $index }}, '{{ $thumbUrl }}')">
                                    <img src="{{ $thumbUrl }}" alt="{{ $product->name }} Thumbnail {{ $index + 1 }}">
                                </div>
                            @endforeach

                            <button type="button" class="thumb-nav-arrow" id="thumbArrowDown"
                                onclick="scrollThumbs('down')" aria-label="Scroll thumbnails down">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </div>

                        <!-- Center: Large Main Product Image Viewport -->
                        <div class="gallery-main-viewport" id="mainImgViewport">

                            <!-- Main Image Element -->
                            <img id="mainProductImage" src="{{ $mainImgUrl }}"
                                alt="{{ $product->name }}" class="gallery-main-img">

                            <!-- Overlaid Left/Right Arrow Controls -->
                            <button type="button" class="gallery-nav-btn prev-btn" onclick="prevProductImg(event)"
                                aria-label="Previous Product Image">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button type="button" class="gallery-nav-btn next-btn" onclick="nextProductImg(event)"
                                aria-label="Next Product Image">
                                <i class="bi bi-chevron-right"></i>
                            </button>

                            <!-- Wishlist Floating Heart Button -->
                            <button type="button" class="gallery-wishlist-btn" id="mainWishlistBtn"
                                onclick="toggleMainWishlist(event, '{{ addslashes($product->name) }}')" title="Add to Wishlist"
                                aria-label="Save to Wishlist">
                                <i class="bi bi-heart"></i>
                            </button>

                            <!-- Desktop Hover to Zoom Indicator -->
                            <div class="zoom-hover-pill" id="zoomHoverPill">
                                <i class="bi bi-search"></i>
                                <span>Hover to zoom</span>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- ═════════ RIGHT: PRODUCT INFORMATION ═════════ -->
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="product-info-panel reveal-right">

                        <!-- Meta Row: Best Seller Badge + Star Rating + Action Tools -->
                        <div class="p-meta-top-row">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                @if($product->is_best_seller)
                                    <span class="badge-bestseller-pill">
                                        <i class="bi bi-award-fill"></i> Best Seller
                                    </span>
                                @elseif($product->is_new_arrival)
                                    <span class="badge-bestseller-pill" style="background: rgba(0, 95, 115, 0.12); color: #005f73; border-color: #005f73;">
                                        <i class="bi bi-stars"></i> New Arrival
                                    </span>
                                @endif
                                <div class="p-rating-wrap">
                                    <div class="p-stars-icons">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($product->rating ?? 5))
                                                <i class="bi bi-star-fill"></i>
                                            @elseif($i - 0.5 <= ($product->rating ?? 5))
                                                <i class="bi bi-star-half"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="p-reviews-count">{{ number_format($product->rating ?? 4.8, 1) }} ({{ $product->review_count ?? 124 }} Reviews)</span>
                                </div>
                            </div>

                            <!-- Share & Wishlist Tools -->
                            <div class="p-action-tools">
                                <button type="button" class="btn-circle-tool" onclick="shareProduct('{{ addslashes($product->name) }}')"
                                    title="Share this ensemble" aria-label="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                                <button type="button" class="btn-circle-tool" onclick="toggleMainWishlist(event, '{{ addslashes($product->name) }}')"
                                    title="Save to Wishlist" aria-label="Wishlist">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Product Title -->
                        <h2 class="p-main-title">{{ $product->name }}</h2>

                        <!-- SKU & Category Tag -->
                        <div class="mb-2 text-muted small">
                            <span>SKU: <strong>{{ $product->sku ?? 'SB-' . str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</strong></span>
                            @if($product->category)
                                <span class="mx-2">•</span>
                                <span>Category: <strong>{{ $product->category->name }}</strong></span>
                            @endif
                        </div>

                        <!-- Pricing Row -->
                        <div class="p-price-block">
                            <span class="p-current-price">₹{{ number_format($product->price) }}</span>
                            @if($product->mrp && $product->mrp > $product->price)
                                <span class="p-original-price">₹{{ number_format($product->mrp) }}</span>
                                <span class="p-discount-pill">{{ (int)$product->discount }}% OFF</span>
                            @endif
                        </div>
                        <div class="p-tax-inclusive">Inclusive of all taxes &amp; insured courier delivery</div>

                        <!-- Short Description -->
                        <p class="p-short-desc">
                            {{ $product->short_description ?? 'Graceful and elegant, this handcrafted designer ethnic ensemble features intricate golden embroidery on premium soft fabric. Perfect for weddings, festive occasions and special celebrations.' }}
                        </p>

                        <!-- Color Selection -->
                        <div class="selection-group-block">
                            <div class="selection-label-row">
                                <div>
                                    <span class="selection-label-title">Color:</span>
                                    <span class="selection-label-val" id="selectedColorName">{{ $product->color ?? 'Royal Rose Pink' }}</span>
                                </div>
                            </div>
                            <div class="color-swatches-grid" id="colorSwatches">
                                <div class="color-swatch-circle active" style="background-color: #E88B9E;"
                                    data-color="{{ $product->color ?? 'Royal Rose Pink' }}" onclick="selectColor('{{ $product->color ?? 'Royal Rose Pink' }}', this)" title="{{ $product->color ?? 'Royal Rose Pink' }}"></div>
                                <div class="color-swatch-circle" style="background-color: #2D5A3F;"
                                    data-color="Emerald Green" onclick="selectColor('Emerald Green', this)" title="Emerald Green"></div>
                                <div class="color-swatch-circle" style="background-color: #3B5A8C;"
                                    data-color="Peacock Blue" onclick="selectColor('Peacock Blue', this)" title="Peacock Blue"></div>
                                <div class="color-swatch-circle" style="background-color: #5E2570;"
                                    data-color="Imperial Purple" onclick="selectColor('Imperial Purple', this)" title="Imperial Purple"></div>
                            </div>
                        </div>

                        <!-- Size Selection -->
                        @php
                            $availableSizes = $product->sizes ?? ['S', 'M', 'L', 'XL', 'XXL'];
                            if (is_string($availableSizes)) {
                                $availableSizes = json_decode($availableSizes, true) ?: explode(',', $availableSizes);
                            }
                        @endphp
                        <div class="selection-group-block">
                            <div class="selection-label-row">
                                <div>
                                    <span class="selection-label-title">Size:</span>
                                    <span class="selection-label-val" id="selectedSizeName">{{ $availableSizes[0] ?? 'M' }}</span>
                                </div>
                                <button type="button" class="btn-size-guide-link" data-bs-toggle="modal"
                                    data-bs-target="#sizeGuideModal">
                                    <i class="bi bi-rulers"></i>
                                    <span>Size Guide</span>
                                </button>
                            </div>
                            <div class="size-pills-row" id="sizePills">
                                @foreach($availableSizes as $index => $sz)
                                    <button type="button" class="btn-size-pill {{ $index === 0 ? 'active' : '' }}" onclick="selectSize('{{ trim($sz) }}', this)">
                                        {{ trim($sz) }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quantity & Urgency Stock Status -->
                        <div class="qty-stock-row">
                            <div class="qty-counter-box">
                                <button type="button" class="qty-btn" onclick="updateQty(-1)"
                                    aria-label="Decrease Quantity">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="qty-value-display" id="productQty">1</span>
                                <button type="button" class="qty-btn" onclick="updateQty(1)"
                                    aria-label="Increase Quantity">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>

                            <!-- Urgency Stock Status Indicator -->
                            <div class="stock-urgency-indicator">
                                <i class="bi bi-clock-history"></i>
                                <span>{{ $product->stock_quantity > 0 ? ($product->stock_quantity <= 5 ? 'Only ' . $product->stock_quantity . ' left in stock' : 'In Stock & Ready to Dispatch') : 'Made to Order' }}</span>
                            </div>
                        </div>

                        <!-- Primary CTA Buttons: Add to Cart & Buy Now -->
                        <div class="p-cta-buttons-row">
                            <button type="button" class="btn-add-cart-primary" id="mainAddToCartBtn"
                                onclick="handleAddToCart('{{ addslashes($product->name) }}')">
                                <i class="bi bi-bag-plus"></i>
                                <span>Add to Cart</span>
                            </button>
                            <button type="button" class="btn-buy-now" id="mainBuyNowBtn" data-bs-toggle="modal" data-bs-target="#buyNowCheckoutModal" onclick="handleBuyNow('{{ addslashes($product->name) }}')">
                                <span>Buy Now</span>
                            </button>
                        </div>

                        <!-- Service Guarantees Micro-Strip -->
                        <div class="p-guarantees-strip">
                            <div class="p-guarantee-col">
                                <i class="bi bi-truck p-guarantee-icon"></i>
                                <div class="p-guarantee-text">
                                    <span class="title">Free Shipping</span>
                                    <span class="sub">On orders above ₹4,000</span>
                                </div>
                            </div>
                            <div class="p-guarantee-col">
                                <i class="bi bi-box-seam p-guarantee-icon"></i>
                                <div class="p-guarantee-text">
                                    <span class="title">Easy Returns</span>
                                    <span class="sub">Within 7 days</span>
                                </div>
                            </div>
                            <div class="p-guarantee-col">
                                <i class="bi bi-shield-check p-guarantee-icon"></i>
                                <div class="p-guarantee-text">
                                    <span class="title">Silk Mark Certified</span>
                                    <span class="sub">100% Pure Mulberry Silk</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- ===================== PRODUCT BENEFITS 4-FEATURE STRIP ===================== -->
    <section class="product-benefits-strip" aria-label="Product Benefits">
        <div class="container">
            <div class="row g-4 justify-content-between align-items-center stagger-group">

                <div class="col-6 col-lg-3 stagger-item">
                    <div class="benefit-card-box">
                        <div class="benefit-icon-ring">
                            <i class="bi bi-feather"></i>
                        </div>
                        <h4 class="benefit-title">Premium Fabric</h4>
                        <p class="benefit-desc">{{ $product->fabric ?? 'Soft & breathable pure silk' }}</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3 stagger-item">
                    <div class="benefit-card-box">
                        <div class="benefit-icon-ring">
                            <i class="bi bi-flower1"></i>
                        </div>
                        <h4 class="benefit-title">Handcrafted Embroidery</h4>
                        <p class="benefit-desc">Authentic gold zardozi work</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3 stagger-item">
                    <div class="benefit-card-box">
                        <div class="benefit-icon-ring">
                            <i class="bi bi-stars"></i>
                        </div>
                        <h4 class="benefit-title">Perfect for Occasions</h4>
                        <p class="benefit-desc">{{ $product->occasion ?? 'Weddings, festivals & galas' }}</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3 stagger-item">
                    <div class="benefit-card-box">
                        <div class="benefit-icon-ring">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <h4 class="benefit-title">Tailored Fit</h4>
                        <p class="benefit-desc">Structured royal silhouette</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== PRODUCT INFORMATION TABS ===================== -->
    <section class="product-tabs-section">
        <div class="container">

            <!-- Tab Triggers Bar -->
            <div class="product-nav-tabs reveal" role="tablist">
                <button type="button" class="p-tab-trigger active" role="tab" aria-selected="true"
                    data-target="tabDescription" onclick="switchProductTab('tabDescription', this)">
                    Description
                </button>
                <button type="button" class="p-tab-trigger" role="tab" aria-selected="false" data-target="tabSizeFit"
                    onclick="switchProductTab('tabSizeFit', this)">
                    Size &amp; Fit
                </button>
                <button type="button" class="p-tab-trigger" role="tab" aria-selected="false" data-target="tabCare"
                    onclick="switchProductTab('tabCare', this)">
                    Care Instructions
                </button>
                <button type="button" class="p-tab-trigger" role="tab" aria-selected="false" data-target="tabShipping"
                    onclick="switchProductTab('tabShipping', this)">
                    Shipping &amp; Returns
                </button>
            </div>

            <!-- TAB 1: DESCRIPTION -->
            <div class="tab-pane-box active" id="tabDescription">
                <div class="row g-4 g-xl-5 align-items-start">

                    <!-- Left: Narrative -->
                    <div class="col-12 col-lg-6">
                        <div class="tab-left-content">
                            <h3 class="tab-section-heading">Product Description</h3>
                            <div class="tab-paragraph">
                                {!! nl2br(e($product->full_description ?? $product->short_description)) !!}
                            </div>

                            <!-- Bullet Checklist -->
                            <ul class="tab-checklist mt-4">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Premium pure mulberry silk with breathable inner lining</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Intricate golden zardozi embroidery handcrafted by master artisans</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Complete Luxury Ensemble (Kurta + Churidar / Bottom + Scalloped Dupatta)</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Silk Mark Certified 100% authentic handloom weave</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right: Set Includes & Care Icons Card -->
                    <div class="col-12 col-lg-6">
                        <div class="tab-right-card">

                            <h4 class="set-includes-title">Set Includes</h4>
                            <div class="set-items-grid">
                                <div class="set-item-card">
                                    <div class="set-item-circle">
                                        <img src="{{ $mainImgUrl }}" alt="Embroidered Kurta">
                                    </div>
                                    <span class="set-item-name">Kurta</span>
                                    <span class="set-item-count">(1 Piece)</span>
                                </div>

                                <div class="set-item-card">
                                    <div class="set-item-circle">
                                        <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Silk Bottom">
                                    </div>
                                    <span class="set-item-name">Bottom</span>
                                    <span class="set-item-count">(1 Piece)</span>
                                </div>

                                <div class="set-item-card">
                                    <div class="set-item-circle">
                                        <img src="{{ asset('assets/img/detail_pink_3.jpg') }}" alt="Zardozi Dupatta">
                                    </div>
                                    <span class="set-item-name">Dupatta</span>
                                    <span class="set-item-count">(1 Piece)</span>
                                </div>
                            </div>

                            <h4 class="care-instructions-title">Care Instructions</h4>
                            <div class="care-icons-flex">
                                <div class="care-icon-item">
                                    <i class="bi bi-slash-circle"></i>
                                    <span>Dry Clean Only</span>
                                </div>
                                <div class="care-icon-item">
                                    <i class="bi bi-x-circle"></i>
                                    <span>Do Not Bleach</span>
                                </div>
                                <div class="care-icon-item">
                                    <i class="bi bi-fire"></i>
                                    <span>Iron Low Heat</span>
                                </div>
                                <div class="care-icon-item">
                                    <i class="bi bi-sun"></i>
                                    <span>Store in Muslin</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- TAB 2: SIZE & FIT -->
            <div class="tab-pane-box" id="tabSizeFit">
                <div class="row g-4 align-items-start">
                    <div class="col-12 col-lg-7">
                        <h3 class="tab-section-heading">Detailed Sizing Specifications</h3>
                        <p class="tab-paragraph">
                            Designed with tailored darts for a structured yet comfortable royal silhouette. All garments include 2 inches of inner margin fabric for ease of custom tailoring.
                        </p>
                        <div class="table-responsive">
                            <table class="size-guide-table">
                                <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Bust (Inches)</th>
                                        <th>Waist (Inches)</th>
                                        <th>Hip (Inches)</th>
                                        <th>Length</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>XS</strong></td>
                                        <td>34"</td>
                                        <td>30"</td>
                                        <td>36"</td>
                                        <td>45.5"</td>
                                    </tr>
                                    <tr>
                                        <td><strong>S</strong></td>
                                        <td>36"</td>
                                        <td>32"</td>
                                        <td>38"</td>
                                        <td>46"</td>
                                    </tr>
                                    <tr style="background: rgba(212, 175, 55, 0.08);">
                                        <td><strong>M (Standard)</strong></td>
                                        <td>38"</td>
                                        <td>34"</td>
                                        <td>40"</td>
                                        <td>46.5"</td>
                                    </tr>
                                    <tr>
                                        <td><strong>L</strong></td>
                                        <td>40"</td>
                                        <td>36"</td>
                                        <td>42"</td>
                                        <td>47"</td>
                                    </tr>
                                    <tr>
                                        <td><strong>XL</strong></td>
                                        <td>42"</td>
                                        <td>38"</td>
                                        <td>44"</td>
                                        <td>47.5"</td>
                                    </tr>
                                    <tr>
                                        <td><strong>XXL</strong></td>
                                        <td>44"</td>
                                        <td>40"</td>
                                        <td>46"</td>
                                        <td>48"</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="tab-right-card">
                            <h4 class="set-includes-title">Model Specifications</h4>
                            <p class="small text-muted mb-3">
                                <i class="bi bi-person-bounding-box text-warning me-1"></i>
                                Model is 5'8" tall, bust 34", waist 26", wearing Size S with a relaxed silhouette.
                            </p>
                            <h4 class="set-includes-title mt-4">Bespoke Fitting Consultation</h4>
                            <p class="small text-muted mb-0">
                                Need custom bespoke sizing or sleeve length modifications? Connect directly with our master artisans via WhatsApp concierge (<a href="https://wa.me/919876543210" target="_blank" class="text-gold fw-bold">+91 98765 43210</a>).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 3: CARE INSTRUCTIONS -->
            <div class="tab-pane-box" id="tabCare">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <h3 class="tab-section-heading">Heirloom Fabric &amp; Zari Care Guide</h3>
                        <p class="tab-paragraph">
                            {{ $product->care_instructions ?? "Because this ensemble features pure mulberry silk and hand-laid zardozi metallic bullion, specialized artisanal care is recommended to preserve the garment's luster across generations." }}
                        </p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light">
                                    <h6 class="fw-bold text-dark mb-1"><i class="bi bi-droplet-half text-warning me-1"></i> Professional Cleaning</h6>
                                    <p class="small text-muted mb-0">Always opt for certified dry cleaning with white petroleum spirit.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light">
                                    <h6 class="fw-bold text-dark mb-1"><i class="bi bi-box2-heart text-warning me-1"></i> Storage In Muslin</h6>
                                    <p class="small text-muted mb-0">Store wrapped in pure breathable unbleached muslin fabric away from moisture.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 4: SHIPPING & RETURNS -->
            <div class="tab-pane-box" id="tabShipping">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <h3 class="tab-section-heading">Complimentary Express Shipping &amp; 7-Day Returns</h3>
                        <p class="tab-paragraph">
                            {{ $product->shipping_information ?? "Every ensemble is hand-inspected by our head quality curator, scented with signature sandalwood mist, and packaged in a velvet-lined magnetic gift keepsake box." }}
                        </p>
                        <ul class="tab-checklist">
                            <li><i class="bi bi-check-circle-fill"></i> <span>Orders dispatched within 24–48 hours from our Hyderabad Flagship Atelier.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Delivered via premium air couriers (Bluedart / DTDC Express) within 3–5 business days across India.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Hassle-free 7-day pickup and size exchange guarantee.</span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ===================== "YOU MAY ALSO LIKE" CAROUSEL ===================== -->
    @if($relatedProducts->count() > 0)
    <section class="related-products-section" aria-label="Related Products Carousel">
        <div class="container">

            <div class="section-header-wrap text-start reveal">
                <h2 class="section-main-heading">You May Also Like</h2>
                <p class="section-sub-motto">Complete your look with these beautiful pieces</p>
            </div>

            <div class="carousel-outer-wrapper reveal delay-1">

                <button type="button" class="carousel-ctrl-btn btn-prev" id="prevRelatedBtn"
                    onclick="scrollRelated('left')" aria-label="Previous recommended products">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button type="button" class="carousel-ctrl-btn btn-next" id="nextRelatedBtn"
                    onclick="scrollRelated('right')" aria-label="Next recommended products">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <div class="carousel-cards-track" id="relatedTrack">
                    @foreach($relatedProducts as $relProduct)
                        @php
                            $relImg = $relProduct->main_image ? (str_starts_with($relProduct->main_image, 'http') || str_starts_with($relProduct->main_image, 'assets/') ? asset($relProduct->main_image) : asset('storage/' . $relProduct->main_image)) : asset('assets/img/card_pink.jpg');
                        @endphp
                        <div class="carousel-card-item">
                            <article class="collection-product-card">
                                <div class="c-card-img-wrap">
                                    @if($relProduct->is_best_seller)
                                        <span class="badge-card-pill badge-bestseller">Best Seller</span>
                                    @elseif($relProduct->discount > 0)
                                        <span class="badge-card-pill badge-discount">{{ (int)$relProduct->discount }}% OFF</span>
                                    @endif

                                    <button type="button" class="btn-wishlist"
                                        onclick="toggleRelWishlist(event, this, '{{ addslashes($relProduct->name) }}')"
                                        aria-label="Add to Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>

                                    <a href="{{ route('product.show', $relProduct->slug) }}" class="d-block overflow-hidden">
                                        <img src="{{ $relImg }}" alt="{{ $relProduct->name }}" loading="lazy">
                                    </a>
                                </div>
                                <div class="c-card-body">
                                    <a href="{{ route('product.show', $relProduct->slug) }}" class="text-decoration-none text-reset">
                                        <h4 class="c-card-title">{{ $relProduct->name }}</h4>
                                    </a>
                                    <div class="c-price-row">
                                        <span class="c-curr-price">₹ {{ number_format($relProduct->price) }}</span>
                                        @if($relProduct->mrp && $relProduct->mrp > $relProduct->price)
                                            <span class="c-old-price">₹ {{ number_format($relProduct->mrp) }}</span>
                                            <span class="c-discount-badge">{{ (int)$relProduct->discount }}% OFF</span>
                                        @endif
                                    </div>
                                    <div class="c-card-rating">
                                        <div class="stars-gold">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                        <span class="c-rating-count">({{ $relProduct->review_count ?? 24 }})</span>
                                    </div>
                                    <a href="{{ route('product.show', $relProduct->slug) }}" class="btn-card-add-cart text-decoration-none">
                                        <i class="bi bi-bag-check"></i> View Details
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    @endif

    <!-- Size Guide Modal -->
    <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-serif" id="sizeGuideModalLabel" style="font-family: var(--heading-font);">Sara's Boutique Size Chart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-muted small">Measurements are in inches. All garments include 2 inches of inner alteration margin.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Size</th>
                                    <th>Bust</th>
                                    <th>Waist</th>
                                    <th>Hips</th>
                                    <th>Shoulder</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>XS</td><td>34"</td><td>30"</td><td>36"</td><td>14.0"</td></tr>
                                <tr><td>S</td><td>36"</td><td>32"</td><td>38"</td><td>14.5"</td></tr>
                                <tr class="table-warning"><td>M</td><td>38"</td><td>34"</td><td>40"</td><td>15.0"</td></tr>
                                <tr><td>L</td><td>40"</td><td>36"</td><td>42"</td><td>15.5"</td></tr>
                                <tr><td>XL</td><td>42"</td><td>38"</td><td>44"</td><td>16.0"</td></tr>
                                <tr><td>XXL</td><td>44"</td><td>40"</td><td>46"</td><td>16.5"</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Buy Now Express Checkout Modal -->
    <div class="modal fade checkout-modal" id="buyNowCheckoutModal" tabindex="-1" aria-labelledby="buyNowCheckoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="checkout-modal-header d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-warning small text-uppercase fw-bold d-block" style="letter-spacing: 1px;">Sara's Boutique • White Glove Delivery</span>
                        <h5 class="modal-title font-serif text-white mb-0" id="buyNowCheckoutLabel">Express Direct Checkout</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <!-- Left: Order Summary Preview -->
                        <div class="col-12 col-md-5">
                            <div class="checkout-prod-preview mb-3">
                                <div class="d-flex gap-3 align-items-center">
                                    <img id="checkoutModalImg" src="{{ $mainImgUrl }}" alt="{{ $product->name }}" class="checkout-prod-img">
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">{{ $product->name }}</h6>
                                        <div class="small text-muted mb-1">
                                            <span>Size: <strong id="checkoutModalSize">M</strong></span> | 
                                            <span>Color: <strong id="checkoutModalColor">{{ $product->color ?? 'Royal Rose Pink' }}</strong></span>
                                        </div>
                                        <div class="small text-muted">
                                            Qty: <strong id="checkoutModalQty">1</strong> × ₹{{ number_format($product->price) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-3">
                                <div class="d-flex justify-content-between small text-muted mb-2">
                                    <span>Item Subtotal</span>
                                    <span id="checkoutModalSubtotal">₹{{ number_format($product->price) }}</span>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-2">
                                    <span>Insured Courier</span>
                                    <span id="checkoutModalShipping" class="text-success fw-bold">FREE</span>
                                </div>
                                <div class="d-flex justify-content-between pt-2 border-top fw-bold text-dark fs-6">
                                    <span>Total Payable</span>
                                    <span id="checkoutModalTotal" class="text-danger">₹{{ number_format($product->price) }}</span>
                                </div>
                            </div>

                            <div class="mt-3 text-center">
                                <small class="text-muted d-block" style="font-size: 0.78rem;">
                                    <i class="bi bi-shield-check text-success"></i> Includes 100% pure silk quality guarantee & insured tamper-proof delivery box.
                                </small>
                            </div>
                        </div>

                        <!-- Right: Shipping Address Form -->
                        <div class="col-12 col-md-7">
                            <form id="buyNowForm" onsubmit="event.preventDefault(); submitRazorpayCheckout();">
                                <h6 class="fw-bold mb-3 font-serif">Delivery Destination</h6>

                                <div class="row g-2 mb-2">
                                    <div class="col-12 col-sm-6">
                                        <label class="checkout-field-label">Full Name *</label>
                                        <input type="text" id="chkName" class="form-control checkout-input" required placeholder="e.g. Priyadarshini Rao">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="checkout-field-label">Phone Number *</label>
                                        <input type="tel" id="chkPhone" class="form-control checkout-input" required placeholder="10-digit mobile number">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label class="checkout-field-label">Email Address *</label>
                                    <input type="email" id="chkEmail" class="form-control checkout-input" required placeholder="name@example.com">
                                </div>

                                <div class="mb-2">
                                    <label class="checkout-field-label">Street Address & Flat / House No *</label>
                                    <textarea id="chkAddress" class="form-control checkout-input" rows="2" required placeholder="Door no., Apartment, Street name"></textarea>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-4">
                                        <label class="checkout-field-label">City *</label>
                                        <input type="text" id="chkCity" class="form-control checkout-input" required placeholder="City">
                                    </div>
                                    <div class="col-4">
                                        <label class="checkout-field-label">State *</label>
                                        <input type="text" id="chkState" class="form-control checkout-input" required placeholder="State">
                                    </div>
                                    <div class="col-4">
                                        <label class="checkout-field-label">Pincode *</label>
                                        <input type="text" id="chkPincode" class="form-control checkout-input" required placeholder="6 digits">
                                    </div>
                                </div>

                                <div id="checkoutAlertBox" class="d-none mb-3 alert alert-danger p-2 small"></div>

                                <button type="submit" id="checkoutPayBtn" class="btn-pay-rzp">
                                    <i class="bi bi-lock-fill me-1"></i>
                                    <span id="checkoutPayBtnText">Proceed to Pay ₹{{ number_format($product->price) }}</span>
                                </button>

                                <div class="rzp-trust-badge">
                                    <i class="bi bi-shield-shaded text-success"></i>
                                    <span>Secured by <strong>Razorpay</strong> • UPI, Cards, NetBanking</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        let currentImgIdx = 0;
        const galleryImages = @json($galleryImages->map(function($p) { return str_starts_with($p, 'http') || str_starts_with($p, 'assets/') ? asset($p) : asset('storage/' . $p); }));
        let selectedColor = "{{ $product->color ?? 'Royal Rose Pink' }}";
        let selectedSize = "{{ $availableSizes[0] ?? 'M' }}";
        let quantity = 1;

        function switchProductImage(index, url) {
            currentImgIdx = index;
            const mainImg = document.getElementById('mainProductImage');
            if (mainImg) mainImg.src = url || galleryImages[index];

            document.querySelectorAll('.thumb-img-card').forEach((card, idx) => {
                card.classList.toggle('active', idx === index);
            });
        }

        function prevProductImg(e) {
            if (e) e.stopPropagation();
            if (galleryImages.length === 0) return;
            currentImgIdx = (currentImgIdx - 1 + galleryImages.length) % galleryImages.length;
            switchProductImage(currentImgIdx, galleryImages[currentImgIdx]);
        }

        function nextProductImg(e) {
            if (e) e.stopPropagation();
            if (galleryImages.length === 0) return;
            currentImgIdx = (currentImgIdx + 1) % galleryImages.length;
            switchProductImage(currentImgIdx, galleryImages[currentImgIdx]);
        }

        function scrollThumbs(dir) {
            const container = document.getElementById('thumbsContainer');
            if (!container) return;
            container.scrollBy({ top: dir === 'up' ? -90 : 90, behavior: 'smooth' });
        }

        function selectColor(color, el) {
            selectedColor = color;
            document.getElementById('selectedColorName').textContent = color;
            document.querySelectorAll('.color-swatch-circle').forEach(s => s.classList.remove('active'));
            if (el) el.classList.add('active');
            showToast(`Selected Color: ${color}`);
        }

        function selectSize(size, el) {
            selectedSize = size;
            document.getElementById('selectedSizeName').textContent = size;
            document.querySelectorAll('.btn-size-pill').forEach(b => b.classList.remove('active'));
            if (el) el.classList.add('active');
            showToast(`Selected Size: ${size}`);
        }

        function updateQty(delta) {
            quantity = Math.max(1, Math.min(10, quantity + delta));
            document.getElementById('productQty').textContent = quantity;
        }

        function handleAddToCart(title) {
            let count = parseInt(document.getElementById('cartCount')?.textContent || '0');
            count += quantity;
            const badge = document.getElementById('cartCount');
            if (badge) {
                badge.textContent = count;
                badge.style.transform = 'scale(1.35)';
                setTimeout(() => { badge.style.transform = 'scale(1)'; }, 250);
            }
            showToast(`Added ${quantity} × "${title}" (${selectedSize}, ${selectedColor}) to your Bag!`);
        }

        const productUnitPrice = {{ (float) $product->price }};
        const productId = {{ $product->id }};

        function handleBuyNow(title) {
            const subtotal = productUnitPrice * quantity;
            const shipping = (subtotal >= 4000) ? 0 : 150;
            const total = subtotal + shipping;

            const modalSize = document.getElementById('checkoutModalSize');
            const modalColor = document.getElementById('checkoutModalColor');
            const modalQty = document.getElementById('checkoutModalQty');
            const modalSubtotal = document.getElementById('checkoutModalSubtotal');
            const modalShipping = document.getElementById('checkoutModalShipping');
            const modalTotal = document.getElementById('checkoutModalTotal');
            const btnPayText = document.getElementById('checkoutPayBtnText');

            if (modalSize) modalSize.textContent = selectedSize;
            if (modalColor) modalColor.textContent = selectedColor;
            if (modalQty) modalQty.textContent = quantity;
            if (modalSubtotal) modalSubtotal.textContent = '₹' + subtotal.toLocaleString('en-IN');
            if (modalShipping) modalShipping.textContent = shipping === 0 ? 'FREE' : '₹' + shipping.toLocaleString('en-IN');
            if (modalTotal) modalTotal.textContent = '₹' + total.toLocaleString('en-IN');
            if (btnPayText) btnPayText.textContent = `Proceed to Pay ₹${total.toLocaleString('en-IN')}`;

            const alertBox = document.getElementById('checkoutAlertBox');
            if (alertBox) {
                alertBox.classList.add('d-none');
                alertBox.innerHTML = '';
            }

            const modalEl = document.getElementById('buyNowCheckoutModal');
            if (modalEl) {
                const modalObj = bootstrap.Modal.getOrCreateInstance(modalEl);
                modalObj.show();
            }
        }

        function loadRazorpaySdk() {
            return new Promise((resolve, reject) => {
                if (window.Razorpay) {
                    resolve(window.Razorpay);
                    return;
                }
                const script = document.createElement('script');
                script.src = 'https://checkout.razorpay.com/v1/checkout.js';
                script.onload = () => resolve(window.Razorpay);
                script.onerror = () => reject(new Error('Failed to load Razorpay SDK'));
                document.body.appendChild(script);
            });
        }

        async function submitRazorpayCheckout() {
            const payBtn = document.getElementById('checkoutPayBtn');
            const payBtnText = document.getElementById('checkoutPayBtnText');
            const alertBox = document.getElementById('checkoutAlertBox');

            const name = document.getElementById('chkName').value.trim();
            const phone = document.getElementById('chkPhone').value.trim();
            const email = document.getElementById('chkEmail').value.trim();
            const address = document.getElementById('chkAddress').value.trim();
            const city = document.getElementById('chkCity').value.trim();
            const state = document.getElementById('chkState').value.trim();
            const pincode = document.getElementById('chkPincode').value.trim();

            if (!name || !phone || !email || !address || !city || !state || !pincode) {
                alertBox.classList.remove('d-none');
                alertBox.textContent = 'Please fill all required shipping fields.';
                return;
            }

            payBtn.disabled = true;
            const originalBtnHtml = payBtnText.innerHTML;
            payBtnText.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Connecting to Gateway...';
            alertBox.classList.add('d-none');

            try {
                await loadRazorpaySdk();

                const response = await fetch("{{ route('checkout.razorpay.create') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity,
                        color: selectedColor,
                        size: selectedSize,
                        customer_name: name,
                        customer_phone: phone,
                        customer_email: email,
                        shipping_address: address,
                        city: city,
                        state: state,
                        pincode: pincode
                    })
                });

                const data = await response.json();

                if (!response.ok || !data.success) {
                    throw new Error(data.message || 'Unable to initialize order.');
                }

                const rzpOptions = {
                    key: data.key_id,
                    amount: data.amount,
                    currency: data.currency,
                    name: "Sara's Boutique",
                    description: `${data.product.name} (${data.product.size}, ${data.product.color})`,
                    image: "{{ asset('assets/img/logo1.png') }}",
                    order_id: data.razorpay_order_id,
                    prefill: {
                        name: data.customer.name,
                        email: data.customer.email,
                        contact: data.customer.contact
                    },
                    theme: {
                        color: "#8E1616"
                    },
                    handler: function (rzpResponse) {
                        payBtnText.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Verifying Payment...';
                        verifyRazorpayPayment(data.order_id, rzpResponse);
                    },
                    modal: {
                        ondismiss: function () {
                            payBtn.disabled = false;
                            payBtnText.innerHTML = originalBtnHtml;
                            showToast('Payment window closed. Order is pending.');
                        }
                    }
                };

                const rzpInstance = new Razorpay(rzpOptions);
                rzpInstance.on('payment.failed', function (resp) {
                    payBtn.disabled = false;
                    payBtnText.innerHTML = originalBtnHtml;
                    alertBox.classList.remove('d-none');
                    alertBox.textContent = 'Payment Failed: ' + (resp.error.description || 'Transaction was declined.');
                });

                const modalEl = document.getElementById('buyNowCheckoutModal');
                const modalObj = bootstrap.Modal.getInstance(modalEl);
                if (modalObj) modalObj.hide();

                rzpInstance.open();

            } catch (err) {
                payBtn.disabled = false;
                payBtnText.innerHTML = originalBtnHtml;
                alertBox.classList.remove('d-none');
                alertBox.innerHTML = `<strong>Checkout Notice:</strong> ${err.message}`;
            }
        }

        async function verifyRazorpayPayment(orderId, rzpResponse) {
            try {
                const response = await fetch("{{ route('checkout.razorpay.verify') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        order_id: orderId,
                        razorpay_payment_id: rzpResponse.razorpay_payment_id,
                        razorpay_order_id: rzpResponse.razorpay_order_id,
                        razorpay_signature: rzpResponse.razorpay_signature
                    })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    showToast('Payment confirmed! Redirecting to your receipt...');
                    window.location.href = data.redirect_url;
                } else {
                    alert(data.message || 'Signature verification failed. Please contact boutique support.');
                }
            } catch (error) {
                alert('Payment processed, but could not complete redirect: ' + error.message);
            }
        }

        function addToBag(title) {
            let count = parseInt(document.getElementById('cartCount')?.textContent || '0');
            count++;
            const badge = document.getElementById('cartCount');
            if (badge) {
                badge.textContent = count;
                badge.style.transform = 'scale(1.35)';
                setTimeout(() => { badge.style.transform = 'scale(1)'; }, 250);
            }
            showToast(`Added "${title}" to your shopping bag!`);
        }

        function toggleMainWishlist(e, title) {
            if (e) e.stopPropagation();
            const btn = document.getElementById('mainWishlistBtn');
            btn.classList.toggle('active');
            const isSaved = btn.classList.contains('active');
            btn.innerHTML = isSaved ? '<i class="bi bi-heart-fill text-danger"></i>' : '<i class="bi bi-heart"></i>';
            showToast(isSaved ? `"${title}" saved to your luxury wishlist ♡` : `Removed from wishlist.`);
        }

        function toggleRelWishlist(e, btn, title) {
            e.preventDefault();
            e.stopPropagation();
            btn.classList.toggle('active');
            const isSaved = btn.classList.contains('active');
            btn.innerHTML = isSaved ? '<i class="bi bi-heart-fill text-danger"></i>' : '<i class="bi bi-heart"></i>';
            showToast(isSaved ? `Added "${title}" to your luxury wishlist ♡` : `Removed from wishlist`);
        }

        function shareProduct(title) {
            if (navigator.share) {
                navigator.share({
                    title: `${title} — Sara's Boutique`,
                    url: window.location.href
                }).catch(() => {});
            } else {
                navigator.clipboard.writeText(window.location.href);
                showToast('Product link copied to your clipboard!');
            }
        }

        function switchProductTab(targetTabId, triggerEl) {
            document.querySelectorAll('.p-tab-trigger').forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-selected', 'false');
            });
            document.querySelectorAll('.tab-pane-box').forEach(pane => {
                pane.classList.remove('active');
            });
            triggerEl.classList.add('active');
            triggerEl.setAttribute('aria-selected', 'true');
            const targetPane = document.getElementById(targetTabId);
            if (targetPane) targetPane.classList.add('active');
        }

        function scrollRelated(dir) {
            const track = document.getElementById('relatedTrack');
            if (track) {
                track.scrollBy({ left: dir === 'left' ? -300 : 300, behavior: 'smooth' });
            }
        }

        // Zoom Hover logic
        const viewport = document.getElementById('mainImgViewport');
        const mainImg = document.getElementById('mainProductImage');
        const zoomPill = document.getElementById('zoomHoverPill');
        if (viewport && mainImg) {
            viewport.addEventListener('mousemove', (e) => {
                const rect = viewport.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                mainImg.style.transformOrigin = `${x}% ${y}%`;
                mainImg.style.transform = 'scale(2.2)';
                if (zoomPill) zoomPill.style.opacity = '0';
            });
            viewport.addEventListener('mouseleave', () => {
                mainImg.style.transformOrigin = 'center center';
                mainImg.style.transform = 'scale(1)';
                if (zoomPill) zoomPill.style.opacity = '1';
            });
        }
    </script>
@endpush
