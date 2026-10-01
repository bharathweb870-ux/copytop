<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>@yield('title', 'Shri Bharathi — Impression, Signalétique & Personnalisation')</title>
    <meta name="description" content="@yield('description', 'Shri Bharathi : impression professionnelle, enseignes lumineuses, faire-part mariage, packaging personnalisé et goodies. Qualité premium, livraison rapide en France.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', 'Shri Bharathi')">
    <meta property="og:description" content="@yield('description', 'Impression, signalétique, mariage, packaging et personnalisation — tout au même endroit.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="fr_FR">

    {{-- Fonts preconnect --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Vite assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/demo-data.js'])

    {{-- Page-specific head --}}
    @stack('head')
</head>
<body class="{{ $bodyClass ?? 'bg-[#1A1A2E] text-white' }}">

    {{-- Header --}}
    @unless($hideHeader ?? false)
        @include('components.header')

        {{-- Mobile menu overlay --}}
        <div class="mobile-menu-overlay" id="mobile-overlay" onclick="closeMobileMenu()"></div>

        {{-- Mobile menu --}}
        @include('components.mobile-menu')
    @endunless

    {{-- Main content --}}
    <main id="main-content" class="@yield('main-class', isset($heroPage) && $heroPage ? '' : (isset($editorPage) && $editorPage ? 'pt-0' : 'pt-24 sm:pt-28'))">
        @yield('content')
    </main>

    {{-- Footer --}}
    @unless($hideFooter ?? false)
        @include('components.footer')
    @endunless

    {{-- Global JS --}}
    <script>
        // Header scroll behaviour
        const header = document.getElementById('site-header');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            if (scrollY > 80) {
                header.classList.add('scrolled');
                header.classList.remove('transparent');
            } else {
                header.classList.remove('scrolled');
                // Only transparent on pages with hero
                if (header.dataset.transparent === 'true') {
                    header.classList.add('transparent');
                }
            }
            lastScroll = scrollY;
        }, { passive: true });

        // Mobile menu
        function openMobileMenu() {
            document.getElementById('mobile-menu').classList.add('open');
            document.getElementById('mobile-overlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            document.getElementById('mobile-menu').classList.remove('open');
            document.getElementById('mobile-overlay').classList.remove('open');
            document.body.style.overflow = '';
        }

        // Scroll animation observer
        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => scrollObserver.observe(el));
    </script>

    @stack('scripts')
</body>
</html>
