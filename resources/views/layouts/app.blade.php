<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Saras Boutique | Women's Fashion Boutique in Puducherry")</title>
    <meta name="description" content="@yield('meta_description', 'Discover Saras Boutique in Puducherry. Started as a home-based business in 2023 and developed into a boutique shop by 2026, offering elegant Churidar sets, designer suits, and festive ethnic fashion.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Saras Boutique, women boutique in Puducherry, boutique shop in Shanmugapuram, women fashion boutique in Puducherry, Churidar sets, designer suits, festive wear')">
    <meta name="author" content="Saras Boutique">
    <meta name="theme-color" content="#180026">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Social SEO -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Saras Boutique | Women\'s Fashion Boutique in Puducherry')">
    <meta property="og:description" content="@yield('og_description', 'Saras Boutique — Founded in 2023 as a home-based venture and grown into a boutique shop by 2026 in Shanmugapuram, Puducherry. Explore elegant ethnic collections.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/offbanner.png'))">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card SEO -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Saras Boutique | Women\'s Fashion Boutique in Puducherry')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Saras Boutique in Shanmugapuram, Puducherry. Genuine fashion journey from 2023 home venture to 2026 boutique shop.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/img/offbanner.png'))">

    <!-- Structured Data (LocalBusiness / ClothingStore) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ClothingStore",
      "name": "Saras Boutique",
      "description": "Women's boutique in Puducherry offering elegant Churidar sets, designer ethnic wear, and festive collections. Journey from a home-based business in 2023 to a boutique shop by 2026.",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/img/logo1.png') }}",
      "image": "{{ asset('assets/img/offbanner.png') }}",
      "telephone": "+919442634491",
      "email": "Sarasboutique2026@gmail.com",
      "priceRange": "₹₹",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram",
        "addressLocality": "Puducherry",
        "postalCode": "605009",
        "addressCountry": "IN"
      }
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Cinzel:wght@400;500;600;700&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600;1,700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Custom Luxury Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scroll-animation.css') }}">

    @stack('styles')
    @yield('styles')
</head>
<body>

    @include('components.frontend.announcement-bar')
    @include('components.frontend.header')
    @include('components.frontend.mobile-menu')
    @include('components.frontend.search-modal')

    <main id="main-content">
        @yield('content')
    </main>

    @include('components.frontend.footer')
    @include('components.frontend.luxury-toast')

    <!-- Floating WhatsApp Enquiry Button -->
    <a href="https://wa.me/919442634491?text=Hi%2C%20I%20visited%20the%20Saras%20Boutique%20website%20and%20would%20like%20to%20know%20more%20about%20your%20collections." 
       class="saras-floating-whatsapp" 
       target="_blank" 
       rel="noopener noreferrer" 
       aria-label="Chat with Saras Boutique on WhatsApp">
        <i class="bi bi-whatsapp"></i>
        <span class="saras-whatsapp-tooltip">Enquire on WhatsApp</span>
    </a>

    <style>
        .saras-floating-whatsapp {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 58px;
            height: 58px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: #ffffff !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 8px 24px rgba(18, 140, 126, 0.45), 0 0 0 0 rgba(37, 211, 102, 0.5);
            z-index: 1040;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            animation: sarasPulse 2.8s infinite;
        }
        .saras-floating-whatsapp:hover {
            transform: scale(1.1) translateY(-3px);
            box-shadow: 0 14px 28px rgba(18, 140, 126, 0.6);
            color: #ffffff !important;
        }
        .saras-whatsapp-tooltip {
            position: absolute;
            right: 70px;
            background: #180026;
            color: #f7eedb;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 20px;
            white-space: nowrap;
            box-shadow: 0 6px 18px rgba(0,0,0,0.25);
            border: 1px solid rgba(212, 175, 55, 0.35);
            pointer-events: none;
            opacity: 0;
            transform: translateX(10px);
            transition: all 0.25s ease;
        }
        .saras-floating-whatsapp:hover .saras-whatsapp-tooltip {
            opacity: 1;
            transform: translateX(0);
        }
        @keyframes sarasPulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6), 0 8px 24px rgba(18, 140, 126, 0.45); }
            70% { box-shadow: 0 0 0 16px rgba(37, 211, 102, 0), 0 8px 24px rgba(18, 140, 126, 0.45); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0), 0 8px 24px rgba(18, 140, 126, 0.45); }
        }
        @media (max-width: 576px) {
            .saras-floating-whatsapp {
                bottom: 20px;
                right: 20px;
                width: 52px;
                height: 52px;
                font-size: 26px;
            }
        }
    </style>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper.js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Global Frontend JavaScript -->
    <script>
        // Global Luxury Toast Function
        function showToast(message = "Added to Shopping Bag!", subtitle = "Item updated in your luxury cart") {
            const toast = document.getElementById('luxuryToast');
            const title = document.getElementById('toastTitle');
            const sub = document.getElementById('toastSubtitle');
            if (title) title.textContent = message;
            if (sub && subtitle) sub.textContent = subtitle;
            if (toast) {
                toast.style.display = 'flex';
                toast.classList.add('show');
                setTimeout(() => { 
                    toast.classList.remove('show'); 
                    setTimeout(() => { toast.style.display = 'none'; }, 300);
                }, 3500);
            }
        }

        // Global Cart Interaction
        let cartItemCount = 0;
        function addToBag(itemTitle = "Churidar Ensemble") {
            cartItemCount++;
            const badge = document.getElementById('cartCount');
            if (badge) {
                badge.textContent = cartItemCount;
                badge.style.transform = 'scale(1.35)';
                setTimeout(() => { badge.style.transform = 'scale(1)'; }, 250);
            }
            showToast(`Added "${itemTitle}" to Bag!`, "Bespoke handcrafted ensemble added");
        }

        // Flash message handling from Laravel sessions
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', () => {
                showToast("{{ session('success') }}", "Sara's Boutique Concierge");
            });
        @endif
        @if(session('error'))
            document.addEventListener('DOMContentLoaded', () => {
                showToast("{{ session('error') }}", "Notification");
            });
        @endif
    </script>

    <!-- Modern Scroll Animation Engine -->
    <script src="{{ asset('assets/js/scroll-animation.js') }}"></script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>
