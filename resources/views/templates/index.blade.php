@extends('layouts.app')

@section('title', 'Modèles & Templates Prêts à l\'Emploi — Shri Bharathi')
@section('description', 'Parcourez nos 500+ modèles graphiques gratuits pour cartes de visite, faire-part de mariage, flyers, brochures et menus de restaurant.')

@section('content')
<main class="bg-gray-50 min-h-screen py-10" x-data="{ activeCategory: 'all', searchQuery: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-10">
            <span class="text-xs font-bold text-brand-orange uppercase tracking-widest">Studio de Création Shri Bharathi</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 mt-2">Choisissez un Modèle Graphique</h1>
            <p class="text-gray-600 text-sm mt-3">Sélectionnez un design créé par nos graphistes, puis personnalisez les textes, couleurs et logos directement dans votre navigateur.</p>
            
            <!-- Search Bar -->
            <div class="mt-6 relative max-w-xl mx-auto">
                <input type="text" x-model="searchQuery" placeholder="Rechercher un thème (ex. Mariage champêtre, Restaurant sushi, Carte de visite dorée)..." class="w-full bg-white border border-gray-300 rounded-2xl pl-12 pr-4 py-3.5 text-sm text-gray-900 shadow-sm focus:border-brand-orange focus:ring-2 focus:ring-orange-200 outline-none">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
        </div>

        <!-- Filter Tags -->
        <div class="flex items-center justify-center space-x-2 overflow-x-auto pb-6 text-xs no-scrollbar">
            <button @click="activeCategory = 'all'" :class="{'bg-gray-900 text-white font-bold': activeCategory === 'all', 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200': activeCategory !== 'all'}" class="px-4 py-2 rounded-xl transition whitespace-nowrap">Tous les modèles (500+)</button>
            <button @click="activeCategory = 'mariage'" :class="{'bg-gray-900 text-white font-bold': activeCategory === 'mariage', 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200': activeCategory !== 'mariage'}" class="px-4 py-2 rounded-xl transition whitespace-nowrap">💍 Mariage & Faire-part</button>
            <button @click="activeCategory = 'business'" :class="{'bg-gray-900 text-white font-bold': activeCategory === 'business', 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200': activeCategory !== 'business'}" class="px-4 py-2 rounded-xl transition whitespace-nowrap">💼 Cartes de Visite Business</button>
            <button @click="activeCategory = 'restauration'" :class="{'bg-gray-900 text-white font-bold': activeCategory === 'restauration', 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200': activeCategory !== 'restauration'}" class="px-4 py-2 rounded-xl transition whitespace-nowrap">🍽️ Menus Restaurant</button>
            <button @click="activeCategory = 'evenement'" :class="{'bg-gray-900 text-white font-bold': activeCategory === 'evenement', 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200': activeCategory !== 'evenement'}" class="px-4 py-2 rounded-xl transition whitespace-nowrap">🎉 Flyers & Affiches Soirée</button>
        </div>

        <!-- Template Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pt-4">
            
            <!-- Template 1 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-xl transition flex flex-col">
                <div class="relative h-64 overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=80" alt="Faire-part Dorure" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <span class="absolute top-3 left-3 bg-amber-500 text-stone-950 font-extrabold text-[10px] px-2.5 py-1 rounded-md uppercase">Mariage Couture</span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-brand-orange transition">Faire-part "Elegance Botanique & Dorure"</h3>
                        <p class="text-xs text-gray-500 mt-1">Format A5 rectoverso, typo manuscrite & feuillage or.</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-green-600 font-bold">100% Personnalisable</span>
                        <a href="{{ route('editor', 'mariage-botanique') }}" class="px-4 py-2 bg-[#C9A84C] text-slate-950 font-extrabold text-xs rounded-xl hover:bg-amber-500 transition shadow-md inline-block text-center" style="background-color: #C9A84C; color: #1A1A2E;">
                            Ouvrir dans l'Éditeur
                        </a>
                    </div>
                </div>
            </div>

            <!-- Template 2 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-xl transition flex flex-col">
                <div class="relative h-64 overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=600&q=80" alt="Carte de visite Minimalist" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <span class="absolute top-3 left-3 bg-gray-900 text-white font-extrabold text-[10px] px-2.5 py-1 rounded-md uppercase">Business Modern</span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-brand-orange transition">Carte de visite "Architect Minimalist Black"</h3>
                        <p class="text-xs text-gray-500 mt-1">Format 85x54mm, idéal architectes, designers & consultants.</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-green-600 font-bold">100% Personnalisable</span>
                        <a href="{{ route('editor', 'carte-architect') }}" class="px-4 py-2 bg-[#C9A84C] text-slate-950 font-extrabold text-xs rounded-xl hover:bg-amber-500 transition shadow-md inline-block text-center" style="background-color: #C9A84C; color: #1A1A2E;">
                            Ouvrir dans l'Éditeur
                        </a>
                    </div>
                </div>
            </div>

            <!-- Template 3 -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group hover:shadow-xl transition flex flex-col">
                <div class="relative h-64 overflow-hidden bg-gray-100">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80" alt="Menu Restaurant Bistronomique" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <span class="absolute top-3 left-3 bg-red-600 text-white font-extrabold text-[10px] px-2.5 py-1 rounded-md uppercase">Menu Restaurant</span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-brand-orange transition">Menu Restaurant "Bistronomie Gourmande"</h3>
                        <p class="text-xs text-gray-500 mt-1">Format A4 pliable 2 volets, mise en page moderne pour vins & plats.</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-green-600 font-bold">100% Personnalisable</span>
                        <a href="{{ route('editor', 'menu-bistro') }}" class="px-4 py-2 bg-[#C9A84C] text-slate-950 font-extrabold text-xs rounded-xl hover:bg-amber-500 transition shadow-md inline-block text-center" style="background-color: #C9A84C; color: #1A1A2E;">
                            Ouvrir dans l'Éditeur
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
