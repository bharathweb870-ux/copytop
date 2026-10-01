window.SBData = {
  // Product catalog used across various pages (impression, neon, goodies, etc.)
  catalog: [
    {
      id: 'cartes-de-visite',
      name: 'Cartes de visite Premium',
      category: 'imprimerie',
      image: '/images/placeholder-card.svg',
      priceBase: 29,
      priceTiers: {250: 39, 500: 49, 1000: 79, 2500: 149, 5000: 249},
      formats: [
        { id: 'standard', name: 'Standard', dims: '85 x 54 mm' },
        { id: 'square', name: 'Carré', dims: '65 x 65 mm' },
        { id: 'us', name: 'Américain', dims: '90 x 50 mm' }
      ],
      papers: [
        { id: 'couche350', name: '350g Couché Mat', price: 0 },
        { id: 'premium400', name: '400g Ultra Rigide', price: 12 },
        { id: 'cotton350', name: '350g Coton Naturel', price: 25 },
        { id: 'kraft300', name: '300g Kraft Éco', price: 15 }
      ],
      laminations: [
        { id: 'none', name: 'Sans Pelliculage' },
        { id: 'mat', name: 'Pelliculage Mat' },
        { id: 'soft-touch', name: 'Soft‑Touch (Peau de pêche)' },
        { id: 'dorure', name: 'Dorure à chaud / Vernis 3D' }
      ],
      corners: [
        { id: 'straight', name: 'Coins Droits' },
        { id: 'rounded', name: 'Coins Arrondis 5mm', extra: 12 }
      ],
      quantities: [100, 250, 500, 1000, 2500, 5000]
    },
    {
      id: 'enseignes-neon',
      name: 'Enseignes Néon',
      category: 'neon',
      image: '/images/placeholder-neon.svg',
      priceBase: 120,
      formats: [
        { id: 'horizontal', name: 'Horizontal', dims: '120 x 30 cm' },
        { id: 'vertical', name: 'Vertical', dims: '30 x 120 cm' }
      ],
      colors: [
        { id: 'rose', name: 'Rose', price: 0 },
        { id: 'bleu', name: 'Bleu', price: 10 },
        { id: 'vert', name: 'Vert', price: 10 },
        { id: 'blanc', name: 'Blanc', price: 5 }
      ],
      quantities: [1, 2, 3]
    }
  ],
  // Template library for the online design studio (used in templates/editor.blade.php)
  templates: [
    {
      id: 'template-001',
      name: 'Minimalist Business Card',
      category: 'imprimerie',
      thumbnail: '/images/templates/minimalist-card.png',
      preview: '/images/templates/minimalist-card-preview.jpg'
    },
    {
      id: 'template-002',
      name: 'Elegant Wedding Invite',
      category: 'wedding',
      thumbnail: '/images/templates/wedding-elegant.png',
      preview: '/images/templates/wedding-elegant-preview.jpg'
    },
    {
      id: 'template-003',
      name: 'Retro Neon Sign',
      category: 'neon',
      thumbnail: '/images/templates/neon-retro.png',
      preview: '/images/templates/neon-retro-preview.jpg'
    }
  ],
  // Sector data for sector/index pages (e.g., Imprimerie, Signalétique, Mariage)
  sectors: [
    { slug: 'imprimerie', title: 'Imprimerie & Papeterie', description: 'Cartes de visite, flyers, brochures, papeterie de luxe', icon: 'fa-print' },
    { slug: 'neon', title: 'Signalétique Néon', description: 'Enseignes lumineuses, lettrages, panneaux décoratifs', icon: 'fa-lightbulb' },
    { slug: 'wedding', title: 'Mariage & Événement', description: 'Faire‑part, menus, décorations personnalisées', icon: 'fa-ring' }
  ]
};
