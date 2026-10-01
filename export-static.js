import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const BASE_URL = 'http://127.0.0.1:8000';
const OUTPUT_DIR = path.join(__dirname, 'public');

// --- Read built asset filenames from Vite manifest ---
const manifestPath = path.join(__dirname, 'public', 'build', 'manifest.json');
let CSS_FILE = 'app.css';
let JS_FILE = 'app.js';

try {
  const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
  // Get CSS file from manifest
  const cssEntry = manifest['resources/css/app.css'];
  if (cssEntry && cssEntry.file) {
    CSS_FILE = cssEntry.file; // e.g. "assets/app-DVrTkOGA.css"
  }
  // Get JS file from manifest
  const jsEntry = manifest['resources/js/app.js'];
  if (jsEntry && jsEntry.file) {
    JS_FILE = jsEntry.file; // e.g. "assets/app-l0sNRNKZ.js"
  }
  console.log(`Using CSS: /build/${CSS_FILE}`);
  console.log(`Using JS:  /build/${JS_FILE}`);
} catch (e) {
  console.warn('Could not read Vite manifest, using fallback filenames.');
}

const CSS_URL = `/build/${CSS_FILE}`;
const JS_URL  = `/build/${JS_FILE}`;

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
  '/editeur/mariage-botanique',
  '/editeur/carte-architect',
  '/editeur/menu-bistro',
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

/**
 * Replace all Vite dev-server asset references with production built paths.
 * Handles both local dev (APP_ENV=local) and production (@vite() compiled tags).
 */
function replaceViteAssets(html) {
  // Pattern 1: Full Vite HMR block (APP_ENV=local, dev server running)
  // <script type="module" src="http://[::1]:5173/@vite/client">...demo-data.js">
  html = html.replace(
    /<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/@vite\/client"><\/script>[\s\S]*?<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/js\/demo-data\.js"><\/script>/gi,
    `<link rel="stylesheet" href="${CSS_URL}">\n    <script type="module" src="${JS_URL}"></script>`
  );

  // Pattern 2: Vite HMR block WITHOUT demo-data.js (partial match)
  html = html.replace(
    /<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/@vite\/client"><\/script>[\s\S]*?<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/js\/app\.js"><\/script>/gi,
    `<link rel="stylesheet" href="${CSS_URL}">\n    <script type="module" src="${JS_URL}"></script>`
  );

  // Pattern 3: Replace individual Vite dev URLs (fallback, any remaining)
  html = html.replace(
    /href="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/css\/app\.css"/gi,
    `href="${CSS_URL}"`
  );
  html = html.replace(
    /src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/js\/app\.js"/gi,
    `src="${JS_URL}"`
  );
  html = html.replace(
    /<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/@vite\/client"><\/script>/gi,
    ''
  );
  html = html.replace(
    /<script type="module" src="http:\/\/(?:\[::1\]|localhost|127\.0\.0\.1):5173\/resources\/js\/demo-data\.js"><\/script>/gi,
    ''
  );

  // Pattern 4: Production built @vite() output — already correct, keep as-is
  // <link rel="stylesheet" href="/build/assets/app-XYZ.css"> ← already fine

  return html;
}

async function crawl() {
  console.log('Starting crawler for Cloudflare Pages static export...');
  console.log(`Output dir: ${OUTPUT_DIR}`);

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
      const hrefRegex = /href=["'](http:\/\/(?:127\.0\.0\.1|localhost):8000)?(\/[^"']*)['"]/g;
      let match;
      while ((match = hrefRegex.exec(html)) !== null) {
        const link = match[2].split('#')[0].split('?')[0];
        if (link && link.startsWith('/') && !link.startsWith('//') && !link.match(/\.(css|js|png|jpg|jpeg|svg|webp|ico|woff2?|ttf|eot)$/i)) {
          if (!visited.has(link) && !queue.includes(link)) {
            queue.push(link);
          }
        }
      }

      // Replace Vite dev assets with production paths
      html = replaceViteAssets(html);

      // Replace localhost & 127.0.0.1 URLs with clean production paths
      html = html.replace(/href=["']http:\/\/(?:127\.0\.0\.1|localhost):8000\/?['"]/g, 'href="/"');
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
      console.log(`  Saved: ${filePath}`);
    } catch (err) {
      console.error(`  Error fetching ${route}:`, err.message);
    }
  }

  console.log(`\nCrawl complete! ${visited.size} pages exported to ${OUTPUT_DIR}`);
  console.log('\nIMPORTANT: Make sure public/build/ folder has the latest CSS/JS assets!');
  console.log('Run "npm run build" if not already built.');
}

crawl();
