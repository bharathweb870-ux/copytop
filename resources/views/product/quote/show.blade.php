@extends('layouts.app')

@section('title', 'Enseigne & Lettrage 3D Sur-Mesure — Shri Bharathi')
@section('description', 'Demandez votre devis personnalisé pour enseigne lumineuse, lettres relief 3D, panneau Dibond et habillage de devanture.')

@section('content')
<main class="bg-gray-900 text-white py-12" x-data="quoteProductForm()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-xs text-gray-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
            <span>/</span>
            <a href="{{ route('category.enseignes') }}" class="hover:text-white transition">Enseignes & Signalétique</a>
            <span>/</span>
            <span class="text-brand-orange font-medium">Sur-Mesure & Pose</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left Side Showcase -->
            <div class="lg:col-span-6 space-y-6">
                <div class="relative rounded-3xl overflow-hidden border border-gray-700 bg-gray-800 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b3?auto=format&fit=crop&w=800&q=80" alt="Enseigne relief 3D" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 bg-gray-900/90 backdrop-blur-md p-4 rounded-xl border border-gray-700">
                        <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest">Sur Devis Unique</span>
                        <h2 class="text-lg font-bold text-white">Lettrage Boîtier 3D Rétro-Éclairé LED</h2>
                        <p class="text-xs text-gray-400 mt-1">Conception vectorielle, découpe numérique 5 axes et pose agréée sur façade.</p>
                    </div>
                </div>

                <!-- Process Steps -->
                <div class="bg-gray-800/60 border border-gray-700 rounded-2xl p-6 space-y-4">
                    <h3 class="text-xs font-bold text-amber-400 uppercase tracking-wider">Comment se déroule votre projet sur-mesure ?</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                        <div class="space-y-1">
                            <div class="text-brand-orange font-bold">1. Étude & Devis sous 24h</div>
                            <div class="text-gray-400">Simulation tarifaire et validation des dimensions.</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-brand-orange font-bold">2. Maquette BAT 3D</div>
                            <div class="text-gray-400">Insertion visuelle sur photo de votre devanture.</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-brand-orange font-bold">3. Fabrication & Pose</div>
                            <div class="text-gray-400">Usinage dans nos ateliers et installation sécurisée.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side Interactive Quote Calculator / Form -->
            <div class="lg:col-span-6">
                <div class="bg-gray-800/90 border border-gray-700 rounded-3xl p-6 sm:p-8 space-y-6 shadow-2xl">
                    <div>
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Formulaire Devis Instantané</span>
                        <h1 class="text-2xl font-extrabold text-white mt-1">Spécifiez les dimensions de votre Enseigne</h1>
                        <p class="text-gray-400 text-xs mt-1">Obtenez une première fourchette budgétaire automatique avant validation par notre bureau d'études.</p>
                    </div>

                    <!-- Material selection -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-300 uppercase">Matériau de structure</label>
                        <select x-model="material" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-xs text-white focus:border-brand-orange outline-none">
                            <option value="dibond">Aluminium Dibond 3mm (Ultra résistant)</option>
                            <option value="pvc">PVC Housse 10mm (Léger & Économique)</option>
                            <option value="plexis">Plexiglas Coulé PMMA (Brillance Cristal)</option>
                            <option value="laiton">Laiton Poli / Inox Brossé Prestige</option>
                        </select>
                    </div>

                    <!-- Dimensions input slider / numeric -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-300 uppercase">Largeur (cm)</label>
                            <input type="number" x-model="width" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white font-bold focus:border-brand-orange outline-none">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-300 uppercase">Hauteur (cm)</label>
                            <input type="number" x-model="height" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white font-bold focus:border-brand-orange outline-none">
                        </div>
                    </div>

                    <!-- Lighting mode -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-300 uppercase">Éclairage LED</label>
                        <div class="grid grid-cols-3 gap-2">
                            <button @click="lighting = 'none'" :class="{'border-brand-orange bg-brand-orange/20 text-brand-orange font-bold': lighting === 'none', 'border-gray-700 bg-gray-900 text-gray-400': lighting !== 'none'}" class="py-2.5 rounded-xl text-xs border transition">
                                Non éclairé
                            </button>
                            <button @click="lighting = 'direct'" :class="{'border-brand-orange bg-brand-orange/20 text-brand-orange font-bold': lighting === 'direct', 'border-gray-700 bg-gray-900 text-gray-400': lighting !== 'direct'}" class="py-2.5 rounded-xl text-xs border transition">
                                Face Lumineuse
                            </button>
                            <button @click="lighting = 'retro'" :class="{'border-brand-orange bg-brand-orange/20 text-brand-orange font-bold': lighting === 'retro', 'border-gray-700 bg-gray-900 text-gray-400': lighting !== 'retro'}" class="py-2.5 rounded-xl text-xs border transition">
                                Rétro-éclairé 3D
                            </button>
                        </div>
                    </div>

                    <!-- Installation Option -->
                    <div class="flex items-center space-x-3 bg-gray-900/60 p-3 rounded-xl border border-gray-700/60">
                        <input type="checkbox" x-model="needInstallation" id="install" class="w-4 h-4 text-brand-orange rounded bg-gray-800 border-gray-700 focus:ring-brand-orange">
                        <label for="install" class="text-xs text-gray-300 font-medium cursor-pointer">
                            Je souhaite une installation sur site par une équipe certifiée Shri Bharathi
                        </label>
                    </div>

                    <!-- Estimation Range Box -->
                    <div class="bg-gray-950 p-6 rounded-2xl border border-amber-500/30 text-center space-y-2">
                        <span class="text-[10px] text-amber-400 uppercase tracking-widest">Estimation Budgétaire Indicative</span>
                        <div class="text-3xl font-extrabold text-amber-400">
                            <span x-text="estimatedMin"></span> € — <span x-text="estimatedMax"></span> € <span class="text-xs text-gray-400 font-normal">HT</span>
                        </div>
                        <p class="text-[10px] text-gray-400">Calcul basé sur la surface de <span x-text="(width * height / 10000).toFixed(2)" class="font-bold text-white"></span> m².</p>
                    </div>

                    <a href="{{ route('quote') }}?type=enseigne-sur-mesure" class="w-full py-4 bg-brand-orange hover:bg-orange-600 text-white font-extrabold text-sm rounded-xl transition text-center shadow-lg shadow-brand-orange/30 block">
                        Transmettre ce projet au Bureau d'Études
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function quoteProductForm() {
    return {
        material: 'dibond',
        width: 200,
        height: 60,
        lighting: 'retro',
        needInstallation: true,

        get estimatedMin() {
            let area = (this.width * this.height) / 10000;
            let base = area * 180;
            if (this.lighting === 'direct') base += 150;
            if (this.lighting === 'retro') base += 280;
            if (this.needInstallation) base += 200;
            return Math.round(base);
        },

        get estimatedMax() {
            return Math.round(this.estimatedMin * 1.25);
        }
    }
}
</script>
@endsection
