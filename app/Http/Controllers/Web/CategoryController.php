<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Demo category slugs → view mapping
    private const CATEGORY_MAP = [
        'imprimerie'                 => 'catalogue.imprimerie',
        'enseignes-signaletique'     => 'catalogue.enseignes',
        'mariage-evenements'         => 'catalogue.mariage',
        'packaging-sacs'             => 'catalogue.packaging',
        'personnalisation-goodies'   => 'catalogue.goodies',
    ];

    public function show(string $category)
    {
        $view = self::CATEGORY_MAP[$category] ?? null;

        if ($view && view()->exists($view)) {
            return view($view, compact('category'));
        }

        // Fallback generic category
        return view('catalogue.generic', compact('category'));
    }
}
