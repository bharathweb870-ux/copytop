import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const BASE_URL = 'http://127.0.0.1:8000';
const OUTPUT_DIR = path.join(__dirname, 'dist');

// Known routes to crawl
const initialRoutes = [
  '/',
  '/recherche',
  '/par-secteur',
  '/panier',
  '/devis',
  '/contact',
  '/a-propos',
  '/modeles',
  '/editeur',
  '/imprimerie',
  '/enseignes-signaletique',
  '/mariage-evenements',
  '/packaging-sacs',
  '/personnalisation-goodies',
  '/enseignes-signaletique/neons-personnalises/configurateur',
  // Sectors
  '/par-secteur/restauration-hotellerie',
  '/par-secteur/commerces-boutiques',
  '/par-secteur/entreprises-corporate',
  '/par-secteur/mariage-evenementiel',
  '/par-secteur/immobilier-btp',
  '/par-secteur/createurs-artisanat',
  // Products
  '/imprimerie/cartes-de-visite-luxe',
  '/imprimerie/flyers-dépliants',
  '/imprimerie/brochures-catalogues',
  '/imprimerie/chemises-à-rabats',
  '/enseignes-signaletique/enseigne-lumineuse-led',
  '/enseignes-signaletique/panneau-publicitaire-akylux',
  '/enseignes-signaletique/neons-personnalises',
  '/enseignes-signaletique/vitrophanie-habillage',
  '/mariage-evenements/faire-part-mariage-luxe',
  '/mariage-evenements/menu-carte-table-dore',
  '/mariage-evenements/plan-de-table-sur-mesure',
  '/mariage-evenements/panneau-bienvenue-miroir',
  '/packaging-sacs/sacs-kraft-personnalises',
  '/packaging-sacs/boites-packaging-luxe',
  '/packaging-sacs/pochettes-cadeaux-sur-mesure',
  '/personnalisation-goodies/stylos-graves-coffret',
  '/personnalisation-goodies/tote-bags-coton-bio',
  '/personnalisation-goodies/gourdes-isothermes-laser',
  '/produit-configurable/cartes-de-visite-luxe',
  '/produit-devis/enseigne-lumineuse-led',
  '/produit-luxe/faire-part-mariage-luxe'
];

const visited = new Set();
const queue = [...initialRoutes];

async function crawl() {
  console.log('Starting crawler for Cloudflare Pages static export...');

  while (queue.length > 0) {
    const route = queue.shift();
    if (visited.has(route)) continue;
    visited.add(route);

    try {
      const targetUrl = `${BASE_URL}${route}`;
      console.log(`Fetching: ${targetUrl}`);
      const res = await fetch(targetUrl);

      if (!res.ok) {
        console.warn(`[${res.status}] Failed to fetch: ${route}`);
        continue;
      }

      let html = await res.text();

      // Find more links inside HTML matching our app
      const hrefRegex = /href=["'](http:\/\/(?:127\.0\.0\.1|localhost):8000)?(\/[^"']*)["']/g;
      let match;
      while ((match = hrefRegex.exec(html)) !== null) {
        const link = match[2].split('#')[0].split('?')[0];
        if (link && link.startsWith('/') && !link.startsWith('//') && !link.match(/\.(css|js|png|jpg|jpeg|svg|webp|ico|woff2?|ttf|eot)$/i)) {
          if (!visited.has(link) && !queue.includes(link)) {
            queue.push(link);
          }
        }
      }

      // 1. Replace Vite dev server tags with production assets
      html = html.replace(
        /<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/@vite\/client"><\/script>[\s\S]*?<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/js\/demo-data\.js"><\/script>/gi,
        '<link rel="stylesheet" href="/build/assets/app-DVrTkOGA.css">\n    <script type="module" src="/build/assets/app-l0sNRNKZ.js"></script>'
      );
      html = html.replace(/http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/css\/app\.css/g, '/build/assets/app-DVrTkOGA.css');
      html = html.replace(/http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/js\/app\.js/g, '/build/assets/app-l0sNRNKZ.js');
      html = html.replace(/<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/@vite\/client"><\/script>/gi, '');

      // 2. Replace localhost & 127.0.0.1 URLs with clean production relative/absolute paths
      html = html.replace(/href=["']http:\/\/(?:127\.0\.0\.1|localhost):8000\/?["']/g, 'href="/"');
      html = html.replace(/http:\/\/(?:127\.0\.0\.1|localhost):8000/g, '');
      html = html.replace(/href=""/g, 'href="/"');

      // Determine output filepath
      let filePath;
      if (route === '/') {
        filePath = path.join(OUTPUT_DIR, 'index.html');
      } else {
        const routeClean = route.startsWith('/') ? route.slice(1) : route;
        const targetDir = path.join(OUTPUT_DIR, routeClean);
        fs.mkdirSync(targetDir, { recursive: true });
        filePath = path.join(targetDir, 'index.html');
      }

      fs.writeFileSync(filePath, html, 'utf8');
      console.log(` Saved: ${filePath}`);
    } catch (err) {
      console.error(` Error fetching ${route}:`, err.message);
    }
  }

  console.log(`\nCrawl complete! ${visited.size} pages exported to ${OUTPUT_DIR}`);
}

crawl();
