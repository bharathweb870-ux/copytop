@extends('layouts.app')

@section('title', 'Votre Panier d\'Achat — Shri Bharathi')
@section('description', 'Récapitulatif de votre commande et validation de vos fichiers d\'impression.')

@section('content')
<main class="bg-gray-50 min-h-screen py-10" x-data="cartManager()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Votre Panier de Commande</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Items List -->
            <div class="lg:col-span-8 space-y-4">
                
                <template x-for="(item, index) in items" :key="item.id">
                    <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                        <div class="flex items-start space-x-4">
                            <img :src="item.image" :alt="item.title" class="w-20 h-20 object-cover rounded-2xl border border-gray-100 flex-shrink-0">
                            <div>
                                <span class="text-[10px] font-bold text-brand-orange uppercase tracking-wider" x-text="item.category"></span>
                                <h3 class="text-base font-bold text-gray-900" x-text="item.title"></h3>
                                <p class="text-xs text-gray-500 mt-1" x-text="item.options"></p>
                                
                                <div class="mt-2 flex items-center space-x-2 text-[10px]">
                                    <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-bold flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Fichier BAT Conforme
                                    </span>
                                    <span class="text-gray-400">| Expédition : 48h</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end sm:space-x-6 pt-4 sm:pt-0 border-t sm:border-0 border-gray-100">
                            <div class="text-right">
                                <div class="text-lg font-extrabold text-gray-900" x-text="item.price + ' € HT'"></div>
                                <div class="text-[10px] text-gray-400">Qté : <span x-text="item.qty" class="font-bold"></span></div>
                            </div>
                            <button @click="removeItem(index)" class="text-gray-400 hover:text-red-600 transition p-2" title="Supprimer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>
                </template>

                <div x-show="items.length === 0" class="bg-white rounded-3xl p-12 text-center border border-gray-200 space-y-4">
                    <svg class="w-16 h-16 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <h3 class="text-lg font-bold text-gray-900">Votre panier est actuellement vide</h3>
                    <p class="text-xs text-gray-500">Parcourez notre catalogue d'imprimerie et d'enseignes lumineuses pour ajouter des articles.</p>
                    <a href="{{ route('category.imprimerie') }}" class="inline-block px-6 py-3 bg-brand-orange text-white font-bold text-xs rounded-xl shadow-lg hover:bg-orange-600 transition">
                        Explorer l'Imprimerie
                    </a>
                </div>

                <!-- Reassurance highlights -->
                <div class="bg-gradient-to-r from-orange-50 to-amber-50 rounded-2xl p-6 border border-orange-100 grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="flex items-center space-x-3">
                        <span class="text-xl">🔒</span>
                        <div>
                            <div class="font-bold text-gray-900">Paiement 100% Sécurisé</div>
                            <div class="text-gray-500 text-[10px]">CB, Visa, Mastercard, Virement</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="text-xl">🔍</span>
                        <div>
                            <div class="font-bold text-gray-900">Vérification Fichier Gratuite</div>
                            <div class="text-gray-500 text-[10px]">Contrôle résolution & fonds perdus</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="text-xl">🚚</span>
                        <div>
                            <div class="font-bold text-gray-900">Livraison Express Suivie</div>
                            <div class="text-gray-500 text-[10px]">Chrono 24h/48h avec suivi</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-4" x-show="items.length > 0">
                <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-xl space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 pb-4 border-b border-gray-100">Récapitulatif de Commande</h2>

                    <!-- Price breakdown -->
                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between text-gray-600">
                            <span>Sous-total HT</span>
                            <span class="font-bold text-gray-900" x-text="subtotalHT + ' €'"></span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Frais de livraison (Express 24h)</span>
                            <span class="font-bold text-green-600">OFFERT</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>TVA (20%)</span>
                            <span class="font-bold text-gray-900" x-text="tva + ' €'"></span>
                        </div>

                        <!-- Promo Code input -->
                        <div class="pt-2">
                            <div class="flex space-x-2">
                                <input type="text" placeholder="Code promo (ex. BHARATHI10)" class="flex-1 bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs font-bold text-gray-900 uppercase outline-none focus:border-brand-orange">
                                <button class="px-3 py-2 bg-gray-900 text-white font-bold rounded-xl text-xs hover:bg-gray-800 transition">Appliquer</button>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-100 flex justify-between items-end">
                            <div>
                                <span class="text-xs font-bold text-gray-900 uppercase">Total TTC</span>
                                <div class="text-2xl font-extrabold text-brand-orange" x-text="totalTTC + ' €'"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button @click="proceedToCheckout()" class="w-full py-4 bg-gradient-to-r from-brand-orange to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-brand-orange/30 transition text-center flex items-center justify-center space-x-2">
                        <span>Valider la Commande & Payer</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
function cartManager() {
    return {
        items: [
            {
                id: 1,
                title: 'Cartes de Visite Premium 350g',
                category: 'Imprimerie',
                options: '500 ex. — Pelliculage Soft-Touch + Coins Arrondis',
                price: 76.00,
                qty: 1,
                image: 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=300&q=80'
            },
            {
                id: 2,
                title: 'Néon LED Sur-Mesure "Cocktail & Dreams"',
                category: 'Enseignes & Signalétique',
                options: 'Largeur 90cm — Néon Rose Fluo + Acrylique Contour',
                price: 185.00,
                qty: 1,
                image: 'https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=300&q=80'
            }
        ],

        get subtotalHT() {
            let total = this.items.reduce((acc, item) => acc + (item.price * item.qty), 0);
            return total.toFixed(2);
        },

        get tva() {
            return (parseFloat(this.subtotalHT) * 0.20).toFixed(2);
        },

        get totalTTC() {
            return (parseFloat(this.subtotalHT) * 1.20).toFixed(2);
        },

        removeItem(index) {
            this.items.splice(index, 1);
        },

        proceedToCheckout() {
            alert('Commande de ' + this.totalTTC + '€ TTC transmise au paiement sécurisé !');
        }
    }
}
</script>
@endsection
