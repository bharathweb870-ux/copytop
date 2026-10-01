<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\SectorController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\QuoteController;
use App\Http\Controllers\Web\SearchController;
use App\Http\Controllers\Web\ContactController;

/*
|--------------------------------------------------------------------------
| SHRI BHARATHI — Public Web Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Search
Route::get('/recherche', [SearchController::class, 'index'])->name('search');

// Secteurs
Route::get('/par-secteur', [SectorController::class, 'index'])->name('secteurs');
Route::get('/par-secteur/{sector}', [SectorController::class, 'show'])->name('secteur.show');

// Cart
Route::get('/panier', [CartController::class, 'index'])->name('cart');

// Quote
Route::get('/devis', [QuoteController::class, 'index'])->name('quote');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Category pages
Route::get('/imprimerie', [CategoryController::class, 'show'])->defaults('category', 'imprimerie')->name('category.imprimerie');
Route::get('/enseignes-signaletique', [CategoryController::class, 'show'])->defaults('category', 'enseignes-signaletique')->name('category.enseignes');
Route::get('/mariage-evenements', [CategoryController::class, 'show'])->defaults('category', 'mariage-evenements')->name('category.mariage');
Route::get('/packaging-sacs', [CategoryController::class, 'show'])->defaults('category', 'packaging-sacs')->name('category.packaging');
Route::get('/personnalisation-goodies', [CategoryController::class, 'show'])->defaults('category', 'personnalisation-goodies')->name('category.goodies');

// Product pages - Full category slug routes
Route::get('/imprimerie/{product}', [ProductController::class, 'show'])->defaults('category', 'imprimerie')->name('product.imprimerie');
Route::get('/enseignes-signaletique/{product}', [ProductController::class, 'show'])->defaults('category', 'enseignes-signaletique')->name('product.enseignes-signaletique');
Route::get('/mariage-evenements/{product}', [ProductController::class, 'show'])->defaults('category', 'mariage-evenements')->name('product.mariage-evenements');
Route::get('/packaging-sacs/{product}', [ProductController::class, 'show'])->defaults('category', 'packaging-sacs')->name('product.packaging-sacs');
Route::get('/personnalisation-goodies/{product}', [ProductController::class, 'show'])->defaults('category', 'personnalisation-goodies')->name('product.personnalisation-goodies');

// Product pages - Short alias routes
Route::get('/enseignes/{product}', [ProductController::class, 'show'])->defaults('category', 'enseignes-signaletique')->name('product.enseignes');
Route::get('/mariage/{product}', [ProductController::class, 'show'])->defaults('category', 'mariage-evenements')->name('product.mariage');
Route::get('/packaging/{product}', [ProductController::class, 'show'])->defaults('category', 'packaging-sacs')->name('product.packaging');
Route::get('/goodies/{product}', [ProductController::class, 'show'])->defaults('category', 'personnalisation-goodies')->name('product.goodies');

// Product type routes (Configurable, Quote, Showcase)
Route::get('/produit-configurable/{product}', [ProductController::class, 'show'])->defaults('category', 'imprimerie')->name('product.configurable');
Route::get('/produit-devis/{product}', [ProductController::class, 'show'])->defaults('category', 'enseignes-signaletique')->name('product.quote');
Route::get('/produit-luxe/{product}', [ProductController::class, 'show'])->defaults('category', 'mariage-evenements')->name('product.showcase');

// Template selector & editor (demo)
Route::get('/modeles', function () {
    return view('templates.index');
})->name('templates');

Route::get('/editeur/{template?}', function ($template = 'demo') {
    return view('templates.editor', compact('template'));
})->name('editor');

// Neon configurator
Route::get('/enseignes-signaletique/neons-personnalises/configurateur', function () {
    return view('product.neon-configurator');
})->name('neon.configurator');

// À propos
Route::get('/a-propos', function () {
    return view('pages.about');
})->name('about');
