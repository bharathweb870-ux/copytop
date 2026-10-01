@extends('layouts.app')

@section('title', 'Packaging & Sacs Personnalisés — Shri Bharathi')
@section('description', 'Emballages sur-mesure, sacs kraft imprimés, étiquettes adhésives en rouleau, packaging e-commerce et boîtes d\'expédition personnalisées.')

@section('content')
<main class="bg-gray-50 text-gray-900 min-h-screen">
    <!-- Hero Header -->
    <div class="bg-gradient-to-b from-emerald-950 via-emerald-900 to-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-xs text-emerald-200/70 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
                <span>/</span>
                <span class="text-emerald-400 font-medium">Packaging & Sacs</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-6">
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-400/20 text-emerald-300 border border-emerald-400/30">
                        🌱 Éco-conçu & Recyclable 100%
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white leading-tight">
                        Packaging Éco-Responsable & <br>
                        <span class="bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent">
                            Sacs Personnalisés sur Mesure
                        </span>
                    </h1>
                    <p class="text-emerald-100 text-base sm:text-lg max-w-2xl leading-relaxed">
                        Des boîtes d'expédition aux sacs bouteilles et étiquettes adhésives en rouleau, valorisez vos produits avec un unboxing mémorable et éco-responsable.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="{{ route('quote') }}?type=packaging" class="px-6 py-3.5 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-xl shadow-lg transition">
                            Demander une étude Packaging
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Box 1 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=600&q=80" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-packaging.svg') }}';" alt="Sacs kraft personnalisés" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition">Sacs Kraft Personnalisés (Poignées Torsadées)</h3>
                    <p class="text-xs text-gray-500 mt-2">Pour boutiques, salons & restaurants. Impresion 1 à 4 couleurs, kraft naturel ou blanc.</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">À partir de 0,35 € HT/pc</span>
                        <a href="{{ route('product.quote', 'sacs-kraft') }}" class="px-4 py-2 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700 transition">Devis direct</a>
                    </div>
                </div>
            </div>

            <!-- Box 2 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=600&q=80" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-packaging.svg') }}';" alt="Boîtes expédition E-commerce" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition">Boîtes d'Expédition E-commerce Cartonnée</h3>
                    <p class="text-xs text-gray-500 mt-2">Format boîte postale renforcée avec impression intérieure/extérieure personnalisée.</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">À partir de 0,95 € HT/pc</span>
                        <a href="{{ route('product.quote', 'boite-expedition') }}" class="px-4 py-2 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700 transition">Devis direct</a>
                    </div>
                </div>
            </div>

            <!-- Box 3 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1607344645866-009c320c5ab8?auto=format&fit=crop&w=600&q=80" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-packaging.svg') }}';" alt="Étiquettes en rouleau" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition">Étiquettes Adhésives en Rouleau & Stickers Produits</h3>
                    <p class="text-xs text-gray-500 mt-2">Résistantes à l'eau et aux huiles. Finition dorure, vernis sélectif, vinyle transparent.</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">À partir de 29,00 € HT/1000</span>
                        <a href="{{ route('product.configurable', 'stickers') }}" class="px-4 py-2 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700 transition">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
