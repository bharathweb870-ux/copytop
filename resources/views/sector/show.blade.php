@extends('layouts.app')

@section('title', 'Pack Communication ' . ucfirst($sector) . ' — Shri Bharathi')

@section('content')
<main class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <nav class="flex items-center space-x-2 text-xs text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-brand-orange">Accueil</a>
            <span>/</span>
            <a href="{{ route('secteurs') }}" class="hover:text-brand-orange">Secteurs</a>
            <span>/</span>
            <span class="text-gray-900 font-medium capitalize">{{ $sector }}</span>
        </nav>

        <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm space-y-6">
            <h1 class="text-3xl font-extrabold text-gray-900 capitalize">Pack Starter : {{ str_replace('-', ' ', $sector) }}</h1>
            <p class="text-gray-600 text-sm">Sélection d'équipements recommandés et d'imprimés haute visibilité pour développer votre présence commerciale.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-4">
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                    <h4 class="font-bold text-gray-900 text-sm">1. Enseigne Façade</h4>
                    <p class="text-xs text-gray-500 mt-1">Néon LED ou Caisson Lumineux Dibond</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                    <h4 class="font-bold text-gray-900 text-sm">2. Papeterie d'Accueil</h4>
                    <p class="text-xs text-gray-500 mt-1">Cartes de visite 400g Soft-touch</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                    <h4 class="font-bold text-gray-900 text-sm">3. Support de Vente</h4>
                    <p class="text-xs text-gray-500 mt-1">Flyers A5 & Dépliants 3 volets</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                    <h4 class="font-bold text-gray-900 text-sm">4. Visibilité Rue</h4>
                    <p class="text-xs text-gray-500 mt-1">Kakemono Roll-up & Stop trottoir</p>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex justify-between items-center">
                <a href="{{ route('quote') }}" class="px-6 py-3 bg-brand-orange text-white font-bold text-xs rounded-xl hover:bg-orange-600 transition">
                    Demander le Kit Complet en Devis
                </a>
            </div>
        </div>

    </div>
</main>
@endsection
