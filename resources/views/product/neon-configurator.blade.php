@extends('layouts.app')

@section('title', 'Configurateur NÃ©on LED Sur-Mesure â€” Shri Bharathi')
@section('description', 'CrÃ©ez et visualisez votre nÃ©on LED personnalisÃ© en direct avec notre outil 3D. Choisissez votre texte, couleur, police et fond mur.')

@section('main-class', '')
@section('content')
<main class="bg-gray-950 text-white min-h-screen pt-24 sm:pt-28 pb-8" x-data="neonConfigurator()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header title -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 pb-4 border-b border-gray-800">
            <div>
                <nav class="flex items-center space-x-2 text-xs text-gray-400 mb-2">
                    <a href="{{ route('home') }}" class="hover:text-white">Accueil</a>
                    <span>/</span>
                    <a href="{{ route('category.enseignes') }}" class="hover:text-white">Enseignes</a>
                    <span>/</span>
                    <span class="text-brand-orange font-medium">Configurateur NÃ©on 3D</span>
                </nav>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white flex items-center space-x-3">
                    <span>âš¡ Studio NÃ©on LED Sur-Mesure</span>
                    <span class="text-xs font-bold bg-brand-orange text-white px-2.5 py-1 rounded-full uppercase tracking-wider">Temps RÃ©el</span>
                </h1>
            </div>
            <div class="mt-4 md:mt-0 flex items-center space-x-4">
                <span class="text-xs text-gray-400">âš¡ Tubes Silicone Flex LED IP65 (50,000 hrs)</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left 7 Cols: Interactive Live Preview Wall Canvas -->
            <div class="lg:col-span-7 space-y-4">
                <div class="relative rounded-3xl overflow-hidden border border-gray-800 shadow-2xl h-[480px] flex items-center justify-center p-8 transition duration-500" :style="'background: ' + currentBgStyle">
                    <!-- Ambient Glow effect behind text -->
                    <div class="absolute w-96 h-96 rounded-full blur-3xl opacity-30 transition duration-500 pointer-events-none" :style="'background-color: ' + activeColorHex"></div>

                    <!-- Live Neon Text Display -->
                    <div class="relative z-10 text-center select-none px-4 transition-all duration-300"
                         :style="neonTextStyle">
                        <span x-text="text.length > 0 ? text : 'Votre Texte Ici'"></span>
                    </div>

                    <!-- Background Switcher Buttons overlay at bottom left -->
                    <div class="absolute bottom-4 left-4 bg-gray-900/90 backdrop-blur-md p-2 rounded-2xl border border-gray-700/80 flex space-x-2">
                        <template x-for="bg in backgrounds" :key="bg.id">
                            <button @click="selectedBg = bg.id" :class="{'ring-2 ring-brand-orange': selectedBg === bg.id}" class="w-8 h-8 rounded-xl overflow-hidden border border-gray-600 transition" :title="bg.name">
                                <div class="w-full h-full bg-cover bg-center" :style="'background-image: url(' + bg.img + ')'"></div>
                            </button>
                        </template>
                    </div>

                    <!-- Acrylic Backing Indicator overlay bottom right -->
                    <div class="absolute bottom-4 right-4 bg-gray-900/90 backdrop-blur-md px-3 py-1.5 rounded-xl border border-gray-700 text-[10px] text-gray-300">
                        Support : <span x-text="selectedBackingName" class="font-bold text-amber-400"></span>
                    </div>
                </div>

                <!-- Features list under preview -->
                <div class="grid grid-cols-3 gap-4 text-center text-xs text-gray-400">
                    <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl">
                        <div class="text-white font-bold">Variateur TÃ©lÃ©commande</div>
                        <div class="text-[10px]">Inclus gratuitement</div>
                    </div>
                    <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl">
                        <div class="text-white font-bold">Alimentation 12V</div>
                        <div class="text-[10px]">Prise secteur 2m fournie</div>
                    </div>
                    <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl">
                        <div class="text-white font-bold">Fixations Incluses</div>
                        <div class="text-[10px]">Vis ou kit suspension</div>
                    </div>
                </div>
            </div>

            <!-- Right 5 Cols: Controls Panel -->
            <div class="lg:col-span-5">
                <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 space-y-6 shadow-2xl">
                    
                    <!-- Text Input -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-300 uppercase tracking-wider">1. Saisissez votre texte</label>
                        <input type="text" x-model="text" placeholder="Entrez votre mot ou citation..." class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-white font-bold focus:border-brand-orange outline-none">
                    </div>

                    <!-- Color Picker -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-300 uppercase tracking-wider">2. Couleur du NÃ©on LED (10 Teintes)</label>
                        <div class="grid grid-cols-5 gap-3">
                            <template x-for="c in colors" :key="c.id">
                                <button @click="selectedColor = c.id" :class="{'ring-2 ring-white scale-110': selectedColor === c.id}" class="h-10 rounded-xl border border-gray-700 transition flex items-center justify-center relative shadow-lg" :style="'background-color: ' + c.hex" :title="c.name">
                                    <span x-show="selectedColor === c.id" class="w-2 h-2 rounded-full bg-white"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Font Style -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-300 uppercase tracking-wider">3. Style de Police Calligraphique</label>
                        <div class="grid grid-cols-2 gap-2">
                            <template x-for="f in fonts" :key="f.id">
                                <button @click="selectedFont = f.id" :class="{'border-brand-orange bg-brand-orange/20 text-white font-bold': selectedFont === f.id, 'border-gray-800 bg-gray-950 text-gray-400': selectedFont !== f.id}" class="py-2.5 px-3 rounded-xl border text-xs text-left transition">
                                    <span x-text="f.name" :style="'font-family: ' + f.family"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Size Slider -->
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-bold text-gray-300 uppercase">
                            <span>4. Largeur souhaitÃ©e</span>
                            <span class="text-amber-400 font-extrabold" x-text="widthCm + ' cm'"></span>
                        </div>
                        <input type="range" min="40" max="220" step="10" x-model="widthCm" class="w-full accent-brand-orange bg-gray-800 h-2 rounded-lg cursor-pointer">
                    </div>

                    <!-- Backing Support -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-300 uppercase tracking-wider">5. DÃ©coupe du Support Acrylique</label>
                        <div class="grid grid-cols-2 gap-2">
                            <button @click="selectedBacking = 'contour'" :class="{'border-brand-orange bg-brand-orange/20 text-white font-bold': selectedBacking === 'contour', 'border-gray-800 bg-gray-950 text-gray-400': selectedBacking !== 'contour'}" class="py-2 px-3 rounded-xl border text-xs text-center transition">
                                âœ‚ï¸ DÃ©coupÃ© Ã  la forme du texte
                            </button>
                            <button @click="selectedBacking = 'rect'" :class="{'border-brand-orange bg-brand-orange/20 text-white font-bold': selectedBacking === 'rect', 'border-gray-800 bg-gray-950 text-gray-400': selectedBacking !== 'rect'}" class="py-2 px-3 rounded-xl border text-xs text-center transition">
                                â¹ï¸ Rectangle Acrylique RÃ©flÃ©chissant
                            </button>
                        </div>
                    </div>

                    <!-- Price & Add to Cart Box -->
                    <div class="bg-gray-950 p-6 rounded-2xl border border-gray-800 space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-[10px] text-gray-400 uppercase tracking-widest">Tarif Total NÃ©on sur-mesure</span>
                                <div class="text-3xl font-extrabold text-amber-400 mt-0.5">
                                    <span x-text="calculatedPrice"></span> â‚¬ <span class="text-xs text-gray-400 font-normal">HT</span>
                                </div>
                                <div class="text-xs text-gray-400">ExpÃ©dition sous 5 Ã  7 jours ouvrÃ©s</div>
                            </div>
                        </div>

                        <button @click="addToCart()" class="w-full py-4 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-brand-orange/30 transition flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <span>Ajouter au Panier</span>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<script>
function neonConfigurator() {
    return {
        text: 'Cocktail & Dreams',
        selectedColor: 'pink',
        selectedFont: 'script',
        widthCm: 90,
        selectedBg: 'brick',
        selectedBacking: 'contour',

        colors: [
            { id: 'pink', name: 'NÃ©on Rose', hex: '#ff2a8d', glow: '0 0 10px #ff2a8d, 0 0 20px #ff2a8d, 0 0 40px #ff2a8d' },
            { id: 'blue', name: 'Bleu Ã‰lectrique', hex: '#00d2ff', glow: '0 0 10px #00d2ff, 0 0 20px #00d2ff, 0 0 40px #00d2ff' },
            { id: 'amber', name: 'Jaune Or', hex: '#ffaa00', glow: '0 0 10px #ffaa00, 0 0 20px #ffaa00, 0 0 40px #ffaa00' },
            { id: 'green', name: 'Vert Ã‰meraude', hex: '#00ff88', glow: '0 0 10px #00ff88, 0 0 20px #00ff88, 0 0 40px #00ff88' },
            { id: 'red', name: 'Rouge Enseigne', hex: '#ff0033', glow: '0 0 10px #ff0033, 0 0 20px #ff0033, 0 0 40px #ff0033' },
            { id: 'purple', name: 'Violet NÃ©on', hex: '#aa00ff', glow: '0 0 10px #aa00ff, 0 0 20px #aa00ff, 0 0 40px #aa00ff' },
            { id: 'cyan', name: 'Cyan Glacier', hex: '#00ffff', glow: '0 0 10px #00ffff, 0 0 20px #00ffff, 0 0 40px #00ffff' },
            { id: 'white', name: 'Blanc Pur', hex: '#ffffff', glow: '0 0 10px #ffffff, 0 0 20px #ffffff, 0 0 40px #ffffff' },
            { id: 'warmwhite', name: 'Blanc Chaud 3000K', hex: '#ffe6a8', glow: '0 0 10px #ffe6a8, 0 0 20px #ffe6a8, 0 0 40px #ffe6a8' },
            { id: 'orange', name: 'Orange Fluo', hex: '#ff6600', glow: '0 0 10px #ff6600, 0 0 20px #ff6600, 0 0 40px #ff6600' }
        ],

        fonts: [
            { id: 'script', name: 'Calligraphie Luxe', family: "'Dancing Script', cursive" },
            { id: 'sans', name: 'Moderne Minimalist', family: "'Montserrat', sans-serif" },
            { id: 'bold', name: 'Impact Enseigne', family: "'Oswald', sans-serif" },
            { id: 'retro', name: 'Retro Vintage', family: "'Pacifico', cursive" }
        ],

        backgrounds: [
            { id: 'brick', name: 'Briques Sombre', img: 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80' },
            { id: 'wood', name: 'Bois Noir Premium', img: 'https://images.unsplash.com/photo-1546484475-7f7bd55792da?auto=format&fit=crop&w=800&q=80' },
            { id: 'concrete', name: 'BÃ©ton LissÃ©', img: 'https://images.unsplash.com/photo-1518640467707-6811f4a6ab73?auto=format&fit=crop&w=800&q=80' }
        ],

        get activeColorHex() {
            let c = this.colors.find(col => col.id === this.selectedColor);
            return c ? c.hex : '#ff2a8d';
        },

        get currentBgStyle() {
            let bg = this.backgrounds.find(b => b.id === this.selectedBg);
            return bg ? "linear-gradient(rgba(10, 10, 15, 0.75), rgba(10, 10, 15, 0.75)), url('" + bg.img + "') center/cover" : "#0f172a";
        },

        get selectedBackingName() {
            return this.selectedBacking === 'contour' ? 'DÃ©coupÃ© Ã  la forme' : 'Panneau Rectangulaire';
        },

        get neonTextStyle() {
            let c = this.colors.find(col => col.id === this.selectedColor) || this.colors[0];
            let f = this.fonts.find(font => font.id === this.selectedFont) || this.fonts[0];
            return {
                color: '#ffffff',
                textShadow: c.glow + ', 0 0 80px ' + c.hex,
                fontFamily: f.family,
                fontSize: Math.min(Math.max(this.widthCm / 1.5, 24), 56) + 'px'
            };
        },

        get calculatedPrice() {
            let len = this.text.length > 0 ? this.text.length : 12;
            let price = (len * 12) + (this.widthCm * 1.2);
            return Math.round(price);
        },

        addToCart() {
            alert('Votre NÃ©on "' + this.text + '" de ' + this.widthCm + 'cm a Ã©tÃ© ajoutÃ© au panier ! Total: ' + this.calculatedPrice + 'â‚¬ HT.');
            window.location.href = "{{ route('cart') }}";
        }
    }
}
</script>
@endsection
