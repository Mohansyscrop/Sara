@extends('layouts.app')

@section('title', ($activeCategory ? $activeCategory->name . ' | ' : '') . "Collections | Saras Boutique Puducherry - Handpicked Women's Fashion")
@section('meta_description', $activeCategory && $activeCategory->meta_description ? $activeCategory->meta_description : "Explore handpicked churidar sets, sarees, and women's fashion at Saras Boutique in Shanmugapuram, Puducherry. Authentic collections & direct WhatsApp enquiry.")
@section('meta_keywords', "Saras Boutique Puducherry, Women's Boutique Puducherry, Churidar Ensembles, Shanmugapuram Boutique, Ethnic Wear Puducherry")
@section('og_title', ($activeCategory ? $activeCategory->name . ' | ' : '') . "Saras Boutique Collections - Puducherry")
@section('og_image', asset('assets/img/breadcrumbs.png'))

@push('styles')
    <!-- Collection Page Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
@endpush

@section('content')

    <!-- ===================== COLLECTION HERO BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Churidar Ensembles Collection Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">

                <!-- Gold Eyebrow -->
                <span class="collection-eyebrow hero-load-item delay-1">OUR COLLECTION</span>

                <!-- Main Title -->
                <h1 class="collection-main-title hero-load-item delay-2">{{ $activeCategory ? $activeCategory->name : 'Churidar Ensembles' }}</h1>

                <!-- Cursive Gold Script -->
                <span class="collection-script-subtitle hero-load-item delay-3">Grace in Every Stitch</span>

                <!-- Description Paragraph -->
                <p class="collection-desc hero-load-item delay-4">
                    {{ $activeCategory && $activeCategory->description ? $activeCategory->description : 'Explore our handpicked collection of churidar ensembles, where tradition meets contemporary elegance. Perfect for festive occasions, weddings and every special moment.' }}
                </p>

                <!-- Gold Ornate Divider Line (— ❖ —) -->
                <div class="collection-ornate-divider hero-load-item delay-4" aria-hidden="true">
                    <span class="line"></span>
                    <span class="diamond"><i class="bi bi-diamond-fill"></i></span>
                    <span class="line"></span>
                </div>

                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb" class="hero-load-item delay-5">
                    <ol class="collection-breadcrumbs">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="crumb-sep">›</li>
                        <li><a href="{{ route('collections') }}">Collections</a></li>
                        @if($activeCategory)
                            <li class="crumb-sep">›</li>
                            <li class="active">{{ $activeCategory->name }}</li>
                        @else
                            <li class="crumb-sep">›</li>
                            <li class="active">All Ensembles</li>
                        @endif
                    </ol>
                </nav>

            </div>

            <!-- Floating Callout on Right -->
            <div class="collection-hero-callout d-none d-lg-block hero-load-scale delay-4">
                <i class="bi bi-flower1 callout-lotus-icon"></i>
                <div class="callout-script-text">
                    Timeless<br>
                    Style<br>
                    Forever &#9825;
                </div>
            </div>

        </div>
    </section>

    <!-- ===================== MAIN COLLECTION CONTENT AREA ===================== -->
    <main class="section-bg-white py-5" id="mainCollectionArea">
        <div class="container">

            <!-- 1. CATEGORY FILTER PILLS -->
            <div class="category-filter-pills-wrap reveal" id="categoryPillsRow" aria-label="Quick Category Filter">
                <a href="{{ route('collections') }}" class="cat-pill-btn text-decoration-none {{ !request('category') ? 'active' : '' }}">
                    <span>All Collections</span>
                    <span class="pill-count" id="countAll">{{ \App\Models\Product::published()->count() }}</span>
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('collections', array_merge(request()->except(['category', 'page']), ['category' => $category->slug])) }}" 
                       class="cat-pill-btn text-decoration-none {{ request('category') == $category->slug ? 'active' : '' }}">
                        <span>{{ $category->name }}</span>
                        <span class="pill-count">{{ $category->products_count }}</span>
                    </a>
                @endforeach
            </div>

            <!-- 2. TWO-COLUMN LAYOUT: SIDEBAR FILTERS (Left) + PRODUCT GRID (Right) -->
            <div class="row g-4 g-xl-5">

                <!-- ═════════ LEFT SIDEBAR: FILTERS ═════════ -->
                <aside class="col-12 col-lg-3 pe-xl-4 reveal" aria-label="Product Filters">

                    <!-- Mobile Filter Trigger Button -->
                    <div class="d-lg-none mb-3">
                        <button
                            class="btn btn-outline-dark w-100 py-2 d-flex align-items-center justify-content-between rounded-pill px-4"
                            type="button" data-bs-toggle="collapse" data-bs-target="#sidebarFilterCollapse"
                            aria-expanded="false" aria-controls="sidebarFilterCollapse">
                            <span><i class="bi bi-funnel me-2"></i> Refine Collection Filters</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </div>

                    <div class="collapse d-lg-block" id="sidebarFilterCollapse">
                        <form action="{{ route('collections') }}" method="GET" id="filterForm">
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" id="hiddenSortInput" value="{{ request('sort') }}">
                            @endif

                            <div class="filters-sidebar-card">

                                <!-- Header: FILTERS + Clear All -->
                                <div class="filters-header">
                                    <h3 class="filters-title">FILTERS</h3>
                                    <a href="{{ route('collections') }}" class="btn-clear-filters text-decoration-none">Clear All</a>
                                </div>

                                <!-- 1. Category Filter Group -->
                                <div class="filter-group-block">
                                    <div class="filter-group-title">
                                        <span>Category</span>
                                    </div>
                                    @foreach($categories as $cat)
                                        <label class="custom-filter-checkbox">
                                            <span class="filter-item-name">
                                                <input type="radio" name="category" value="{{ $cat->slug }}"
                                                    {{ request('category') == $cat->slug ? 'checked' : '' }}
                                                    onchange="document.getElementById('filterForm').submit();">
                                                &nbsp;&nbsp; {{ $cat->name }}
                                            </span>
                                            <span class="filter-item-count"> ({{ $cat->products_count }})</span>
                                        </label>
                                    @endforeach
                                </div>

                                <!-- 2. Price Range Filter Group -->
                                <div class="filter-group-block">
                                    <div class="filter-group-title">
                                        <span>Price Range</span>
                                    </div>
                                    <label class="custom-filter-checkbox">
                                        <span class="filter-item-name">
                                            <input type="radio" name="price_range" value="under2000"
                                                {{ request('max_price') == 2000 && !request('min_price') ? 'checked' : '' }}
                                                onchange="setPriceFilter(0, 2000)">
                                            &nbsp;&nbsp; Under ₹2,000
                                        </span>
                                    </label>
                                    <label class="custom-filter-checkbox">
                                        <span class="filter-item-name">
                                            <input type="radio" name="price_range" value="2000-4000"
                                                {{ request('min_price') == 2000 && request('max_price') == 4000 ? 'checked' : '' }}
                                                onchange="setPriceFilter(2000, 4000)">
                                           &nbsp;&nbsp;  ₹2,000 – ₹4,000
                                        </span>
                                    </label>
                                    <label class="custom-filter-checkbox">
                                        <span class="filter-item-name">
                                            <input type="radio" name="price_range" value="4000-6000"
                                                {{ request('min_price') == 4000 && request('max_price') == 6000 ? 'checked' : '' }}
                                                onchange="setPriceFilter(4000, 6000)">
                                            &nbsp;&nbsp; ₹4,000 – ₹6,000
                                        </span>
                                    </label>
                                    <label class="custom-filter-checkbox">
                                        <span class="filter-item-name">
                                            <input type="radio" name="price_range" value="above6000"
                                                {{ request('min_price') == 6000 && !request('max_price') ? 'checked' : '' }}
                                                onchange="setPriceFilter(6000, '')">
                                           &nbsp;&nbsp; Above ₹6,000
                                        </span>
                                    </label>
                                    <input type="hidden" name="min_price" id="minPriceInput" value="{{ request('min_price') }}">
                                    <input type="hidden" name="max_price" id="maxPriceInput" value="{{ request('max_price') }}">
                                </div>

                                <!-- 3. Fabric Filter Group -->
                                @if($fabrics->count() > 0)
                                <div class="filter-group-block">
                                    <div class="filter-group-title">
                                        <span>Fabric</span>
                                    </div>
                                    @foreach($fabrics as $fabric)
                                        <label class="custom-filter-checkbox">
                                            <span class="filter-item-name">
                                                <input type="radio" name="fabric" value="{{ $fabric }}"
                                                    {{ request('fabric') == $fabric ? 'checked' : '' }}
                                                    onchange="document.getElementById('filterForm').submit();">
                                               &nbsp;&nbsp; {{ $fabric }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                @endif

                                <!-- 4. Color Filter Group -->
                                @if($colors->count() > 0)
                                <div class="filter-group-block">
                                    <div class="filter-group-title">
                                        <span>Color</span>
                                    </div>
                                    @php
                                        $colorMap = [
                                            'purple' => '#3b005a',
                                            'pink' => '#d43f8d',
                                            'green' => '#1e5e3a',
                                            'blue' => '#1c4e80',
                                            'yellow' => '#e5a93b',
                                            'mustard' => '#e5a93b',
                                            'beige' => '#d8c2a7',
                                            'gold' => '#c5a059',
                                            'red' => '#9e1b32',
                                            'black' => '#1a1a1a',
                                            'maroon' => '#800020',
                                            'teal' => '#005f73'
                                        ];
                                    @endphp
                                    @foreach($colors as $color)
                                        @php
                                            $lowerColor = strtolower($color);
                                            $hex = '#c5a059';
                                            foreach($colorMap as $k => $c) {
                                                if(str_contains($lowerColor, $k)) { $hex = $c; break; }
                                            }
                                        @endphp
                                        <div class="color-filter-row {{ request('color') == $color ? 'active' : '' }}" 
                                             onclick="applyColorFilter('{{ $color }}')">
                                            <span class="filter-item-name">
                                                <span class="color-swatch-disc" style="background-color: {{ $hex }};"></span>
                                                {{ $color }}
                                            </span>
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="color" id="colorFilterInput" value="{{ request('color') }}">
                                </div>
                                @endif

                                <!-- 5. Size Filter Group -->
                                <div class="filter-group-block">
                                    <div class="filter-group-title">
                                        <span>Size</span>
                                    </div>
                                    <div class="size-filter-chips">
                                        @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $sizeVal)
                                            <button type="button" class="size-chip-btn {{ request('size') == $sizeVal ? 'active' : '' }}" 
                                                onclick="applySizeFilter('{{ $sizeVal }}')">
                                                {{ $sizeVal }}
                                            </button>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="size" id="sizeFilterInput" value="{{ request('size') }}">
                                </div>

                                <!-- 6. Occasion Filter Group -->
                                @if($occasions->count() > 0)
                                <div class="filter-group-block">
                                    <div class="filter-group-title">
                                        <span>Occasion</span>
                                    </div>
                                    @foreach($occasions as $occ)
                                        <label class="custom-filter-checkbox">
                                            <span class="filter-item-name">
                                                <input type="radio" name="occasion" value="{{ $occ }}"
                                                    {{ request('occasion') == $occ ? 'checked' : '' }}
                                                    onchange="document.getElementById('filterForm').submit();">
                                              &nbsp;&nbsp;  {{ $occ }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                @endif

                            </div>
                        </form>

                        <!-- Sidebar Promo Mini Card -->
                        <div class="sidebar-promo-banner text-center">
                            <div class="sidebar-promo-img-wrap">
                                <img src="{{ asset('assets/img/card_purple.jpg') }}" alt="Model in purple churidar set" loading="lazy">
                            </div>
                            <span class="promo-tag-badge">FESTIVE OFFER</span>
                            <h4 class="promo-card-heading">FLAT 20% OFF</h4>
                            <p class="promo-card-subtext">On Selected Churidar Ensembles</p>
                            <a href="{{ route('collections', ['availability' => 'on_sale']) }}" class="btn-promo-shop">
                                <span>Shop Now</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </aside>

                <!-- ═════════ RIGHT COLUMN: PRODUCTS GRID ═════════ -->
                <section class="col-12 col-lg-9 reveal" aria-label="Products Grid">

                    <!-- Top Bar: Results Count + Sort Dropdown + Grid Toggle -->
                    <div class="collection-control-bar d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="results-count-text">
                            Showing <span id="displayedCount">{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</span> of <span id="totalProductsCount">{{ $products->total() }}</span> products
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <!-- Sort Dropdown -->
                            <!-- <div class="d-flex align-items-center gap-2">
                                <label for="collectionSort" class="small text-muted d-none d-sm-inline">Sort by:</label>
                                <select id="collectionSort" class="collection-sort-select" onchange="handleSortSelect(this.value)">
                                    <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Customer Rating</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                                </select>
                            </div> -->

                            <!-- Grid Mode Toggles (3-col vs 4-col) -->
                            <div class="d-none d-xl-flex align-items-center gap-1">
                                <button type="button" class="grid-view-btn active" id="grid3Btn" onclick="setGridCols(3)"
                                    title="3 Columns Grid">
                                    <i class="bi bi-grid-3x3-gap-fill"></i>
                                </button>
                                <button type="button" class="grid-view-btn" id="grid4Btn"
                                    onclick="setGridCols(4)" title="4 Columns Grid">
                                    <i class="bi bi-grid-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid Container -->
                    <div class="row g-3 g-xl-4" id="productsGridContainer">
                        @forelse($products as $product)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 product-grid-item" data-grid-col="3">
                                <article class="collection-product-card" data-id="{{ $product->id }}">
                                    <!-- Image Wrapper -->
                                    <div class="c-card-img-wrap">
                                        @if($product->is_best_seller)
                                            <span class="badge-card-pill badge-bestseller">Best Seller</span>
                                        @elseif($product->is_new_arrival)
                                            <span class="badge-card-pill badge-new">New Arrival</span>
                                        @elseif($product->discount > 0)
                                            <span class="badge-card-pill badge-discount">{{ (int)$product->discount }}% OFF</span>
                                        @endif

                                        <button type="button" class="btn-wishlist"
                                            onclick="toggleWishlist(event, this, '{{ addslashes($product->name) }}')"
                                            aria-label="Add to Wishlist">
                                            <i class="bi bi-heart"></i>
                                        </button>

                                        <a href="{{ route('product.show', $product->slug) }}" class="d-block overflow-hidden">
                                            @php
                                                $mainImg = $product->main_image ? (str_starts_with($product->main_image, 'http') || str_starts_with($product->main_image, 'assets/') ? asset($product->main_image) : asset('storage/' . $product->main_image)) : asset('assets/img/card_pink.jpg');
                                            @endphp
                                            <img src="{{ $mainImg }}" alt="{{ $product->name }}" loading="lazy">
                                        </a>

                                        <!-- Quick View Action Button -->
                                        <button type="button" class="card-quick-add" 
                                            onclick="openQuickViewModal('{{ addslashes($product->name) }}', '₹ {{ number_format($product->price) }}', '₹ {{ number_format($product->mrp ?? $product->price * 1.25) }}', '{{ $mainImg }}', '{{ (int)$product->discount }}%', '{{ route('product.show', $product->slug) }}', '{{ addslashes($product->category->name ?? 'Handpicked Collection') }}', '{{ addslashes($product->fabric ?? 'Pure Handloom Silk') }}')">
                                            <i class="bi bi-eye"></i> Quick View
                                        </button>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="c-card-body">
                                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-reset">
                                            <h4 class="c-card-title" title="{{ $product->name }}">{{ $product->name }}</h4>
                                        </a>

                                        <div class="c-price-row">
                                            <span class="c-curr-price">₹ {{ number_format($product->price) }}</span>
                                            @if($product->mrp && $product->mrp > $product->price)
                                                <span class="c-old-price">₹ {{ number_format($product->mrp) }}</span>
                                                <span class="c-discount-badge">{{ (int)$product->discount }}% OFF</span>
                                            @endif
                                        </div>

                                        <div class="c-card-rating">
                                            <div class="stars-gold">
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
                                            <span class="c-rating-count">({{ $product->review_count ?? 24 }})</span>
                                        </div>

                                        <div class="c-swatches-row">
                                            <span class="c-swatch-dot active" style="background-color: #d43f8d;" onclick="switchCardColor(this)"></span>
                                            <span class="c-swatch-dot" style="background-color: #1e5e3a;" onclick="switchCardColor(this)"></span>
                                            <span class="c-swatch-dot" style="background-color: #1c4e80;" onclick="switchCardColor(this)"></span>
                                        </div>

                                        <div class="d-flex gap-2 mt-2">
                                            <a href="{{ route('product.show', $product->slug) }}" class="btn-card-add-cart text-decoration-none flex-grow-1 text-center py-2">
                                                <i class="bi bi-eye"></i> Details
                                            </a>
                                            @php
                                                $waProductText = urlencode("Hi Saras Boutique, I visited your website and would like to enquire about: {$product->name} (Price: ₹" . number_format($product->price) . "). Is this available?");
                                            @endphp
                                            <a href="https://wa.me/919442634491?text={{ $waProductText }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success rounded-pill px-3 d-inline-flex align-items-center justify-content-center" style="border-color: #25d366; color: #25d366;" title="Enquire on WhatsApp">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="py-4">
                                    <i class="bi bi-search text-warning fs-1 mb-3 d-block"></i>
                                    <h4 class="font-serif text-dark mb-2">No ensembles match your filters</h4>
                                    <p class="text-muted small mb-4">Try clearing some of your selected filters or search terms to discover more styles.</p>
                                    <a href="{{ route('collections') }}" class="btn btn-dark rounded-pill px-4 py-2 text-decoration-none">Reset All Filters</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($products->hasPages())
                        <div class="d-flex justify-content-center mt-5">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    @endif

                </section>

            </div>

            <!-- ── ENSEMBLE BANNER SECTION (Full Width Below Filters & Products) ── -->
            <section class="ensemble-banner-wrapper">
                <div class="ensemble-card reveal-scale">

                    <!-- Faint Gold Floral Mandala Watermark (Bottom Middle) -->
                    <svg class="mandala-watermark-bottom" viewBox="0 0 200 200" fill="none"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="100" cy="100" r="90" stroke="#D4AF37" stroke-width="1.2" stroke-dasharray="5 3" />
                        <circle cx="100" cy="100" r="64" stroke="#C9A045" stroke-width="0.9" />
                        <path
                            d="M100 10 C120 50 150 50 190 100 C150 150 120 150 100 190 C80 150 50 150 10 100 C50 50 80 50 100 10 Z"
                            stroke="#D4AF37" stroke-width="0.9" />
                        <circle cx="100" cy="100" r="28" stroke="#D4AF37" stroke-width="1" />
                        <circle cx="100" cy="100" r="7" fill="#C9A045" opacity="0.4" />
                    </svg>

                    <!-- Faint Gold Floral Mandala Watermark (Right Border) -->
                    <svg class="mandala-watermark-right" viewBox="0 0 300 300" fill="none"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="150" cy="150" r="140" stroke="#D4AF37" stroke-width="1.3" stroke-dasharray="6 4" />
                        <circle cx="150" cy="150" r="105" stroke="#C9A045" stroke-width="1" />
                        <circle cx="150" cy="150" r="72" stroke="#D4AF37" stroke-width="1" />
                        <path
                            d="M150 10 C180 65 235 65 290 150 C235 235 180 235 150 290 C120 235 65 235 10 150 C65 65 120 65 150 10 Z"
                            stroke="#D4AF37" stroke-width="1.2" />
                        <circle cx="150" cy="150" r="32" stroke="#D4AF37" stroke-width="1.2" />
                        <circle cx="150" cy="150" r="10" fill="#C9A045" opacity="0.45" />
                    </svg>

                    <!-- Foreground Row -->
                    <div class="row align-items-center g-4 g-lg-5 banner-inner-content">

                        <!-- ═════════ LEFT COLUMN: Headline & CTA ═════════ -->
                        <div class="col-12 col-lg-5 col-xl-5">

                            <!-- Purple Fine-Line Lotus Motif with Gold Droplet Accent -->
                            <div class="lotus-mark-wrap">
                                <svg class="lotus-svg" viewBox="0 0 32 32" aria-hidden="true">
                                    <path d="M16 4C17.8 9.5 17.8 15.5 16 22.5C14.2 15.5 14.2 9.5 16 4Z" />
                                    <path d="M16 10C12.2 10 8 13.5 7.2 18.2C9.8 19.5 13 20.2 16 21" />
                                    <path d="M16 10C19.8 10 24 13.5 24.8 18.2C22.2 19.5 19 20.2 16 21" />
                                    <path d="M5.5 22C10 25.5 22 25.5 26.5 22" />
                                </svg>
                                <div class="lotus-stem-dot"></div>
                            </div>

                            <!-- Dual Serif Headline -->
                            <div>
                                <span class="headline-script-italic">Discover Your</span>
                                <h2 class="headline-bold-serif">Perfect Ensemble</h2>
                            </div>

                            <!-- Narrative Subtext -->
                            <p class="narrative-subtext">
                                Contemporary ethnic elegance and timeless classic styles handpicked for your special celebrations. Visit our boutique in Shanmugapuram, Puducherry or order with direct WhatsApp assistance.
                            </p>

                            <!-- Deep Royal Purple Pill Button -->
                            <div class="d-flex flex-wrap gap-2">
                                <a href="#productsGridContainer" class="btn-explore-pill text-decoration-none">
                                    <span>Explore Collection</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Saras%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." target="_blank" rel="noopener noreferrer" class="btn btn-outline-success rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 text-decoration-none">
                                    <i class="bi bi-whatsapp"></i>
                                    <span>WhatsApp Enquiry</span>
                                </a>
                            </div>

                        </div>

                        <!-- ═════════ RIGHT COLUMN: 4 Overlapping Tilted Cards ═════════ -->
                        <div class="col-12 col-lg-7 col-xl-7">
                            <div class="tilted-gallery-stage">

                                <!-- Card 1: Royal Purple Lehenga -->
                                <div class="fashion-tilt-card card-tilt-1" data-slot="1" title="Royal Purple Lehenga">
                                    <img id="ensembleImg1" src="{{ asset('assets/img/card_purple.jpg') }}"
                                        alt="Royal Purple Embroidered Lehenga Ensemble" loading="lazy" />
                                </div>

                                <!-- Card 2: Mustard / Golden Yellow Kurta Set -->
                                <div class="fashion-tilt-card card-tilt-2" data-slot="2" title="Mustard Gold Kurta Suit">
                                    <img id="ensembleImg2" src="{{ asset('assets/img/card_mustard.jpg') }}"
                                        alt="Mustard Gold Indian Festive Attire" loading="lazy" />
                                </div>

                                <!-- Card 3: Peacock Teal Blue Embroidered Suit -->
                                <div class="fashion-tilt-card card-tilt-3" data-slot="3" title="Peacock Teal Embroidered Ensemble">
                                    <img id="ensembleImg3" src="{{ asset('assets/img/card_teal.jpg') }}"
                                        alt="Peacock Teal Blue Embroidered Indian Dress" loading="lazy" />
                                </div>

                                <!-- Card 4: Blush Pastel Pink Embroidered Salwar -->
                                <div class="fashion-tilt-card card-tilt-4" data-slot="4" title="Blush Pastel Pink Lehenga">
                                    <img id="ensembleImg4" src="{{ asset('assets/img/card_pink.jpg') }}"
                                        alt="Blush Pastel Pink Embroidered Salwar Ensemble" loading="lazy" />
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- ── ATTRACTIVE LUXURY QUICK VIEW MODAL ── -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content qv-luxury-dialog position-relative">
                
                <!-- Close Button with Smooth Rotate Glow -->
                <button type="button" class="qv-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-body p-4 p-md-5">
                    <div class="row g-4 g-lg-5 align-items-center">
                        
                        <!-- Left: Product Image Stage -->
                        <div class="col-md-5">
                            <div class="qv-image-stage position-relative">
                                <span class="qv-artisan-badge">
                                    <i class="bi bi-gem text-gold me-1"></i> Saras Exclusive
                                </span>
                                <img id="qvImage" src="" alt="Quick View Product" class="qv-img">
                            </div>
                        </div>

                        <!-- Right: Luxury Product Information -->
                        <div class="col-md-7">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                <span class="qv-category-pill" id="qvCategory">Handpicked Silk Collection</span>
                                <span class="qv-discount-pill" id="qvDiscount">SAVE 22%</span>
                            </div>

                            <h3 class="qv-product-title" id="qvTitle">Peacock Blue Handloom Banarasi Silk Churidar Set</h3>

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="qv-stars text-gold">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <span class="qv-rating-text">4.9 (24+ verified reviews)</span>
                                <span class="qv-dot-sep">•</span>
                                <span class="qv-stock-badge"><i class="bi bi-check2-circle me-1"></i>In Stock</span>
                            </div>

                            <!-- Pricing Block -->
                            <div class="qv-price-card mb-3">
                                <div class="d-flex align-items-baseline gap-3">
                                    <span class="qv-curr-price" id="qvPrice">₹ 22,499</span>
                                    <span class="qv-old-price" id="qvOldPrice">₹ 28,999</span>
                                    <span class="qv-tax-note">Inclusive of all taxes</span>
                                </div>
                            </div>

                           

                            <!-- Highlights Mini-Cards -->
                            <div class="qv-highlights-grid mb-3">
                                <div class="qv-highlight-chip">
                                    <i class="bi bi-patch-check-fill text-gold"></i>
                                    <div>
                                        <span class="qv-chip-label">Fabric</span>
                                        <strong class="qv-chip-val" id="qvFabric">Banarasi Silk</strong>
                                    </div>
                                </div>
                                <div class="qv-highlight-chip">
                                    <i class="bi bi-geo-alt-fill text-gold"></i>
                                    <div>
                                        <span class="qv-chip-label">Boutique Trial</span>
                                        <strong class="qv-chip-val">Shanmugapuram Store</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Size Selector Preview -->
                            <div class="qv-size-wrap mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="qv-size-label">Select Size</span>
                                    <span class="qv-size-hint"><i class="bi bi-rulers me-1"></i>Standard Fit</span>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="qv-size-btn active" onclick="selectQvSize(this)">S</button>
                                    <button type="button" class="qv-size-btn" onclick="selectQvSize(this)">M</button>
                                    <button type="button" class="qv-size-btn" onclick="selectQvSize(this)">L</button>
                                    <button type="button" class="qv-size-btn" onclick="selectQvSize(this)">XL</button>
                                    <button type="button" class="qv-size-btn" onclick="selectQvSize(this)">XXL</button>
                                </div>
                            </div>

                            <!-- Action CTAs -->
                            <div class="d-flex flex-column flex-sm-row gap-2 mb-3">
                                <a href="#" id="qvDetailLink" class="qv-btn-primary flex-grow-1 text-decoration-none">
                                    <span>View Full Details</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="#" id="qvWaLink" target="_blank" rel="noopener noreferrer" class="qv-btn-whatsapp text-decoration-none">
                                    <i class="bi bi-whatsapp"></i>
                                    <span>WhatsApp Order</span>
                                </a>
                            </div>

                            <div class="qv-trust-footer">
                                <i class="bi bi-shield-check text-gold me-1"></i> Try at Shanmugapuram Store &nbsp;•&nbsp; <i class="bi bi-chat-heart text-gold me-1"></i> Personalized Sizing Assistance
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function setPriceFilter(min, max) {
            document.getElementById('minPriceInput').value = min;
            document.getElementById('maxPriceInput').value = max;
            document.getElementById('filterForm').submit();
        }

        function applyColorFilter(color) {
            const current = document.getElementById('colorFilterInput').value;
            document.getElementById('colorFilterInput').value = (current === color) ? '' : color;
            document.getElementById('filterForm').submit();
        }

        function applySizeFilter(size) {
            const current = document.getElementById('sizeFilterInput').value;
            document.getElementById('sizeFilterInput').value = (current === size) ? '' : size;
            document.getElementById('filterForm').submit();
        }

        function handleSortSelect(sortVal) {
            document.getElementById('hiddenSortInput').value = sortVal;
            document.getElementById('filterForm').submit();
        }

        function setGridCols(cols) {
            const items = document.querySelectorAll('.product-grid-item');
            const btn4 = document.getElementById('grid4Btn');
            const btn3 = document.getElementById('grid3Btn');
            if (cols === 4) {
                items.forEach(el => {
                    el.className = 'col-12 col-sm-6 col-md-6 col-xl-3 product-grid-item';
                });
                btn4?.classList.add('active');
                btn3?.classList.remove('active');
            } else {
                items.forEach(el => {
                    el.className = 'col-12 col-sm-6 col-md-6 col-lg-4 product-grid-item';
                });
                btn3?.classList.add('active');
                btn4?.classList.remove('active');
            }
        }

        function switchCardColor(dot) {
            const parent = dot.closest('.c-swatches-row');
            if (parent) {
                parent.querySelectorAll('.c-swatch-dot').forEach(d => d.classList.remove('active'));
                dot.classList.add('active');
            }
        }

        function toggleWishlist(e, btn, title) {
            e.preventDefault();
            e.stopPropagation();
            btn.classList.toggle('active');
            const isSaved = btn.classList.contains('active');
            btn.innerHTML = isSaved ? '<i class="bi bi-heart-fill text-danger"></i>' : '<i class="bi bi-heart"></i>';
            showToast(isSaved ? `Added "${title}" to your luxury wishlist ♡` : `Removed "${title}" from wishlist`);
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

        function openQuickViewModal(title, price, oldPrice, imgUrl, discount, detailUrl, category = 'Handpicked Ensemble', fabric = 'Pure Handloom Silk') {
            document.getElementById('qvTitle').textContent = title;
            document.getElementById('qvPrice').textContent = price;
            document.getElementById('qvOldPrice').textContent = oldPrice;
            document.getElementById('qvImage').src = imgUrl;
            document.getElementById('qvDiscount').textContent = `SAVE ${discount}`;
            if (document.getElementById('qvCategory')) {
                document.getElementById('qvCategory').textContent = category;
            }
            if (document.getElementById('qvFabric')) {
                document.getElementById('qvFabric').textContent = fabric;
            }
            document.getElementById('qvDetailLink').href = detailUrl;
            const waMsg = encodeURIComponent(`Hi Saras Boutique, I am viewing "${title}" (${price}) on your website and would like to enquire about its availability and sizing.`);
            const waEl = document.getElementById('qvWaLink');
            if (waEl) {
                waEl.href = `https://wa.me/919442634491?text=${waMsg}`;
            }
            const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
            modal.show();
        }

        function selectQvSize(btn) {
            document.querySelectorAll('.qv-size-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        }
    </script>
@endpush
