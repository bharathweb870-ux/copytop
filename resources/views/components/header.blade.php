<header id="site-header" data-transparent="{{ isset($heroPage) ? 'true' : 'false' }}" class="{{ isset($heroPage) ? 'transparent' : 'scrolled' }}">

    {{-- Top bar --}}
    <div class="header-top" style="border-bottom: 1px solid rgba(201,168,76,0.15);">
        <div class="container-sb flex items-center justify-between">
            <div class="flex items-center gap-4 text-xs">
                <a href="tel:+33123456789" class="flex items-center gap-1.5 hover:text-amber-400 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    01 23 45 67 89
                </a>
                <a href="mailto:contact@shri-bharathi.fr" class="flex items-center gap-1.5 hover:text-amber-400 transition-colors hidden sm:flex">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    contact@shri-bharathi.fr
                </a>
            </div>
            <div class="flex items-center gap-3 text-xs">
                <span class="hidden sm:inline">🚀 Livraison express disponible</span>
                <a href="{{ route('quote') }}" class="bg-amber-500 bg-opacity-20 text-amber-400 px-2.5 py-1 rounded text-xs font-semibold hover:bg-opacity-30 transition-all">
                    Demander un devis
                </a>
            </div>
        </div>
    </div>

    {{-- Main header --}}
    <div class="header-main">
        <div class="container-sb flex items-center justify-between gap-4">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="header-logo flex-shrink-0 flex items-center space-x-3 group">
                <div class="bg-white px-2 py-1 rounded-xl border border-amber-400/50 shadow-md flex items-center justify-center transition duration-300 group-hover:scale-105">
                    <img src="{{ asset('images/logo.png') }}" alt="Shri Bharathi Euro Printers" class="h-9 sm:h-11 w-auto object-contain">
                </div>
                <div class="hidden xl:flex flex-col leading-none text-left">
                    <span class="text-xs font-bold text-white tracking-widest uppercase">Shri Bharathi</span>
                    <span class="text-[9px] text-amber-400 font-semibold tracking-wider uppercase mt-0.5">Euro Printers • Since 1988</span>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="header-nav hidden lg:flex" aria-label="Navigation principale">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('category.imprimerie') }}" class="{{ request()->is('imprimerie*') ? 'active' : '' }}">Imprimerie</a>
                <a href="{{ route('category.enseignes') }}" class="{{ request()->is('enseignes*') ? 'active' : '' }}">Enseignes</a>
                <a href="{{ route('category.mariage') }}" class="{{ request()->is('mariage*') ? 'active' : '' }}">Mariage</a>
                <a href="{{ route('category.packaging') }}" class="{{ request()->is('packaging*') ? 'active' : '' }}">Packaging</a>
                <a href="{{ route('category.goodies') }}" class="{{ request()->is('personnalisation*') ? 'active' : '' }}">Goodies</a>
                <a href="{{ route('secteurs') }}" class="{{ request()->is('par-secteur*') ? 'active' : '' }}">Par secteur</a>
                <a href="{{ route('about') }}" class="{{ request()->is('a-propos') ? 'active' : '' }}">À propos</a>
            </nav>

            {{-- Actions --}}
            <div class="header-actions">
                {{-- Search --}}
                <a href="{{ route('search') }}" class="header-icon-btn" aria-label="Recherche" title="Recherche">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>

                {{-- WhatsApp --}}
                <a href="https://wa.me/33123456789" target="_blank" rel="noopener" class="header-icon-btn hidden sm:flex" aria-label="WhatsApp" title="Contacter sur WhatsApp">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                </a>

                {{-- Account --}}
                <a href="#" class="header-icon-btn hidden sm:flex" aria-label="Mon compte" title="Mon compte">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </a>

                {{-- Cart --}}
                <a href="{{ route('cart') }}" class="header-icon-btn relative" aria-label="Panier" title="Panier">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span class="cart-badge" aria-label="2 articles dans le panier">2</span>
                </a>

                {{-- Mobile hamburger --}}
                <button onclick="openMobileMenu()" class="header-icon-btn lg:hidden" aria-label="Ouvrir le menu" id="hamburger-btn">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>
</header>
