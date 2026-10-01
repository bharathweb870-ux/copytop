@extends('layouts.app')

@section('title', 'Recherche â€” Shri Bharathi')
@section('description', 'Recherchez parmi nos produits d\'impression, enseignes, mariage, packaging et goodies. Trouvez votre solution en quelques secondes.')

@section('main-class', '')
@section('content')
<main class="bg-gray-50 min-h-screen pt-24 sm:pt-28 pb-10" x-data="sbSearch('{{ request('q', '') }}')">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Search Hero -->
        <div class="mb-10">
            <span class="text-xs font-bold text-brand-orange uppercase tracking-widest">Catalogue Complet</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-1 mb-4">Recherche dans le catalogue</h1>

            <!-- Mega Search Box -->
            <div class="relative max-w-3xl">
                <div class="flex items-center bg-white border-2 border-gray-200 focus-within:border-brand-orange rounded-2xl shadow-sm overflow-hidden transition">
                    <svg class="w-5 h-5 text-gray-400 ml-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input
                        type="text"
                        id="search-input"
                        x-model="query"
                        @input="search()"
                        @keydown.enter="search()"
                        placeholder="Ex: cartes de visite dorure, nÃ©on LED mariage, flyer A5..."
                        class="flex-1 px-4 py-4 text-sm text-gray-900 outline-none bg-transparent"
                        autofocus
                    >
                    <button x-show="query" @click="query = ''; search()" class="mr-2 text-gray-400 hover:text-gray-600 p-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                    <button @click="search()" class="bg-brand-orange hover:bg-orange-600 text-white font-bold text-xs px-6 py-4 transition whitespace-nowrap flex-shrink-0">
                        Rechercher
                    </button>
                </div>

                <!-- Quick suggestion pills -->
                <div class="flex flex-wrap gap-2 mt-3 text-xs">
                    <span class="text-gray-400 font-semibold mr-1">Populaires :</span>
                    @foreach(['Cartes de visite', 'NÃ©on LED mariage', 'Flyers A5', 'Menus restaurant', 'Faire-part', 'Roll-up', 'Tote bag', 'Enseigne faÃ§ade'] as $popular)
                    <button @click="query = '{{ $popular }}'; search()" class="bg-white border border-gray-200 text-gray-600 hover:border-brand-orange hover:text-brand-orange px-3 py-1.5 rounded-full transition">
                        {{ $popular }}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Category filter tabs -->
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-6 no-scrollbar">
            <button @click="activeCategory = 'all'; search()" :class="{'bg-gray-900 text-white font-bold': activeCategory === 'all', 'bg-white text-gray-600 border border-gray-200 hover:border-gray-300': activeCategory !== 'all'}" class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap">
                Tous les produits
            </button>
            <button @click="activeCategory = 'imprimerie'; search()" :class="{'bg-orange-500 text-white font-bold': activeCategory === 'imprimerie', 'bg-white text-gray-600 border border-gray-200 hover:border-orange-200': activeCategory !== 'imprimerie'}" class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap">
                ðŸ–¨ï¸ Imprimerie
            </button>
            <button @click="activeCategory = 'enseignes-signaletique'; search()" :class="{'bg-indigo-600 text-white font-bold': activeCategory === 'enseignes-signaletique', 'bg-white text-gray-600 border border-gray-200 hover:border-indigo-200': activeCategory !== 'enseignes-signaletique'}" class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap">
                ðŸª§ Enseignes
            </button>
            <button @click="activeCategory = 'mariage-evenements'; search()" :class="{'bg-amber-500 text-white font-bold': activeCategory === 'mariage-evenements', 'bg-white text-gray-600 border border-gray-200 hover:border-amber-200': activeCategory !== 'mariage-evenements'}" class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap">
                ðŸ’ Mariage
            </button>
            <button @click="activeCategory = 'packaging-sacs'; search()" :class="{'bg-emerald-600 text-white font-bold': activeCategory === 'packaging-sacs', 'bg-white text-gray-600 border border-gray-200 hover:border-emerald-200': activeCategory !== 'packaging-sacs'}" class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap">
                ðŸ“¦ Packaging
            </button>
            <button @click="activeCategory = 'personnalisation-goodies'; search()" :class="{'bg-purple-600 text-white font-bold': activeCategory === 'personnalisation-goodies', 'bg-white text-gray-600 border border-gray-200 hover:border-purple-200': activeCategory !== 'personnalisation-goodies'}" class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap">
                ðŸŽ Goodies
            </button>
        </div>

        <!-- Results header -->
        <div class="flex items-center justify-between mb-4" x-show="query || activeCategory !== 'all'">
            <div class="text-xs text-gray-500">
                <span x-text="results.length" class="font-bold text-gray-900"></span> rÃ©sultat<span x-show="results.length !== 1">s</span>
                <span x-show="query"> pour &quot;<span x-text="query" class="font-semibold text-brand-orange"></span>&quot;</span>
            </div>
            <button x-show="query || activeCategory !== 'all'" @click="query = ''; activeCategory = 'all'; search()" class="text-xs text-gray-400 hover:text-gray-600 underline">
                Effacer les filtres
            </button>
        </div>

        <!-- Results Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5" x-show="results.length > 0">
            <template x-for="item in results" :key="item.slug">
                <a :href="item.route" class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition group">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full"
                              :class="{
                                'bg-orange-100 text-orange-600': item.category === 'imprimerie',
                                'bg-indigo-100 text-indigo-600': item.category === 'enseignes-signaletique',
                                'bg-amber-100 text-amber-700': item.category === 'mariage-evenements',
                                'bg-emerald-100 text-emerald-700': item.category === 'packaging-sacs',
                                'bg-purple-100 text-purple-700': item.category === 'personnalisation-goodies'
                              }"
                              x-text="categoryLabel(item.category)"></span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-brand-orange transition leading-snug" x-text="item.name"></h3>
                    <p class="text-[11px] text-gray-500 mt-1 line-clamp-2" x-text="item.tags.split(' ').slice(0,5).join(' Â· ')"></p>
                    <div class="mt-4 flex items-center text-brand-orange text-xs font-bold">
                        <span>Voir le produit</span>
                        <svg class="w-3.5 h-3.5 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>
            </template>
        </div>

        <!-- Empty state -->
        <div x-show="query && results.length === 0" class="text-center py-20 space-y-4">
            <div class="text-6xl">ðŸ”</div>
            <h3 class="text-xl font-bold text-gray-900">Aucun rÃ©sultat pour Â« <span x-text="query" class="text-brand-orange"></span> Â»</h3>
            <p class="text-gray-500 text-sm">Essayez des termes plus gÃ©nÃ©raux ou parcourez nos catÃ©gories.</p>
            <div class="flex flex-wrap gap-3 justify-center pt-4">
                <a href="{{ route('category.imprimerie') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:border-brand-orange hover:text-brand-orange transition">Imprimerie</a>
                <a href="{{ route('category.enseignes') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:border-brand-orange hover:text-brand-orange transition">Enseignes</a>
                <a href="{{ route('category.mariage') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:border-brand-orange hover:text-brand-orange transition">Mariage</a>
                <a href="{{ route('quote') }}" class="px-5 py-2.5 bg-brand-orange text-white rounded-xl text-sm font-bold hover:bg-orange-600 transition">Demander un devis</a>
            </div>
        </div>

        <!-- Initial empty (no search yet) -->
        <div x-show="!query && activeCategory === 'all'" class="py-6">
            <h2 class="text-lg font-bold text-gray-900 mb-6">Toute la gamme Shri Bharathi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Imprimerie block -->
                <a href="{{ route('category.imprimerie') }}" class="bg-gradient-to-br from-orange-50 to-white rounded-2xl p-6 border border-orange-100 hover:border-orange-300 transition group">
                    <div class="text-3xl mb-3">ðŸ–¨ï¸</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-brand-orange transition">Imprimerie</h3>
                    <p class="text-xs text-gray-500 mt-1">Cartes de visite, flyers, brochures, affiches, menus, stickers, tampons...</p>
                    <span class="mt-3 inline-block text-xs font-bold text-orange-500">10 catÃ©gories â†’</span>
                </a>
                <!-- Enseignes block -->
                <a href="{{ route('category.enseignes') }}" class="bg-gradient-to-br from-indigo-50 to-white rounded-2xl p-6 border border-indigo-100 hover:border-indigo-300 transition group">
                    <div class="text-3xl mb-3">ðŸª§</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-indigo-600 transition">Enseignes & SignalÃ©tique</h3>
                    <p class="text-xs text-gray-500 mt-1">Enseignes Dibond, lettres 3D, nÃ©ons LED, panneaux, vitrophanie, roll-up...</p>
                    <span class="mt-3 inline-block text-xs font-bold text-indigo-500">8 catÃ©gories â†’</span>
                </a>
                <!-- Mariage block -->
                <a href="{{ route('category.mariage') }}" class="bg-gradient-to-br from-amber-50 to-white rounded-2xl p-6 border border-amber-100 hover:border-amber-300 transition group">
                    <div class="text-3xl mb-3">ðŸ’</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-amber-600 transition">Mariage & Ã‰vÃ©nements</h3>
                    <p class="text-xs text-gray-500 mt-1">Faire-part luxe, welcome boards, plans de table, photobooth, livrets de cÃ©rÃ©monie...</p>
                    <span class="mt-3 inline-block text-xs font-bold text-amber-600">7 catÃ©gories â†’</span>
                </a>
                <!-- Packaging block -->
                <a href="{{ route('category.packaging') }}" class="bg-gradient-to-br from-emerald-50 to-white rounded-2xl p-6 border border-emerald-100 hover:border-emerald-300 transition group">
                    <div class="text-3xl mb-3">ðŸ“¦</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-emerald-600 transition">Packaging & Sacs</h3>
                    <p class="text-xs text-gray-500 mt-1">Sacs papier, tote bags, boÃ®tes alimentaires, packaging restaurant, coffrets premium...</p>
                    <span class="mt-3 inline-block text-xs font-bold text-emerald-600">7 catÃ©gories â†’</span>
                </a>
                <!-- Goodies block -->
                <a href="{{ route('category.goodies') }}" class="bg-gradient-to-br from-purple-50 to-white rounded-2xl p-6 border border-purple-100 hover:border-purple-300 transition group">
                    <div class="text-3xl mb-3">ðŸŽ</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-purple-600 transition">Personnalisation & Goodies</h3>
                    <p class="text-xs text-gray-500 mt-1">Textile corporate, mugs, gourdes, cartes NFC, cadeaux personnalisÃ©s...</p>
                    <span class="mt-3 inline-block text-xs font-bold text-purple-600">4 catÃ©gories â†’</span>
                </a>
                <!-- Devis block -->
                <a href="{{ route('quote') }}" class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-amber-500/40 transition group">
                    <div class="text-3xl mb-3">ðŸ“‹</div>
                    <h3 class="font-bold text-white group-hover:text-amber-400 transition">Projet Sur-Mesure ?</h3>
                    <p class="text-xs text-gray-400 mt-1">DÃ©crivez votre projet unique, nos experts vous envoient un devis sous 24h.</p>
                    <span class="mt-3 inline-block text-xs font-bold text-amber-400">Demander un devis gratuit â†’</span>
                </a>
            </div>
        </div>

    </div>
</main>

@push('scripts')
<script>
const SB_SEARCH_INDEX = @js([
    ['name' => 'Cartes de Visite Premium', 'slug' => 'cartes-de-visite', 'category' => 'imprimerie', 'route' => '/produit-configurable/cartes-de-visite', 'tags' => 'carte visite impression dorure soft touch pellicule coins arrondis nfc pvc'],
    ['name' => 'Flyers A5 / A4', 'slug' => 'flyers', 'category' => 'imprimerie', 'route' => '/produit-configurable/flyers', 'tags' => 'flyer tract prospectus a5 a4 dl carre recto verso'],
    ['name' => 'DÃ©pliants 2 & 3 Volets', 'slug' => 'depliants', 'category' => 'imprimerie', 'route' => '/produit-configurable/depliants', 'tags' => 'depliant brochure 2 3 volets accordeon pliant'],
    ['name' => 'Brochures & Catalogues', 'slug' => 'brochures', 'category' => 'imprimerie', 'route' => '/produit-configurable/brochures', 'tags' => 'brochure catalogue magazine livret programme entreprise'],
    ['name' => 'Affiches & Posters Grand Format', 'slug' => 'affiches', 'category' => 'imprimerie', 'route' => '/produit-configurable/affiches', 'tags' => 'affiche poster a3 a2 a1 a0 grand format evenement devanture'],
    ['name' => 'Menus Restaurant', 'slug' => 'menus', 'category' => 'imprimerie', 'route' => '/produit-configurable/menus', 'tags' => 'menu restaurant plastifie plie rigide chevalet bistro brasserie'],
    ['name' => 'Papeterie Entreprise', 'slug' => 'papeterie', 'category' => 'imprimerie', 'route' => '/produit-configurable/papeterie', 'tags' => 'papeterie entete enveloppe bloc notes tampons letterhead'],
    ['name' => 'Stickers & Ã‰tiquettes', 'slug' => 'stickers', 'category' => 'imprimerie', 'route' => '/produit-configurable/stickers', 'tags' => 'sticker etiquette rouleau planche vinyle autocollant produit'],
    ['name' => 'Billetterie & Tickets', 'slug' => 'billetterie', 'category' => 'imprimerie', 'route' => '/produit-configurable/billetterie', 'tags' => 'ticket billet coupon carte cadeau numerote evenement'],
    ['name' => 'Tampons PersonnalisÃ©s', 'slug' => 'tampons', 'category' => 'imprimerie', 'route' => '/produit-configurable/tampons', 'tags' => 'tampon professionnel dateur rond automatique encre'],
    ['name' => 'Enseignes Dibond / Aluminium', 'slug' => 'enseignes-dibond', 'category' => 'enseignes-signaletique', 'route' => '/produit-devis/enseignes-dibond', 'tags' => 'enseigne dibond aluminium facade boutique panneau magasin'],
    ['name' => 'Lettres & Logos 3D Relief', 'slug' => 'lettres-3d', 'category' => 'enseignes-signaletique', 'route' => '/produit-devis/lettres-3d', 'tags' => 'lettrage 3d retro-eclaire LED relief aluminium boutique enseigne lumineuse'],
    ['name' => 'NÃ©ons LED PersonnalisÃ©s', 'slug' => 'neons-personnalises', 'category' => 'enseignes-signaletique', 'route' => '/enseignes-signaletique/neons-personnalises/configurateur', 'tags' => 'neon led personnalise mariage texte logo couleur flex silicone'],
    ['name' => 'Panneaux & BÃ¢ches', 'slug' => 'panneaux', 'category' => 'enseignes-signaletique', 'route' => '/produit-devis/panneaux', 'tags' => 'panneau bache publicitaire chantier immobilier akylux pvc'],
    ['name' => 'Vitrophanie & Vinyle Vitrine', 'slug' => 'vitrophanie', 'category' => 'enseignes-signaletique', 'route' => '/produit-devis/vitrophanie', 'tags' => 'vitrophanie vinyle depoli vitrine lettrage horaires logo adhesif'],
    ['name' => 'Roll-up & Kakemono', 'slug' => 'rollup', 'category' => 'enseignes-signaletique', 'route' => '/produit-configurable/rollup', 'tags' => 'rollup kakemono totem photocall stop trottoir salon foire'],
    ['name' => 'SignalÃ©tique & Plaques de Porte', 'slug' => 'signaletique', 'category' => 'enseignes-signaletique', 'route' => '/produit-devis/signaletique', 'tags' => 'signaletique plaque porte directionnelle interieur hotel bureau'],
    ['name' => 'AdhÃ©sifs & Marquage VÃ©hicule', 'slug' => 'adhesifs', 'category' => 'enseignes-signaletique', 'route' => '/produit-devis/adhesifs', 'tags' => 'adhesif vehicule mural sol transparent opaque depoli covering'],
    ['name' => 'Faire-Part de Mariage', 'slug' => 'faire-part', 'category' => 'mariage-evenements', 'route' => '/produit-luxe/faire-part', 'tags' => 'faire-part mariage luxe dorure cotton indien tamoul vellum floral'],
    ['name' => 'Welcome Boards', 'slug' => 'welcome-boards', 'category' => 'mariage-evenements', 'route' => '/produit-luxe/welcome-boards', 'tags' => 'welcome board panneau bienvenue plexiglas miroir mariage ceremony'],
    ['name' => 'Plans de Table Mariage', 'slug' => 'plans-de-table', 'category' => 'mariage-evenements', 'route' => '/produit-luxe/plans-de-table', 'tags' => 'plan table mariage plexiglas imprime miroir seating'],
    ['name' => 'Papeterie de Table Mariage', 'slug' => 'papeterie-table', 'category' => 'mariage-evenements', 'route' => '/produit-luxe/papeterie-table', 'tags' => 'menu mariage marque place numero table remerciement carte'],
    ['name' => 'Livrets de CÃ©rÃ©monie', 'slug' => 'livrets-ceremonie', 'category' => 'mariage-evenements', 'route' => '/produit-luxe/livrets-ceremonie', 'tags' => 'livret ceremonie mariage programme religieux civil eglise mosquee'],
    ['name' => 'Photobooth & Cadres Photo', 'slug' => 'photobooth', 'category' => 'mariage-evenements', 'route' => '/produit-luxe/photobooth', 'tags' => 'photobooth cadre fond photo mariage evenement soiree'],
    ['name' => 'Sacs Papier PersonnalisÃ©s', 'slug' => 'sacs-papier', 'category' => 'packaging-sacs', 'route' => '/produit-luxe/sacs-papier', 'tags' => 'sac papier kraft luxe boutique personnalise torsade poignee'],
    ['name' => 'Tote Bags Coton Bio', 'slug' => 'sacs-textile', 'category' => 'packaging-sacs', 'route' => '/produit-devis/sacs-textile', 'tags' => 'tote bag coton shopping non tisse eco responsable'],
    ['name' => 'BoÃ®tes Alimentaires', 'slug' => 'boites-alimentaires', 'category' => 'packaging-sacs', 'route' => '/produit-luxe/boites-alimentaires', 'tags' => 'boite burger pizza sandwich patisserie takeaway livraison'],
    ['name' => 'Packaging Restaurant', 'slug' => 'packaging-restaurant', 'category' => 'packaging-sacs', 'route' => '/produit-luxe/packaging-restaurant', 'tags' => 'packaging restaurant gobelet serviette sac livraison menu'],
    ['name' => 'BoÃ®tes & Coffrets Premium', 'slug' => 'packaging-premium', 'category' => 'packaging-sacs', 'route' => '/produit-luxe/packaging-premium', 'tags' => 'coffret rigide aimante dorure gaufrage emballage luxe cosmÃ©tique bijoux'],
    ['name' => 'Ã‰tiquettes Produits & Labels', 'slug' => 'etiquettes-packaging', 'category' => 'packaging-sacs', 'route' => '/produit-configurable/etiquettes-packaging', 'tags' => 'etiquette produit alimentaire bouteille cosmetique rouleau planche'],
    ['name' => 'Textile & VÃªtements Corporate', 'slug' => 'textile', 'category' => 'personnalisation-goodies', 'route' => '/produit-devis/textile', 'tags' => 'tshirt polo sweat hoodie tablier broderie flocage marquage'],
    ['name' => 'Goodies & Objets Publicitaires', 'slug' => 'goodies', 'category' => 'personnalisation-goodies', 'route' => '/produit-devis/goodies', 'tags' => 'mug gourde porte cle badge magnet stylo pub cadeaux'],
    ['name' => 'Cartes & Plaques NFC', 'slug' => 'nfc-qr', 'category' => 'personnalisation-goodies', 'route' => '/produit-configurable/nfc-qr', 'tags' => 'nfc qr code carte google review menu numerique restaurant'],
    ['name' => 'Cadeaux Photo PersonnalisÃ©s', 'slug' => 'cadeaux', 'category' => 'personnalisation-goodies', 'route' => '/produit-devis/cadeaux', 'tags' => 'cadeau photo toile puzzle coussin personnalise anniversaire'],
]);

const CATEGORY_LABELS = {
    'imprimerie': 'ðŸ–¨ï¸ Imprimerie',
    'enseignes-signaletique': 'ðŸª§ Enseignes',
    'mariage-evenements': 'ðŸ’ Mariage',
    'packaging-sacs': 'ðŸ“¦ Packaging',
    'personnalisation-goodies': 'ðŸŽ Goodies',
};

function sbSearch(initialQuery) {
    return {
        query: initialQuery,
        activeCategory: 'all',
        results: [],

        init() {
            this.search();
        },

        search() {
            const q = this.query.toLowerCase().trim();
            const cat = this.activeCategory;

            if (!q && cat === 'all') {
                this.results = [];
                return;
            }

            this.results = SB_SEARCH_INDEX.filter(item => {
                const matchesCat = cat === 'all' || item.category === cat;
                if (!q) return matchesCat;
                const haystack = (item.name + ' ' + item.tags + ' ' + item.category).toLowerCase();
                const matchesQuery = q.split(' ').every(word => haystack.includes(word));
                return matchesCat && matchesQuery;
            });
        },

        categoryLabel(cat) {
            return (CATEGORY_LABELS[cat] || cat).replace(/^[^\s]+ /, '');
        }
    };
}
</script>
@endpush

@endsection
