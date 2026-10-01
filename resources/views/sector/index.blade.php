@extends('layouts.app')

@section('title', 'Solutions d\'Impression & Enseignes par Secteur d\'Activité — Shri Bharathi')
@section('description', 'Packs d\'enseignes et imprimés adaptés à votre métier : Restauration, Hôtellerie, Événementiel, BTP, Immobilier et Commerces.')

@section('main-class', '')
@section('content')
<main class="bg-gray-50 min-h-screen pt-24 sm:pt-28 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-bold text-brand-orange uppercase tracking-widest">Solutions Métiers Sur-Mesure</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 mt-2">Votre Secteur d'Activité</h1>
            <p class="text-gray-600 text-sm mt-3">Découvrez nos kits complets de communication visuelle adaptés aux exigences de votre profession.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Sector 1: Restauration -->
            <a href="{{ route('secteur.show', 'restauration') }}" class="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm hover:shadow-xl transition group flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-orange-100 text-brand-orange flex items-center justify-center text-2xl font-bold mb-6 group-hover:scale-110 transition">
                        🍽️
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-brand-orange transition">Restauration & Cafés</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Menus indéchirables lavables, stop-trottoirs, enseignes lumineuses néon, ronds de serviette et porte-menus.</p>
                </div>
                <div class="mt-8 pt-4 border-t border-gray-100 flex items-center text-xs font-bold text-brand-orange">
                    <span>Découvrir le Pack Restauration</span>
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>

            <!-- Sector 2: Hôtellerie & Luxe -->
            <a href="{{ route('secteur.show', 'hotellerie') }}" class="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm hover:shadow-xl transition group flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl font-bold mb-6 group-hover:scale-110 transition">
                        🏨
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-amber-600 transition">Hôtellerie & Salons de Luxe</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Plaques d'accueil gravées en laiton, accroche-portes, signalétique d'étage PMMA et cartes de chambre.</p>
                </div>
                <div class="mt-8 pt-4 border-t border-gray-100 flex items-center text-xs font-bold text-amber-600">
                    <span>Découvrir le Pack Hôtellerie</span>
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>

            <!-- Sector 3: Immobilier & BTP -->
            <a href="{{ route('secteur.show', 'immobilier') }}" class="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm hover:shadow-xl transition group flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl font-bold mb-6 group-hover:scale-110 transition">
                        🏗️
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition">Immobilier & BTP / Chantier</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Panneaux Akylux Vendu / A Vendre, bâches de chantier alvéolaires, panneaux de permis de construire.</p>
                </div>
                <div class="mt-8 pt-4 border-t border-gray-100 flex items-center text-xs font-bold text-blue-600">
                    <span>Découvrir le Pack Immobilier</span>
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>
        </div>
    </div>
</main>
@endsection
