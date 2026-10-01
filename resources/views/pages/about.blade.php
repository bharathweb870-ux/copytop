@extends('layouts.app')

@section('title', 'À Propos — Shri Bharathi Impression & Signalétique')
@section('description', 'Découvrez l\'histoire de Shri Bharathi, nos ateliers d\'impression et d\'usinage d\'enseignes, notre parc machine haute technologie.')

@section('main-class', '')
@section('content')
<main class="bg-gray-50 min-h-screen pt-24 sm:pt-28 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Hero Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold text-brand-orange uppercase tracking-widest">Savoir-Faire & Innovation</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900">L'Excellence Graphique & Architecturale</h1>
            <p class="text-gray-600 text-base leading-relaxed">
                Depuis plus de 15 ans, Shri Bharathi accompagne les entreprises, créateurs et particuliers dans la concrétisation visuelle de leurs projets.
            </p>
        </div>

        <!-- Atelier & Parc Machine -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-4">
                <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Atelier de Fabrication</span>
                <h2 class="text-2xl font-bold text-gray-900">Des équipements de pointe pour des finitions irréprochables</h2>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Notre parc machine intègre des presses offset grand format, des tables de découpe numérique Zünd, des lasers de gravure haute précision et une chaîne d'assemblage néon LED.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="bg-white p-4 rounded-2xl border border-gray-200">
                        <div class="text-2xl font-bold text-brand-orange">2 500 m²</div>
                        <div class="text-[10px] text-gray-500">Surface d'atelier</div>
                    </div>
                    <div class="bg-white p-4 rounded-2xl border border-gray-200">
                        <div class="text-2xl font-bold text-brand-orange">+ 50 000</div>
                        <div class="text-[10px] text-gray-500">Projets concrétisés</div>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl overflow-hidden border border-gray-200 shadow-xl">
                <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80" alt="Atelier Shri Bharathi" class="w-full h-80 object-cover">
            </div>
        </div>

    </div>
</main>
@endsection
