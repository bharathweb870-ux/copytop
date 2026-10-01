<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(string $category, string $product)
    {
        // Demo: map to product page types
        $configurableProducts = ['cartes-de-visite', 'flyers', 'affiches', 'stickers'];
        $quoteProducts = ['enseignes', 'panneaux', 'batches', 'lettrages', 'packaging-sur-mesure'];

        if (in_array($product, $configurableProducts) || $category === 'imprimerie') {
            return view('product.configurable.show', compact('category', 'product'));
        }

        if (in_array($category, ['enseignes-signaletique', 'packaging-sacs'])) {
            return view('product.quote.show', compact('category', 'product'));
        }

        if (in_array($category, ['mariage-evenements'])) {
            return view('product.showcase.show', compact('category', 'product'));
        }

        return view('product.configurable.show', compact('category', 'product'));
    }
}
