@extends('layouts.app')

@section('title', 'Studio d\'Édition Graphique en Ligne — Shri Bharathi')
@section('description', 'Éditeur de création visuelle professionnel en ligne. Personnalisez vos imprimés en direct.')

@section('main-class', 'pt-16 sm:pt-24')

@section('content')
<main class="bg-gray-950 text-white min-h-[calc(100vh-4rem)] flex flex-col w-full overflow-x-hidden" x-data="graphicEditor()">

    {{-- ===== EDITOR TOP ACTION BAR ===== --}}
    <header class="bg-gray-900 border-b border-gray-800 w-full z-20 sticky top-14 sm:top-20">

        {{-- Main Control Bar --}}
        <div class="flex items-center justify-between px-2 py-2 sm:px-4 gap-1.5 w-full max-w-full overflow-x-hidden">

            {{-- Left: Back link + Template Title --}}
            <div class="flex items-center gap-1.5 min-w-0 flex-1">
                <a href="{{ route('templates') }}" class="text-gray-400 hover:text-white flex items-center gap-1 text-[11px] sm:text-xs flex-shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span class="hidden sm:inline">Retour</span>
                </a>
                <span class="h-3.5 w-px bg-gray-700 flex-shrink-0"></span>
                <div class="text-[11px] sm:text-xs font-bold text-white truncate min-w-0">
                    <span class="text-gray-400 hidden md:inline">Modèle : </span>
                    <span class="text-brand-orange truncate" x-text="templateName"></span>
                </div>
            </div>

            {{-- Center/Right: Controls + Validate --}}
            <div class="flex items-center gap-1.5 flex-shrink-0">

                {{-- Zoom Controls --}}
                <div class="flex items-center bg-gray-800 px-1.5 py-1 rounded border border-gray-700 text-[10px] sm:text-xs">
                    <button @click="zoom = Math.max(zoom - 10, 50)" class="hover:text-brand-orange font-bold px-1 text-xs" title="Dézoomer">−</button>
                    <span class="w-7 sm:w-9 text-center text-amber-400 font-bold" x-text="zoom + '%'"></span>
                    <button @click="zoom = Math.min(zoom + 10, 200)" class="hover:text-brand-orange font-bold px-1 text-xs" title="Zoomer">+</button>
                </div>

                {{-- Bleed Toggle --}}
                <button @click="showBleedLines = !showBleedLines"
                    :class="{'bg-brand-orange text-white': showBleedLines, 'bg-gray-800 text-gray-300': !showBleedLines}"
                    class="hidden sm:flex items-center gap-1 px-2 py-1 rounded border border-gray-700 text-[10px] font-medium transition whitespace-nowrap">
                    📐 <span x-text="showBleedLines ? 'Repères ON' : 'Repères OFF'"></span>
                </button>

                {{-- CMJN Badge (Desktop) --}}
                <span class="hidden lg:inline-flex items-center bg-green-500/20 text-green-400 text-[9px] px-1.5 py-0.5 rounded border border-green-500/30 whitespace-nowrap">CMJN 300DPI</span>

                {{-- PDF BAT --}}
                <button @click="downloadProof()" class="hidden md:flex items-center gap-1 px-2.5 py-1 bg-gray-800 hover:bg-gray-700 text-gray-200 text-xs font-semibold rounded border border-gray-700 transition">
                    📥 PDF
                </button>

                {{-- Validate Button --}}
                <button @click="saveAndValidate()" class="flex items-center gap-1 px-2.5 py-1 sm:px-3 sm:py-1.5 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-[11px] sm:text-xs font-bold rounded shadow transition whitespace-nowrap">
                    <span>Valider</span>
                    <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>
        </div>
    </header>

    {{-- ===== MAIN WORKSPACE CONTAINER ===== --}}
    <div class="flex-1 flex flex-col lg:flex-row w-full max-w-full overflow-x-hidden min-h-0">

        {{-- Left Toolbar Tabs (Horizontal on mobile, vertical on desktop) --}}
        <aside class="w-full lg:w-16 bg-gray-900 border-b lg:border-b-0 lg:border-r border-gray-800 flex flex-row lg:flex-col items-center justify-around lg:justify-start py-1 lg:py-4 px-1 lg:px-0 lg:space-y-4 flex-shrink-0 z-10">
            <button @click="activeTab = 'text'"
                    :class="{'text-brand-orange bg-gray-800': activeTab === 'text'}"
                    class="flex-1 lg:flex-initial py-1.5 lg:py-0 lg:w-12 lg:h-12 rounded-lg flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition text-gray-400">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>
                <span class="text-[9px] font-medium">Texte</span>
            </button>
            <button @click="activeTab = 'images'"
                    :class="{'text-brand-orange bg-gray-800': activeTab === 'images'}"
                    class="flex-1 lg:flex-initial py-1.5 lg:py-0 lg:w-12 lg:h-12 rounded-lg flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition text-gray-400">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="text-[9px] font-medium">Images</span>
            </button>
            <button @click="activeTab = 'shapes'"
                    :class="{'text-brand-orange bg-gray-800': activeTab === 'shapes'}"
                    class="flex-1 lg:flex-initial py-1.5 lg:py-0 lg:w-12 lg:h-12 rounded-lg flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition text-gray-400">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a2 2 0 01-2 2h-1a2 2 0 01-2-2V4zM4 11a2 2 0 012-2h1a2 2 0 012 2v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1zM11 16a2 2 0 012-2h1a2 2 0 012 2v1a2 2 0 01-2 2h-1a2 2 0 01-2-2v-1z"/></svg>
                <span class="text-[9px] font-medium">Formes</span>
            </button>
            <button @click="activeTab = 'bg'"
                    :class="{'text-brand-orange bg-gray-800': activeTab === 'bg'}"
                    class="flex-1 lg:flex-initial py-1.5 lg:py-0 lg:w-12 lg:h-12 rounded-lg flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition text-gray-400">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                <span class="text-[9px] font-medium">Fond</span>
            </button>
        </aside>

        {{-- Tool Sub-panel + Canvas + Properties --}}
        <div class="flex-1 flex flex-col lg:flex-row w-full max-w-full overflow-x-hidden min-h-0">

            {{-- Active Tool Options Panel --}}
            <div class="w-full lg:w-56 bg-gray-900/90 border-b lg:border-b-0 lg:border-r border-gray-800 p-2.5 text-xs select-none flex-shrink-0">

                {{-- TEXT TOOL --}}
                <div x-show="activeTab === 'text'" class="space-y-2">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Ajouter du texte</div>
                    <div class="grid grid-cols-3 lg:grid-cols-1 gap-1.5">
                        <button @click="addText('Titre Principal')" class="py-1.5 px-2 bg-brand-orange hover:bg-orange-600 text-white font-bold rounded transition text-center text-[11px] truncate">+ Titre</button>
                        <button @click="addText('Sous-titre explicatif')" class="py-1.5 px-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded transition text-center border border-gray-700 text-[11px] truncate">+ Sous-Titre</button>
                        <button @click="addText('Texte de corps')" class="py-1.5 px-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded transition text-center border border-gray-700 text-[11px] truncate">+ Corps</button>
                    </div>
                </div>

                {{-- IMAGES TOOL --}}
                <div x-show="activeTab === 'images'" class="space-y-2">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Importer une image</div>
                    <button class="w-full py-2 bg-gray-800 hover:bg-gray-700 text-gray-200 rounded border border-dashed border-gray-600 text-[11px] font-medium transition text-center">
                        📁 Choisir un fichier (PNG/SVG)
                    </button>
                </div>

                {{-- SHAPES TOOL --}}
                <div x-show="activeTab === 'shapes'" class="space-y-2">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Ajouter une forme</div>
                    <div class="grid grid-cols-3 gap-1.5">
                        <button @click="addText('■ Rect')" class="py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded border border-gray-700 text-[10px] text-center">Rect</button>
                        <button @click="addText('● Cercle')" class="py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded border border-gray-700 text-[10px] text-center">Cercle</button>
                        <button @click="addText('── Line')" class="py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded border border-gray-700 text-[10px] text-center">Ligne</button>
                    </div>
                </div>

                {{-- BACKGROUND TOOL --}}
                <div x-show="activeTab === 'bg'" class="space-y-2">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Couleur du support</div>
                    <div class="grid grid-cols-4 gap-1.5">
                        <button @click="canvasBg = '#ffffff'" class="h-6 rounded bg-white border border-gray-400 focus:ring-2 focus:ring-amber-400" title="Blanc"></button>
                        <button @click="canvasBg = '#18181b'" class="h-6 rounded bg-stone-900 border border-gray-700 focus:ring-2 focus:ring-amber-400" title="Noir Sombre"></button>
                        <button @click="canvasBg = '#fef3c7'" class="h-6 rounded bg-amber-100 border border-amber-300 focus:ring-2 focus:ring-amber-400" title="Ivoire"></button>
                        <button @click="canvasBg = '#ecfdf5'" class="h-6 rounded bg-emerald-50 border border-emerald-300 focus:ring-2 focus:ring-amber-400" title="Menthe"></button>
                    </div>
                </div>
            </div>

            {{-- CANVAS PREVIEW AREA --}}
            <section class="flex-1 bg-gray-950 flex flex-col items-center justify-center p-2 sm:p-4 relative min-h-[220px] lg:min-h-0 overflow-auto w-full max-w-full">
                <div class="relative bg-white shadow-2xl transition-all duration-300 border border-gray-700 rounded overflow-hidden select-none max-w-full"
                     :style="'width: min(290px, 86vw); aspect-ratio: 1.5; background-color: ' + canvasBg + '; transform: scale(' + (zoom/100) + '); transform-origin: center center;'">

                    {{-- Bleed Guidelines --}}
                    <div x-show="showBleedLines" class="absolute inset-1.5 border border-dashed border-red-500/60 pointer-events-none z-30 flex items-start justify-between p-0.5 text-[6px] text-red-500 font-mono">
                        <span>3mm</span>
                        <span>Zone sûre</span>
                    </div>

                    {{-- Editable Elements --}}
                    <template x-for="(el, index) in elements" :key="index">
                        <div @click="selectedElementIndex = index"
                             class="absolute cursor-move p-1 transition select-none"
                             :class="{'ring-1 ring-brand-orange bg-amber-400/10': selectedElementIndex === index}"
                             :style="'left:' + el.x + 'px; top:' + el.y + 'px; font-size:' + Math.max(9, Math.round(el.size * 0.65)) + 'px; color:' + el.color + '; font-family:' + el.font">
                            <span x-text="el.content"></span>
                        </div>
                    </template>
                </div>
            </section>

            {{-- ELEMENT PROPERTIES PANEL --}}
            <aside class="w-full lg:w-60 bg-gray-900 border-t lg:border-t-0 lg:border-l border-gray-800 p-2.5 text-xs flex-shrink-0">
                <div class="font-bold text-white uppercase tracking-wider text-[10px] pb-1.5 mb-2 border-b border-gray-800">
                    Propriétés
                </div>

                <template x-if="selectedElementIndex !== null">
                    <div class="space-y-2">
                        <div>
                            <label class="block text-gray-400 text-[9px] mb-0.5">Texte</label>
                            <input type="text" x-model="elements[selectedElementIndex].content"
                                class="w-full bg-gray-950 border border-gray-700 rounded px-2 py-1 text-white font-semibold focus:border-brand-orange outline-none text-xs">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-gray-400 text-[9px] mb-0.5">Taille (px)</label>
                                <input type="number" x-model="elements[selectedElementIndex].size"
                                    class="w-full bg-gray-950 border border-gray-700 rounded px-2 py-1 text-white font-semibold focus:border-brand-orange outline-none text-xs">
                            </div>
                            <div>
                                <label class="block text-gray-400 text-[9px] mb-0.5">Couleur</label>
                                <input type="color" x-model="elements[selectedElementIndex].color"
                                    class="w-full h-7 bg-gray-950 border border-gray-700 rounded p-0.5 cursor-pointer">
                            </div>
                        </div>
                        <button @click="elements.splice(selectedElementIndex, 1); selectedElementIndex = null"
                            class="w-full py-1 bg-red-600/20 text-red-400 border border-red-500/30 font-semibold rounded hover:bg-red-600 hover:text-white transition text-[10px]">
                            🗑️ Supprimer l'élément
                        </button>
                    </div>
                </template>

                <template x-if="selectedElementIndex === null">
                    <p class="text-center py-3 text-gray-500 italic text-[10px]">Sélectionnez un élément pour le modifier.</p>
                </template>
            </aside>

        </div>{{-- end subpanel+canvas+props flex --}}
    </div>{{-- end workspace flex --}}

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
            { content: 'Shri Bharathi Press', x: 20, y: 25, size: 20, color: '#18181b', font: "'Dancing Script', cursive" },
            { content: 'IMPRESSION & SIGNALÉTIQUE', x: 15, y: 65, size: 10, color: '#d97706', font: "'Montserrat', sans-serif" },
            { content: 'www.shri-bharathi.fr', x: 25, y: 110, size: 9, color: '#71717a', font: "'Montserrat', sans-serif" }
        ],

        addText(str) {
            this.elements.push({
                content: str,
                x: 20 + (this.elements.length * 6),
                y: 35 + (this.elements.length * 15),
                size: 14,
                color: '#18181b',
                font: "'Montserrat', sans-serif"
            });
            this.selectedElementIndex = this.elements.length - 1;
        },

        downloadProof() {
            alert('Épreuve PDF BAT avec repères de coupe en cours de téléchargement...');
        },

        saveAndValidate() {
            alert('Création validée ! Redirection vers la configuration impression.');
            window.location.href = "{{ route('product.configurable', 'cartes-de-visite') }}";
        }
    }
}
</script>
@endsection
