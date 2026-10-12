@extends('layouts.app')

@section('title', "Our Story — About Sara's Boutique | Luxury Indian Ethnic Wear")
@section('meta_description', "Discover Our Story at Sara's Boutique. Crafting elegance since day one with handcrafted luxury Indian ethnic fashion, royal Anarkalis, and pure mulberry silk churidar sets.")

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
@endpush

@section('content')

    <!-- ===================== HERO / STORY BREADCRUMB BANNER ===================== -->
    <section class="collection-hero-banner" aria-label="Our Story About Banner">
        <div class="container position-relative">
            <div class="collection-hero-inner">
                <span class="collection-eyebrow hero-load-item delay-1">OUR STORY</span>
                <h1 class="collection-main-title hero-load-item delay-2">Our Story</h1>
                <span class="collection-script-subtitle hero-load-item delay-3">Tradition Woven with Love</span>

                <p class="collection-desc hero-load-item delay-4">
                    Rooted in the timeless beauty of Indian craftsmanship, Sara's Boutique brings together
                    heritage, artistry and contemporary elegance. Every ensemble is thoughtfully created to
                    celebrate the woman who wears it and the traditions that inspire us.
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
                        <li class="active">Our Story</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- ===================== 1. OUR JOURNEY (Exact Asymmetrical Scooped Arch Section) ===================== -->
    <section class="journey-section" id="journey" aria-label="Our Journey - The Beginning of Sara's Boutique">
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
                        <span class="script-boutique">of Sara's Boutique</span>

                        <p class="body-narrative">
                            Sara's Boutique was founded with a simple dream – to create a space where tradition
                            meets modern elegance. What started as a small passion project has now grown into a
                            trusted brand, loved by women across the country for its exquisite designs, quality
                            craftsmanship and personalized service.
                        </p>

                        <div>
                            <a href="{{ route('collections') }}" class="btn-journey-action">
                                <span>Our Journey</span>
                                <i class="bi bi-arrow-right"></i>
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
    <section class="team-section" id="meet-our-team" aria-label="Meet Our Team — Sara's Boutique">
        <div class="container team-content-wrap">
            <div class="row align-items-center g-4 g-xl-5">

                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="team-story-wrap reveal-left">
                        <span class="eyebrow-team">MEET OUR TEAM</span>
                        <h2 class="heading-team">The People Behind<br>Sara's Boutique</h2>
                        <p class="desc-team">
                            Our team is a blend of creative designers, skilled artisans and dedicated professionals
                            who work together to bring you the best in ethnic fashion.
                        </p>
                        <div>
                            <a href="{{ route('contact') }}" class="btn-team-pill">
                                <span>Meet Our Team</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="photo-gallery-wrap reveal-right">
                        <div class="photo-card-team">
                            <img id="teamPhotoOne" src="{{ asset('assets/img/team_designers.jpg') }}" alt="Sara's Boutique Creative Design Team Collaborating" loading="lazy" />
                        </div>

                        <div class="photo-card-artisan">
                            <img id="teamPhotoTwo" src="{{ asset('assets/img/team_artisan.jpg') }}" alt="Skilled Artisan Crafting Embroidery on Purple Silk" loading="lazy" />
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

    <!-- ===================== 4. OUR MISSION & VISION + METRICS ===================== -->
    <section class="section-bg-ivory py-5 position-relative" id="mission" aria-label="Our Mission and Vision">
        <div class="container">
            <div class="row align-items-center g-4 g-lg-5">

                <div class="col-lg-4 col-md-5">
                    <div class="mission-arch-container mx-auto reveal-left">
                        <div class="mission-arch-frame">
                            <img src="{{ asset('assets/img/offbanner.png') }}" alt="Pure Silk Weaves and Royal Zardozi" class="w-100 h-100 object-fit-cover" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-7">
                    <div class="pe-lg-2 reveal">
                        <span class="section-eyebrow-gold">OUR MISSION &amp; VISION</span>
                        <h3 class="mission-heading-title mt-2 mb-2">Our Mission</h3>
                        <p class="mission-body-desc mb-3">
                            To make every woman feel beautiful, confident and connected to her roots through elegant and comfortable ethnic wear.
                        </p>

                        <div class="story-ornate-divider my-3" aria-hidden="true">
                            <span class="ornate-line"></span>
                            <span class="ornate-diamond"><i class="bi bi-diamond-fill"></i></span>
                            <span class="ornate-line"></span>
                        </div>

                        <h3 class="mission-heading-title mt-3 mb-2">Our Vision</h3>
                        <p class="mission-body-desc mb-0">
                            To become a global brand known for timeless designs, exceptional quality and unmatched customer experience in ethnic fashion.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 g-3 stagger-group">
                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">50K+</div>
                                    <p class="mission-stat-lbl">Happy Customers</p>
                                </div>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">4.9/5</div>
                                    <p class="mission-stat-lbl">Customer Rating</p>
                                </div>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">10K+</div>
                                    <p class="mission-stat-lbl">Unique Designs</p>
                                </div>
                            </div>
                        </div>

                        <div class="col stagger-item">
                            <div class="mission-stat-badge">
                                <div class="mission-stat-icon">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#240038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="mission-stat-num">100%</div>
                                    <p class="mission-stat-lbl">Silk Mark Certified</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== 5. WHY CHOOSE SARA'S BOUTIQUE? ===================== -->
    <section class="section-bg-white py-5" id="whychoose" aria-label="Why Choose Sara's Boutique">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="section-eyebrow-gold">WHY CHOOSE US</span>
                <h2 class="why-choose-heading">Why Choose Sara's Boutique?</h2>
                <p class="why-choose-subtitle">
                    We go beyond fashion — we create experiences.
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
                        <h4 class="why-item-title">Premium Fabrics</h4>
                        <p class="why-item-desc">Only the finest<br>materials</p>
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
                        <h4 class="why-item-title">Expert Craftsmanship</h4>
                        <p class="why-item-desc">Handpicked &amp;<br>carefully crafted</p>
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
                        <h4 class="why-item-title">Fast &amp; Safe Delivery</h4>
                        <p class="why-item-desc">Across India</p>
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
                        <h4 class="why-item-title">Dedicated Support</h4>
                        <p class="why-item-desc">We're here for you</p>
                    </div>
                </div>

                <div class="col-lg col-md-4 col-6 stagger-item">
                    <div class="why-choose-item-box">
                        <div class="why-circle-icon mx-auto">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                            </svg>
                        </div>
                        <h4 class="why-item-title">Exclusive Collections</h4>
                        <p class="why-item-desc">For every occasion</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 6. REAL STORIES, REAL SMILES ===================== -->
    <section class="reviews-section-luxury section-bg-ivory luxury-section-pad" id="testimonials" aria-label="Customer Reviews">
        <div class="container">
            <div class="reviews-header-wrap reveal">
                <div class="section-header-luxury mb-0 text-start" style="text-align: left !important;">
                    <span class="section-eyebrow-gold">Voices of Elegance</span>
                    <h2 class="section-title-luxury mb-2">Real Stories, Real Smiles</h2>
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
                                <i class="bi bi-bag-check-fill"></i> Purchased: Maharani Velvet Churidar Set
                            </div>
                            <p class="review-quote-text">
                                "The Maharani Velvet Set was the absolute highlight of my sister's wedding! The royal purple shade is so rich and the intricate zari work looks genuinely royal. The custom fit was flawless."
                            </p>
                            <div class="review-author-wrap">
                                <img src="{{ asset('assets/img/card_purple.jpg') }}" alt="Ananya Roy" class="review-avatar-img" loading="lazy">
                                <div class="review-author-info">
                                    <span class="review-author-name">Ananya Roy</span>
                                    <span class="review-author-city">Mumbai, Maharashtra</span>
                                    <span class="badge-verified-buyer"><i class="bi bi-patch-check-fill"></i> Verified Patron</span>
                                </div>
                            </div>
                        </article>
                    </div>

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
                                <i class="bi bi-bag-check-fill"></i> Purchased: Gulzar Rose Silk Churidar Suit
                            </div>
                            <p class="review-quote-text">
                                "Unbelievable craftsmanship! The silk dupatta feels like a whisper, soft yet weighted with authentic zardozi borders. Sara's Boutique has completely redefined luxury ethnic shopping for me."
                            </p>
                            <div class="review-author-wrap">
                                <img src="{{ asset('assets/img/card_pink.jpg') }}" alt="Priya Sundaram" class="review-avatar-img" loading="lazy">
                                <div class="review-author-info">
                                    <span class="review-author-name">Priya Sundaram</span>
                                    <span class="review-author-city">Bengaluru, Karnataka</span>
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

    <!-- ===================== 7. BOTTOM CTA BANNER ===================== -->
    <section class="offer-banner-section section-bg-white luxury-section-pad py-4 py-lg-5" aria-label="Special Festival Offer">
        <div class="container">
            <div class="promo-banner-card reveal-scale">
                <div class="row g-0 align-items-center">
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="model-col-wrap image-reveal">
                            <img src="{{ asset('assets/img/offbanner.png') }}" alt="Model wearing purple Churidar set" class="model-image" loading="eager">
                            <div class="model-fade-overlay" aria-hidden="true"></div>
                        </div>
                    </div>

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
                                        <span class="feature-text-desc">Silk Mark Certified</span>
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
                                        <span class="feature-text-title">Custom Tailored</span>
                                        <span class="feature-text-desc">Made-to-Measure</span>
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
