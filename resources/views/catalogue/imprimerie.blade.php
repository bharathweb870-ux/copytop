@extends('layouts.app')

@section('title', 'Imprimerie — Cartes de visite, Flyers, Affiches | Shri Bharathi')
@section('description', 'Impression professionnelle : cartes de visite, flyers, dépliants, brochures, affiches, menus, stickers et papeterie d\'entreprise. Qualité premium, livraison express.')

@section('content')
<div class="pt-16 sm:pt-20">

{{-- Category Hero --}}
<section style="background:linear-gradient(135deg,#1A1A2E,#16213E,#0F3460);padding:3rem 0 2.5rem;">
    <div class="container-sb">
        <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.82rem;color:rgba(255,255,255,0.4);margin-bottom:1.5rem;">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.4);text-decoration:none;">Accueil</a>
            <span>›</span>
            <span style="color:rgba(255,255,255,0.7);">Imprimerie</span>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <span class="badge badge-gold" style="margin-bottom:1.25rem;">🖨️ Imprimerie professionnelle</span>
                <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3.25rem);font-weight:700;color:white;margin-bottom:1rem;line-height:1.2;">
                    Des impressions<br><em style="color:#C9A84C;font-style:italic;">haut de gamme</em>
                </h1>
                <p style="color:rgba(255,255,255,0.7);font-size:1rem;line-height:1.75;max-width:520px;">
                    Cartes de visite, flyers, dépliants, brochures, affiches, menus, papeterie d'entreprise et stickers — tout ce qu'il vous faut pour une communication visuelle percutante.
                </p>
            </div>
            <div style="display:flex;gap:1rem;flex-wrap:wrap;justify-content:center;">
                @foreach(['⚡ Livraison express 48h','✓ Bon à tirer gratuit','🌿 Papiers FSC®','⭐ HD 300 DPI'] as $tag)
                <div style="background:rgba(255,255,255,0.06);border:1px solid rgba(201,168,76,0.2);border-radius:0.5rem;padding:1rem 1.25rem;text-align:center;color:rgba(255,255,255,0.8);font-size:0.85rem;min-width:130px;">
                    {{ $tag }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Quick nav --}}
<div style="background:rgba(26, 26, 46, 0.96);backdrop-filter:blur(12px);border-bottom:1px solid rgba(201, 168, 76, 0.2);position:sticky;top:60px;z-index:100;overflow-x:auto;">
    <div class="container-sb" style="display:flex;gap:0;white-space:nowrap;">
        @foreach(['Cartes de visite','Flyers','Dépliants','Brochures','Affiches','Menus','Papeterie','Stickers','Billetterie','Tampons'] as $nav)
        <a href="#{{ Str::slug($nav) }}" style="padding:0.875rem 1rem;color:rgba(255,255,255,0.85);font-size:0.85rem;font-weight:500;text-decoration:none;border-bottom:2px solid transparent;transition:all 0.2s;white-space:nowrap;display:inline-block;" class="cat-nav-link">
            {{ $nav }}
        </a>
        @endforeach
    </div>
</div>

<div class="container-sb" style="padding-top:3rem;padding-bottom:4rem;">

    {{-- ===================== CARTES DE VISITE ===================== --}}
    <div id="cartes-de-visite" style="margin-bottom:4rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem;">
            <div>
                <span class="section-label">Imprimerie</span>
                <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;color:var(--sb-charcoal);">Cartes de visite</h2>
            </div>
            <a href="{{ route('product.imprimerie', 'cartes-de-visite') }}" class="btn btn-secondary btn-sm">Voir tout →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
            $cards = [
                ['name'=>'Standard','desc'=>'Couché mat 350g. Le classique indémodable.','price'=>'Dès 29,90€','badge'=>'Best-seller','icon'=>'💳','color'=>'#1A1A2E'],
                ['name'=>'Premium','desc'=>'Couché brillant 400g. Rendu exceptionnel.','price'=>'Dès 39,90€','badge'=>'','icon'=>'💎','color'=>'#16213E'],
                ['name'=>'Pelliculée Mat','desc'=>'Film mat velouté. Toucher doux et élégant.','price'=>'Dès 44,90€','badge'=>'Populaire','icon'=>'🖤','color'=>'#0F3460'],
                ['name'=>'Soft Touch','desc'=>'Pellicule velours ultra-douce. Effet luxe.','price'=>'Dès 54,90€','badge'=>'Luxe','icon'=>'✨','color'=>'#162442'],
                ['name'=>'Dorure','desc'=>'Dorure à chaud. Effet prestige garanti.','price'=>'Dès 74,90€','badge'=>'Premium','icon'=>'🥇','color'=>'#8B6914'],
                ['name'=>'Vernis sélectif','desc'=>'Mise en valeur de votre logo par le vernis.','price'=>'Dès 64,90€','badge'=>'','icon'=>'🔮','color'=>'#2D1B4E'],
                ['name'=>'PVC','desc'=>'Carte plastique rigide. Longue durée.','price'=>'Dès 49,90€','badge'=>'','icon'=>'🎴','color'=>'#1A3A2E'],
                ['name'=>'NFC','desc'=>'Carte connectée avec puce NFC intégrée.','price'=>'Dès 89,90€','badge'=>'Nouveau','icon'=>'📱','color'=>'#0F3460'],
            ];
            @endphp
            @foreach($cards as $card)
            <a href="{{ route('product.imprimerie', 'cartes-de-visite') }}" class="product-card" style="text-decoration:none;">
                <div class="product-card-image" style="background:{{ $card['color'] }};display:flex;align-items:center;justify-content:center;font-size:2.5rem;aspect-ratio:4/3;">
                    {{ $card['icon'] }}
                    @if($card['badge'])
                    <div style="position:absolute;top:0.75rem;left:0.75rem;"><span class="badge badge-gold" style="font-size:0.65rem;">{{ $card['badge'] }}</span></div>
                    @endif
                </div>
                <div class="product-card-body">
                    <div class="product-card-name">{{ $card['name'] }}</div>
                    <div class="product-card-desc">{{ $card['desc'] }}</div>
                    <div class="product-card-price">{{ $card['price'] }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== FLYERS ===================== --}}
    <div id="flyers" style="margin-bottom:4rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem;">
            <div>
                <span class="section-label">Imprimerie</span>
                <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Flyers</h2>
            </div>
            <a href="{{ route('product.imprimerie', 'flyers') }}" class="btn btn-secondary btn-sm">Voir tout →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach(['A6 (10×15)','A5 (15×21)','A4 (21×29,7)','DL (10×21)','Carré (15×15)'] as $i => $fmt)
            <a href="{{ route('product.imprimerie', 'flyers') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#16213E,#0F3460);display:flex;align-items:center;justify-content:center;aspect-ratio:4/3;position:relative;overflow:hidden;">
                    <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.3);border-radius:0.25rem;padding:0.75rem 0.5rem;color:rgba(255,255,255,0.8);font-size:0.85rem;text-align:center;font-weight:600;">
                        📄<br><span style="font-size:0.7rem;">{{ $fmt }}</span>
                    </div>
                </div>
                <div class="product-card-body">
                    <div class="product-card-name">Flyer {{ $fmt }}</div>
                    <div class="product-card-desc">Recto ou recto-verso. 135g à 200g.</div>
                    <div class="product-card-price">Dès {{ 19 + $i * 5 }},90€</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== DÉPLIANTS ===================== --}}
    <div id="depliants" style="margin-bottom:4rem;background:var(--sb-cream);border-radius:1.25rem;padding:2.5rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem;">
            <div>
                <span class="section-label">Imprimerie</span>
                <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Dépliants</h2>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach([['name'=>'2 volets','icon'=>'📋','desc'=>'Format plié en 2'],['name'=>'3 volets','icon'=>'📑','desc'=>'Triptyque / DL plié'],['name'=>'Accordéon','icon'=>'🪗','desc'=>'Pli en accordéon'],['name'=>'Pli roulé','icon'=>'🌀','desc'=>'3 volets roulés']] as $item)
            <a href="{{ route('category.imprimerie') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#243B55,#1A2A3F);display:flex;align-items:center;justify-content:center;aspect-ratio:4/3;font-size:2.5rem;">{{ $item['icon'] }}</div>
                <div class="product-card-body">
                    <div class="product-card-name">Dépliant {{ $item['name'] }}</div>
                    <div class="product-card-desc">{{ $item['desc'] }}</div>
                    <div class="product-card-price">Sur devis</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== BROCHURES ===================== --}}
    <div id="brochures" style="margin-bottom:4rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem;">
            <div>
                <span class="section-label">Imprimerie</span>
                <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Brochures & Livrets</h2>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach([['name'=>'Brochures agrafées','icon'=>'📚','price'=>'Dès 89€'],['name'=>'Catalogues','icon'=>'📒','price'=>'Dès 129€'],['name'=>'Magazines','icon'=>'📰','price'=>'Sur devis'],['name'=>'Livrets','icon'=>'📓','price'=>'Dès 69€'],['name'=>'Programmes','icon'=>'📃','price'=>'Dès 59€']] as $item)
            <a href="{{ route('category.imprimerie') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#1F3461,#162442);display:flex;align-items:center;justify-content:center;aspect-ratio:4/3;font-size:2.5rem;">{{ $item['icon'] }}</div>
                <div class="product-card-body">
                    <div class="product-card-name">{{ $item['name'] }}</div>
                    <div class="product-card-price">{{ $item['price'] }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== AFFICHES ===================== --}}
    <div id="affiches" style="margin-bottom:4rem;background:linear-gradient(135deg,#1A1A2E,#16213E);border-radius:1.25rem;padding:2.5rem;">
        <div style="margin-bottom:1.75rem;">
            <span class="section-label" style="color:#E8C96A;">Imprimerie</span>
            <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;color:white;">Affiches</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach([['fmt'=>'A3','dim'=>'29,7×42','price'=>'Dès 4,90€'],['fmt'=>'A2','dim'=>'42×59,4','price'=>'Dès 8,90€'],['fmt'=>'A1','dim'=>'59,4×84,1','price'=>'Dès 14,90€'],['fmt'=>'A0','dim'=>'84,1×118,9','price'=>'Dès 24,90€'],['fmt'=>'Grand format','dim'=>'sur mesure','price'=>'Sur devis']] as $item)
            <a href="{{ route('product.imprimerie', 'affiches') }}" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.2);border-radius:0.75rem;padding:1.5rem;text-align:center;text-decoration:none;display:block;transition:all 0.25s ease;">
                <div style="font-size:2rem;margin-bottom:0.75rem;">🖼️</div>
                <div style="color:white;font-weight:700;font-size:1rem;margin-bottom:0.25rem;">{{ $item['fmt'] }}</div>
                <div style="color:rgba(255,255,255,0.5);font-size:0.75rem;margin-bottom:0.5rem;">{{ $item['dim'] }} cm</div>
                <div style="color:#C9A84C;font-weight:600;font-size:0.85rem;">{{ $item['price'] }}</div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== MENUS ===================== --}}
    <div id="menus" style="margin-bottom:4rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem;">
            <div>
                <span class="section-label">Imprimerie</span>
                <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Menus Restaurant</h2>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach([['n'=>'Menu restaurant','i'=>'🍽️'],['n'=>'Menu plastifié','i'=>'🥗'],['n'=>'Menu plié','i'=>'📋'],['n'=>'Menu rigide','i'=>'📌'],['n'=>'Chevalet','i'=>'🎪'],['n'=>'Carte boissons','i'=>'🍷']] as $m)
            <a href="{{ route('category.imprimerie') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#7B2D2D,#922B21);display:flex;align-items:center;justify-content:center;aspect-ratio:1;font-size:2rem;">{{ $m['i'] }}</div>
                <div class="product-card-body" style="padding:0.875rem;">
                    <div class="product-card-name" style="font-size:0.82rem;">{{ $m['n'] }}</div>
                    <div class="product-card-price" style="font-size:0.8rem;">Sur devis</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== PAPETERIE ===================== --}}
    <div id="papeterie" style="margin-bottom:4rem;background:var(--sb-cream);border-radius:1.25rem;padding:2.5rem;">
        <div style="margin-bottom:1.75rem;">
            <span class="section-label">Imprimerie</span>
            <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Papeterie entreprise</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach([['n'=>'Papier à en-tête','i'=>'📄'],['n'=>'Enveloppes','i'=>'✉️'],['n'=>'Blocs-notes','i'=>'📝'],['n'=>'Carnets autocopiants','i'=>'🗒️'],['n'=>'Chemises à rabats','i'=>'📁'],['n'=>'Bons de commande','i'=>'🧾'],['n'=>'Bons de livraison','i'=>'📦'],['n'=>'Tampons','i'=>'🖊️']] as $item)
            <a href="{{ route('category.imprimerie') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#2C3E50,#1A2A3F);display:flex;align-items:center;justify-content:center;aspect-ratio:4/3;font-size:2rem;">{{ $item['i'] }}</div>
                <div class="product-card-body" style="padding:0.875rem;">
                    <div class="product-card-name" style="font-size:0.85rem;">{{ $item['n'] }}</div>
                    <div class="product-card-price" style="font-size:0.8rem;">Sur devis</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== STICKERS ===================== --}}
    <div id="stickers" style="margin-bottom:4rem;">
        <div style="margin-bottom:1.75rem;">
            <span class="section-label">Imprimerie</span>
            <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Stickers & Étiquettes</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach([['n'=>'Stickers personnalisés','i'=>'⭐','p'=>'Dès 14,90€'],['n'=>'Stickers découpés','i'=>'✂️','p'=>'Dès 19,90€'],['n'=>'Stickers en planche','i'=>'🗂️','p'=>'Dès 12,90€'],['n'=>'Stickers en rouleau','i'=>'🌀','p'=>'Sur devis'],['n'=>'Étiquettes produits','i'=>'🏷️','p'=>'Sur devis'],['n'=>'Étiquettes alimentaires','i'=>'🍃','p'=>'Sur devis'],['n'=>'Étiquettes bouteilles','i'=>'🍾','p'=>'Sur devis'],['n'=>'Étiquettes cosmétique','i'=>'💅','p'=>'Sur devis']] as $item)
            <a href="{{ route('category.imprimerie') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#1A3A2E,#2D6A4F);display:flex;align-items:center;justify-content:center;aspect-ratio:4/3;font-size:2.5rem;">{{ $item['i'] }}</div>
                <div class="product-card-body" style="padding:0.875rem;">
                    <div class="product-card-name" style="font-size:0.85rem;">{{ $item['n'] }}</div>
                    <div class="product-card-price" style="font-size:0.8rem;">{{ $item['p'] }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- ===================== BILLETTERIE ===================== --}}
    <div id="billetterie" style="margin-bottom:4rem;background:linear-gradient(135deg,#3D1A78,#5B2C8F);border-radius:1.25rem;padding:2.5rem;">
        <div style="margin-bottom:1.75rem;">
            <span class="section-label" style="color:#E8C96A;">Imprimerie</span>
            <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;color:white;">Billetterie</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            @foreach([['n'=>'Tickets','i'=>'🎫'],['n'=>'Tickets numérotés','i'=>'🔢'],['n'=>'Tickets détachables','i'=>'✂️'],['n'=>'Coupons','i'=>'🏷️'],['n'=>'Billets événement','i'=>'🎪'],['n'=>'Cartes cadeaux','i'=>'🎁']] as $item)
            <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:0.75rem;padding:1.25rem;display:flex;align-items:center;gap:0.875rem;">
                <span style="font-size:1.75rem;">{{ $item['i'] }}</span>
                <div style="color:white;font-weight:500;font-size:0.9rem;">{{ $item['n'] }}</div>
            </div>
            @endforeach
        </div>
        <div style="margin-top:1.5rem;text-align:center;">
            <a href="{{ route('quote') }}" class="btn btn-primary">Demander un devis billetterie →</a>
        </div>
    </div>

    {{-- ===================== TAMPONS ===================== --}}
    <div id="tampons" style="margin-bottom:2rem;">
        <div style="margin-bottom:1.75rem;">
            <span class="section-label">Imprimerie</span>
            <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;">Tampons</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach([['n'=>'Tampons automatiques','i'=>'🖊️'],['n'=>'Tampons ronds','i'=>'⭕'],['n'=>'Tampons dateurs','i'=>'📅'],['n'=>'Tampons professionnels','i'=>'🏢']] as $item)
            <a href="{{ route('category.imprimerie') }}" class="product-card" style="text-decoration:none;">
                <div style="background:linear-gradient(135deg,#2C1A1A,#4A2020);display:flex;align-items:center;justify-content:center;aspect-ratio:1;font-size:2.5rem;">{{ $item['i'] }}</div>
                <div class="product-card-body">
                    <div class="product-card-name">{{ $item['n'] }}</div>
                    <div class="product-card-price">Sur devis</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

</div>

{{-- CTA Banner --}}
<section style="background:linear-gradient(135deg,#C9A84C,#E8C96A);padding:3rem 0;text-align:center;">
    <div class="container-sb">
        <h2 style="font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;color:#1A1A2E;margin-bottom:0.75rem;">
            Prêt à commander ?
        </h2>
        <p style="color:rgba(26,26,46,0.7);margin-bottom:1.5rem;">Configurez votre produit en ligne ou demandez un devis personnalisé.</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="{{ route('product.imprimerie', 'cartes-de-visite') }}" class="btn btn-dark btn-lg">Commander des cartes de visite</a>
            <a href="{{ route('quote') }}" class="btn btn-lg" style="background:rgba(26,26,46,0.12);color:#1A1A2E;border:2px solid rgba(26,26,46,0.25);">Demander un devis</a>
        </div>
    </div>
</section>

</div>
@endsection

@push('scripts')
<script>
// Smooth scroll + active nav
document.querySelectorAll('.cat-nav-link').forEach(link => {
    link.addEventListener('mouseenter', () => {
        link.style.color = '#C9A84C';
        link.style.borderBottomColor = '#C9A84C';
    });
    link.addEventListener('mouseleave', () => {
        link.style.color = '';
        link.style.borderBottomColor = 'transparent';
    });
});
</script>
@endpush
