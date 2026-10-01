@extends('layouts.app')

@section('title', 'Papeterie & Décoration Mariage & Événements — Shri Bharathi')
@section('description', 'Faire-part de mariage haut de gamme, dorure à chaud, découpe laser, panneaux de bienvenue plexiglas miroir, menus de table, marque-places et livre d\'or personnalisé.')

@section('main-class', '')
@section('content')
<main class="bg-amber-50/30 text-gray-900 min-h-screen">
    <!-- Category Hero Header -->
    <div class="relative overflow-hidden bg-gradient-to-b from-stone-900 via-stone-900 to-amber-950 text-white pt-24 sm:pt-28 pb-16">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:32px_32px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex items-center space-x-2 text-xs text-amber-200/70 mb-6">
                <a href="{{ route('home') }}" class="hover:text-amber-100 transition">Accueil</a>
                <span>/</span>
                <span class="text-amber-400 font-medium">Mariage & Événements</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-amber-400/20 text-amber-300 border border-amber-400/30 tracking-wide uppercase">
                        ✨ Impression Couture & Dorure à Chaud
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-serif tracking-tight text-white leading-tight">
                        Papeterie d'Exception & <br>
                        <span class="bg-gradient-to-r from-amber-200 via-amber-400 to-yellow-300 bg-clip-text text-transparent font-sans font-extrabold">
                            Décoration de Mariage
                        </span>
                    </h1>
                    <p class="text-stone-300 text-base sm:text-lg max-w-2xl leading-relaxed">
                        Sublimez le plus beau jour de votre vie avec des faire-part luxueux, du gaufrage artisanal, du lettrage dorure sur papier vellum texturé et des signalétiques de cérémonie sur-mesure.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="{{ route('templates') }}" class="px-6 py-3.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold rounded-xl shadow-lg shadow-amber-500/30 hover:from-amber-600 hover:to-amber-700 transition flex items-center space-x-2">
                            <span>💌 Parcourir les Modèles de Faire-Part</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#echantillons" class="px-6 py-3.5 bg-stone-800/80 hover:bg-stone-700 text-stone-200 font-semibold rounded-xl border border-stone-700 transition flex items-center space-x-2">
                            <span>🎁 Commander un Échantillon gratuit</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-3xl overflow-hidden border border-amber-500/30 shadow-2xl group">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80" alt="Faire-part de mariage luxe" class="w-full h-80 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 bg-stone-900/90 backdrop-blur-md p-4 rounded-xl border border-amber-500/20">
                            <div class="text-xs text-amber-400 font-bold uppercase tracking-wider">Finition Étoile</div>
                            <div class="text-sm font-serif text-white">Faire-part Cotton Luxe & Dorure à chaud Or 24K</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Subcategories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

        <!-- Collection Faire-part & Invitations -->
        <section>
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Le Premier Regard sur Votre Mariage</span>
                <h2 class="text-3xl font-serif font-bold text-stone-900 mt-2">Faire-part & Invitations d'Exception</h2>
                <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl transition overflow-hidden group flex flex-col">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80" alt="Faire-part dorure à chaud" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-amber-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Best-Seller</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-serif font-bold text-stone-900 group-hover:text-amber-600 transition">Faire-Part Dorure à Chaud & Papier Coton 350g</h3>
                            <p class="text-stone-600 text-xs mt-2 leading-relaxed">Toucher velouté luxueux avec dorure relief (Or, Rose Gold, Argent) et enveloppe doublée assortie.</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-stone-500">À partir de</span>
                                <div class="text-lg font-bold text-stone-900">2,50 € <span class="text-xs text-stone-500 font-normal">/ pièce</span></div>
                            </div>
                            <a href="{{ route('product.showcase', 'faire-part-dorure') }}" class="px-4 py-2 bg-stone-900 hover:bg-amber-600 text-white text-xs font-bold rounded-xl transition">Configurer</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl transition overflow-hidden group flex flex-col">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=600&q=80" alt="Faire-part Plexiglas de verre" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-stone-900 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Tendance Ultra Modern</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-serif font-bold text-stone-900 group-hover:text-amber-600 transition">Faire-Part Acrylique & Plexiglas Gravé</h3>
                            <p class="text-stone-600 text-xs mt-2 leading-relaxed">Transparence cristalline et gravure blanche ou dorée inaltérable. Un souvenir inoubliable conservé à vie.</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-stone-500">À partir de</span>
                                <div class="text-lg font-bold text-stone-900">4,90 € <span class="text-xs text-stone-500 font-normal">/ pièce</span></div>
                            </div>
                            <a href="{{ route('product.showcase', 'faire-part-plexiglas') }}" class="px-4 py-2 bg-stone-900 hover:bg-amber-600 text-white text-xs font-bold rounded-xl transition">Découvrir</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl transition overflow-hidden group flex flex-col">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=600&q=80" alt="Panneau de bienvenue mariage" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-pink-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Cérémonie & Réception</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-serif font-bold text-stone-900 group-hover:text-amber-600 transition">Panneau de Bienvenue & Plan de Table Plexi Miroir</h3>
                            <p class="text-stone-600 text-xs mt-2 leading-relaxed">Grands formats (60x90cm), calligraphie personnalisée et support bois / chevalet d'accueil d'honneur.</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-stone-500">À partir de</span>
                                <div class="text-lg font-bold text-stone-900">79,00 € <span class="text-xs text-stone-500 font-normal">/ unité</span></div>
                            </div>
                            <a href="{{ route('product.showcase', 'panneau-bienvenue-mariage') }}" class="px-4 py-2 bg-stone-900 hover:bg-amber-600 text-white text-xs font-bold rounded-xl transition">Personnaliser</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sample Box Request Section -->
        <section id="echantillons" class="bg-gradient-to-r from-stone-900 to-amber-950 rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-3">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-widest">Toucher avant de commander</span>
                    <h3 class="text-2xl sm:text-4xl font-serif font-bold">Demandez votre Coffret Échantillons Mariage</h3>
                    <p class="text-stone-300 text-sm max-w-2xl leading-relaxed">
                        Recevez chez vous sous 48h notre coffret incluant 8 échantillons de papiers de création (Cotton, Vellum, Gaufré, Calque), toutes les couleurs de dorure et un nuancier de finitions.
                    </p>
                </div>
                <div class="lg:col-span-4 flex justify-end">
                    <a href="{{ route('quote') }}?type=sample-kit" class="w-full sm:w-auto px-8 py-4 bg-amber-500 hover:bg-amber-600 text-stone-950 font-extrabold rounded-xl text-center shadow-lg transition">
                        Recevoir mon coffret (Offert)
                    </a>
                </div>
            </div>
        </section>

    </div>
</main>
@endsection
