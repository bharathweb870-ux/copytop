@extends('layouts.app')

@section('title', 'Personnalisation & Objets Publicitaires Goodies — Shri Bharathi')
@section('description', 'Textile personnalisé, tote bags en coton bio, mugs gravés, stylos publicitaires, gourdes inox et goodies d\'entreprise.')

@section('main-class', '')
@section('content')
<main class="bg-gray-50 text-gray-900 min-h-screen">
    <!-- Hero Header -->
    <div class="bg-gradient-to-b from-indigo-950 via-indigo-900 to-gray-900 text-white pt-24 sm:pt-28 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-xs text-indigo-200/70 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
                <span>/</span>
                <span class="text-indigo-400 font-medium">Personnalisation & Goodies</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-6">
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-indigo-400/20 text-indigo-300 border border-indigo-400/30">
                        🎁 Marquage & Gravure Laser sur place
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white leading-tight">
                        Goodies Publicitaires & <br>
                        <span class="bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-400 bg-clip-text text-transparent">
                            Textiles Corporate Personnalisés
                        </span>
                    </h1>
                    <p class="text-indigo-100 text-base sm:text-lg max-w-2xl leading-relaxed">
                        Faites rayonner votre image de marque auprès de vos collaborateurs et clients grâce à notre catalogue de plus de 500 références personnalisables.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Goodies Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=600&q=80" alt="Tote Bag Coton Bio" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Tote Bag Coton Bio 140g & Épais 280g</h3>
                    <p class="text-xs text-gray-500 mt-2">Sérigraphie ou impression numérique DTG grand format, idéal cadeaux clients et événements.</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">À partir de 1,90 € HT</span>
                        <a href="{{ route('product.quote', 'tote-bag') }}" class="px-4 py-2 bg-indigo-600 text-white text-xs font-bold rounded-lg hover:bg-indigo-700 transition">Personnaliser</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=600&q=80" alt="Gourde Inox Isotherme gravée" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Gourde Inox Isotherme & Mug Gravé Laser</h3>
                    <p class="text-xs text-gray-500 mt-2">Gravure laser 360° inaltérable ou sublimation couleur. Maintien chaud 12h / froid 24h.</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">À partir de 8,50 € HT</span>
                        <a href="{{ route('product.quote', 'gourde-inox') }}" class="px-4 py-2 bg-indigo-600 text-white text-xs font-bold rounded-lg hover:bg-indigo-700 transition">Personnaliser</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&w=600&q=80" alt="Textile Pro Brodé" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Polos & Sweats Entreprise (Broderie / Flocage)</h3>
                    <p class="text-xs text-gray-500 mt-2">Tenues de travail et équipes d'accueil. Broderie HD résistante aux lavages fréquents.</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">À partir de 14,90 € HT</span>
                        <a href="{{ route('product.quote', 'textile-pro') }}" class="px-4 py-2 bg-indigo-600 text-white text-xs font-bold rounded-lg hover:bg-indigo-700 transition">Personnaliser</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
