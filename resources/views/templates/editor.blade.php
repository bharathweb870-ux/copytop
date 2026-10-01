@extends('layouts.app')

@section('title', 'Studio d\'Édition Graphique en Ligne — Shri Bharathi')
@section('description', 'Éditeur de création visuelle professionnel en ligne. Personnalisez vos imprimés en direct.')

@section('content')
<main class="bg-gray-950 text-white min-h-[calc(100vh-4rem)] flex flex-col" x-data="graphicEditor()">
    <!-- Editor Top Action Bar -->
    <header class="bg-gray-900 border-b border-gray-800 px-3 py-2 sm:px-4 sm:py-3 flex flex-wrap sm:flex-nowrap items-center justify-between gap-2 z-20 max-w-full overflow-hidden">
        <div class="flex items-center space-x-2 sm:space-x-4">
            <a href="{{ route('templates') }}" class="text-xs text-gray-400 hover:text-white flex items-center space-x-1 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span class="hidden xs:inline sm:inline">Retour</span>
            </a>
            <span class="h-4 w-px bg-gray-700 hidden sm:inline"></span>
            <div class="text-xs font-bold text-white flex items-center space-x-2 truncate">
                <span class="truncate">Modèle : <span class="text-brand-orange" x-text="templateName"></span></span>
                <span class="hidden md:inline-block bg-green-500/20 text-green-400 text-[10px] px-2 py-0.5 rounded-full border border-green-500/30 whitespace-nowrap">Mode Vectoriel CMJN</span>
            </div>
        </div>

        <!-- Center Controls: Zoom & BAT Toggle -->
        <div class="flex items-center space-x-2 text-xs flex-wrap sm:flex-nowrap">
            <button @click="showBleedLines = !showBleedLines" :class="{'bg-brand-orange text-white': showBleedLines, 'bg-gray-800 text-gray-300': !showBleedLines}" class="px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-lg border border-gray-700 font-medium transition text-[11px] sm:text-xs whitespace-nowrap">
                <span x-text="showBleedLines ? '📐 Repères Masqués' : '📐 Repères Coupe (3mm)'"></span>
            </button>
            <div class="flex items-center space-x-1 bg-gray-800 px-2 py-1 sm:px-3 sm:py-1.5 rounded-lg border border-gray-700">
                <button @click="zoom = Math.max(zoom - 10, 50)" class="hover:text-brand-orange font-bold px-1">-</button>
                <span class="w-10 text-center text-amber-400 font-bold text-[11px]" x-text="zoom + '%'"></span>
                <button @click="zoom = Math.min(zoom + 10, 200)" class="hover:text-brand-orange font-bold px-1">+</button>
            </div>
        </div>

        <!-- Right CTA Actions -->
        <div class="flex items-center space-x-2">
            <button @click="downloadProof()" class="px-2.5 py-1.5 sm:px-3.5 sm:py-2 bg-gray-800 hover:bg-gray-700 text-gray-200 text-[11px] sm:text-xs font-semibold rounded-xl border border-gray-700 transition whitespace-nowrap hidden xs:flex items-center">
                📥 Aperçu PDF
            </button>
            <button @click="saveAndValidate()" class="px-3 py-1.5 sm:px-5 sm:py-2 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-[11px] sm:text-xs font-bold rounded-xl shadow-lg shadow-brand-orange/30 transition flex items-center space-x-1 whitespace-nowrap">
                <span>Valider & Imprimer</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>
    </header>

    <!-- Main Workspace Grid -->
    <div class="flex-1 flex flex-col lg:flex-row overflow-y-auto lg:overflow-hidden w-full max-w-full">
        
        <!-- Left Toolbar -->
        <aside class="w-full lg:w-20 bg-gray-900 border-b lg:border-b-0 lg:border-r border-gray-800 flex flex-row lg:flex-col items-center justify-around lg:justify-start py-2 lg:py-4 px-2 lg:px-0 space-x-1 lg:space-x-0 lg:space-y-6 text-xs text-gray-400 select-none flex-shrink-0">
            <button @click="activeTab = 'text'" :class="{'text-brand-orange bg-gray-800': activeTab === 'text'}" class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl lg:rounded-2xl flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5 mb-0.5 lg:mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
                <span class="text-[10px]">Texte</span>
            </button>
            <button @click="activeTab = 'images'" :class="{'text-brand-orange bg-gray-800': activeTab === 'images'}" class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl lg:rounded-2xl flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5 mb-0.5 lg:mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="text-[10px]">Images</span>
            </button>
            <button @click="activeTab = 'shapes'" :class="{'text-brand-orange bg-gray-800': activeTab === 'shapes'}" class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl lg:rounded-2xl flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5 mb-0.5 lg:mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a2 2 0 01-2 2h-1a2 2 0 01-2-2V4zM4 11a2 2 0 012-2h1a2 2 0 012 2v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1zM11 16a2 2 0 012-2h1a2 2 0 012 2v1a2 2 0 01-2 2h-1a2 2 0 01-2-2v-1z"/></svg>
                <span class="text-[10px]">Formes</span>
            </button>
            <button @click="activeTab = 'bg'" :class="{'text-brand-orange bg-gray-800': activeTab === 'bg'}" class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl lg:rounded-2xl flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition">
                <svg class="w-5 h-5 mb-0.5 lg:mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                <span class="text-[10px]">Fond</span>
            </button>
        </aside>

        <!-- Tool Subpanel (Active Tab Settings) -->
        <div class="w-full lg:w-64 bg-gray-900/90 border-b lg:border-b-0 lg:border-r border-gray-800 p-3 lg:p-4 space-y-3 lg:space-y-4 text-xs select-none flex-shrink-0">
            <h3 class="font-bold text-gray-200 uppercase tracking-wider text-[11px]" x-text="'Outil : ' + activeTab"></h3>
            
            <div x-show="activeTab === 'text'" class="grid grid-cols-3 lg:grid-cols-1 gap-2 lg:gap-3">
                <button @click="addText('Titre Principal')" class="py-2 px-3 bg-brand-orange hover:bg-orange-600 text-white font-bold rounded-xl transition text-center shadow text-xs">
                    + Titre
                </button>
                <button @click="addText('Sous-titre explicatif')" class="py-2 px-3 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl transition text-center border border-gray-700 text-xs">
                    + Sous-Titre
                </button>
                <button @click="addText('Texte de corps paragraphe')" class="py-2 px-3 bg-gray-800 hover:bg-gray-700 text-gray-300 text-[11px] rounded-xl transition text-center border border-gray-700">
                    + Texte standard
                </button>
            </div>

            <div x-show="activeTab === 'bg'" class="space-y-3">
                <label class="block text-gray-400">Couleur de fond du document</label>
                <div class="grid grid-cols-4 gap-2">
                    <button @click="canvasBg = '#ffffff'" class="h-8 rounded-lg bg-white border border-gray-400"></button>
                    <button @click="canvasBg = '#18181b'" class="h-8 rounded-lg bg-stone-900 border border-gray-700"></button>
                    <button @click="canvasBg = '#fef3c7'" class="h-8 rounded-lg bg-amber-100 border border-amber-300"></button>
                    <button @click="canvasBg = '#ecfdf5'" class="h-8 rounded-lg bg-emerald-50 border border-emerald-300"></button>
                </div>
            </div>
        </div>

        <!-- Center Interactive Studio Canvas Area -->
        <section class="flex-1 bg-gray-950 p-4 sm:p-8 flex items-center justify-center overflow-auto relative min-h-[380px] w-full max-w-full">
            <!-- Canvas Container -->
            <div class="relative bg-white shadow-2xl transition-all duration-300 border border-gray-800 rounded-lg overflow-hidden select-none max-w-full"
                 :style="'width: min(550px, 92vw); height: min(350px, 60vw); background-color: ' + canvasBg + '; transform: scale(' + (zoom/100) + ')'">

                <!-- Bleed & Trim Guidelines (3mm) -->
                <div x-show="showBleedLines" class="absolute inset-2 border-2 border-dashed border-red-500/60 pointer-events-none z-30 flex items-start justify-between p-1 text-[8px] text-red-500 font-mono">
                    <span>Ligne de Coupe (3mm)</span>
                    <span>Zone Sécurisée</span>
                </div>

                <!-- Editable Elements on Canvas -->
                <template x-for="(el, index) in elements" :key="index">
                    <div @click="selectedElementIndex = index"
                         class="absolute cursor-move p-2 transition group"
                         :class="{'ring-2 ring-brand-orange ring-offset-2 ring-offset-transparent': selectedElementIndex === index}"
                         :style="'left: ' + el.x + 'px; top: ' + el.y + 'px; font-size: ' + el.size + 'px; color: ' + el.color + '; font-family: ' + el.font">
                        <span x-text="el.content"></span>
                    </div>
                </template>

            </div>
        </section>

        <!-- Right Properties Sidebar -->
        <aside class="w-full lg:w-72 bg-gray-900 border-t lg:border-t-0 lg:border-l border-gray-800 p-4 lg:p-5 space-y-4 lg:space-y-6 text-xs flex-shrink-0">
            <h3 class="font-bold text-white uppercase tracking-wider text-[11px] pb-2 border-b border-gray-800">Propriétés de l'Élément</h3>

            <template x-if="selectedElementIndex !== null">
                <div class="space-y-4">
                    <div class="space-y-1">
                        <label class="block text-gray-400">Contenu du Texte</label>
                        <input type="text" x-model="elements[selectedElementIndex].content" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-3 py-2 text-white font-bold focus:border-brand-orange outline-none">
                    </div>

                    <div class="space-y-1">
                        <label class="block text-gray-400">Taille de la police (px)</label>
                        <input type="number" x-model="elements[selectedElementIndex].size" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-3 py-2 text-white font-bold focus:border-brand-orange outline-none">
                    </div>

                    <div class="space-y-1">
                        <label class="block text-gray-400">Couleur du texte</label>
                        <input type="color" x-model="elements[selectedElementIndex].color" class="w-full h-10 bg-gray-950 border border-gray-700 rounded-xl p-1 cursor-pointer">
                    </div>

                    <button @click="elements.splice(selectedElementIndex, 1); selectedElementIndex = null" class="w-full py-2 bg-red-600/20 text-red-400 border border-red-500/30 font-bold rounded-xl hover:bg-red-600 hover:text-white transition">
                        🗑️ Supprimer cet élément
                    </button>
                </div>
            </template>

            <template x-if="selectedElementIndex === null">
                <div class="text-center py-12 text-gray-500 italic">
                    Cliquez sur un élément de la maquette pour modifier ses propriétés.
                </div>
            </template>
        </aside>

    </div>
</main>

<script>
function graphicEditor() {
    return {
        templateName: 'Faire-part & Carte Luxe',
        zoom: 100,
        showBleedLines: true,
        activeTab: 'text',
        canvasBg: '#ffffff',
        selectedElementIndex: 0,

        elements: [
            { content: 'Shri Bharathi Press', x: 140, y: 80, size: 28, color: '#18181b', font: "'Dancing Script', cursive" },
            { content: 'IMPRESSION & SIGNALÉTIQUE LUXE', x: 120, y: 130, size: 12, color: '#d97706', font: "'Montserrat', sans-serif" },
            { content: 'www.shri-bharathi.fr — 01 40 00 00 00', x: 110, y: 240, size: 10, color: '#71717a', font: "'Montserrat', sans-serif" }
        ],

        addText(str) {
            this.elements.push({
                content: str,
                x: 100 + (this.elements.length * 10),
                y: 100 + (this.elements.length * 15),
                size: 16,
                color: '#18181b',
                font: "'Montserrat', sans-serif"
            });
            this.selectedElementIndex = this.elements.length - 1;
        },

        downloadProof() {
            alert('Votre épreuve PDF Bon À Tirer (BAT) avec repères de coupe est en cours de téléchargement...');
        },

        saveAndValidate() {
            alert('Votre création a été validée avec succès ! Redirection vers la configuration d\'impression.');
            window.location.href = "{{ route('product.configurable', 'cartes-de-visite') }}";
        }
    }
}
</script>
@endsection
