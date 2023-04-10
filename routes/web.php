<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/produits', [\App\Http\Controllers\ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [\App\Http\Controllers\ProduitController::class, 'create'])->name('produits.create');
Route::get('/produits/search', [\App\Http\Controllers\ProduitController::class, 'search'])->name('produits.search');
Route::get('/produits/filter', [\App\Http\Controllers\ProduitController::class, 'filter'])->name('produits.filter');
Route::get('/produits/sort', [\App\Http\Controllers\ProduitController::class, 'sort'])->name('produits.sort');
Route::get('/produits/show', [\App\Http\Controllers\ProduitController::class, 'show'])->name('produits.show');
Route::get('/produits/edit', [\App\Http\Controllers\ProduitController::class, 'edit'])->name('produits.edit');
Route::get('/produits/destroy', [\App\Http\Controllers\ProduitController::class, 'destroy'])->name('produits.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
