@extends('layouts.app')

@section('title', 'Enseignes & Signalétique sur Mesure — Shri Bharathi')
@section('description', 'Conception, fabrication et installation d\'enseignes lumineuses, caissons LED, neons sur-mesure, lettrage relief 3D, plaques professionnelles et habillage de vitrines.')

@section('main-class', '')
@section('content')
<main class="bg-gray-900 text-white min-h-screen">
    <!-- Category Hero Header -->
    <div class="relative overflow-hidden bg-gradient-to-b from-gray-950 via-gray-900 to-gray-900 border-b border-gray-800">
        <div class="absolute inset-0 opacity-25">
            <div class="absolute inset-0 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:24px_24px]"></div>
            <div class="absolute top-1/4 left-1/3 w-96 h-96 bg-brand-orange/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 sm:pt-28 pb-16 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center space-x-2 text-xs text-gray-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
                <span>/</span>
                <span class="text-brand-orange font-medium">Enseignes & Signalétique</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-brand-orange/20 text-brand-orange border border-brand-orange/30">
                        ⚡ Fabrication dans nos ateliers
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white leading-tight">
                        Enseignes Lumineuses & <br>
                        <span class="bg-gradient-to-r from-brand-orange via-amber-400 to-orange-500 bg-clip-text text-transparent">
                            Signalétique Haute Visibilité
                        </span>
                    </h1>
                    <p class="text-gray-300 text-base sm:text-lg max-w-2xl leading-relaxed">
                        Sublimez votre devanture de magasin ou vos espaces intérieurs. Du néon LED personnalisé aux lettres rétro-éclairées 3D, nous concrétisons votre identité de marque avec précision.
                    </p>

                    <!-- Key highlights -->
                    <div class="grid grid-cols-3 gap-4 pt-2">
                        <div class="bg-gray-800/60 border border-gray-700/50 rounded-xl p-3 text-center">
                            <div class="text-xl font-bold text-amber-400">LED 100K h</div>
                            <div class="text-xs text-gray-400">Basse consommation</div>
                        </div>
                        <div class="bg-gray-800/60 border border-gray-700/50 rounded-xl p-3 text-center">
                            <div class="text-xl font-bold text-amber-400">Sur-mesure</div>
                            <div class="text-xs text-gray-400">Étude & Pose</div>
                        </div>
                        <div class="bg-gray-800/60 border border-gray-700/50 rounded-xl p-3 text-center">
                            <div class="text-xl font-bold text-amber-400">Garantie 3 ans</div>
                            <div class="text-xs text-gray-400">Normes CE / IP67</div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="{{ route('neon.configurator') }}" class="px-6 py-3.5 bg-gradient-to-r from-brand-orange to-orange-600 text-white font-bold rounded-xl shadow-lg shadow-brand-orange/25 hover:from-orange-600 hover:to-orange-700 transition flex items-center space-x-2">
                            <span>✨ Tester le Configurateur Néon LED</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('quote') }}" class="px-6 py-3.5 bg-gray-800 hover:bg-gray-700 text-white font-semibold rounded-xl border border-gray-700 transition flex items-center space-x-2">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Demander un devis sur-mesure</span>
                        </a>
                    </div>
                </div>

                <!-- Feature Visual Hero Box -->
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-2xl overflow-hidden border border-gray-700 shadow-2xl bg-gray-800 group">
                        <img src="https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=800&q=80" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-signage.svg') }}';" alt="Enseigne néon lumineuse" class="w-full h-80 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 bg-gray-900/90 backdrop-blur-md p-4 rounded-xl border border-gray-700">
                            <div class="text-xs text-amber-400 font-bold uppercase tracking-wider mb-1">Rendu Haute Fidélité</div>
                            <div class="text-sm font-semibold text-white">Création néon sur mesure "Cocktail & Dreams"</div>
                            <div class="text-xs text-gray-400 mt-0.5">Fabriqué en France — Tube néon flex silicone IP65</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Subcategories -->
    <div class="sticky top-16 z-30 bg-gray-900/95 backdrop-blur-md border-b border-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-3 overflow-x-auto py-3 no-scrollbar text-sm">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider whitespace-nowrap">Gammes :</span>
                <a href="#neons" class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-brand-orange text-gray-200 hover:text-white transition whitespace-nowrap text-xs font-medium">Néons LED</a>
                <a href="#lettrage-3d" class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-brand-orange text-gray-200 hover:text-white transition whitespace-nowrap text-xs font-medium">Lettrage 3D Relief</a>
                <a href="#caissons" class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-brand-orange text-gray-200 hover:text-white transition whitespace-nowrap text-xs font-medium">Caissons Lumineux</a>
                <a href="#panneaux" class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-brand-orange text-gray-200 hover:text-white transition whitespace-nowrap text-xs font-medium">Panneaux Dibond / PVC</a>
                <a href="#plaques" class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-brand-orange text-gray-200 hover:text-white transition whitespace-nowrap text-xs font-medium">Plaques Laiton & Plexi</a>
                <a href="#vitrines" class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-brand-orange text-gray-200 hover:text-white transition whitespace-nowrap text-xs font-medium">Habillage Vitrine</a>
            </div>
        </div>
    </div>

    <!-- Product Subcategories Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

        <!-- Section 1: Néons LED Sur-mesure -->
        <section id="neons" class="scroll-mt-32">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4 border-b border-gray-800">
                <div>
                    <span class="text-xs font-bold text-brand-orange uppercase tracking-wider">Spécialité Shri Bharathi</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mt-1">Néons Flexible LED Sur-Mesure</h2>
                    <p class="text-gray-400 text-sm mt-1">Designers, bars, restaurants, salons & mariages : créez une ambiance lumineuse unique.</p>
                </div>
                <a href="{{ route('neon.configurator') }}" class="mt-4 md:mt-0 text-sm font-semibold text-brand-orange hover:text-orange-400 flex items-center space-x-1">
                    <span>Lancer l'outil 3D</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Neon Product Card 1 -->
                <div class="bg-gray-800/80 border border-gray-700/60 rounded-2xl overflow-hidden hover:border-brand-orange/60 transition group flex flex-col">
                    <div class="relative h-52 overflow-hidden bg-gray-900">
                        <img src="https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=600&q=80" alt="Néon Texte Citation" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-brand-orange text-white text-[10px] font-bold px-2.5 py-1 rounded-md uppercase">Configurable en direct</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-white group-hover:text-brand-orange transition">Néon LED sur-mesure (Texte / Citation)</h3>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">Personnalisez votre texte, police, couleur de néon (12 coloris), support acrylique transparent ou noir.</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-700/60 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-gray-400">À partir de</span>
                                <div class="text-xl font-extrabold text-amber-400">149,00 € <span class="text-xs text-gray-400 font-normal">HT</span></div>
                            </div>
                            <a href="{{ route('neon.configurator') }}" class="px-4 py-2 bg-brand-orange text-white text-xs font-bold rounded-lg hover:bg-orange-600 transition">Configuré en 1 min</a>
                        </div>
                    </div>
                </div>

                <!-- Neon Product Card 2 -->
                <div class="bg-gray-800/80 border border-gray-700/60 rounded-2xl overflow-hidden hover:border-brand-orange/60 transition group flex flex-col">
                    <div class="relative h-52 overflow-hidden bg-gray-900">
                        <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=600&q=80" alt="Néon Logo Entreprise" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md uppercase">Sur Devis Vectoriel</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-white group-hover:text-brand-orange transition">Néon LED Logo & Forme Vectorielle</h3>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">Reproduction exacte de votre logo commercial en néon LED haute puissance avec télécommande variateur.</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-700/60 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-gray-400">Estimation</span>
                                <div class="text-xl font-extrabold text-amber-400">220,00 € <span class="text-xs text-gray-400 font-normal">HT</span></div>
                            </div>
                            <a href="{{ route('product.enseignes', 'neon-logo') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-xs font-bold rounded-lg transition">Voir détails</a>
                        </div>
                    </div>
                </div>

                <!-- Neon Product Card 3 -->
                <div class="bg-gray-800/80 border border-gray-700/60 rounded-2xl overflow-hidden hover:border-brand-orange/60 transition group flex flex-col">
                    <div class="relative h-52 overflow-hidden bg-gray-900">
                        <img src="https://images.unsplash.com/photo-1543007630-9710e4a00a20?auto=format&fit=crop&w=600&q=80" alt="Néon Mariage Événement" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-pink-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md uppercase">Spécial Événement</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-white group-hover:text-brand-orange transition">Néon Mariage & Photobooth "Better Together"</h3>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">Modèles prêts à l'emploi ou personnalisés pour décors d'événements, arches florales & soirées.</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-700/60 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-gray-400">À partir de</span>
                                <div class="text-xl font-extrabold text-amber-400">129,00 € <span class="text-xs text-gray-400 font-normal">HT</span></div>
                            </div>
                            <a href="{{ route('product.enseignes', 'neon-mariage') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-xs font-bold rounded-lg transition">Voir la collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Lettrage Relief 3D -->
        <section id="lettrage-3d" class="scroll-mt-32">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4 border-b border-gray-800">
                <div>
                    <span class="text-xs font-bold text-brand-orange uppercase tracking-wider">Identité Architecturale</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mt-1">Lettrage 3D & Relief Élégant</h2>
                    <p class="text-gray-400 text-sm mt-1">Lettres découpées en PVC, Dibond aluminium, inox brossé ou bois avec ou sans rétro-éclairage LED.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-gray-800/80 border border-gray-700/60 rounded-2xl overflow-hidden hover:border-brand-orange/60 transition group">
                    <div class="h-48 overflow-hidden bg-gray-900">
                        <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b3?auto=format&fit=crop&w=600&q=80" alt="Lettres relief 3D rétro-éclairées" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white group-hover:text-brand-orange transition">Lettres Boîtier 3D Rétro-Éclairées LED</h3>
                        <p class="text-gray-400 text-xs mt-2">Éclairage indirect élégant vers la façade. Finition alu laqué, laiton ou inox microbillé.</p>
                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-bold text-amber-400">Sur devis technique</span>
                            <a href="{{ route('product.quote', 'lettrage-retro-eclaire') }}" class="px-4 py-2 bg-brand-orange/20 text-brand-orange text-xs font-bold rounded-lg hover:bg-brand-orange hover:text-white transition">Configurateur Devis</a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-gray-800/80 border border-gray-700/60 rounded-2xl overflow-hidden hover:border-brand-orange/60 transition group">
                    <div class="h-48 overflow-hidden bg-gray-900">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80" alt="Lettres découpées PVC / Dibond" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white group-hover:text-brand-orange transition">Lettres Découpées Non-Éclairées (PVC / Bois)</h3>
                        <p class="text-gray-400 text-xs mt-2">Pose directe ou sur entretoises pour donner de la profondeur à votre logo d'accueil.</p>
                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-bold text-amber-400">À partir de 89,00 € HT</span>
                            <a href="{{ route('product.quote', 'lettres-decoupees') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-xs font-bold rounded-lg transition">Calculer tarif</a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-gray-800/80 border border-gray-700/60 rounded-2xl overflow-hidden hover:border-brand-orange/60 transition group">
                    <div class="h-48 overflow-hidden bg-gray-900">
                        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80" alt="Plaque Inox & Laiton prestige" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white group-hover:text-brand-orange transition">Plaques Gravées Professionnelles & Laiton</h3>
                        <p class="text-gray-400 text-xs mt-2">Avocats, médecins, sièges sociaux. Gravure haute précision et polissage miroir.</p>
                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-bold text-amber-400">À partir de 65,00 € HT</span>
                            <a href="{{ route('product.quote', 'plaque-professionnelle') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-xs font-bold rounded-lg transition">Personnaliser</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Interactive Quote Banner CTA -->
        <section class="bg-gradient-to-r from-gray-950 via-gray-900 to-gray-950 border border-brand-orange/30 rounded-3xl p-8 sm:p-12 relative overflow-hidden shadow-2xl">
            <div class="absolute -right-10 -bottom-10 w-80 h-80 bg-brand-orange/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-4">
                    <span class="text-xs font-bold text-amber-400 tracking-wider uppercase">Accompagnement & Pose dans toute la France</span>
                    <h3 class="text-2xl sm:text-4xl font-extrabold text-white">Vous avez un projet d'enseigne complète pour votre boutique ?</h3>
                    <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                        Nos ingénieurs graphiques et poseurs agréés vous accompagnent de la maquette 3D préalable jusqu'à la déclaration préalable en mairie et la pose sur site.
                    </p>
                </div>
                <div class="lg:col-span-4 flex flex-col space-y-3">
                    <a href="{{ route('quote') }}" class="w-full py-4 bg-brand-orange hover:bg-orange-600 text-white font-bold rounded-xl text-center shadow-lg shadow-brand-orange/30 transition">
                        Obtenir une simulation & devis gratuit
                    </a>
                    <a href="tel:+33140000000" class="w-full py-3 bg-gray-800 hover:bg-gray-700 text-gray-300 text-center text-xs font-semibold rounded-xl border border-gray-700 transition">
                        📞 Parler à un conseiller enseigne
                    </a>
                </div>
            </div>
        </section>

    </div>
</main>
@endsection
