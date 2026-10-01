@extends('layouts.app')

@section('title', 'Faire-Part Dorure à Chaud Luxe — Shri Bharathi')
@section('description', 'Faire-part de mariage personnalisé avec dorure à chaud, velours et calligraphie sur-mesure.')

@section('content')
<main class="bg-amber-50/20 text-stone-900 py-12" x-data="{ selectedColor: 'gold', sampleQty: 50 }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <nav class="flex items-center space-x-2 text-xs text-stone-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-amber-600 transition">Accueil</a>
            <span>/</span>
            <a href="{{ route('category.mariage') }}" class="hover:text-amber-600 transition">Mariage & Événements</a>
            <span>/</span>
            <span class="text-stone-900 font-medium">Faire-Part Dorure Prestige</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left Column Gallery -->
            <div class="lg:col-span-7 space-y-6">
                <div class="bg-white rounded-3xl p-6 border border-stone-200 shadow-md relative overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1000&q=80" alt="Faire part de mariage" class="w-full h-[450px] object-cover rounded-2xl group-hover:scale-105 transition duration-700">
                    <div class="absolute bottom-10 left-10 right-10 bg-stone-900/85 backdrop-blur-md p-4 rounded-xl border border-amber-400/30 text-white">
                        <div class="text-xs text-amber-400 font-bold uppercase tracking-wider">Finition Étoile</div>
                        <div class="text-sm font-serif">Papier Coton 350g, Dorure à chaud Or Rose 24K & Enveloppe Velours</div>
                    </div>
                </div>
            </div>

            <!-- Right Column Details & Options -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-3xl p-8 border border-stone-200 shadow-xl space-y-6">
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Collection Couture Mariage</span>
                        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Faire-Part Dorure à Chaud & Coton 350g</h1>
                        <p class="text-xs text-stone-500 mt-2">Équilibre parfait entre tradition typographique et luxe contemporain.</p>
                    </div>

                    <!-- Color finish theme -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-stone-700 uppercase">Couleur de la Dorure</label>
                        <div class="flex space-x-3">
                            <button @click="selectedColor = 'gold'" :class="{'ring-2 ring-amber-500 scale-105': selectedColor === 'gold'}" class="w-10 h-10 rounded-full bg-amber-400 shadow-md transition flex items-center justify-center text-xs font-bold text-stone-900" title="Or 24K">Or</button>
                            <button @click="selectedColor = 'rose'" :class="{'ring-2 ring-pink-500 scale-105': selectedColor === 'rose'}" class="w-10 h-10 rounded-full bg-pink-300 shadow-md transition flex items-center justify-center text-xs font-bold text-stone-900" title="Rose Gold">Rose</button>
                            <button @click="selectedColor = 'silver'" :class="{'ring-2 ring-gray-400 scale-105': selectedColor === 'silver'}" class="w-10 h-10 rounded-full bg-slate-300 shadow-md transition flex items-center justify-center text-xs font-bold text-stone-900" title="Argent Miroir">Arg</button>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-stone-500">Prix unitaire estimé</span>
                            <div class="text-2xl font-serif font-bold text-stone-900">2,50 € <span class="text-xs font-normal text-stone-500">/ pièce</span></div>
                        </div>
                        <a href="{{ route('editor', 'mariage-dorure') }}" class="px-6 py-3.5 bg-amber-500 hover:bg-amber-600 text-stone-950 font-bold text-xs rounded-xl shadow-lg transition">
                            Personnaliser mon texte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
