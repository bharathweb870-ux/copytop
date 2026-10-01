@extends('layouts.app')

@section('title', 'Catalogue Général — Shri Bharathi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center py-12 bg-white rounded-3xl border border-gray-200 shadow-sm">
        <h1 class="text-3xl font-extrabold text-gray-900 capitalize mb-4">Catégorie : {{ str_replace('-', ' ', $category) }}</h1>
        <p class="text-gray-500 max-w-xl mx-auto text-sm">Découvrez nos produits d'impression et de personnalisation haute qualité.</p>
        <div class="mt-8 flex justify-center space-x-4">
            <a href="{{ route('category.imprimerie') }}" class="px-6 py-3 bg-brand-orange text-white font-bold rounded-xl hover:bg-orange-600 transition">Explorer l'Imprimerie</a>
            <a href="{{ route('quote') }}" class="px-6 py-3 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 transition">Demander un Devis</a>
        </div>
    </div>
</div>
@endsection
