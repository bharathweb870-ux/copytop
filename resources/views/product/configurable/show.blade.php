@extends('layouts.app')

@section('title', 'Cartes de Visite Impression Premium — Shri Bharathi')
@section('description', 'Impression cartes de visite de haute qualité. Grand choix de papiers, dorure à chaud, vernis 3D et pelliculage soft-touch. Livraison rapide.')

@section('content')
<main class="bg-gray-50 py-10" x-data="productConfigurator()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-xs text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-brand-orange transition">Accueil</a>
            <span>/</span>
            <a href="{{ route('category.imprimerie') }}" class="hover:text-brand-orange transition">Imprimerie</a>
            <span>/</span>
            <span class="text-gray-900 font-medium">Cartes de visite Premium</span>
        </nav>

        <!-- Product Configurator Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left Column: Visual Gallery & Studio Banner -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Main Preview Image Container -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm relative overflow-hidden group">
                    <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden bg-gray-100 flex items-center justify-center">
                        <img :src="currentImage" x-on:error="currentImage = '{{ asset('images/placeholder-card.svg') }}'" alt="Aperçu Cartes de Visite" class="w-full h-80 object-cover rounded-xl transition duration-500 group-hover:scale-105">
                    </div>
                    
                    <!-- Interactive Finishes Badges & Title -->
                    <div class="absolute top-6 left-6 sm:top-8 sm:left-8 flex flex-col space-y-2 z-10">
                        <span class="text-xs font-bold text-gray-900 bg-white/90 backdrop-blur px-2.5 py-1 rounded-lg border border-gray-200/80 shadow-xs w-max mb-1">
                            Business Card Overview
                        </span>
                        <span x-show="selectedLamination === 'soft-touch'" class="bg-stone-900 text-amber-400 text-[10px] font-bold px-3 py-1 rounded-full shadow border border-amber-400/30 w-max">
                            ✨ Velvety Soft-Touch
                        </span>
                        <span x-show="selectedLamination === 'dorure'" class="bg-amber-500 text-stone-950 text-[10px] font-extrabold px-3 py-1 rounded-full shadow w-max">
                            👑 24K Gold Hot Foil Stamping
                        </span>
                        <span x-show="selectedCorners === 'rounded'" class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full shadow w-max">
                            ⭕ 5mm Rounded Corners
                        </span>
                    </div>
                </div>

                <!-- Gallery Thumbnails -->
                <div class="grid grid-cols-4 gap-3">
                    <template x-for="(img, idx) in gallery" :key="idx">
                        <button @click="currentImage = img" :class="{'ring-2 ring-brand-orange': currentImage === img}" class="bg-white p-1 rounded-xl border border-gray-200 overflow-hidden hover:opacity-90 transition">
                            <img :src="img" x-on:error="$el.src = '{{ asset('images/placeholder-card.svg') }}'" class="w-full h-16 object-cover rounded-lg">
                        </button>
                    </template>
                </div>

                <!-- Online Designer Banner CTA -->
                <div class="bg-gradient-to-r from-gray-900 to-stone-900 rounded-2xl p-6 text-white border border-gray-800 flex items-center justify-between shadow-lg">
                    <div class="space-y-1 pr-4">
                        <span class="text-[10px] font-bold text-brand-orange uppercase tracking-wider">Pas de fichier prêt ?</span>
                        <h4 class="text-base font-bold">Créez votre carte avec notre Équipement Studio</h4>
                        <p class="text-xs text-gray-400">Plus de 120 modèles professionnels personnalisables gratuitement.</p>
                    </div>
                    <a href="{{ route('templates') }}" class="px-4 py-2.5 bg-brand-orange hover:bg-orange-600 text-white text-xs font-bold rounded-xl transition whitespace-nowrap shadow-md">
                        Ouvrir le Studio
                    </a>
                </div>

                <!-- Product Specifications Tabs -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Contrôle Fichier & Garanties Shri Bharathi</h3>
                    <div class="grid grid-cols-2 gap-4 text-xs text-gray-600">
                        <div class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-green-5 font-bold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Vérification humaine des fonds perdus (3mm) et CMJN</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-green-500 font-bold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>BAT numérique HD offert envoyé avant impression</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-green-500 font-bold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Gabarits PDF, AI, PSD disponibles au téléchargement</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-green-500 font-bold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Impression offset / numérique haute définition 2400 dpi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Options & Dynamic Price Form -->
            <div class="lg:col-span-6 space-y-6">
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-xl space-y-6">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-brand-orange uppercase tracking-wider">Catalogue Imprimerie</span>
                            <span class="text-xs text-green-600 font-semibold flex items-center">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5 animate-pulse"></span> Expédition sous 48h
                            </span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-1">Cartes de Visite Personnalisées</h1>
                        <p class="text-gray-500 text-xs mt-1">Configurez chaque élément de votre carte pour refléter votre niveau d'exigence.</p>
                    </div>

                    <!-- Step 1: Format -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase">1. Format de carte</label>
                        <div class="grid grid-cols-3 gap-3">
                            <template x-for="fmt in formats" :key="fmt.id">
                                <button @click="selectedFormat = fmt.id" :class="{'border-brand-orange bg-orange-50/50 text-brand-orange font-bold': selectedFormat === fmt.id, 'border-gray-200 text-gray-700 hover:border-gray-300': selectedFormat !== fmt.id}" class="p-3 rounded-xl border text-xs text-left transition relative">
                                    <div x-text="fmt.name" class="font-semibold"></div>
                                    <div x-text="fmt.dims" class="text-[10px] opacity-75"></div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Step 2: Paper -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase">2. Type de Papier</label>
                        <div class="grid grid-cols-2 gap-3">
                            <template x-for="p in papers" :key="p.id">
                                <button @click="selectedPaper = p.id" :class="{'border-brand-orange bg-orange-50/50 text-brand-orange': selectedPaper === p.id, 'border-gray-200 text-gray-700 hover:border-gray-300': selectedPaper !== p.id}" class="p-3 rounded-xl border text-xs text-left transition">
                                    <div class="flex items-center justify-between">
                                        <span x-text="p.name" class="font-bold"></span>
                                        <span x-text="'+' + p.priceMultiplier + '€'" class="text-[10px] bg-gray-100 px-1.5 py-0.5 rounded text-gray-500"></span>
                                    </div>
                                    <div x-text="p.desc" class="text-[10px] text-gray-500 mt-1"></div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Step 3: Lamination & Finishes -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase">3. Pelliculage & Finition Prestige</label>
                        <div class="grid grid-cols-2 gap-3">
                            <template x-for="lam in laminations" :key="lam.id">
                                <button @click="selectedLamination = lam.id" :class="{'border-brand-orange bg-orange-50/50 text-brand-orange': selectedLamination === lam.id, 'border-gray-200 text-gray-700 hover:border-gray-300': selectedLamination !== lam.id}" class="p-3 rounded-xl border text-xs text-left transition">
                                    <div class="font-bold" x-text="lam.name"></div>
                                    <div class="text-[10px] text-gray-500" x-text="lam.desc"></div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Step 4: Corner Finish -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase">4. Coins</label>
                        <div class="grid grid-cols-2 gap-3">
                            <button @click="selectedCorners = 'straight'" :class="{'border-brand-orange bg-orange-50/50 font-bold text-brand-orange': selectedCorners === 'straight', 'border-gray-200 text-gray-700': selectedCorners !== 'straight'}" class="p-3 rounded-xl border text-xs text-center transition">
                                ⬛ Coins Droits (Standard)
                            </button>
                            <button @click="selectedCorners = 'rounded'" :class="{'border-brand-orange bg-orange-50/50 font-bold text-brand-orange': selectedCorners === 'rounded', 'border-gray-200 text-gray-700': selectedCorners !== 'rounded'}" class="p-3 rounded-xl border text-xs text-center transition">
                                ⭕ Coins Arrondis 5mm (+12€)
                            </button>
                        </div>
                    </div>

                    <!-- Step 5: Quantity selection table -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-bold text-gray-700 uppercase">5. Quantité & Tarif dégressif</label>
                            <span class="text-[10px] text-brand-orange font-semibold">Prix unitaire dégressif jusqu'à -60%</span>
                        </div>
                        <div class="grid grid-cols-3 sm:grid-cols-6 gap-2">
                            <template x-for="qty in quantities" :key="qty">
                                <button @click="selectedQty = qty" :class="{'bg-brand-orange text-white font-bold ring-2 ring-orange-500/50': selectedQty === qty, 'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedQty !== qty}" class="py-2.5 rounded-xl text-xs transition text-center">
                                    <div x-text="qty" class="font-bold"></div>
                                    <div class="text-[9px] opacity-75">ex.</div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Step 6: File Upload Zone -->
                    <div class="space-y-2 pt-2 border-t border-gray-100">
                        <label class="block text-xs font-bold text-gray-700 uppercase">6. Vos fichiers d'impression</label>
                        <div class="border-2 border-dashed border-gray-300 hover:border-brand-orange rounded-2xl p-4 text-center cursor-pointer transition bg-gray-50/50" @click="$refs.fileInput.click()">
                            <input type="file" x-ref="fileInput" class="hidden" @change="handleFileUpload($event)">
                            <div x-show="!uploadedFileName">
                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <div class="text-xs font-semibold text-gray-700">Glissez votre fichier ici ou <span class="text-brand-orange underline">Parcourir</span></div>
                                <div class="text-[10px] text-gray-400 mt-0.5">Formats acceptés : PDF, EPS, AI, TIFF (Min. 300 DPI)</div>
                            </div>
                            <div x-show="uploadedFileName" class="text-xs font-bold text-green-600 flex items-center justify-center space-x-2">
                                <span>📄 Fichier joint : <span x-text="uploadedFileName" class="text-gray-900"></span></span>
                                <span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full">Prêt pour le BAT</span>
                            </div>
                        </div>
                    </div>

                    <!-- Live Price Calculator Summary Box -->
                    <div class="bg-gray-900 text-white rounded-2xl p-6 space-y-4 shadow-xl">
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-[10px] text-gray-400 uppercase tracking-widest">Total de votre configuration</span>
                                <div class="text-2xl sm:text-3xl font-extrabold text-white mt-0.5">
                                    <span x-text="totalPriceHT"></span> € <span class="text-xs font-normal text-gray-400">HT</span>
                                </div>
                                <div class="text-xs text-gray-400">
                                    Soit <span x-text="totalPriceTTC"></span> € TTC (TVA 20%) — <span x-text="unitPrice" class="text-amber-400 font-bold"></span> €/pc
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-green-400 font-bold">Livraison sous 48h-72h</div>
                                <div class="text-[10px] text-gray-400">Transporteur Express</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 pt-2">
                            <button @click="addToCart()" class="flex-1 py-4 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-brand-orange/30 transition flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>Ajouter au Panier</span>
                            </button>
                            <a href="{{ route('quote') }}?product=cartes-de-visite" class="px-4 py-4 bg-gray-800 hover:bg-gray-700 text-gray-300 font-semibold text-xs rounded-xl border border-gray-700 transition whitespace-nowrap">
                                Devis PDF
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<script>
function productConfigurator() {
    return {
        selectedFormat: 'standard',
        selectedPaper: 'couche350',
        selectedLamination: 'soft-touch',
        selectedCorners: 'straight',
        selectedQty: 500,
        uploadedFileName: '',
        gallery: [
            '{{ asset('images/placeholder-card.svg') }}',
            'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80'
        ],
        currentImage: '{{ asset('images/placeholder-card.svg') }}',
        
        formats: [
            { id: 'standard', name: 'Standard', dims: '85 x 54 mm' },
            { id: 'square', name: 'Carré', dims: '65 x 65 mm' },
            { id: 'us', name: 'Américain', dims: '90 x 50 mm' }
        ],
        papers: [
            { id: 'couche350', name: '350g Couché Mat', desc: 'Le standard rigide classique', priceMultiplier: 0 },
            { id: 'premium400', name: '400g Ultra Rigide', desc: 'Maximale tenue en main', priceMultiplier: 12 },
            { id: 'cotton350', name: '350g Coton Naturel', desc: 'Toucher papier création artisanal', priceMultiplier: 25 },
            { id: 'kraft300', name: '300g Kraft Éco', desc: 'Look brut & éco-responsable', priceMultiplier: 15 }
        ],
        laminations: [
            { id: 'none', name: 'Sans Pelliculage', desc: 'Rendu naturel du papier' },
            { id: 'mat', name: 'Pelliculage Mat', desc: 'Anti-rayures et élégant' },
            { id: 'soft-touch', name: 'Soft-Touch (Peau de pêche)', desc: 'Toucher velours satiné haut de gamme' },
            { id: 'dorure', name: 'Dorure à Chaud Or / Vernis 3D', desc: 'Relief brillant et luxueux' }
        ],
        quantities: [100, 250, 500, 1000, 2500, 5000],

        get totalPriceHT() {
            let base = 29.00;
            if (this.selectedQty === 250) base = 39.00;
            if (this.selectedQty === 500) base = 49.00;
            if (this.selectedQty === 1000) base = 79.00;
            if (this.selectedQty === 2500) base = 149.00;
            if (this.selectedQty === 5000) base = 249.00;

            const paperObj = this.papers.find(p => p.id === this.selectedPaper);
            if (paperObj) base += paperObj.priceMultiplier;

            if (this.selectedLamination === 'soft-touch') base += 15;
            if (this.selectedLamination === 'dorure') base += 45;
            if (this.selectedCorners === 'rounded') base += 12;

            return base.toFixed(2);
        },

        get totalPriceTTC() {
            return (parseFloat(this.totalPriceHT) * 1.20).toFixed(2);
        },

        get unitPrice() {
            return (parseFloat(this.totalPriceHT) / this.selectedQty).toFixed(3);
        },

        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.uploadedFileName = file.name;
            }
        },

        addToCart() {
            alert('Article configuré avec succès ! ' + this.selectedQty + ' cartes de visite ajoutées au panier pour ' + this.totalPriceTTC + '€ TTC.');
            window.location.href = "{{ route('cart') }}";
        }
    }
}
</script>
@endsection
