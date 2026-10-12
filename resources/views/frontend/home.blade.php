@extends('layouts.app')

@section('title', "Sara's Boutique | Luxury Indian Ethnic Fashion & Designer Churidar Sets")
@section('meta_description', "Discover handcrafted luxury Indian ethnic fashion at Sara's Boutique. Shop exclusive Churidar Sets, royal Anarkalis, designer Salwar Suits, and Silk Dupattas woven in pure mulberry silk with zardozi embroidery.")

@section('content')

    <!-- ===================== HERO BANNER SECTION ===================== -->
    <section class="hero-banner-section" id="home">
        <div class="container h-100">
            <div class="hero-banner-wrapper">

                <!-- Left Content Column -->
                <div class="hero-banner-content">
                    <div class="hero-tag-pill hero-load-item">
                        <i class="bi bi-stars"></i> Festive Edit 2026 • Exclusive Designs
                    </div>

                    <h1 class="hero-main-title hero-load-item delay-1">
                        Timeless Tradition,<br>
                        <span class="title-italic-gold">Modern Elegance</span>
                    </h1>

                    <p class="hero-desc hero-load-item delay-2">
                        Discover handcrafted Churidar sets, royal Anarkalis, and bespoke ethnic silhouettes woven in
                        pure mulberry silk with intricate gold zardozi embroidery.
                    </p>

                    <!-- Quick Highlight Badges -->
                    <div class="hero-meta-strip hero-load-item delay-2">
                        <span class="meta-item"><i class="bi bi-patch-check-fill text-gold"></i> Silk Mark
                            Certified</span>
                        <span class="meta-dot">•</span>
                        <span class="meta-item"><i class="bi bi-scissors text-gold"></i> Custom Tailored Fit</span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex align-items-center gap-3 flex-wrap hero-btn-group hero-load-item delay-3">
                        <a href="{{ route('collections') }}" class="hero-shop-btn">
                            Shop Now
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('collections') }}" class="hero-outline-btn">
                            <i class="bi bi-gem me-2"></i> Explore Collection
                        </a>
                    </div>

                    <!-- Embedded Feature Strip -->
                    <div class="hero-features-bar hero-load-item delay-4" aria-label="Store Features">
                        <div class="hero-features-group">
                            <!-- Premium Fabrics -->
                            <div class="feature-item">
                                <div class="feature-icon-svg">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                        <path d="M2 17l10 5 10-5"></path>
                                        <path d="M2 12l10 5 10-5"></path>
                                    </svg>
                                </div>
                                <div class="feature-text">
                                    <span class="feature-title">Pure Fabrics</span>
                                    <span class="feature-subtitle">Silk & Comfort</span>
                                </div>
                            </div>

                            <div class="feature-divider"></div>

                            <!-- Fast Delivery -->
                            <div class="feature-item">
                                <div class="feature-icon-svg">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="1" y="4" width="14" height="11" rx="1"></rect>
                                        <path d="M15 8h4l3 3v4h-7V8z"></path>
                                        <circle cx="5.5" cy="18.5" r="2"></circle>
                                        <circle cx="18.5" cy="18.5" r="2"></circle>
                                    </svg>
                                </div>
                                <div class="feature-text">
                                    <span class="feature-title">Fast Delivery</span>
                                    <span class="feature-subtitle">Across India</span>
                                </div>
                            </div>

                            <div class="feature-divider"></div>

                            <!-- Easy Returns -->
                            <div class="feature-item">
                                <div class="feature-icon-svg">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                        <path d="M3 3v5h5"></path>
                                    </svg>
                                </div>
                                <div class="feature-text">
                                    <span class="feature-title">Easy Exchange</span>
                                    <span class="feature-subtitle">7-Day Guarantee</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Right Overlay Slider Controls -->
                <div class="hero-slider-nav">
                    <span class="slider-counter" id="bannerCounter">01 / 03</span>
                    <button class="nav-arrow" id="bannerPrevBtn" aria-label="Previous Highlight">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                    </button>
                    <button class="nav-arrow" id="bannerNextBtn" aria-label="Next Highlight">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 1. SHOP BY CATEGORY (White Background) ===================== -->
    <section class="category-section section-bg-white luxury-section-pad" id="categories" aria-label="Shop by Category">
        <div class="container">
            <div class="category-row-wrapper d-flex flex-column flex-xl-row align-items-xl-center justify-content-between">

                <!-- Category Title Column -->
                <div class="category-title-box me-xl-4 pe-xl-3 mb-3 mb-xl-0 flex-shrink-0 reveal-left">
                    <span class="category-eyebrow-mini">Curated Silhouettes</span>
                    <h2 class="serif-title mb-0 fs-1">
                        Shop by<br>Category
                    </h2>
                    <div class="title-gold-bar"></div>
                </div>

                <!-- Category Circular Items List -->
                <div class="category-scroll-container d-flex align-items-center stagger-group">
                    @forelse($categories as $category)
                        <a href="{{ route('collections', ['category' => $category->slug]) }}" class="category-item stagger-item {{ $loop->first ? 'active' : '' }}" data-category="{{ $category->slug }}">
                            <div class="category-avatar-wrapper">
                                <img src="{{ asset($category->image ?? 'assets/img/card_pink.jpg') }}" alt="{{ $category->name }}" class="category-avatar-img">
                            </div>
                            <span class="category-pill">{{ $category->name }}</span>
                        </a>
                    @empty
                        <a href="{{ route('collections') }}" class="category-item active">
                            <div class="category-avatar-wrapper">
                                <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Churidar Sets" class="category-avatar-img">
                            </div>
                            <span class="category-pill">Churidar Sets</span>
                        </a>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 2. NEW ARRIVALS SWIPER (Ivory Background #fbf6f0) ===================== -->
    <section class="trending-section section-bg-ivory luxury-section-pad" id="newarrivals" aria-label="New Arrivals - Trending Churidar Sets">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Intro Column (Sticky / Heading / CTA) -->
                <div class="col-12 col-lg-3 trending-side-col pe-xl-4 reveal-left">
                    <div class="d-flex flex-column align-items-start">
                        <span class="trending-eyebrow">New Arrivals 2026</span>
                        <h3 class="trending-main mb-3">Churidar Sets</h3>
                        <p class="trending-subtitle mb-4">
                            Handcrafted pure silk ensembles with intricate royal embroidery.
                        </p>
                        <a href="{{ route('collections') }}" class="btn-view-all">
                            <span>View All</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <!-- Swiper Navigation Controls -->
                        <div class="d-flex align-items-center gap-2 mt-4 pt-2">
                            <button class="slider-arrow-btn swiper-btn-prev-custom" id="swiperPrev" aria-label="Previous slide">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button class="slider-arrow-btn swiper-btn-next-custom" id="swiperNext" aria-label="Next slide">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right Products Swiper Slider -->
                <div class="col-12 col-lg-9">
                    <div class="product-carousel-wrapper">
                        <div class="swiper products-swiper stagger-group" id="productsSwiper">
                            <div class="swiper-wrapper">
                                @forelse($newArrivals as $prod)
                                    <div class="swiper-slide">
                                        <article class="product-card stagger-item" data-product-id="{{ $prod->id }}">
                                            <div class="card-img-box">
                                                @if($prod->is_new_arrival)
                                                    <span class="badge-new">New</span>
                                                @endif
                                                <button class="btn-wishlist" aria-label="Add to wishlist" onclick="event.preventDefault(); showToast('Saved {{ addslashes($prod->name) }} to Wishlist ♡');">
                                                    <i class="bi bi-heart"></i>
                                                </button>
                                                <a href="{{ route('product.show', $prod->slug) }}" class="d-block w-100 h-100 overflow-hidden">
                                                    <img src="{{ $prod->main_image_url }}" alt="{{ $prod->name }}" loading="lazy">
                                                </a>
                                                <button class="card-quick-add" onclick="addToBag('{{ addslashes($prod->name) }}')">
                                                    <i class="bi bi-bag-plus"></i> Quick Add
                                                </button>
                                            </div>
                                            <div class="card-body-content">
                                                <a href="{{ route('product.show', $prod->slug) }}" class="text-decoration-none text-reset">
                                                    <h4 class="card-item-title" title="{{ $prod->name }}">{{ $prod->name }}</h4>
                                                </a>
                                                <div class="card-item-price">{{ $prod->formatted_price }}</div>
                                                <div class="card-rating-row">
                                                    <div class="stars-gold">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <span class="card-rating-count">({{ $prod->review_count ?? 24 }})</span>
                                                </div>
                                                <div class="swatches-row">
                                                    <span class="swatch-dot active" style="background-color: {{ $prod->color_code ?? '#c5a059' }}" title="{{ $prod->color ?? 'Royal' }}"></span>
                                                    <span class="swatch-dot" style="background-color: #274773" title="Midnight Blue"></span>
                                                    <span class="swatch-dot" style="background-color: #194635" title="Forest Green"></span>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <p class="text-white-50">No products available at this time.</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="swiper-pagination products-swiper-pagination"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 3. PROMOTIONAL OFFER BANNER (White Background Container) ===================== -->
    <section class="offer-banner-section section-bg-white luxury-section-pad py-4 py-lg-5" aria-label="Special Festival Offer">
        <div class="container">
            <div class="promo-banner-card reveal-scale">
                <div class="row g-0 align-items-center">

                    <!-- 1. LEFT COLUMN: Model Image -->
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="model-col-wrap image-reveal">
                            <img src="{{ asset('assets/img/offbanner.png') }}" alt="Model wearing purple Churidar set" class="model-image" loading="eager">
                            <div class="model-fade-overlay" aria-hidden="true"></div>
                        </div>
                    </div>

                    <!-- 2. CENTER COLUMN: Offer Headline, Subtitle & CTA -->
                    <div class="col-12 col-lg-5 col-xl-5">
                        <div class="offer-center-wrap ps-lg-3 reveal-right">
                            <span class="offer-eyebrow">Special Offer</span>

                            <h2 class="offer-main-title">
                                Flat <span class="offer-percent-highlight">25%</span> OFF
                            </h2>

                            <p class="offer-subtitle">
                                On Selected Pure Silk Churidar Sets with code <strong>FESTIVE25</strong>
                            </p>

                            <div>
                                <a href="{{ route('collections') }}" class="btn-shop-pill">
                                    <span>Shop Now</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- 3. RIGHT COLUMN: Vertical Gold Divider & Trust Badges -->
                    <div class="col-12 col-lg-3 col-xl-3">
                        <div class="features-col-wrap reveal-right delay-1">
                            <div class="features-divider-line" aria-hidden="true"></div>

                            <div class="features-vertical-list">
                                <div class="feature-badge-row">
                                    <div class="feature-circle-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="feature-badge-text">
                                        <span class="feature-text-title">Premium Quality</span>
                                        <span class="feature-text-desc">100% Handloom Silk</span>
                                    </div>
                                </div>

                                <div class="feature-badge-row">
                                    <div class="feature-circle-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="12 2 15 8.5 22 9 17 14 18.5 21 12 17.5 5.5 21 7 14 2 9 9 8.5 12 2"></polygon>
                                            <circle cx="12" cy="12" r="2.5"></circle>
                                        </svg>
                                    </div>
                                    <div class="feature-badge-text">
                                        <span class="feature-text-title">Latest Trend</span>
                                        <span class="feature-text-desc">Royal 2026 Designs</span>
                                    </div>
                                </div>

                                <div class="feature-badge-row">
                                    <div class="feature-circle-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                            <polyline points="9 12 11 14 15 10"></polyline>
                                        </svg>
                                    </div>
                                    <div class="feature-badge-text">
                                        <span class="feature-text-title">Secure Payment</span>
                                        <span class="feature-text-desc">100% Safe & Insured</span>
                                    </div>
                                </div>

                                <div class="feature-badge-row">
                                    <div class="feature-circle-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21.5 2v6h-6"></path>
                                            <path d="M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"></path>
                                            <polyline points="9 11 12 14 15 11"></polyline>
                                        </svg>
                                    </div>
                                    <div class="feature-badge-text">
                                        <span class="feature-text-title">Easy Returns</span>
                                        <span class="feature-text-desc">7-Day Guarantee</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 4. BEST SELLERS SWIPER (White Background) ===================== -->
    <section class="bestsellers-section section-bg-white luxury-section-pad" id="bestsellers" aria-label="Best Selling Churidar Ensembles">
        <div class="container">
            <div class="bestsellers-header-wrap reveal">
                <div class="section-header-luxury mb-0 text-start" style="text-align: left !important;">
                    <span class="section-eyebrow-gold">Curated Favorites</span>
                    <h2 class="section-title-luxury mb-2">Best Selling Churidar Ensembles</h2>
                    <p class="section-subtitle-luxury mb-0">
                        Cherished by our discerning patrons for festive galas, weddings, and grand celebrations.
                    </p>
                </div>
                <div class="bestsellers-nav-controls">
                    <button class="bestseller-nav-btn" id="bestsellerPrev" aria-label="Previous best sellers">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="bestseller-nav-btn" id="bestsellerNext" aria-label="Next best sellers">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="swiper bestsellers-swiper stagger-group" id="bestsellersSwiper">
                <div class="swiper-wrapper">
                    @forelse($bestSellers as $bProduct)
                        <div class="swiper-slide">
                            <article class="bestseller-card stagger-item">
                                <div class="bestseller-img-wrap">
                                    <span class="badge-discount-tag">BESTSELLER • {{ $bProduct->discount ?? 20 }}% OFF</span>
                                    <img src="{{ $bProduct->main_image_url }}" alt="{{ $bProduct->name }}" loading="lazy">
                                    <button class="bestseller-quick-view-btn"
                                        onclick="openQuickView('{{ addslashes($bProduct->name) }}', '{{ $bProduct->formatted_price }}', '{{ $bProduct->formatted_mrp }}', '{{ $bProduct->main_image_url }}', '{{ addslashes($bProduct->short_description) }}')">
                                        <i class="bi bi-eye me-1"></i> Quick View
                                    </button>
                                </div>
                                <div class="bestseller-content">
                                    <span class="bestseller-category-tag">{{ $bProduct->category->name ?? 'Silk Edit' }}</span>
                                    <a href="{{ route('product.show', $bProduct->slug) }}" class="text-decoration-none">
                                        <h3 class="bestseller-title">{{ $bProduct->name }}</h3>
                                    </a>
                                    <div class="bestseller-price-row">
                                        <span class="bestseller-curr-price">{{ $bProduct->formatted_price }}</span>
                                        @if($bProduct->mrp)
                                            <span class="bestseller-old-price">{{ $bProduct->formatted_mrp }}</span>
                                        @endif
                                    </div>
                                    <div class="card-rating-row mb-3">
                                        <div class="stars-gold">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span class="card-rating-count">({{ $bProduct->review_count ?? 45 }} reviews)</span>
                                    </div>
                                    <button class="btn-add-to-cart mt-auto" onclick="addToBag('{{ addslashes($bProduct->name) }}')">
                                        <i class="bi bi-bag-plus"></i> Add to Bag
                                    </button>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <p class="text-muted">No best sellers currently available.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination bestsellers-swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- ===================== 5. TRENDING OCCASION COLLECTIONS (Ivory Background #fbf6f0) ===================== -->
    <section class="collections-section section-bg-ivory luxury-section-pad" id="collections" aria-label="Trending Occasion Collections">
        <div class="container">
            <div class="section-header-luxury reveal">
                <span class="section-eyebrow-gold">Signature Edits 2026</span>
                <h2 class="section-title-luxury">Trending Occasion Collections</h2>
                <p class="section-subtitle-luxury">
                    Tailored for your most memorable moments, from grand weddings to chic boardroom soirees.
                </p>
            </div>

            <div class="collections-grid-luxury stagger-group stagger-left">
                <!-- 1. Wedding Wear (Large) -->
                <a href="{{ route('collections', ['occasion' => 'Wedding Guest']) }}" class="collection-card-item col-item-large stagger-item">
                    <img src="{{ asset('assets/img/card_purple.jpg') }}" alt="Wedding Wear Collection" class="collection-bg-img" loading="lazy">
                    <div class="collection-overlay-grad"></div>
                    <div class="collection-card-content">
                        <span class="collection-pill-tag">Bespoke Bridal &amp; Trousseau</span>
                        <h3 class="collection-card-title">Wedding Wear Edit</h3>
                        <span class="collection-link-arrow">Explore Edit <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>

                <!-- 2. Party Wear (Large) -->
                <a href="{{ route('collections', ['occasion' => 'Evening Soirée']) }}" class="collection-card-item col-item-large stagger-item">
                    <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Party Wear Collection" class="collection-bg-img" loading="lazy">
                    <div class="collection-overlay-grad"></div>
                    <div class="collection-card-content">
                        <span class="collection-pill-tag">Glamour &amp; Celebrations</span>
                        <h3 class="collection-card-title">Party Wear Edit</h3>
                        <span class="collection-link-arrow">Explore Edit <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>

                <!-- 3. Festive Wear (Small) -->
                <a href="{{ route('collections', ['occasion' => 'Festive Pooja']) }}" class="collection-card-item col-item-small stagger-item">
                    <img src="{{ asset('assets/img/card_mustard.jpg') }}" alt="Festive Wear Collection" class="collection-bg-img" loading="lazy">
                    <div class="collection-overlay-grad"></div>
                    <div class="collection-card-content">
                        <span class="collection-pill-tag">Diwali &amp; Pooja Specials</span>
                        <h3 class="collection-card-title">Festive Wear</h3>
                        <span class="collection-link-arrow">Explore Edit <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>

                <!-- 4. Casual Wear (Small) -->
                <a href="{{ route('collections', ['occasion' => 'Daily Luxury']) }}" class="collection-card-item col-item-small stagger-item">
                    <img src="{{ asset('assets/img/card_green.jpg') }}" alt="Casual Wear Collection" class="collection-bg-img" loading="lazy">
                    <div class="collection-overlay-grad"></div>
                    <div class="collection-card-content">
                        <span class="collection-pill-tag">Everyday Silk Comfort</span>
                        <h3 class="collection-card-title">Casual Wear</h3>
                        <span class="collection-link-arrow">Explore Edit <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>

                <!-- 5. Office Wear (Small) -->
                <a href="{{ route('collections', ['occasion' => 'Daily Luxury']) }}" class="collection-card-item col-item-small stagger-item">
                    <img src="{{ asset('assets/img/card_teal.jpg') }}" alt="Office Wear Collection" class="collection-bg-img" loading="lazy">
                    <div class="collection-overlay-grad"></div>
                    <div class="collection-card-content">
                        <span class="collection-pill-tag">Minimalist Elegance</span>
                        <h3 class="collection-card-title">Office Wear</h3>
                        <span class="collection-link-arrow">Explore Edit <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ===================== 6. SHOP BY ROYAL COLOR (White Background) ===================== -->
    <section class="shop-by-color-section section-bg-white luxury-section-pad" id="shopbycolor" aria-label="Shop by Color">
        <div class="container">
            <div class="section-header-luxury reveal">
                <span class="section-eyebrow-gold">Palette of Royalty</span>
                <h2 class="section-title-luxury">Shop by Royal Color</h2>
                <p class="section-subtitle-luxury">
                    Filter our exclusive designer ensembles by your preferred signature hue.
                </p>

                <div class="color-circles-bar stagger-group">
                    <a href="{{ route('collections', ['color' => 'Plum']) }}" class="color-swatch-btn stagger-item text-decoration-none">
                        <span class="color-disc" style="background-color: #3B005A;"></span>
                        <span class="color-swatch-label">Purple</span>
                    </a>
                    <a href="{{ route('collections', ['color' => 'Pink']) }}" class="color-swatch-btn stagger-item text-decoration-none">
                        <span class="color-disc" style="background-color: #D43F8D;"></span>
                        <span class="color-swatch-label">Pink</span>
                    </a>
                    <a href="{{ route('collections', ['color' => 'Green']) }}" class="color-swatch-btn stagger-item text-decoration-none">
                        <span class="color-disc" style="background-color: #1E5E3A;"></span>
                        <span class="color-swatch-label">Green</span>
                    </a>
                    <a href="{{ route('collections', ['color' => 'Mustard']) }}" class="color-swatch-btn stagger-item text-decoration-none">
                        <span class="color-disc" style="background-color: #E5A93B;"></span>
                        <span class="color-swatch-label">Yellow</span>
                    </a>
                    <a href="{{ route('collections', ['color' => 'Blue']) }}" class="color-swatch-btn stagger-item text-decoration-none">
                        <span class="color-disc" style="background-color: #1C4E80;"></span>
                        <span class="color-swatch-label">Blue</span>
                    </a>
                    <a href="{{ route('collections', ['color' => 'Maroon']) }}" class="color-swatch-btn stagger-item text-decoration-none">
                        <span class="color-disc" style="background-color: #6B1226;"></span>
                        <span class="color-swatch-label">Maroon</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 7. STYLE LOOKBOOK & FEATURES SHOWCASE ===================== -->
    <section class="lookbook-section-wrapper section-bg-ivory luxury-section-pad" id="lookbook" aria-label="Style Lookbook &amp; Features Showcase">
        <div class="container">
            <div class="lookbook-banner-card reveal-scale" aria-label="Style Lookbook">
                <div class="lookbook-inner-flex">

                    <!-- 1. LEFT TEXT BLOCK -->
                    <div class="lookbook-text-col reveal-left">
                        <h2 class="lookbook-title">
                            Style<br>Lookbook
                        </h2>
                        <p class="lookbook-subtitle">
                            Real women. Real styles.<br class="d-none d-sm-inline">
                            Get inspired by our latest churidar looks.
                        </p>
                        <a href="{{ route('collections') }}" class="btn-lookbook-pill">
                            <span>Explore Lookbook</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- 2. PHOTO GALLERY CLUSTER -->
                    <div class="lookbook-gallery-stage reveal-right">
                        <div class="polaroid-group-cluster">
                            <div class="polaroid-snap polaroid-one" title="Purple Churidar">
                                <div class="polaroid-img-box">
                                    <img src="{{ asset('assets/img/card_purple.jpg') }}" alt="Model sitting in purple churidar dress" loading="lazy">
                                </div>
                            </div>

                            <div class="polaroid-snap polaroid-two" title="Rose Pink Outfit">
                                <div class="polaroid-img-box">
                                    <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Model in pink embroidered traditional suit" loading="lazy">
                                </div>
                            </div>

                            <div class="pinned-note-sticker" aria-hidden="true">
                                <span>Traditional<br>Elegance &#9825;</span>
                            </div>

                            <div class="polaroid-snap polaroid-three" title="Navy Blue Festive Suit">
                                <div class="polaroid-img-box">
                                    <img src="{{ asset('assets/img/card_teal.jpg') }}" alt="Model in deep blue churidar ensemble" loading="lazy">
                                </div>
                            </div>
                        </div>

                        <div class="script-divider-line d-none d-md-block" aria-hidden="true"></div>

                        <div class="script-callout-block d-none d-md-flex" aria-hidden="true">
                            <div class="script-lines">
                                Your<br>
                                Style<br>
                                Our<br>
                                Inspiration
                            </div>
                            <div class="script-heart">&#9825;</div>
                        </div>

                        <div class="polaroid-snap polaroid-four-large" title="Featured Style Muse">
                            <div class="polaroid-img-box">
                                <img src="{{ asset('assets/img/offbanner.png') }}" alt="Portrait of model in purple churidar" loading="lazy">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- BOTTOM STRIP: Trust Features -->
            <div class="trust-features-strip stagger-group" aria-label="Store Guarantees">
                <div class="features-row-container">
                    <div class="feature-point stagger-item">
                        <div class="feature-icon-ring">
                            <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v20"></path>
                                <path d="M12 2a9 9 0 0 1 9 9c0 5-4 9-9 9"></path>
                                <path d="M12 2a9 9 0 0 0-9 9c0 5 4 9 9 9"></path>
                                <path d="M12 7l4 4-4 4-4-4 4-4z"></path>
                            </svg>
                        </div>
                        <div class="feature-text-block">
                            <span class="feature-heading">Premium Fabrics</span>
                            <span class="feature-subtext">Soft &amp; Breathable</span>
                        </div>
                    </div>

                    <div class="trust-vertical-divider" aria-hidden="true"></div>

                    <div class="feature-point stagger-item">
                        <div class="feature-icon-ring">
                            <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <polyline points="9 12 11 14 15 10"></polyline>
                            </svg>
                        </div>
                        <div class="feature-text-block">
                            <span class="feature-heading">Trusted Quality</span>
                            <span class="feature-subtext">100% Original</span>
                        </div>
                    </div>

                    <div class="trust-vertical-divider" aria-hidden="true"></div>

                    <div class="feature-point stagger-item">
                        <div class="feature-icon-ring">
                            <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 2v6h-6"></path>
                                <path d="M3 12a9 9 0 0 1 15.5-6.4L21 8"></path>
                                <path d="M3 22v-6h6"></path>
                                <path d="M21 12a9 9 0 0 1-15.5 6.4L3 16"></path>
                                <circle cx="12" cy="12" r="2.5"></circle>
                            </svg>
                        </div>
                        <div class="feature-text-block">
                            <span class="feature-heading">Easy Returns</span>
                            <span class="feature-subtext">Hassle Free</span>
                        </div>
                    </div>

                    <div class="trust-vertical-divider" aria-hidden="true"></div>

                    <div class="feature-point stagger-item">
                        <div class="feature-icon-ring">
                            <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                                <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                            </svg>
                        </div>
                        <div class="feature-text-block">
                            <span class="feature-heading">24/7 Support</span>
                            <span class="feature-subtext">We're Always Here</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 8. WHY CHOOSE SARA'S BOUTIQUE ===================== -->
    <section class="why-choose-section section-bg-white luxury-section-pad" id="whychoose" aria-label="Why Choose Sara's Boutique">
        <div class="container">
            <div class="section-header-luxury reveal">
                <span class="section-eyebrow-gold">Boutique Excellence</span>
                <h2 class="section-title-luxury">Why Women Choose Sara's Boutique</h2>
                <p class="section-subtitle-luxury">
                    We blend generational artistry, authentic textiles, and luxury concierge service into every drape.
                </p>
            </div>

            <div class="row g-3 g-lg-4 text-center justify-content-center stagger-group">
                <div class="col-6 col-md-4 col-lg stagger-item">
                    <div class="why-choose-card-luxury">
                        <div class="feature-circle-icon mx-auto">
                            <i class="bi bi-gem"></i>
                        </div>
                        <h4>Premium Fabrics</h4>
                        <p>100% Pure Mulberry Silk, Organza &amp; Chanderi</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg stagger-item">
                    <div class="why-choose-card-luxury">
                        <div class="feature-circle-icon mx-auto">
                            <i class="bi bi-airplane-engines"></i>
                        </div>
                        <h4>Fast Delivery</h4>
                        <p>Express insured dispatch across India &amp; Worldwide</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg stagger-item">
                    <div class="why-choose-card-luxury">
                        <div class="feature-circle-icon mx-auto">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Secure Payment</h4>
                        <p>100% Safe encrypted gateways &amp; UPI checkout</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg stagger-item">
                    <div class="why-choose-card-luxury">
                        <div class="feature-circle-icon mx-auto">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h4>Easy Returns</h4>
                        <p>7-Day doorstep pickup &amp; hassle-free exchange</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg stagger-item">
                    <div class="why-choose-card-luxury">
                        <div class="feature-circle-icon mx-auto">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4>24/7 Support</h4>
                        <p>Personal stylists ready on WhatsApp &amp; Concierge</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 9. CUSTOMER REVIEWS ===================== -->
    <section class="reviews-section-luxury section-bg-ivory luxury-section-pad" id="reviews" aria-label="Customer Reviews">
        <div class="container">
            <div class="reviews-header-wrap reveal">
                <div class="section-header-luxury mb-0 text-start" style="text-align: left !important;">
                    <span class="section-eyebrow-gold">Voices of Elegance</span>
                    <h2 class="section-title-luxury mb-2">What Our Patrons Say</h2>
                    <p class="section-subtitle-luxury mb-0">
                        Over 12,000+ discerning women celebrate life's most cherished milestones with Sara's Boutique.
                    </p>
                </div>
                <div class="reviews-nav-controls">
                    <button class="review-nav-btn" id="reviewsPrev" aria-label="Previous review">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="review-nav-btn" id="reviewsNext" aria-label="Next review">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="swiper reviews-swiper reveal delay-1" id="reviewsSwiper">
                <div class="swiper-wrapper">
                    <!-- Review Slide 1 -->
                    <div class="swiper-slide">
                        <article class="review-card-luxury">
                            <div class="review-top-bar">
                                <span class="review-occasion-pill"><i class="bi bi-gem me-1"></i> Wedding Wear Edit</span>
                                <span class="review-quote-icon"><i class="bi bi-quote"></i></span>
                            </div>
                            <div class="review-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <div class="review-product-tag">
                                <i class="bi bi-bag-check-fill"></i> Purchased: Royal Rose Pink Zari Churidar Set
                            </div>
                            <p class="review-quote-text">
                                "The Rose Pink Zari set was the absolute highlight of my sister's wedding! The pure silk is so rich and the intricate zari work looks genuinely royal. The custom fit was flawless."
                            </p>
                            <div class="review-author-wrap">
                                <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Ananya Roy" class="review-avatar-img" loading="lazy">
                                <div class="review-author-info">
                                    <span class="review-author-name">Ananya Roy</span>
                                    <span class="review-author-city">Mumbai, Maharashtra</span>
                                    <span class="badge-verified-buyer"><i class="bi bi-patch-check-fill"></i> Verified Patron</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Review Slide 2 -->
                    <div class="swiper-slide">
                        <article class="review-card-luxury">
                            <div class="review-top-bar">
                                <span class="review-occasion-pill"><i class="bi bi-sparkles me-1"></i> Festive Gala Edit</span>
                                <span class="review-quote-icon"><i class="bi bi-quote"></i></span>
                            </div>
                            <div class="review-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <div class="review-product-tag">
                                <i class="bi bi-bag-check-fill"></i> Purchased: Peacock Blue Handloom Banarasi Set
                            </div>
                            <p class="review-quote-text">
                                "Unbelievable craftsmanship! The silk dupatta feels like a whisper, soft yet weighted with authentic zardozi borders. Sara's Boutique has completely redefined luxury ethnic shopping for me."
                            </p>
                            <div class="review-author-wrap">
                                <img src="{{ asset('assets/img/card_teal.jpg') }}" alt="Priya Sundaram" class="review-avatar-img" loading="lazy">
                                <div class="review-author-info">
                                    <span class="review-author-name">Priya Sundaram</span>
                                    <span class="review-author-city">Bengaluru, Karnataka</span>
                                    <span class="badge-verified-buyer"><i class="bi bi-patch-check-fill"></i> Verified Patron</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Review Slide 3 -->
                    <div class="swiper-slide">
                        <article class="review-card-luxury">
                            <div class="review-top-bar">
                                <span class="review-occasion-pill"><i class="bi bi-stars me-1"></i> Diwali Special</span>
                                <span class="review-quote-icon"><i class="bi bi-quote"></i></span>
                            </div>
                            <div class="review-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <div class="review-product-tag">
                                <i class="bi bi-bag-check-fill"></i> Purchased: Emerald Green Georgette Kalidar Anarkali
                            </div>
                            <p class="review-quote-text">
                                "Ordered the emerald green suit for Diwali, and I received countless compliments all evening! Delivered in a fragrant gold keepsake box. 10/10 experience in every sense."
                            </p>
                            <div class="review-author-wrap">
                                <img src="{{ asset('assets/img/card_green.jpg') }}" alt="Divya Malhotra" class="review-avatar-img" loading="lazy">
                                <div class="review-author-info">
                                    <span class="review-author-name">Divya Malhotra</span>
                                    <span class="review-author-city">New Delhi</span>
                                    <span class="badge-verified-buyer"><i class="bi bi-patch-check-fill"></i> Verified Patron</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="swiper-pagination reviews-swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- ===================== 10. INSTAGRAM GALLERY ===================== -->
    <section class="instagram-section-luxury section-bg-white luxury-section-pad" id="instagram" aria-label="Instagram Gallery">
        <div class="container">
            <div class="section-header-luxury reveal">
                <span class="section-eyebrow-gold">Social Lookbook</span>
                <h2 class="section-title-luxury">Follow @SarasBoutiqueLuxury</h2>
                <p class="section-subtitle-luxury">
                    Tag #SarasMuse on Instagram to be featured in our official royal style gallery.
                </p>
            </div>

            <div class="insta-grid-luxury stagger-group">
                <a href="https://instagram.com" target="_blank" class="insta-photo-card stagger-item" aria-label="View Instagram Post 1">
                    <img src="{{ asset('assets/img/card_purple.jpg') }}" alt="Sara's Boutique Instagram Post" loading="lazy">
                    <div class="insta-hover-overlay"><i class="bi bi-instagram"></i></div>
                </a>
                <a href="https://instagram.com" target="_blank" class="insta-photo-card stagger-item" aria-label="View Instagram Post 2">
                    <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Sara's Boutique Instagram Post" loading="lazy">
                    <div class="insta-hover-overlay"><i class="bi bi-instagram"></i></div>
                </a>
                <a href="https://instagram.com" target="_blank" class="insta-photo-card stagger-item" aria-label="View Instagram Post 3">
                    <img src="{{ asset('assets/img/card_green.jpg') }}" alt="Sara's Boutique Instagram Post" loading="lazy">
                    <div class="insta-hover-overlay"><i class="bi bi-instagram"></i></div>
                </a>
                <a href="https://instagram.com" target="_blank" class="insta-photo-card stagger-item" aria-label="View Instagram Post 4">
                    <img src="{{ asset('assets/img/card_mustard.jpg') }}" alt="Sara's Boutique Instagram Post" loading="lazy">
                    <div class="insta-hover-overlay"><i class="bi bi-instagram"></i></div>
                </a>
                <a href="https://instagram.com" target="_blank" class="insta-photo-card stagger-item" aria-label="View Instagram Post 5">
                    <img src="{{ asset('assets/img/card_teal.jpg') }}" alt="Sara's Boutique Instagram Post" loading="lazy">
                    <div class="insta-hover-overlay"><i class="bi bi-instagram"></i></div>
                </a>
                <a href="https://instagram.com" target="_blank" class="insta-photo-card stagger-item" aria-label="View Instagram Post 6">
                    <img src="{{ asset('assets/img/offbanner.png') }}" alt="Sara's Boutique Instagram Post" loading="lazy">
                    <div class="insta-hover-overlay"><i class="bi bi-instagram"></i></div>
                </a>
            </div>
        </div>
    </section>

    <!-- ===================== QUICK VIEW MODAL ===================== -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content luxury-modal-content">
                <div class="modal-header border-0 pb-0 justify-content-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-1">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-5">
                            <div class="rounded-3 overflow-hidden shadow" style="aspect-ratio: 3/4; border: 1.5px solid var(--gold, #c5a059);">
                                <img src="{{ asset('assets/img/card_purple.jpg') }}" id="qvImage" alt="Product Image" class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <span class="section-eyebrow-gold mb-1 d-block" id="qvTag">Bespoke Collection</span>
                            <h3 class="font-serif text-white mb-2" id="qvTitle">Maharani Royal Velvet Churidar Set</h3>
                            <div class="d-flex align-items-baseline gap-3 mb-3">
                                <span class="fs-4 fw-bold" style="color: var(--gold, #c5a059);" id="qvPrice">₹ 3,499</span>
                                <span class="text-decoration-line-through text-white-50" id="qvOldPrice">₹ 4,999</span>
                                <span class="badge bg-danger bg-opacity-75 text-white">SPECIAL OFFER</span>
                            </div>
                            <p class="text-white-50 small mb-3" id="qvDesc">
                                Woven in pure mulberry silk with royal zardozi embroidery and matching sheer dupatta. Handcrafted by master artisans in Varanasi.
                            </p>

                            <!-- Size Selector -->
                            <div class="mb-4">
                                <label class="small text-white-50 d-block mb-2 font-monospace">SELECT SIZE (CHEST IN INCHES)</label>
                                <div class="d-flex gap-2">
                                    <button type="button" class="size-pill-btn active" onclick="selectSize(this)">S</button>
                                    <button type="button" class="size-pill-btn" onclick="selectSize(this)">M</button>
                                    <button type="button" class="size-pill-btn" onclick="selectSize(this)">L</button>
                                    <button type="button" class="size-pill-btn" onclick="selectSize(this)">XL</button>
                                    <button type="button" class="size-pill-btn" onclick="selectSize(this)">XXL</button>
                                </div>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="button" class="btn-add-to-cart py-2 px-4"
                                    onclick="addToBag(document.getElementById('qvTitle').textContent); bootstrap.Modal.getInstance(document.getElementById('quickViewModal')).hide();">
                                    <i class="bi bi-bag-plus"></i> Add to Bag
                                </button>
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
    // ── Quick View modal logic ───────────────────────────────────────
    function openQuickView(title, currPrice, oldPrice, imgUrl, description) {
        document.getElementById('qvTitle').textContent = title;
        document.getElementById('qvPrice').textContent = currPrice;
        document.getElementById('qvOldPrice').textContent = oldPrice || '';
        document.getElementById('qvImage').src = imgUrl;
        document.getElementById('qvDesc').textContent = description;
        const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
        modal.show();
    }

    function selectSize(btn) {
        document.querySelectorAll('.size-pill-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }

    // ── Banner Highlight Switcher Logic ──────────────────────────────
    const bannerItems = [
        {
            tag: "Festive Edit 2026 • Exclusive Designs",
            title: "Timeless Tradition,<br><span class='title-italic-gold'>Modern Elegance</span>",
            desc: "Discover handcrafted Churidar sets, royal Anarkalis, and bespoke ethnic silhouettes woven in pure mulberry silk with intricate gold zardozi embroidery."
        },
        {
            tag: "Royal Heritage • Pure Silk Collection",
            title: "Majestic<br><span class='title-italic-gold'>Anarkali Gowns</span>",
            desc: "Where grand heritage meets timeless craftsmanship. Designed with flowy silhouettes and intricate gold handwork."
        },
        {
            tag: "Bridal Couture • Luxury Craft",
            title: "Exquisite<br><span class='title-italic-gold'>Designer Lehengas</span>",
            desc: "Breathtaking bridal couture with bespoke zardozi embroidery, rich velvet borders, and ethereal dupattas."
        }
    ];

    let currentIdx = 0;
    function updateBanner(idx) {
        currentIdx = (idx + bannerItems.length) % bannerItems.length;
        const counter = document.getElementById('bannerCounter');
        const tag = document.querySelector('.hero-tag-pill');
        const title = document.querySelector('.hero-main-title');
        const desc = document.querySelector('.hero-desc');

        if (counter) counter.textContent = `0${currentIdx + 1} / 0${bannerItems.length}`;
        if (tag) tag.innerHTML = `<i class="bi bi-stars"></i> ${bannerItems[currentIdx].tag}`;
        if (title) title.innerHTML = bannerItems[currentIdx].title;
        if (desc) desc.innerHTML = bannerItems[currentIdx].desc;
    }

    document.getElementById('bannerPrevBtn')?.addEventListener('click', () => updateBanner(currentIdx - 1));
    document.getElementById('bannerNextBtn')?.addEventListener('click', () => updateBanner(currentIdx + 1));

    // ── Swiper Carousels Initializations ────────────────────────────────
    document.addEventListener('DOMContentLoaded', () => {
        // New Arrivals Swiper
        new Swiper('#productsSwiper', {
            slidesPerView: 1.15,
            spaceBetween: 14,
            grabCursor: true,
            loop: true,
            pagination: {
                el: '.products-swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                prevEl: '#swiperPrev',
                nextEl: '#swiperNext',
            },
            breakpoints: {
                320: { slidesPerView: 1.15, spaceBetween: 12 },
                480: { slidesPerView: 1.5, spaceBetween: 14 },
                576: { slidesPerView: 2, spaceBetween: 16 },
                768: { slidesPerView: 2.2, spaceBetween: 16 },
                992: { slidesPerView: 2.7, spaceBetween: 18 },
                1200: { slidesPerView: 3.2, spaceBetween: 18 },
                1400: { slidesPerView: 3.5, spaceBetween: 20 },
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });

        // Best Sellers Swiper
        new Swiper('#bestsellersSwiper', {
            slidesPerView: 1.25,
            spaceBetween: 12,
            grabCursor: true,
            loop: true,
            speed: 650,
            pagination: {
                el: '.bestsellers-swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                prevEl: '#bestsellerPrev',
                nextEl: '#bestsellerNext',
            },
            breakpoints: {
                320: { slidesPerView: 1.25, spaceBetween: 10 },
                480: { slidesPerView: 1.8, spaceBetween: 12 },
                576: { slidesPerView: 2.2, spaceBetween: 14 },
                768: { slidesPerView: 2.8, spaceBetween: 14 },
                992: { slidesPerView: 3.5, spaceBetween: 16 },
                1200: { slidesPerView: 4.2, spaceBetween: 16 },
                1400: { slidesPerView: 4.8, spaceBetween: 18 },
            },
            autoplay: {
                delay: 2800,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });

        // Reviews Swiper
        new Swiper('#reviewsSwiper', {
            slidesPerView: 1.08,
            spaceBetween: 14,
            grabCursor: true,
            loop: true,
            speed: 700,
            pagination: {
                el: '.reviews-swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                prevEl: '#reviewsPrev',
                nextEl: '#reviewsNext',
            },
            breakpoints: {
                320: { slidesPerView: 1.08, spaceBetween: 12 },
                576: { slidesPerView: 1.5, spaceBetween: 16 },
                768: { slidesPerView: 2, spaceBetween: 18 },
                992: { slidesPerView: 2.5, spaceBetween: 20 },
                1200: { slidesPerView: 3, spaceBetween: 24 },
                1400: { slidesPerView: 3, spaceBetween: 24 },
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    });
</script>
@endpush
