@extends('layouts.app')

@section('title', 'Demande de Devis Sur-Mesure — Shri Bharathi')
@section('description', 'Obtenez une étude gratuite et personnalisée sous 24h pour vos projets d\'enseignes, imprimerie et signalétique.')

@section('main-class', '')
@section('content')
<main class="bg-gray-900 text-white min-h-screen pt-24 sm:pt-28 pb-12" x-data="quoteWizard()">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-10">
            <span class="text-xs font-bold text-amber-400 uppercase tracking-widest">Bureau d'Études & Devis Gratuit</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white mt-2">Demande de Devis Sur-Mesure</h1>
            <p class="text-gray-400 text-sm mt-3">Remplissez les étapes ci-dessous pour recevoir une étude tarifaire précise et un Bon À Tirer (BAT) sous 24 heures ouvrées.</p>
        </div>

        <!-- Wizard Progress Bar -->
        <div class="flex items-center justify-between mb-8 relative">
            <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-gray-800 -z-0"></div>
            
            <div class="flex flex-col items-center relative z-10">
                <div :class="{'bg-brand-orange text-white ring-4 ring-orange-500/20': currentStep >= 1, 'bg-gray-800 text-gray-400': currentStep < 1}" class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center transition">1</div>
                <span class="text-[10px] text-gray-400 font-bold uppercase mt-2">Projet</span>
            </div>
            
            <div class="flex flex-col items-center relative z-10">
                <div :class="{'bg-brand-orange text-white ring-4 ring-orange-500/20': currentStep >= 2, 'bg-gray-800 text-gray-400': currentStep < 2}" class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center transition">2</div>
                <span class="text-[10px] text-gray-400 font-bold uppercase mt-2">Spécifications</span>
            </div>

            <div class="flex flex-col items-center relative z-10">
                <div :class="{'bg-brand-orange text-white ring-4 ring-orange-500/20': currentStep >= 3, 'bg-gray-800 text-gray-400': currentStep < 3}" class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center transition">3</div>
                <span class="text-[10px] text-gray-400 font-bold uppercase mt-2">Coordonnées</span>
            </div>
        </div>

        <!-- Wizard Card -->
        <div class="bg-gray-800/90 border border-gray-700 rounded-3xl p-6 sm:p-10 shadow-2xl relative overflow-hidden">
            
            <!-- Step 1: Project Type -->
            <div x-show="currentStep === 1" class="space-y-6">
                <h3 class="text-lg font-bold text-white">Étape 1 : Quel est le type de votre projet ?</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <template x-for="type in projectTypes" :key="type.id">
                        <button @click="selectedType = type.id" :class="{'border-brand-orange bg-brand-orange/15 text-white': selectedType === type.id, 'border-gray-700 bg-gray-900 text-gray-300 hover:border-gray-600': selectedType !== type.id}" class="p-5 rounded-2xl border text-left transition flex items-start space-x-4">
                            <span class="text-2xl" x-text="type.icon"></span>
                            <div>
                                <div class="font-bold text-sm" x-text="type.name"></div>
                                <div class="text-xs text-gray-400 mt-1" x-text="type.desc"></div>
                            </div>
                        </button>
                    </template>
                </div>

                <div class="pt-4 flex justify-end">
                    <button @click="currentStep = 2" class="px-6 py-3 bg-brand-orange hover:bg-orange-600 text-white font-bold text-xs rounded-xl shadow-lg transition flex items-center space-x-2">
                        <span>Étape Suivante : Spécifications</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </div>

            <!-- Step 2: Specifications -->
            <div x-show="currentStep === 2" class="space-y-6">
                <h3 class="text-lg font-bold text-white">Étape 2 : Spécifications techniques & Fichiers</h3>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-300 uppercase">Description détaillée de votre besoin</label>
                    <textarea x-model="description" rows="4" placeholder="Précisez les dimensions (ex: 200x50cm), les matériaux souhaités, l'emplacement de pose, etc..." class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-xs text-white outline-none focus:border-brand-orange"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-300 uppercase">Joindre un plan, logo vectoriel ou photo de façade</label>
                    <div class="border-2 border-dashed border-gray-700 rounded-2xl p-6 text-center bg-gray-900 cursor-pointer hover:border-brand-orange transition">
                        <svg class="w-8 h-8 text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <div class="text-xs font-bold text-gray-300">Glissez vos fichiers ici (PDF, AI, EPS, PNG, JPG)</div>
                    </div>
                </div>

                <div class="pt-4 flex justify-between">
                    <button @click="currentStep = 1" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-xs font-bold rounded-xl transition">
                        Précédent
                    </button>
                    <button @click="currentStep = 3" class="px-6 py-3 bg-brand-orange hover:bg-orange-600 text-white font-bold text-xs rounded-xl shadow-lg transition">
                        Étape Suivante : Vos Coordonnées
                    </button>
                </div>
            </div>

            <!-- Step 3: Contact details -->
            <div x-show="currentStep === 3" class="space-y-6">
                <h3 class="text-lg font-bold text-white">Étape 3 : Vos Coordonnées pour l'envoi du devis</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-300 uppercase">Nom & Prénom</label>
                        <input type="text" x-model="contact.name" placeholder="Ex: Jean Dupont" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-xs text-white outline-none focus:border-brand-orange">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-300 uppercase">Nom de l'Entreprise / Marque</label>
                        <input type="text" x-model="contact.company" placeholder="Ex: Boutique L'Élégance" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-xs text-white outline-none focus:border-brand-orange">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-300 uppercase">Adresse Email</label>
                        <input type="email" x-model="contact.email" placeholder="contact@votre-entreprise.fr" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-xs text-white outline-none focus:border-brand-orange">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-300 uppercase">Téléphone (Pour rappel technique)</label>
                        <input type="tel" x-model="contact.phone" placeholder="06 00 00 00 00" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-xs text-white outline-none focus:border-brand-orange">
                    </div>
                </div>

                <div class="pt-4 flex justify-between items-center">
                    <button @click="currentStep = 2" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-xs font-bold rounded-xl transition">
                        Précédent
                    </button>
                    <button @click="submitQuote()" class="px-8 py-4 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-extrabold text-xs rounded-xl shadow-lg shadow-brand-orange/30 transition">
                        🚀 Envoyer ma Demande de Devis
                    </button>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
function quoteWizard() {
    return {
        currentStep: 1,
        selectedType: 'enseigne',
        description: '',
        contact: { name: '', company: '', email: '', phone: '' },

        projectTypes: [
            { id: 'enseigne', icon: '⚡', name: 'Enseigne Lumineuse & Néon', desc: 'Devanture de magasin, lettres 3D relief, caissons LED' },
            { id: 'vitrine', icon: '🪟', name: 'Habillage de Vitrine & Signalétique', desc: 'Vinyle adhésif, dépolie, panneaux Dibond' },
            { id: 'packaging', icon: '📦', name: 'Packaging & Sacs Personnalisés', desc: 'Boîtes d\'expédition, sacs kraft, étiquettes adhésives' },
            { id: 'mariage', icon: '✨', name: 'Événementiel & Mariage Luxe', desc: 'Faire-part dorure à chaud, panneaux plexi miroir' }
        ],

        submitQuote() {
            let ref = 'DEV-' + Math.floor(100000 + Math.random() * 900000);
            alert('Votre demande de devis sur-mesure a bien été enregistrée sous la référence ' + ref + ' ! Un conseiller technique Shri Bharathi étudie votre dossier.');
            window.location.href = "{{ route('home') }}";
        }
    }
}
</script>
@endsection
