<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("/home", function(){
    return view('home');
});

Route::get('/user', [\App\Http\Controllers\MainController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



/******gestion des produits *****/
Route::prefix('/produit')->group(function(){
    Route::get('/liste', [ProduitController::class, 'listeProduits'])->name('produits.index');
    Route::get('/disponible', [ProduitController::class, 'afficher_produits_disponible'])->name('produits.disponible');
    Route::get('/comparer', [ProduitController::class, 'view_comparer'])->name('produits.comparer');
    Route::post('/comparer', [ProduitController::class, 'comparerPrix'])->name('produits.comparer-prix');
    Route::get('/ajouter_panier', [ProduitController::class, 'ajouter_panier'])->name('produit.ajouter-panier');
    Route::get('/passer_commande', [ProduitController::class, 'passer_commande'])->name('passer-commande');
    Route::get('/edit', [ProduitController::class, 'edit'])->name('produit.edit');
    Route::post('/update', [ProduitController::class, 'update'])->name(('produits.edit'));
    Route::delete('/supprimer', [ProduitController::class, 'destroy'])->name('produits.supprimer');
    Route::get('/show', [ProduitController::class, 'show'])->name('produits.show');
    Route::get('/filter', [ProduitController::class, 'filter'])->name('produits.filter');
    Route::get('/search', [ProduitController::class, 'search'])->name('produits.search');
    Route::get('/monPanier', [ProduitController::class, 'listePanier'])->name('produits.panier');



});


/*
Route::get('/produits/create', [\App\Http\Controllers\ProduitController::class, 'creer_produit'])->name('produits.create');
Route::get('/produits/publier', [\App\Http\Controllers\ProduitController::class, 'publier_produit'])->name('produits.publier');
Route::get('/produits/search', [\App\Http\Controllers\ProduitController::class, 'search'])->name('produits.search');
Route::get('/produits/filter', [\App\Http\Controllers\ProduitController::class, 'filter'])->name('produits.filter');
Route::get('/produits/sort', [\App\Http\Controllers\ProduitController::class, 'sort'])->name('produits.sort');
Route::get('/produits/show', [\App\Http\Controllers\ProduitController::class, 'show'])->name('produits.show');
Route::get('/produits/edit', [\App\Http\Controllers\ProduitController::class, 'edit'])->name('produits.edit');
Route::get('/produits/destroy', [\App\Http\Controllers\ProduitController::class, 'destroy'])->name('produits.destroy');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
