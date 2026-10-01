@extends('layouts.app')

@section('title', 'Contactez-nous — Shri Bharathi')
@section('description', 'Prenez contact avec notre équipe commerciale et nos graphistes conseillers.')

@section('content')
<main class="bg-gray-50 min-h-screen py-12" x-data="{ sent: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-brand-orange uppercase tracking-widest">À Votre Écoute</span>
            <h1 class="text-3xl font-extrabold text-gray-900 mt-2">Contactez Notre Équipe</h1>
            <p class="text-gray-600 text-sm mt-2">Une question technique sur un fichier ou une demande d'intervention sur site ? Nous vous répondons en moins de 2 heures.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left Info Panel -->
            <div class="lg:col-span-5 bg-gray-900 text-white p-8 rounded-3xl space-y-6 shadow-xl">
                <h3 class="text-xl font-bold">Nos Coordonnées</h3>
                <div class="space-y-4 text-xs">
                    <div class="flex items-start space-x-3">
                        <span class="text-amber-400">📍</span>
                        <div>
                            <div class="font-bold">Atelier & Showroom Principal</div>
                            <div class="text-gray-400">124 Avenue de la Grande Armée, 75017 Paris</div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <span class="text-amber-400">📞</span>
                        <div>
                            <div class="font-bold">Téléphone Client</div>
                            <div class="text-gray-400">01 40 00 00 00 (Lun-Ven 8h30-19h)</div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <span class="text-amber-400">✉️</span>
                        <div>
                            <div class="font-bold">Email Direct</div>
                            <div class="text-gray-400">contact@shri-bharathi.fr</div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-800 text-[10px] text-gray-400 space-y-1">
                    <div class="font-bold text-gray-200">Horaires d'ouverture de l'Atelier :</div>
                    <div>Lundi - Vendredi : 08h30 – 19h00 (Non-stop)</div>
                    <div>Samedi : 09h30 – 17h00 (Sur rendez-vous)</div>
                </div>
            </div>

            <!-- Right Contact Form -->
            <div class="lg:col-span-7 bg-white p-8 rounded-3xl border border-gray-200 shadow-sm">
                <div x-show="!sent" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-700 uppercase">Nom & Prénom</label>
                            <input type="text" placeholder="Votre nom" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-900 outline-none focus:border-brand-orange">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-700 uppercase">Email</label>
                            <input type="email" placeholder="votre@email.fr" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-900 outline-none focus:border-brand-orange">
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-700 uppercase">Sujet de votre message</label>
                        <input type="text" placeholder="Ex: Renseignement sur les enseignes néon" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-900 outline-none focus:border-brand-orange">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-700 uppercase">Votre Message</label>
                        <textarea rows="4" placeholder="Exprimez votre besoin..." class="w-full bg-gray-50 border border-gray-200 rounded-xl p-4 text-xs text-gray-900 outline-none focus:border-brand-orange"></textarea>
                    </div>
                    <button @click="sent = true" class="w-full py-3.5 bg-brand-orange hover:bg-orange-600 text-white font-bold text-xs rounded-xl shadow-lg transition">
                        Envoyer mon Message
                    </button>
                </div>

                <div x-show="sent" class="py-12 text-center space-y-3">
                    <span class="text-4xl">✅</span>
                    <h3 class="text-xl font-bold text-gray-900">Message envoyé avec succès !</h3>
                    <p class="text-xs text-gray-500">Un conseiller Shri Bharathi étudie votre demande et vous recontacte dans les plus brefs délais.</p>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
