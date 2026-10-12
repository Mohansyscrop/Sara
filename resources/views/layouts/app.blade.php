<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Sara's Boutique | Luxury Indian Ethnic Fashion & Designer Churidar Sets")</title>
    <meta name="description" content="@yield('meta_description', 'Discover handcrafted luxury Indian ethnic fashion at Sara\'s Boutique. Shop exclusive Churidar Sets, royal Anarkalis, designer Salwar Suits, and Silk Dupattas woven in pure mulberry silk with zardozi embroidery.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Sara\'s Boutique, Churidar sets, designer salwar suits, royal anarkali, silk dupattas, indian ethnic wear, bridal trousseau, festive wear')">
    <meta name="author" content="Sara's Boutique">
    <meta name="theme-color" content="#180026">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Social SEO -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Sara\'s Boutique | Luxury Indian Ethnic Fashion & Designer Churidar Sets')">
    <meta property="og:description" content="@yield('og_description', 'Handcrafted designer Churidar sets, royal Anarkalis, and pure silk ethnic ensembles for festive galas, weddings, and celebrations.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/offbanner.png'))">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card SEO -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Sara\'s Boutique | Luxury Indian Ethnic Fashion')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Handcrafted designer Churidar sets, royal Anarkalis, and pure silk ethnic ensembles.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/img/offbanner.png'))">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ClothingStore",
      "name": "Sara's Boutique",
      "description": "Luxury Indian Ethnic Fashion & Designer Churidar Sets",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/img/logo1.png') }}",
      "image": "{{ asset('assets/img/offbanner.png') }}",
      "telephone": "+91-9876543210",
      "email": "concierge@sarasboutique.com",
      "priceRange": "₹₹ - ₹₹₹₹",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jubilee Hills",
        "addressLocality": "Hyderabad",
        "addressRegion": "Telangana",
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
