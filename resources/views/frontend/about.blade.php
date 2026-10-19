@extends('layouts.app')

@section('title', "About Us — Our Journey | Saras Boutique Puducherry")
@section('meta_description', "Learn about Saras Boutique in Puducherry. Started as a home-based business in 2023, developing into our boutique shop by 2026. Discover our fashion identity, curated ethnic wear, and customer-friendly experience.")

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
@endpush

@section('content')

    <!-- ===================== HERO / STORY BREADCRUMB BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Our Story About Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">
                <span class="collection-eyebrow hero-load-item delay-1">OUR JOURNEY • EST. 2023</span>
                <h1 class="collection-main-title hero-load-item delay-2">About Saras Boutique</h1>
                <span class="collection-script-subtitle hero-load-item delay-3">From Home-Based Roots to Boutique Shop</span>

                <p class="collection-desc hero-load-item delay-4">
                    Founded in Puducherry, Saras Boutique began as a home-based business in 2023 and developed into our boutique shop by 2026. Every piece is thoughtfully curated to celebrate women with timeless grace, quality fabrics, and personalized care.
                </p>

                <div class="collection-ornate-divider hero-load-item delay-4" aria-hidden="true">
                    <span class="line"></span>
                    <span class="diamond"><i class="bi bi-diamond-fill"></i></span>
                    <span class="line"></span>
                </div>

                <nav aria-label="breadcrumb" class="hero-load-item delay-5">
                    <ol class="collection-breadcrumbs">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="crumb-sep">›</li>
                        <li class="active">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- ===================== 1. OUR JOURNEY (Exact Asymmetrical Scooped Arch Section) ===================== -->
    <section class="journey-section" id="journey" aria-label="Our Journey - The Beginning of Saras Boutique">
        <!-- Ambient Watermark Mandala in bottom-left background -->
        <svg class="ambient-mandala-bg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="100" cy="100" r="90" stroke="#D4AF37" stroke-width="1.2" stroke-dasharray="5 3" />
            <circle cx="100" cy="100" r="62" stroke="#c49838" stroke-width="0.9" />
            <path d="M100 10 C120 50 150 50 190 100 C150 150 120 150 100 190 C80 150 50 150 10 100 C50 50 80 50 100 10 Z" stroke="#D4AF37" stroke-width="0.8" />
            <circle cx="100" cy="100" r="24" stroke="#D4AF37" stroke-width="1" />
            <circle cx="100" cy="100" r="6" fill="#c49838" />
        </svg>

        <div class="container journey-content-wrap">
            <div class="row align-items-center g-4 g-xl-5">

                <!-- ═════════ 1. LEFT COLUMN: Asymmetrical Scooped Arch Image Frame ═════════ -->
                <div class="col-12 col-lg-5 col-xl-4 text-center">
                    <div class="frame-showcase-box reveal-left">
                        <svg class="asymmetric-svg-element" viewBox="0 0 540 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <clipPath id="archScoopClip">
                                    <path d="
                                        M 185 28
                                        H 482
                                        Q 506 28 506 52
                                        V 530
                                        Q 506 554 482 554
                                        H 58
                                        Q 34 554 34 530
                                        V 190
                                        C 34 100, 95 38, 185 28
                                        Z
                                    " />
                                </clipPath>

                                <linearGradient id="goldFiligreeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#F2DD9C" />
                                    <stop offset="50%" stop-color="#C59A41" />
                                    <stop offset="100%" stop-color="#9C731A" />
                                </linearGradient>

                                <g id="floralMandalaCrest">
                                    <path d="M 0 -44 C 9 -32 9 -12 0 0 C -9 -12 -9 -32 0 -44 Z" fill="#FFFDF8" stroke="url(#goldFiligreeGrad)" stroke-width="1.8" />
                                    <circle cx="0" cy="-20" r="3" fill="#C59A41" />
                                    <path d="M 0 0 C -6 -16 -22 -26 -28 -18 C -33 -10 -15 6 0 0 Z" fill="#FFFBF2" stroke="url(#goldFiligreeGrad)" stroke-width="1.6" />
                                    <path d="M 0 0 C 6 -16 22 -26 28 -18 C 33 -10 15 6 0 0 Z" fill="#FFFBF2" stroke="url(#goldFiligreeGrad)" stroke-width="1.6" />
                                    <path d="M 0 0 C -12 -8 -38 -8 -36 4 C -34 16 -12 12 0 0 Z" fill="#FFFDF8" stroke="url(#goldFiligreeGrad)" stroke-width="1.5" />
                                    <path d="M 0 0 C 12 -8 38 -8 36 4 C 34 16 12 12 0 0 Z" fill="#FFFDF8" stroke="url(#goldFiligreeGrad)" stroke-width="1.5" />
                                    <circle cx="0" cy="0" r="8.5" fill="#FFF7DE" stroke="url(#goldFiligreeGrad)" stroke-width="1.8" />
                                    <circle cx="0" cy="0" r="4" fill="#C59A41" />
                                </g>
                            </defs>

                            <!-- Outer Floating Frame -->
                            <path d="
                                M 194 14
                                H 495
                                Q 522 14 522 41
                                V 542
                                Q 522 569 495 569
                                H 45
                                Q 18 569 18 542
                                V 198
                                C 18 95, 92 24, 194 14
                                Z
                            " fill="none" stroke="#E6DAC8" stroke-width="1.8" opacity="0.95" />

                            <path d="
                                M 190 20
                                H 489
                                Q 514 20 514 45
                                V 536
                                Q 514 561 489 561
                                H 51
                                Q 26 561 26 536
                                V 194
                                C 26 98, 93 30, 190 20
                                Z
                            " fill="none" stroke="#D4AF37" stroke-width="0.9" opacity="0.7" />

                            <!-- Pure White Frame Canvas Base -->
                            <path d="
                                M 185 28
                                H 482
                                Q 506 28 506 52
                                V 530
                                Q 506 554 482 554
                                H 58
                                Q 34 554 34 530
                                V 190
                                C 34 100, 95 38, 185 28
                                Z
                            " fill="#FFFFFF" />

                            <!-- Image Clipped via the Scooped Arch Geometry -->
                            <g clip-path="url(#archScoopClip)">
                                <image id="journeyModelImage" href="{{ asset('assets/img/card_purple.jpg') }}" x="25" y="18" width="490" height="545" preserveAspectRatio="xMidYMid slice" />
                            </g>

                            <!-- Inner Subtle Gold Stroke -->
                            <path d="
                                M 185 28
                                H 482
                                Q 506 28 506 52
                                V 530
                                Q 506 554 482 554
                                H 58
                                Q 34 554 34 530
                                V 190
                                C 34 100, 95 38, 185 28
                                Z
                            " fill="none" stroke="#E6D3A3" stroke-width="2" opacity="0.85" />

                            <use href="#floralMandalaCrest" x="80" y="85" transform="rotate(-30, 80, 85) scale(1.05)" />
                            <use href="#floralMandalaCrest" x="480" y="535" transform="rotate(150, 480, 535) scale(1.05)" />
                        </svg>
                    </div>
                </div>

                <!-- ═════════ 2. MIDDLE COLUMN: Typography & Story Narrative ═════════ -->
                <div class="col-12 col-lg-4 col-xl-5">
                    <div class="story-text-wrap reveal-right">
                        <span class="eyebrow-journey">OUR JOURNEY</span>
                        <h2 class="heading-beginning">The Beginning</h2>
                        <span class="script-boutique">of Saras Boutique</span>

                        <p class="body-narrative">
                            Saras Boutique started in <strong>2023</strong> in Puducherry as a passionate home-based venture with a simple, genuine vision: to offer women elegant, comfortable, and beautifully crafted ethnic fashion with warm, personalized service.
                        </p>
                        <p class="body-narrative">
                            Grounded in honest customer relationships and a discerning eye for quality fabrics, what began in our home blossomed step by step into a dedicated <strong>boutique shop by 2026</strong> in Shanmugapuram, Puducherry.
                        </p>

                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <a href="{{ route('collections') }}" class="btn-journey-action">
                                <span>Explore Collections</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="https://wa.me/919442634491?text=Hi%2C%20I%20would%20like%20to%20enquire%20about%20Saras%20Boutique%20collections." target="_blank" rel="noopener noreferrer" class="btn btn-outline-success rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2 fw-semibold">
                                <i class="bi bi-whatsapp"></i>
                                <span>Enquire on WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ═════════ 3. RIGHT COLUMN: 3-Tier Features Card ═════════ -->
                <div class="col-12 col-lg-3 col-xl-3">
                    <div class="features-pill-card reveal-scale delay-2">
                        <div class="feature-stack-item">
                            <div class="feature-icon-box">
                                <svg class="feature-vector-svg" viewBox="0 0 24 24">
                                    <path d="M12 4C13.5 8 13.5 12 12 18C10.5 12 10.5 8 12 4Z" />
                                    <path d="M12 9C9 9 5.5 11.5 5 15C7 16 9.5 16.5 12 17" />
                                    <path d="M12 9C15 9 18.5 11.5 19 15C17 16 14.5 16.5 12 17" />
                                    <path d="M4 17.5C7.5 20.5 16.5 20.5 20 17.5" />
                                </svg>
                            </div>
                            <span class="feature-text-line1">Rooted in</span>
                            <span class="feature-text-line2">Tradition</span>
                        </div>

                        <div class="feature-stack-item">
                            <div class="feature-icon-box">
                                <svg class="feature-vector-svg" viewBox="0 0 24 24">
                                    <path d="M12 20.5L10.55 19.18C5.4 14.5 2 11.42 2 7.6C2 4.5 4.42 2.08 7.5 2.08C9.24 2.08 10.91 2.89 12 4.15C13.09 2.89 14.76 2.08 16.5 2.08C19.58 2.08 22 4.5 22 7.6C22 11.42 18.6 14.5 13.45 19.19L12 20.5Z" />
                                </svg>
                            </div>
                            <span class="feature-text-line1">Designed for</span>
                            <span class="feature-text-line2">Modern Women</span>
                        </div>

                        <div class="feature-stack-item">
                            <div class="feature-icon-box">
                                <svg class="feature-vector-svg" viewBox="0 0 24 24">
                                    <path d="M6 3.5L2.5 8.5L12 20.5L21.5 8.5L18 3.5H6Z" />
                                    <path d="M2.5 8.5H21.5" />
                                    <path d="M7.5 8.5L12 20.5L16.5 8.5" />
                                    <path d="M6 3.5L8.5 8.5L12 3.5L15.5 8.5L18 3.5" />
                                </svg>
                            </div>
                            <span class="feature-text-line1">Quality You</span>
                            <span class="feature-text-line2">Can Trust</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 2. OUR VALUES SECTION ===================== -->
    <section class="values-section" id="our-values" aria-label="Our Values — Sara's Boutique">
        <svg class="mandala-watermark-left" viewBox="0 0 240 240" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="120" cy="120" r="110" stroke="#D4AF37" stroke-width="1.2" stroke-dasharray="6 4" />
            <circle cx="120" cy="120" r="82" stroke="#B8860B" stroke-width="0.8" />
            <path d="M120 10 C144 60 180 60 230 120 C180 180 144 180 120 230 C96 180 60 180 10 120 C60 60 96 60 120 10 Z" stroke="#D4AF37" stroke-width="1" />
            <circle cx="120" cy="120" r="38" stroke="#D4AF37" stroke-width="1" />
            <circle cx="120" cy="120" r="10" fill="#C59A41" opacity="0.6" />
        </svg>

        <div class="container values-content-wrap">
            <div class="row align-items-center g-4 g-xl-5">

                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="values-left-wrap reveal-left">
                        <span class="eyebrow-values">OUR VALUES</span>
                        <h2 class="heading-values">More Than Just<br>A Boutique</h2>
                        <p class="desc-values">
                            We are not just about clothes; we are about confidence, heritage and self-expression.
                            Every piece we curate represents our commitment to quality, authenticity and the modern
                            woman's lifestyle.
                        </p>
                        <div>
                            <a href="{{ route('collections') }}" class="btn-values-pill">
                                <span>Our Values</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="row row-cols-2 row-cols-md-4 g-3 g-xl-4 stagger-group">
                        <div class="col stagger-item">
                            <div class="value-card-box">
                                <div class="value-icon-container">
                                    <svg class="value-svg-icon" viewBox="0 0 32 32">
                                        <path d="M16 5C17.8 10 17.8 16 16 23C14.2 16 14.2 10 16 5Z" />
                                        <path d="M16 11C12.5 11 8.5 14.2 7.8 18.8C10.2 20 13.2 20.8 16 21.5" />
                                        <path d="M16 11C19.5 11 23.5 14.2 24.2 18.8C21.8 20 18.8 20.8 16 21.5" />
                                        <path d="M6.5 22.5C10.5 25.8 21.5 25.8 25.5 22.5" />
                                    </svg>
                                </div>
                                <h3 class="value-card-title">Tradition</h3>
                                <p class="value-card-desc">Celebrating our rich heritage</p>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="value-card-box">
                                <div class="value-icon-container">
                                    <svg class="value-svg-icon" viewBox="0 0 32 32">
                                        <path d="M8 6L3.5 12.5L16 27L28.5 12.5L24 6H8Z" />
                                        <path d="M3.5 12.5H28.5" />
                                        <path d="M10.5 12.5L16 27L21.5 12.5" />
                                        <path d="M8 6L11.5 12.5L16 6L20.5 12.5L24 6" />
                                    </svg>
                                </div>
                                <h3 class="value-card-title">Quality</h3>
                                <p class="value-card-desc">Premium fabrics &amp; craftsmanship</p>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="value-card-box">
                                <div class="value-icon-container">
                                    <svg class="value-svg-icon" viewBox="0 0 32 32">
                                        <path d="M16 26.5L14.2 24.85C7.8 19.05 3.5 15.15 3.5 10.35C3.5 6.45 6.5 3.5 10.35 3.5C12.55 3.5 14.65 4.5 16 6.1C17.35 4.5 19.45 3.5 21.65 3.5C25.5 3.5 28.5 6.45 28.5 10.35C28.5 15.15 24.2 19.05 17.8 24.85L16 26.5Z" />
                                    </svg>
                                </div>
                                <h3 class="value-card-title">Customer First</h3>
                                <p class="value-card-desc">Your happiness is our priority</p>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="value-card-box">
                                <div class="value-icon-container">
                                    <svg class="value-svg-icon" viewBox="0 0 32 32">
                                        <polygon points="16,3.5 19.8,11.5 28.5,12.8 22.2,19 23.7,27.5 16,23.5 8.3,27.5 9.8,19 3.5,12.8 12.2,11.5" />
                                    </svg>
                                </div>
                                <h3 class="value-card-title">Innovation</h3>
                                <p class="value-card-desc">Modern styles for every occasion</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 3. MEET OUR TEAM ===================== -->
    <section class="team-section" id="meet-our-team" aria-label="Meet Our Team — Saras Boutique">
        <div class="container team-content-wrap">
            <div class="row align-items-center g-4 g-xl-5">

                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="team-story-wrap reveal-left">
                        <span class="eyebrow-team">OUR BOUTIQUE HEART</span>
                        <h2 class="heading-team">The Passion Behind<br>Saras Boutique</h2>
                        <p class="desc-team">
                            From our humble home-based start in 2023 to welcoming patrons into our boutique shop in 2026, our team is dedicated to offering personalized styling, thoughtful size assistance, and a warm shopping experience.
                        </p>
                        <div>
                            <a href="{{ route('contact') }}" class="btn-team-pill">
                                <span>Visit Our Boutique</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="photo-gallery-wrap reveal-right">
                        <div class="photo-card-team">
                            <img id="teamPhotoOne" src="{{ asset('assets/img/team_designers.jpg') }}" alt="Saras Boutique Fashion Styling & Curation" loading="lazy" />
                        </div>

                        <div class="photo-card-artisan">
                            <img id="teamPhotoTwo" src="{{ asset('assets/img/team_artisan.jpg') }}" alt="Handcrafted Details and Zari Weaving" loading="lazy" />
                        </div>

                        <div class="calligraphy-accent-col">
                            <div class="script-lines">
                                Passion<br>
                                Creates<br>
                                Perfection
                            </div>
                            <svg class="hand-drawn-heart" viewBox="0 0 32 32" aria-hidden="true">
                                <path d="M16 27 C15.2 26.2 4 17.5 4 10.5 C4 6 7.5 3 11.5 3 C14 3 15.8 4.5 16 5.5 C16.2 4.5 18 3 20.5 3 C24.5 3 28 6 28 10.5 C28 17.5 16.8 26.2 16 27 Z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 4. OUR MISSION & VISION + MILESTONES ===================== -->
    <section class="section-bg-ivory py-5 position-relative" id="mission" aria-label="Our Mission and Vision">
        <div class="container">
            <div class="row align-items-center g-4 g-lg-5">

                <div class="col-lg-4 col-md-5">
                    <div class="mission-arch-container mx-auto reveal-left">
                        <div class="mission-arch-frame">
                            <img src="{{ asset('assets/img/offbanner.png') }}" alt="Saras Boutique Pure Weaves and Elegant Ensembles" class="w-100 h-100 object-fit-cover" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-7">
                    <div class="pe-lg-2 reveal">
                        <span class="section-eyebrow-gold">OUR MISSION &amp; VISION</span>
                        <h3 class="mission-heading-title mt-2 mb-2">Our Mission</h3>
                        <p class="mission-body-desc mb-3">
                            To make every woman feel confident, graceful, and cherished through handpicked, comfortable, and elegant ethnic wear that honors traditional beauty and modern lifestyles.
                        </p>

                        <div class="story-ornate-divider my-3" aria-hidden="true">
                            <span class="ornate-line"></span>
                            <span class="ornate-diamond"><i class="bi bi-diamond-fill"></i></span>
                            <span class="ornate-line"></span>
                        </div>

                        <h3 class="mission-heading-title mt-3 mb-2">Our Vision</h3>
                        <p class="mission-body-desc mb-0">
                            To be a trusted and beloved women's fashion boutique in Puducherry, recognized for genuine care, high-quality collections, and memorable customer experiences.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 g-3 stagger-group">
                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                        <polyline points="9 22 9 12 15 12 15 22" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">2023</div>
                                    <p class="mission-stat-lbl">Home-Based Beginning</p>
                                </div>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">2026</div>
                                    <p class="mission-stat-lbl">Boutique Shop in Puducherry</p>
                                </div>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">100%</div>
                                    <p class="mission-stat-lbl">Handpicked Quality</p>
                                </div>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">Puducherry</div>
                                    <p class="mission-stat-lbl">Shanmugapuram Location</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 5. WHY CHOOSE SARAS BOUTIQUE? ===================== -->
    <section class="section-bg-white py-5" id="whychoose" aria-label="Why Choose Saras Boutique">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="section-eyebrow-gold">WHY CHOOSE US</span>
                <h2 class="why-choose-heading">Why Choose Saras Boutique?</h2>
                <p class="why-choose-subtitle">
                    Rooted in personalized care, handpicked fabrics, and authentic hospitality in Puducherry.
                </p>
            </div>

            <div class="row g-3 g-lg-4 text-center justify-content-center stagger-group">
                <div class="col-lg col-md-4 col-6 stagger-item">
                    <div class="why-choose-item-box">
                        <div class="why-circle-icon mx-auto">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 3h12l4 6-10 12L2 9l4-6z" />
                                <path d="M2 9h20" />
                                <path d="M10 3l-2 6 4 12 4-12-2-6" />
                            </svg>
                        </div>
                        <h4 class="why-item-title">Handpicked Fabrics</h4>
                        <p class="why-item-desc">Selected for comfort,<br>grace &amp; durability</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-6 stagger-item">
                    <div class="why-choose-item-box">
                        <div class="why-circle-icon mx-auto">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="6" cy="6" r="3" />
                                <circle cx="6" cy="18" r="3" />
                                <line x1="20" y1="4" x2="8.12" y2="15.88" />
                                <line x1="14.47" y1="14.48" x2="20" y2="20" />
                                <line x1="8.12" y1="8.12" x2="12" y2="12" />
                            </svg>
                        </div>
                        <h4 class="why-item-title">Thoughtful Craft</h4>
                        <p class="why-item-desc">Carefully styled &amp;<br>tailored designs</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-6 stagger-item">
                    <div class="why-choose-item-box">
                        <div class="why-circle-icon mx-auto">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="3" width="15" height="13" />
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8" />
                                <circle cx="5.5" cy="18.5" r="2.5" />
                                <circle cx="18.5" cy="18.5" r="2.5" />
                            </svg>
                        </div>
                        <h4 class="why-item-title">Prompt Service</h4>
                        <p class="why-item-desc">Local boutique visit &amp;<br>courier options</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-6 stagger-item">
                    <div class="why-choose-item-box">
                        <div class="why-circle-icon mx-auto">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 18v-6a9 9 0 0 1 18 0v6" />
                                <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z" />
                            </svg>
                        </div>
                        <h4 class="why-item-title">Personal Assistance</h4>
                        <p class="why-item-desc">Direct WhatsApp &amp;<br>in-store styling</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-6 stagger-item">
                    <div class="why-choose-item-box">
                        <div class="why-circle-icon mx-auto">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                            </svg>
                        </div>
                        <h4 class="why-item-title">Boutique Collections</h4>
                        <p class="why-item-desc">For everyday elegance<br>&amp; celebrations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 6. BOUTIQUE EXPERIENCE & HOSPITALITY ===================== -->
    <section class="reviews-section-luxury section-bg-ivory luxury-section-pad" id="experience" aria-label="Boutique Experience">
        <div class="container">
            <div class="reviews-header-wrap reveal">
                <div class="section-header-luxury mb-4 text-start" style="text-align: left !important;">
                    <span class="section-eyebrow-gold">Shanmugapuram, Puducherry</span>
                    <h2 class="section-title-luxury mb-2">The Saras Boutique Experience</h2>
                    <p class="section-subtitle-luxury mb-0">
                        From our humble beginnings at home in 2023 to welcoming customers at our Shanmugapuram boutique in 2026, here is what you can expect when you visit or shop with us.
                    </p>
                </div>
            </div>

            <div class="row g-4 reveal delay-1">
                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-start" style="background: #ffffff; border-radius: 14px;">
                        <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 52px; height: 52px; border-radius: 12px; background: rgba(212, 175, 55, 0.12); color: #d4af37; font-size: 24px;">
                            <i class="bi bi-shop"></i>
                        </div>
                        <h4 style="font-family: 'Cinzel', serif; font-size: 1.15rem; color: #240038; margin-bottom: 0.75rem;">Welcoming Boutique Store</h4>
                        <p style="font-size: 0.95rem; color: #555; line-height: 1.6; margin-bottom: 1rem;">
                            Step into our cozy boutique shop in Manikachettyar Nagar, Shanmugapuram, Puducherry. Browse through our fabrics, try on sets, and experience warm, patient personal assistance.
                        </p>
                        <span style="font-size: 0.85rem; font-weight: 600; color: #d4af37;">
                            <i class="bi bi-geo-alt me-1"></i> Puducherry – 605009
                        </span>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-start" style="background: #ffffff; border-radius: 14px;">
                        <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 52px; height: 52px; border-radius: 12px; background: rgba(36, 0, 56, 0.08); color: #240038; font-size: 24px;">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <h4 style="font-family: 'Cinzel', serif; font-size: 1.15rem; color: #240038; margin-bottom: 0.75rem;">Careful Fitting &amp; Styling</h4>
                        <p style="font-size: 0.95rem; color: #555; line-height: 1.6; margin-bottom: 1rem;">
                            Every woman deserves clothing that fits seamlessly and accentuates her natural elegance. We help you choose the right cuts, shades, and silhouettes for your festive or everyday needs.
                        </p>
                        <span style="font-size: 0.85rem; font-weight: 600; color: #240038;">
                            <i class="bi bi-stars me-1"></i> Personalized Guidance
                        </span>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-start" style="background: #ffffff; border-radius: 14px;">
                        <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 52px; height: 52px; border-radius: 12px; background: rgba(37, 211, 102, 0.12); color: #25d366; font-size: 24px;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <h4 style="font-family: 'Cinzel', serif; font-size: 1.15rem; color: #240038; margin-bottom: 0.75rem;">Direct WhatsApp Assistance</h4>
                        <p style="font-size: 0.95rem; color: #555; line-height: 1.6; margin-bottom: 1rem;">
                            Can't visit right away? Enquire directly on WhatsApp at <strong>+91 94426 34491</strong> for live photos, stock checks, pricing, and sizing consultations.
                        </p>
                        <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Saras%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." target="_blank" rel="noopener noreferrer" style="font-size: 0.85rem; font-weight: 600; color: #25d366; text-decoration: none;">
                            <i class="bi bi-chat-dots-fill me-1"></i> Message Us on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 7. BOTTOM CTA BANNER ===================== -->
    <section class="offer-banner-section section-bg-white luxury-section-pad py-4 py-lg-5" aria-label="Visit Saras Boutique">
        <div class="container">
            <div class="promo-banner-card reveal-scale">
                <div class="row g-0 align-items-center">
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="model-col-wrap image-reveal">
                            <img src="{{ asset('assets/img/offbanner.png') }}" alt="Saras Boutique Fashion" class="model-image" loading="eager">
                            <div class="model-fade-overlay" aria-hidden="true"></div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 col-xl-5">
                        <div class="offer-center-wrap ps-lg-3 reveal-right">
                            <span class="offer-eyebrow">Visit Our Boutique</span>
                            <h2 class="offer-main-title">
                                Discover Saras Boutique
                            </h2>
                            <p class="offer-subtitle">
                                Explore handpicked churidar sets, sarees, and timeless women's ethnic wear in Shanmugapuram, Puducherry.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('collections') }}" class="btn-shop-pill">
                                    <span>Explore Collections</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Saras%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." target="_blank" rel="noopener noreferrer" class="btn btn-outline-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2" style="border-color: rgba(255,255,255,0.4); font-size: 0.9rem;">
                                    <i class="bi bi-whatsapp text-success"></i>
                                    <span>Enquire on WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>

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
                                        <span class="feature-text-title">Authentic Quality</span>
                                        <span class="feature-text-desc">Handpicked Fabrics</span>
                                    </div>
                                </div>

                                <div class="feature-badge-row">
                                    <div class="feature-circle-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                    </div>
                                    <div class="feature-badge-text">
                                        <span class="feature-text-title">Puducherry Boutique</span>
                                        <span class="feature-text-desc">Shanmugapuram</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const swiperEl = document.querySelector('#reviewsSwiper');
        if (swiperEl && typeof Swiper !== 'undefined') {
            new Swiper(swiperEl, {
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
                },
            });
        }
    });
</script>
@endpush
