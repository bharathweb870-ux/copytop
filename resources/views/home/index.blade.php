@extends('layouts.app', ['heroPage' => true])

@section('main-class', '')

@section('title', 'Shri Bharathi — Impression, Signalétique, Mariage & Personnalisation')
@section('description', 'Donnez vie à vos idées. Impression professionnelle, enseignes lumineuses, faire-part mariage, packaging personnalisé et goodies premium. Tout au même endroit.')

@section('content')

{{-- ============================================================
     HERO
     ============================================================ --}}
<section class="hero" aria-label="Bannière principale">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>

    <div class="container-sb" style="padding-top:8rem;padding-bottom:5rem;">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">

            {{-- Left: Content --}}
            <div class="hero-content">
                <p class="hero-tagline">Votre partenaire premium</p>

                <h1 class="hero-title">
                    Donnez vie<br>
                    à <span class="text-gradient-gold">vos idées.</span>
                </h1>

                <p class="hero-subtitle">
                    Impression, signalétique, mariage, packaging et personnalisation — tout au même endroit. Qualité française, service expert, livraison rapide.
                </p>

                <div class="hero-pills">
                    <span class="hero-pill">✦ Impression</span>
                    <span class="hero-pill">✦ Signalétique</span>
                    <span class="hero-pill">✦ Mariage</span>
                    <span class="hero-pill">✦ Packaging</span>
                    <span class="hero-pill">✦ Personnalisation</span>
                </div>

                <div class="hero-actions">
                    <a href="{{ route('category.imprimerie') }}" class="btn btn-primary btn-lg" id="hero-cta-discover">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        Découvrir nos produits
                    </a>
                    <a href="{{ route('templates') }}" class="btn btn-ghost btn-lg" id="hero-cta-create">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        Créer mon design
                    </a>
                    <a href="{{ route('quote') }}" class="btn btn-secondary btn-lg" id="hero-cta-quote" style="border-color:rgba(255,255,255,0.3);color:rgba(255,255,255,0.8);">
                        Demander un devis
                    </a>
                </div>
            </div>

            {{-- Right: Visual --}}
            <div class="hero-visual">
                <div class="hero-cards-stack">
                    <div class="hero-card-back-2"></div>
                    <div class="hero-card-back-1"></div>
                    <div class="hero-card hero-card-main">
                        {{-- Simulated business card preview --}}
                        <div style="background:linear-gradient(135deg,#1A1A2E,#0F3460);border-radius:0.75rem;padding:1.75rem;margin-bottom:1rem;position:relative;overflow:hidden;">
                            <div style="position:absolute;top:-20px;right:-20px;width:100px;height:100px;background:rgba(201,168,76,0.1);border-radius:50%;"></div>
                            <div style="position:absolute;bottom:-30px;left:-10px;width:80px;height:80px;background:rgba(201,168,76,0.06);border-radius:50%;"></div>
                            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1.25rem;">
                                <div style="width:2.5rem;height:2.5rem;background:linear-gradient(135deg,#C9A84C,#E8C96A);border-radius:0.5rem;display:flex;align-items:center;justify-content:center;font-weight:900;color:#1A1A2E;font-size:1rem;">A</div>
                                <div>
                                    <div style="font-family:'Playfair Display',serif;font-size:1rem;font-weight:600;color:white;">Alexandre Martin</div>
                                    <div style="font-size:0.75rem;color:rgba(201,168,76,0.8);">Directeur Commercial</div>
                                </div>
                            </div>
                            <div style="border-top:1px solid rgba(201,168,76,0.2);padding-top:1rem;">
                                <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);line-height:1.8;">
                                    📱 +33 6 12 34 56 78<br>
                                    ✉️ a.martin@entreprise.fr<br>
                                    🌐 www.entreprise.fr
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.75rem;align-items:center;">
                            <div style="flex:1;">
                                <div style="font-size:0.75rem;color:rgba(255,255,255,0.5);margin-bottom:0.35rem;">Options</div>
                                <div style="display:flex;gap:0.4rem;flex-wrap:wrap;">
                                    <span style="background:rgba(201,168,76,0.15);border:1px solid rgba(201,168,76,0.3);color:#E8C96A;padding:0.2rem 0.6rem;border-radius:99px;font-size:0.7rem;">Pelliculée Mat</span>
                                    <span style="background:rgba(201,168,76,0.15);border:1px solid rgba(201,168,76,0.3);color:#E8C96A;padding:0.2rem 0.6rem;border-radius:99px;font-size:0.7rem;">Coins ronds</span>
                                    <span style="background:rgba(201,168,76,0.15);border:1px solid rgba(201,168,76,0.3);color:#E8C96A;padding:0.2rem 0.6rem;border-radius:99px;font-size:0.7rem;">Recto-verso</span>
                                </div>
                            </div>
                            <div style="text-align:right;">
                                <div style="font-size:0.7rem;color:rgba(255,255,255,0.4);">500 ex.</div>
                                <div style="font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:#C9A84C;line-height:1.1;">49,90€</div>
                                <div style="font-size:0.65rem;color:rgba(255,255,255,0.4);">HT · livraison incluse</div>
                            </div>
                        </div>
                        <a href="{{ route('product.imprimerie', 'cartes-de-visite') }}" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:1rem;font-size:0.88rem;">
                            Personnaliser maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);text-align:center;color:rgba(255,255,255,0.4);font-size:0.75rem;animation:bounce 2s infinite;">
        <div style="margin-bottom:0.35rem;">Découvrir</div>
        <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>

{{-- ============================================================
     MAIN CATEGORIES
     ============================================================ --}}
<section class="section-py bg-cream" aria-label="Nos catégories">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label">Nos univers</span>
            <h2 class="section-title">Tout ce dont vous avez besoin</h2>
            <p class="section-subtitle">De l'impression classique à la signalétique sur-mesure, découvrez notre univers complet.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @php
            $categories = [
                ['slug' => 'imprimerie', 'name' => 'Imprimerie', 'icon' => '🖨️', 'count' => '50+ produits', 'gradient' => 'linear-gradient(135deg,#1A1A2E,#16213E)', 'route' => 'category.imprimerie'],
                ['slug' => 'enseignes-signaletique', 'name' => 'Enseignes & Signalétique', 'icon' => '🪧', 'count' => '40+ produits', 'gradient' => 'linear-gradient(135deg,#0F3460,#162442)', 'route' => 'category.enseignes'],
                ['slug' => 'mariage-evenements', 'name' => 'Mariage & Événements', 'icon' => '💍', 'count' => '30+ collections', 'gradient' => 'linear-gradient(135deg,#3D1A78,#6B2FA0)', 'route' => 'category.mariage'],
                ['slug' => 'packaging-sacs', 'name' => 'Packaging & Sacs', 'icon' => '📦', 'count' => '35+ références', 'gradient' => 'linear-gradient(135deg,#1A3A2E,#2D6A4F)', 'route' => 'category.packaging'],
                ['slug' => 'personnalisation-goodies', 'name' => 'Goodies & Textile', 'icon' => '🎁', 'count' => '25+ produits', 'gradient' => 'linear-gradient(135deg,#3A1A1A,#7B2D2D)', 'route' => 'category.goodies'],
            ];
            @endphp

            @foreach($categories as $i => $cat)
            <a href="{{ route($cat['route']) }}" class="category-card animate-on-scroll animate-delay-{{ $i + 1 }}" id="category-{{ $cat['slug'] }}" style="min-height:220px;">
                <div class="category-card-bg" style="background:{{ $cat['gradient'] }};position:absolute;inset:0;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-arrow">→</div>
                <div class="category-card-content">
                    <div class="category-card-icon">{{ $cat['icon'] }}</div>
                    <div class="category-card-name">{{ $cat['name'] }}</div>
                    <div class="category-card-count">{{ $cat['count'] }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     FEATURED PRODUCTS
     ============================================================ --}}
<section class="section-py" aria-label="Produits vedettes">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label">Best-sellers</span>
            <h2 class="section-title">Nos produits les plus populaires</h2>
            <p class="section-subtitle">Commandez en ligne en quelques minutes avec nos configurateurs intelligents.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @php
            $products = [
                ['name'=>'Cartes de visite','desc'=>'Format standard, premium, pelliculée, Soft Touch…','price'=>'à partir de 29,90€','badge'=>'Best-seller','category'=>'imprimerie','slug'=>'cartes-de-visite','color'=>'#C9A84C','icon'=>'💳'],
                ['name'=>'Flyers A5','desc'=>'Papier 135g, 150g ou 200g. Recto ou recto-verso.','price'=>'à partir de 19,90€','badge'=>'Populaire','category'=>'imprimerie','slug'=>'flyers','color'=>'#3B82F6','icon'=>'📄'],
                ['name'=>'Néon personnalisé','desc'=>'Texte ou logo. 12 couleurs disponibles.','price'=>'Sur devis','badge'=>'Nouveau','category'=>'enseignes-signaletique','slug'=>'neons-personnalises','color'=>'#EC4899','icon'=>'✨'],
                ['name'=>'Roll-up','desc'=>'Kakémono 85×200cm. Installation rapide.','price'=>'à partir de 59,90€','badge'=>'Express','category'=>'enseignes-signaletique','slug'=>'roll-up','color'=>'#10B981','icon'=>'🎪'],
                ['name'=>'Faire-part Mariage','desc'=>'Collections classique, luxe, floral et plus.','price'=>'Sur devis','badge'=>'Collection 2025','category'=>'mariage-evenements','slug'=>'faire-part','color'=>'#8B5CF6','icon'=>'💌'],
                ['name'=>'Sac kraft personnalisé','desc'=>'Poignées plates ou torsadées. Logo imprimé.','price'=>'Sur devis','badge'=>'','category'=>'packaging-sacs','slug'=>'sacs-papier','color'=>'#F59E0B','icon'=>'🛍️'],
                ['name'=>'T-shirt personnalisé','desc'=>'Impression DTG ou flex. Toutes tailles.','price'=>'à partir de 12,90€','badge'=>'','category'=>'personnalisation-goodies','slug'=>'t-shirt','color'=>'#EF4444','icon'=>'👕'],
                ['name'=>'Carte NFC Google Review','desc'=>'Boostez vos avis Google en un tap.','price'=>'à partir de 9,90€','badge'=>'Trending','category'=>'personnalisation-goodies','slug'=>'carte-nfc','color'=>'#06B6D4','icon'=>'📱'],
            ];
            @endphp

            @foreach($products as $i => $p)
            <div class="product-card animate-on-scroll animate-delay-{{ ($i % 4) + 1 }}" id="product-{{ $p['slug'] }}">
                <div class="product-card-image" style="aspect-ratio:4/3;">
                    <div style="position:absolute;inset:0;background:linear-gradient(135deg,{{ $p['color'] }}22,{{ $p['color'] }}44);display:flex;align-items:center;justify-content:center;font-size:3.5rem;">
                        {{ $p['icon'] }}
                    </div>
                    <div class="product-card-overlay">
                        <a href="{{ route('product.'.$p['category'], $p['slug']) }}" class="btn btn-primary btn-sm" style="font-size:0.75rem;">
                            Voir le produit
                        </a>
                    </div>
                    @if($p['badge'])
                    <div style="position:absolute;top:0.75rem;left:0.75rem;">
                        <span class="badge badge-gold">{{ $p['badge'] }}</span>
                    </div>
                    @endif
                </div>
                <div class="product-card-body">
                    <div class="product-card-name">{{ $p['name'] }}</div>
                    <div class="product-card-desc">{{ $p['desc'] }}</div>
                    <div class="flex items-center justify-between">
                        <span class="product-card-price">{{ $p['price'] }}</span>
                        <a href="{{ route('product.'.$p['category'], $p['slug']) }}" class="btn btn-dark btn-sm">Commander</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     WHY SHRI BHARATHI
     ============================================================ --}}
<section class="section-py" style="background:linear-gradient(135deg,#1A1A2E,#0F3460);" aria-label="Pourquoi nous choisir">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label" style="color:#E8C96A;">Notre engagement</span>
            <h2 class="section-title" style="color:white;">Pourquoi choisir Shri Bharathi ?</h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.65);">Une expertise métier reconnue, une qualité irréprochable et un service client qui fait la différence.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $reasons = [
                ['icon'=>'🎯','title'=>'Qualité premium','desc'=>'Papiers nobles, encres UV, finitions haut de gamme. Chaque commande est contrôlée avant expédition.'],
                ['icon'=>'⚡','title'=>'Livraison express','desc'=>'Délais standard de 5 jours ou express 48h selon les produits. Expédition en France et en Europe.'],
                ['icon'=>'🎨','title'=>'Modèles inclus','desc'=>'Bibliothèque de centaines de modèles professionnels. Personnalisez en ligne ou confiez-nous votre projet.'],
                ['icon'=>'💬','title'=>'Support expert','desc'=>'Notre équipe répond en moins de 2h. Conseils fichiers, questions techniques ou suivi de commande.'],
                ['icon'=>'✅','title'=>'Bon à tirer inclus','desc'=>'Validation du fichier avant impression. Aperçu numérique fourni pour chaque commande.'],
                ['icon'=>'🔒','title'=>'Paiement sécurisé','desc'=>'Paiement CB, virement ou bon de commande. Données sécurisées SSL 256-bit.'],
                ['icon'=>'🌿','title'=>'Éco-responsable','desc'=>'Papiers certifiés FSC®, encres à base végétale et packaging recyclable. Notre engagement durable.'],
                ['icon'=>'⭐','title'=>'Satisfaction garantie','desc'=>'Votre satisfaction est notre priorité. Problème ? Nous réimprimons ou vous remboursons.'],
            ];
            @endphp

            @foreach($reasons as $i => $r)
            <div class="why-card animate-on-scroll animate-delay-{{ ($i % 4) + 1 }}">
                <div class="why-icon" style="background:rgba(201,168,76,0.12);border-color:rgba(201,168,76,0.25);">{{ $r['icon'] }}</div>
                <div class="why-title" style="color:white;">{{ $r['title'] }}</div>
                <div class="why-desc" style="color:rgba(255,255,255,0.6);">{{ $r['desc'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     CREATE YOUR DESIGN CTA
     ============================================================ --}}
<section class="section-py bg-cream" aria-label="Créez votre design">
    <div class="container-sb">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll">
                <span class="section-label">Éditeur en ligne</span>
                <h2 class="section-title">Créez votre design<br>en quelques minutes</h2>
                <p style="color:var(--sb-slate);font-size:1rem;line-height:1.75;margin-bottom:2rem;">
                    Choisissez parmi nos centaines de modèles professionnels, personnalisez-le avec notre éditeur intuitif, et commandez directement. Pas besoin de graphiste !
                </p>
                <div style="display:flex;flex-direction:column;gap:0.875rem;margin-bottom:2rem;">
                    @foreach(['Choisissez un modèle parmi 500+ designs','Personnalisez textes, couleurs et logo','Prévisualisez votre résultat en temps réel','Commandez en quelques clics'] as $j => $step)
                    <div style="display:flex;align-items:center;gap:1rem;">
                        <div style="width:2rem;height:2rem;background:linear-gradient(135deg,#C9A84C,#E8C96A);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#1A1A2E;flex-shrink:0;">{{ $j+1 }}</div>
                        <span style="font-size:0.95rem;color:var(--sb-charcoal);">{{ $step }}</span>
                    </div>
                    @endforeach
                </div>
                <div style="display:flex;gap:1rem;flex-wrap:wrap;">
                    <a href="{{ route('templates') }}" class="btn btn-primary btn-lg" id="cta-templates">
                        Voir les modèles
                    </a>
                    <a href="{{ route('editor') }}" class="btn btn-secondary btn-lg" id="cta-editor">
                        Essayer l'éditeur
                    </a>
                </div>
            </div>
            <div class="animate-on-scroll animate-delay-2">
                {{-- Editor preview mockup --}}
                <div style="background:#141519;border-radius:1.25rem;overflow:hidden;box-shadow:0 24px 80px rgba(0,0,0,0.35);border:1px solid rgba(255,255,255,0.06);">
                    {{-- Editor top bar --}}
                    <div style="background:#1A1B26;padding:0.75rem 1rem;display:flex;align-items:center;gap:0.5rem;border-bottom:1px solid rgba(255,255,255,0.06);">
                        <div style="width:0.75rem;height:0.75rem;background:#FF5F56;border-radius:50%;"></div>
                        <div style="width:0.75rem;height:0.75rem;background:#FFBD2E;border-radius:50%;"></div>
                        <div style="width:0.75rem;height:0.75rem;background:#27C93F;border-radius:50%;"></div>
                        <div style="flex:1;text-align:center;font-size:0.75rem;color:rgba(255,255,255,0.4);">Éditeur Shri Bharathi</div>
                    </div>
                    {{-- Editor area --}}
                    <div style="display:grid;grid-template-columns:48px 1fr 160px;height:240px;">
                        {{-- Left tools --}}
                        <div style="background:#1A1B26;border-right:1px solid rgba(255,255,255,0.06);display:flex;flex-direction:column;align-items:center;padding:0.75rem 0;gap:0.5rem;">
                            @foreach(['🖱️','📝','🖼️','🔷','↗️','🎨'] as $tool)
                            <div style="width:2rem;height:2rem;border-radius:0.35rem;background:rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;font-size:0.75rem;cursor:pointer;">{{ $tool }}</div>
                            @endforeach
                        </div>
                        {{-- Canvas --}}
                        <div style="background:#0F1117;display:flex;align-items:center;justify-content:center;padding:1rem;">
                            <div style="background:white;width:120px;height:70px;border-radius:4px;box-shadow:0 4px 20px rgba(0,0,0,0.4);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:0.2rem;position:relative;">
                                <div style="width:20px;height:20px;background:linear-gradient(135deg,#C9A84C,#E8C96A);border-radius:3px;font-size:0.65rem;font-weight:900;display:flex;align-items:center;justify-content:center;">A</div>
                                <div style="font-size:0.45rem;font-weight:700;color:#1A1A2E;letter-spacing:0.05em;">ALEXANDRE MARTIN</div>
                                <div style="font-size:0.37rem;color:#6B7280;">Directeur Commercial</div>
                                <div style="font-size:0.32rem;color:#9CA3AF;">+33 6 12 34 56 78</div>
                                <div style="position:absolute;top:3px;left:3px;width:8px;height:8px;border:1.5px solid #C9A84C;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                    <div style="font-size:5px;">✎</div>
                                </div>
                            </div>
                        </div>
                        {{-- Right panel --}}
                        <div style="background:#1A1B26;border-left:1px solid rgba(255,255,255,0.06);padding:0.75rem;font-size:0.65rem;color:rgba(255,255,255,0.5);">
                            <div style="font-size:0.6rem;font-weight:700;letter-spacing:0.08em;color:rgba(255,255,255,0.3);text-transform:uppercase;margin-bottom:0.5rem;">Texte sélectionné</div>
                            <div style="background:rgba(255,255,255,0.05);border-radius:0.25rem;padding:0.35rem;margin-bottom:0.35rem;">Playfair Display</div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.25rem;margin-bottom:0.5rem;">
                                <div style="background:rgba(255,255,255,0.05);border-radius:0.25rem;padding:0.25rem;text-align:center;">14px</div>
                                <div style="background:rgba(255,255,255,0.05);border-radius:0.25rem;padding:0.25rem;text-align:center;">Gras</div>
                            </div>
                            <div style="margin-bottom:0.25rem;color:rgba(255,255,255,0.3);font-size:0.55rem;text-transform:uppercase;letter-spacing:0.08em;">Couleur</div>
                            <div style="display:flex;gap:0.2rem;flex-wrap:wrap;">
                                @foreach(['#1A1A2E','#C9A84C','#E8C96A','#6B7280','#EF4444','#10B981'] as $color)
                                <div style="width:1.1rem;height:1.1rem;background:{{ $color }};border-radius:50%;cursor:pointer;{{ $color==='#C9A84C' ? 'border:2px solid white;' : '' }}"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Bottom bar --}}
                    <div style="background:#1A1B26;padding:0.5rem 1rem;display:flex;align-items:center;justify-content:space-between;border-top:1px solid rgba(255,255,255,0.06);">
                        <div style="display:flex;gap:0.5rem;">
                            <span style="background:rgba(255,255,255,0.05);padding:0.2rem 0.5rem;border-radius:0.25rem;font-size:0.65rem;color:rgba(255,255,255,0.4);">↩ Annuler</span>
                            <span style="background:rgba(255,255,255,0.05);padding:0.2rem 0.5rem;border-radius:0.25rem;font-size:0.65rem;color:rgba(255,255,255,0.4);">↪ Refaire</span>
                        </div>
                        <div style="background:linear-gradient(135deg,#C9A84C,#E8C96A);padding:0.2rem 0.75rem;border-radius:0.25rem;font-size:0.65rem;color:#1A1A2E;font-weight:700;cursor:pointer;">
                            Commander →
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     IMPRIMERIE HIGHLIGHT
     ============================================================ --}}
<section class="section-py" aria-label="Imprimerie">
    <div class="container-sb">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                <div class="grid grid-cols-2 gap-3">
                    @php
                    $printItems = [
                        ['name'=>'Cartes de visite','icon'=>'💳','desc'=>'Standard, premium, pelliculée, Soft Touch, NFC','color'=>'#1A1A2E'],
                        ['name'=>'Flyers','icon'=>'📄','desc'=>'A6, A5, A4, DL, carré','color'=>'#16213E'],
                        ['name'=>'Affiches','icon'=>'🖼️','desc'=>'A3 à A0 et grand format','color'=>'#0F3460'],
                        ['name'=>'Dépliants','icon'=>'📋','desc'=>'2 volets, 3 volets, accordéon','color'=>'#162442'],
                        ['name'=>'Brochures','icon'=>'📚','desc'=>'Agrafées, catalogues, livrets','color'=>'#1F3461'],
                        ['name'=>'Menus resto','icon'=>'🍽️','desc'=>'Imprimé, plastifié, rigide, chevalet','color'=>'#243B55'],
                    ];
                    @endphp
                    @foreach($printItems as $item)
                    <a href="{{ route('category.imprimerie') }}" style="background:{{ $item['color'] }};border-radius:0.75rem;padding:1.25rem;display:block;text-decoration:none;transition:transform 0.25s ease,box-shadow 0.25s ease;border:1px solid rgba(201,168,76,0.1);" class="hover:transform hover:-translate-y-1">
                        <div style="font-size:1.5rem;margin-bottom:0.5rem;">{{ $item['icon'] }}</div>
                        <div style="font-weight:600;font-size:0.9rem;color:white;margin-bottom:0.25rem;">{{ $item['name'] }}</div>
                        <div style="font-size:0.75rem;color:rgba(255,255,255,0.5);">{{ $item['desc'] }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="order-1 lg:order-2 animate-on-scroll">
                <span class="section-label">Imprimerie professionnelle</span>
                <h2 class="section-title">Des impressions qui font la différence</h2>
                <p style="color:var(--sb-slate);line-height:1.75;margin-bottom:1.5rem;">
                    Cartes de visite, flyers, dépliants, brochures, affiches, menus, papeterie d'entreprise, stickers… Nos équipements haute définition garantissent une qualité d'impression impeccable à chaque commande.
                </p>
                <div style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:2rem;">
                    @foreach(['HD 300 DPI','Papiers certifiés FSC®','Livraison 5j','Bon à tirer gratuit'] as $tag)
                    <span class="badge badge-outline">✓ {{ $tag }}</span>
                    @endforeach
                </div>
                <a href="{{ route('category.imprimerie') }}" class="btn btn-primary btn-lg" id="cta-imprimerie">
                    Explorer l'imprimerie →
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     ENSEIGNES & NÉONS
     ============================================================ --}}
<section class="section-py" style="background:#0A0A0F;" aria-label="Enseignes et néons">
    <div class="container-sb">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll">
                <span class="section-label" style="color:#E8C96A;">Visibilité & Impact</span>
                <h2 class="section-title" style="color:white;">Enseignes & Néons<br><em style="font-style:italic;color:#C9A84C;">personnalisés</em></h2>
                <p style="color:rgba(255,255,255,0.6);line-height:1.75;margin-bottom:1.5rem;">
                    Attirez l'attention et marquez les esprits. Enseignes Dibond, lettres 3D, caissons lumineux, néons LED personnalisés, bâches, vitrophanie et roll-up pour tous vos projets.
                </p>
                <div class="grid grid-cols-2 gap-3 mb-6">
                    @foreach(['Néons LED personnalisés','Enseignes Dibond / PVC','Lettres 3D & logos','Vitrophanie','Roll-up & Kakémono','Signalétique intérieure'] as $item)
                    <div style="display:flex;align-items:center;gap:0.5rem;color:rgba(255,255,255,0.7);font-size:0.875rem;">
                        <span style="color:#C9A84C;font-size:1rem;">✦</span> {{ $item }}
                    </div>
                    @endforeach
                </div>
                <div style="display:flex;gap:1rem;flex-wrap:wrap;">
                    <a href="{{ route('category.enseignes') }}" class="btn btn-primary btn-lg" id="cta-enseignes">
                        Explorer les enseignes →
                    </a>
                    <a href="{{ route('neon.configurator') }}" class="btn btn-ghost btn-lg" id="cta-neon">
                        Configurer mon néon
                    </a>
                </div>
            </div>
            <div class="animate-on-scroll animate-delay-2">
                {{-- Neon preview visual --}}
                <div class="neon-preview-area" style="min-height:300px;">
                    <div style="text-align:center;">
                        <div class="neon-text-preview" style="color:#FF6EB4;font-size:clamp(2.5rem,5vw,3.5rem);">
                            Shri Bharathi
                        </div>
                        <div style="margin-top:1.5rem;font-size:0.8rem;color:rgba(255,255,255,0.3);">← Néon LED personnalisé</div>
                    </div>
                    {{-- Decorative elements --}}
                    <div style="position:absolute;top:1rem;right:1rem;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:0.5rem;padding:0.5rem 0.75rem;font-size:0.7rem;color:rgba(255,255,255,0.4);">
                        12 couleurs disponibles
                    </div>
                </div>
                <div style="display:flex;gap:0.5rem;margin-top:1rem;justify-content:center;flex-wrap:wrap;">
                    @foreach(['#FF6EB4','#00BFFF','#7FFF00','#FF4500','#FFD700','#FF00FF','#00FFFF','#FFFFFF'] as $neonColor)
                    <div style="width:2rem;height:2rem;border-radius:50%;background:{{ $neonColor }};box-shadow:0 0 8px {{ $neonColor }},0 0 16px {{ $neonColor }}55;cursor:pointer;transition:transform 0.2s;" title="{{ $neonColor }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     MARIAGE & ÉVÉNEMENTS
     ============================================================ --}}
<section class="section-py bg-cream" aria-label="Mariage et événements">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label">Romance & Élégance</span>
            <h2 class="section-title">Mariage & Événements</h2>
            <p class="section-subtitle">Des créations sur-mesure pour vos moments les plus précieux. Collections mariage, faire-part, welcome boards et papeterie de table.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
            @php
            $weddingItems = [
                ['name'=>'Faire-part de mariage','desc'=>'Collections classique, luxe, floral, indien, tamoul, chrétien et plus encore.','icon'=>'💌','gradient'=>'linear-gradient(135deg,#3D1A78,#9D50BB)'],
                ['name'=>'Welcome Boards','desc'=>'PVC, Plexiglas, Dibond ou Miroir. Format personnalisé, impression HD.','icon'=>'🪞','gradient'=>'linear-gradient(135deg,#C9A84C,#F5D06B)'],
                ['name'=>'Plans de table','desc'=>'Imprimé, Plexiglas ou Miroir. Design sur-mesure pour votre thème de mariage.','icon'=>'🗺️','gradient'=>'linear-gradient(135deg,#2D6A4F,#52B788)'],
                ['name'=>'Livrets de cérémonie','desc'=>'Religieux ou civil. Brochures agrafées personnalisées à vos couleurs.','icon'=>'📖','gradient'=>'linear-gradient(135deg,#5B2C6F,#AF7AC5)'],
                ['name'=>'Panneaux événementiels','desc'=>'Bienvenue, bar, cocktail, livre d\'or, photobooth, directionnel.','icon'=>'🎪','gradient'=>'linear-gradient(135deg,#922B21,#E74C3C)'],
                ['name'=>'Papeterie de table','desc'=>'Menus, marque-places, numéros de table, cartes de remerciement.','icon'=>'🌸','gradient'=>'linear-gradient(135deg,#154360,#2E86C1)'],
            ];
            @endphp
            @foreach($weddingItems as $i => $item)
            <div class="wedding-card animate-on-scroll animate-delay-{{ ($i % 3) + 1 }}" style="text-decoration:none;">
                <div style="background:{{ $item['gradient'] }};height:200px;display:flex;align-items:center;justify-content:center;font-size:3rem;">
                    {{ $item['icon'] }}
                </div>
                <div class="wedding-card-overlay" style="height:200px;top:0;position:absolute;width:100%;justify-content:flex-end;flex-direction:column;display:flex;">
                    <div style="padding:1.25rem;">
                        <div style="font-family:'Playfair Display',serif;font-size:1.05rem;font-weight:600;margin-bottom:0.3rem;">{{ $item['name'] }}</div>
                        <div style="font-size:0.78rem;color:rgba(255,255,255,0.7);">{{ $item['desc'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align:center;">
            <p style="color:var(--sb-slate);margin-bottom:1.5rem;font-style:italic;">Section devis uniquement — chaque projet mariage est unique et nécessite un accompagnement personnalisé.</p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('category.mariage') }}" class="btn btn-primary btn-lg" id="cta-mariage">Voir la collection mariage</a>
                <a href="{{ route('quote') }}" class="btn btn-secondary btn-lg">Demander un devis</a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     PACKAGING & SACS
     ============================================================ --}}
<section class="section-py" aria-label="Packaging et sacs">
    <div class="container-sb">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll">
                <span class="section-label">Identité de marque</span>
                <h2 class="section-title">Packaging & Sacs<br>qui vous ressemblent</h2>
                <p style="color:var(--sb-slate);line-height:1.75;margin-bottom:1.5rem;">
                    De la boulangerie au restaurant étoilé, du e-commerce à la boutique de luxe — votre packaging est votre première impression. Sacs kraft, boîtes alimentaires, coffrets premium et étiquettes personnalisées.
                </p>
                <div class="grid grid-cols-2 gap-2 mb-6">
                    @foreach(['Sacs kraft & luxe','Boîtes alimentaires','Packaging restaurant','Coffrets cadeaux','Étiquettes produits','Sur mesure'] as $item)
                    <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.875rem;color:var(--sb-charcoal);">
                        <span style="color:#C9A84C;">✦</span> {{ $item }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('category.packaging') }}" class="btn btn-primary btn-lg" id="cta-packaging">Voir le packaging →</a>
            </div>
            <div class="animate-on-scroll animate-delay-2">
                <div class="grid grid-cols-2 gap-3">
                    @php
                    $packItems = [
                        ['icon'=>'🛍️','name'=>'Sac kraft','color'=>'#8B6914'],
                        ['icon'=>'📦','name'=>'Boîte burger','color'=>'#7B2D2D'],
                        ['icon'=>'🎁','name'=>'Coffret luxe','color'=>'#1A1A2E'],
                        ['icon'=>'🍕','name'=>'Boîte pizza','color'=>'#8B4513'],
                        ['icon'=>'💅','name'=>'Packaging cosmétique','color'=>'#4A235A'],
                        ['icon'=>'🏷️','name'=>'Étiquettes','color'=>'#2C3E50'],
                    ];
                    @endphp
                    @foreach($packItems as $item)
                    <div style="background:{{ $item['color'] }};border-radius:0.75rem;padding:1.5rem;text-align:center;border:1px solid rgba(255,255,255,0.1);">
                        <div style="font-size:2rem;margin-bottom:0.5rem;">{{ $item['icon'] }}</div>
                        <div style="color:white;font-size:0.82rem;font-weight:500;">{{ $item['name'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     PERSONNALISATION & GOODIES
     ============================================================ --}}
<section class="section-py bg-cream" aria-label="Personnalisation et goodies">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label">Textile, goodies & NFC</span>
            <h2 class="section-title">Personnalisation & Goodies</h2>
            <p class="section-subtitle">T-shirts, mugs, stylos, cartes NFC… Offrez des produits à votre image qui marquent les esprits.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            @php
            $goodies = [
                ['icon'=>'👕','name'=>'T-shirts','color'=>'#EF4444'],
                ['icon'=>'☕','name'=>'Mugs','color'=>'#8B4513'],
                ['icon'=>'🎒','name'=>'Tote bags','color'=>'#1A3A2E'],
                ['icon'=>'🔑','name'=>'Porte-clés','color'=>'#1A1A2E'],
                ['icon'=>'📱','name'=>'Carte NFC','color'=>'#0F3460'],
                ['icon'=>'🖊️','name'=>'Stylos','color'=>'#4A235A'],
                ['icon'=>'🧢','name'=>'Casquettes','color'=>'#2C3E50'],
                ['icon'=>'🔲','name'=>'QR Code','color'=>'#1A1A2E'],
                ['icon'=>'🖼️','name'=>'Toile photo','color'=>'#7B2D2D'],
                ['icon'=>'🧲','name'=>'Magnets','color'=>'#2D4A1A'],
                ['icon'=>'🏷️','name'=>'Badges','color'=>'#4A3A1A'],
                ['icon'=>'💎','name'=>'Cadeaux perso.','color'=>'#2A1A4A'],
            ];
            @endphp
            @foreach($goodies as $item)
            <a href="{{ route('category.goodies') }}" style="background:{{ $item['color'] }};border-radius:0.875rem;padding:1.25rem 0.875rem;text-align:center;text-decoration:none;display:block;border:1px solid rgba(255,255,255,0.08);transition:transform 0.25s ease,box-shadow 0.25s ease;" class="animate-on-scroll hover:-translate-y-1">
                <div style="font-size:1.75rem;margin-bottom:0.5rem;">{{ $item['icon'] }}</div>
                <div style="color:rgba(255,255,255,0.85);font-size:0.78rem;font-weight:500;">{{ $item['name'] }}</div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     PAR SECTEUR
     ============================================================ --}}
<section class="section-py" aria-label="Par secteur d'activité">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label">Solutions métier</span>
            <h2 class="section-title">Votre secteur, nos solutions</h2>
            <p class="section-subtitle">Des offres pensées pour chaque métier, avec les produits les plus adaptés à votre activité.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
            $sectors = [
                ['slug'=>'restaurant','icon'=>'🍽️','name'=>'Restaurant','desc'=>'Menus, packaging, enseignes, néons','color'=>'#EF4444','bg'=>'rgba(239,68,68,0.08)'],
                ['slug'=>'commerce','icon'=>'🏪','name'=>'Commerce','desc'=>'Enseignes, sacs, cartes, stickers','color'=>'#3B82F6','bg'=>'rgba(59,130,246,0.08)'],
                ['slug'=>'mariage','icon'=>'💍','name'=>'Mariage','desc'=>'Faire-part, welcome boards, papeterie','color'=>'#8B5CF6','bg'=>'rgba(139,92,246,0.08)'],
                ['slug'=>'beaute-coiffure','icon'=>'💄','name'=>'Beauté & Coiffure','desc'=>'Cartes, flyers, tarifs, néons','color'=>'#EC4899','bg'=>'rgba(236,72,153,0.08)'],
                ['slug'=>'btp-artisans','icon'=>'🔨','name'=>'BTP & Artisans','desc'=>'Panneaux chantier, bâches, textile','color'=>'#F59E0B','bg'=>'rgba(245,158,11,0.08)'],
                ['slug'=>'immobilier','icon'=>'🏠','name'=>'Immobilier','desc'=>'Panneaux, brochures, cartes','color'=>'#10B981','bg'=>'rgba(16,185,129,0.08)'],
                ['slug'=>'evenementiel','icon'=>'🎉','name'=>'Événementiel','desc'=>'Affiches, billetterie, roll-up','color'=>'#F97316','bg'=>'rgba(249,115,22,0.08)'],
                ['slug'=>'associations','icon'=>'🤝','name'=>'Associations','desc'=>'Affiches, flyers, textile','color'=>'#6366F1','bg'=>'rgba(99,102,241,0.08)'],
            ];
            @endphp
            @foreach($sectors as $i => $s)
            <a href="{{ route('secteur.show', $s['slug']) }}" class="sector-card animate-on-scroll animate-delay-{{ ($i % 4) + 1 }}" id="sector-{{ $s['slug'] }}">
                <div class="sector-card-icon" style="background:{{ $s['bg'] }};color:{{ $s['color'] }};">{{ $s['icon'] }}</div>
                <div class="sector-card-name">{{ $s['name'] }}</div>
                <div class="sector-card-desc">{{ $s['desc'] }}</div>
            </a>
            @endforeach
        </div>

        <div style="text-align:center;margin-top:2.5rem;">
            <a href="{{ route('secteurs') }}" class="btn btn-dark btn-lg" id="cta-secteurs">
                Voir tous les secteurs →
            </a>
        </div>
    </div>
</section>

{{-- ============================================================
     PORTFOLIO / RÉALISATIONS
     ============================================================ --}}
<section class="section-py" style="background:var(--sb-charcoal);" aria-label="Nos réalisations">
    <div class="container-sb">
        <div class="section-header animate-on-scroll">
            <span class="section-label" style="color:#E8C96A;">Portfolio</span>
            <h2 class="section-title" style="color:white;">Nos réalisations</h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.6);">Quelques exemples de ce que nous créons chaque jour pour nos clients.</p>
        </div>

        <div class="gallery-grid">
            @php
            $portfolio = [
                ['label'=>'Carte de visite premium','cat'=>'Imprimerie','color1'=>'#1A1A2E','color2'=>'#C9A84C','icon'=>'💳'],
                ['label'=>'Néon restaurant','cat'=>'Enseignes','color1'=>'#0A0A0F','color2'=>'#FF6EB4','icon'=>'🍽️'],
                ['label'=>'Faire-part mariage indien','cat'=>'Mariage','color1'=>'#3D1A78','color2'=>'#C9A84C','icon'=>'💌'],
                ['label'=>'Packaging boulangerie','cat'=>'Packaging','color1'=>'#8B6914','color2'=>'#F5D06B','icon'=>'🥐'],
                ['label'=>'Roll-up salon de coiffure','cat'=>'Signalétique','color1'=>'#2C1A3A','color2'=>'#EC4899','icon'=>'💇'],
                ['label'=>'Panneau chantier BTP','cat'=>'BTP','color1'=>'#1A2E1A','color2'=>'#F59E0B','icon'=>'🔨'],
            ];
            @endphp
            @foreach($portfolio as $i => $item)
            <div class="gallery-item animate-on-scroll animate-delay-{{ ($i % 3) + 1 }}" style="background:linear-gradient(135deg,{{ $item['color1'] }},{{ $item['color2'] }}22);aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;font-size:3rem;min-height:200px;position:relative;">
                {{ $item['icon'] }}
                <div class="gallery-item-overlay" style="opacity:1;background:linear-gradient(to top,rgba(26,26,46,0.9) 0%,transparent 60%);">
                    <div>
                        <div style="color:white;font-weight:600;font-size:0.9rem;">{{ $item['label'] }}</div>
                        <div style="color:rgba(201,168,76,0.8);font-size:0.75rem;">{{ $item['cat'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     FINAL CTA
     ============================================================ --}}
<section class="section-py" style="background:linear-gradient(135deg,#C9A84C,#E8C96A);" aria-label="Appel à l'action">
    <div class="container-sb text-center animate-on-scroll">
        <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.75rem,4vw,3rem);font-weight:700;color:#1A1A2E;margin-bottom:1rem;">
            Prêt à créer votre projet ?
        </h2>
        <p style="font-size:1.1rem;color:rgba(26,26,46,0.7);max-width:500px;margin:0 auto 2.5rem;line-height:1.7;">
            Commandez en ligne ou demandez un devis personnalisé. Notre équipe vous répond en moins de 2h.
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="{{ route('category.imprimerie') }}" class="btn btn-dark btn-lg" id="final-cta-shop">
                Commander maintenant
            </a>
            <a href="{{ route('quote') }}" class="btn btn-lg" style="background:rgba(26,26,46,0.12);color:#1A1A2E;border:2px solid rgba(26,26,46,0.25);" id="final-cta-devis">
                Demander un devis
            </a>
            <a href="https://wa.me/33123456789" class="whatsapp-btn btn-lg" target="_blank" rel="noopener" id="final-cta-whatsapp">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection

@push('head')
<style>
@keyframes bounce {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(-8px); }
}
</style>
@endpush
