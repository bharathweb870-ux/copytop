@extends('layouts.app')

@section('title', 'Studio d\'Édition Graphique en Ligne — Shri Bharathi')
@section('description', 'Éditeur de création visuelle professionnel en ligne. Personnalisez vos imprimés en direct.')

@section('main-class', '')
@section('content')
<main class="bg-gray-950 text-white min-h-screen flex flex-col" x-data="graphicEditor()">

    {{-- ===== EDITOR TOP ACTION BAR ===== --}}
    <header class="bg-gray-900 border-b border-gray-800 z-20 w-full">

        {{-- Row 1: Back + Title + Validate (always visible) --}}
        <div class="flex items-center justify-between px-3 py-2 sm:px-4 gap-2">

            {{-- Left: Back link + template name --}}
            <div class="flex items-center gap-2 min-w-0">
                <a href="{{ route('templates') }}" class="text-gray-400 hover:text-white flex items-center gap-1 text-xs flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span class="hidden sm:inline whitespace-nowrap">Retour</span>
                </a>
                <span class="h-4 w-px bg-gray-700 flex-shrink-0 hidden sm:block"></span>
                <span class="text-xs font-bold text-white truncate max-w-[110px] sm:max-w-[200px]">
                    <span class="text-gray-400 hidden sm:inline">Modèle : </span>
                    <span class="text-brand-orange" x-text="templateName"></span>
                </span>
                {{-- CMYK badge — desktop only --}}
                <span class="hidden md:inline-flex items-center bg-green-500/20 text-green-400 text-[9px] px-1.5 py-0.5 rounded-full border border-green-500/30 whitespace-nowrap flex-shrink-0">Mode CMJN</span>
            </div>

            {{-- Right: Validate button (always visible) --}}
            <div class="flex items-center gap-1.5 flex-shrink-0">
                {{-- PDF preview — hidden on mobile --}}
                <button @click="downloadProof()" class="hidden sm:flex items-center gap-1 px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-200 text-xs font-semibold rounded-lg border border-gray-700 transition whitespace-nowrap">
                    📥 <span class="hidden md:inline">Aperçu</span> PDF
                </button>
                {{-- Validate button — always visible, shorter on mobile --}}
                <button @click="saveAndValidate()" class="flex items-center gap-1 px-3 py-1.5 sm:px-4 sm:py-2 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-[11px] sm:text-xs font-bold rounded-lg shadow transition whitespace-nowrap">
                    <span class="hidden xs:inline sm:inline">Valider &amp; </span>Imprimer
                    <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>
        </div>

        {{-- Row 2: Controls (zoom + bleed) — shown as a slim bar on mobile --}}
        <div class="flex items-center gap-2 px-3 pb-2 sm:px-4 sm:pb-0 sm:hidden text-xs">
            <button @click="showBleedLines = !showBleedLines"
                :class="{'bg-brand-orange text-white': showBleedLines, 'bg-gray-800 text-gray-300': !showBleedLines}"
                class="flex items-center gap-1 px-2 py-1 rounded-md border border-gray-700 text-[10px] font-medium transition whitespace-nowrap">
                📐 <span x-text="showBleedLines ? 'Repères ON' : 'Repères OFF'"></span>
            </button>
            <div class="flex items-center gap-1 bg-gray-800 px-2 py-1 rounded-md border border-gray-700 ml-auto">
                <button @click="zoom = Math.max(zoom - 10, 50)" class="hover:text-brand-orange font-bold px-1 text-sm">−</button>
                <span class="w-9 text-center text-amber-400 font-bold text-[10px]" x-text="zoom + '%'"></span>
                <button @click="zoom = Math.min(zoom + 10, 200)" class="hover:text-brand-orange font-bold px-1 text-sm">+</button>
            </div>
        </div>

        {{-- Desktop-only center controls row (inside first row on sm+) --}}
        <div class="hidden sm:flex items-center gap-2 px-4 pb-2 sm:pb-0 sm:absolute sm:top-0 sm:left-1/2 sm:-translate-x-1/2 sm:h-full text-xs" style="display:none!important">
        </div>
    </header>

    {{-- ===== MAIN WORKSPACE — stacks vertically on mobile, 3-col on desktop ===== --}}
    <div class="flex-1 flex flex-col lg:flex-row overflow-hidden w-full">

        {{-- Left Toolbar: tab icons (horizontal on mobile, vertical on desktop) --}}
        <aside class="w-full lg:w-16 bg-gray-900 border-b lg:border-b-0 lg:border-r border-gray-800 flex flex-row lg:flex-col items-center justify-around lg:justify-start py-1.5 lg:py-4 px-2 lg:px-0 lg:space-y-4 flex-shrink-0">
            @foreach([['text','Texte','M4 6h16M4 12h8m-8 6h16'],['images','Images','M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],['shapes','Formes','M11 4a2 2 0 114 0v1a2 2 0 01-2 2h-1a2 2 0 01-2-2V4zM4 11a2 2 0 012-2h1a2 2 0 012 2v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1zM11 16a2 2 0 012-2h1a2 2 0 012 2v1a2 2 0 01-2 2h-1a2 2 0 01-2-2v-1z'],['bg','Fond','M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01']] as [$tab, $label, $path])
            <button @click="activeTab = '{{ $tab }}'"
                    :class="{'text-brand-orange bg-gray-800': activeTab === '{{ $tab }}'}"
                    class="w-11 h-11 lg:w-12 lg:h-12 rounded-xl flex flex-col items-center justify-center hover:bg-gray-800 hover:text-white transition text-gray-400 flex-shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                </svg>
                <span class="text-[9px] lg:text-[10px]">{{ $label }}</span>
            </button>
            @endforeach
        </aside>

        {{-- Tool Sub-Panel + Canvas + Properties: stack on mobile, side-by-side on lg --}}
        <div class="flex-1 flex flex-col lg:flex-row overflow-y-auto lg:overflow-hidden min-h-0">

            {{-- Tool Options Panel --}}
            <div class="w-full lg:w-56 bg-gray-900/95 border-b lg:border-b-0 lg:border-r border-gray-800 p-3 text-xs select-none flex-shrink-0">
                <h3 class="font-bold text-gray-400 uppercase tracking-wider text-[10px] mb-2" x-text="'Outil : ' + activeTab"></h3>

                <div x-show="activeTab === 'text'" class="grid grid-cols-3 lg:grid-cols-1 gap-2">
                    <button @click="addText('Titre Principal')" class="py-2 px-2 bg-brand-orange hover:bg-orange-600 text-white font-bold rounded-lg transition text-center text-xs">+ Titre</button>
                    <button @click="addText('Sous-titre explicatif')" class="py-2 px-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-lg transition text-center border border-gray-700 text-xs">+ Sous-Titre</button>
                    <button @click="addText('Texte de corps')" class="py-2 px-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-lg transition text-center border border-gray-700 text-[10px]">+ Corps</button>
                </div>

                <div x-show="activeTab === 'bg'" class="space-y-2">
                    <label class="block text-gray-400 text-[10px]">Couleur de fond</label>
                    <div class="grid grid-cols-4 gap-1.5">
                        <button @click="canvasBg = '#ffffff'" class="h-7 rounded-lg bg-white border border-gray-400"></button>
                        <button @click="canvasBg = '#18181b'" class="h-7 rounded-lg bg-stone-900 border border-gray-700"></button>
                        <button @click="canvasBg = '#fef3c7'" class="h-7 rounded-lg bg-amber-100 border border-amber-300"></button>
                        <button @click="canvasBg = '#ecfdf5'" class="h-7 rounded-lg bg-emerald-50 border border-emerald-300"></button>
                    </div>
                </div>

                {{-- Zoom controls — shown in tool panel on desktop, hidden (shown in header on mobile) --}}
                <div class="hidden lg:block mt-4 pt-4 border-t border-gray-800 space-y-2">
                    <div class="flex items-center gap-2">
                        <button @click="showBleedLines = !showBleedLines"
                            :class="{'bg-brand-orange text-white': showBleedLines, 'bg-gray-800 text-gray-300': !showBleedLines}"
                            class="flex-1 py-1 rounded-lg border border-gray-700 text-[10px] font-medium transition text-center">
                            📐 Repères
                        </button>
                    </div>
                    <div class="flex items-center gap-1 bg-gray-800 px-2 py-1 rounded-lg border border-gray-700">
                        <button @click="zoom = Math.max(zoom - 10, 50)" class="hover:text-brand-orange font-bold px-1">−</button>
                        <span class="flex-1 text-center text-amber-400 font-bold text-[10px]" x-text="zoom + '%'"></span>
                        <button @click="zoom = Math.min(zoom + 10, 200)" class="hover:text-brand-orange font-bold px-1">+</button>
                    </div>
                </div>
            </div>

            {{-- Canvas Area --}}
            <section class="flex-1 bg-gray-950 flex items-center justify-center p-4 relative min-h-[240px] lg:min-h-0 overflow-auto">
                <div class="relative bg-white shadow-2xl transition-all duration-300 border border-gray-700 rounded-lg overflow-hidden select-none"
                     :style="'width: min(520px, 90vw); height: min(340px, 56vw); min-height: 200px; background-color: ' + canvasBg + '; transform: scale(' + (zoom/100) + '); transform-origin: center center;'">

                    {{-- Bleed guidelines --}}
                    <div x-show="showBleedLines" class="absolute inset-2 border-2 border-dashed border-red-500/60 pointer-events-none z-30 flex items-start justify-between p-1 text-[7px] text-red-400 font-mono">
                        <span>Coupe 3mm</span>
                        <span>Zone sûre</span>
                    </div>

                    {{-- Editable elements --}}
                    <template x-for="(el, index) in elements" :key="index">
                        <div @click="selectedElementIndex = index"
                             class="absolute cursor-move p-1.5 transition"
                             :class="{'ring-2 ring-brand-orange ring-offset-1': selectedElementIndex === index}"
                             :style="'left:' + el.x + 'px; top:' + el.y + 'px; font-size:' + el.size + 'px; color:' + el.color + '; font-family:' + el.font">
                            <span x-text="el.content"></span>
                        </div>
                    </template>
                </div>
            </section>

            {{-- Properties Panel --}}
            <aside class="w-full lg:w-64 bg-gray-900 border-t lg:border-t-0 lg:border-l border-gray-800 p-3 lg:p-4 text-xs flex-shrink-0">
                <h3 class="font-bold text-white uppercase tracking-wider text-[10px] pb-2 mb-3 border-b border-gray-800">Propriétés</h3>

                <template x-if="selectedElementIndex !== null">
                    <div class="space-y-3">
                        <div>
                            <label class="block text-gray-400 mb-1 text-[10px]">Contenu</label>
                            <input type="text" x-model="elements[selectedElementIndex].content"
                                class="w-full bg-gray-950 border border-gray-700 rounded-lg px-2 py-1.5 text-white font-bold focus:border-brand-orange outline-none text-xs">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-1 text-[10px]">Taille (px)</label>
                            <input type="number" x-model="elements[selectedElementIndex].size"
                                class="w-full bg-gray-950 border border-gray-700 rounded-lg px-2 py-1.5 text-white font-bold focus:border-brand-orange outline-none text-xs">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-1 text-[10px]">Couleur</label>
                            <input type="color" x-model="elements[selectedElementIndex].color"
                                class="w-full h-8 bg-gray-950 border border-gray-700 rounded-lg p-0.5 cursor-pointer">
                        </div>
                        <button @click="elements.splice(selectedElementIndex, 1); selectedElementIndex = null"
                            class="w-full py-1.5 bg-red-600/20 text-red-400 border border-red-500/30 font-bold rounded-lg hover:bg-red-600 hover:text-white transition text-[10px]">
                            🗑️ Supprimer
                        </button>
                    </div>
                </template>

                <template x-if="selectedElementIndex === null">
                    <p class="text-center py-6 text-gray-500 italic text-[10px]">Cliquez sur un élément pour modifier ses propriétés.</p>
                </template>
            </aside>

        </div>{{-- end inner flex --}}
    </div>{{-- end workspace --}}

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
            { content: 'Shri Bharathi Press', x: 60, y: 60, size: 24, color: '#18181b', font: "'Dancing Script', cursive" },
            { content: 'IMPRESSION & SIGNALÉTIQUE LUXE', x: 40, y: 110, size: 10, color: '#d97706', font: "'Montserrat', sans-serif" },
            { content: 'www.shri-bharathi.fr', x: 50, y: 180, size: 9, color: '#71717a', font: "'Montserrat', sans-serif" }
        ],

        addText(str) {
            this.elements.push({
                content: str,
                x: 60 + (this.elements.length * 8),
                y: 80 + (this.elements.length * 20),
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
